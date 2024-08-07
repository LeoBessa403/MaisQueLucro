<?php

class Assinante extends AbstractController
{
    public $result;
    public $assinante;
    public $form;
    public $enderecos;

    public function ListarAssinante()
    {
        /** @var AssinanteService $assinanteService */
        $assinanteService = $this->getService(ASSINANTE_SERVICE);
        /** @var EnderecoService $enderecoService */
        $enderecoService = $this->getService(ENDERECO_SERVICE);
        /** @var PlanoAssinanteAssinaturaService $PlanoAssinanteAssinaturaService */
        $PlanoAssinanteAssinaturaService = $this->getService(PLANO_ASSINANTE_ASSINATURA_SERVICE);
        /** @var Session $session */
        $session = new Session();
        if ($session->CheckSession(PESQUISA_AVANCADA)) {
            $session->FinalizaSession(PESQUISA_AVANCADA);
        }

        $assinantes = $assinanteService->PesquisaTodos();
        /** @var AssinanteEntidade $ass */
        foreach ($assinantes as $ass) {
            //// VERIFICA E ATUALIZA OS PAGAMENTOS COM STATUS DE AGUARDANDO PAGAMENTO
//            $PlanoAssinanteAssinaturaService->atualizaStPagPagSeguro($ass);
        }

        $Condicoes = ["ass." . TP_ASSINANTE => AssinanteEnum::MATRIZ];

        $resultPreco = $assinanteService->PesquisaAvancadaAssinatura($Condicoes);
        $session->setSession('resultPreco', $resultPreco);

        if (!empty($_POST)) {
            $Condicoes["te." . NU_CNPJ] = Valida::RetiraMascara($_POST[NU_CNPJ]);
            $Condicoes["like#te." . NO_FANTASIA] = trim($_POST[NO_FANTASIA]);
            $Condicoes["like#te." . NO_EMPRESA] = trim($_POST[NO_EMPRESA]);
            $Condicoes["like#tp." . NO_PESSOA] = trim($_POST[NO_PESSOA]);
            $Condicoes["like#tend." . NO_CIDADE] = trim($_POST[NO_CIDADE]);
            $Condicoes["in#tend." . SG_UF] = $_POST[SG_UF][0];
            $Condicoes[">=#tpaa." . NU_VALOR_ASSINATURA] = $_POST[NU_VALOR_ASSINATURA . '1'];
            $Condicoes["<=#tpaa." . NU_VALOR_ASSINATURA] = $_POST[NU_VALOR_ASSINATURA . '2'];

            $this->result = $assinanteService->PesquisaAvancada($Condicoes);
            $session->setSession(PESQUISA_AVANCADA, $Condicoes);
        } else {
            $this->result = $assinanteService->PesquisaAvancada($Condicoes);
        }

        /** @var AssinanteEntidade $assinante */
        foreach ($this->result as $assinante) {
            $coEndereco = $assinante->getCoEmpresa()->getCoEndereco();
            if ($coEndereco) {
                /** @var EnderecoEntidade $endereco */
                $endereco = $enderecoService->PesquisaUmRegistro($coEndereco);
                $this->enderecos[$coEndereco] = ($endereco->getSgUf()) ?
                    $endereco->getDsBairro() . ' ' . $endereco->getNoCidade() . ' / ' . $endereco->getSgUf() : null;
            }
        }
    }

    public function CadastroAssinante()
    {
        /** @var AssinanteService $assinanteService */
        $assinanteService = $this->getService(ASSINANTE_SERVICE);
        $id = "cadastroAssinante";

        if (!empty($_POST[$id])):
            $retorno = $assinanteService->salvaAssinante($_POST);
            if ($retorno[SUCESSO]) {
                Redireciona(UrlAmigavel::$modulo . '/' . UrlAmigavel::$controller . '/ListarAssinante/');
            }
        endif;

        $coAssinante = UrlAmigavel::PegaParametro(CO_ASSINANTE);
        $res = [];
        if ($coAssinante) {
            /** @var AssinanteEntidade $assinante */
            $assinante = $assinanteService->PesquisaUmRegistro($coAssinante);
            $res[NO_PESSOA] = $assinante->getCoPessoa()->getNoPessoa();
            $res[NO_FANTASIA] = $assinante->getCoEmpresa()->getNoFantasia();
            $res[NU_TEL1] = $assinante->getCoPessoa()->getCoContato()->getNuTel1();
            $res[DS_EMAIL] = $assinante->getCoPessoa()->getCoContato()->getDsEmail();
            $res[CO_ASSINANTE] = $assinante->getCoAssinante();

        }
        $this->form = AssinanteForm::Cadastrar($res);
    }

    public function HistoricoAssinante()
    {
        /** @var AssinanteService $assinanteService */
        $assinanteService = $this->getService(ASSINANTE_SERVICE);

        $coAssinante = UrlAmigavel::PegaParametro(CO_ASSINANTE);
        if (AssinanteService::assianteNaoEncontrado($coAssinante)) {
            /** @var AssinanteEntidade $assinante */
            $this->assinante = $assinanteService->PesquisaUmRegistro($coAssinante);
        }
    }

    public static function getSessaoPagamentoAssinante()
    {
        /** @var PlanoAssinanteAssinaturaService $PlanoAssinanteAssinaturaService */
        $PlanoAssinanteAssinaturaService = new PlanoAssinanteAssinaturaService();
        return $PlanoAssinanteAssinaturaService->getReferenciaPagamentoAssinante();
    }

    public function MeuPlanoAssinante()
    {
        /** @var PlanoAssinanteAssinaturaService $PlanoAssinanteAssinaturaService */
        $PlanoAssinanteAssinaturaService = $this->getService(PLANO_ASSINANTE_ASSINATURA_SERVICE);

        $coAssinante = UrlAmigavel::PegaParametro(CO_ASSINANTE);
        if ($coAssinante) {
            if (AssinanteService::assianteNaoEncontrado($coAssinante)) {
                $this->result = $PlanoAssinanteAssinaturaService->PesquisaTodos([
                    CO_ASSINANTE => $coAssinante
                ]);
            }
        } else {
            $this->result = $PlanoAssinanteAssinaturaService->PesquisaTodos([
                CO_ASSINANTE => AssinanteService::getCoAssinanteLogado()
            ]);
        }
    }

    public function RenovaPlanoAssinante()
    {
        /** @var AssinanteService $assinanteService */
        $assinanteService = $this->getService(ASSINANTE_SERVICE);
        /** @var PlanoAssinanteAssinaturaService $PlanoAssinanteAssinaturaService */
        $PlanoAssinanteAssinaturaService = $this->getService(PLANO_ASSINANTE_ASSINATURA_SERVICE);

        if (!empty($_POST)):
            $retorno = $PlanoAssinanteAssinaturaService->salvaPagamentoAssinante($_POST);
            if ($retorno[SUCESSO]) {
                Redireciona(UrlAmigavel::$modulo . '/' . UrlAmigavel::$controller . '/MeuPlanoAssinante/');
                exit;
            }
        endif;

        $coAssinante = AssinanteService::getCoAssinanteLogado();
        $coPlanoAssinanteAssinatura = UrlAmigavel::PegaParametro(CO_PLANO_ASSINANTE_ASSINATURA);
        $res = [];
        if (AssinanteService::assianteNaoEncontrado($coAssinante)) {
            /** @var AssinanteEntidade $assinante */
            $assinante = $assinanteService->PesquisaUmRegistro($coAssinante);
            $res[CO_ASSINANTE] = $coAssinante;
            $res[DT_EXPIRACAO] = Valida::DataShow($assinante->getDtExpiracao());
            if ($coPlanoAssinanteAssinatura) {
                /** @var PlanoAssinanteAssinaturaEntidade $planoAssinanteAssinatura */
                $planoAssinanteAssinatura =
                    $PlanoAssinanteAssinaturaService->PesquisaUmRegistro($coPlanoAssinanteAssinatura);
                $res[CO_PLANO] = $planoAssinanteAssinatura->getCoPlanoAssinante()->getCoPlano()->getCoPlano();
                $res[CO_PLANO_ASSINANTE_ASSINATURA] = $planoAssinanteAssinatura->getCoPlanoAssinanteAssinatura();
            }
        }
        $this->form = AssinanteForm::Pagamento($res);
    }

    public function DadosComplementaresAssinante()
    {
        /** @var AssinanteService $assinanteService */
        $assinanteService = $this->getService(ASSINANTE_SERVICE);

        if (!empty($_POST)):
            $retorno = $assinanteService->salvaDadosComplementaresAssinante($_POST, $_FILES);
            if ($retorno[SUCESSO]) {
                Redireciona(UrlAmigavel::$modulo . '/' . CONTROLLER_INICIAL_ADMIN . '/' . ACTION_INICIAL_ADMIN);
            }
        endif;

        /** @var EnderecoService $enderecoService */
        $enderecoService = $this->getService(ENDERECO_SERVICE);
        /** @var ContatoService $contatoService */
        $contatoService = $this->getService(CONTATO_SERVICE);
        /** @var EmpresaService $empresaService */
        $empresaService = $this->getService(EMPRESA_SERVICE);

        $coAssinante = UrlAmigavel::PegaParametro(CO_ASSINANTE);
        /** @var AssinanteEntidade $assinante */
        $assinante = $assinanteService->getAssinanteLogado($coAssinante);

        $coAssinante = $assinante->getCoAssinante();

        // Aba 1
        $res[NO_PESSOA] = $assinante->getCoPessoa()->getNoPessoa();
        $res[NO_FANTASIA] = $assinante->getCoEmpresa()->getNoFantasia();
        $res[NO_EMPRESA] = $assinante->getCoEmpresa()->getNoEmpresa();
        $res[NU_CNPJ] = $assinante->getCoEmpresa()->getNuCnpj();
        $res[NU_INSC_ESTADUAL] = $assinante->getCoEmpresa()->getNuInscEstadual();
        $res[DS_OBSERVACAO] = $assinante->getCoEmpresa()->getDsObservacao();


        // Aba 2
        /** @var EnderecoEntidade $endereco */
        $endereco = $enderecoService->PesquisaUmRegistro($assinante->getCoEmpresa()->getCoEndereco());
        if (!$endereco) {
            $end[DS_ENDERECO] = '';
            $coEndereco = $enderecoService->Salva($end);
            /** @var EnderecoEntidade $endereco */
            $endereco = $enderecoService->PesquisaUmRegistro($coEndereco);
            $empresa[CO_ENDERECO] = $coEndereco;
            $empresaService->Salva($empresa, $assinante->getCoEmpresa()->getCoEmpresa());
        }
        $res = $enderecoService->getArrayDadosEndereco($endereco, $res);


        // Aba 3
        /** @var ContatoEntidade $contato */
        $contato = $assinante->getCoPessoa()->getCoContato();
        if ($contato) {
            $res = $contatoService->getArrayDadosContato($contato, $res);
        }

        // Aba 4
        $logo = '';
        $imagem_logo = '';

        if (!empty($assinante->getCoImagemAssinante())) {
            $imagem_logo = $assinante->getLogoImagemAssinante()->getCoImagem()->getCoImagem();
            $logo = "Assinante/Assinante-" . $coAssinante . "/" .
                $assinante->getLogoImagemAssinante()->getCoImagem()->getDsCaminho();
        }

        $res[DS_CAMINHO] = $logo;
        $res['imagem_logo'] = $imagem_logo;

        $this->form = AssinanteForm::DadosComplementares($res);
    }

    public function ListarAssinantePesquisaAvancada()
    {
        /** @var Session $session */
        $session = new Session();
        $resultPreco = $session::getSession('resultPreco');
        $resultPreco = ((float)$resultPreco['min_valor'] - 1) . '-' . ((int)$resultPreco['max_valor'] + 1);
        echo AssinanteForm::Pesquisar($resultPreco);
    }

    public static function getValorPlano($coPlano)
    {
        /** @var PlanoService $planoService */
        $planoService = static::getServiceStatic(PLANO_SERVICE);
        return $planoService->getValorPlano($coPlano);
    }

    public function CancelarAssinaturaAssinante()
    {
        /** @var PlanoAssinanteAssinaturaService $PlanoAssAssinaturaService */
        $PlanoAssAssinaturaService = $this->getService(PLANO_ASSINANTE_ASSINATURA_SERVICE);
        $code = UrlAmigavel::PegaParametro(DS_CODE_TRANSACAO);
        $PlanoAssAssinaturaService->CancelarAssinaturaAssinante($code);
        Redireciona(UrlAmigavel::$modulo . '/' . UrlAmigavel::$controller . '/MeuPlanoAssinante/');
    }

    public function EstornarAssinaturaAssinante()
    {
        /** @var PlanoAssinanteAssinaturaService $PlanoAssAssinaturaService */
        $PlanoAssAssinaturaService = $this->getService(PLANO_ASSINANTE_ASSINATURA_SERVICE);
        $code = UrlAmigavel::PegaParametro(DS_CODE_TRANSACAO);
        $PlanoAssAssinaturaService->EstornarAssinaturaAssinante($code);
        Redireciona(UrlAmigavel::$modulo . '/' . UrlAmigavel::$controller . '/MeuPlanoAssinante/');
    }

    public function NotificacaoPagSeguro()
    {
        /** @var PlanoAssinanteAssinaturaService $PlanoAssAssinaturaService */
        $PlanoAssAssinaturaService = $this->getService(PLANO_ASSINANTE_ASSINATURA_SERVICE);

        $id = "CadastrarNotificaacao";

        if (!empty($_POST[$id])):
            $retorno = $PlanoAssAssinaturaService->notificacaoPagSeguro($_POST['notificationCode'], true);
            if ($retorno[SUCESSO]) {
                Redireciona(UrlAmigavel::$modulo . '/' . UrlAmigavel::$controller . '/MeuPlanoAssinante/');
            }
        endif;

        $this->form = AssinanteForm::CadastrarNotificaacao();

    }

    public static function DetalharPagamentoAjax($coPlanoAssAss)
    {
        /** @var PlanoAssinanteAssinaturaService $PlanoAssAssinaturaService */
        $PlanoAssAssinaturaService = static::getServiceStatic(PLANO_ASSINANTE_ASSINATURA_SERVICE);
        return $PlanoAssAssinaturaService->DetalharPagamentoAjax($coPlanoAssAss);
    }
}
   