<?php

/**
 * UsuarioPerfilModel.class [ MODEL ]
 * @copyright (c) 2017, Leo Bessa
 */
class  UsuarioPerfilModel extends AbstractModel
{

    public function __construct()
    {
        parent::__construct(UsuarioPerfilEntidade::ENTIDADE);
    }

    public function PesquisaPerfisUsuario($coUsuario)
    {
        $tabela = UsuarioPerfilEntidade::TABELA . " usuPer" .
            " inner join " . PerfilEntidade::TABELA . " per" .
            " on per." . PerfilEntidade::CHAVE . " = usuPer." . PerfilEntidade::CHAVE;

        $campos = "per.*";
        $where = 'where co_usuario = ' . $coUsuario;
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar($tabela, $where, null, $campos);
        return $pesquisa->getResult();
    }
}