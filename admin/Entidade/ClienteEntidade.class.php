<?php

/**
 * Cliente.Entidade [ ENTIDADE ]
 * @copyright (c) 2020, Leo Bessa
 */

class ClienteEntidade extends AbstractEntidade
{
	const TABELA = 'TB_CLIENTE';
	const ENTIDADE = 'ClienteEntidade';
	const CHAVE = CO_CLIENTE;

	private $co_cliente;
	private $dt_cadastro;
	private $st_status;
	private $no_apelido;
	private $ds_observacao;
	private $st_receber_email_agendamento;
	private $st_lembrete_horario_agendamento;
	private $st_sms_marketing;
	private $st_email_marketing;
	private $nu_como_conheceu;
	private $co_assinante;
	private $co_pessoa;


	/**
    * @return array
    */
	public static function getCampos() 
    {
    	return [
			CO_CLIENTE,
			DT_CADASTRO,
			ST_STATUS,
			NO_APELIDO,
			DS_OBSERVACAO,
			ST_RECEBER_EMAIL_AGENDAMENTO,
			ST_LEMBRETE_HORARIO_AGENDAMENTO,
			ST_SMS_MARKETING,
			ST_EMAIL_MARKETING,
			NU_COMO_CONHECEU,
			CO_ASSINANTE,
			CO_PESSOA,
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
	* @return int $co_cliente
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
	* @return mixed $no_apelido
    */
	public function getNoApelido()
    {
        return $this->no_apelido;
    }

	/**
	* @param $no_apelido
    * @return mixed
    */
	public function setNoApelido($no_apelido)
    {
        return $this->no_apelido = $no_apelido;
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
	* @return mixed $st_receber_email_agendamento
    */
	public function getStReceberEmailAgendamento()
    {
        return $this->st_receber_email_agendamento;
    }

	/**
	* @param $st_receber_email_agendamento
    * @return mixed
    */
	public function setStReceberEmailAgendamento($st_receber_email_agendamento)
    {
        return $this->st_receber_email_agendamento = $st_receber_email_agendamento;
    }

	/**
	* @return mixed $st_lembrete_horario_agendamento
    */
	public function getStLembreteHorarioAgendamento()
    {
        return $this->st_lembrete_horario_agendamento;
    }

	/**
	* @param $st_lembrete_horario_agendamento
    * @return mixed
    */
	public function setStLembreteHorarioAgendamento($st_lembrete_horario_agendamento)
    {
        return $this->st_lembrete_horario_agendamento = $st_lembrete_horario_agendamento;
    }

	/**
	* @return mixed $st_sms_marketing
    */
	public function getStSmsMarketing()
    {
        return $this->st_sms_marketing;
    }

	/**
	* @param $st_sms_marketing
    * @return mixed
    */
	public function setStSmsMarketing($st_sms_marketing)
    {
        return $this->st_sms_marketing = $st_sms_marketing;
    }

	/**
	* @return mixed $st_email_marketing
    */
	public function getStEmailMarketing()
    {
        return $this->st_email_marketing;
    }

	/**
	* @param $st_email_marketing
    * @return mixed
    */
	public function setStEmailMarketing($st_email_marketing)
    {
        return $this->st_email_marketing = $st_email_marketing;
    }

	/**
	* @return mixed $nu_como_conheceu
    */
	public function getNuComoConheceu()
    {
        return $this->nu_como_conheceu;
    }

	/**
	* @param $nu_como_conheceu
    * @return mixed
    */
	public function setNuComoConheceu($nu_como_conheceu)
    {
        return $this->nu_como_conheceu = $nu_como_conheceu;
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
	* @return PessoaEntidade $co_pessoa
    */
	public function getCoPessoa()
    {
        return $this->co_pessoa;
    }

	/**
	* @param $co_pessoa
    * @return mixed
    */
	public function setCoPessoa($co_pessoa)
    {
        return $this->co_pessoa = $co_pessoa;
    }

}