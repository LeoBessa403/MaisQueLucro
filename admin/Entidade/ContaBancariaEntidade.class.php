<?php

/**
 * ContaBancaria.Entidade [ ENTIDADE ]
 * @copyright (c) 2022, Leo Bessa
 */

class ContaBancariaEntidade extends AbstractEntidade
{
    const TABELA = 'TB_CONTA_BANCARIA';
    const ENTIDADE = 'ContaBancariaEntidade';
    const CHAVE = CO_CONTA_BANCARIA;

    private $co_conta_bancaria;
    private $dt_cadastro;
    private $st_status;
    private $nu_agencia;
    private $nu_conta;
    private $no_banco;
    private $co_fluxo_caixa;
    private $co_hist_saldo_cb;
    private $co_conta_bancaria_origem;
    private $co_conta_bancaria_destino;
    private $co_hist_transferencia;
    private $co_assinante;


    /**
     * @return array
     */
    public static function getCampos()
    {
        return [
            CO_CONTA_BANCARIA,
            DT_CADASTRO,
            NO_BANCO,
            ST_STATUS,
            NU_AGENCIA,
            NU_CONTA,
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
     * @return int $co_conta_bancaria
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
     * @return mixed $no_banco
     */
    public function getNoBanco()
    {
        return $this->no_banco;
    }

    /**
     * @param $no_banco
     * @return mixed
     */
    public function setNoBanco($no_banco)
    {
        return $this->no_banco = $no_banco;
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
     * @return mixed $nu_agencia
     */
    public function getNuAgencia()
    {
        return $this->nu_agencia;
    }

    /**
     * @param $nu_agencia
     * @return mixed
     */
    public function setNuAgencia($nu_agencia)
    {
        return $this->nu_agencia = $nu_agencia;
    }

    /**
     * @return mixed $nu_conta
     */
    public function getNuConta()
    {
        return $this->nu_conta;
    }

    /**
     * @param $nu_conta
     * @return mixed
     */
    public function setNuConta($nu_conta)
    {
        return $this->nu_conta = $nu_conta;
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

    /**
     * @return HistSaldoCbEntidade $co_hist_saldo_cb
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
     * @return HistSaldoCbEntidade $co_hist_saldo_cb
     */
    public function getCoUltimoHistSaldoCb()
    {
        return $this->ultimo($this->getCoHistSaldoCb());
    }


    /**
     * @return ContaBancariaEntidade $co_conta_bancaria_origem
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
     * @return ContaBancariaEntidade $co_conta_bancaria_destino
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
     * @return HistTransferenciaEntidade $co_hist_transferencia
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

}