<!-- title bar -->
<div class="container-fluid">
    <div class="row align-items-center page-title">
        <h4>Financeiro - <small>Lançamentos</small></h4>
    </div>
</div>
<div class="row">
    <!-- timesheet -->
    <div class="col-12">
        <div class="card border-0 overflow-hidden">
            <div class="card-header">
                <div class="row">
                    <div class="col-auto mb-2">
                        <i class="bi bi-cash h5 avatar avatar-40 bg-light-theme rounded"></i>
                    </div>
                    <div class="col mb-3">
                        <h6 class="fw-medium mb-0">Lançamentos</h6>
                        <p class="text-secondary small">Lançamentos Cadastrados</p>
                    </div>
                    <div class="col-4">
                        <div class="input-group ">
                            <span class="input-group-text text-theme"><i class="bi bi-search"></i></span>
                            <input type="text" class="form-control" placeholder="Pesquisar...">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-borderless footable footable-1 footable-paging footable-paging-center breakpoint breakpoint-lg"
                       data-show-toggle="true" style="">
                    <thead>
                    <?php
                        Modal::load();
                        $cpTodos = '<div class="form-check form-switch mb-4">
                                    <input class="form-check-input" type="checkbox" role="switch" id="selTodosLanc" 
                                        data-original-title="Marcar/Desmarcar Todos" data-placement="top"></div>';


                        $arrColunas = array($cpTodos, 'Tipo de Lançamento', 'Categoria', 'Lançado', 'Vencimento', 'Pago em',
                            'Status Pagamento', 'Valor', 'Valor Pago', 'Forma de Pagamento',
                            'Conta', 'Centro de Custo', 'Representação', 'Ações');
                        ?>
                    <tr class="text-muted footable-header">
                        <th class="w-12 footable-sortable footable-first-visible" style="display: table-cell;">
                            <span class="fooicon fooicon-sort"></span></th>
                        <th style="display: table-cell;"><?= $cpTodos; ?></th>
                        <th data-breakpoints="xs" class="footable-sortable" style="display: table-cell;">Tipo de Lançamento
                            <span class="fooicon fooicon-sort"></span></th>
                        <th data-breakpoints="xs" class="footable-sortable" style="display: table-cell;">
                            Vencimento<span class="fooicon fooicon-sort"></span></th>
                        <th data-breakpoints="xs md" class="footable-sortable" style="display: table-cell;">Status Pagamento<span
                                    class="fooicon fooicon-sort"></span></th>
                        <th data-breakpoints="xs md" class="footable-sortable" style="display: table-cell;">
                            Valor<span class="fooicon fooicon-sort"></span></th>
                        <th data-breakpoints="all" data-title="Deliver to" class="footable-sortable"
                            style="display: none;">Valor Pago<span class="fooicon fooicon-sort"></span></th>
                        <th data-breakpoints="all" data-title="Address" class="footable-sortable"
                            style="display: none;">Address<span class="fooicon fooicon-sort"></span></th>
                        <th data-breakpoints="all" data-title="Location" class="footable-sortable"
                            style="display: none;">Location<span class="fooicon fooicon-sort"></span></th>
                        <th data-breakpoints="xs" class="footable-sortable" style="display: table-cell;">Payment<span
                                    class="fooicon fooicon-sort"></span></th>
                        <th class="w-auto footable-sortable footable-last-visible" style="display: table-cell;">
                            Action<span class="fooicon fooicon-sort"></span></th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td class="footable-first-visible" style="display: table-cell;"><span
                                    class="footable-toggle fooicon fooicon-plus"></span></td>
                        <td style="display: table-cell;">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <figure class="avatar avatar-40 mb-0 coverimg rounded-circle"
                                            style="background-image: url(&quot;assets/img/user-2.jpg&quot;);">
                                        <img src="assets/img/user-2.jpg" alt="" style="display: none;">
                                    </figure>
                                </div>
                                <div class="col ps-0">
                                    <p class="mb-0">Janita Johnson</p>
                                    <p class="text-secondary small">United Kingdom</p>
                                </div>
                            </div>
                        </td>
                        <td style="display: table-cell;">
                            <p class="mb-0">Laravel 53</p>
                            <p class="text-secondary small">LaraWell University</p>
                        </td>
                        <td style="display: table-cell;">
                            <p class="mb-0 text-green">0.000015</p>
                            <p class="text-secondary small">BTC</p>
                        </td>
                        <td style="display: table-cell;">
                            <p class="mb-0">20-1-2022</p>
                            <p class="text-secondary small">9:00 am</p>
                        </td>
                        <td style="display: table-cell;">
                            Delivered
                        </td>
                        <td style="display: none;">
                            John McGra
                        </td>
                        <td style="display: none;">
                            2356, Street-5, New York 4586, US
                        </td>
                        <td style="display: none;">
                            <p class="mb-1">Lat: 5.678167, Long: 12.078613</p>
                            <p class="text-secondary small">This can be a map also</p>
                        </td>
                        <td style="display: table-cell;">
                            <span class="badge badge-sm bg-green">Paid</span>
                        </td>
                        <td class="footable-last-visible" style="display: table-cell;">
                            <div class="dropdown d-inline-block">
                                <a class="text-secondary dd-arrow-none" data-bs-toggle="dropdown"
                                   aria-expanded="false" data-bs-display="static" role="button">
                                    <i class="bi bi-three-dots"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="javascript:void(0)">Edit</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0)">Move</a></li>
                                    <li><a class="dropdown-item text-danger"
                                           href="javascript:void(0)">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="footable-first-visible" style="display: table-cell;"><span
                                    class="footable-toggle fooicon fooicon-plus"></span></td>
                        <td style="display: table-cell;">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <figure class="avatar avatar-40 mb-0 coverimg rounded-circle"
                                            style="background-image: url(&quot;assets/img/user-2.jpg&quot;);">
                                        <img src="assets/img/user-2.jpg" alt="" style="display: none;">
                                    </figure>
                                </div>
                                <div class="col ps-0">
                                    <p class="mb-0">Jia Sen</p>
                                    <p class="text-secondary small">Support</p>
                                </div>
                            </div>
                        </td>
                        <td style="display: table-cell;">
                            <p class="mb-0">Medical Science</p>
                            <p class="text-secondary small">Yetti University</p>
                        </td>
                        <td style="display: table-cell;">
                            <p class="mb-0 text-green">12</p>
                            <p class="text-secondary small">XMR</p>
                        </td>
                        <td style="display: table-cell;">
                            <p class="mb-0">19-1-2022</p>
                            <p class="text-secondary small">6:34 pm</p>
                        </td>
                        <td style="display: table-cell;">
                            Sent
                        </td>
                        <td style="display: none;">
                            Self
                        </td>
                        <td style="display: none;">
                            2356, Street-5, New York 4586, US
                        </td>
                        <td style="display: none;">
                            <p class="mb-1">Lat: 5.678167, Long: 12.078613</p>
                            <p class="text-secondary small">This can be a map also</p>
                        </td>
                        <td style="display: table-cell;">
                            <span class="badge badge-sm bg-green">Paid</span>
                        </td>
                        <td class="footable-last-visible" style="display: table-cell;">
                            <div class="dropdown d-inline-block">
                                <a class="text-secondary dd-arrow-none" data-bs-toggle="dropdown"
                                   aria-expanded="false" data-bs-display="static" role="button">
                                    <i class="bi bi-three-dots"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="javascript:void(0)">Edit</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0)">Move</a></li>
                                    <li><a class="dropdown-item text-danger"
                                           href="javascript:void(0)">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="footable-first-visible" style="display: table-cell;"><span
                                    class="footable-toggle fooicon fooicon-plus"></span></td>
                        <td style="display: table-cell;">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <figure class="avatar avatar-40 mb-0 coverimg rounded-circle"
                                            style="background-image: url(&quot;assets/img/user-3.jpg&quot;);">
                                        <img src="assets/img/user-3.jpg" alt="" style="display: none;">
                                    </figure>
                                </div>
                                <div class="col ps-0">
                                    <p class="mb-0">Limba Scollatia</p>
                                    <p class="text-secondary small">United States</p>
                                </div>
                            </div>
                        </td>
                        <td style="display: table-cell;">
                            <p class="mb-0">Space Life Techsolution</p>
                            <p class="text-secondary small">SpaxCE University</p>
                        </td>
                        <td style="display: table-cell;">
                            <p class="mb-0 text-green">216.00</p>
                            <p class="text-secondary small">DOGE</p>
                        </td>
                        <td style="display: table-cell;">
                            <p class="mb-0">19-1-2022</p>
                            <p class="text-secondary small">6:11 pm</p>
                        </td>
                        <td style="display: table-cell;">
                            Delivered
                        </td>
                        <td style="display: none;">
                            John McGra
                        </td>
                        <td style="display: none;">
                            2356, Street-5, New York 4586, US
                        </td>
                        <td style="display: none;">
                            <p class="mb-1">Lat: 5.678167, Long: 12.078613</p>
                            <p class="text-secondary small">This can be a map also</p>
                        </td>
                        <td style="display: table-cell;">
                            <span class="badge badge-sm bg-blue">Waiting</span>
                        </td>
                        <td class="footable-last-visible" style="display: table-cell;">
                            <div class="dropdown d-inline-block">
                                <a class="text-secondary dd-arrow-none" data-bs-toggle="dropdown"
                                   aria-expanded="false" data-bs-display="static" role="button">
                                    <i class="bi bi-three-dots"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="javascript:void(0)">Edit</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0)">Move</a></li>
                                    <li><a class="dropdown-item text-danger"
                                           href="javascript:void(0)">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="footable-first-visible" style="display: table-cell;"><span
                                    class="footable-toggle fooicon fooicon-plus"></span></td>
                        <td style="display: table-cell;">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <figure class="avatar avatar-40 mb-0 coverimg rounded-circle"
                                            style="background-image: url(&quot;assets/img/user-4.jpg&quot;);">
                                        <img src="assets/img/user-4.jpg" alt="" style="display: none;">
                                    </figure>
                                </div>
                                <div class="col ps-0">
                                    <p class="mb-0">Johnson Will</p>
                                    <p class="text-secondary small">Australia</p>
                                </div>
                            </div>
                        </td>
                        <td style="display: table-cell;">
                            <p class="mb-0">Jivakala Science</p>
                            <p class="text-secondary small">Yetti University</p>
                        </td>
                        <td style="display: table-cell;">
                            <p class="mb-0 text-green">0.25</p>
                            <p class="text-secondary small">ETH</p>
                        </td>
                        <td style="display: table-cell;">
                            <p class="mb-0">19-1-2022</p>
                            <p class="text-secondary small">4:05 pm</p>
                        </td>
                        <td style="display: table-cell;">
                            Received
                        </td>
                        <td style="display: none;">
                            Self
                        </td>
                        <td style="display: none;">
                            2356, Street-5, New York 4586, US
                        </td>
                        <td style="display: none;">
                            <p class="mb-1">Lat: 5.678167, Long: 12.078613</p>
                            <p class="text-secondary small">This can be a map also</p>
                        </td>
                        <td style="display: table-cell;">
                            <span class="badge badge-sm bg-green">Paid</span>
                        </td>
                        <td class="footable-last-visible" style="display: table-cell;">
                            <div class="dropdown d-inline-block">
                                <a class="text-secondary dd-arrow-none" data-bs-toggle="dropdown"
                                   aria-expanded="false" data-bs-display="static" role="button">
                                    <i class="bi bi-three-dots"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="javascript:void(0)">Edit</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0)">Move</a></li>
                                    <li><a class="dropdown-item text-danger"
                                           href="javascript:void(0)">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <div class="row align-items-center text-center">
                    <div class="col-12 mb-2">
                                    <span class="hide-if-no-paging">
                                        Showing <span id="footablestot">1 of 3</span> page
                                    </span>
                    </div>
                    <div class="col-12 footable-paging-external footable-paging-center"
                         id="footable-pagination">
                        <div class="footable-pagination-wrapper">
                            <ul class="pagination">
                                <li class="footable-page-nav disabled" data-page="first"><a
                                            class="footable-page-link" href="#">«</a></li>
                                <li class="footable-page-nav disabled" data-page="prev"><a
                                            class="footable-page-link" href="#">‹</a></li>
                                <li class="footable-page visible active" data-page="1"><a
                                            class="footable-page-link" href="#">1</a></li>
                                <li class="footable-page visible" data-page="2"><a class="footable-page-link"
                                                                                   href="#">2</a></li>
                                <li class="footable-page visible" data-page="3"><a class="footable-page-link"
                                                                                   href="#">3</a></li>
                                <li class="footable-page-nav" data-page="next"><a class="footable-page-link"
                                                                                  href="#">›</a></li>
                                <li class="footable-page-nav" data-page="last"><a class="footable-page-link"
                                                                                  href="#">»</a></li>
                            </ul>
                            <div class="divider"></div>
                            <span class="label label-default">1 of 3</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main-content">
    <div class="container">
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
