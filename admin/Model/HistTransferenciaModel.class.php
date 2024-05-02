<?php

/**
 * HistTransferenciaModel.class [ MODEL ]
 * @copyright (c) 2021, Leo Bessa
 */
class  HistTransferenciaModel extends AbstractModel
{

    public function __construct()
    {
        parent::__construct(HistTransferenciaEntidade::ENTIDADE);
    }

    public function PesquisaTransferencias($Condicoes)
    {
        $tabela = "tb_hist_transferencia trans
                     inner join tb_conta_bancaria tcbOri
                                on trans.co_conta_bancaria_origem = tcbOri.co_conta_bancaria
                     inner join tb_conta_bancaria tcbDes
                                on trans.co_conta_bancaria_destino = tcbDes.co_conta_bancaria
                     inner join tb_usuario tu
                                on trans.co_usuario = tu.co_usuario
                     inner join tb_pessoa tp
                                on tu.co_pessoa = tp.co_pessoa";

        $campos = "trans.*,
                   tcbOri.no_banco as bancoOri,
                   tcbDes.no_banco as bancoDes,
                   tp.no_pessoa";

        $pesquisa = new Pesquisa();
        $where = $pesquisa->getClausula($Condicoes);
        $pesquisa->Pesquisar($tabela, $where, null, $campos);
        return $pesquisa->getResult();
    }


}