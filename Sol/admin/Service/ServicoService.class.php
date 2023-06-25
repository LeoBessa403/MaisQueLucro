<?php

/**
 * ServicoService.class [ SEVICE ]
 * @copyright (c) 2019, Leo Bessa
 */
class  ServicoService extends AbstractService
{

    private $ObjetoModel;


    public function __construct()
    {
        parent::__construct(ServicoEntidade::ENTIDADE);
        $this->ObjetoModel = New ServicoModel();
    }

    /**
     * @param $coServico
     * @return bool
     */
    public function ativarServico($coServico)
    {
        return $this->mudarStatusServico($coServico, StatusUsuarioEnum::ATIVO);
    }

    /**
     * @param $coServico
     * @return bool
     */
    public function desativarServico($coServico)
    {
        return $this->mudarStatusServico($coServico, StatusUsuarioEnum::INATIVO);
    }

    /**
     * @param $coServico
     * @param $stStatus
     * @return bool
     */
    private function mudarStatusServico($coServico, $stStatus)
    {
        $retorno = false;
        $dados = [
            ST_STATUS => $stStatus
        ];
        $coServi = $this->Salva($dados, $coServico);
        if ($coServi) {
            $retorno = true;
        }
        return $retorno;
    }

    public function salvaServico($result, $files)
    {
        /** @var PDO $PDO */
        $PDO = $this->getPDO();
        $retorno = [
            SUCESSO => true,
            MSG => null
        ];

        /** @var ImagemService $imagemService */
        $imagemService = $this->getService(IMAGEM_SERVICE);
        /** @var PrecoServicoService $precoServicoService */
        $precoServicoService = $this->getService(PRECO_SERVICO_SERVICE);
        /** @var Session $session */
        $session = new Session();
        /** @var ServicoValidador $ServicoValidador */
        $ServicoValidador = new ServicoValidador();
        $validador = $ServicoValidador->validarServico($result, $files);
        if ($validador[SUCESSO]) {
            $servico[ST_STATUS] = (!empty($result[ST_STATUS])) ? StatusUsuarioEnum::ATIVO : StatusUsuarioEnum::INATIVO;
            $servico[NO_SERVICO] = trim($result[NO_SERVICO]);
            $servico[NU_DURACAO] = $result[NU_DURACAO];
            $servico[DS_DESCRICAO] = trim($result[DS_DESCRICAO]);
            $servico[CO_CATEGORIA_SERVICO] = $result[CO_CATEGORIA_SERVICO][0];
            $servico[ST_ASSISTENTE] = (!empty($result[ST_ASSISTENTE])) ? SimNaoEnum::SIM : SimNaoEnum::NAO;

            $noPasta = "Servico/Assinante-" . AssinanteService::getCoAssinanteLogado();
            $noImagem = Valida::ValNome(strtolower(trim($result[NO_SERVICO])));

            $PDO->beginTransaction();

            // Verifica a existência de uma imagem do serviço
            if (!empty($dados[CO_IMAGEM])) {
                $imagemService->salvaImagem($files, $noImagem, $noPasta, $result[CO_IMAGEM]);
            } else {
                $coImagem = $imagemService->salvaImagem($files, $noImagem, $noPasta);
                if ($coImagem) {
                    $servico[CO_IMAGEM] = $coImagem;
                }
            }

            if (!empty($result[CO_SERVICO])) {
                $this->Salva($servico, $result[CO_SERVICO]);
                $precoServico[CO_SERVICO] = $result[CO_SERVICO];
                $precoServico[DS_OBSERVACAO] = 'Atualizado';
                $session->setSession(MENSAGEM, ATUALIZADO);
            } else {
                $servico[DT_CADASTRO] = Valida::DataHoraAtualBanco();
                $precoServico[CO_SERVICO] = $this->Salva($servico);
                $precoServico[DS_OBSERVACAO] = 'Cadastrado';
                $session->setSession(MENSAGEM, CADASTRADO);
            }

            $precoServico[NU_VALOR] = Valida::FormataMoedaBanco($_POST[NU_VALOR]);
            $precoServico[DT_CADASTRO] = Valida::DataHoraAtualBanco();
            $precoServico[CO_USUARIO] = UsuarioService::getCoUsuarioLogado();
            $retorno[SUCESSO] = $precoServicoService->Salva($precoServico);
            if ($retorno[SUCESSO]) {
                $PDO->commit();
            } else {
                Notificacoes::geraMensagem('Não foi possível Salvar o Serviço', TiposMensagemEnum::ALERTA);
                $PDO->rollBack();
            }
        } else {
            Notificacoes::geraMensagem($validador[MSG], TiposMensagemEnum::ALERTA);
            $retorno = $validador;
        }

        return $retorno;
    }

    public function PesquisaAvancada($Condicoes)
    {
        return $this->ObjetoModel->PesquisaAvancada($Condicoes);
    }

    public function PesquisaAvancadaPreco($Condicoes)
    {
        return $this->ObjetoModel->PesquisaAvancadaPreco($Condicoes);
    }


    public static function servicosCombo()
    {
        /** @var ServicoService $servicoService */
        $servicoService = new ServicoService();
        $comboServicos = [
            '' => Mensagens::MSG_SEM_ITEM_SELECIONADO
        ];
        $servicos = $servicoService->PesquisaTodos([
            CO_ASSINANTE => AssinanteService::getCoAssinanteLogado()
        ]);
        /** @var ServicoEntidade $servico */
        foreach ($servicos as $servico) {
            if ($servico->getStStatus() == StatusAcessoEnum::ATIVO) {
                $comboServicos[$servico->getCoServico()]
                    = $servico->getNoServico();
            }
        }
        return $comboServicos;
    }

    /**
     * @param $coServico
     * @return integer
     */
    public function getPrecoServico($coServico)
    {
        /** @var ServicoService $servicoService */
        $servicoService = new ServicoService();
        /** @var ServicoEntidade $servico */
        $servico = $servicoService->PesquisaUmRegistro($coServico);
        $dados[NU_VALOR] = $servico->getCoUltimoPrecoServico()->getNuValor();
        return $dados;
    }

    /**
     * @param $coServico
     * @return integer
     */
    public function getServicoAjax($coServico)
    {
        /** @var ServicoService $servicoService */
        $servicoService = new ServicoService();
        /** @var ServicoEntidade $servico */
        $servico = $servicoService->PesquisaUmRegistro($coServico);
        $dados[NU_DURACAO] = $servico->getNuDuracao();
        $dados[NU_VALOR] = $servico->getCoUltimoPrecoServico()->getNuValor();
        return $dados;
    }

}