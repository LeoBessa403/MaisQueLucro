<?php

/**
 * FluxoCaixa.Entidade [ ENTIDADE ]
 * @copyright (c) 2022, Leo Bessa
 */

class FluxoCaixaEntidade extends AbstractEntidade
{
	const TABELA = 'TB_FLUXO_CAIXA';
	const ENTIDADE = 'FluxoCaixaEntidade';
	const CHAVE = CO_FLUXO_CAIXA;

	private $co_fluxo_caixa;
	private $dt_cadastro;
	private $dt_realizado;
	private $dt_vencimento;
	private $nu_valor;
	private $nu_valor_pago;
	private $ds_descricao;
	private $tp_fluxo;
	private $tp_pagamento;
	private $st_pagamento;
	private $co_categoria_fc;
	private $co_categoria_fc_filha;
	private $co_categoria_fc_neta;
	private $co_centro_custo;
	private $co_conta_bancaria;
	private $co_representacao;
	private $co_usuario;
	private $co_assinante;


	/**
    * @return array
    */
	public static function getCampos() 
    {
    	return [
			CO_FLUXO_CAIXA,
			DT_CADASTRO,
			DT_REALIZADO,
			DT_VENCIMENTO,
			NU_VALOR,
			NU_VALOR_PAGO,
			DS_DESCRICAO,
			TP_FLUXO,
			TP_PAGAMENTO,
			ST_PAGAMENTO,
			CO_CATEGORIA_FC,
			CO_CATEGORIA_FC_FILHA,
			CO_CATEGORIA_FC_NETA,
			CO_CENTRO_CUSTO,
			CO_CONTA_BANCARIA,
			CO_REPRESENTACAO,
			CO_USUARIO,
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
	* @return int $co_fluxo_caixa
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
	* @return mixed $dt_vencimento
    */
	public function getDtVencimento()
    {
        return $this->dt_vencimento;
    }

	/**
	* @param $dt_vencimento
    * @return mixed
    */
	public function setDtVencimento($dt_vencimento)
    {
        return $this->dt_vencimento = $dt_vencimento;
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
	* @return mixed $tp_pagamento
    */
	public function getTpPagamento()
    {
        return $this->tp_pagamento;
    }

	/**
	* @param $tp_pagamento
    * @return mixed
    */
	public function setTpPagamento($tp_pagamento)
    {
        return $this->tp_pagamento = $tp_pagamento;
    }

	/**
	* @return mixed $st_pagamento
    */
	public function getStPagamento()
    {
        return $this->st_pagamento;
    }

	/**
	* @param $st_pagamento
    * @return mixed
    */
	public function setStPagamento($st_pagamento)
    {
        return $this->st_pagamento = $st_pagamento;
    }

	/**
	* @return CategoriaFcEntidade $co_categoria_fc
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
	* @return CategoriaFcNetaEntidade $co_categoria_fc_neta
    */
	public function getCoCategoriaFcNeta()
    {
        return $this->co_categoria_fc_neta;
    }

	/**
	* @param $co_categoria_fc_neta
    * @return mixed
    */
	public function setCoCategoriaFcNeta($co_categoria_fc_neta)
    {
        return $this->co_categoria_fc_neta = $co_categoria_fc_neta;
    }

	/**
	* @return CentroCustoEntidade $co_centro_custo
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
	* @return RepresentacaoEntidade $co_representacao
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