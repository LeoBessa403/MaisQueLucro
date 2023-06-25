<?php

class Servico extends AbstractController
{
    public $result;
    public $tipoComissao;
    public $noServico;
    public $coServico;
    public $comissao;
    public $form;
    public $jornada;
    public $coCategoriaServico;
    public $profissionais;
    public $pacoteServ;
    public $promocao;

    public function ListarCategoriaServico()
    {
        /** @var CategoriaServicoService $categoriaServicoService */
        $categoriaServicoService = $this->getService(CATEGORIA_SERVICO_SERVICE);
        $this->result = $this->getCategorias();
        if (empty($this->result)) {
            $categoriaServicoService->salvaCategoriaServicoInicial();
            $this->result = $this->getCategorias();
        }
    }

    public function ListarServico()
    {
        /** @var ServicoService $servicoService */
        $servicoService = $this->getService(SERVICO_SERVICE);
        /** @var Session $session */
        $session = new Session();
        if ($session->CheckSession(PESQUISA_AVANCADA)) {
            $session->FinalizaSession(PESQUISA_AVANCADA);
        }
        $Condicoes = [];
        $Condicoes[CO_ASSINANTE] = AssinanteService::getCoAssinanteLogado();
        $Condicoes["pre." . CO_PRECO_SERVICO] =
            "(SELECT max(co_preco_servico) from TB_PRECO_SERVICO where co_servico = ser.co_servico)";
        $this->coCategoriaServico = UrlAmigavel::PegaParametro(CO_CATEGORIA_SERVICO);
        if ($this->coCategoriaServico)
            $Condicoes["ser." . CO_CATEGORIA_SERVICO] = $this->coCategoriaServico;

        $resultPreco = $servicoService->PesquisaAvancadaPreco($Condicoes);
        $session->setSession('resultPreco', $resultPreco);

        if (!empty($_POST)) {
            $Condicoes["ser." . CO_CATEGORIA_SERVICO] = $_POST[CO_CATEGORIA_SERVICO][0];
            $Condicoes["ser." . ST_STATUS] = $_POST[ST_STATUS][0];
            $Condicoes["ser." . ST_ASSISTENTE] = $_POST[ST_ASSISTENTE][0];
            $Condicoes["like#ser." . DS_DESCRICAO] = trim($_POST[DS_DESCRICAO]);
            $Condicoes["like#ser." . NO_SERVICO] = trim($_POST[NO_SERVICO]);
            $Condicoes[">=#pre." . NU_VALOR] = $_POST[NU_VALOR . '1'];
            $Condicoes["<=#pre." . NU_VALOR] = $_POST[NU_VALOR . '2'];

            $this->result = $servicoService->PesquisaAvancada($Condicoes);
            $session->setSession(PESQUISA_AVANCADA, $Condicoes);
        } else {
            $this->result = $servicoService->PesquisaAvancada($Condicoes);
        }

        /** @var Configuracao $configControl */
        $configControl = new Configuracao();
        $dados = $configControl->getTipoEComissoes(FormaComissaoEnum::SERVICO);
        $this->tipoComissao = $dados['tipoComissao'];
        $this->comissao = $dados['comissao'];
    }

    public function ListarServicoPesquisaAvancada()
    {
        /** @var Session $session */
        $session = new Session();
        $resultPreco = $session::getSession('resultPreco');
        $resultPreco = ((float)$resultPreco['min_valor'] - 1) . '-' . ((int)$resultPreco['max_valor'] + 1);
        echo ServicoForm::Pesquisar($resultPreco);
    }

    public function getCategorias()
    {
        /** @var CategoriaServicoService $categoriaServicoService */
        $categoriaServicoService = $this->getService(CATEGORIA_SERVICO_SERVICE);
        return $categoriaServicoService->PesquisaTodos([
            CO_ASSINANTE => AssinanteService::getCoAssinanteLogado(),
        ]);
    }

    public function CadastroCategoriaServico()
    {
        /** @var CategoriaServicoService $categoriaServicoService */
        $categoriaServicoService = $this->getService(CATEGORIA_SERVICO_SERVICE);

        if (!empty($_POST)):
            $retorno = $categoriaServicoService->salvaCategoriaServico($_POST);
            if ($retorno[SUCESSO]) {
                Redireciona(UrlAmigavel::$modulo . '/Servico/ListarCategoriaServico/');
            }
        endif;

        $coCategoriaServico = UrlAmigavel::PegaParametro(CO_CATEGORIA_SERVICO);
        if ($coCategoriaServico) {
            /** @var CategoriaServicoService $categoriaServicoService */
            $categoriaServicoService = $this->getService(CATEGORIA_SERVICO_SERVICE);
            /** @var CategoriaServicoEntidade $categoriaServico */
            $categoriaServico = $categoriaServicoService->PesquisaUmRegistro($coCategoriaServico);

            $res[ST_STATUS] = ($categoriaServico->getStStatus() == StatusUsuarioEnum::ATIVO)
                ? 'checked' : '';
            $res[NO_CATEGORIA_SERVICO] = $categoriaServico->getNoCategoriaServico();
            $res[CO_CATEGORIA_SERVICO] = $categoriaServico->getCoCategoriaServico();

        } else {
            // Inicia elementos do Form
            $res[ST_STATUS] = 'checked';
        }


        $this->form = ServicoForm::CadastrarCategoria($res);
    }

    public function CadastroServico()
    {
        /** @var ServicoService $servicoService */
        $servicoService = $this->getService(SERVICO_SERVICE);

        if (!empty($_POST)):
            $retorno = $servicoService->salvaServico($_POST, $_FILES);
            if ($retorno[SUCESSO]) {
                Redireciona(UrlAmigavel::$modulo . '/Servico/ListarServico/');
            }
        endif;

        $coServico = UrlAmigavel::PegaParametro(CO_SERVICO);
        if ($coServico) {
            /** @var ServicoEntidade $servico */
            $servico = $servicoService->PesquisaUmRegistro($coServico);
            $res[ST_STATUS] = ($servico->getStStatus() == StatusUsuarioEnum::ATIVO)
                ? 'checked' : '';
            $res[ST_ASSISTENTE] = ($servico->getStAssistente() == SimNaoEnum::SIM)
                ? 'checked' : '';
            $res[CO_CATEGORIA_SERVICO] = $servico->getCoCategoriaServico()->getCoCategoriaServico();
            $res[NO_SERVICO] = $servico->getNoServico();
            $res[NU_VALOR] = Valida::FormataMoeda($servico->getCoUltimoPrecoServico()->getNuValor());
            $res[NU_DURACAO] = $servico->getNuDuracao();
            $res[DS_DESCRICAO] = $servico->getDsDescricao();
            $res[CO_SERVICO] = $servico->getCoServico();
            $noPasta = "Servico/Assinante-" . AssinanteService::getCoAssinanteLogado() . '/';

            // Carrega a Imagem do Serviço
            $foto = null;
            if (!empty($servico->getCoImagem())) {
                if (file_exists(PASTA_UPLOADS . $servico->getCoImagem()->getDsCaminho())) {
                    $foto = $servico->getCoImagem()->getDsCaminho();
                } elseif (file_exists(PASTA_UPLOADS . $noPasta . $servico->getCoImagem()->getDsCaminho())) {
                    $foto = $noPasta . $servico->getCoImagem()->getDsCaminho();
                }
                $res[CO_IMAGEM] = $servico->getCoImagem()->getCoImagem();
            }
            $res[DS_CAMINHO] = $foto;

        } else {
            // Inicia elementos do Form
            $res[ST_STATUS] = 'checked';
            $res[ST_ASSISTENTE] = '';
        }


        $this->form = ServicoForm::Cadastrar($res);
    }

    public function ComissaoServico()
    {
        /** @var ServicoService $servicoService */
        $servicoService = $this->getService(SERVICO_SERVICE);
        /** @var ConfigComissaoService $configComissaoService */
        $configComissaoService = $this->getService(CONFIG_COMISSAO_SERVICE);
        /** @var PercentualComissaoService $percentualComissaoService */
        $percentualComissaoService = $this->getService(PERCENTUAL_COMISSAO_SERVICE);
        $id = "configComissao";

        if (!empty($_POST[$id])):
            $retorno = $percentualComissaoService->salvaComissao($_POST);
            if ($retorno[SUCESSO]) {
                Redireciona(UrlAmigavel::$modulo . '/' . UrlAmigavel::$controller . '/ListarServico/');
            }
        endif;

        $res = [];
        /** @var ConfigComissaoEntidade $configComissao */
        $configComissao = $configComissaoService->PesquisaUmQuando([
            CO_ASSINANTE => AssinanteService::getCoAssinanteLogado()
        ]);

        if ($configComissao) {
            /** @var HistoricoComissaoEntidade $ultHistConfigCom */
            $ultHistConfigCom = $configComissao->getCoUltimoHistoricoComissao();
            $percAtul = $ultHistConfigCom->getPercentuaisComissao();
            $res[NU_TIPO_COMISSAO . TipoComissaoEnum::UNICO_PROFISSIONAL]
                = $percAtul[TipoComissaoEnum::UNICO_PROFISSIONAL];
            $res[NU_TIPO_COMISSAO . TipoComissaoEnum::COM_ASSISTENTE]
                = $percAtul[TipoComissaoEnum::COM_ASSISTENTE];
            $res[NU_TIPO_COMISSAO . TipoComissaoEnum::ASSISTENTE]
                = $percAtul[TipoComissaoEnum::ASSISTENTE];
        }
        $coServico = UrlAmigavel::PegaParametro(CO_SERVICO);
        if ($coServico) {
            $res[CO_SERVICO] = $coServico;
            /** @var ServicoEntidade $servico */
            $this->servico = $servicoService->PesquisaUmRegistro($coServico);
            if ($this->servico->getCoPercentualComissao()) {
                /** @var PercentualComissaoEntidade $percent */
                foreach ($this->servico->getCoPercentualComissao() as $percent) {
                    $res[NU_TIPO_COMISSAO . $percent->getNuTipoComissao()]
                        = $percent->getNuComissao();
                }
            }
        } else {
            Notificacoes::geraMensagem(
                'Selecione um Serviço para Modificar a comissão do mesmo',
                TiposMensagemEnum::ALERTA
            );
            Redireciona(UrlAmigavel::$modulo . '/' . UrlAmigavel::$controller . '/ListarServico/');
        }

        $this->form = ServicoForm::ComissaoServico($res);
    }

    public function ComissaoServicoProfissional()
    {
        /** @var ServicoService $servicoService */
        $servicoService = $this->getService(SERVICO_SERVICE);
        /** @var ServicoProfissionalService $servicoProfissionalService */
        $servicoProfissionalService = $this->getService(SERVICO_PROFISSIONAL_SERVICE);
        /** @var ProfissionalService $profissionalService */
        $profissionalService = $this->getService(PROFISSIONAL_SERVICE);
        /** @var ConfigComissaoService $configComissaoService */
        $configComissaoService = $this->getService(CONFIG_COMISSAO_SERVICE);
        $id = "ComissaoServicoProfissional";

        if (!empty($_POST[$id])):
            $retorno = $servicoProfissionalService->salvaComissaoServicoProfissional($_POST);
            if ($retorno[SUCESSO]) {
                Redireciona(UrlAmigavel::$modulo . '/' . UrlAmigavel::$controller . '/ListarServico/');
            } else {
                Redireciona(UrlAmigavel::$modulo . '/' . UrlAmigavel::$controller . '/' . UrlAmigavel::$action .
                    Valida::GeraParametro(CO_SERVICO . "/" . $_POST[CO_SERVICO]));
            }
        endif;

        $res = [];
        /** @var ConfigComissaoEntidade $configComissao */
        $configComissao = $configComissaoService->PesquisaUmQuando([
            CO_ASSINANTE => AssinanteService::getCoAssinanteLogado()
        ]);

        $todosProfissionais = $profissionalService->PesquisaTodos([
            CO_ASSINANTE => AssinanteService::getCoAssinanteLogado(),
            ST_STATUS => StatusUsuarioEnum::ATIVO
        ]);
        $percAtul = [];
        if ($configComissao) {
            /** @var HistoricoComissaoEntidade $ultHistConfigCom */
            $ultHistConfigCom = $configComissao->getCoUltimoHistoricoComissao();
            $percAtul = $ultHistConfigCom->getPercentuaisComissao();
            $res[NU_TIPO_COMISSAO . TipoComissaoEnum::UNICO_PROFISSIONAL]
                = $percAtul[TipoComissaoEnum::UNICO_PROFISSIONAL];
            $res[NU_TIPO_COMISSAO . TipoComissaoEnum::COM_ASSISTENTE]
                = $percAtul[TipoComissaoEnum::COM_ASSISTENTE];
            $res[NU_TIPO_COMISSAO . TipoComissaoEnum::ASSISTENTE]
                = $percAtul[TipoComissaoEnum::ASSISTENTE];
        }
        $coServico = UrlAmigavel::PegaParametro(CO_SERVICO);
        $profissionais = [];
        if ($coServico) {
            /** @var ProfissionalEntidade $profissional */
            foreach ($todosProfissionais as $profissional) {
                /** @var ServicoEntidade $servico */
                $servico = $servicoService->PesquisaUmRegistro($coServico);
                $this->noServico = $servico->getNoServico();
                $this->coServico = $coServico;
                if ($servico->getStStatus() == StatusAcessoEnum::INATIVO) {
                    Notificacoes::geraMensagem(
                        'Serviço Inativo, Favor ative primeiro para configurar as comissões dos profissionais.',
                        TiposMensagemEnum::ALERTA
                    );
                    Redireciona(UrlAmigavel::$modulo . '/' . UrlAmigavel::$controller . '/ListarServico/');
                }
                $coProfissional = $profissional->getCoProfissional();
                /** @var ServicoProfissionalEntidade $servProf */
                $servProf = $servicoProfissionalService->PesquisaUmQuando([
                    CO_SERVICO => $coServico,
                    CO_PROFISSIONAL => $coProfissional,
                    ST_STATUS => SimNaoEnum::SIM
                ]);
                $profissionais[$coProfissional][CO_PROFISSIONAL] = $coProfissional;
                $profissionais[$coProfissional][NO_PESSOA] = $profissional->getCoPessoa()->getNoPessoa();
                if ($servProf) {
                    $profissionais[$coProfissional][NU_TIPO_COMISSAO . TipoComissaoEnum::UNICO_PROFISSIONAL]
                        = $servProf->getNuUltimoComissaoPorTipo(TipoComissaoEnum::UNICO_PROFISSIONAL);
                    $profissionais[$coProfissional][NU_TIPO_COMISSAO . TipoComissaoEnum::COM_ASSISTENTE]
                        = $servProf->getNuUltimoComissaoPorTipo(TipoComissaoEnum::COM_ASSISTENTE);
                    $profissionais[$coProfissional][NU_TIPO_COMISSAO . TipoComissaoEnum::ASSISTENTE]
                        = $servProf->getNuUltimoComissaoPorTipo(TipoComissaoEnum::ASSISTENTE);
                    $profissionais[$coProfissional][ST_STATUS] = $servProf->getStStatus();
                    $profissionais[$coProfissional]['atende'] = SimNaoEnum::SIM;
                } else {
                    $profissionais[$coProfissional][NU_TIPO_COMISSAO . TipoComissaoEnum::UNICO_PROFISSIONAL]
                        = $percAtul[TipoComissaoEnum::UNICO_PROFISSIONAL];
                    $profissionais[$coProfissional][NU_TIPO_COMISSAO . TipoComissaoEnum::COM_ASSISTENTE]
                        = $percAtul[TipoComissaoEnum::COM_ASSISTENTE];
                    $profissionais[$coProfissional][NU_TIPO_COMISSAO . TipoComissaoEnum::ASSISTENTE]
                        = $percAtul[TipoComissaoEnum::ASSISTENTE];
                    $profissionais[$coProfissional][ST_STATUS] = SimNaoEnum::SIM;
                    $profissionais[$coProfissional]['atende'] = SimNaoEnum::NAO;
                }
            }
            $this->profissionais = $profissionais;
        } else {
            Notificacoes::geraMensagem(
                'Selecione um Serviço para Modificar a comissão dos Profissionais',
                TiposMensagemEnum::ALERTA
            );
            Redireciona(UrlAmigavel::$modulo . '/' . UrlAmigavel::$controller . '/ListarServico/');
        }
    }

    public static function DesativarServico($coServico)
    {
        /** @var ServicoService $servicoService */
        $servicoService = static::getServiceStatic(SERVICO_SERVICE);
        return $servicoService->desativarServico($coServico);
    }

    public static function AtivarServico($coServico)
    {
        /** @var ServicoService $servicoService */
        $servicoService = static::getServiceStatic(SERVICO_SERVICE);
        return $servicoService->ativarServico($coServico);
    }

    public function PacoteServico()
    {
        /** @var PacoteServService $pacoteServService */
        $pacoteServService = $this->getService(PACOTE_SERV_SERVICE);
        $this->result = $pacoteServService->PesquisaTodos([
            CO_ASSINANTE => AssinanteService::getCoAssinanteLogado()
        ]);
    }

    public function CadastroPacoteServico()
    {
        /** @var PacoteServService $pacoteServService */
        $pacoteServService = $this->getService(PACOTE_SERV_SERVICE);
        $id = "CadastroPacoteServico";

        if (!empty($_POST[$id])):
            $retorno = $pacoteServService->salvaPacoteServico($_POST);
            if ($retorno[SUCESSO]) {
                Redireciona(UrlAmigavel::$modulo . '/' . UrlAmigavel::$controller . '/PacoteServico/');
            }
        endif;

        $coPacoteServ = UrlAmigavel::PegaParametro(CO_PACOTE_SERV);
        $res = [];
        if ($coPacoteServ) {
            /** @var PacoteServEntidade $pacoteServ */
            $pacoteServ = $pacoteServService->PesquisaUmRegistro($coPacoteServ);
            $res[ST_STATUS] = ($pacoteServ->getCoUltimoPrecoPacote()->getStStatus() == StatusAcessoEnum::ATIVO)
                ? 'checked' : '';
            $res[NO_PACOTE_SERV] = $pacoteServ->getNoPacoteServ();
            $res[NU_VALOR] = Valida::FormataMoeda($pacoteServ->getCoUltimoPrecoPacote()->getNuValor());
            // Carrega os Serviços
            $servicos = [];
            if (!empty($pacoteServ->getCoServicoPacote())) {
                /** @var ServicoPacoteEntidade $servPacote */
                foreach ($pacoteServ->getCoServicoPacote() as $servPacote) {
                    $servicos[] = $servPacote->getCoServico()->getCoServico();
                }
            }
            $res[CO_SERVICO] = $servicos;
            $res[DS_DESCRICAO] = $pacoteServ->getCoUltimoPrecoPacote()->getDsDescricao();
            $res[CO_PACOTE_SERV] = $coPacoteServ;
        } else {
            // Inicia elementos do Form
            $res[ST_STATUS] = 'checked';
        }
        $this->form = ServicoForm::CadastroPacoteServico($res);
    }

    public function HistoricoPacoteServico()
    {
        /** @var PacoteServService $pacoteServService */
        $pacoteServService = $this->getService(PACOTE_SERV_SERVICE);

        $coPacoteServ = UrlAmigavel::PegaParametro(CO_PACOTE_SERV);
        if ($coPacoteServ) {
            $this->pacoteServ = $pacoteServService->PesquisaUmRegistro($coPacoteServ);
        } else {
            Notificacoes::geraMensagem(
                'Não Existe Histórico desse Pacote de Serviço',
                TiposMensagemEnum::ALERTA
            );
            Redireciona(UrlAmigavel::$modulo . '/' . UrlAmigavel::$controller . '/PacoteServico/');
        }

    }

    public function PromocaoServico()
    {
        /** @var PromocaoService $promocaoService */
        $promocaoService = $this->getService(PROMOCAO_SERVICE);
        $this->result = $promocaoService->PesquisaTodos([
            CO_ASSINANTE => AssinanteService::getCoAssinanteLogado()
        ]);
    }

    public function CadastroPromocaoServico()
    {
        /** @var PromocaoService $promocaoService */
        $promocaoService = $this->getService(PROMOCAO_SERVICE);
        /** @var ServicoService $servicoService */
        $servicoService = $this->getService(SERVICO_SERVICE);
        $id = "CadastroPromocaoServico";

        if (!empty($_POST[$id])):
            $retorno = $promocaoService->salvaPromocao($_POST);
            if ($retorno[SUCESSO]) {
                Redireciona(UrlAmigavel::$modulo . '/' . UrlAmigavel::$controller . '/PromocaoServico/');
            }
        endif;

        $coPromocao = UrlAmigavel::PegaParametro(CO_PROMOCAO);
        $res = [];
        if ($coPromocao) {
            /** @var PromocaoEntidade $promocao */
            $promocao = $promocaoService->PesquisaUmRegistro($coPromocao);
            /** @var PrecoPromocaoEntidade $precoPromocao */
            $precoPromocao = $promocao->getCoUltimoPrecoPromocao();
            /** @var ServicoEntidade $servico */
            $servico = $servicoService->PesquisaUmRegistro($precoPromocao->getCoServico()->getCoServico());

            $res[ST_STATUS] = ($precoPromocao->getStStatus() == StatusAcessoEnum::ATIVO)
                ? 'checked' : '';
            $res[NO_TITULO] = $promocao->getNoTitulo();
            $res[DS_DESCRICAO] = $promocao->getDsDescricao();
            $res[CO_PROMOCAO] = $coPromocao;
            $res[CO_SERVICO] = $precoPromocao->getCoServico()->getCoServico();
            $res['valor_servico'] = $servico->getCoUltimoPrecoServico()->getNuValor();
            $res[NU_VALOR] = Valida::FormataMoeda($precoPromocao->getNuValor());
            $res['desconto'] = Valida::FormataPorcentagemDecimal(
                100 - (($precoPromocao->getNuValor() / $servico->getCoUltimoPrecoServico()->getNuValor()) * 100)
            );

            $res[DT_INICIO] = Valida::DataShow($precoPromocao->getDtInicio());
            $res[DT_FIM] = Valida::DataShow($precoPromocao->getDtFim());
            $res[NU_HORA_ABERTURA] = $precoPromocao->getNuHoraAbertura();
            $res[NU_HORA_FECHAMENTO] = $precoPromocao->getNuHoraFechamento();

            // Carrega os Dias de atendimento
            $diasAtendimento = [];
            $dias = explode(', ', $precoPromocao->getNuDiaSemana());
            foreach ($dias as $dia) {
                $diasAtendimento[] = $dia;
            }
            $res[NU_DIA_SEMANA] = $diasAtendimento;
        } else {
            // Inicia elementos do Form
            $res[ST_STATUS] = 'checked';
        }
        $this->form = ServicoForm::CadastroPromocaoServico($res);
    }

    public function HistoricoPromocaoServico()
    {
        /** @var PromocaoService $promocaoService */
        $promocaoService = $this->getService(PROMOCAO_SERVICE);

        $coPromocao = UrlAmigavel::PegaParametro(CO_PROMOCAO);
        if ($coPromocao) {
            $this->promocao = $promocaoService->PesquisaUmRegistro($coPromocao);
        } else {
            Notificacoes::geraMensagem(
                'Não Existe Histórico dessa Promoção de Serviço',
                TiposMensagemEnum::ALERTA
            );
            Redireciona(UrlAmigavel::$modulo . '/' . UrlAmigavel::$controller . '/PromocaoServico/');
        }

    }

    public static function GetPrecoServico($coServico)
    {
        /** @var ServicoService $servicoService */
        $servicoService = static::getServiceStatic(SERVICO_SERVICE);
        return $servicoService->getPrecoServico($coServico);
    }

    public function CortesiaServico()
    {
        /** @var CortesiaService $cortesiaService */
        $cortesiaService = $this->getService(CORTESIA_SERVICE);
        $this->result = $cortesiaService->PesquisaTodos([
            CO_ASSINANTE => AssinanteService::getCoAssinanteLogado()
        ]);
    }

    public function CadastroCortesiaServico()
    {
        /** @var CortesiaService $cortesiaService */
        $cortesiaService = $this->getService(CORTESIA_SERVICE);
        $id = "CadastroCortesiaServico";

        if (!empty($_POST[$id])):
            $retorno = $cortesiaService->salvaCortesia($_POST);
            if ($retorno[SUCESSO]) {
                Redireciona(UrlAmigavel::$modulo . '/' . UrlAmigavel::$controller . '/CortesiaServico/');
            }
        endif;

        $coCortesia = UrlAmigavel::PegaParametro(CO_CORTESIA);
        $res = [];
        if ($coCortesia) {
            /** @var CortesiaEntidade $cortesia */
            $cortesia = $cortesiaService->PesquisaUmRegistro($coCortesia);

            $res[ST_STATUS] = ($cortesia->getStStatus() == StatusCortesiaEnum::ATIVA)
                ? 'checked' : '';
            $res[DS_MOTIVO] = $cortesia->getDsMotivo();
            $res[CO_CORTESIA] = $coCortesia;
            $res[CO_SERVICO] = $cortesia->getCoServico()->getCoServico();
            $res[DT_INICIO] = Valida::DataShow($cortesia->getDtInicio());
            $res[DT_FIM] = Valida::DataShow($cortesia->getDtFim());
            $res[NU_HORA_ABERTURA] = $cortesia->getNuHoraAbertura();
            $res[NU_HORA_FECHAMENTO] = $cortesia->getNuHoraFechamento();

            // Carrega os Dias de atendimento
            $diasAtendimento = [];
            $dias = explode(', ', $cortesia->getNuDiaSemana());
            foreach ($dias as $dia) {
                $diasAtendimento[] = $dia;
            }
            $res[NU_DIA_SEMANA] = $diasAtendimento;
        } else {
            // Inicia elementos do Form
            $res[ST_STATUS] = 'checked';
        }
        $this->form = ServicoForm::CadastroCortesiaServico($res);
    }

    public function ValePresenteServico()
    {
        /** @var ValePresenteService $valePresenteService */
        $valePresenteService = $this->getService(VALE_PRESENTE_SERVICE);
        $this->result = $valePresenteService->PesquisaTodos([
            CO_ASSINANTE => AssinanteService::getCoAssinanteLogado()
        ]);
    }

    public function CadastroValePresenteServico()
    {
        /** @var ValePresenteService $valePresenteService */
        $valePresenteService = $this->getService(VALE_PRESENTE_SERVICE);
        $id = "CadastroValePresenteServico";

        if (!empty($_POST[$id])):
            $retorno = $valePresenteService->salvaValePresente($_POST);
            if ($retorno[SUCESSO]) {
                Redireciona(UrlAmigavel::$modulo . '/' . UrlAmigavel::$controller . '/ValePresenteServico/');
            }
        endif;

        $coValePre = UrlAmigavel::PegaParametro(CO_VALE_PRESENTE);
        $res = [];
        if ($coValePre) {
            /** @var ValePresenteEntidade $valePresente */
            $valePresente = $valePresenteService->PesquisaUmRegistro($coValePre);

            $res[ST_STATUS] = ($valePresente->getStStatus() == StatusValePresenteEnum::ATIVO)
                ? 'checked' : '';
            $res[DS_MOTIVO] = $valePresente->getDsMotivo();
            $res[NU_VALOR] = Valida::FormataMoeda($valePresente->getNuValor());
            $res[CO_VALE_PRESENTE] = $coValePre;
            $res[DT_VALIDO] = Valida::DataShow($valePresente->getDtValido());
        } else {
            // Inicia elementos do Form
            $res[ST_STATUS] = 'checked';
        }
        $this->form = ServicoForm::CadastroValePresenteServico($res);
    }

    public static function GetServicoAjax($coServico)
    {
        /** @var ServicoService $servicoService */
        $servicoService = static::getServiceStatic(SERVICO_SERVICE);
        return $servicoService->getServicoAjax($coServico);
    }


}