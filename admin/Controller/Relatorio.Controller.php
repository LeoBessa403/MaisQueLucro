<?php

class Relatorio extends AbstractController
{
    public $result;

    public function GraficoRelatorio()
    {
        /** @var AgendaService $agendaService */
        $agendaService = $this->getService(AGENDA_SERVICE);
        /** @var Session $session */
        $session = new Session();
        if ($session->CheckSession(PESQUISA_AVANCADA)) {
            $Condicoes = $session::getSession(PESQUISA_AVANCADA);
        } else if ($session->CheckSession('pesq_agendamento')) {
            $session->FinalizaSession('pesq_agendamento');
        }
        $Condicoes['ta.' . CO_ASSINANTE] = AssinanteService::getCoAssinanteLogado();


        if (!empty($_POST["PesquisarRelatorio"])) {
            $pesquisa = $_POST;
            if (!empty($pesquisa['st_status-pesquisa'])) {
                $st_status = implode(", ", $pesquisa['st_status-pesquisa']);
            } else {
                $st_status = null;
            }

            if (!empty($pesquisa['co_profissional-pesquisa'])) {
                $co_profissional = implode(", ", $pesquisa['co_profissional-pesquisa']);
            } else {
                $co_profissional = null;
            }

            if (!empty($pesquisa['co_cliente-pesquisa'])) {
                $co_cliente = implode(", ", $pesquisa['co_cliente-pesquisa']);
            } else {
                $co_cliente = null;
            }

            if (!empty($pesquisa['co_servico-pesquisa'])) {
                $co_servico = implode(", ", $pesquisa['co_servico-pesquisa']);
            } else {
                $co_servico = null;
            }

            $Condicoes = array(
                "in#tsa." . ST_STATUS => $st_status,
                "in#tsa." . CO_CLIENTE => $co_cliente,
                "in#tsa." . CO_PROFISSIONAL => $co_profissional,
                "in#tsa." . CO_SERVICO => $co_servico,
                ">=#tsa." . DT_INICIO_AGENDA => Valida::DataDBDate($pesquisa['dt1-pesquisa']) . " 00:00:00",
                "<=#tsa." . DT_FIM_AGENDA => Valida::DataDBDate($pesquisa['dt2-pesquisa']) . " 23:59:59"
            );
            $this->result = $agendaService->PesquisaAgendamentos($Condicoes, 'tsa.dt_cadastro');
            $session->setSession(PESQUISA_AVANCADA, $Condicoes);
        } else {
            $this->result = $agendaService->PesquisaAgendamentos($Condicoes, 'tsa.dt_cadastro');
        }
    }

    public function GraficoRelatorioPesquisaAvancada()
    {
        echo AgendaForm::PesquisarRelatorio();
    }

    public function ExportarGraficoRelatorio()
    {
        /** @var AgendaService $agendaService */
        $agendaService = $this->getService(AGENDA_SERVICE);
        $Condicoes['ta.' . CO_ASSINANTE] = AssinanteService::getCoAssinanteLogado();

        $session = new Session();
        if ($session->CheckSession(PESQUISA_AVANCADA)) {
            $Condicoes = $session->getSession(PESQUISA_AVANCADA);
            $result = $agendaService->PesquisaAgendamentos($Condicoes, 'tsa.dt_cadastro');
        } else {
            $result = $agendaService->PesquisaAgendamentos($Condicoes, 'tsa.dt_cadastro');
        }
        $formato = UrlAmigavel::PegaParametro("formato");
        $result = array_reverse($result);

        $i = 0;
        /** @var UsuarioEntidade $value */
        foreach ($result as $value) {
            $res[$i]["cliente"] = $value["cliente"];
            $res[$i]["profissional"] = $value["profissional"];
            $res[$i]["no_servico"] = $value["no_servico"];
            $res[$i]["dt_inicio_agenda"] = Valida::DataShow($value["dt_inicio_agenda"]);
            $res[$i]["st_status"] = StatusAgendamentoEnum::getDescricaoValor($value["st_status"]);
            $i++;
        }
        $Colunas = array('Cliente', 'Profissional', 'Serviço', 'Agendado', 'Status do Agendamento');
        $exporta = new Exportacao($formato,'Meus Agendamentos');
        // $exporta->setPapelOrientacao("paisagem");
        $exporta->setColunas($Colunas);
        $exporta->setConteudo($res);
        $exporta->GeraArquivo();
    }

}