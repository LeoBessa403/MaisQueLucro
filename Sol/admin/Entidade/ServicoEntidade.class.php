<?php

/**
 * Servico.Entidade [ ENTIDADE ]
 * @copyright (c) 2020, Leo Bessa
 */

class ServicoEntidade extends AbstractEntidade
{
	const TABELA = 'TB_SERVICO';
	const ENTIDADE = 'ServicoEntidade';
	const CHAVE = CO_SERVICO;

	private $co_servico;
	private $dt_cadastro;
	private $st_status;
	private $st_assistente;
	private $no_servico;
	private $nu_duracao;
	private $ds_descricao;
	private $co_categoria_servico;
	private $co_imagem;
    private $co_assinante;


	/**
    * @return array
    */
	public static function getCampos() 
    {
    	return [
			CO_SERVICO,
			DT_CADASTRO,
			ST_STATUS,
			ST_ASSISTENTE,
			NO_SERVICO,
			NU_DURACAO,
			DS_DESCRICAO,
			CO_IMAGEM,
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
	* @return int $co_servico
    */
	public function getCoServico()
    {
        return $this->co_servico;
    }

	/**
	* @param $co_servico
    * @return mixed
    */
	public function setCoServico($co_servico)
    {
        return $this->co_servico = $co_servico;
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
	* @return mixed $st_assistente
    */
	public function getStAssistente()
    {
        return $this->st_assistente;
    }

	/**
	* @param $st_assistente
    * @return mixed
    */
	public function setStAssistente($st_assistente)
    {
        return $this->st_assistente = $st_assistente;
    }

	/**
	* @return mixed $no_servico
    */
	public function getNoServico()
    {
        return $this->no_servico;
    }

	/**
	* @param $no_servico
    * @return mixed
    */
	public function setNoServico($no_servico)
    {
        return $this->no_servico = $no_servico;
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
	* @return ImagemEntidade $co_imagem
    */
	public function getCoImagem()
    {
        return $this->co_imagem;
    }

	/**
	* @param $co_imagem
    * @return mixed
    */
	public function setCoImagem($co_imagem)
    {
        return $this->co_imagem = $co_imagem;
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