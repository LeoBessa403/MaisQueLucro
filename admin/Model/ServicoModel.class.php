<?php

/**
 * ServicoModel.class [ MODEL ]
 * @copyright (c) 2019, Leo Bessa
 */
class  ServicoModel extends AbstractModel
{

    public function __construct()
    {
        parent::__construct(ServicoEntidade::ENTIDADE);
    }

    public function PesquisaAvancada($Condicoes)
    {
        $tabela = CategoriaServicoEntidade::TABELA . " cat" .
            " inner join " . ServicoEntidade::TABELA . " ser" .
            " on cat." . CategoriaServicoEntidade::CHAVE . " = ser." . CategoriaServicoEntidade::CHAVE .
            " inner join " . PrecoServicoEntidade::TABELA . " pre" .
            " on ser." . ServicoEntidade::CHAVE . " = pre." . ServicoEntidade::CHAVE;

        $campos = "ser.*";
        $pesquisa = new Pesquisa();
        $where = $pesquisa->getClausula($Condicoes);
        $pesquisa->Pesquisar($tabela, $where, null, $campos);
        $categorias = [];
        foreach ($pesquisa->getResult() as $categoria) {
            $cat[0] = $categoria;
            $categorias[] = $this->getUmObjeto(ServicoEntidade::ENTIDADE, $cat);
        }
        return $categorias;
    }

    public function PesquisaAvancadaPreco($Condicoes)
    {
        $tabela = CategoriaServicoEntidade::TABELA . " cat" .
            " inner join " . ServicoEntidade::TABELA . " ser" .
            " on cat." . CategoriaServicoEntidade::CHAVE . " = ser." . CategoriaServicoEntidade::CHAVE .
            " inner join " . PrecoServicoEntidade::TABELA . " pre" .
            " on ser." . ServicoEntidade::CHAVE . " = pre." . ServicoEntidade::CHAVE;

        $campos = "max(pre." . NU_VALOR . ") as max_valor, min(pre." . NU_VALOR . ") as min_valor";
        $pesquisa = new Pesquisa();
        $where = $pesquisa->getClausula($Condicoes);
        $pesquisa->Pesquisar($tabela, $where, null, $campos);
        return $pesquisa->getResult()[0];
    }


}