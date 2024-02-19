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
                                                    <tr class="topo_tabela topo_tabela2">
                                                        <th class="titulo">CALCULO DO PONTO DE EQUILIBRIO</th>
                                                        <th class="titulo">Cenário Atual</th>
                                                        <th class="titulo">Simular Cenário</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr class="linha-tabela odd separador">
                                                        <td class="titulo" colspan="3">Estimativa de Receita /
                                                            Faturamento
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">Receita / Faturamento</td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_rec_base" id="valor_rec_base"
                                                                   class="moeda receita" alt="base" value="0">
                                                        </td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_rec_simu" id="valor_rec_simu"
                                                                   class="moeda receita" alt="simu" value="0">
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd separador">
                                                        <td class="titulo" colspan="3">Estimativa em percentuais das
                                                            Despesas Diretas (CV)
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">% Custo Fornecedores / Matéria Prima /<br>
                                                            Frete compras / Insumos / Tercerizações
                                                        </td>
                                                        <td class="titulo">
                                                            <div class="input-group">
                                                                <input type="text" name="valor_cf_base"
                                                                       id="valor_cf_base"
                                                                       class="porc-decimal form-control cf" alt="base"
                                                                       value="0">
                                                                <span class="input-group-addon">%</span>
                                                            </div>
                                                        </td>
                                                        <td class="titulo">
                                                            <div class="input-group">
                                                                <input type="text" name="valor_cf_simu"
                                                                       id="valor_cf_simu"
                                                                       class="porc-decimal form-control cf" alt="simu"
                                                                       value="0">
                                                                <span class="input-group-addon">%</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">% Imposto s/ Nota Fiscal</td>
                                                        <td class="titulo">
                                                            <div class="input-group">
                                                                <input type="text" name="valor_imp_base"
                                                                       id="valor_imp_base"
                                                                       class="porc-decimal form-control imp" alt="base"
                                                                       value="0">
                                                                <span class="input-group-addon">%</span>
                                                            </div>
                                                        </td>
                                                        <td class="titulo">
                                                            <div class="input-group">
                                                                <input type="text" name="valor_imp_simu"
                                                                       id="valor_imp_simu"
                                                                       class="porc-decimal form-control imp" alt="simu"
                                                                       value="0">
                                                                <span class="input-group-addon">%</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">% Comissão de Vendas / Frete entregas</td>
                                                        <td class="titulo">
                                                            <div class="input-group">
                                                                <input type="text" name="valor_imp_base"
                                                                       id="valor_imp_base"
                                                                       class="porc-decimal form-control imp" alt="base"
                                                                       value="0">
                                                                <span class="input-group-addon">%</span>
                                                            </div>
                                                        </td>
                                                        <td class="titulo">
                                                            <div class="input-group">
                                                                <input type="text" name="valor_imp_simu"
                                                                       id="valor_imp_simu"
                                                                       class="porc-decimal form-control imp" alt="simu"
                                                                       value="0">
                                                                <span class="input-group-addon">%</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">% Texa de Cartão</td>
                                                        <td class="titulo">
                                                            <div class="input-group">
                                                                <input type="text" name="valor_imp_base"
                                                                       id="valor_imp_base"
                                                                       class="porc-decimal form-control imp" alt="base"
                                                                       value="0">
                                                                <span class="input-group-addon">%</span>
                                                            </div>
                                                        </td>
                                                        <td class="titulo">
                                                            <div class="input-group">
                                                                <input type="text" name="valor_imp_simu"
                                                                       id="valor_imp_simu"
                                                                       class="porc-decimal form-control imp" alt="simu"
                                                                       value="0">
                                                                <span class="input-group-addon">%</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">% Outros</td>
                                                        <td class="titulo">
                                                            <div class="input-group">
                                                                <input type="text" name="valor_imp_base"
                                                                       id="valor_imp_base"
                                                                       class="porc-decimal form-control imp" alt="base"
                                                                       value="0">
                                                                <span class="input-group-addon">%</span>
                                                            </div>
                                                        </td>
                                                        <td class="titulo">
                                                            <div class="input-group">
                                                                <input type="text" name="valor_imp_simu"
                                                                       id="valor_imp_simu"
                                                                       class="porc-decimal form-control imp" alt="simu"
                                                                       value="0">
                                                                <span class="input-group-addon">%</span>
                                                            </div>
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