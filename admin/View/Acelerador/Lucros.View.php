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
        height: 275px;
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
    .valor_perc{
        width: 60%;
        display: inline;
        float: left;
        text-align: center;
        height: 30px;
        font-weight: bolder;
        font-size: 1.5em;
    }
    .control_perc{
        width: 20%;
        display: inline;
        float: left;
        background-color: white;
        border: 1px solid #D5D5D5;
        border-radius: 0 0 0 0!important;
        font-size: .8em;
        transition-duration: 0.1s;
        box-shadow: none;
        height: 30px;
    }
    .control_perc:hover{
        cursor: pointer;
    }
    .iMais{
        color: green;
    }
    .iMenos{
        color: red;
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
                                                    <th class="titulo"><span id="perc_base">10%</span></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="linha-tabela odd">
                                                    <td class="titulo">Receita / Faturamento</td>
                                                    <td class="titulo">50.000,00</td>
                                                    <td class="titulo">100%</td>
                                                </tr>
                                                <tr class="linha-tabela odd">
                                                    <td class="titulo">Despesas Diretas (CV)</td>
                                                    <td class="titulo">30.000,00</td>
                                                    <td class="titulo">60%</td>
                                                </tr>
                                                <tr class="linha-tabela odd">
                                                    <td class="titulo">Margem de Contribuição</td>
                                                    <td class="titulo">20.000,00</td>
                                                    <td class="titulo">40%</td>
                                                </tr>
                                                <tr class="linha-tabela odd">
                                                    <td class="titulo">Despesas Indiretas (CF) e Investimentos</td>
                                                    <td class="titulo">10.000,00</td>
                                                    <td class="titulo">20%</td>
                                                </tr>
                                                <tr class="linha-tabela odd">
                                                    <td class="titulo"><b>Lucro Líquido (LO)</b></td>
                                                    <td class="titulo">10.000,00</td>
                                                    <td class="titulo">20%</td>
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
                                        <h3>GRÁFICO 1</h3>
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

                            <div class="col-md-6">
                                <div id="pricing_table_example2" class="row">
                                    <div class="col-sm-12">
                                        <h3>ALTERAÇÃO NA RECEITA</h3>
                                        <div class="pricing-table col-sm-12 col-xs-12">

                                            <table class="table-striped table-bordered table-hover table-full-width"
                                                   id="pagRecebi" style="width: 100%">
                                                <thead>
                                                <tr class="topo_tabela">
                                                    <th class="titulo" colspan="2">O QUE ACONTECE SE EU ALTERAR MINHA
                                                        QUANTIDADE VENDIDA MÉDIA EM:
                                                    </th>
                                                    <th class="titulo">
                                                        <span class="iMenos control_perc">-</span>
                                                        <input type="text" id="perc_venda" name="perc_venda"
                                                               value="1" class="form-control valor_perc" disabled/>
                                                        <span class="iMais control_perc">+</span>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="linha-tabela odd">
                                                    <td class="titulo">Receita / Faturamento</td>
                                                    <td class="titulo">50.000,00</td>
                                                    <td class="titulo">100%</td>
                                                </tr>
                                                <tr class="linha-tabela odd">
                                                    <td class="titulo">Despesas Diretas (CV)</td>
                                                    <td class="titulo">30.000,00</td>
                                                    <td class="titulo">60%</td>
                                                </tr>
                                                <tr class="linha-tabela odd">
                                                    <td class="titulo">Margem de Contribuição</td>
                                                    <td class="titulo">20.000,00</td>
                                                    <td class="titulo">40%</td>
                                                </tr>
                                                <tr class="linha-tabela odd">
                                                    <td class="titulo">Despesas Indiretas (CF) e Investimentos</td>
                                                    <td class="titulo">10.000,00</td>
                                                    <td class="titulo">20%</td>
                                                </tr>
                                                <tr class="linha-tabela odd">
                                                    <td class="titulo"><b>Lucro Líquido (LO)</b></td>
                                                    <td class="titulo">10.000,00</td>
                                                    <td class="titulo">20%</td>
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
                                                        PREÇO MÉDIO EM:
                                                    </th>
                                                    <th class="titulo">
                                                        <span class="iMenos control_perc">-</span>
                                                        <input type="text" id="perc_preco" name="perc_preco"
                                                               value="1" class="form-control valor_perc" disabled/>
                                                        <span class="iMais control_perc">+</span>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="linha-tabela odd">
                                                    <td class="titulo">Receita / Faturamento</td>
                                                    <td class="titulo">50.000,00</td>
                                                    <td class="titulo">100%</td>
                                                </tr>
                                                <tr class="linha-tabela odd">
                                                    <td class="titulo">Despesas Diretas (CV)</td>
                                                    <td class="titulo">30.000,00</td>
                                                    <td class="titulo">60%</td>
                                                </tr>
                                                <tr class="linha-tabela odd">
                                                    <td class="titulo">Margem de Contribuição</td>
                                                    <td class="titulo">20.000,00</td>
                                                    <td class="titulo">40%</td>
                                                </tr>
                                                <tr class="linha-tabela odd">
                                                    <td class="titulo">Despesas Indiretas (CF) e Investimentos</td>
                                                    <td class="titulo">10.000,00</td>
                                                    <td class="titulo">20%</td>
                                                </tr>
                                                <tr class="linha-tabela odd">
                                                    <td class="titulo"><b>Lucro Líquido (LO)</b></td>
                                                    <td class="titulo">10.000,00</td>
                                                    <td class="titulo">20%</td>
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
                                                        CUSTO VARIÁVEL EM:
                                                    </th>
                                                    <th class="titulo">
                                                        <span class="iMenos control_perc">-</span>
                                                        <input type="text" id="perc_dd" name="perc_dd"
                                                               value="-1" class="form-control valor_perc" disabled/>
                                                        <span class="iMais control_perc">+</span>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="linha-tabela odd">
                                                    <td class="titulo">Receita / Faturamento</td>
                                                    <td class="titulo">50.000,00</td>
                                                    <td class="titulo">100%</td>
                                                </tr>
                                                <tr class="linha-tabela odd">
                                                    <td class="titulo">Despesas Diretas (CV)</td>
                                                    <td class="titulo">30.000,00</td>
                                                    <td class="titulo">60%</td>
                                                </tr>
                                                <tr class="linha-tabela odd">
                                                    <td class="titulo">Margem de Contribuição</td>
                                                    <td class="titulo">20.000,00</td>
                                                    <td class="titulo">40%</td>
                                                </tr>
                                                <tr class="linha-tabela odd">
                                                    <td class="titulo">Despesas Indiretas (CF) e Investimentos</td>
                                                    <td class="titulo">10.000,00</td>
                                                    <td class="titulo">20%</td>
                                                </tr>
                                                <tr class="linha-tabela odd">
                                                    <td class="titulo"><b>Lucro Líquido (LO)</b></td>
                                                    <td class="titulo">10.000,00</td>
                                                    <td class="titulo">20%</td>
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
                                                        GASTO FIXO EM:
                                                    </th>
                                                    <th class="titulo">
                                                        <span class="iMenos control_perc">-</span>
                                                        <input type="text" id="perc_di" name="perc_di"
                                                               value="-1" class="form-control valor_perc" disabled/>
                                                        <span class="iMais control_perc">+</span>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="linha-tabela odd">
                                                    <td class="titulo">Receita / Faturamento</td>
                                                    <td class="titulo">50.000,00</td>
                                                    <td class="titulo">100%</td>
                                                </tr>
                                                <tr class="linha-tabela odd">
                                                    <td class="titulo">Despesas Diretas (CV)</td>
                                                    <td class="titulo">30.000,00</td>
                                                    <td class="titulo">60%</td>
                                                </tr>
                                                <tr class="linha-tabela odd">
                                                    <td class="titulo">Margem de Contribuição</td>
                                                    <td class="titulo">20.000,00</td>
                                                    <td class="titulo">40%</td>
                                                </tr>
                                                <tr class="linha-tabela odd">
                                                    <td class="titulo">Despesas Indiretas (CF) e Investimentos</td>
                                                    <td class="titulo">10.000,00</td>
                                                    <td class="titulo">20%</td>
                                                </tr>
                                                <tr class="linha-tabela odd">
                                                    <td class="titulo"><b>Lucro Líquido (LO)</b></td>
                                                    <td class="titulo">10.000,00</td>
                                                    <td class="titulo">20%</td>
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


                            <div class="col-md-6">
                                <div id="pricing_table_example2" class="row">
                                    <div class="col-sm-12">
                                        <h3>A MAIOR DIFERENÇA</h3>
                                        <div class="pricing-table col-sm-12 col-xs-12">

                                            <table class="table-striped table-bordered table-hover table-full-width"
                                                   id="pagRecebi" style="width: 100%">
                                                <thead>
                                                <tr class="topo_tabela">
                                                    <th class="titulo" colspan="3">O QUE CAUSA MAIOR IMPACTO</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="linha-tabela odd">
                                                    <td class="titulo">Receita / Faturamento</td>
                                                    <td class="titulo">50.000,00</td>
                                                    <td class="titulo">100%</td>
                                                </tr>
                                                <tr class="linha-tabela odd">
                                                    <td class="titulo">Despesas Diretas (CV)</td>
                                                    <td class="titulo">30.000,00</td>
                                                    <td class="titulo">60%</td>
                                                </tr>
                                                <tr class="linha-tabela odd">
                                                    <td class="titulo">Margem de Contribuição</td>
                                                    <td class="titulo">20.000,00</td>
                                                    <td class="titulo">40%</td>
                                                </tr>
                                                <tr class="linha-tabela odd">
                                                    <td class="titulo">Despesas Indiretas (CF) e Investimentos</td>
                                                    <td class="titulo">10.000,00</td>
                                                    <td class="titulo">20%</td>
                                                </tr>
                                                <tr class="linha-tabela odd">
                                                    <td class="titulo"><b>Lucro Líquido (LO)</b></td>
                                                    <td class="titulo">10.000,00</td>
                                                    <td class="titulo">20%</td>
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


                            <div class="col-md-6">
                                <div id="pricing_table_example2" class="row">
                                    <div class="col-sm-12">
                                        <h3>TODAS ALTERAÇÕES</h3>
                                        <div class="pricing-table col-sm-12 col-xs-12">

                                            <table class="table-striped table-bordered table-hover table-full-width"
                                                   id="pagRecebi" style="width: 100%">
                                                <thead>
                                                <tr class="topo_tabela">
                                                    <th class="titulo" colspan="3">SE TODAS AS ALTERAÇÕES OCORREREM
                                                        SIMULTANEAMENTE
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="linha-tabela odd">
                                                    <td class="titulo">Receita / Faturamento</td>
                                                    <td class="titulo">50.000,00</td>
                                                    <td class="titulo">100%</td>
                                                </tr>
                                                <tr class="linha-tabela odd">
                                                    <td class="titulo">Despesas Diretas (CV)</td>
                                                    <td class="titulo">30.000,00</td>
                                                    <td class="titulo">60%</td>
                                                </tr>
                                                <tr class="linha-tabela odd">
                                                    <td class="titulo">Margem de Contribuição</td>
                                                    <td class="titulo">20.000,00</td>
                                                    <td class="titulo">40%</td>
                                                </tr>
                                                <tr class="linha-tabela odd">
                                                    <td class="titulo">Despesas Indiretas (CF) e Investimentos</td>
                                                    <td class="titulo">10.000,00</td>
                                                    <td class="titulo">20%</td>
                                                </tr>
                                                <tr class="linha-tabela odd">
                                                    <td class="titulo"><b>Lucro Líquido (LO)</b></td>
                                                    <td class="titulo">10.000,00</td>
                                                    <td class="titulo">20%</td>
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


                            <div class="col-md-12">
                                <div id="pricing_table_example2" class="row">
                                    <div class="col-sm-12">
                                        <h3>COLOCANDO EM PRÁTICA</h3>

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