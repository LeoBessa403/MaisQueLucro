<?php

/**
 * Agenda.Entidade [ ENTIDADE ]
 * @copyright (c) 2019, Leo Bessa
 */

class AgendaEntidade extends AbstractEntidade
{
    const TABELA = 'TB_AGENDA';
    const ENTIDADE = 'AgendaEntidade';
    const CHAVE = CO_AGENDA;

    private $co_agenda;
    private $dt_cadastro;
    private $ds_motivo;
    private $co_assinante;
    private $co_status_agenda;


    /**
     * @return array
     */
    public static function getCampos()
    {
        return [
            CO_AGENDA,
            DT_CADASTRO,
            DS_MOTIVO,
            CO_ASSINANTE
        ];
    }

    /**
     * @return array $relacionamentos
     */
    public static function getRelacionamentos()
    {
        $relacionamentos = Relacionamentos::getRelacionamentos();
        return $relacionamentos[static::TABELA];
    }


    /**
     * @return int $co_agenda
     */
    public function getCoAgenda()
    {
        return $this->co_agenda;
    }

    /**
     * @param $co_agenda
     * @return mixed
     */
    public function setCoAgenda($co_agenda)
    {
        return $this->co_agenda = $co_agenda;
    }

    /**
     * @return mixed
     */
    public function getDsMotivo()
    {
        return $this->ds_motivo;
    }

    /**
     * @param mixed $ds_motivo
     */
    public function setDsMotivo($ds_motivo)
    {
        $this->ds_motivo = $ds_motivo;
    }

    /**
     * @return mixed $dt_cadastro
     */
    public function getDtCadastro()
    {
        return $this->dt_cadastro;
    }

    /**
     * @param $dt_cadastro
     * @return mixed
     */
    public function setDtCadastro($dt_cadastro)
    {
        return $this->dt_cadastro = $dt_cadastro;
    }

    /**
     * @return AssinanteEntidade $co_assinante
     */
    public function getCoAssinante()
    {
        return $this->co_assinante;
    }

    /**
     * @param $co_assinante
     * @return mixed
     */
    public function setCoAssinante($co_assinante)
    {
        return $this->co_assinante = $co_assinante;
    }

    /**
     * @return StatusAgendaEntidade $co_status_agenda
     */
    public function getCoStatusAgenda()
    {
        return $this->co_status_agenda;
    }

    /**
     * @param $co_status_agenda
     * @return mixed
     */
    public function setCoStatusAgenda($co_status_agenda)
    {
        return $this->co_status_agenda = $co_status_agenda;
    }

    /**
     * @return StatusAgendaEntidade $co_status_agenda
     */
    public function getCoUltimoStatusAgenda()
    {
        return $this->ultimo($this->getCoStatusAgenda());
    }


}