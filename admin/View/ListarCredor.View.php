<div class="main-content">
        <div class="container">
                    <div class="row">
                                  <div class="col-sm-12">
							<!-- start: PAGE TITLE & BREADCRUMB -->
							<ol class="breadcrumb">
								<li>
									<i class="clip-grid-6"></i>
									<a href="#">
										Cadastro
									</a>
								</li>
								<li class="active">
									Credor
								</li>
							</ol>
							<div class="page-header">
								<h1>Credor <small>Cadastrados</small></h1>
							</div>
							<!-- end: PAGE TITLE & BREADCRUMB -->
						</div>
					</div>
        
        
                            <div class="row">
					<div class="col-md-12">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
									<i class="fa fa-external-link-square"></i>
									Credor Cadastrados
									<div class="panel-tools">
										<a class="btn btn-xs btn-link panel-collapse collapses" href="#">
										</a>
										<a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal">
											<i class="fa fa-wrench"></i>
										</a>
										<a class="btn btn-xs btn-link panel-refresh" href="#">
											<i class="fa fa-refresh"></i>
										</a>
										<a class="btn btn-xs btn-link panel-expand" href="#">
											<i class="fa fa-resize-full"></i>
										</a>
										<a class="btn btn-xs btn-link panel-close" href="#">
											<i class="fa fa-times"></i>
										</a>
									</div>
								</div>
								<div class="panel-body">                                                                  
									<?php
                                                                            Modal::load(); 
                                                                            Modal::deletaRegistro("Credor");
                                                                            Modal::confirmacao("confirma_Credor");
                                                                        ?>
                                                                        <!--/// INICIO DOS BOTOES DE EXPORTA«√O-->
                                                                        <div class="row">
										<div class="col-md-12 space10">
                                                                                    <a role="button" class="btn btn-success tooltips pull-right" id="excel" 
                                                                                       href="index.php?url=admin/exportar/exportar/formato/excel" data-original-title="Exportar para Excel" data-placement="left">
                                                                                         Excel <i class="clip-file-excel"></i>
                                                                                    </a>
                                                                                    <a role="button" class="btn btn-bricky tooltips pull-right" id="pdf" style="margin-right: 10px;" 
                                                                                       href="index.php?url=admin/exportar/exportar/formato/pdf" data-original-title="Exportar para PDF" data-placement="left">
                                                                                         PDF <i class="clip-file-pdf"></i>
                                                                                    </a>
										</div>  
									</div>
                                                                        <!--/// FIM DOS BOTOES DE EXPORTA«√O-->
									<table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                                                                                <thead>
                                                                                    <tr style="background-color: #006699; color: #ffffff">
                                                                                        <th>Nome / Raz√£o Social</th>
                                                                                        <th>Contatos</th>
                                                                                        <th>Site</th>
                                                                                        <th>A√ß√£o</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                 <?php
                                                                                    foreach ($result as $res):                                                                                        
                                                                                 ?>
                                                                                    <tr id="registro-<?php echo $res['id_entidade']; ?>" style="background-color: #cfcfcf;">
                                                                                        <td><?php echo $res['nome_razao']; ?></td>                                                                                       
                                                                                        <td><?php echo $res['tel1']." / ".$res['tel2']; ?></td>                                                                                      
                                                                                        <td><?php echo $res['site']; ?></td>                                                                                      
                                                                                        <td><a href="index.php?url=admin/credor/cadastroCredor/ent/<?php echo $res['id_entidade']; ?>" class="btn btn-primary tooltips" 
                                                                                               data-original-title="Editar Registro" data-placement="top">
                                                                                                <i class="fa fa-clipboard"></i>
                                                                                            </a>
                                                                                            <a data-toggle="modal" role="button" class="btn btn-bricky tooltips deleta" id="<?php echo $res['id_entidade']; ?>" 
                                                                                               href="#Credor" data-original-title="Excluir Registro" data-placement="top">
                                                                                                <i class="fa fa-trash-o"></i>
                                                                                            </a>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <?php
                                                                                    endforeach;
                                                                                    ?>
                                                                                </tbody>
                                                                            </table>
                                                                 </div>
							</div>
							<!-- end: DYNAMIC TABLE PANEL -->
						</div>
					</div>
                                        <!-- end: PAGE CONTENT-->
				</div>
			</div>
			<!-- end: PAGE -->