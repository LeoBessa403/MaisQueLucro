<?php

/**
 * FluxoCaixaModel.class [ MODEL ]
 * @copyright (c) 2021, Leo Bessa
 */
class  FluxocaixaModel extends AbstractModel
{

    public function __construct()
    {
        parent::__construct(FluxocaixaEntidade::ENTIDADE);
    }

    public function PesquisaAvancada($where)
    {
        $tabela = FluxocaixaEntidade::TABELA . " tfc" .
            " left join " . RepresentacaoEntidade::TABELA . " rep" .
            " on rep." . RepresentacaoEntidade::CHAVE . " = tfc." . RepresentacaoEntidade::CHAVE .
            " left join " . CentroCustoEntidade::TABELA . " cen" .
            " on cen." . CentroCustoEntidade::CHAVE . " = tfc." . CentroCustoEntidade::CHAVE .
            " left join " . ContaBancariaEntidade::TABELA . " con" .
            " on con." . ContaBancariaEntidade::CHAVE . " = tfc." . ContaBancariaEntidade::CHAVE .
            " left join " . CategoriaFcEntidade::TABELA . " cat" .
            " on cat." . CategoriaFcEntidade::CHAVE . " = tfc." . CategoriaFcEntidade::CHAVE .
            " left join " . CategoriaFcFilhaEntidade::TABELA . " ctf" .
            " on ctf." . CategoriaFcFilhaEntidade::CHAVE . " = tfc." . CategoriaFcFilhaEntidade::CHAVE .
            " left join " . CategoriaFcNetaEntidade::TABELA . " ctn" .
            " on ctn." . CategoriaFcNetaEntidade::CHAVE . " = tfc." . CategoriaFcNetaEntidade::CHAVE;


        $dados = "tfc.*";
        $pesquisa = new Pesquisa();
        $where = $where . ' ORDER BY ' . FluxocaixaEntidade::CHAVE . ' DESC';
        $pesquisa->Pesquisar($tabela, $where, null, $dados);
        $fcs = [];
        /** @var AcessoEntidade $fc */
        foreach ($pesquisa->getResult() as $fc) {
            $fluxoc[0] = $fc;
            $fcs[] = $this->getUmObjeto(FluxocaixaEntidade::ENTIDADE, $fluxoc);
        }
        return $fcs;
    }

    public function PesquisaAvancadaFC($where)
    {
        $tabela = FluxocaixaEntidade::TABELA . " tfc" .
            " left join " . RepresentacaoEntidade::TABELA . " rep" .
            " on rep." . RepresentacaoEntidade::CHAVE . " = tfc." . RepresentacaoEntidade::CHAVE .
            " left join " . CentroCustoEntidade::TABELA . " cen" .
            " on cen." . CentroCustoEntidade::CHAVE . " = tfc." . CentroCustoEntidade::CHAVE .
            " left join " . ContaBancariaEntidade::TABELA . " con" .
            " on con." . ContaBancariaEntidade::CHAVE . " = tfc." . ContaBancariaEntidade::CHAVE .
            " left join " . CategoriaFcEntidade::TABELA . " cat" .
            " on cat." . CategoriaFcEntidade::CHAVE . " = tfc." . CategoriaFcEntidade::CHAVE .
            " left join " . CategoriaFcFilhaEntidade::TABELA . " ctf" .
            " on ctf." . CategoriaFcFilhaEntidade::CHAVE . " = tfc." . CategoriaFcFilhaEntidade::CHAVE .
            " left join " . CategoriaFcNetaEntidade::TABELA . " ctn" .
            " on ctn." . CategoriaFcNetaEntidade::CHAVE . " = tfc." . CategoriaFcNetaEntidade::CHAVE;


        $campos = "tfc.dt_realizado, tfc.dt_vencimento, tfc.nu_valor, tfc.nu_valor_pago, tfc.st_pagamento, 
        tfc.co_categoria_fc, tfc.co_categoria_fc_filha, tfc.co_categoria_fc_neta, 
        ctf.ds_texto as no_filha,  ctf.nu_codigo as nu_codigo_f, ctn.ds_texto as no_neta, ctn.nu_codigo as nu_codigo_n";
        $pesquisa = new Pesquisa();
        $where = $where . ' ORDER BY dt_realizado, dt_vencimento ASC';
        $pesquisa->Pesquisar($tabela, $where, null, $campos);

        return $pesquisa->getResult();
    }


    public function PesquisaAvancadaValorPesquisa()
    {
        $campos = "max(nu_valor) as maior_valor, min(nu_valor) as menor_valor, 
        max(nu_valor_pago) as maior_valor_pago, max(nu_valor_pago) as menor_valor_pago";
        $pesquisa = new Pesquisa();
        $where = ' ORDER BY ' . FluxocaixaEntidade::CHAVE . ' DESC LIMIT 200';
        $pesquisa->Pesquisar(FluxocaixaEntidade::TABELA, $where, null, $campos);

        return $pesquisa->getResult()[0];
    }

}