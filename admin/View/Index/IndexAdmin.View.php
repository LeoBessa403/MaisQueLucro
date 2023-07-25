<style>
    #perc_lucro {
        width: 20%;
        display: inline-block;
        font-size: 2em;
        padding: 20px 10px;
        margin-top: 10px;
    }

    #pricing_table_example2 .pricing-table {
        width: 49%;
        margin-right: 0.5%;
        min-height: 250px;
    }

    .pricing-table h2{
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .simbol_perc{
        width: 6%;
        display: inline-block;
        padding: 5px 7px;
        background-color: lightgray;
        font-size: 2em;
        font-weight: bolder;
        border: 1px solid #D5D5D5;
        border-radius: 0 0 0 0!important;
        font-family: inherit;
        line-height: 1.2;
        transition-duration: 0.1s;
        box-shadow: none;
        margin-left: -4px;
        margin-top: -1px;
    }

    #calcular_pel{
        padding: 12px 20px;
        margin-top: -10px;
    }
</style>

<div class="main-content">
    <!-- end: SPANEL CONFIGURATION MODAL FORM -->
    <div class="container" style="padding-top: 30px">
        <div class="row">
            <div class="col-md-12">
                <h3>Ponto de Equilíbrio</h3>
                <div id="pricing_table_example2" class="row">
                    <div class="col-sm-12">
                        <div class="pricing-table col-sm-6 col-xs-12">
                            <div class="top">
                                <h2 style="background-color: blue;">Operacional</h2>
                            </div>
                            <h1 style="margin-top: 7%"><sup>R$</sup><span id="ponto_equilibrio">100.050,20</span></h1>
                        </div>
                        <div class="pricing-table featured col-sm-6 col-xs-12">
                            <div class="top">
                                <h2 style="background-color: green;">Lucrativo</h2>
                            </div>
                            <h1><sup>R$</sup><span id="ponto_equil_luc">0,00</span></h1>
                                <input type="text" class="form-control input-sm porc-int" placeholder="% de Lucro"
                                       name="perc_lucro" id="perc_lucro" value="10"/>
                                <span class="simbol_perc">%</span>
                            <a href="#" class="btn btn-green" id="calcular_pel">Calcular</a>
                        </div>
                    </div>
                </div>


                <div class="panel panel-default">
                    <div class="col-md-12">
                        <?php
                        if (AssinanteService::getCoAssinanteLogado()) {
                        ?>
                        <h3>Saldo em Contas</h3>
                        <?php
                        $grid = new Grid();
                        $arrColunas = array('Banco', 'Agência', 'Conta', 'Saldo Atual', 'Ativa', 'Ações');

                        $grid->setColunasIndeces($arrColunas);
                        $grid->criaGrid();

                        foreach ($dados["bancos"] as $banco):
                            $acao = '';


                            $acao .= ' <a class="btn btn-med-grey tooltips btn-conta" data-id="' .
                                $banco["co_conta_bancaria"] . '" data-original-title="Histórico da Conta Bancária" 
                    data-placement="top"><i class="clip-folder-open"></i>
                     </a>';

                            $saldo = Valida::FormataMoeda($banco["nu_saldo"]);
                            if ($saldo < 0) {
                                $lbSaldo = '<p class="text-danger saldo">' . $saldo . '</p>';
                            } else {
                                $lbSaldo = '<p class="text-success saldo">' . $saldo . '</p>';
                            }

                            $grid->setColunas(strtoupper($banco["no_banco"]), 2);
                            $grid->setColunas($banco["nu_agencia"], 1);
                            $grid->setColunas($banco["nu_conta"], 2);
                            $grid->setColunas($lbSaldo, 2);
                            $grid->setColunas(Valida::SituacaoSimNao($banco["st_status"]), 1);
                            $grid->setColunas($acao, 1);
                            $grid->criaLinha($banco["co_conta_bancaria"]);
                        endforeach;
                        $grid->finalizaGrid();
                        ?>
                    </div>
                    <div class="col-md-6">
                        <div class="alert alert-warning fade in">
                            <div id="div_um" style="height: 450px"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="alert alert-danger fade in">
                            <div id="div_dois" style="height: 450px"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="alert alert-success fade in">
                            <div id="div_tres" style="height: 450px"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="alert alert-info fade in">
                            <div id="div_quatro" style="height: 450px"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="alert alert-warning fade in">
                            <div id="div_cinco" style="height: 450px"></div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <!-- end: FULL CALENDAR PANEL -->
            </div>
            <!-- end: PAGE CONTENT-->
            <?php include_once 'SaldoContaBancaria.View.php'; ?>
        </div>
    </div>
</div>