<?php

/**
 * Clique.Entidade [ ENTIDADE ]
 * @copyright (c) 2021, Leo Bessa
 */

class CliqueEntidade extends AbstractEntidade
{
	const TABELA = 'TB_CLIQUE';
	const ENTIDADE = 'CliqueEntidade';
	const CHAVE = CO_CLIQUE;

	private $co_clique;
	private $dt_cadastro;
	private $co_botao;


	/**
    * @return array
    */
	public static function getCampos() 
    {
    	return [
			CO_CLIQUE,
			DT_CADASTRO,
			CO_BOTAO,
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
	* @return CliqueEntidade $co_clique
    */
	public function getCoClique()
    {
        return $this->co_clique;
    }

	/**
	* @param $co_clique
    * @return mixed
    */
	public function setCoClique($co_clique)
    {
        return $this->co_clique = $co_clique;
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
	* @return BotaoEntidade $co_botao
    */
	public function getCoBotao()
    {
        return $this->co_botao;
    }

	/**
	* @param $co_botao
    * @return mixed
    */
	public function setCoBotao($co_botao)
    {
        return $this->co_botao = $co_botao;
    }

}