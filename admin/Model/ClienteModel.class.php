<?php

/**
 * ClienteModel.class [ MODEL ]
 * @copyright (c) 2019, Leo Bessa
 */
class  ClienteModel extends AbstractModel
{

    public function __construct()
    {
        parent::__construct(ClienteEntidade::ENTIDADE);
    }

    public function PesquisaAvancada($Condicoes)
    {
        $tabela = ClienteEntidade::TABELA . " cli" .
            " inner join " . PessoaEntidade::TABELA . " pes" .
            " on cli." . PessoaEntidade::CHAVE . " = pes." . PessoaEntidade::CHAVE .
            " left join " . EnderecoEntidade::TABELA . " end" .
            " on end." . EnderecoEntidade::CHAVE . " = pes." . EnderecoEntidade::CHAVE;

        $campos = "DISTINCT cli.*";
        $pesquisa = new Pesquisa();
        $where = $pesquisa->getClausula($Condicoes);
        $pesquisa->Pesquisar($tabela, $where, null, $campos);
        $clientes = [];
        /** @var ClienteEntidade $cliente */
        foreach ($pesquisa->getResult() as $cliente) {
            $cli[0] = $cliente;
            $clientes[] = $this->getUmObjeto(ClienteEntidade::ENTIDADE, $cli);
        }
        return $clientes;
    }
}