<?php

/**
 * StatusAgenda.Entidade [ ENTIDADE ]
 * @copyright (c) 2019, Leo Bessa
 */

class StatusAgendaEntidade extends AbstractEntidade
{
    const TABELA = 'TB_STATUS_AGENDA';
    const ENTIDADE = 'StatusAgendaEntidade';
    const CHAVE = CO_STATUS_AGENDA;

    private $co_status_agenda;
    private $dt_cadastro;
    private $st_status;
    private $dt_inicio_agenda;
    private $dt_fim_agenda;
    private $nu_valor;
    private $nu_duracao;
    private $ds_observacao;
    private $co_cliente;
    private $co_profissional;
    private $co_servico;
    private $co_agenda;
    private $co_usuario;


    /**
     * @return array
     */
    public static function getCampos()
    {
        return [
            CO_STATUS_AGENDA,
            DT_CADASTRO,
            ST_STATUS,
            DT_INICIO_AGENDA,
            DT_FIM_AGENDA,
            NU_VALOR,
            NU_DURACAO,
            DS_OBSERVACAO,
            CO_CLIENTE,
            CO_SERVICO,
            CO_PROFISSIONAL,
            CO_AGENDA,
            CO_USUARIO,
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
     * @return int $co_status_agenda
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
     * @return mixed $st_status
     */
    public function getStStatus()
    {
        return $this->st_status;
    }

    /**
     * @param $st_status
     * @return mixed
     */
    public function setStStatus($st_status)
    {
        return $this->st_status = $st_status;
    }

    /**
     * @return mixed
     */
    public function getDtInicioAgenda()
    {
        return $this->dt_inicio_agenda;
    }

    /**
     * @param mixed $dt_inicio_agenda
     */
    public function setDtInicioAgenda($dt_inicio_agenda)
    {
        $this->dt_inicio_agenda = $dt_inicio_agenda;
    }

    /**
     * @return mixed
     */
    public function getDtFimAgenda()
    {
        return $this->dt_fim_agenda;
    }

    /**
     * @param mixed $dt_fim_agenda
     */
    public function setDtFimAgenda($dt_fim_agenda)
    {
        $this->dt_fim_agenda = $dt_fim_agenda;
    }

    /**
     * @param $nu_hora_fim_agenda
     * @return mixed
     */
    public function setNuHoraFimAgenda($nu_hora_fim_agenda)
    {
        return $this->nu_hora_fim_agenda = $nu_hora_fim_agenda;
    }

    /**
     * @return mixed $nu_valor
     */
    public function getNuValor()
    {
        return $this->nu_valor;
    }

    /**
     * @param $nu_valor
     * @return mixed
     */
    public function setNuValor($nu_valor)
    {
        return $this->nu_valor = $nu_valor;
    }

    /**
     * @return mixed $nu_duracao
     */
    public function getNuDuracao()
    {
        return $this->nu_duracao;
    }

    /**
     * @param $nu_duracao
     * @return mixed
     */
    public function setNuDuracao($nu_duracao)
    {
        return $this->nu_duracao = $nu_duracao;
    }

    /**
     * @return mixed $ds_observacao
     */
    public function getDsObservacao()
    {
        return $this->ds_observacao;
    }

    /**
     * @param $ds_observacao
     * @return mixed
     */
    public function setDsObservacao($ds_observacao)
    {
        return $this->ds_observacao = $ds_observacao;
    }

    /**
     * @return ClienteEntidade $co_cliente
     */
    public function getCoCliente()
    {
        return $this->co_cliente;
    }

    /**
     * @param $co_cliente
     * @return mixed
     */
    public function setCoCliente($co_cliente)
    {
        return $this->co_cliente = $co_cliente;
    }

    /**
     * @return AgendaEntidade $co_agenda
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
     * @return UsuarioEntidade $co_usuario
     */
    public function getCoUsuario()
    {
        return $this->co_usuario;
    }

    /**
     * @param $co_usuario
     * @return mixed
     */
    public function setCoUsuario($co_usuario)
    {
        return $this->co_usuario = $co_usuario;
    }

    /**
     * @return ProfissionalEntidade $co_profissional
     */
    public function getCoProfissional()
    {
        return $this->co_profissional;
    }

    /**
     * @param mixed $co_profissional
     */
    public function setCoProfissional($co_profissional)
    {
        $this->co_profissional = $co_profissional;
    }

    /**
     * @return ServicoEntidade $co_servico
     */
    public function getCoServico()
    {
        return $this->co_servico;
    }

    /**
     * @param mixed $co_servico
     */
    public function setCoServico($co_servico)
    {
        $this->co_servico = $co_servico;
    }



}