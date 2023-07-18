<style>
    .tag i {
        margin-left: -3px !important;
        margin-right: 3px !important;
    }

    .tag:hover {
        cursor: pointer;
    }

    #modelo4 .tag {
        padding: 25px 20px;
    }

    #modelo4 .tag i {
        margin-left: 0 !important;
        margin-right: 0 !important;
        font-size: 2em !important;
        margin-top: -15px;
    }

    .btn-md3 .card{
        min-height: 135px;
        margin-bottom: 10px;
        box-shadow: 0.5px 0.5px 3px white;
    }
    .btn-md3 .card:hover{
        box-shadow: 0 0 0 white;
    }

</style>


<div class="col-12" style="margin-bottom: 10px">
    <div class="card border-1 h-100">
        <div class="card-header border-bottom">
            <div class="row align-items-center">
                <div class="col-auto">
                    <i class="bi bi-box-seam h4 me-1 avatar avatar-40 bg-light-theme rounded me-2"></i>
                </div>
                <div class="col ps-0">
                    <p class="small text-secondary h5">Ações</p>
                </div>
                <div class="col-auto">
                    <div class="dropdown d-inline-block">
                        <a class="text-secondary dd-arrow-none" data-bs-toggle="dropdown"
                           aria-expanded="false"
                           data-bs-display="static" role="button">
                            <i class="bi bi-three-dots-vertical"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item modelo-menu" href="#" data-id="modelo1">Modelo 1</a></li>
                            <li><a class="dropdown-item modelo-menu" href="#" data-id="modelo2">Modelo 2</a></li>
                            <li><a class="dropdown-item modelo-menu" href="#" data-id="modelo3">Modelo 3</a></li>
                            <li><a class="dropdown-item modelo-menu" href="#" data-id="modelo4">Modelo 4</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body px-0">


            <div class="row tp-menu" id="modelo1">
                <!-- summary blocks -->
                <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xxl-3">
                    <div class="card border-0 mb-4 theme-green bg-radial-gradient text-white">
                        <div class="card-body bg-none">
                            <div class="row gx-2 align-items-center">
                                <div class="col-auto">
                                    <div class="avatar avatar-40 h5 bg-light-white rounded-circle">
                                        <i class="bi bi-card-checklist"></i>
                                    </div>
                                </div>
                                <div class="col">
                                    <h5 class="fw-medium">Lançamento</h5>
                                </div>
                                <div class="col-auto">
                                    <div class="dropdown d-inline-block">
                                        <a class="text-secondary dd-arrow-none" data-bs-toggle="dropdown"
                                           aria-expanded="false"
                                           data-bs-display="static" role="button">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#lancEntrada" href="#">
                                                    <i class="bi bi-box-arrow-right"></i> Entrada</a></li>
                                            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#lancSaida" href="#">
                                                    <i class="bi bi-box-arrow-left"></i> Saída</a></li>
                                            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#billpay" href="#">
                                                    <i class="bi bi-arrow-left-right"></i> Transferência entre
                                                    Contas</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xxl-3">
                    <div class="card border-0 mb-4 theme-blue bg-radial-gradient text-white">
                        <div class="card-body bg-none">
                            <div class="row gx-2 align-items-center">
                                <div class="col-auto">
                                    <div class="avatar avatar-40 h5 bg-light-white text-white rounded-circle">
                                        <i class="bi bi-cloud-download-fill"></i>
                                    </div>
                                </div>
                                <div class="col">
                                    <h5>Cadastro</h5>
                                </div>
                                <div class="col-auto">
                                    <div class="dropdown d-inline-block">
                                        <a class="text-secondary dd-arrow-none" data-bs-toggle="dropdown"
                                           aria-expanded="false"
                                           data-bs-display="static" role="button">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#billpay" href="#">
                                                    <i class="bi bi-bank"></i> Contas Bancária</a></li>
                                            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#billpay" href="#">
                                                    <i class="bi bi-person-check"></i> Clientes</a></li>
                                            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#billpay" href="#">
                                                    <i class="bi bi-person-plus"></i> Fornecedores</a></li>
                                            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#billpay" href="#">
                                                    <i class="bi bi-wallet2"></i> Centro de Custos</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xxl-3">
                    <div class="card border-0 mb-4 theme-red bg-radial-gradient text-white">
                        <div class="card-body bg-none">
                            <div class="row gx-2 align-items-center">
                                <div class="col-auto">
                                    <div class="avatar avatar-40 h5 bg-light-white rounded-circle">
                                        <i class="bi bi-gear-fill"></i>
                                    </div>
                                </div>
                                <div class="col">
                                    <h5 class="fw-medium">Avançados</h5>
                                </div>
                                <div class="col-auto">
                                    <div class="dropdown d-inline-block">
                                        <a class="text-secondary dd-arrow-none" data-bs-toggle="dropdown"
                                           aria-expanded="false"
                                           data-bs-display="static" role="button">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#billpay" href="#">
                                                    <i class="bi bi-search"></i> Pesqusiar Lançamentos</a></li>
                                            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#billpay" href="#">
                                                    <i class="bi bi-check2-square"></i> Confirmar Pagamentos</a></li>
                                            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#billpay" href="#">
                                                    <i class="bi bi-play-circle-fill"></i> Tutoriais</a></li>
                                            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#billpay" href="#">
                                                    <i class="bi bi-info-square"></i> Informativos</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xxl-3">
                    <div class="card border-0 mb-4 theme-yellow bg-radial-gradient text-white">
                        <div class="card-body bg-none">
                            <div class="row gx-2 align-items-center">
                                <div class="col-auto">
                                    <div class="avatar avatar-40 h5 bg-light-white rounded-circle">
                                        <i class="bi bi-sliders"></i>
                                    </div>
                                </div>
                                <div class="col">
                                    <h5>Configurações</h5>
                                </div>
                                <div class="col-auto">
                                    <div class="dropdown d-inline-block">
                                        <a class="text-secondary dd-arrow-none" data-bs-toggle="dropdown"
                                           aria-expanded="false"
                                           data-bs-display="static" role="button">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#billpay" href="#">
                                                    <i class="bi bi-bookmark-plus"></i> Cadastro de Categoria</a></li>
                                            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#billpay" href="#">
                                                    <i class="bi bi-bookmarks"></i> Estrutura de Categoria</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row tp-menu" id="modelo2">
                <p class="mb-4 text-center">
                <span class="tag bg-light-theme theme-green text-theme me-1 mb-1" data-bs-toggle="modal" data-bs-target="#lancEntrada">
                    <i class="bi bi-box-arrow-right"></i> Entrada
                </span>
                    <span class="tag bg-light-theme theme-red text-theme me-1 mb-1" data-bs-toggle="modal" data-bs-target="#lancSaida">
                    <i class="bi bi-box-arrow-left"></i> Saída
                </span>
                    <span class="tag bg-light-theme theme-orange text-theme me-1 mb-1" data-bs-toggle="modal" data-bs-target="#billpay">
                    <i class="bi bi-arrow-left-right"></i> Transferência entre Contas
                </span>
                    <span class="tag bg-light-theme theme-blue text-theme me-1 mb-1" data-bs-toggle="modal" data-bs-target="#billpay">
                    <i class="bi bi-bookmark-plus"></i> Cadastro de Categoria
                </span>
                    <span class="tag bg-light-theme theme-purple text-theme me-1 mb-1" data-bs-toggle="modal" data-bs-target="#billpay">
                    <i class="bi bi-bookmarks"></i> Estrutura de Categoria
                </span>
                </p>
                <p class="mb-4 text-center">
                <span class="tag bg-light-theme theme-yellow text-theme me-1 mb-1" data-bs-toggle="modal" data-bs-target="#billpay">
                    <i class="bi bi-bank"></i> Contas Bancária
                </span>
                    <span class="tag bg-light-theme theme-pink text-theme me-1 mb-1" data-bs-toggle="modal" data-bs-target="#billpay">
                    <i class="bi bi-person-check"></i> Clientes
                </span>
                    <span class="tag bg-light-theme theme-teal text-theme me-1 mb-1" data-bs-toggle="modal" data-bs-target="#billpay">
                    <i class="bi bi-person-plus"></i> Fornecedores
                </span>
                    <span class="tag bg-light-theme theme-indigo text-theme me-1 mb-1" data-bs-toggle="modal" data-bs-target="#billpay">
                    <i class="bi bi-wallet2"></i> Centro de Custos
                </span>
                </p>
                <p class="mb-4 text-center">
                <span class="tag bg-light-theme theme-cyan text-theme me-1 mb-1" data-bs-toggle="modal" data-bs-target="#billpay">
                    <i class="bi bi-search"></i> Pesqusiar Lançamentos
                </span>
                    <span class="tag bg-light-theme theme-blue text-theme me-1 mb-1" data-bs-toggle="modal" data-bs-target="#billpay">
                    <i class="bi bi-check2-square"></i> Confirmar Pagamentos
                </span>
                    <span class="tag bg-light-theme theme-red text-theme me-1 mb-1" data-bs-toggle="modal" data-bs-target="#billpay">
                    <i class="bi bi-play-circle-fill"></i> Tutoriais
                </span>
                    <span class="tag bg-light-theme theme-green text-theme me-1 mb-1" data-bs-toggle="modal" data-bs-target="#billpay">
                    <i class="bi bi-info-square"></i> Informativos
                </span>
                </p>
            </div>

            <div class="row tp-menu" id="modelo3">
                <div class="col-md-2 cursor btn-md3">
                    <div class="card bg-radial-gradient text-white border-0 text-center theme-green">
                        <div class="card-body py-3 bg-none">
                            <i class="bi bi-box-arrow-right avatar avatar-50 bg-light-white rounded-circle h3 mb-3 d-inline-block"></i>
                            <p class="small">Entrada</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 cursor btn-md3">
                    <div class="card bg-radial-gradient text-white border-0 text-center theme-red">
                        <div class="card-body py-3 bg-none">
                            <i class="bi bi-box-arrow-left avatar avatar-50 bg-light-white rounded-circle h3 mb-3 d-inline-block"></i>
                            <p class="small">Saída</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 cursor btn-md3">
                    <div class="card bg-radial-gradient text-white border-0 text-center theme-orange">
                        <div class="card-body py-3 bg-none">
                            <i class="bi bi-arrow-left-right avatar avatar-50 bg-light-white rounded-circle h3 mb-3 d-inline-block"></i>
                            <p class="small">Transferencia entre Contas</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 cursor btn-md3">
                    <div class="card bg-radial-gradient text-white border-0 text-center theme-blue">
                        <div class="card-body py-3 bg-none">
                            <i class="bi bi-bookmark-plus avatar avatar-50 bg-light-white rounded-circle h3 mb-3 d-inline-block"></i>
                            <p class="small">Cadastro de Categoria</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 cursor btn-md3">
                    <div class="card bg-radial-gradient text-white border-0 text-center theme-purple">
                        <div class="card-body py-3 bg-none">
                            <i class="bi bi-bookmarks avatar avatar-50 bg-light-white rounded-circle h3 mb-3 d-inline-block"></i>
                            <p class="small">Estrutura de Categoria</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 cursor btn-md3">
                    <div class="card bg-radial-gradient text-white border-0 text-center theme-yellow">
                        <div class="card-body py-3 bg-none">
                            <i class=" bi bi-bank avatar avatar-50 bg-light-white rounded-circle h3 mb-3 d-inline-block"></i>
                            <p class="small">Contas Bancária</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 cursor btn-md3">
                    <div class="card bg-radial-gradient text-white border-0 text-center theme-pink">
                        <div class="card-body py-3 bg-none">
                            <i class="bi bi-person-check avatar avatar-50 bg-light-white rounded-circle h3 mb-3 d-inline-block"></i>
                            <p class="small">Clientes</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 cursor btn-md3">
                    <div class="card bg-radial-gradient text-white border-0 text-center theme-teal">
                        <div class="card-body py-3 bg-none">
                            <i class="bi bi-person-plus avatar avatar-50 bg-light-white rounded-circle h3 mb-3 d-inline-block"></i>
                            <p class="small">Fornecedores</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 cursor btn-md3">
                    <div class="card bg-radial-gradient text-white border-0 text-center theme-indigo">
                        <div class="card-body py-3 bg-none">
                            <i class="bi bi-wallet2 avatar avatar-50 bg-light-white rounded-circle h3 mb-3 d-inline-block"></i>
                            <p class="small">Centro de Custos</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 cursor btn-md3">
                    <div class="card bg-radial-gradient text-white border-0 text-center theme-cyan">
                        <div class="card-body py-3 bg-none">
                            <i class="bi bi-search avatar avatar-50 bg-light-white rounded-circle h3 mb-3 d-inline-block"></i>
                            <p class="small">Pesqusiar Lançamentos</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 cursor btn-md3">
                    <div class="card bg-radial-gradient text-white border-0 text-center theme-blue">
                        <div class="card-body py-3 bg-none">
                            <i class="bi bi-check2-square avatar avatar-50 bg-light-white rounded-circle h3 mb-3 d-inline-block"></i>
                            <p class="small">Confirmar Pagamentos</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 cursor btn-md3">
                    <div class="card bg-radial-gradient text-white border-0 text-center theme-red">
                        <div class="card-body py-3 bg-none">
                            <i class="bi bi-play-circle-fill avatar avatar-50 bg-light-white rounded-circle h3 mb-3 d-inline-block"></i>
                            <p class="small">Tutoriais</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row tp-menu" id="modelo4">
                <p class="mb-4 text-center">
                <span class="tag bg-light-theme theme-green text-theme me-1 mb-1"
                      data-bs-toggle="tooltip" data-bs-placement="bottom" title="Entrada">
                    <i class="bi bi-box-arrow-right"></i></span>
                    <span class="tag bg-light-theme theme-red text-theme me-1 mb-1"
                          data-bs-toggle="tooltip" data-bs-placement="bottom" title="Saída">
                    <i class="bi bi-box-arrow-left"></i></span>
                    <span class="tag bg-light-theme theme-orange text-theme me-1 mb-1"
                          data-bs-toggle="tooltip" data-bs-placement="bottom" title="Transferência entre Contas">
                    <i class="bi bi-arrow-left-right"></i></span>
                    <span class="tag bg-light-theme theme-blue text-theme me-1 mb-1"
                          data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cadastro de Categoria">
                    <i class="bi bi-bookmark-plus"></i></span>
                    <span class="tag bg-light-theme theme-purple text-theme me-1 mb-1"
                          data-bs-toggle="tooltip" data-bs-placement="bottom" title="Estrutura de Categoria">
                    <i class="bi bi-bookmarks"></i></span>
                    <span class="tag bg-light-theme theme-yellow text-theme me-1 mb-1"
                          data-bs-toggle="tooltip" data-bs-placement="bottom" title="Contas Bancária">
                    <i class="bi bi-bank"></i></span>
                    <span class="tag bg-light-theme theme-pink text-theme me-1 mb-1"
                          data-bs-toggle="tooltip" data-bs-placement="bottom" title="Clientes">
                    <i class="bi bi-person-check"></i></span>
                    <span class="tag bg-light-theme theme-teal text-theme me-1 mb-1"
                          data-bs-toggle="tooltip" data-bs-placement="bottom" title="Fornecedores">
                    <i class="bi bi-person-plus"></i></span>
                    <span class="tag bg-light-theme theme-indigo text-theme me-1 mb-1"
                          data-bs-toggle="tooltip" data-bs-placement="bottom" title="Centro de Custos">
                    <i class="bi bi-wallet2"></i></span>
                    <span class="tag bg-light-theme theme-cyan text-theme me-1 mb-1"
                          data-bs-toggle="tooltip" data-bs-placement="bottom" title="Pesqusiar Lançamentos">
                    <i class="bi bi-search"></i></span>
                    <span class="tag bg-light-theme theme-blue text-theme me-1 mb-1"
                          data-bs-toggle="tooltip" data-bs-placement="bottom" title="Confirmar Pagamentos">
                    <i class="bi bi-check2-square"></i></span>
                    <span class="tag bg-light-theme theme-red text-theme me-1 mb-1"
                          data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tutoriais">
                    <i class="bi bi-play-circle-fill"></i></span>
                    <span class="tag bg-light-theme theme-green text-theme me-1 mb-1"
                          data-bs-toggle="tooltip" data-bs-placement="bottom" title="Informativos">
                    <i class="bi bi-info-square"></i></span>
                </p>
            </div>

        </div>
    </div>
</div>