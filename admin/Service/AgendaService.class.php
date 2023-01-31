<?php

/**
 * AgendaService.class [ SEVICE ]
 * @copyright (c) 2019, Leo Bessa
 */
class  AgendaService extends AbstractService
{

    private $ObjetoModel;


    public function __construct()
    {
        parent::__construct(AgendaEntidade::ENTIDADE);
        $this->ObjetoModel = new AgendaModel();
    }

    public function PesquisaAgendamentos($Condicoes, $maisCampos = null)
    {
        return $this->ObjetoModel->PesquisaAgendamentos($Condicoes, $maisCampos);
    }

    /**
     * @param $dados
     * @return array|AssinanteValidador
     */
    public function salvaAgendamentoAjax($dados)
    {
        $dados = Valida::montaArrayAjax($dados);

        /** @var StatusAgendaService $statusAgendaService */
        $statusAgendaService = $this->getService(STATUS_AGENDA_SERVICE);
        /** @var ClienteService $clienteService */
        $clienteService = $this->getService(CLIENTE_SERVICE);
        /** @var ContatoService $ContatoService */
        $ContatoService = $this->getService(CONTATO_SERVICE);
        /** @var ServicoService $servicoService */
        $servicoService = $this->getService(SERVICO_SERVICE);
        /** @var PessoaService $pessoaService */
        $pessoaService = $this->getService(PESSOA_SERVICE);
        /** @var PDO $PDO */
        $PDO = $this->getPDO();
        $retorno = [
            SUCESSO => false,
            MSG => null
        ];

        $PDO->beginTransaction();

        $agendaValidador = new AgendaValidador();
        /** @var AgendaValidador $validador */
        $validador = $agendaValidador->validarAgendamento($dados);
        if ($validador[SUCESSO]) {

            if (!empty($dados[CO_AGENDA])) {
                $statusAgenda[CO_AGENDA] = $dados[CO_AGENDA];
                $retorno[MSG] = ATUALIZADO;
            } else {
                $agenda[DT_CADASTRO] = Valida::DataHoraAtualBanco();
                $agenda[CO_ASSINANTE] = AssinanteService::getCoAssinanteLogado();
                $statusAgenda[CO_AGENDA] = $this->Salva($agenda);
                $retorno[MSG] = CADASTRADO;
            }

            $statusAgenda[DT_CADASTRO] = Valida::DataHoraAtualBanco();
            $statusAgenda[ST_STATUS] = $dados[ST_STATUS];
            $statusAgenda[DT_INICIO_AGENDA] = Valida::DataDB($dados['dt_agenda'] . ' ' .
                $dados['nu_hora_inicio_agenda'] . ':00');
            $statusAgenda[DT_FIM_AGENDA] = Valida::DataDB($dados['dt_agenda'] . ' ' .
                $dados['nu_hora_fim_agenda'] . ':00');
            $statusAgenda[NU_VALOR] = 0.00;
            $statusAgenda[NU_DURACAO] = 0;
            $statusAgenda[DS_OBSERVACAO] = trim($dados[DS_OBSERVACAO]);
            $statusAgenda[CO_USUARIO] = UsuarioService::getCoUsuarioLogado();

            if (!empty($dados[CO_PROFISSIONAL]) && empty($dados['st_profissional'])) {
                $statusAgenda[CO_PROFISSIONAL] = $dados[CO_PROFISSIONAL];
            } elseif (!empty($dados['no_profissional']) && !empty($dados['st_profissional'])) {

                /** @var ProfissionalService $profissionalService */
                $profissionalService = new ProfissionalService();

                $pessoa[NO_PESSOA] = $dados['no_profissional'];
                $profissional[CO_PESSOA] = $pessoaService->Salva($pessoa);
                $profissional[DT_CADASTRO] = Valida::DataHoraAtualBanco();
                $profissional[CO_ASSINANTE] = AssinanteService::getCoAssinanteLogado();
                $statusAgenda[CO_PROFISSIONAL] = $profissionalService->Salva($profissional);
            } else {
                $statusAgenda[CO_PROFISSIONAL] = 0;
            }

            if (!empty($dados[CO_CLIENTE]) && empty($dados['st_cliente'])) {
                $statusAgenda[CO_CLIENTE] = $dados[CO_CLIENTE];
            } elseif (!empty($dados['no_cliente']) && !empty($dados['st_cliente'])) {
                $contato[NU_TEL1] = Valida::RetiraMascara($dados[NU_TEL1]);
                $pessoa[CO_CONTATO] = $ContatoService->Salva($contato);
                $pessoa[NO_PESSOA] = $dados['no_cliente'];
                $cliente[CO_PESSOA] = $pessoaService->Salva($pessoa);

                $cliente[DT_CADASTRO] = Valida::DataHoraAtualBanco();
                $cliente[CO_ASSINANTE] = AssinanteService::getCoAssinanteLogado();
                $statusAgenda[CO_CLIENTE] = $clienteService->Salva($cliente);
            } else {
                $statusAgenda[CO_CLIENTE] = 0;
            }

            if (!empty($dados[CO_SERVICO]) && empty($dados['st_servico'])) {
                $statusAgenda[CO_SERVICO] = $dados[CO_SERVICO];
            } elseif (!empty($dados[NO_SERVICO]) && !empty($dados['st_servico'])) {
                $servico[NO_SERVICO] = $dados[NO_SERVICO];
                $servico[DT_CADASTRO] = Valida::DataHoraAtualBanco();
                $servico[CO_ASSINANTE] = AssinanteService::getCoAssinanteLogado();
                $statusAgenda[CO_SERVICO] = $servicoService->Salva($servico);
            } else {
                $statusAgenda[CO_SERVICO] = 0;
            }

            $retorno[SUCESSO] = $statusAgendaService->Salva($statusAgenda);
        } else {
            $retorno = $validador;
        }

        if ($retorno[SUCESSO]) {
            $retorno[SUCESSO] = true;
            $PDO->commit();
        } else {
            $retorno[MSG] = $validador[MSG];
            $retorno[SUCESSO] = false;
            $PDO->rollBack();
        }

        return $retorno;
    }


    /**
     * @param $dados
     * @return array|AssinanteValidador
     */
    public function DeletarAgendamento($dados)
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
        $validador = $agendaValidador->validarDeletarAgendamento($dados);
        if ($validador[SUCESSO]) {
            $agenda[DS_MOTIVO] = trim($dados[DS_MOTIVO]);
            $this->Salva($agenda, $dados[CO_AGENDA]);

            $agenda = $agendaService->PesquisaAgendamentos([
                'ta.' . CO_AGENDA => $dados[CO_AGENDA]
            ], 'tc.co_cliente, tp.co_profissional, tsa.ds_observacao, ts.co_servico');

            $agenda = $agenda[0];

            $statusAgenda[CO_AGENDA] = $dados[CO_AGENDA];
            $statusAgenda[DT_CADASTRO] = Valida::DataHoraAtualBanco();
            $statusAgenda[ST_STATUS] = StatusAgendamentoEnum::DELETADO;
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

    /**
     * @param $dados
     * @return array|AssinanteValidador
     */
    public function DropAgendamentoAjax($dados)
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
        $validador = $agendaValidador->validarDropAgendamento($dados);
        if ($validador[SUCESSO]) {

            $agenda = $agendaService->PesquisaAgendamentos([
                'ta.' . CO_AGENDA => $dados[CO_AGENDA]
            ], 'tc.co_cliente, tp.co_profissional, tsa.ds_observacao, ts.co_servico');

            $agenda = $agenda[0];

            $statusAgenda[CO_AGENDA] = $dados[CO_AGENDA];
            $statusAgenda[DT_CADASTRO] = Valida::DataHoraAtualBanco();
            $statusAgenda[ST_STATUS] = $agenda[ST_STATUS];
            $statusAgenda[DT_INICIO_AGENDA] = $dados[DT_INICIO_AGENDA];
            $statusAgenda[DT_FIM_AGENDA] = $dados[DT_FIM_AGENDA];
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
//
//    public function cronStatusAgenda($dados)
//    {
//        /** @var StatusAgendaService $statusAgendaService */
//        $statusAgendaService = $this->getService(STATUS_AGENDA_SERVICE);
//        /** @var StatusAgendaServicoService $statusAgendaServicoService */
//        $statusAgendaServicoService = $this->getService(STATUS_AGENDA_SERVICO_SERVICE);
//        /** @var StatusAgendaProfissionalService $statusAgendaProfissionalService */
//        $statusAgendaProfissionalService = $this->getService(STATUS_AGENDA_PROFISSIONAL_SERVICE);
//        /** @var PDO $PDO */
//        $PDO = $this->getPDO();
//        $retorno = [
//            SUCESSO => false,
//            MSG => null
//        ];
//
//        $PDO->beginTransaction();
//
//        $statusAgenda[CO_AGENDA] = $dados[CO_AGENDA];
//        $statusAgenda[DT_CADASTRO] = Valida::DataHoraAtualBanco();
//        $statusAgenda[ST_STATUS] = $dados[ST_STATUS];
//        $statusAgenda[DT_INICIO_AGENDA] = $dados[DT_INICIO_AGENDA];
//        $statusAgenda[DT_FIM_AGENDA] = $dados[DT_FIM_AGENDA];
//        $statusAgenda[NU_VALOR] = $dados[NU_VALOR];
//        $statusAgenda[NU_DURACAO] = $dados[NU_DURACAO];
//        $statusAgenda[DS_OBSERVACAO] = "Atualizado pelo Sistema";
//        $statusAgenda[CO_USUARIO] = CO_USUARIO_PADRAO;
//        $statusAgenda[CO_CLIENTE] = $dados[CO_CLIENTE];
//
//
//        $statusAgendaServico[CO_STATUS_AGENDA] = $statusAgendaService->Salva($statusAgenda);
//        $statusAgendaServico[CO_SERVICO] = $dados[CO_SERVICO];
//        $statusAgendaServico[ST_STATUS] = StatusAtendimentoEnum::NAO_INICIADO;
//
//        $statusAgendaProfissional[CO_STATUS_AGENDA_SERVICO] = $statusAgendaServicoService->Salva($statusAgendaServico);
//        $statusAgendaProfissional[CO_STATUS_AGENDA] = $statusAgendaServico[CO_STATUS_AGENDA];
//
//        if (!empty($dados[CO_PROFISSIONAL])) {
//            $statusAgendaProfissional[CO_PROFISSIONAL] = $dados[CO_PROFISSIONAL];
//        } else {
//            $statusAgendaProfissional[CO_PROFISSIONAL] = null;
//        }
//        $statusAgendaProfissional[TP_PROFISSIONAL] = 1;
//        $statusAgendaProfissionalService->Salva($statusAgendaProfissional);
//
//        if (!empty($dados['co_assistente'])) {
//            $statusAgendaProfissional[CO_PROFISSIONAL] = $dados['co_assistente'];
//        } else {
//            unset($statusAgendaProfissional[CO_PROFISSIONAL]);
//        }
//        $statusAgendaProfissional[TP_PROFISSIONAL] = 2;
//        $retorno[SUCESSO] = $statusAgendaProfissionalService->Salva($statusAgendaProfissional);
//        if ($retorno[SUCESSO]) {
//            $PDO->commit();
//        } else {
//            $PDO->rollBack();
//        }
//    }

    public function AgendamentoPesquisaAvancada($dados)
    {
        $dados = Valida::montaArrayAjax($dados);
        return $dados;
    }

}