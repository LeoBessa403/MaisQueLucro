<?php

class Suporte extends AbstractController
{
    public $result;
    public $form;
    public $mensagem;

    public function ListarSuporte()
    {
        /** @var SuporteService $suporteService */
        $suporteService = $this->getService(SUPORTE_SERVICE);
        /** @var HistoricoSuporteService $historicoSuporteService */
        $historicoSuporteService = $this->getService(HISTORICO_SUPORTE_SERVICE);
        $mensagem = null;
        $coSuporte = UrlAmigavel::PegaParametro(CO_SUPORTE);
        if ($coSuporte) {
            /** @var SuporteEntidade $mensagem */
            $mensagem = $suporteService->PesquisaUmRegistro($coSuporte);

            if ($mensagem->getCoUltimaMensagem()->getCoUsuario()->getCoUsuario() !=
                UsuarioService::getCoUsuarioLogado()) {
                $historicoSuporteService->Salva([ST_LIDO => SimNaoEnum::SIM],
                    $mensagem->getCoUltimaMensagem()->getCoHistoricoSuporte());
            }
        }
        $this->mensagem = $mensagem;
        if (!empty($_POST)):
            $Condicoes = [
                CO_ASSINANTE => AssinanteService::getCoAssinanteLogado(),
                ST_STATUS => (PerfilService::perfilMaster()) ? null : StatusAcessoEnum::ATIVO,
                'txt_pesquisa' => $_POST["txt_pesquisa"]
            ];
            $this->result = $suporteService->PesquisaAvancada($Condicoes);
        else:
            $Condicoes = [
                CO_ASSINANTE => AssinanteService::getCoAssinanteLogado(),
                ST_STATUS => (PerfilService::perfilMaster()) ? null : StatusAcessoEnum::ATIVO
            ];
            $this->result = $suporteService->PesquisaSuportes($Condicoes);
        endif;
    }

    public function CadastroSuporte()
    {
        /** @var SuporteService $suporteService */
        $suporteService = $this->getService(SUPORTE_SERVICE);

        $id = "cadastroSuporte";

        if (!empty($_POST[$id])):
            $retorno = $suporteService->salvaSuporte($_POST, $_FILES);
            if ($retorno[SUCESSO]) {
                Redireciona(UrlAmigavel::$modulo . '/' . UrlAmigavel::$controller . '/ListarSuporte/');
            }
        endif;

        $coSuporte = UrlAmigavel::PegaParametro(CO_SUPORTE);
        $res = [];
        if ($coSuporte) {
            /** @var SuporteEntidade $suporte */
            $suporte = $suporteService->PesquisaUmRegistro($coSuporte);
            $res[ST_TIPO_ASSUNTO] = TipoAssuntoEnum::getDescricaoValor($suporte->getStTipoAssunto());
            $res[DS_ASSUNTO] = $suporte->getDsAssunto();
            $res[CO_SUPORTE] = $coSuporte;
        }

        $this->form = SuporteForm::Cadastrar($res);
    }

    public function DeletaSuporte()
    {
        /** @var SuporteService $suporteService */
        $suporteService = $this->getService(SUPORTE_SERVICE);
        $coSuporte = $_POST['codigo'];
        if ($coSuporte) {
            return $suporteService->DeletaSuporte($coSuporte);
        } else {
            Notificacoes::geraMensagem(
                'Suporte Não encontrado',
                TiposMensagemEnum::ALERTA
            );
            Redireciona(UrlAmigavel::$modulo . '/' . CONTROLLER_INICIAL_ADMIN . '/' . ACTION_INICIAL_ADMIN);
        }
    }
}