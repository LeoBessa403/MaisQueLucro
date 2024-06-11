<?php

/**
 * ControllerModel.class [ MODEL ]
 * @copyright (c) 2019, Leo Bessa
 */
class  ControllerModel extends AbstractModel
{

    public function __construct()
    {
        parent::__construct(ControllerEntidade::ENTIDADE);
    }

    public function PesquisaAvancadaMenu()
    {
        $tabela = ControllerEntidade::TABELA . " cont" .
            " inner join " . FuncionalidadeEntidade::TABELA . " fun" .
            " on cont." . ControllerEntidade::CHAVE . " = fun." . ControllerEntidade::CHAVE;

        $campos = "*";
        $where = 'where fun.st_menu = "S" order by cont.co_controller desc, fun.co_funcionalidade asc ';
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar($tabela, $where, null, $campos);
        return $pesquisa->getResult();
    }
}