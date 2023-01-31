<?php

class Agenda extends AbstractController
{
    public $result;
    public $form;
    public $formCancela;
    public $formPesquisa;
    public $agenda;

    public function CarregaAgendamentos()
    {
        /** @var AgendaService $agendaService */
        $agendaService = $this->getService(AGENDA_SERVICE);
        /** @var Session $session */
        $session = new Session();
        if ($session->CheckSession(PESQUISA_AVANCADA)) {
            $Condicoes = $session::getSession(PESQUISA_AVANCADA);
            $session->FinalizaSession(PESQUISA_AVANCADA);
            $session->FinalizaSession('pesq_agendamento');
        }
        $Condicoes['ta.' . CO_ASSINANTE] = AssinanteService::getCoAssinanteLogado();
        if (!$session->CheckSession('pesq_agendamento')) {
            $session->setSession('pesq_agendamento', $Condicoes);
        }
        $Condicoes = $session::getSession('pesq_agendamento');
        $agendas = $agendaService->PesquisaAgendamentos($Condicoes, 'tsa.dt_cadastro');
        $eventos = [];
        if (!empty($agendas)) {
            foreach ($agendas as $agenda) {
                if ($agenda[ST_STATUS] != StatusAgendamentoEnum::DELETADO) {
                    $eve = array(
                        'id' => (int)$agenda[CO_AGENDA],
                        'title' => "Cliente: " . $agenda['cliente'] .
                            "\nProfissional: " . $agenda['profissional'] . "\nServiço: " . $agenda[NO_SERVICO] .
                            "\nAtualizado em: " . Valida::DataShow($agenda[DT_CADASTRO], 'd/m/Y H:i'),
                        'start' => Valida::DataShow($agenda[DT_INICIO_AGENDA], 'Y-m-d H:i'),
                        'end' => Valida::DataShow($agenda[DT_FIM_AGENDA], 'Y-m-d H:i'),
                        'className' => 'event-' . StatusAgendamentoEnum::$cores[$agenda[ST_STATUS]],
                        'allDay' => false,
                        'backgroundColor' => StatusAgendamentoEnum::$cores[$agenda[ST_STATUS]],
                    );
                    $eventos[] = $eve;
                }
            }
        }
        return $eventos;
    }

    public function Agendamento($dados = null)
    {
        /** @var AgendaService $agendaService */
        $agendaService = $this->getService(AGENDA_SERVICE);
        if ($dados):
            return $agendaService->salvaAgendamentoAjax($dados);
        endif;
        /** @var Session $session */
        $session = new Session();
        if ($session->CheckSession(PESQUISA_AVANCADA)) {
            $Condicoes = $session::getSession(PESQUISA_AVANCADA);
        } else if ($session->CheckSession('pesq_agendamento')) {
            $session->FinalizaSession('pesq_agendamento');
        }
        $Condicoes['ta.' . CO_ASSINANTE] = AssinanteService::getCoAssinanteLogado();
        $this->result = $agendaService->PesquisaAgendamentos($Condicoes, 'tsa.dt_cadastro');

        $this->form = AgendaForm::CadastroAgendamento();
        $this->formCancela = AgendaForm::DeletarAgendamento();
        $this->formPesquisa = AgendaForm::Pesquisar();
        return null;
    }

    public static function GetAgendaAjax($coAgenda)
    {
        /** @var AgendaService $agendaService */
        $agendaService = static::getServiceStatic(AGENDA_SERVICE);
        $Condicoes['ta.' . CO_AGENDA] = $coAgenda;
        $dados = $agendaService->PesquisaAgendamentos($Condicoes, 'tc.co_cliente, tp.co_profissional, 
        tsa.ds_observacao, ts.co_servico, ta.ds_motivo, tco.nu_tel1, ta.dt_cadastro as cadastro');
        $dados = $dados[0];
        $dados['dia'] = Valida::DataShow($dados[DT_INICIO_AGENDA], "d/m/Y");
        $dados['inicio'] = Valida::DataShow($dados[DT_INICIO_AGENDA], "H:i");
        $dados['fim'] = Valida::DataShow($dados[DT_FIM_AGENDA], "H:i");
        $dados['cadastro'] = Valida::DataShow($dados['cadastro'], "d/m/Y H:i");
        $dados[NU_TEL1] = Valida::MascaraTel($dados[NU_TEL1]);
        return $dados;
    }

    public static function DeletarAgendamento($dados)
    {
        /** @var AgendaService $agendaService */
        $agendaService = static::getServiceStatic(AGENDA_SERVICE);
        return $agendaService->DeletarAgendamento($dados);
    }

    public function GetUrlHistoricoAgendamento($coAgenda)
    {
        return ADMIN . '/Agenda/HistoricoAgendamento/' . Valida::GeraParametro(CO_AGENDA . "/" . $coAgenda);
    }

    public function HistoricoAgendamento()
    {
        /** @var AgendaService $agendaService */
        $agendaService = $this->getService(AGENDA_SERVICE);

        $coAgenda = UrlAmigavel::PegaParametro(CO_AGENDA);
        if ($coAgenda) {
            $this->agenda = $agendaService->PesquisaUmRegistro($coAgenda);
        } else {
            Notificacoes::geraMensagem(
                'Nenhum agendamento Encontrado.',
                TiposMensagemEnum::ALERTA
            );
            Redireciona(UrlAmigavel::$modulo . '/' . UrlAmigavel::$controller . '/Agendamento');
        }
    }

    public static function FinalizarAgendaAjax($coAgenda)
    {
        /** @var AgendaService $agendaService */
        $agendaService = static::getServiceStatic(AGENDA_SERVICE);
        return $agendaService->FinalizarAgendamento($coAgenda);
    }

    public static function DropAgendamentoAjax($dados)
    {
        /** @var AgendaService $agendaService */
        $agendaService = static::getServiceStatic(AGENDA_SERVICE);
        return $agendaService->DropAgendamentoAjax($dados);
    }

    public function AgendamentoPesquisaAvancada($dados)
    {
        /** @var Session $session */
        $session = new Session();
        if ($session->CheckSession(PESQUISA_AVANCADA)) {
            $session->FinalizaSession(PESQUISA_AVANCADA);
        }
        /** @var AgendaService $agendaService */
        $agendaService = static::getServiceStatic(AGENDA_SERVICE);
        $pesquisaAjax = $agendaService->AgendamentoPesquisaAvancada($dados);

        $pesquisa = [];
        foreach ($dados as $valor) {
            if ($valor['name'] == 'st_status-pesquisa[]') {
                $pesquisa['st_status-pesquisa'][] = $valor['value'];
            }
            if ($valor['name'] == 'co_cliente-pesquisa[]') {
                $pesquisa['co_cliente-pesquisa'][] = $valor['value'];
            }
            if ($valor['name'] == 'co_profissional-pesquisa[]') {
                $pesquisa['co_profissional-pesquisa'][] = $valor['value'];
            }
            if ($valor['name'] == 'co_servico-pesquisa[]') {
                $pesquisa['co_servico-pesquisa'][] = $valor['value'];
            }

        }

        if (!empty($pesquisa['st_status-pesquisa'])) {
            $st_status = implode("', '", $pesquisa['st_status-pesquisa']);
        } else {
            $st_status = null;
        }

        if (!empty($pesquisa['co_profissional-pesquisa'])) {
            $co_profissional = implode("', '", $pesquisa['co_profissional-pesquisa']);
        } else {
            $co_profissional = null;
        }

        if (!empty($pesquisa['co_cliente-pesquisa'])) {
            $co_cliente = implode("', '", $pesquisa['co_cliente-pesquisa']);
        } else {
            $co_cliente = null;
        }

        if (!empty($pesquisa['co_servico-pesquisa'])) {
            $co_servico = implode("', '", $pesquisa['co_servico-pesquisa']);
        } else {
            $co_servico = null;
        }

        $Condicoes = array(
            "in#tsa." . ST_STATUS => $st_status,
            "in#tsa." . CO_CLIENTE => $co_cliente,
            "in#tsa." . CO_PROFISSIONAL => $co_profissional,
            "in#tsa." . CO_SERVICO => $co_servico,
            ">=#tsa." . DT_INICIO_AGENDA => Valida::DataDBDate($pesquisaAjax['dt1-pesquisa']) . " 00:00:00",
            "<=#tsa." . DT_FIM_AGENDA => Valida::DataDBDate($pesquisaAjax['dt2-pesquisa']) . " 23:59:59"
        );
        $session->setSession(PESQUISA_AVANCADA, $Condicoes);
        $retorno[SUCESSO] = true;
        return $retorno;
    }

}