<?php

/**
 * HistoricoSuporte.Entidade [ ENTIDADE ]
 * @copyright (c) 2020, Leo Bessa
 */

class HistoricoSuporteEntidade extends AbstractEntidade
{
	const TABELA = 'TB_HISTORICO_SUPORTE';
	const ENTIDADE = 'HistoricoSuporteEntidade';
	const CHAVE = CO_HISTORICO_SUPORTE;

	private $co_historico_suporte;
	private $dt_cadastro;
	private $ds_mensagem;
	private $st_lido;
	private $co_suporte;
	private $co_usuario;
	private $co_imagem;


	/**
    * @return array
    */
	public static function getCampos() 
    {
    	return [
			CO_HISTORICO_SUPORTE,
			DT_CADASTRO,
			DS_MENSAGEM,
			ST_LIDO,
			CO_SUPORTE,
			CO_USUARIO,
			CO_IMAGEM,
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
	* @return int $co_historico_suporte
    */
	public function getCoHistoricoSuporte()
    {
        return $this->co_historico_suporte;
    }

	/**
	* @param $co_historico_suporte
    * @return mixed
    */
	public function setCoHistoricoSuporte($co_historico_suporte)
    {
        return $this->co_historico_suporte = $co_historico_suporte;
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
	* @return mixed $ds_mensagem
    */
	public function getDsMensagem()
    {
        return $this->ds_mensagem;
    }

	/**
	* @param $ds_mensagem
    * @return mixed
    */
	public function setDsMensagem($ds_mensagem)
    {
        return $this->ds_mensagem = $ds_mensagem;
    }

	/**
	* @return mixed $st_lido
    */
	public function getStLido()
    {
        return $this->st_lido;
    }

	/**
	* @param $st_lido
    * @return mixed
    */
	public function setStLido($st_lido)
    {
        return $this->st_lido = $st_lido;
    }

	/**
	* @return SuporteEntidade $co_suporte
    */
	public function getCoSuporte()
    {
        return $this->co_suporte;
    }

	/**
	* @param $co_suporte
    * @return mixed
    */
	public function setCoSuporte($co_suporte)
    {
        return $this->co_suporte = $co_suporte;
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

}