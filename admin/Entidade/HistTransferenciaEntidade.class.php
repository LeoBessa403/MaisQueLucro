<?php

/**
 * HistTransferencia.Entidade [ ENTIDADE ]
 * @copyright (c) 2022, Leo Bessa
 */

class HistTransferenciaEntidade extends AbstractEntidade
{
	const TABELA = 'TB_HIST_TRANSFERENCIA';
	const ENTIDADE = 'HistTransferenciaEntidade';
	const CHAVE = CO_HIST_TRANSFERENCIA;

	private $co_hist_transferencia;
	private $dt_cadastro;
	private $dt_realizado;
	private $nu_saldo_origem_ant;
	private $nu_saldo_origem_dep;
	private $nu_saldo_destino_ant;
	private $nu_saldo_destino_dep;
	private $nu_valor_transferido;
	private $co_conta_bancaria_origem;
	private $co_conta_bancaria_destino;
	private $co_usuario;


	/**
    * @return array
    */
	public static function getCampos() 
    {
    	return [
			CO_HIST_TRANSFERENCIA,
			DT_CADASTRO,
			DT_REALIZADO,
			NU_SALDO_ORIGEM_ANT,
			NU_SALDO_ORIGEM_DEP,
			NU_SALDO_DESTINO_ANT,
			NU_SALDO_DESTINO_DEP,
			NU_VALOR_TRANSFERIDO,
			CO_CONTA_BANCARIA_ORIGEM,
			CO_CONTA_BANCARIA_DESTINO,
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
	* @return int $co_hist_transferencia
    */
	public function getCoHistTransferencia()
    {
        return $this->co_hist_transferencia;
    }

	/**
	* @param $co_hist_transferencia
    * @return mixed
    */
	public function setCoHistTransferencia($co_hist_transferencia)
    {
        return $this->co_hist_transferencia = $co_hist_transferencia;
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
	* @return mixed $dt_realizado
    */
	public function getDtRealizado()
    {
        return $this->dt_realizado;
    }

	/**
	* @param $dt_realizado
    * @return mixed
    */
	public function setDtRealizado($dt_realizado)
    {
        return $this->dt_realizado = $dt_realizado;
    }

	/**
	* @return mixed $nu_saldo_origem_ant
    */
	public function getNuSaldoOrigemAnt()
    {
        return $this->nu_saldo_origem_ant;
    }

	/**
	* @param $nu_saldo_origem_ant
    * @return mixed
    */
	public function setNuSaldoOrigemAnt($nu_saldo_origem_ant)
    {
        return $this->nu_saldo_origem_ant = $nu_saldo_origem_ant;
    }

	/**
	* @return mixed $nu_saldo_origem_dep
    */
	public function getNuSaldoOrigemDep()
    {
        return $this->nu_saldo_origem_dep;
    }

	/**
	* @param $nu_saldo_origem_dep
    * @return mixed
    */
	public function setNuSaldoOrigemDep($nu_saldo_origem_dep)
    {
        return $this->nu_saldo_origem_dep = $nu_saldo_origem_dep;
    }

	/**
	* @return mixed $nu_saldo_destino_ant
    */
	public function getNuSaldoDestinoAnt()
    {
        return $this->nu_saldo_destino_ant;
    }

	/**
	* @param $nu_saldo_destino_ant
    * @return mixed
    */
	public function setNuSaldoDestinoAnt($nu_saldo_destino_ant)
    {
        return $this->nu_saldo_destino_ant = $nu_saldo_destino_ant;
    }

	/**
	* @return mixed $nu_saldo_destino_dep
    */
	public function getNuSaldoDestinoDep()
    {
        return $this->nu_saldo_destino_dep;
    }

	/**
	* @param $nu_saldo_destino_dep
    * @return mixed
    */
	public function setNuSaldoDestinoDep($nu_saldo_destino_dep)
    {
        return $this->nu_saldo_destino_dep = $nu_saldo_destino_dep;
    }

	/**
	* @return mixed $nu_valor_transferido
    */
	public function getNuValorTransferido()
    {
        return $this->nu_valor_transferido;
    }

	/**
	* @param $nu_valor_transferido
    * @return mixed
    */
	public function setNuValorTransferido($nu_valor_transferido)
    {
        return $this->nu_valor_transferido = $nu_valor_transferido;
    }

	/**
	* @return ContaBancariaOrigemEntidade $co_conta_bancaria_origem
    */
	public function getCoContaBancariaOrigem()
    {
        return $this->co_conta_bancaria_origem;
    }

	/**
	* @param $co_conta_bancaria_origem
    * @return mixed
    */
	public function setCoContaBancariaOrigem($co_conta_bancaria_origem)
    {
        return $this->co_conta_bancaria_origem = $co_conta_bancaria_origem;
    }

	/**
	* @return ContaBancariaDestinoEntidade $co_conta_bancaria_destino
    */
	public function getCoContaBancariaDestino()
    {
        return $this->co_conta_bancaria_destino;
    }

	/**
	* @param $co_conta_bancaria_destino
    * @return mixed
    */
	public function setCoContaBancariaDestino($co_conta_bancaria_destino)
    {
        return $this->co_conta_bancaria_destino = $co_conta_bancaria_destino;
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