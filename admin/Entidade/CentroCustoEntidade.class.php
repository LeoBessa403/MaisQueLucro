<?php

/**
 * CentroCusto.Entidade [ ENTIDADE ]
 * @copyright (c) 2022, Leo Bessa
 */

class CentroCustoEntidade extends AbstractEntidade
{
	const TABELA = 'TB_CENTRO_CUSTO';
	const ENTIDADE = 'CentroCustoEntidade';
	const CHAVE = CO_CENTRO_CUSTO;

	private $co_centro_custo;
	private $no_centro_custos;
	private $nu_codigo;
	private $ds_descricao;
	private $co_assinante;
	private $co_fluxo_caixa;


	/**
    * @return array
    */
	public static function getCampos() 
    {
    	return [
			CO_CENTRO_CUSTO,
            NO_CENTRO_CUSTOS,
			NU_CODIGO,
			DS_DESCRICAO,
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
	* @return int $co_centro_custo
    */
	public function getCoCentroCusto()
    {
        return $this->co_centro_custo;
    }

	/**
	* @param $co_centro_custo
    * @return mixed
    */
	public function setCoCentroCusto($co_centro_custo)
    {
        return $this->co_centro_custo = $co_centro_custo;
    }

	/**
	* @return mixed $nu_codigo
    */
	public function getNuCodigo()
    {
        return $this->nu_codigo;
    }

    /**
     * @return mixed
     */
    public function getNoCentroCustos()
    {
        return $this->no_centro_custos;
    }

    /**
     * @param mixed $no_centro_custos
     */
    public function setNoCentroCustos($no_centro_custos)
    {
        $this->no_centro_custos = $no_centro_custos;
    }


	/**
	* @param $nu_codigo
    * @return mixed
    */
	public function setNuCodigo($nu_codigo)
    {
        return $this->nu_codigo = $nu_codigo;
    }

	/**
	* @return mixed $ds_descricao
    */
	public function getDsDescricao()
    {
        return $this->ds_descricao;
    }

	/**
	* @param $ds_descricao
    * @return mixed
    */
	public function setDsDescricao($ds_descricao)
    {
        return $this->ds_descricao = $ds_descricao;
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