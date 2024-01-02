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

    .div_graf1 {
        float: left;
        height: 290px;
        width: 30%;
        margin-left: 15%;
        box-shadow: 1px 1px 10px black;
        border: 1px solid black;
        margin-top: 4%;
        font-size: 1.3em;
        border-radius: 10px;
        color: white;
        font-weight: 600;
    }

    .div_graf1 span {
        display: inline-block;
        width: 100%;
        padding: 5px;
    }

    #receita {
        background-color: green;
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
    }
    #pricing_table_maior_dif tr td:last-child{
        width: 20%;
        font-size: 1.3em !important;
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
                                                        <th class="titulo"><span id="perc_base">0%</span></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">Receita / Faturamento</td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_rec_base" id="valor_rec_base"
                                                                   class="moeda receita" alt="base">
                                                        </td>
                                                        <td class="titulo">
                                                            <span id="valor_rec_base_perc">0%</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">Despesas Diretas (CV)</td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_cv_base" id="valor_cv_base"
                                                                   class="moeda cv" alt="base">
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
                                                                   class="moeda cf" alt="base">
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

                                <div class="col-md-6" style="height: 400px">
                                    <div id="pricing_table_example2" class="row">
                                        <div class="col-sm-12">
                                            <h3>RESULTADO INICIAL</h3>
                                            <div id="graf1" class="pricing-table col-sm-12 col-xs-12">
                                                <div id="receita" class="div_graf1">
                                                    <span>50.000,00<br>Faturamento / Receita</span>
                                                </div>
                                                <div id="desp" class="div_graf1">
                                                    <span style="background-color: darkred; height: 60%">50.000,00<br>Custos Variáveis</span>
                                                    <span style="background-color: #ee5f5b; height: 20%">50.000,00<br>Despesas Fixas</span>
                                                    <span style="background-color: #0a90eb; height: 20%">50.000,00<br>Lucro Operacional</span>
                                                </div>

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


                                <div class="col-md-6" style="height: 400px">
                                    <div id="pricing_table_example2" class="row">
                                        <div class="col-sm-12">
                                            <h3>TURBINANDO PELA RECEITA</h3>
                                            <div id="graf1" class="pricing-table col-sm-12 col-xs-12">
                                                <div id="receita" class="div_graf1">
                                                    <span>50.000,00<br>Faturamento / Receita</span>
                                                </div>
                                                <div id="desp" class="div_graf1">
                                                    <span style="background-color: darkred; height: 60%">50.000,00<br>Custos Variáveis</span>
                                                    <span style="background-color: #ee5f5b; height: 20%">50.000,00<br>Despesas Fixas</span>
                                                    <span style="background-color: #0a90eb; height: 20%">50.000,00<br>Lucro Operacional</span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
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


                                <div class="col-md-6" style="height: 400px">
                                    <div id="pricing_table_example2" class="row">
                                        <div class="col-sm-12">
                                            <h3>TURBINANDO PELO PREÇO</h3>
                                            <div id="graf1" class="pricing-table col-sm-12 col-xs-12">
                                                <div id="receita" class="div_graf1">
                                                    <span>50.000,00<br>Faturamento / Receita</span>
                                                </div>
                                                <div id="desp" class="div_graf1">
                                                    <span style="background-color: darkred; height: 60%">50.000,00<br>Custos Variáveis</span>
                                                    <span style="background-color: #ee5f5b; height: 20%">50.000,00<br>Despesas Fixas</span>
                                                    <span style="background-color: #0a90eb; height: 20%">50.000,00<br>Lucro Operacional</span>
                                                </div>

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

                                <div class="col-md-6" style="height: 400px">
                                    <div id="pricing_table_example2" class="row">
                                        <div class="col-sm-12">
                                            <h3>TURBINANDO PELA DESPESA DIRETA (CV)</h3>
                                            <div id="graf1" class="pricing-table col-sm-12 col-xs-12">
                                                <div id="receita" class="div_graf1">
                                                    <span>50.000,00<br>Faturamento / Receita</span>
                                                </div>
                                                <div id="desp" class="div_graf1">
                                                    <span style="background-color: darkred; height: 60%">50.000,00<br>Custos Variáveis</span>
                                                    <span style="background-color: #ee5f5b; height: 20%">50.000,00<br>Despesas Fixas</span>
                                                    <span style="background-color: #0a90eb; height: 20%">50.000,00<br>Lucro Operacional</span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
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

                                <div class="col-md-6" style="height: 400px">
                                    <div id="pricing_table_example2" class="row">
                                        <div class="col-sm-12">
                                            <h3>TURBINANDO PELA DESPESA INDIRETA (CF)</h3>
                                            <div id="graf1" class="pricing-table col-sm-12 col-xs-12">
                                                <div id="receita" class="div_graf1">
                                                    <span>50.000,00<br>Faturamento / Receita</span>
                                                </div>
                                                <div id="desp" class="div_graf1">
                                                    <span style="background-color: darkred; height: 60%">50.000,00<br>Custos Variáveis</span>
                                                    <span style="background-color: #ee5f5b; height: 20%">50.000,00<br>Despesas Fixas</span>
                                                    <span style="background-color: #0a90eb; height: 20%">50.000,00<br>Lucro Operacional</span>
                                                </div>

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

                                                    </tbody>
                                                </table>


                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6" style="height: 400px">
                                    <div id="pricing_table_example2" class="row">
                                        <div class="col-sm-12">
                                            <h3>NOVO PONTO DE EQUILÍBRIO</h3>
                                            <div id="graf1" class="pricing-table col-sm-12 col-xs-12">
                                                <div id="receita" class="div_graf1">
                                                    <span>50.000,00<br>Faturamento / Receita</span>
                                                </div>
                                                <div id="desp" class="div_graf1">
                                                    <span style="background-color: darkred; height: 60%">50.000,00<br>Custos Variáveis</span>
                                                    <span style="background-color: #ee5f5b; height: 20%">50.000,00<br>Despesas Fixas</span>
                                                    <span style="background-color: #0a90eb; height: 20%">50.000,00<br>Lucro Operacional</span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
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
                                                        <th class="titulo"><span id="perc_total">0%</span></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">Receita / Faturamento</td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_rec_total" id="valor_rec_total"
                                                                 disabled class="moeda receita" alt="total" value="R$ 0,00"/>
                                                        </td>
                                                        <td class="titulo">
                                                            <span id="valor_rec_total_perc">0%</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">Despesas Diretas (CV)</td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_cv_total" id="valor_cv_total"
                                                                 disabled class="moeda cv" alt="total" value="R$ 0,00"/>
                                                        </td>
                                                        <td class="titulo">
                                                            <span id="valor_cv_total_perc">0%</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">Margem de Contribuição</td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_mc_total" id="valor_mc_total"
                                                                   disabled class="moeda" value="R$ 0,00" />
                                                        </td>
                                                        <td class="titulo">
                                                            <span id="valor_mc_total_perc">0%</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="linha-tabela odd">
                                                        <td class="titulo">Despesas Indiretas (CF) e Investimentos</td>
                                                        <td class="titulo">
                                                            <input type="text" name="valor_cf_total" id="valor_cf_total"
                                                                   disabled class="moeda cf" alt="base" value="R$ 0,00"/>
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

                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6" style="height: 400px">
                                    <div id="pricing_table_example2" class="row">
                                        <div class="col-sm-12">
                                            <h3>TURBINANDO GERAL</h3>
                                            <div id="graf1" class="pricing-table col-sm-12 col-xs-12">
                                                <div id="receita" class="div_graf1">
                                                    <span>50.000,00<br>Faturamento / Receita</span>
                                                </div>
                                                <div id="desp" class="div_graf1">
                                                    <span style="background-color: darkred; height: 60%">50.000,00<br>Custos Variáveis</span>
                                                    <span style="background-color: #ee5f5b; height: 20%">50.000,00<br>Despesas Fixas</span>
                                                    <span style="background-color: #0a90eb; height: 20%">50.000,00<br>Lucro Operacional</span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12" style="margin-top: 30px">
                                <div id="pricing_table_example2" class="row">
                                    <div class="col-sm-12">
                                        <div class="top">
                                            <h2 style="background-color: darkseagreen;">COLOCANDO EM PRÁTICA</h2>
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