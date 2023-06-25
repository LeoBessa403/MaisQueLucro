<?php

/**
 * ProfissionalModel.class [ MODEL ]
 * @copyright (c) 2018, Leo Bessa
 */
class  ProfissionalModel extends AbstractModel
{

    public function __construct()
    {
        parent::__construct(ProfissionalEntidade::ENTIDADE);
    }

    public function PesquisaAvancada($Condicoes)
    {
        $tabela = ProfissionalEntidade::TABELA . " prof" .
            " inner join " . PessoaEntidade::TABELA . " pes" .
            " on prof." . PessoaEntidade::CHAVE . " = pes." . PessoaEntidade::CHAVE .
            " left join " . EnderecoEntidade::TABELA . " end" .
            " on end." . EnderecoEntidade::CHAVE . " = pes." . EnderecoEntidade::CHAVE;

        $campos = "DISTINCT prof.*";
        $pesquisa = new Pesquisa();
        $where = $pesquisa->getClausula($Condicoes);
        $pesquisa->Pesquisar($tabela, $where, null, $campos);
        $profissionais = [];
        /** @var ProfissionalEntidade $profissional */
        foreach ($pesquisa->getResult() as $profissional) {
            $prof[0] = $profissional;
            $profissionais[] = $this->getUmObjeto(ProfissionalEntidade::ENTIDADE, $prof);
        }
        return $profissionais;
    }

}