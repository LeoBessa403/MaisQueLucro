<?php

/**
 * ProfissionalService.class [ SEVICE ]
 * @copyright (c) 2018, Leo Bessa
 */
class  ProfissionalService extends AbstractService
{

    private $ObjetoModel;


    public function __construct()
    {
        parent::__construct(ProfissionalEntidade::ENTIDADE);
        $this->ObjetoModel = new ProfissionalModel();
    }


    /**
     * @param $dados
     * @param $arquivos
     * @return array|AssinanteValidador
     */
    public function salvaProfisssional($dados, $arquivos)
    {
        /** @var EnderecoService $enderecoService */
        $enderecoService = $this->getService(ENDERECO_SERVICE);
        /** @var ContatoService $contatoService */
        $contatoService = $this->getService(CONTATO_SERVICE);
        /** @var PessoaService $pessoaService */
        $pessoaService = $this->getService(PESSOA_SERVICE);
        /** @var UsuarioService $usuarioService */
        $usuarioService = $this->getService(USUARIO_SERVICE);
        /** @var ProfissionalService $profissionalService */
        $profissionalService = $this->getService(PROFISSIONAL_SERVICE);
        /** @var ImagemService $imagemService */
        $imagemService = $this->getService(IMAGEM_SERVICE);
        /** @var UsuarioPerfilService $usuarioPerfilService */
        $usuarioPerfilService = $this->getService(USUARIO_PERFIL_SERVICE);

        /** @var PDO $PDO */
        $PDO = $this->getPDO();
        $session = new Session();
        $retorno = [
            SUCESSO => false,
            MSG => null
        ];

        $PDO->beginTransaction();

        $profissionalValidador = new ProfissionalValidador();
        /** @var ProfissionalValidador $validador */
        $validador = $profissionalValidador->validarProfissional($dados);
        if ($validador[SUCESSO]) {
            // Monta os dados para Salvar
            $endereco = $this->getDados($dados, EnderecoEntidade::ENTIDADE);
            $contato = $this->getDados($dados, ContatoEntidade::ENTIDADE);
            $pessoa = $this->getDados($dados, PessoaEntidade::ENTIDADE);
            $pessoa[DT_NASCIMENTO] = Valida::DataDBDate($dados[DT_NASCIMENTO]);
            $profissional = $this->getDados($dados, ProfissionalEntidade::ENTIDADE);
            $coProfissional = null;
            $profissional[ST_STATUS] = StatusAcessoEnum::ATIVO;

            if (empty($dados[CO_ENDERECO])) {
                $coEndereco = $enderecoService->Salva($endereco);
            } else {
                $enderecoService->Salva($endereco, $dados[CO_ENDERECO]);
                $coEndereco = $dados[CO_ENDERECO];
            }

            if (empty($dados[CO_CONTATO])) {
                $coContato = $contatoService->Salva($contato);
            } else {
                $enderecoService->Salva($endereco, $dados[CO_CONTATO]);
                $coContato = $dados[CO_CONTATO];
            }

            $pessoa[CO_CONTATO] = $coContato;
            $pessoa[CO_ENDERECO] = $coEndereco;

            if (!empty($dados[CO_PROFISSIONAL])) {
                $coProfissional = $dados[CO_PROFISSIONAL];

                $contatoService->Salva($contato, $dados[CO_CONTATO]);
                $pessoaService->Salva($pessoa, $dados[CO_PESSOA]);
                // Verifica a existência de uma imagem de perfil
                if (!empty($dados[CO_IMAGEM])) {
                    $imagemService->salvaImagem($arquivos, $dados[NO_PESSOA], 'usuarios/', $dados[CO_IMAGEM]);
                } else {
                    $profissional[CO_IMAGEM] = $imagemService->salvaImagem($arquivos, $dados[NO_PESSOA], 'usuarios/');
                }
                $profissionalService->Salva($profissional, $coProfissional);
                $session->setSession(MENSAGEM, ATUALIZADO);
            } else {

                $coPessoa = $pessoaService->Salva($pessoa);
                if ($coPessoa) {
                    $coImagem = $imagemService->salvaImagem($arquivos, $dados[NO_PESSOA], 'usuarios/');
                    $profissional[CO_IMAGEM] = $coImagem;
                    $profissional[CO_PESSOA] = $coPessoa;
                    $profissional[CO_ASSINANTE] = AssinanteService::getCoAssinanteLogado();
                    $profissionalService->Salva($profissional);
                }
                $session->setSession(MENSAGEM, CADASTRADO);
            }
            $retorno = [SUCESSO => true];
        } else {
            $retorno = $validador;
        }

        if ($retorno[SUCESSO]) {
            $retorno[SUCESSO] = true;
            $PDO->commit();
        } else {
            Notificacoes::geraMensagem(
                $retorno[MSG],
                TiposMensagemEnum::ALERTA
            );
            $retorno[SUCESSO] = false;
            $PDO->rollBack();
        }

        return $retorno;
    }

    public function PesquisaAvancada($Condicoes)
    {
        return $this->ObjetoModel->PesquisaAvancada($Condicoes);
    }

    /**
     * @return array
     */
    public static function AssistentesAtivosCombo()
    {
        /** @var ProfissionalService $profissionalService */
        $profissionalService = new ProfissionalService();

        $todosProfissionais = $profissionalService->PesquisaTodos([
            CO_ASSINANTE => AssinanteService::getCoAssinanteLogado(),
            ST_STATUS => StatusUsuarioEnum::ATIVO,
            ST_ASSISTENTE => SimNaoEnum::SIM
        ]);

        $comboAssistentes = [
            '' => Mensagens::MSG_SEM_ITEM_SELECIONADO
        ];

        /** @var ProfissionalEntidade $profissional */
        foreach ($todosProfissionais as $profissional) {
            $comboAssistentes[$profissional->getCoProfissional()]
                = Valida::Resumi(strtoupper($profissional->getCoPessoa()->getNoPessoa()), 25);
        }
        return $comboAssistentes;
    }

    public static function ProfissionaisAtivosCombo()
    {
        /** @var ProfissionalService $profissionalService */
        $profissionalService = new ProfissionalService();
        $comboProfissionais = [
            '' => Mensagens::MSG_SEM_ITEM_SELECIONADO
        ];
        $profissionais = $profissionalService->PesquisaTodos([
            CO_ASSINANTE => AssinanteService::getCoAssinanteLogado(),
            ST_STATUS => StatusAcessoEnum::ATIVO
        ]);
        /** @var ProfissionalEntidade $profissional */
        foreach ($profissionais as $profissional) {
            $comboProfissionais[$profissional->getCoProfissional()]
                = Valida::Resumi(strtoupper($profissional->getCoPessoa()->getNoPessoa()), 25);
        }
        return $comboProfissionais;
    }

    /**
     * @param $coProfissional
     * @return array
     */
    public function desativarProfissional($coProfissional, $motivo)
    {
        return $this->mudarStatusProfissional($coProfissional, StatusUsuarioEnum::INATIVO, $motivo);
    }

    /**
     * @param $coProfissional
     * @return array
     */
    public function ativarProfissional($coProfissional)
    {
        return $this->mudarStatusProfissional($coProfissional, StatusUsuarioEnum::ATIVO, '');
    }

    /**
     * @param $coProfissional
     * @param $stStatus
     * @param $motivo
     * @return array
     */
    private function mudarStatusProfissional($coProfissional, $stStatus, $motivo)
    {
        $dados = [
            ST_STATUS => $stStatus,
            DS_MOTIVO => $motivo,
        ];

        $coProfissionalEd = $this->Salva($dados, $coProfissional);

        if ($coProfissionalEd) {
            if ($motivo) {
                $retorno[MSG] = DELETADO;
            } else {
                $retorno[MSG] = ATUALIZADO;
            }
            $retorno[SUCESSO] = true;
        } else {
            $retorno[MSG] = 'Não foi possível alterar o Produto';
            $retorno[SUCESSO] = false;
        }
        return $retorno;
    }

}