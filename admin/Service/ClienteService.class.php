<?php

/**
 * ClienteService.class [ SEVICE ]
 * @copyright (c) 2019, Leo Bessa
 */
class  ClienteService extends AbstractService
{

    private $ObjetoModel;


    public function __construct()
    {
        parent::__construct(ClienteEntidade::ENTIDADE);
        $this->ObjetoModel = New ClienteModel();
    }


    /**
     * @param $dados
     * @param $arquivos
     * @return array|AssinanteValidador
     */
    public function salvaCliente($dados, $arquivos)
    {
        /** @var EnderecoService $enderecoService */
        $enderecoService = $this->getService(ENDERECO_SERVICE);
        /** @var ContatoService $contatoService */
        $contatoService = $this->getService(CONTATO_SERVICE);
        /** @var PessoaService $pessoaService */
        $pessoaService = $this->getService(PESSOA_SERVICE);
        /** @var ClienteService $clienteService */
        $clienteService = $this->getService(CLIENTE_SERVICE);
        /** @var ImagemService $imagemService */
        $imagemService = $this->getService(IMAGEM_SERVICE);
        /** @var PDO $PDO */
        $PDO = $this->getPDO();
        $session = new Session();
        $retorno = [
            SUCESSO => false,
            MSG => null
        ];

        $PDO->beginTransaction();

        $clienteValidador = new ClienteValidador();
        /** @var ClienteValidador $validador */
        $validador = $clienteValidador->validarCliente($dados);
        if ($validador[SUCESSO]) {
            // Monta os dados para Salvar
            $endereco = $this->getDados($dados, EnderecoEntidade::ENTIDADE);
            $contato = $this->getDados($dados, ContatoEntidade::ENTIDADE);
            $pessoa = $this->getDados($dados, PessoaEntidade::ENTIDADE);
            $pessoa[DT_NASCIMENTO] = Valida::DataDBDate($dados[DT_NASCIMENTO]);
            $cliente = $this->getDados($dados, ClienteEntidade::ENTIDADE);
            $cliente[ST_RECEBER_EMAIL_AGENDAMENTO] = Valida::retornoCheckbox($dados, ST_RECEBER_EMAIL_AGENDAMENTO);
            $cliente[ST_LEMBRETE_HORARIO_AGENDAMENTO] = Valida::retornoCheckbox($dados, ST_LEMBRETE_HORARIO_AGENDAMENTO);
            $cliente[ST_EMAIL_MARKETING] = Valida::retornoCheckbox($dados, ST_EMAIL_MARKETING);
            $cliente[ST_SMS_MARKETING] = Valida::retornoCheckbox($dados, ST_SMS_MARKETING);
            $coCliente = null;

            if (!empty($dados[CO_CLIENTE])) {
                $coCliente = $dados[CO_CLIENTE];
                $enderecoService->Salva($endereco, $dados[CO_ENDERECO]);
                $contatoService->Salva($contato, $dados[CO_CONTATO]);
                // Verifica a existência de uma imagem de perfil
                if (!empty($dados[CO_IMAGEM])) {
                    $imagemService->salvaImagem($arquivos, $dados[NO_PESSOA], 'clientes/', $dados[CO_IMAGEM]);
                } else {
                    $pessoa[CO_IMAGEM] = $imagemService->salvaImagem($arquivos, $dados[NO_PESSOA], 'clientes/');
                }
                $pessoaService->Salva($pessoa, $dados[CO_PESSOA]);
                $retorno[SUCESSO] = $clienteService->Salva($cliente, $coCliente);
                $session->setSession(MENSAGEM, ATUALIZADO);
            } else {
                $coEndereco = $enderecoService->Salva($endereco);
                if ($coEndereco) {
                    $coContato = $contatoService->Salva($contato);
                    if ($coContato) {
                        $coImagem = $imagemService->salvaImagem($arquivos, $dados[NO_PESSOA], 'clientes/');
                        $pessoa[CO_IMAGEM] = $coImagem;
                        $pessoa[CO_CONTATO] = $coContato;
                        $pessoa[CO_ENDERECO] = $coEndereco;
                        $coPessoa = $pessoaService->Salva($pessoa);
                        if ($coPessoa) {
                            $cliente[CO_PESSOA] = $coPessoa;
                            $cliente[CO_ASSINANTE] = AssinanteService::getCoAssinanteLogado();
                            $cliente[ST_STATUS] = StatusAcessoEnum::ATIVO;
                            $retorno[SUCESSO] = $clienteService->Salva($cliente);
                            $session->setSession(MENSAGEM, CADASTRADO);
                        }
                    }
                }
            }
        } else {
            $retorno = $validador;
        }

        if ($retorno[SUCESSO]) {
            $retorno[SUCESSO] = true;
            $PDO->commit();
        } else {
            Notificacoes::geraMensagem(
                $validador[MSG],
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


    public static function clientesCombo()
    {
        /** @var ClienteService $clienteService */
        $clienteService = new ClienteService();
        $comboClientes = [
            '' => Mensagens::MSG_SEM_ITEM_SELECIONADO
        ];
        $clientes = $clienteService->PesquisaTodos([
            CO_ASSINANTE => AssinanteService::getCoAssinanteLogado(),
            ST_STATUS => StatusAcessoEnum::ATIVO
        ]);
        /** @var ClienteEntidade $cliente */
        foreach ($clientes as $cliente) {
            $comboClientes[$cliente->getCoCliente()]
                = $cliente->getCoPessoa()->getNoPessoa(). ' - ' .
                Valida::MascaraTel($cliente->getCoPessoa()->getCoContato()->getNuTel1());
        }
        return $comboClientes;
    }

}