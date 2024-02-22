<link rel="stylesheet" href="<?= PASTA_LIBRARY; ?>css/acelerador.css">
<div class="main-content">
    <!-- end: SPANEL CONFIGURATION MODAL FORM -->
    <div class="container" style="padding-top: 30px">
        <div class="row">
            <div class="col-md-12">
                <div id="pricing_table_example2" class="row" style="padding-bottom: 20px">
                    <div class="col-sm-12">
                        <div class="pricing-table col-sm-12 col-xs-12">
                            <div class="top">
                                <h2 style="background-color: blue;">ACELERADOR ESTRATÉGICO</h2>
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div id="pricing_table_example2" class="row">
                                        <div class="col-sm-12">
                                            <h3>CALCULO DO PONTO DE EQUILIBRIO OPERACIONAL</h3>
                                            <div class="pricing-table col-sm-12 col-xs-12">
                                                <table class="table-striped table-bordered table-hover table-full-width"
                                                       id="pagRecebi" style="width: 100%">
                                                    <thead>
                                                    <tr class="topo_tabela topo_tabela2">
                                                        <th class="titulo">DADOS INICIAIS</th>
                                                        <th class="titulo">Cenário Atual</th>
                                                        <th class="titulo">Cenário Simulado</th>
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
                                                                       class="porc-decimal form-control porc1"
                                                                       alt="base"
                                                                       value="0">
                                                                <span class="input-group-addon">%</span>
                                                            </div>
                                                        </td>
                                                        <td class="titulo">
                                                            <div class="input-group">
                                                                <input type="text" name="valor_cf_simu"
                                                                       id="valor_cf_simu"
                                                                       class="porc-decimal form-control porc2"
                                                                       alt="simu"
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
                                                                       class="porc-decimal form-control porc1"
                                                                       alt="base"
                                                                       value="0">
                                                                <span class="input-group-addon">%</span>
                                                            </div>
                                                        </td>
                                                        <td class="titulo">
                                                            <div class="input-group">
                                                                <input type="text" name="valor_imp_simu"
                                                                       id="valor_imp_simu"
                                                                       class="porc-decimal form-control porc2"
                                                                       alt="simu"
                                                                       value="0">
                                                                <span class="input-group-addon">%</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">% Comissão de Vendas / Frete entregas</td>
                                                        <td class="titulo">
                                                            <div class="input-group">
                                                                <input type="text" name="valor_com_base"
                                                                       id="valor_com_base"
                                                                       class="porc-decimal form-control porc1"
                                                                       alt="base"
                                                                       value="0">
                                                                <span class="input-group-addon">%</span>
                                                            </div>
                                                        </td>
                                                        <td class="titulo">
                                                            <div class="input-group">
                                                                <input type="text" name="valor_com_simu"
                                                                       id="valor_com_simu"
                                                                       class="porc-decimal form-control porc2"
                                                                       alt="simu"
                                                                       value="0">
                                                                <span class="input-group-addon">%</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">% Texa de Cartão</td>
                                                        <td class="titulo">
                                                            <div class="input-group">
                                                                <input type="text" name="valor_tax_base"
                                                                       id="valor_tax_base"
                                                                       class="porc-decimal form-control porc1"
                                                                       alt="base"
                                                                       value="0">
                                                                <span class="input-group-addon">%</span>
                                                            </div>
                                                        </td>
                                                        <td class="titulo">
                                                            <div class="input-group">
                                                                <input type="text" name="valor_tax_simu"
                                                                       id="valor_tax_simu"
                                                                       class="porc-decimal form-control porc2"
                                                                       alt="simu"
                                                                       value="0">
                                                                <span class="input-group-addon">%</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">% Outros</td>
                                                        <td class="titulo">
                                                            <div class="input-group">
                                                                <input type="text" name="valor_out_base"
                                                                       id="valor_out_base"
                                                                       class="porc-decimal form-control porc1"
                                                                       alt="base"
                                                                       value="0">
                                                                <span class="input-group-addon">%</span>
                                                            </div>
                                                        </td>
                                                        <td class="titulo">
                                                            <div class="input-group">
                                                                <input type="text" name="valor_out_simu"
                                                                       id="valor_out_simu"
                                                                       class="porc-decimal form-control porc2"
                                                                       alt="simu"
                                                                       value="0">
                                                                <span class="input-group-addon">%</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd separador">
                                                        <td class="titulo" colspan="3">Estimativa das
                                                            Despesas Indiretas (CF)
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">Despesas Indirestas (CF) Mensais <br>(Sem
                                                            Pro-Labore)
                                                        </td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_des_base" id="valor_des_base"
                                                                   class="moeda despInd" alt="base" value="0">
                                                        </td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_des_simu" id="valor_des_simu"
                                                                   class="moeda despInd" alt="simu" value="0">
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">Pro-Labore dos Sócios</td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_pro_base" id="valor_pro_base"
                                                                   class="moeda pro" alt="base" value="0">
                                                        </td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_pro_simu" id="valor_pro_simu"
                                                                   class="moeda pro" alt="simu" value="0">
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
                                            <h3>RESULTADO OPERACIONAL</h3>
                                            <div class="pricing-table col-sm-12 col-xs-12">
                                                <table class="table-striped table-bordered table-hover table-full-width"
                                                       id="pagRecebi" style="width: 100%">
                                                    <thead>
                                                    <tr class="topo_tabela topo_tabela2">
                                                        <th class="titulo">PEq1 =</th>
                                                        <th class="titulo">
                                                            <span class="numerador1">1</span><br>
                                                            <span class="denominador1">100%</span>
                                                        </th>
                                                        <th class="titulo">= <span class="res1">R$ 1,00</span></th>
                                                    </tr>
                                                    <tr class="topo_tabela topo_tabela2">
                                                        <th class="titulo">PEq2 =</th>
                                                        <th class="titulo">
                                                            <span class="numerador2">1</span><br>
                                                            <span class="denominador2">100%</span>
                                                        </th>
                                                        <th class="titulo">=
                                                            <span class="separador3">META DE VENDAS OPERACIONAL</span>
                                                            <br><span class="res2">R$ 1,00</span></th>
                                                    </tr>
                                                    </thead>
                                                </table>
                                            </div>
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
                                            <h3>CALCULO DO PONTO DE EQUILIBRIO LUCRATIVO</h3>
                                            <div class="pricing-table col-sm-12 col-xs-12">
                                                <table class="table-striped table-bordered table-hover table-full-width"
                                                       id="pagRecebi" style="width: 100%">
                                                    <thead>
                                                    <tr class="topo_tabela topo_tabela2">
                                                        <th class="titulo">DADOS INICIAIS</th>
                                                        <th class="titulo">Cenário Atual</th>
                                                        <th class="titulo">Cenário Simulado</th>
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
                                                            <input type="text" name="valor_rec_base_lucro"
                                                                   id="valor_rec_base_lucro"
                                                                   class="moeda receita2" alt="base" value="0">
                                                        </td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_rec_simu_lucro"
                                                                   id="valor_rec_simu_lucro"
                                                                   class="moeda receita2" alt="simu" value="0">
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
                                                                <input type="text" name="valor_cf_base_lucro"
                                                                       id="valor_cf_base_lucro"
                                                                       class="porc-decimal form-control porc3"
                                                                       alt="base" value="0">
                                                                <span class="input-group-addon">%</span>
                                                            </div>
                                                        </td>
                                                        <td class="titulo">
                                                            <div class="input-group">
                                                                <input type="text" name="valor_cf_simu_lucro"
                                                                       id="valor_cf_simu_lucro"
                                                                       class="porc-decimal form-control porc4"
                                                                       alt="simu" value="0">
                                                                <span class="input-group-addon">%</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">% Imposto s/ Nota Fiscal</td>
                                                        <td class="titulo">
                                                            <div class="input-group">
                                                                <input type="text" name="valor_imp_base_lucro"
                                                                       id="valor_imp_base_lucro"
                                                                       class="porc-decimal form-control porc3"
                                                                       alt="base" value="0">
                                                                <span class="input-group-addon">%</span>
                                                            </div>
                                                        </td>
                                                        <td class="titulo">
                                                            <div class="input-group">
                                                                <input type="text" name="valor_imp_simu_lucro"
                                                                       id="valor_imp_simu_lucro"
                                                                       class="porc-decimal form-control porc4"
                                                                       alt="simu" value="0">
                                                                <span class="input-group-addon">%</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">% Comissão de Vendas / Frete entregas</td>
                                                        <td class="titulo">
                                                            <div class="input-group">
                                                                <input type="text" name="valor_com_base_lucro"
                                                                       id="valor_com_base_lucro"
                                                                       class="porc-decimal form-control porc3"
                                                                       alt="base" value="0">
                                                                <span class="input-group-addon">%</span>
                                                            </div>
                                                        </td>
                                                        <td class="titulo">
                                                            <div class="input-group">
                                                                <input type="text" name="valor_com_simu_lucro"
                                                                       id="valor_com_simu_lucro"
                                                                       class="porc-decimal form-control porc4"
                                                                       alt="simu" value="0">
                                                                <span class="input-group-addon">%</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">% Texa de Cartão</td>
                                                        <td class="titulo">
                                                            <div class="input-group">
                                                                <input type="text" name="valor_tax_base_lucro"
                                                                       id="valor_tax_base_lucro"
                                                                       class="porc-decimal form-control porc3"
                                                                       alt="base" value="0">
                                                                <span class="input-group-addon">%</span>
                                                            </div>
                                                        </td>
                                                        <td class="titulo">
                                                            <div class="input-group">
                                                                <input type="text" name="valor_tax_simu_lucro"
                                                                       id="valor_tax_simu_lucro"
                                                                       class="porc-decimal form-control porc4"
                                                                       alt="simu" value="0">
                                                                <span class="input-group-addon">%</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">% Outros</td>
                                                        <td class="titulo">
                                                            <div class="input-group">
                                                                <input type="text" name="valor_out_base_lucro"
                                                                       id="valor_out_base_lucro"
                                                                       class="porc-decimal form-control porc3"
                                                                       alt="base" value="0">
                                                                <span class="input-group-addon">%</span>
                                                            </div>
                                                        </td>
                                                        <td class="titulo">
                                                            <div class="input-group">
                                                                <input type="text" name="valor_out_simu_lucro"
                                                                       id="valor_out_simu_lucro"
                                                                       class="porc-decimal form-control porc4"
                                                                       alt="simu" value="0">
                                                                <span class="input-group-addon">%</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd separador2">
                                                        <td class="titulo">% LUCRATIVIDADE</td>
                                                        <td class="titulo">
                                                            <div class="input-group">
                                                                <input type="text" name="valor_luc_base_lucro"
                                                                       id="valor_luc_base_lucro"
                                                                       class="porc-decimal form-control porc3"
                                                                       alt="base" value="0">
                                                                <span class="input-group-addon">%</span>
                                                            </div>
                                                        </td>
                                                        <td class="titulo">
                                                            <div class="input-group">
                                                                <input type="text" name="valor_luc_simu_lucro"
                                                                       id="valor_luc_simu_lucro"
                                                                       class="porc-decimal form-control porc4"
                                                                       alt="simu" value="0">
                                                                <span class="input-group-addon">%</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd separador">
                                                        <td class="titulo" colspan="3">Estimativa das
                                                            Despesas Indiretas (CF)
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">Despesas Indirestas (CF) Mensais <br>(Sem
                                                            Pro-Labore)
                                                        </td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_des_base_lucro"
                                                                   id="valor_des_base_lucro"
                                                                   class="moeda despInd2" alt="base" value="0">
                                                        </td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_des_simu_lucro"
                                                                   id="valor_des_simu_lucro"
                                                                   class="moeda despInd2" alt="simu" value="0">
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">Pro-Labore dos Sócios</td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_pro_base_lucro"
                                                                   id="valor_pro_base_lucro"
                                                                   class="moeda pro2" alt="base" value="0">
                                                        </td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_pro_simu_lucro"
                                                                   id="valor_pro_simu_lucro"
                                                                   class="moeda pro2" alt="simu" value="0">
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
                                            <h3>RESULTADO LUCRATIVO</h3>
                                            <div class="pricing-table col-sm-12 col-xs-12">
                                                <table class="table-striped table-bordered table-hover table-full-width"
                                                       id="pagRecebi" style="width: 100%">
                                                    <thead>
                                                    <tr class="topo_tabela topo_tabela2">
                                                        <th class="titulo">PEq1 =</th>
                                                        <th class="titulo">
                                                            <span class="numerador3">1</span><br>
                                                            <span class="denominador3">100%</span>
                                                        </th>
                                                        <th class="titulo">= <span class="res3">R$ 1,00</span></th>
                                                    </tr>
                                                    <tr class="topo_tabela topo_tabela2">
                                                        <th class="titulo">PEq2 =</th>
                                                        <th class="titulo">
                                                            <span class="numerador4">1</span><br>
                                                            <span class="denominador4">100%</span>
                                                        </th>
                                                        <th class="titulo">=
                                                            <span class="separador3">META DE VENDAS LUCRATIVA</span>
                                                            <br><span class="res4">R$ 1,00</span>
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                            <div id="graf2" class="graf pricing-table col-sm-12 col-xs-12">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div id="pricing_table_example2" class="row">
                                        <div class="col-sm-12">
                                            <h3>CALCULO DE META DE VENDAS PARA GASTO</h3>
                                            <div class="pricing-table col-sm-12 col-xs-12">
                                                <table class="table-striped table-bordered table-hover table-full-width"
                                                       id="pagRecebi" style="width: 100%">
                                                    <thead>
                                                    <tr class="topo_tabela topo_tabela2">
                                                        <th class="titulo">DADOS INICIAIS</th>
                                                        <th class="titulo">Cenário OPERACIONAL Atual</th>
                                                        <th class="titulo">Cenário LUCRATIVO Atual</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr class="linha-tabela odd separador">
                                                        <td class="titulo" colspan="3">Estimativa de Gasto Específico
                                                            Mensal
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd separador2">
                                                        <td class="titulo">Gasto Específico</td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_gas_base_gasto"
                                                                   id="valor_gas_base_gasto"
                                                                   class="moeda gasto" alt="base" value="0">
                                                        </td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_gas_simu_gasto"
                                                                   id="valor_gas_simu_gasto"
                                                                   class="moeda gasto" alt="simu" value="0">
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo"></td>
                                                        <td class="titulo"></td>
                                                        <td class="titulo"></td>
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
                                            <h3>RESULTADO LUCRATIVO</h3>
                                            <div class="pricing-table col-sm-12 col-xs-12">
                                                <table class="table-striped table-bordered table-hover table-full-width"
                                                       id="pagRecebi" style="width: 100%">
                                                    <thead>
                                                    <tr class="topo_tabela topo_tabela2">
                                                        <th class="titulo">PEqOp =</th>
                                                        <th class="titulo">
                                                            <span class="numerador5">1</span><br>
                                                            <span class="denominador5">100%</span>
                                                        </th>
                                                        <th class="titulo">= <span class="res5">R$ 1,00</span></th>
                                                    </tr>
                                                    <tr class="topo_tabela topo_tabela2">
                                                        <th class="titulo">PEqLuc =</th>
                                                        <th class="titulo">
                                                            <span class="numerador6">1</span><br>
                                                            <span class="denominador6">100%</span>
                                                        </th>
                                                        <th class="titulo">= <span class="res6">
                                                                <span class="separador3">META DE VENDAS GASTO</span>
                                                            <br>R$ 1,00</span></th>
                                                    </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div id="pricing_table_example2" class="row">
                                    <div class="col-sm-12">
                                        <h3>FATORES ESTRATÉGICOS</h3>
                                        <div class="pricing-table col-sm-12 col-xs-12">
                                            <table class="table-striped table-bordered table-hover table-full-width"
                                                   id="pagRecebi" style="width: 100%">
                                                <thead>
                                                <tr class="topo_tabela topo_tabela2">
                                                    <th colspan="2" class="titulo">FATOR MULTIPLICADOR DE GASTOS (FMG)
                                                    </th>
                                                    <th colspan="2" class="titulo">GRAU DO COMPROMETIMENTO DA RECEITA
                                                        (GCR)
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="linha-tabela odd separador">
                                                    <td class="titulo">OPERACIONAL Atual</td>
                                                    <td class="titulo">LUCRATIVO Atual</td>
                                                    <td class="titulo">OPERACIONAL Atual</td>
                                                    <td class="titulo">LUCRATIVO Atual</td>
                                                </tr>
                                                <tr class="linha-tabela odd separador4">
                                                    <td style="text-align: center;" class="titulo"
                                                        id="fmg1">R$ 1,00
                                                    </td>
                                                    <td class="titulo" id="fmg2">R$ 1,00</td>
                                                    <td class="titulo" id="gcr1">R$ 1,00</td>
                                                    <td class="titulo" id="gcr2">R$ 1,00</td>
                                                </tr>
                                                </tbody>
                                            </table>


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