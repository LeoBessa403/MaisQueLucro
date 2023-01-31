<?php

/**
 * AgendaValidador [ VALIDATOR ]
 * @copyright (c) 2018, Leo Bessa
 */
class  AgendaValidador extends AbstractValidador
{
    private $retorno = [
        SUCESSO => true,
        MSG => [],
        DADOS => []
    ];

    public function validarAgendamento($dados)
    {
        $this->retorno[DADOS][] = $this->ValidaSelectObrigatorioNotArray(
            $dados[ST_STATUS], 'Status Agendamento'
        );
        $this->retorno[DADOS][] = $this->ValidaCampoObrigatorioValido(
            $dados['dt_agenda'], AbstractValidador::VALIDACAO_DATA, 'Data do agendamento'
        );
        $this->retorno[DADOS][] = $this->ValidaCampoObrigatorioValido(
            $dados['nu_hora_inicio_agenda'], AbstractValidador::VALIDACAO_HORAS,
            'Hórario de Início'
        );
        $this->retorno[DADOS][] = $this->ValidaCampoObrigatorioValido(
            $dados['nu_hora_fim_agenda'], AbstractValidador::VALIDACAO_HORAS,
            'Hórario de Término'
        );
        return $this->MontaRetorno($this->retorno);
    }

    public function validarDeletarAgendamento($dados)
    {
        $this->retorno[DADOS][] = $this->ValidaCampoObrigatorioDescricao(
            $dados[DS_MOTIVO], 3, 'Motivo'
        );
        $this->retorno[DADOS][] = $this->ValidaCampoObrigatorioValido(
            $dados[CO_AGENDA], AbstractValidador::VALIDACAO_NUMERO, 'Código da Agenda'
        );
        return $this->MontaRetorno($this->retorno);
    }

    public function validarFinalizarAgendamento($dados)
    {
        $this->retorno[DADOS][] = $this->ValidaCampoObrigatorioValido(
            $dados[CO_AGENDA], AbstractValidador::VALIDACAO_NUMERO, 'Código da Agenda'
        );
        return $this->MontaRetorno($this->retorno);
    }

    public function validarDropAgendamento($dados)
    {
        $this->retorno[DADOS][] = $this->ValidaCampoObrigatorioValido(
            $dados[CO_AGENDA], AbstractValidador::VALIDACAO_NUMERO, 'Código da Agenda'
        );
        return $this->MontaRetorno($this->retorno);
    }


}