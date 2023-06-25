<?php

/**
 * Botao.Entidade [ ENTIDADE ]
 * @copyright (c) 2021, Leo Bessa
 */

class BotaoEntidade extends AbstractEntidade
{
	const TABELA = 'TB_BOTAO';
	const ENTIDADE = 'BotaoEntidade';
	const CHAVE = CO_BOTAO;

	private $co_botao;
	private $no_botao;
	private $ds_botao;
	private $nu_total_cliques;
	private $st_status;
	private $co_clique;


	/**
    * @return array
    */
	public static function getCampos() 
    {
    	return [
			CO_BOTAO,
			NO_BOTAO,
			DS_BOTAO,
			NU_TOTAL_CLIQUES,
			ST_STATUS,
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
	* @return int $co_botao
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

	/**
	* @return mixed $no_botao
    */
	public function getNoBotao()
    {
        return $this->no_botao;
    }

	/**
	* @param $no_botao
    * @return mixed
    */
	public function setNoBotao($no_botao)
    {
        return $this->no_botao = $no_botao;
    }

	/**
	* @return mixed $ds_botao
    */
	public function getDsBotao()
    {
        return $this->ds_botao;
    }

	/**
	* @param $ds_botao
    * @return mixed
    */
	public function setDsBotao($ds_botao)
    {
        return $this->ds_botao = $ds_botao;
    }

	/**
	* @return mixed $nu_total_cliques
    */
	public function getNuTotalCliques()
    {
        return $this->nu_total_cliques;
    }

	/**
	* @param $nu_total_cliques
    * @return mixed
    */
	public function setNuTotalCliques($nu_total_cliques)
    {
        return $this->nu_total_cliques = $nu_total_cliques;
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
     * @return CliqueEntidade $co_clique
     */
    public function getUltimoCoClique()
    {
        return $this->ultimo($this->getCoClique());
    }

}