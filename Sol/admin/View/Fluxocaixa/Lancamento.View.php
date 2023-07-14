<!-- title bar -->
<div class="container-fluid">
    <div class="row align-items-center page-title">
        <h4>Financeiro - <small>Lançamentos</small></h4>
    </div>
</div>
<div class="row">
    <!-- timesheet -->
    <div class="col-12" style="padding-bottom: 80px;">
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
                <table class="table footable" data-show-toggle="true">
                    <thead>
                    <?php
                    Modal::load();
                    $cpTodos = '<div class="form-check form-switch mb-4">
                                    <input class="form-check-input" style="margin-top: 20px;" type="checkbox" 
                                    role="switch" id="selTodosLanc"  data-original-title="Marcar/Desmarcar Todos" 
                                    data-placement="top"></div>';
                    ?>
                    <tr class="text-muted">
                        <th data-sortable="false" class="w-12"></th>
                        <th data-sortable="false"><?= $cpTodos; ?></th>
                        <th>Tipo de Lançamento </th>
                        <th data-breakpoints="xs">Categoria </th>
                        <th data-breakpoints="all">Lançado </th>
                        <th data-breakpoints="xs">Vencimento </th>
                        <th data-breakpoints="xs">Pago em </th>
                        <th>Status Pagamento </th>
                        <th data-breakpoints="xs">Valor </th>
                        <th data-breakpoints="xs">Valor Pago </th>
                        <th data-breakpoints="lg md sm xs">Forma de Pagamento </th>
                        <th data-breakpoints="lg md sm xs">Conta </th>
                        <th data-breakpoints="all">Centro de Custo </th>
                        <th data-breakpoints="all">Representação </th>
                        <th data-sortable="false">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    /** @var FluxocaixaEntidade $res */
                    foreach ($result as $res):
                        echo '<tr>';
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

                        $labelStPg = '<span class="badge badge-sm bg-' .
                            StatusPagamentoFCEnum::$cores[$res["st_pagamento"]] .
                            '">&nbsp;</span> ';

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
                        echo '<td></td>';
                        echo '<td>' . $cpBaixa . '</td>';
                        echo '<td>' . TipoFluxoCaixaEnum::$label[$res["tp_fluxo"]] . '</td>';
                        echo '<td>' . $catLanc . '</td>';
                        echo '<td>' . Valida::DataShow($res["dt_cadastro"]) . '</td>';
                        echo '<td>' . $dtVenc . '</td>';
                        echo '<td>' . $dtReal . '</td>';
                        echo '<td>' . $labelStPg .
                            StatusPagamentoFCEnum::getDescricaoValor($res["st_pagamento"]) . '</td>';
                        echo '<td>' . $val . '</td>';
                        echo '<td>' . $valPg . '</td>';
                        echo '<td>' . TipoPagamentoEnum::getDescricaoValor($res["tp_pagamento"]) . '</td>';
                        echo '<td>' . $res["no_banco"] . '</td>';
                        echo '<td>' . $centro . '</td>';
                        echo '<td>' . $rep . '</td>';
                        echo '<td>
                                    <div class="dropdown d-inline-block">
                                        <a class="text-secondary dd-arrow-none" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static" role="button">
                                            <i class="bi bi-three-dots cursor"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" data-bs-target="#billpay" 
                                            data-bs-toggle="modal" href="#">
                                            <i class="bi bi-pencil-square"></i> Editar</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0)">
                                            <i class="bi bi-trash"></i> Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                                </tr>';
                    endforeach;
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer bg-none text-center">
                <div class="row align-items-center">
                    <div class="col-12 mb-2">
                            <span class="hide-if-no-paging">
                                Registros <span id="footablestot"></span> Página
                            </span>
                    </div>
                    <div class="col-12" id="footable-pagination"></div>
                </div>
            </div>

        </div>
    </div>
</div>

