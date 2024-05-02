<?php

/**
 * RepresentacaoModel.class [ MODEL ]
 * @copyright (c) 2021, Leo Bessa
 */
class  RepresentacaoModel extends AbstractModel
{

    public function __construct()
    {
        parent::__construct(RepresentacaoEntidade::ENTIDADE);
    }

    public function PesquisaRepresentacoes($Condicoes)
    {
        $pesquisa = new Pesquisa();
        $where = $pesquisa->getClausula($Condicoes);
        $pesquisa->Pesquisar(RepresentacaoEntidade::TABELA, $where);
        return $pesquisa->getResult();
    }

}