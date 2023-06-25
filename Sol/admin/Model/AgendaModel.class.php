<?php

/**
 * AgendaModel.class [ MODEL ]
 * @copyright (c) 2019, Leo Bessa
 */
class  AgendaModel extends AbstractModel
{

    public function __construct()
    {
        parent::__construct(AgendaEntidade::ENTIDADE);
    }

    public function PesquisaAgendamentos($Condicoes, $maisCampos)
    {
        $Condicoes['tsa.' . CO_STATUS_AGENDA] = '(SELECT max(sa.co_status_agenda) FROM TB_STATUS_AGENDA sa
          WHERE sa.co_agenda = ta.co_agenda)';
        $tabela = "TB_AGENDA ta
                        inner join TB_STATUS_AGENDA tsa on ta.co_agenda = tsa.co_agenda
                        left join TB_PROFISSIONAL tp on tp.co_profissional = tsa.co_profissional
                        left join TB_CLIENTE tc on tc.co_cliente = tsa.co_cliente
                        left join TB_SERVICO ts on tsa.co_servico = ts.co_servico
                        left join TB_PESSOA t1 on tc.co_pessoa = t1.co_pessoa
                        left join TB_CONTATO tco on tco.co_contato = t1.co_contato
                        left join TB_PESSOA t2 on tp.co_pessoa = t2.co_pessoa
                        inner join TB_USUARIO tu on tu.co_usuario = tsa.co_usuario
                        inner join TB_PESSOA t3 on tu.co_pessoa = t3.co_pessoa";

        $campos = "ta.co_agenda, dt_inicio_agenda, dt_fim_agenda, t1.no_pessoa as cliente, 
                t2.no_pessoa as profissional, no_servico, tsa.st_status, t3.no_pessoa as usuario";

        if ($maisCampos)
            $campos .= ', ' . $maisCampos;

        $pesquisa = new Pesquisa();
        $where = $pesquisa->getClausula($Condicoes);
        $pesquisa->Pesquisar($tabela, $where . ' order by dt_inicio_agenda asc', null, $campos);
        return $pesquisa->getResult();
    }

}