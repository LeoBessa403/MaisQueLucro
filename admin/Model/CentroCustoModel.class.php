<?php

/**
 * CentroCustoModel.class [ MODEL ]
 * @copyright (c) 2021, Leo Bessa
 */
class  CentroCustoModel extends AbstractModel
{

    public function __construct()
    {
        parent::__construct(CentroCustoEntidade::ENTIDADE);
    }

    public function PesquisaCentroCusto($Condicoes)
    {
        $pesquisa = new Pesquisa();
        $where = $pesquisa->getClausula($Condicoes);
        $pesquisa->Pesquisar(CentroCustoEntidade::TABELA, $where);
        return $pesquisa->getResult();
    }

}