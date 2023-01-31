<?php

/**
 * SuporteModel.class [ MODEL ]
 * @copyright (c) 2020, Leo Bessa
 */
class  SuporteModel extends AbstractModel
{

    public function __construct()
    {
        parent::__construct(SuporteEntidade::ENTIDADE);
    }

    public function PesquisaSuportes($Condicoes)
    {
        $Condicoes['ths.co_historico_suporte'] = 'select max(ths2.co_historico_suporte) from TB_HISTORICO_SUPORTE ths2
    where ths2.co_suporte = ts.co_suporte';
        $tabela = "TB_SUPORTE ts inner join TB_HISTORICO_SUPORTE ths on ts.co_suporte = ths.co_suporte";

        $campos = "*";

        $pesquisa = new Pesquisa();
        $where = $pesquisa->getClausula($Condicoes);
        $pesquisa->Pesquisar($tabela, $where . ' order by ths.dt_cadastro desc', null, $campos);
        $suportes = [];
        foreach ($pesquisa->getResult() as $suporte) {
            $sup[0] = $suporte;
            $suportes[] = $this->getUmObjeto(SuporteEntidade::ENTIDADE, $sup);
        }
        return $suportes;
    }

    public function PesquisaAvancada($dados)
    {
        $tabela = SuporteEntidade::TABELA . " ts
                         inner join " . HistoricoSuporteEntidade::TABELA . " ths 
                         on ts." . SuporteEntidade::CHAVE . " = ths." . SuporteEntidade::CHAVE . "
                         inner join " . UsuarioEntidade::TABELA . " tu 
                         on ths." . UsuarioEntidade::CHAVE . " = tu." . UsuarioEntidade::CHAVE . "
                         inner join " . PessoaEntidade::TABELA . " tp 
                         on tu." . PessoaEntidade::CHAVE . " = tp." . PessoaEntidade::CHAVE . "";

        $campos = "ts.*";

        $pesquisa = new Pesquisa();
        $where = $pesquisa->getClausula($dados);

        if(!$where){
            $where = "where 1 = 1";
        }
        $where .= " and
                    (upper(ts.ds_assunto) like upper('%" . $dados["txt_pesquisa"] . "%') or
                    upper(ds_mensagem) like upper('%" . $dados["txt_pesquisa"] . "%') or
                    upper(tp.no_pessoa) like upper('%" . $dados["txt_pesquisa"] . "%'))";
        $pesquisa->Pesquisar($tabela, $where . ' order by ths.dt_cadastro desc', null, $campos);
        $suportes = [];
        foreach ($pesquisa->getResult() as $suporte) {
            $sup[0] = $suporte;
            $suportes[] = $this->getUmObjeto(SuporteEntidade::ENTIDADE, $sup);
        }
        return $suportes;
    }


}