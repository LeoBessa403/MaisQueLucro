<div class="main-content">
    <!-- end: SPANEL CONFIGURATION MODAL FORM -->
    <div class="container">
        <!-- start: PAGE HEADER -->
        <div class="row">
            <div class="col-sm-12">
                <!-- start: PAGE TITLE & BREADCRUMB -->
                <ol class="breadcrumb">
                    <li>
                        <i class="clip-home-3"></i>
                        <a href="#">
                            Início
                        </a>
                    </li>
                </ol>
                <div class="page-header">
                    <h1>Resumo do Sistema</h1>
                </div>
                <!-- end: PAGE TITLE & BREADCRUMB -->
            </div>
        </div>
        <!-- end: PAGE HEADER -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-calendar"></i>
                        Estatísticas do Sistema
                    </div>
                    <div class="panel-body">
                        <div class="col-sm-4">
                            <button class="btn btn-icon btn-block">
                                <i class="fa fa-envelope"></i>
                                Suporte(s) Não Lido(s)
                                <span class="negrito dados dados-success">
                                  <?= $dados['MsgNaoLidas']; ?>
                                </span>
                            </button>
                        </div>
                        <div class="col-sm-4">
                            <button class="btn btn-icon btn-block">
                                <i class="fa-calendar fa"></i>
                                Agendamentos de Hoje
                                <span class="negrito dados dados-danger">
                                     <?= $dados['agHoje']; ?>
                                </span>
                            </button>
                        </div>
                        <div class="col-sm-4">
                            <button class="btn btn-icon btn-block">
                                <i class="fa fa-calendar-o"></i>
                                Agend. do Mês
                                <span class="dados negrito dados-black">
                                     <?= $dados['agMes']; ?>
                                </span>
                            </button>
                        </div>
                        <div class="col-sm-4">
                            <button class="btn btn-icon btn-block">
                                <i class="clip-user-3"></i>
                                Profissionais Cadastrados
                                <span class="dados negrito dados-info">
                                     <?= $dados['nuProf']; ?>
                                </span>
                            </button>
                        </div>
                        <div class="col-sm-4">
                            <button class="btn btn-icon btn-block">
                                <i class="fa-dollar fa"></i>
                                Serviços Cadastrados
                                <span class="dados negrito dados-success">
                                     <?= $dados['nuServ']; ?>
                                </span>
                            </button>
                        </div>
                        <div class="col-sm-4">
                            <button class="btn btn-icon btn-block">
                                <i class="fa-eur fa"></i>
                                Clientes Cadastrados
                                <span class="dados negrito dados-warning">
                                    <?= $dados['nuCli']; ?>
                                </span>
                            </button>
                        </div>
                        <?php
                        if ($dados['temAgendamentos']) {
                            ?>
                            <div class="col-md-12">
                                <div class="alert alert-warning fade in">
                                    <div id="div_cliente"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="alert alert-success fade in">
                                    <div id="div_profissional"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="alert alert-info fade in">
                                    <div id="div_servico"></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="alert alert-danger fade in">
                                    <div id="div_status1"></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="alert alert-danger fade in">
                                    <div id="div_status2"></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="alert alert-danger fade in">
                                    <div id="div_status3"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="alert alert-danger fade in">
                                    <div id="div_status4"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="alert alert-danger fade in">
                                    <div id="div_status5"></div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- end: FULL CALENDAR PANEL -->
            </div>
            <!-- end: PAGE CONTENT-->

        </div>
    </div>
</div>