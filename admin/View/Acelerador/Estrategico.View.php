<link rel="stylesheet" href="<?= PASTA_LIBRARY; ?>css/acelerador.css">
<div class="main-content">
    <!-- end: SPANEL CONFIGURATION MODAL FORM -->
    <div class="container" style="padding-top: 30px">
        <div class="row">
            <div class="col-md-12">
                <div id="pricing_table_example2" class="row">
                    <div class="col-sm-12">
                        <div class="pricing-table col-sm-12 col-xs-12">
                            <div class="top">
                                <h2 style="background-color: blue;">ACELERADOR ESTRATÉGICO</h2>
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
                                                        <th class="titulo">QUAL LUCRO BASE VOCÊ DESEJA
                                                            AVALIAR?
                                                        </th>
                                                        <th class="titulo">QUAL LUCRO BASE VOCÊ DESEJA
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

                        </div>
                    </div>
                </div>
            </div>
            <!-- end: PAGE CONTENT-->
        </div>
    </div>
</div>