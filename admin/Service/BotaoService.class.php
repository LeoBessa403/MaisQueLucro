<?php

/**
 * BotaoService.class [ SERVICE ]
 * @copyright (c) 2021, Leo Bessa
 */
class  BotaoService extends AbstractService
{

    private $ObjetoModel;


    public function __construct()
    {
        parent::__construct(BotaoEntidade::ENTIDADE);
        $this->ObjetoModel = New BotaoModel();
    }

    public function salvBotao($dados)
    {
        $retorno = [
            SUCESSO => false,
            MSG => null
        ];
        /** @var Session $session */
        $session = new Session();

        $BotaoValidador = new BotaoValidador();
        /** @var BotaoValidador $validador */
        $validador = $BotaoValidador->validarBotao($dados);
        if ($validador[SUCESSO]) {
            $btn[NO_BOTAO] = trim($dados[NO_BOTAO]);
            $btn[DS_BOTAO] = trim($dados[DS_BOTAO]);
            if (!empty($dados[ST_STATUS])):
                $btn[ST_STATUS] = StatusUsuarioEnum::ATIVO;
            else:
                $btn[ST_STATUS] = StatusUsuarioEnum::INATIVO;
            endif;

            if (!empty($_POST[CO_BOTAO])):
                $cobOTAO = $_POST[CO_BOTAO];
                $retorno[SUCESSO] = $this->Salva($btn, $cobOTAO);
                $session->setSession(MENSAGEM, ATUALIZADO);
            else:
                $btn[NU_TOTAL_CLIQUES] = 0;
                $retorno[SUCESSO] = $this->Salva($btn);
                $session->setSession(MENSAGEM, CADASTRADO);

            endif;
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
     * @param $dados
     * @return array|AssinanteValidador
     */
    public function FinalizarAgendamento($dados)
    {
        /** @var AgendaService $agendaService */
        $agendaService = $this->getService(AGENDA_SERVICE);
        /** @var StatusAgendaService $statusAgendaService */
        $statusAgendaService = $this->getService(STATUS_AGENDA_SERVICE);
        /** @var PDO $PDO */
        $PDO = $this->getPDO();
        $retorno = [
            SUCESSO => false,
            MSG => null
        ];

        $PDO->beginTransaction();

        $agendaValidador = new AgendaValidador();
        /** @var AgendaValidador $validador */
        $validador = $agendaValidador->validarFinalizarAgendamento($dados);
        if ($validador[SUCESSO]) {

            $agenda = $agendaService->PesquisaAgendamentos([
                'ta.' . CO_AGENDA => $dados[CO_AGENDA]
            ], 'tc.co_cliente, tp.co_profissional, tsa.ds_observacao, ts.co_servico');

            $agenda = $agenda[0];

            $statusAgenda[CO_AGENDA] = $dados[CO_AGENDA];
            $statusAgenda[DT_CADASTRO] = Valida::DataHoraAtualBanco();
            $statusAgenda[ST_STATUS] = StatusAgendamentoEnum::FINALIZADO;
            $statusAgenda[DT_INICIO_AGENDA] = $agenda[DT_INICIO_AGENDA];
            $statusAgenda[DT_FIM_AGENDA] = $agenda[DT_FIM_AGENDA];
            $statusAgenda[DS_OBSERVACAO] = $agenda[DS_OBSERVACAO];
            $statusAgenda[CO_USUARIO] = UsuarioService::getCoUsuarioLogado();
            $statusAgenda[CO_CLIENTE] = $agenda[CO_CLIENTE];
            $statusAgenda[CO_SERVICO] = $agenda[CO_SERVICO];
            $statusAgenda[CO_PROFISSIONAL] = $agenda[CO_PROFISSIONAL];
            $retorno[SUCESSO] = $statusAgendaService->Salva($statusAgenda);
        } else {
            $retorno = $validador;
        }

        if ($retorno[SUCESSO]) {
            $retorno[SUCESSO] = true;
            $retorno[MSG] = ATUALIZADO;
            $PDO->commit();
        } else {
            $retorno[MSG] = $validador[MSG];
            $retorno[SUCESSO] = false;
            $PDO->rollBack();
        }

        return $retorno;
    }

}