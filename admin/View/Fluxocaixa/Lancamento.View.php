<div class="main-content">
    <div class="container lancamento">
        <?php include_once 'BotoesLancamento.View.php' ?>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php
                        $perfil_master = false;
                        Modal::ModalConfirmaDesativacao("DelFluxoCaixa", 'Deseja Realmente excluir esse Lançamento?');
                        $grid = new Grid();
                        ?>
                        <h2>
                            <small>Lançamentos Cadastrados</small>
                        </h2>
                        <?php
                        Modal::load();
                        $cpTodos = '<label class="divCheck tooltips" data-original-title="Marcar/Desmarcar Todos" 
                                    data-placement="top">
                                          <input type="checkbox" id="selTodosLanc">
                                          <span class="checkmark"></span>
                                    </label>';

                        $arrColunas = array($cpTodos, 'Tipo de Lançamento', 'Categoria', 'Lançado', 'Vencimento', 'Pago em',
                            'Status Pagamento', 'Valor', 'Valor Pago', 'Forma de Pagamento',
                            'Conta', 'Centro de Custo', 'Representação', 'Ações');

                        $grid->setColunasIndeces($arrColunas);
                        $grid->criaGrid();

                        /** @var FluxocaixaEntidade $res */
                        foreach ($result as $res):
                            $acao = '<a data-id="' . $res["co_fluxo_caixa"] . '"
                                    class="btn btn-primary tooltips editLanc"
                                    data-original-title="Editar Lançamento" data-placement="top">
                                    <i class="fa fa-clipboard"></i>
                                </a>
                                <a data-toggle="modal" role="button" class="btn btn-bricky tooltips deleta"
                                    id="' . $res["co_fluxo_caixa"] . '"
                                   href="#DelFluxoCaixa" data-original-title="Excluir Lançamento"
                                   data-placement="top">
                                    <i class="fa fa-trash-o"></i>
                                </a>';

                            $catLanc = $res["nu_codigo_n"]
                                . ' - ' . $res["no_neta"];

                            $labelStPg = '<span class="circle-img label-' .
                                StatusPagamentoFCEnum::$cores[$res["st_pagamento"]] .
                                '">&nbsp;&nbsp;&nbsp;&nbsp;</span> ';

                            $dtVenc = ($res["dt_vencimento"]) ? Valida::DataShow($res["dt_vencimento"]) : '';
                            $dtReal = ($res["dt_realizado"]) ? Valida::DataShow($res["dt_realizado"]) : '';
                            $val = ($res["nu_valor"]) ? Valida::FormataMoeda($res["nu_valor"]) : '';
                            $valPg = ($res["nu_valor_pago"]) ? Valida::FormataMoeda($res["nu_valor_pago"]) : '';
                            $centro = ($res["no_centro_custos"])
                                ? $res["no_centro_custos"] : '';
                            $rep = ($res["no_representacao"])
                                ? $res["no_representacao"] : '';
                            $cpBaixa = '';
                            if ($res["st_pagamento"] != StatusPagamentoFCEnum::PAGO) {
                                $cpBaixa = '<label class="divCheck">
                                          <input type="checkbox" class="bx-lanc"
                                               value="' . $res["co_fluxo_caixa"] . '" id="' . CO_FLUXO_CAIXA .
                                    $res["co_fluxo_caixa"] . '" name="' . CO_FLUXO_CAIXA . '[' .
                                    $res["co_fluxo_caixa"] . ']"/>
                                          <span class="checkmark"></span>
                                    </label>';
                            }

                            $grid->setColunas($cpBaixa);
                            $grid->setColunas(TipoFluxoCaixaEnum::$label[$res["tp_fluxo"]]);
                            $grid->setColunas($catLanc);
                            $grid->setColunas(Valida::DataShow($res["dt_cadastro"]));
                            $grid->setColunas($dtVenc);
                            $grid->setColunas($dtReal);
                            $grid->setColunas($labelStPg .
                                StatusPagamentoFCEnum::getDescricaoValor($res["st_pagamento"]));
                            $grid->setColunas($val);
                            $grid->setColunas($valPg);
                            $grid->setColunas(TipoPagamentoEnum::getDescricaoValor($res["tp_pagamento"]));
                            $grid->setColunas($res["no_banco"]);
                            $grid->setColunas($centro);
                            $grid->setColunas($rep);
                            $grid->setColunas($acao, 2);
                            $grid->criaLinha($res["co_fluxo_caixa"]);
                        endforeach;
                        $grid->finalizaGrid();
                        ?>
                    </div>
                </div>
                <!-- end: DYNAMIC TABLE PANEL -->
                <?php include_once 'CadastroCategoriaFC.View.php' ?>
                <?php include_once 'EstruturaCategoriaFC.View.php' ?>
                <?php include_once 'CadastroContaBancaria.View.php' ?>
                <?php include_once 'TransferenciaSaldo.View.php' ?>
                <?php include_once 'CadastroRepresentacao.View.php' ?>
                <?php include_once 'CadastroCentroCusto.View.php' ?>
                <?php include_once 'LancamentoEntrada.View.php' ?>
                <?php include_once 'LancamentoSaida.View.php' ?>
                <?php include_once 'Pesquisa.View.php' ?>
                <?php include_once 'Baixa.View.php' ?>
            </div>
        </div>
        <!-- end: PAGE CONTENT-->
    </div>
</div>
<!-- end: PAGE -->
