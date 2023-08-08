<?php

/**
 * CategoriaFc.Entidade [ ENTIDADE ]
 * @copyright (c) 2022, Leo Bessa
 */

class CategoriaFcEntidade extends AbstractEntidade
{
	const TABELA = 'TB_CATEGORIA_FC';
	const ENTIDADE = 'CategoriaFcEntidade';
	const CHAVE = CO_CATEGORIA_FC;

	private $co_categoria_fc;
	private $ds_texto;
	private $nu_codigo;
	private $co_categoria_fc_filha;
	private $co_fluxo_caixa;


	/**
    * @return array
    */
	public static function getCampos() 
    {
    	return [
			CO_CATEGORIA_FC,
			DS_TEXTO,
			NU_CODIGO,
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
	* @return int $co_categoria_fc
    */
	public function getCoCategoriaFc()
    {
        return $this->co_categoria_fc;
    }

	/**
	* @param $co_categoria_fc
    * @return mixed
    */
	public function setCoCategoriaFc($co_categoria_fc)
    {
        return $this->co_categoria_fc = $co_categoria_fc;
    }

	/**
	* @return mixed $ds_texto
    */
	public function getDsTexto()
    {
        return $this->ds_texto;
    }

	/**
	* @param $ds_texto
    * @return mixed
    */
	public function setDsTexto($ds_texto)
    {
        return $this->ds_texto = $ds_texto;
    }

	/**
	* @return mixed $nu_codigo
    */
	public function getNuCodigo()
    {
        return $this->nu_codigo;
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
	* @return CategoriaFcFilhaEntidade $co_categoria_fc_filha
     */
	public function getCoCategoriaFcFilha()
    {
        return $this->co_categoria_fc_filha;
    }

	/**
     * @param $co_categoria_fc_filha
     * @return mixed
     */
	public function setCoCategoriaFcFilha($co_categoria_fc_filha)
    {
        return $this->co_categoria_fc_filha = $co_categoria_fc_filha;
    }

	/**
	* @return FluxocaixaEntidade $co_fluxo_caixa
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