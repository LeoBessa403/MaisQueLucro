<?php

class Profissional extends AbstractController
{
    public $result;
    public $form;
    public $profissional;

    public function ListarProfissional()
    {
        /** @var ProfissionalService $profissionalService */
        $profissionalService = $this->getService(PROFISSIONAL_SERVICE);
        /** @var Session $session */
        $session = new Session();
        if ($session->CheckSession(PESQUISA_AVANCADA)) {
            $session->FinalizaSession(PESQUISA_AVANCADA);
        }
        $Condicoes = [];
        $Condicoes[CO_ASSINANTE] = AssinanteService::getCoAssinanteLogado();

        if (!empty($_POST)) {
            $Condicoes = array(
                "pes." . NO_PESSOA => trim($_POST[NO_PESSOA]),
                "pes." . ST_SEXO => $_POST[ST_SEXO][0],
                "in#month(pes." . DT_NASCIMENTO . ")" => (!empty($_POST['mes_aniversariante']))
                    ? implode("', '", $_POST['mes_aniversariante']) : null,
            );
            $this->result = $profissionalService->PesquisaAvancada($Condicoes);
            $session->setSession(PESQUISA_AVANCADA, $Condicoes);
        } else {
            $this->result = $profissionalService->PesquisaAvancada($Condicoes);
        }

    }

    public function ListarProfissionalPesquisaAvancada()
    {
        echo ProfissionalForm::Pesquisar();
    }

    public function CadastroProfissional()
    {
        /** @var ProfissionalService $profissionalService */
        $profissionalService = $this->getService(PROFISSIONAL_SERVICE);

        if (!empty($_POST)):
            $retorno = $profissionalService->salvaProfisssional($_POST, $_FILES);
            if ($retorno[SUCESSO]) {
                Redireciona(UrlAmigavel::$modulo . '/Profissional/ListarProfissional/');
            }
        endif;
        /** @var EnderecoService $enderecoService */
        $enderecoService = $this->getService(ENDERECO_SERVICE);
        /** @var ContatoService $contatoService */
        $contatoService = $this->getService(CONTATO_SERVICE);
        /** @var PessoaService $pessoaService */
        $pessoaService = $this->getService(PESSOA_SERVICE);

        $coProfissional = UrlAmigavel::PegaParametro(CO_PROFISSIONAL);
        if ($coProfissional) {
            /** @var ProfissionalService $profissionalService */
            $profissionalService = $this->getService(PROFISSIONAL_SERVICE);
            /** @var ProfissionalEntidade $profissional */
            $profissional = $profissionalService->PesquisaUmRegistro($coProfissional);
            // Aba 1
            $res = $pessoaService->getArrayDadosPessoa($profissional->getCoPessoa(), []);
            $res[NO_APELIDO] = $profissional->getNoApelido();
            $res[DS_SOBRE] = $profissional->getDsSobre();
            // Carrega a Imagem de perfil
            $foto = null;
            if (!empty($profissional->getCoImagem()) &&
                (file_exists(PASTA_RAIZ . "uploads/usuarios/" . $profissional->getCoImagem()->getDsCaminho()))) {
                $foto = "usuarios/" . $profissional->getCoImagem()->getDsCaminho();
            }
            $res[DS_CAMINHO] = $foto;

            // Aba 2
            if ($profissional->getCoPessoa()->getCoEndereco()) {
                /** @var EnderecoEntidade $endereco */
                $endereco = $enderecoService->PesquisaUmRegistro(
                    $profissional->getCoPessoa()->getCoEndereco()->getCoEndereco()
                );
                $res = $enderecoService->getArrayDadosEndereco($endereco, $res);
                $res[CO_ENDERECO] = $profissional->getCoPessoa()->getCoEndereco()->getCoEndereco();
            } else {
                $res[CO_ENDERECO] = null;
            }

            // Aba 3
            if ($profissional->getCoPessoa()->getCoContato()) {
                /** @var ContatoEntidade $contato */
                $contato = $contatoService->PesquisaUmRegistro(
                    $profissional->getCoPessoa()->getCoContato()->getCoContato()
                );
                $res = $contatoService->getArrayDadosContato($contato, $res);
                $res[CO_CONTATO] = $profissional->getCoPessoa()->getCoContato()->getCoContato();
            } else {
                $res[CO_CONTATO] = null;
            }

            // Inicia parametros para edição
            $res[CO_PROFISSIONAL] = $profissional->getCoProfissional();
            $res[CO_PESSOA] = $profissional->getCoPessoa()->getCoPessoa();
            $res[CO_IMAGEM] = ($profissional->getCoImagem())
                ? $profissional->getCoImagem()->getCoImagem() : null;

            // Carrega a Imagem do Profissional
            $foto = null;
            $noPasta = 'usuarios/';
            if (!empty($profissional->getCoImagem())) {
                if (file_exists(PASTA_UPLOADS . $profissional->getCoImagem()->getDsCaminho())) {
                    $foto = $profissional->getCoImagem()->getDsCaminho();
                } elseif (file_exists(PASTA_UPLOADS . $noPasta . $profissional->getCoImagem()->getDsCaminho())) {
                    $foto = $noPasta . $profissional->getCoImagem()->getDsCaminho();
                }
            }
            $res[DS_CAMINHO] = $foto;

        }else{
            Notificacoes::geraMensagem(
                'Profissional Não selecionado(a)!',
                TiposMensagemEnum::ALERTA
            );
            Redireciona(UrlAmigavel::$modulo . '/Profissional/ListarProfissional/');
        }

        $this->form = ProfissionalForm::Cadastrar($res);
    }

    public static function DesativarProfissional($dados)
    {
        /** @var ProfissionalService $profissionalService */
        $profissionalService = static::getServiceStatic(PROFISSIONAL_SERVICE);
        return $profissionalService->desativarProfissional($dados['codigo'], $dados[DS_MOTIVO]);
    }

    public function AtivarProfissional($dados)
    {
        /** @var ProfissionalService $profissionalService */
        $profissionalService = static::getServiceStatic(PROFISSIONAL_SERVICE);
        return $profissionalService->ativarProfissional($dados['codigo']);
    }

}