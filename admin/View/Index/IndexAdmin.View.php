<style>

    #pricing_table_example2 .pricing-table {
        width: 100%;
        margin-right: 0.5%;
        min-height: 120px;
        margin-bottom: 10px;
        padding: 0 0 15px !important;
    }

    .pricing-table h2 {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    #calcular_pel {
        padding: 7px 20px;
        margin-top: -35px;
        float: right;
    }

    #pricing_table_example2 .pricing-table h1 {
        font-size: 4.5em !important;
    }

    #pricing_table_example2 .pricing-table h1 sup {
        font-size: 0.5em !important;
    }

    #pagRecebi th, #pagRecebi td {
        padding: 5px;
        text-align: center;
    }

    #pagRecebi td {
        font-size: 2em;
        font-weight: bolder;
        font-style: italic;
    }

    #pagRecebi td a {
        color: #0e0e0e !important;
    }

    #pagRecebi td a:hover {
        cursor: pointer;
    }

    .titulo {
        font-size: 1.5em !important;
        font-style: unset !important;
    }

    .input-group_perc{
        width: 50%;
        margin-left: 25%;
        margin-top: 10px;
        margin-bottom: 20px;
    }

    .input-group{
        width: 50%;
    }

    .input-group-addon{
        font-weight: 900;
        padding: 0 10px;
        font-size: 1.2em;
    }

    .input-group_perc #perc_lucro{
        width: 100%;
        display: inline-block;
        font-size: 2em;
        padding: 18px 5px;
    }

</style>

<div class="main-content">
    <!-- end: SPANEL CONFIGURATION MODAL FORM -->
    <div class="container" style="padding-top: 30px">
        <div class="row">
            <div class="col-md-12">
                <?php
                if (AssinanteService::getCoAssinanteLogado()) {
                ?>
                <div id="pricing_table_example2" class="row peop">
                    <div class="col-md-4">
                        <h3>Ponto de Equilíbrio</h3>
                        <div class="pricing-table col-sm-12 col-xs-12">
                            <div class="top">
                                <h2 style="background-color: blue;">Operacional</h2>
                            </div>
                            <h1 style="margin-top: 7%"><sup>R$</sup><span id="ponto_equilibrio"><?=
                                    Valida::FormataMoeda($dados['PE']); ?></span></h1>
                        </div>
                        <div class="pricing-table col-sm-12 col-xs-12">
                            <div class="top">
                                <h2 style="background-color: green;">Lucrativo</h2>
                            </div>
                            <h1><sup>R$</sup><span id="ponto_equil_luc">0,00</span></h1>
                            <div class="input-group_perc">
                                <div class="input-group">
                                    <input type="text" class="form-control input-sm porc-int" placeholder="% de Lucro"
                                           name="perc_lucro" id="perc_lucro" value="10"/>
                                    <span class="input-group-addon">%</span>
                                </div>
                                <a href="#" class="btn btn-green" id="calcular_pel">Calcular</a>
                            </div>
                            <input type="hidden" name="despFix" id="despFix" value="<?= $dados['despFix']; ?>"/>
                            <input type="hidden" name="mcPerc" id="mcPerc" value="<?= $dados['mcPerc']; ?>"/>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <h3>Pagamentos e Recebimentos</h3>
                        <table class="table-striped table-bordered table-hover table-full-width"
                               id="pagRecebi" style="width: 100%">
                            <thead>
                            <tr style="background-color: #4F4F4F; color: #D0D9D9;">
                                <th style="width: 16%"></th>
                                <th style="width: 28%" class="titulo">Receber</th>
                                <th style="width: 28%" class="titulo">Pagar</th>
                                <th style="width: 28%" class="titulo">Saldo</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="linha-tabela odd">
                                <td class="titulo">Atrasado</td>
                                <td><a href="<?= HOME . ADMIN ?>/Fluxocaixa/Lancamento/<?=
                                    Valida::GeraParametro('pesquisa/1'); ?>"><?=
                                        Valida::FormataMoeda($dados['RecPag']['rec_atraso'], 'R$'); ?></a></td>
                                <td><a href="<?= HOME . ADMIN ?>/Fluxocaixa/Lancamento/<?=
                                    Valida::GeraParametro('pesquisa/2'); ?>"><?=
                                        Valida::FormataMoeda($dados['RecPag']['pag_atraso'], 'R$'); ?></a></td>
                                <td><?= Valida::FormataMoeda($dados['RecPag']['rec_atraso'] -
                                        $dados['RecPag']['pag_atraso'], 'R$'); ?></td>
                            </tr>
                            <tr class="linha-tabela odd">
                                <td class="titulo">No Mês</td>
                                <td><a href="<?= HOME . ADMIN ?>/Fluxocaixa/Lancamento/<?=
                                    Valida::GeraParametro('pesquisa/3'); ?>"><?=
                                        Valida::FormataMoeda($dados['RecPag']['rec_mes'], 'R$'); ?></a></td>
                                <td><a href="<?= HOME . ADMIN ?>/Fluxocaixa/Lancamento/<?=
                                    Valida::GeraParametro('pesquisa/4'); ?>"><?=
                                        Valida::FormataMoeda($dados['RecPag']['pag_mes'], 'R$'); ?></a></td>
                                <td><?= Valida::FormataMoeda($dados['RecPag']['rec_mes'] -
                                        $dados['RecPag']['pag_mes'], 'R$'); ?></td>
                            </tr>
                            <tr class="linha-tabela odd">
                                <td class="titulo">De Hoje</td>
                                <td><a href="<?= HOME . ADMIN ?>/Fluxocaixa/Lancamento/<?=
                                    Valida::GeraParametro('pesquisa/5'); ?>"><?=
                                        Valida::FormataMoeda($dados['RecPag']['rec_hoje'], 'R$'); ?></a></td>
                                <td><a href="<?= HOME . ADMIN ?>/Fluxocaixa/Lancamento/<?=
                                    Valida::GeraParametro('pesquisa/6'); ?>"><?=
                                        Valida::FormataMoeda($dados['RecPag']['pag_hoje'], 'R$'); ?></a></td>
                                <td><?= Valida::FormataMoeda($dados['RecPag']['rec_hoje'] -
                                        $dados['RecPag']['pag_hoje'], 'R$'); ?></td>
                            </tr>
                            <tr class="linha-tabela odd">
                                <td class="titulo">Futuro</td>
                                <td><a href="<?= HOME . ADMIN ?>/Fluxocaixa/Lancamento/<?=
                                    Valida::GeraParametro('pesquisa/7'); ?>"><?=
                                        Valida::FormataMoeda($dados['RecPag']['rec_futuro'], 'R$'); ?></a></td>
                                <td><a href="<?= HOME . ADMIN ?>/Fluxocaixa/Lancamento/<?=
                                    Valida::GeraParametro('pesquisa/8'); ?>"><?=
                                        Valida::FormataMoeda($dados['RecPag']['pag_futuro'], 'R$'); ?></a></td>
                                <td><?= Valida::FormataMoeda($dados['RecPag']['rec_futuro'] -
                                        $dados['RecPag']['pag_futuro'], 'R$'); ?></td>
                            </tr>
                            <tr class="linha-tabela odd">
                                <td class="titulo">Total</td>
                                <td><a href="<?= HOME . ADMIN ?>/Fluxocaixa/Lancamento/<?=
                                    Valida::GeraParametro('pesquisa/9'); ?>"><?=
                                        Valida::FormataMoeda($dados['RecPag']['rec_total'], 'R$'); ?></a></td>
                                <td><a href="<?= HOME . ADMIN ?>/Fluxocaixa/Lancamento/<?=
                                    Valida::GeraParametro('pesquisa/10'); ?>"><?=
                                        Valida::FormataMoeda($dados['RecPag']['pag_total'], 'R$'); ?></a></td>
                                <td><?= Valida::FormataMoeda($dados['RecPag']['rec_total'] -
                                        $dados['RecPag']['pag_total'], 'R$'); ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>


                <div class="panel panel-default peop">
                    <div class="col-md-12">
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
                    <div class="col-md-12">
                        <div class="alert alert-success fade in">
                            <div id="div_seis" style="height: 450px"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="alert alert-info fade in">
                            <div id="div_sete" style="height: 450px"></div>
                        </div>
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