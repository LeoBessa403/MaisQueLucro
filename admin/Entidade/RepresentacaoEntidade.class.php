<?php

/**
 * Representacao.Entidade [ ENTIDADE ]
 * @copyright (c) 2022, Leo Bessa
 */

class RepresentacaoEntidade extends AbstractEntidade
{
	const TABELA = 'TB_REPRESENTACAO';
	const ENTIDADE = 'RepresentacaoEntidade';
	const CHAVE = CO_REPRESENTACAO;

	private $co_representacao;
	private $no_representacao;
	private $nu_tel1;
	private $ds_email;
	private $co_assinante;
	private $co_fluxo_caixa;


	/**
    * @return array
    */
	public static function getCampos() 
    {
    	return [
			CO_REPRESENTACAO,
			NO_REPRESENTACAO,
			NU_TEL1,
			DS_EMAIL,
			CO_ASSINANTE,
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
	* @return int $co_representacao
    */
	public function getCoRepresentacao()
    {
        return $this->co_representacao;
    }

	/**
	* @param $co_representacao
    * @return mixed
    */
	public function setCoRepresentacao($co_representacao)
    {
        return $this->co_representacao = $co_representacao;
    }

	/**
	* @return mixed $no_representacao
    */
	public function getNoRepresentacao()
    {
        return $this->no_representacao;
    }

	/**
	* @param $no_representacao
    * @return mixed
    */
	public function setNoRepresentacao($no_representacao)
    {
        return $this->no_representacao = $no_representacao;
    }

	/**
	* @return mixed $nu_tel1
    */
	public function getNuTel1()
    {
        return $this->nu_tel1;
    }

	/**
	* @param $nu_tel1
    * @return mixed
    */
	public function setNuTel1($nu_tel1)
    {
        return $this->nu_tel1 = $nu_tel1;
    }

	/**
	* @return mixed $ds_email
    */
	public function getDsEmail()
    {
        return $this->ds_email;
    }

	/**
	* @param $ds_email
    * @return mixed
    */
	public function setDsEmail($ds_email)
    {
        return $this->ds_email = $ds_email;
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
	* @return FluxoCaixaEntidade $co_fluxo_caixa
     */
	public function getCoFluxoCaixa()
    {
        return $this->co_fluxo_caixa;
    }

	/**
     * @param $co_fluxo_caixa
     * @return mixed
     */
	public function setCoFluxoCaixa($co_fluxo_caixa)
    {
        return $this->co_fluxo_caixa = $co_fluxo_caixa;
    }

}