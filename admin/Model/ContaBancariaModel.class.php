<?php

/**
 * ContaBancariaModel.class [ MODEL ]
 * @copyright (c) 2021, Leo Bessa
 */
class  ContaBancariaModel extends AbstractModel
{

    public function __construct()
    {
        parent::__construct(ContaBancariaEntidade::ENTIDADE);
    }

    public function PesquisaAvancadaCombo($Condicoes)
    {
        $campos = "co_conta_bancaria, no_banco, nu_agencia";

        $pesquisa = new Pesquisa();
        $where = $pesquisa->getClausula($Condicoes);
        $pesquisa->Pesquisar(ContaBancariaEntidade::TABELA, $where , null, $campos);
        return $pesquisa->getResult();
    }

    public function PesquisaAvancada($Condicoes)
    {
        $Condicoes['hsc.' . HistSaldoCbEntidade::CHAVE] = '(SELECT max(hs.' . HistSaldoCbEntidade::CHAVE .  ') 
        FROM ' . HistSaldoCbEntidade::TABELA .  ' hs
          WHERE hs.' . ContaBancariaEntidade::CHAVE .  ' = con.' . ContaBancariaEntidade::CHAVE .  ')';

        $tabela = ContaBancariaEntidade::TABELA . " con" .
            " inner join " . HistSaldoCbEntidade::TABELA . " hsc" .
            " on con." . ContaBancariaEntidade::CHAVE . " = hsc." . ContaBancariaEntidade::CHAVE;

        $campos = "con.co_conta_bancaria, con.no_banco, con.nu_agencia, con.nu_conta, con.st_status, hsc.nu_saldo";

        $pesquisa = new Pesquisa();
        $where = $pesquisa->getClausula($Condicoes);
        $pesquisa->Pesquisar($tabela, $where , null, $campos);
        return $pesquisa->getResult();
    }

    public function PesquisaAvancadaHistConta($Condicoes)
    {
        $campos = "*";
        $pesquisa = new Pesquisa();
        $where = $pesquisa->getClausula($Condicoes);
        $pesquisa->Pesquisar(HistSaldoCbEntidade::TABELA, $where , null, $campos);
        return $pesquisa->getResult();
    }

}