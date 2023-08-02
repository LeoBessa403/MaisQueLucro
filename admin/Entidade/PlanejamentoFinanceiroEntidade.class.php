<?php

/**
 * PlanejamentoFinanceiro.Entidade [ ENTIDADE ]
 * @copyright (c) 2023, Leo Bessa
 */

class PlanejamentoFinanceiroEntidade extends AbstractEntidade
{
	const TABELA = 'TB_PLANEJAMENTO_FINANCEIRO';
	const ENTIDADE = 'PlanejamentoFinanceiroEntidade';
	const CHAVE = CO_PLANEJAMENTO_FINANCEIRO;

	private $co_planejamento_financeiro;
	private $nu_valor;
	private $dt_atualizado;
	private $dt_cadastro;
	private $ds_campo;
	private $nu_ano;
	private $co_assinante;


	/**
    * @return array
    */
	public static function getCampos() 
    {
    	return [
			CO_PLANEJAMENTO_FINANCEIRO,
			NU_VALOR,
			DT_ATUALIZADO,
			DT_CADASTRO,
			DS_CAMPO,
			NU_ANO,
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
	* @return int $co_planejamento_financeiro
    */
	public function getCoPlanejamentoFinanceiro()
    {
        return $this->co_planejamento_financeiro;
    }

	/**
	* @param $co_planejamento_financeiro
    * @return mixed
    */
	public function setCoPlanejamentoFinanceiro($co_planejamento_financeiro)
    {
        return $this->co_planejamento_financeiro = $co_planejamento_financeiro;
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
	* @return mixed $dt_atualizado
    */
	public function getDtAtualizado()
    {
        return $this->dt_atualizado;
    }

	/**
	* @param $dt_atualizado
    * @return mixed
    */
	public function setDtAtualizado($dt_atualizado)
    {
        return $this->dt_atualizado = $dt_atualizado;
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
	* @return mixed $ds_campo
    */
	public function getDsCampo()
    {
        return $this->ds_campo;
    }

	/**
	* @param $ds_campo
    * @return mixed
    */
	public function setDsCampo($ds_campo)
    {
        return $this->ds_campo = $ds_campo;
    }

	/**
	* @return mixed $nu_ano
    */
	public function getNuAno()
    {
        return $this->nu_ano;
    }

	/**
	* @param $nu_ano
    * @return mixed
    */
	public function setNuAno($nu_ano)
    {
        return $this->nu_ano = $nu_ano;
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

}