<?php

/**
 * CategoriaFcNetaModel.class [ MODEL ]
 * @copyright (c) 2021, Leo Bessa
 */
class  CategoriaFcNetaModel extends AbstractModel
{

    public function __construct()
    {
        parent::__construct(CategoriaFcNetaEntidade::ENTIDADE);
    }

    public function carregaComboCatPesquisaLanc($coAssinante)
    {
        $tabela = "TB_CATEGORIA_FC tc
                 inner join TB_CATEGORIA_FC_FILHA tcff
                    on tc.co_categoria_fc = tcff.co_categoria_fc
                 inner join TB_CATEGORIA_FC_NETA tcfn
                    on tcff.co_categoria_fc_filha = tcfn.co_categoria_fc_filha";

        $campos = "tc.co_categoria_fc as cod,
                   tc.nu_codigo as numero,
                   tc.ds_texto as nome,
                   tcff.co_categoria_fc_filha as codFil,
                   tcff.nu_codigo as numeroFil,
                   tcff.ds_texto as nomeFil,
                   tcfn.co_categoria_fc_neta as codNet,
                   tcfn.nu_codigo as numeroNet,
                   tcfn.ds_texto as nomeNet";

        $pesquisa = new Pesquisa();
        $where = 'where tcfn.co_assinante = ' . $coAssinante . ' order by tc.nu_codigo, tcff.nu_codigo, tcfn.nu_codigo';
        $pesquisa->Pesquisar($tabela, $where, null, $campos);

        return $pesquisa->getResult();
    }

}