<?php

/**
 * HistSaldoCb.Entidade [ ENTIDADE ]
 * @copyright (c) 2022, Leo Bessa
 */

class HistSaldoCbEntidade extends AbstractEntidade
{
	const TABELA = 'TB_HIST_SALDO_CB';
	const ENTIDADE = 'HistSaldoCbEntidade';
	const CHAVE = CO_HIST_SALDO_CB;

	private $co_hist_saldo_cb;
	private $dt_cadastro;
	private $tp_fluxo;
	private $nu_valor_pago;
	private $nu_saldo;
	private $ds_observacao;
	private $co_conta_bancaria;
	private $co_usuario;


	/**
    * @return array
    */
	public static function getCampos() 
    {
    	return [
			CO_HIST_SALDO_CB,
			DT_CADASTRO,
			TP_FLUXO,
			NU_VALOR_PAGO,
			NU_SALDO,
			DS_OBSERVACAO,
			CO_CONTA_BANCARIA,
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
	* @return int $co_hist_saldo_cb
    */
	public function getCoHistSaldoCb()
    {
        return $this->co_hist_saldo_cb;
    }

	/**
	* @param $co_hist_saldo_cb
    * @return mixed
    */
	public function setCoHistSaldoCb($co_hist_saldo_cb)
    {
        return $this->co_hist_saldo_cb = $co_hist_saldo_cb;
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
	* @return mixed $tp_fluxo
    */
	public function getTpFluxo()
    {
        return $this->tp_fluxo;
    }

	/**
	* @param $tp_fluxo
    * @return mixed
    */
	public function setTpFluxo($tp_fluxo)
    {
        return $this->tp_fluxo = $tp_fluxo;
    }

	/**
	* @return mixed $nu_valor_pago
    */
	public function getNuValorPago()
    {
        return $this->nu_valor_pago;
    }

	/**
	* @param $nu_valor_pago
    * @return mixed
    */
	public function setNuValorPago($nu_valor_pago)
    {
        return $this->nu_valor_pago = $nu_valor_pago;
    }

	/**
	* @return mixed $nu_saldo
    */
	public function getNuSaldo()
    {
        return $this->nu_saldo;
    }

	/**
	* @param $nu_saldo
    * @return mixed
    */
	public function setNuSaldo($nu_saldo)
    {
        return $this->nu_saldo = $nu_saldo;
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
	* @return ContaBancariaEntidade $co_conta_bancaria
    */
	public function getCoContaBancaria()
    {
        return $this->co_conta_bancaria;
    }

	/**
	* @param $co_conta_bancaria
    * @return mixed
    */
	public function setCoContaBancaria($co_conta_bancaria)
    {
        return $this->co_conta_bancaria = $co_conta_bancaria;
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

}