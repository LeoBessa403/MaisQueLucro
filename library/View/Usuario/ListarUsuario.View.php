<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- start: PAGE TITLE & BREADCRUMB -->
                <ol class="breadcrumb">
                    <li>
                        <i class="clip-grid-6"></i>
                        <a href="#">
                            Usuários
                        </a>
                    </li>
                    <li class="active">
                        Listar
                    </li>
                </ol>
                <div class="page-header">
                    <h1>Usuários
                        <small>Listar usuários</small>
                        <?php Valida::geraBtnNovo(); ?>
                    </h1>
                </div>
                <!-- end: PAGE TITLE & BREADCRUMB -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-external-link-square"></i>
                        Usuários
                    </div>
                    <div class="panel-body">
                        <?php
                        $perfil_master = false;
                        if (!AssinanteService::getCoAssinanteLogado()) {
                            $perfil_master = true;
                        }

                        $grid = new Grid();
                        echo $grid->PesquisaAvancada('Pesquisar Usuários');
                        ?>
                        <h2>
                            <small>Usuários Cadastrados</small>
                        </h2>
                        <?php
                        Modal::load();
                        Modal::deletaRegistro(UrlAmigavel::$controller);
                        Modal::confirmacao("confirma_Usuario");
                        if ($perfil_master) {
                            $arrColunas = array('Assinante', 'Usuário', 'CPF', 'Perfil', 'Situação', 'Ações');
                        } else {
                            $arrColunas = array('Usuário', 'CPF', 'Perfil', 'Situação', 'Ações');
                        }

                        $grid->setColunasIndeces($arrColunas);
                        $grid->criaGrid();


                        /** @var UsuarioEntidade $res */
                        foreach ($result as $res):
                            if (Valida::ValPerfil('CadastroUsuario')) {
                                $acao = '<a href="' . PASTAADMIN . 'Usuario/CadastroUsuario/'
                                    . Valida::GeraParametro(CO_USUARIO . "/" . $res->getCoUsuario()) . '" 
                                class="btn btn-primary tooltips" 
                                data-original-title="Visualizar Registro" data-placement="top">
                                <i class="fa fa-clipboard"></i>
                                </a>';
//                                '<a data-toggle="modal" role="button" class="btn btn-bricky tooltips deleta"
//                                id="' . $res->getCoUsuario() . '"
//                                   href="#' . UrlAmigavel::$controller . '" data-original-title="Excluir Registro"
//                                   data-placement="top">
//                                    <i class="fa fa-trash-o"></i>
//                                </a>';
                            } else {
                                $acao = '';
                            }
                            if ($perfil_master) {
                                if ($res->getCoAssinante()) {
                                    /** @var AssinanteService $assinanteService */
                                    $assinanteService = new AssinanteService();
                                    /** @var AssinanteEntidade $assinante */
                                    $assinante = $assinanteService->PesquisaUmRegistro($res->getCoAssinante());
                                    if($assinante){
                                        $grid->setColunas(strtoupper($assinante->getCoEmpresa()->getNoFantasia()));
                                    }else{
                                        $grid->setColunas('');
                                    }
                                } else {
                                    $grid->setColunas("Sem Assinante");
                                }
                            }
                            $grid->setColunas(strtoupper($res->getCoPessoa()->getNoPessoa()));
                            $grid->setColunas(Valida::MascaraCpf($res->getCoPessoa()->getNuCpf()));
                            $grid->setColunas($perfis[$res->getCoUsuario()]);
                            $grid->setColunas(Valida::SituacaoAtivoInativo($res->getStStatus()));
                            $grid->setColunas($acao, 2);
                            $grid->criaLinha($res->getCoUsuario());
                        endforeach;
                        $grid->finalizaGrid();
                        ?>
                    </div>
                </div>
                <!-- end: DYNAMIC TABLE PANEL -->
            </div>
        </div>
        <!-- end: PAGE CONTENT-->
    </div>
</div>
<!-- end: PAGE -->