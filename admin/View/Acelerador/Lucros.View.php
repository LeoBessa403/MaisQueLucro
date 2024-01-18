<style>
    .pricing-table h2 {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .titulo {
        font-size: 1.4em !important;
        font-style: unset !important;
        padding: 5px 3px;
    }

    .topo_tabela {
        background-color: lightslategray;
        color: darkblue;
        height: 120px;
        font-size: 1.4em !important;
    }

    .topo_tabela th {
        text-align: center;
        padding: 20px 10px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .topo_tabela th:nth-child(2) {
        width: 150px;
        border-top-left-radius: 0;
        border-top-right-radius: 10px;
    }

    .topo_tabela_perc {
        padding: 10px;
    }

    .topo_tabela th:nth-child(1) {
        border-top-right-radius: 0;
    }

    .topo_tabela th:last-child {
        border-top-right-radius: 10px;
    }

    .valor_perc {
        width: 60%;
        display: inline;
        float: left;
        text-align: center;
        height: 30px;
        font-weight: bolder;
        font-size: 1.5em;
    }

    .control_perc {
        width: 20%;
        display: inline;
        float: left;
        background-color: white;
        border: 1px solid #D5D5D5;
        border-radius: 0 0 0 0 !important;
        font-size: .8em;
        transition-duration: 0.1s;
        box-shadow: none;
        height: 30px;
    }

    .control_perc:hover {
        cursor: pointer;
    }

    .iMais {
        color: green;
    }

    .iMenos {
        color: red;
    }

    .linha-tabela td:nth-child(2) {
        padding: 0;
    }

    .moeda {
        width: 120px;
        font-weight: bolder;
        color: lightblue;
    }

    #pricing_table_maior_dif tr td:last-child {
        width: 20%;
        font-size: 1.3em !important;
    }

    .graf {
        height: 350px;
        padding: 0 !important;
    }

    .tab-pane {
        text-align: left;

    }

    .tab-pane ul li {
        list-style: decimal;
    }
</style>
<div class="main-content">
    <!-- end: SPANEL CONFIGURATION MODAL FORM -->
    <div class="container" style="padding-top: 30px">
        <div class="row">
            <div class="col-md-12">
                <div id="pricing_table_example2" class="row">
                    <div class="col-sm-12">
                        <h3>Simulador 1</h3>
                        <div class="pricing-table col-sm-12 col-xs-12">
                            <div class="top">
                                <h2 style="background-color: blue;">ACELERADOR DE LUCROS</h2>
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div id="pricing_table_example2" class="row">
                                        <div class="col-sm-12">
                                            <h3>DADOS INICIAIS</h3>
                                            <div class="pricing-table col-sm-12 col-xs-12">

                                                <table class="table-striped table-bordered table-hover table-full-width"
                                                       id="pagRecebi" style="width: 100%">
                                                    <thead>
                                                    <tr class="topo_tabela">
                                                        <th class="titulo" colspan="2">QUAL LUCRO BASE VOCÊ DESEJA
                                                            AVALIAR?
                                                        </th>
                                                        <th class="titulo"><span id="perc_base"
                                                                                 class="topo_tabela_perc">0%</span></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">Receita / Faturamento</td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_rec_base" id="valor_rec_base"
                                                                   class="moeda receita" alt="base" value="0">
                                                        </td>
                                                        <td class="titulo">
                                                            <span id="valor_rec_base_perc">0%</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">Despesas Diretas (CV)</td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_cv_base" id="valor_cv_base"
                                                                   class="moeda cv" alt="base" value="0">
                                                        </td>
                                                        <td class="titulo">
                                                            <span id="valor_cv_base_perc">0%</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">Margem de Contribuição</td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_mc_base" id="valor_mc_base"
                                                                   disabled class="moeda" value="R$ 0,00">
                                                        </td>
                                                        <td class="titulo">
                                                            <span id="valor_mc_base_perc">0%</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">Despesas Indiretas (CF) e Investimentos</td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_cf_base" id="valor_cf_base"
                                                                   class="moeda cf" alt="base" value="0">
                                                        </td>
                                                        <td class="titulo">
                                                            <span id="valor_cf_base_perc">0%</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo"><b>Lucro Líquido (LO)</b></td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_lo_base" id="valor_lo_base"
                                                                   disabled class="moeda" value="R$ 0,00"/>
                                                        </td>
                                                        <td class="titulo">
                                                            <span id="valor_lo_base_perc">0%</span>
                                                        </td>
                                                    </tr>

                                                    </tbody>
                                                </table>


                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div id="pricing_table_example2" class="row">
                                        <div class="col-sm-12">
                                            <h3>RESULTADO INICIAL</h3>
                                            <div id="graf1" class="graf pricing-table col-sm-12 col-xs-12">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div id="pricing_table_example2" class="row">
                                        <div class="col-sm-12">
                                            <h3>ALTERAÇÃO NA RECEITA</h3>
                                            <div class="pricing-table col-sm-12 col-xs-12">

                                                <table class="table-striped table-bordered table-hover table-full-width"
                                                       id="pagRecebi" style="width: 100%">
                                                    <thead>
                                                    <tr class="topo_tabela">
                                                        <th class="titulo" colspan="2">O QUE ACONTECE SE EU ALTERAR
                                                            MINHA
                                                            QUANTIDADE VENDIDA EM X%?
                                                        </th>
                                                        <th class="titulo">
                                                            <span class="iMenos control_perc" id="iMenos_venda">-</span>
                                                            <input type="text" id="valor_perc_venda"
                                                                   name="valor_perc_venda"
                                                                   value="0" class="form-control valor_perc" disabled/>
                                                            <span class="iMais control_perc" id="iMais_venda">+</span>
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">Receita / Faturamento</td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_rec_venda"
                                                                   id="valor_rec_venda"
                                                                   disabled class="moeda" value="R$ 0,00"/>
                                                        </td>
                                                        <td class="titulo">
                                                            <span id="valor_rec_venda_perc">0%</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">Despesas Diretas (CV)</td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_cv_venda" id="valor_cv_venda"
                                                                   disabled class="moeda" value="R$ 0,00">
                                                        </td>
                                                        <td class="titulo">
                                                            <span id="valor_cv_venda_perc">0%</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">Margem de Contribuição</td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_mc_venda" id="valor_mc_venda"
                                                                   disabled class="moeda" value="R$ 0,00">
                                                        </td>
                                                        <td class="titulo">
                                                            <span id="valor_mc_venda_perc">0%</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">Despesas Indiretas (CF) e Investimentos</td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_cf_venda" id="valor_cf_venda"
                                                                   disabled class="moeda" value="R$ 0,00">
                                                        </td>
                                                        <td class="titulo">
                                                            <span id="valor_cf_venda_perc">0%</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo"><b>Lucro Líquido (LO)</b></td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_lo_venda" id="valor_lo_venda"
                                                                   disabled class="moeda" value="R$ 0,00">
                                                        </td>
                                                        <td class="titulo">
                                                            <span id="valor_lo_venda_perc">0%</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo"><b>Diferença no Lucro</b></td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_diflo_venda"
                                                                   id="valor_diflo_venda"
                                                                   disabled class="moeda" value="R$ 0,00">
                                                        </td>
                                                        <td class="titulo">
                                                            <span id="valor_diflo_venda_perc">0%</span>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>


                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div id="pricing_table_example2" class="row">
                                        <div class="col-sm-12">
                                            <h3>ALTERAÇÃO NO PREÇO</h3>
                                            <div class="pricing-table col-sm-12 col-xs-12">

                                                <table class="table-striped table-bordered table-hover table-full-width"
                                                       id="pagRecebi" style="width: 100%">
                                                    <thead>
                                                    <tr class="topo_tabela">
                                                        <th class="titulo" colspan="2">O QUE ACONTECE SE EU ALTERAR MEU
                                                            PREÇO MÉDIO EM X%?
                                                        </th>
                                                        <th class="titulo">
                                                            <span class="iMenos control_perc" id="iMenos_preco">-</span>
                                                            <input type="text" id="valor_perc_preco"
                                                                   name="valor_perc_preco"
                                                                   value="0" class="form-control valor_perc" disabled/>
                                                            <span class="iMais control_perc" id="iMais_preco">+</span>
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">Receita / Faturamento</td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_rec_preco"
                                                                   id="valor_rec_preco"
                                                                   disabled class="moeda" value="R$ 0,00"/>
                                                        </td>
                                                        <td class="titulo">
                                                            <span id="valor_rec_preco_perc">0%</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">Despesas Diretas (CV)</td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_cv_preco" id="valor_cv_preco"
                                                                   disabled class="moeda" value="R$ 0,00">
                                                        </td>
                                                        <td class="titulo">
                                                            <span id="valor_cv_preco_perc">0%</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">Margem de Contribuição</td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_mc_preco" id="valor_mc_preco"
                                                                   disabled class="moeda" value="R$ 0,00">
                                                        </td>
                                                        <td class="titulo">
                                                            <span id="valor_mc_preco_perc">0%</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">Despesas Indiretas (CF) e Investimentos</td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_cf_preco" id="valor_cf_preco"
                                                                   disabled class="moeda" value="R$ 0,00">
                                                        </td>
                                                        <td class="titulo">
                                                            <span id="valor_cf_preco_perc">0%</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo"><b>Lucro Líquido (LO)</b></td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_lo_preco" id="valor_lo_preco"
                                                                   disabled class="moeda" value="R$ 0,00">
                                                        </td>
                                                        <td class="titulo">
                                                            <span id="valor_lo_preco_perc">0%</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo"><b>Diferença no Lucro</b></td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_diflo_preco"
                                                                   id="valor_diflo_preco"
                                                                   disabled class="moeda" value="R$ 0,00">
                                                        </td>
                                                        <td class="titulo">
                                                            <span id="valor_diflo_preco_perc">0%</span>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>


                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div id="pricing_table_example2" class="row">
                                        <div class="col-sm-12">
                                            <h3>ALTERAÇÃO NA DESPESA DIRETA (CV)</h3>
                                            <div class="pricing-table col-sm-12 col-xs-12">

                                                <table class="table-striped table-bordered table-hover table-full-width"
                                                       id="pagRecebi" style="width: 100%">
                                                    <thead>
                                                    <tr class="topo_tabela">
                                                        <th class="titulo" colspan="2">O QUE ACONTECE SE EU ALTERAR MEU
                                                            CUSTO VARIÁVEL EM X%?
                                                        </th>
                                                        <th class="titulo">
                                                            <span class="iMenos control_perc"
                                                                  id="iMenos_custVar">-</span>
                                                            <input type="text" id="valor_perc_custVar"
                                                                   name="valor_perc_custVar"
                                                                   value="0" class="form-control valor_perc" disabled/>
                                                            <span class="iMais control_perc" id="iMais_custVar">+</span>
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">Receita / Faturamento</td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_rec_custVar"
                                                                   id="valor_rec_custVar"
                                                                   disabled class="moeda" value="R$ 0,00"/>
                                                        </td>
                                                        <td class="titulo">
                                                            <span id="valor_rec_custVar_perc">0%</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">Despesas Diretas (CV)</td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_cv_custVar"
                                                                   id="valor_cv_custVar"
                                                                   disabled class="moeda" value="R$ 0,00">
                                                        </td>
                                                        <td class="titulo">
                                                            <span id="valor_cv_custVar_perc">0%</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">Margem de Contribuição</td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_mc_custVar"
                                                                   id="valor_mc_custVar"
                                                                   disabled class="moeda" value="R$ 0,00">
                                                        </td>
                                                        <td class="titulo">
                                                            <span id="valor_mc_custVar_perc">0%</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">Despesas Indiretas (CF) e Investimentos</td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_cf_custVar"
                                                                   id="valor_cf_custVar"
                                                                   disabled class="moeda" value="R$ 0,00">
                                                        </td>
                                                        <td class="titulo">
                                                            <span id="valor_cf_custVar_perc">0%</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo"><b>Lucro Líquido (LO)</b></td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_lo_custVar"
                                                                   id="valor_lo_custVar"
                                                                   disabled class="moeda" value="R$ 0,00">
                                                        </td>
                                                        <td class="titulo">
                                                            <span id="valor_lo_custVar_perc">0%</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo"><b>Diferença no Lucro</b></td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_diflo_custVar"
                                                                   id="valor_diflo_custVar"
                                                                   disabled class="moeda" value="R$ 0,00">
                                                        </td>
                                                        <td class="titulo">
                                                            <span id="valor_diflo_custVar_perc">0%</span>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>


                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div id="pricing_table_example2" class="row">
                                        <div class="col-sm-12">
                                            <h3>ALTERAÇÃO NA DESPESA INDIRETA (CF)</h3>
                                            <div class="pricing-table col-sm-12 col-xs-12">

                                                <table class="table-striped table-bordered table-hover table-full-width"
                                                       id="pagRecebi" style="width: 100%">
                                                    <thead>
                                                    <tr class="topo_tabela">
                                                        <th class="titulo" colspan="2">O QUE ACONTECE SE EU ALTERAR O
                                                            GASTO FIXO EM X%?
                                                        </th>
                                                        <th class="titulo">
                                                            <span class="iMenos control_perc"
                                                                  id="iMenos_custFix">-</span>
                                                            <input type="text" id="valor_perc_custFix"
                                                                   name="valor_perc_custFix"
                                                                   value="0" class="form-control valor_perc" disabled/>
                                                            <span class="iMais control_perc" id="iMais_custFix">+</span>
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">Receita / Faturamento</td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_rec_custFix"
                                                                   id="valor_rec_custFix"
                                                                   disabled class="moeda" value="R$ 0,00"/>
                                                        </td>
                                                        <td class="titulo">
                                                            <span id="valor_rec_custFix_perc">0%</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">Despesas Diretas (CV)</td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_cv_custFix"
                                                                   id="valor_cv_custFix"
                                                                   disabled class="moeda" value="R$ 0,00">
                                                        </td>
                                                        <td class="titulo">
                                                            <span id="valor_cv_custFix_perc">0%</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">Margem de Contribuição</td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_mc_custFix"
                                                                   id="valor_mc_custFix"
                                                                   disabled class="moeda" value="R$ 0,00">
                                                        </td>
                                                        <td class="titulo">
                                                            <span id="valor_mc_custFix_perc">0%</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">Despesas Indiretas (CF) e Investimentos</td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_cf_custFix"
                                                                   id="valor_cf_custFix"
                                                                   disabled class="moeda" value="R$ 0,00">
                                                        </td>
                                                        <td class="titulo">
                                                            <span id="valor_cf_custFix_perc">0%</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo"><b>Lucro Líquido (LO)</b></td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_lo_custFix"
                                                                   id="valor_lo_custFix"
                                                                   disabled class="moeda" value="R$ 0,00">
                                                        </td>
                                                        <td class="titulo">
                                                            <span id="valor_lo_custFix_perc">0%</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo"><b>Diferença no Lucro</b></td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_diflo_custFix"
                                                                   id="valor_diflo_custFix"
                                                                   disabled class="moeda" value="R$ 0,00">
                                                        </td>
                                                        <td class="titulo">
                                                            <span id="valor_diflo_custFix_perc">0%</span>
                                                        </td>
                                                    </tr>

                                                    </tbody>
                                                </table>


                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div id="pricing_table_maior_dif" class="row">
                                        <div class="col-sm-12">
                                            <h3>A MAIOR DIFERENÇA</h3>
                                            <div class="pricing-table col-sm-12 col-xs-12">

                                                <table class="table-striped table-bordered table-hover table-full-width"
                                                       id="pagRecebi" style="width: 100%">
                                                    <thead>
                                                    <tr class="topo_tabela">
                                                        <th class="titulo" colspan="3">O QUE CAUSA MAIOR IMPACTO?</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo"></td>
                                                        <td class="titulo"></td>
                                                        <td class="titulo"></td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">Alteração na Receita</td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_difvenda"
                                                                   id="valor_difvenda"
                                                                   disabled class="moeda" value="R$ 0,00">
                                                        </td>
                                                        <td class="titulo">
                                                            <span id="valor_difvenda_perc">0%</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">Alteração na Despesas Diretas (CV)</td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_difcustVar"
                                                                   id="valor_difcustVar"
                                                                   disabled class="moeda" value="R$ 0,00">
                                                        </td>
                                                        <td class="titulo">
                                                            <span id="valor_difcustVar_perc">0%</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">Alteração no Preço</td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_difpreco"
                                                                   id="valor_difpreco"
                                                                   disabled class="moeda" value="R$ 0,00">
                                                        </td>
                                                        <td class="titulo">
                                                            <span id="valor_difpreco_perc">0%</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">Alteração na Despesas Indiretas (CF)</td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_difcustFix"
                                                                   id="valor_difcustFix"
                                                                   disabled class="moeda" value="R$ 0,00">
                                                        </td>
                                                        <td class="titulo">
                                                            <span id="valor_difcustFix_perc">0%</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo"></td>
                                                        <td class="titulo"></td>
                                                        <td class="titulo"></td>
                                                    </tr>
                                                    </tbody>
                                                </table>


                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div id="pricing_table_example2" class="row">
                                        <div class="col-sm-12">
                                            <h3>TODAS ALTERAÇÕES</h3>
                                            <div class="pricing-table col-sm-12 col-xs-12">

                                                <table class="table-striped table-bordered table-hover table-full-width"
                                                       id="pagRecebi" style="width: 100%">
                                                    <thead>
                                                    <tr class="topo_tabela">
                                                        <th class="titulo" colspan="2">SE TODAS AS ALTERAÇÕES OCORREREM
                                                            SIMULTANEAMENTE?
                                                        </th>
                                                        <th class="titulo"><span id="perc_total"
                                                                                 class="topo_tabela_perc">0%</span></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">Receita / Faturamento</td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_rec_total"
                                                                   id="valor_rec_total"
                                                                   disabled class="moeda receita" alt="total"
                                                                   value="R$ 0,00"/>
                                                        </td>
                                                        <td class="titulo">
                                                            <span id="valor_rec_total_perc">0%</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">Despesas Diretas (CV)</td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_cv_total" id="valor_cv_total"
                                                                   disabled class="moeda cv" alt="total"
                                                                   value="R$ 0,00"/>
                                                        </td>
                                                        <td class="titulo">
                                                            <span id="valor_cv_total_perc">0%</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">Margem de Contribuição</td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_mc_total" id="valor_mc_total"
                                                                   disabled class="moeda" value="R$ 0,00"/>
                                                        </td>
                                                        <td class="titulo">
                                                            <span id="valor_mc_total_perc">0%</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">Despesas Indiretas (CF) e Investimentos</td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_cf_total" id="valor_cf_total"
                                                                   disabled class="moeda cf" alt="base"
                                                                   value="R$ 0,00"/>
                                                        </td>
                                                        <td class="titulo">
                                                            <span id="valor_cf_total_perc">0%</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo"><b>Lucro Líquido (LO)</b></td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_lo_total" id="valor_lo_total"
                                                                   disabled class="moeda" value="R$ 0,00"/>
                                                        </td>
                                                        <td class="titulo">
                                                            <span id="valor_lo_total_perc">0%</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo"><b>Diferença no Lucro</b></td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_diflo_total"
                                                                   id="valor_diflo_total"
                                                                   disabled class="moeda" value="R$ 0,00">
                                                        </td>
                                                        <td class="titulo">
                                                            <span id="valor_diflo_total_perc">0%</span>
                                                        </td>
                                                    </tr>

                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="col-md-12">
                                <div id="pricing_table_example2" class="row">
                                    <div class="col-sm-12">
                                        <h3>PONTO DE EQUILIBRIO TURBINADO</h3>
                                        <div id="graf2" class="graf pricing-table col-sm-12 col-xs-12">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin: 30px 0 0;">
                                <div id="pricing_table_example2" class="row">
                                    <div class="pricing-table col-sm-12 col-xs-12">
                                        <div class="top">
                                            <h2 style="background-color: darkseagreen;">COLOCANDO EM PRÁTICA</h2>
                                        </div>
                                        <div class="tabbable">
                                            <ul id="myTab4" class="nav nav-tabs tab-padding tab-space-3 tab-blue">
                                                <li class="active">
                                                    <a href="#panel_tab3_example1" data-toggle="tab">
                                                        <i class="fa fa-shopping-cart"></i> Receita / Faturamento
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#panel_tab3_example2" data-toggle="tab">
                                                        <i class="fa fa-dollar"></i> Preço
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#panel_tab3_example3" data-toggle="tab">
                                                        <i class="fa fa-barcode"></i> Despesas Diretas (CV)
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#panel_tab3_example4" data-toggle="tab">
                                                        <i class="fa fa-group"></i> Despesas Indiretas (CF)
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane in active" id="panel_tab3_example1">
                                                    <ul>
                                                        <li>Estude e aplique estratégias de vendas, incluindo Upsell,
                                                            Cross Sell e Downsell. Veja nesse
                                                            <a href="https://www.youtube.com/watch?v=MBBCkMLyyEY"
                                                               target="_blank">LINK</a></li>
                                                        <li>
                                                            Estabeleça parcerias com pessoas influentes em sua região
                                                            para promover seus produtos.
                                                        </li>
                                                        <li>
                                                            Aprimore o atendimento ao cliente em todos os pontos de
                                                            contato com o seu negócio.
                                                            <ul>
                                                                <li>
                                                                    Certifique-se de que o outdoor, letreiro e placa do
                                                                    estabelecimento estejam bem iluminados e visíveis.
                                                                </li>
                                                                <li>
                                                                    Capacite todas as pessoas que têm contato com seus
                                                                    clientes para oferecer o melhor atendimento.
                                                                    Lembre-se de que não está apenas vendendo um produto
                                                                    ou serviço, mas sim um pacote de satisfação ao
                                                                    cliente.
                                                                </li>
                                                                <li>
                                                                    Avalie se todos os seus canais de comunicação estão
                                                                    operando corretamente, incluindo o site, Instagram,
                                                                    Canal do YouTube, WhatsApp, telefones e outros.
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            Estude sobre gatilhos mentais para empregar essas
                                                            técnicas, impulsionando suas vendas e aprofundando o
                                                            conhecimento sobre seus clientes. Saiba mais
                                                            nesse <a href="https://www.youtube.com/watch?v=arrads2h1zI"
                                                                     target="_blank">LINK</a>
                                                        </li>
                                                        <li>
                                                            Aprimore e destaque de maneira clara o seu diferencial para
                                                            os seus clientes. Por que escolher comprar conosco?
                                                        </li>
                                                        <li>
                                                            Dê ênfase à priorização do primeiro atendimento ao cliente,
                                                            pois conquistá-lo nesse momento pode levar à fidelização.
                                                            Utilize diversos meios, como email, telefone, redes sociais,
                                                            WhatsApp, presencial, entre outros
                                                        </li>
                                                        <li>
                                                            Desenvolva e implemente estratégias de fidelização de
                                                            clientes, visando transformá-los em compradores recorrentes
                                                            de seus produtos ou serviços, como, por exemplo, através de
                                                            planos anuais.
                                                        </li>
                                                        <li>
                                                            Aproveite o potencial do marketing digital, pois ele pode
                                                            impulsionar significativamente suas vendas. Isso inclui a
                                                            presença online, anúncios, WhatsApp para Empresas, redes
                                                            sociais, YouTube, entre outras estratégias.
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="tab-pane" id="panel_tab3_example2">
                                                    <ul>
                                                        <li>
                                                            Revise a precificação dos seus produtos/serviços a cada dois
                                                            meses, no máximo, identificando aqueles com melhores margens
                                                            para concentrar esforços nas vendas.
                                                        </li>
                                                        <li>
                                                            Ofereça pacotes ou planos diferenciados para atender às
                                                            necessidades específicas de diferentes clientes.
                                                        </li>
                                                        <li>
                                                            Crie pacotes ou ofertas especiais que variam ao longo do
                                                            ano. Essa abordagem não apenas cria um senso de urgência,
                                                            mas também pode incentivar compras adicionais.
                                                        </li>
                                                        <li>
                                                            Realize uma análise detalhada de todos os custos associados
                                                            à produção ou prestação de serviços.
                                                        </li>
                                                        <li>
                                                            Destaque características exclusivas que justifiquem um preço
                                                            mais elevado em comparação com a concorrência.
                                                        </li>
                                                        <li>
                                                            Implemente sistemas de monitoramento contínuo de preços,
                                                            considerando alterações no mercado, custos e concorrência, e
                                                            esteja pronto para ajustar os preços conforme necessário.
                                                        </li>
                                                        <li>
                                                            Ofereça descontos de forma estratégica, como descontos por
                                                            volume, descontos sazonais ou programas de fidelidade.
                                                            Certifique-se de que os descontos não comprometam a
                                                            lucratividade.
                                                        </li>
                                                        <li>
                                                            Treine a equipe de vendas para comunicar efetivamente o
                                                            valor dos produtos ou serviços. Capacite-os para explicar e
                                                            justificar os preços aos clientes.
                                                        </li>
                                                        <li>
                                                            Eduque seus clientes sobre o valor real do que você oferece.
                                                            Forneça informações detalhadas sobre a produção,
                                                            ingredientes, processos ou serviços que justifiquem um preço
                                                            mais elevado.
                                                        </li>
                                                        <li>
                                                            Ofereça descontos graduais com base na quantidade comprada.
                                                            Isso incentiva os clientes a comprarem mais para obterem um
                                                            melhor preço unitário.
                                                        </li>
                                                        <li>
                                                            Implemente programas de fidelidade que recompensem clientes
                                                            frequentes. Ofereça descontos exclusivos, brindes ou acesso
                                                            a produtos ou serviços exclusivos para membros leais.
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="tab-pane" id="panel_tab3_example3">
                                                    <ul>
                                                        <li>
                                                            Em relação aos impostos, analise o CNAE em conjunto com seu
                                                            contador para avaliar a possibilidade de reduzir a carga
                                                            tributária. Às vezes, um simples ajuste pode resultar em
                                                            significativa mudança na alíquota cobrada.
                                                        </li>
                                                        <li>
                                                            Renegocie regularmente as taxas das maquininhas de cartões.
                                                            Devido à intensa concorrência entre as operadoras, é
                                                            possível obter condições mais vantajosas. Recomenda-se
                                                            realizar essa negociação pelo menos três vezes ao ano.
                                                        </li>
                                                        <li>
                                                            Capacite seus vendedores/atendentes para direcionar seus
                                                            esforços na venda dos produtos/serviços com melhores
                                                            margens.
                                                        </li>
                                                        <li>
                                                            Procure otimizar as negociações com seus fornecedores
                                                            visando obter preços e prazos mais vantajosos.
                                                        </li>
                                                        <li>
                                                            Estabeleça um controle mais eficiente do seu estoque, com
                                                            foco especial nas perdas e quebras, pois essa prática
                                                            contribui significativamente para a melhoria da margem de
                                                            contribuição.
                                                        </li>
                                                        <li>
                                                            Procure negociar regularmente as taxas de comissões dos seus
                                                            vendedores, os custos de entrega com fornecedores e
                                                            transportadoras, bem como as taxas de aplicativos de vendas
                                                            sempre que possível.
                                                        </li>
                                                        <li>
                                                            Identifique os principais fatores de custo e estabeleça
                                                            metas para redução de despesas, priorizando aqueles que têm
                                                            maiores impactos financeiros.
                                                        </li>
                                                    </ul>

                                                </div>
                                                <div class="tab-pane" id="panel_tab3_example4">
                                                    <ul>
                                                        <li>
                                                            Estabeleça de maneira definitiva o valor do pró-labore dos
                                                            sócios, levando em conta a capacidade financeira da empresa,
                                                            e estabeleça uma data específica para o pagamento.
                                                        </li>
                                                        <li>
                                                            Minimize as taxas bancárias associadas às contas da empresa,
                                                            especialmente se não forem bancos digitais. Considere
                                                            utilizar pacotes mínimos ou migrar as contas para bancos
                                                            digitais, que geralmente oferecem taxas mais baixas.
                                                        </li>
                                                        <li>
                                                            Reavalie e renegocie as taxas de telefonia, celulares e
                                                            internet. É possível que você esteja pagando mais do que as
                                                            tarifas de mercado. Recomenda-se realizar essa negociação
                                                            pelo menos duas vezes ao ano.
                                                        </li>
                                                        <li>
                                                            Avalie a infraestrutura física do seu negócio; seu espaço
                                                            atual não está ocioso? Analise se o valor do aluguel está
                                                            alinhado com seu faturamento/receita atual.
                                                        </li>
                                                        <li>
                                                            Inclua a equipe de colaboradores no processo de redução de
                                                            custos e crie uma estratégia de bonificação em caso de
                                                            alcance de metas estabelecidas.
                                                        </li>
                                                        <li>
                                                            Avalie a equipe de colaboradores para determinar a real
                                                            necessidade de cada membro para a operação do negócio,
                                                            evitando mão de obra ociosa.
                                                        </li>
                                                        <li>
                                                            Estabeleça metas e elabore um plano de ação para redução de
                                                            custos, focando nas maiores despesas indiretas (CF).
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!-- end: PAGE CONTENT-->
        </div>
    </div>
</div>