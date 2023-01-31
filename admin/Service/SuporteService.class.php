<?php

/**
 * SuporteService.class [ SEVICE ]
 * @copyright (c) 2020, Leo Bessa
 */
class  SuporteService extends AbstractService
{

    private $ObjetoModel;


    public function __construct()
    {
        parent::__construct(SuporteEntidade::ENTIDADE);
        $this->ObjetoModel = New SuporteModel();
    }


    public function salvaSuporte($dados, $arquivos)
    {
        /** @var HistoricoSuporteService $historicoSuporteService */
        $historicoSuporteService = $this->getService(HISTORICO_SUPORTE_SERVICE);
        $retorno = [
            SUCESSO => false,
            MSG => null
        ];
        /** @var PDO $PDO */
        $PDO = $this->getPDO();
        $session = new Session();
        $PDO->beginTransaction();

        $suporteValidador = new SuporteValidador();
        /** @var SuporteValidador $validador */
        $validador = $suporteValidador->validarSuporte($dados);
        if ($validador[SUCESSO]) {

            if (!empty($_POST[CO_SUPORTE])):
                $historicoSuporte[CO_SUPORTE] = $dados[CO_SUPORTE];
                $session->setSession(MENSAGEM, ATUALIZADO);
            else:
                $suporte[DT_CADASTRO] = Valida::DataHoraAtualBanco();
                $suporte[DS_ASSUNTO] = trim($dados[DS_ASSUNTO]);
                $suporte[ST_TIPO_ASSUNTO] = $dados[ST_TIPO_ASSUNTO][0];
                $suporte[CO_ASSINANTE] = AssinanteService::getCoAssinanteLogado();

                $historicoSuporte[CO_SUPORTE] = $this->Salva($suporte);
                $session->setSession(MENSAGEM, CADASTRADO);
            endif;

            $historicoSuporte[DT_CADASTRO] = Valida::DataHoraAtualBanco();
            $historicoSuporte[DS_MENSAGEM] = trim($dados[DS_MENSAGEM]);
            $historicoSuporte[ST_LIDO] = SimNaoEnum::NAO;
            $historicoSuporte[CO_USUARIO] = UsuarioService::getCoUsuarioLogado();

            if ($arquivos[DS_CAMINHO]["tmp_name"]):
                /** @var ImagemService $imagemService */
                $imagemService = $this->getService(IMAGEM_SERVICE);
                $up = new Upload();
                $noPasta = "Suporte";

                $foto = $_FILES[DS_CAMINHO];
                $up->UploadImagem($foto, "suporte-" . $historicoSuporte[CO_SUPORTE], $noPasta);
                $imagem[DS_CAMINHO] = $up->getNameImage();
                $historicoSuporte[CO_IMAGEM] = $imagemService->Salva($imagem);
            endif;

            $retorno[SUCESSO] = $historicoSuporteService->Salva($historicoSuporte);

            if ($retorno[SUCESSO]) {
                $retorno[SUCESSO] = true;
                $PDO->commit();
            } else {
                $session->setSession(MENSAGEM, 'Erro ao Salvar o Suporte');
                $retorno[SUCESSO] = false;
                $PDO->rollBack();
            }

        } else {
            Notificacoes::geraMensagem(
                $validador[MSG],
                TiposMensagemEnum::ALERTA
            );
            $retorno = $validador;
        }
        return $retorno;
    }

    /**
     * @param $coSuporte
     * @return array
     */
    public function DeletaSuporte($coSuporte)
    {
        /** @var PDO $PDO */
        $PDO = $this->getPDO();
        $session = new Session();
        $PDO->beginTransaction();
        $retorno = [
            SUCESSO => false,
            MSG => null
        ];
        $dados = [
            ST_STATUS => StatusAcessoEnum::INATIVO
        ];
        $retorno[SUCESSO] = $this->Salva($dados, $coSuporte);
        if ($retorno[SUCESSO]) {
            $retorno[MSG] = ATUALIZADO;
            Notificacoes::geraMensagem(
                "Mensagem de Suporte Apagada com Sucesso!",
                TiposMensagemEnum::SUCESSO
            );
            $retorno[SUCESSO] = true;
            $PDO->commit();
        } else {
            $session->setSession(MENSAGEM, 'Erro ao Salvar o Suporte');
            $retorno[SUCESSO] = false;

            $PDO->rollBack();
        }
        return $retorno;
    }

    public function PesquisaSuportes($Condicoes)
    {
        return $this->ObjetoModel->PesquisaSuportes($Condicoes);
    }

    public function PesquisaAvancada($dados)
    {
        return $this->ObjetoModel->PesquisaAvancada($dados);
    }

    public static function PesquisaCountMensagens()
    {
        /** @var SuporteModel $ObjetoModel */
        $ObjetoModel = New SuporteModel();
        $Condicoes = [
            CO_ASSINANTE => AssinanteService::getCoAssinanteLogado(),
            ST_STATUS => (PerfilService::perfilMaster()) ? null : StatusAcessoEnum::ATIVO,
            ST_LIDO => SimNaoEnum::NAO,
            "<>#ths." . CO_USUARIO => UsuarioService::getCoUsuarioLogado()
        ];
        $retorno = $ObjetoModel->PesquisaSuportes($Condicoes);
        return count($retorno);
    }
}