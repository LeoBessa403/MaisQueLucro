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
                    <h1>Visitas da Página</h1>
                </div>
                <!-- end: PAGE TITLE & BREADCRUMB -->
            </div>
        </div>
        <!-- end: PAGE HEADER -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-external-link-square"></i>
                        Visitas da Página
                    </div>
                    <div class="panel-body">
                        <?php
                        $grid = new Grid();
                        ?>
                        <h2>
                            <small>Visitas da Página</small>
                        </h2>
                        <?php
                        Modal::load();

                        $arrColunas = array('Data', 'IP', 'Navegador', 'S.O.', 'Dispositivo', 'Estado', 'Cidade');
                        $grid = new Grid();
                        $grid->setColunasIndeces($arrColunas);
                        $grid->criaGrid();
                        $result = array_reverse($result);
                        /** @var PaginaVisitaEntidade $res */
                        foreach ($result as $res):
                            if ($res->getCoVisita()->getCoTrafego()) {
                                $grid->setColunas(Valida::DataShow($res->getCoVisita()->getDtRealizado(), 'd/m/Y H:i'));
                                $grid->setColunas($res->getCoVisita()->getCoTrafego()->getNuIp());
                                $grid->setColunas($res->getCoVisita()->getCoTrafego()->getDsUf());
                                $grid->setColunas($res->getCoVisita()->getCoTrafego()->getDsCidade());
                                $grid->setColunas($res->getCoVisita()->getCoTrafego()->getDsDispositivo());
                                $grid->setColunas($res->getCoVisita()->getCoTrafego()->getDsSistemaOperacional());
                                $grid->setColunas($res->getCoVisita()->getCoTrafego()->getDsNavegador());
                                $grid->criaLinha($res->getCoVisita()->getCoVisita());
                            }
                        endforeach;
                        $grid->finalizaGrid()
                        ?>
                    </div>
                </div>
                <div class="pull-right">
                    <!-- end: DYNAMIC TABLE PANEL -->
                    <?php Valida::geraBtnVoltar('Visita/ListarVisita'); ?>
                </div>
                <br><br><br>
                <!-- end: DYNAMIC TABLE PANEL -->
            </div>
        </div>
    </div>
</div>
