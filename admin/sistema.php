<?php
               require_once 'library/Config.inc.php'; 
               
               $url = (isset($_GET['url']) && $_GET['url'] != "" ? $_GET['url'] : "");
               $explode = explode( '/' ,$url );
                                 
               if(!Session::CheckSession(SESSION_USER)):
                    if(!isset($_POST['logar_no_sigeplan'])):
                        if(empty($explode[1])): 
                            Redireciona(ADMIN.LOGIN);
                            die;
                        else:
                            Redireciona(ADMIN.LOGIN."?o=erro2");
                            die;
                        endif;
                    else:
                        Login::logar();
                    endif;
               else: 
                    if(isset($explode[3]) && $explode[3] == "desloga"):
                        Session::FinalizaSession(SESSION_USER);
                        Redireciona(ADMIN.LOGIN."?o=sucesso2");      
                        die();
                    else:                
                        $ultimo_acesso = intval(Session::getSession(SESSION_USER, "ultimo_acesso") + (60 * INATIVO)  );
                        $agora         = strtotime(Valida::DataDB(Valida::DataAtual()));                        
                        if($agora > $ultimo_acesso):
                            Session::FinalizaSession(SESSION_USER);
                            Redireciona(ADMIN.LOGIN."?o=deslogado");      
                            die();
                        else:
                            $_SESSION[SESSION_USER]['ultimo_acesso'] = strtotime(Valida::DataDB(Valida::DataAtual()));                            
                        endif;
                    endif;                 
               endif;
               
            $url = new UrlAmigavel();
            $compara = strstr(UrlAmigavel::$action,'exporta');
            if($compara != null):
                $url->pegaControllerAction();
                exit;
            endif;
?>
<!DOCTYPE html>
<!-- Template Name: Clip-One - Responsive Admin Template build with Twitter Bootstrap 3.x Version: 1.3 Author: ClipTheme -->
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<head>
		<title>SISTEMA | <?php echo DESC;?></title>
		<!-- start: META -->
		<meta charset="utf-8" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<!-- end: META -->
		<!-- start: MAIN CSS -->
		<link rel="stylesheet" href="<?php echo PASTAADMIN;?>plugins/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo PASTAADMIN;?>plugins/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo PASTAADMIN;?>fonts/style.css">
		<link rel="stylesheet" href="<?php echo PASTAADMIN;?>css/main.css">
		<link rel="stylesheet" href="<?php echo PASTAADMIN;?>css/main-responsive.css">
		<link rel="stylesheet" href="<?php echo PASTAADMIN;?>plugins/iCheck/skins/all.css">
		<link rel="stylesheet" href="<?php echo PASTAADMIN;?>plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css">
		<link rel="stylesheet" href="<?php echo PASTAADMIN;?>plugins/perfect-scrollbar/src/perfect-scrollbar.css">
		<link rel="stylesheet" href="<?php echo PASTAADMIN;?>css/theme_dark.css" type="text/css" id="skin_color">
		<link rel="stylesheet" href="<?php echo PASTAADMIN;?>css/print.css" type="text/css" media="print"/>
                <!--[if IE 7]>
                    <link rel="stylesheet" href="<?php echo PASTAADMIN;?>plugins/font-awesome/css/font-awesome-ie7.min.css">
		<![endif]-->
                <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
               
		<!-- end: MAIN CSS -->
		<!-- start: CSS REQUIRED FOR FULLCALENDARIO -->
		<link rel="stylesheet" href="<?php echo PASTAADMIN;?>plugins/fullcalendar/fullcalendar/fullcalendar.css">
                <!-- start: CSS REQUIRED FOR DATAPICKER -->
		<link rel="stylesheet" href="<?php echo INCLUDES;?>Jcalendar.css">
                <!-- start: CSS REQUIRED FOR SELECT -->
                <link rel="stylesheet" href="<?php echo PASTAADMIN;?>plugins/select2/select2.css"> 
                <!-- start: CSS REQUIRED FOR UPLOAD -->
		<link rel="stylesheet" href="<?php echo PASTAADMIN;?>plugins/bootstrap-fileupload/bootstrap-fileupload.min.css">
                <!-- start: CSS REQUIRED FOR CHECK -->
                <link rel="stylesheet" href="<?php echo PASTAADMIN;?>plugins/bootstrap-switch/static/stylesheets/bootstrap-switch.css">
                <!-- start: CSS REQUIRED FOR CHECK -->
                <link rel="stylesheet" href="<?php echo PASTAADMIN;?>plugins/DataTables/media/css/DT_bootstrap.css">
		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
		<link rel="shortcut icon" href="favicon.ico" />
                
	</head>
	<!-- end: HEAD -->
	<!-- start: BODY -->
        <body class="header-default">
		<!-- start: HEADER -->
		<div class="navbar navbar-inverse navbar-fixed-top">
			<!-- start: TOP NAVIGATION CONTAINER -->
			<div class="container">
				<div class="navbar-header">
					<!-- start: RESPONSIVE MENU TOGGLER -->
					<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
						<span class="clip-list-2"></span>
					</button>
					<!-- end: RESPONSIVE MENU TOGGLER -->
					<!-- start: LOGO -->
                                        <a class="navbar-brand" href="<?php echo PASTAADMIN;?>">
						<?php echo DESC;?>
					</a>
					<!-- end: LOGO -->
				</div>
				<div class="navbar-tools">
					<!-- start: TOP NAVIGATION MENU -->
					<ul class="nav navbar-right">
						<!-- start: TO-DO DROPDOWN -->
                                                <?php
                                                                                    
//                                                     $pagamentos  = PagamentoModel::pesquisaPagamentosEmAberto();
//                                                     $pagamentos2 = PagamentoModel::pesquisaPagamentosProximos();                                                     
//                                                     $Total = count($pagamentos) + count($pagamentos2);
                                                ?>
						<li class="dropdown">
							<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
								<i class="fa-credit-card fa"></i>
                                                                <span class="badge"> 10<?php //echo $Total; ?></span>
							</a>
							<ul class="dropdown-menu todo">
								<li>
									<span class="dropdown-menu-title"> Recebimentos e Pagamentos</span>
								</li>
								<li>
									<div class="drop-down-wrapper">
										<ul>
                                                                                  
<!--                                                                                 // AQUI VAI A PARTE PRA GERAR OS LEMBRETES DOS RECEBIMENTOS E PAGAMENTOS-->
                                                                                    
                                                                                    
										</ul>
									</div>
								</li>
								<li class="view-all active">
									<a href="javascript:void(0)">
                                                                            <span class="dropdown-menu-title">Receber <b><?php //echo Valida::formataMoeda($receber,"R$"); ?></b> / Pagar <b><?php //echo Valida::formataMoeda($pagar,"R$"); ?></b></span>
									</a>
								</li>
							</ul>
						</li>
						<!-- end: TO-DO DROPDOWN-->
						
						<!-- start: USER DROPDOWN -->
						<li class="dropdown current-user">
							<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
								<img src="<?php echo PASTAADMIN; ?>images/avatar-1-small.jpg" class="circle-img" alt="">
                                                                <span class="username"><?php echo $_SESSION[SESSION_USER]['nome'];?></span>
								<i class="clip-chevron-down"></i>
							</a>
							<ul class="dropdown-menu">
								<li>
									<a href="pages_user_profile.html">
										<i class="clip-user-2"></i>
										&nbsp;My Profile
									</a>
								</li>
								<li>
									<a href="pages_calendar.html">
										<i class="clip-calendar"></i>
										&nbsp;My Calendar
									</a>
								<li>
									<a href="pages_messages.html">
										<i class="clip-bubble-4"></i>
										&nbsp;My Messages (3)
									</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="utility_lock_screen.html"><i class="clip-locked"></i>
										&nbsp;Lock Screen </a>
								</li>
								<li>
									<a href="index.php?url=admin/login/deslogar/desloga/10">
										<i class="clip-exit"></i>
										&nbsp;Sair do Sistema
									</a>
								</li>
							</ul>
						</li>
						<!-- end: USER DROPDOWN -->
					</ul>
					<!-- end: TOP NAVIGATION MENU -->
				</div>
			</div>
			<!-- end: TOP NAVIGATION CONTAINER -->
		</div>
		<!-- end: HEADER -->
		<!-- start: MAIN CONTAINER -->
		<div class="main-container">
			<div class="navbar-content">
				<!-- start: SIDEBAR -->
				<div class="main-navigation navbar-collapse collapse">
					<!-- start: MAIN MENU TOGGLER BUTTON -->
					<div class="navigation-toggler">
						<i class="clip-chevron-left"></i>
						<i class="clip-chevron-right"></i>
					</div>
					<!-- end: MAIN MENU TOGGLER BUTTON -->
					<!-- start: MAIN NAVIGATION MENU -->
                                        <?php
                                             $index = "";                                
                                             $credor = "";
                                             $renda = "";
                                             $pagamento = "";
                                             $ativo = UrlAmigavel::$controller;
                                             $menu = ' class="active"';
                                             switch ($ativo):                                                 
                                                 case "credor": $credor = $menu; break;
                                                 case "renda": $renda = $menu; break;
                                                 case "pagamento": $pagamento = $menu; break;
                                                 default: $index = $menu; break;
                                             endswitch;
                                             
                                        ?>
					<ul class="main-navigation-menu">
						<li<?php echo $index; ?>>
							<a href="<?php echo PASTAADMIN;?>"><i class="clip-home-3"></i>
                                                            <span class="title"> P&Agrave;GINA INICIAL  </span><span class="selected"></span>
							</a>
						</li>
                                                <li<?php echo $credor; ?>>
							<a href="javascript:void(0)"><i class="fa fa-truck"></i>
								<span class="title"> Credor </span><i class="icon-arrow"></i>
								<span class="selected"></span>
							</a>
							<ul class="sub-menu" style="display: none;">
								<li>
									<a href="index.php?url=<?php echo ADMIN;?>/credor/cadastroCredor">
										<span class="title"> Cadastrar </span>
									</a>
								</li>
								<li>
									<a href="index.php?url=<?php echo ADMIN;?>/credor/listarCredor">
										<span class="title"> Listar </span>
									</a>
								</li>
							</ul>
						</li>						
                                                <li<?php echo $renda; ?>>
							<a href="javascript:void(0)"><i class="fa fa-truck"></i>
								<span class="title"> Gera Renda </span><i class="icon-arrow"></i>
								<span class="selected"></span>
							</a>
							<ul class="sub-menu" style="display: none;">
								<li>
									<a href="index.php?url=<?php echo ADMIN;?>/renda/cadastroRenda">
										<span class="title"> Cadastrar </span>
									</a>
								</li>
								<li>
									<a href="index.php?url=<?php echo ADMIN;?>/renda/listarRenda">
										<span class="title"> Listar </span>
									</a>
								</li>
							</ul>
						</li>						
                                                <li<?php echo $pagamento; ?>>
							<a href="javascript:void(0)"><i class="fa fa-truck"></i>
								<span class="title"> Pagamento </span><i class="icon-arrow"></i>
								<span class="selected"></span>
							</a>
							<ul class="sub-menu" style="display: none;">
								<li>
									<a href="index.php?url=<?php echo ADMIN;?>/pagamento/cadastroPagamento">
										<span class="title"> Cadastrar </span>
									</a>
								</li>
								<li>
									<a href="index.php?url=<?php echo ADMIN;?>/pagamento/listarPagamento">
										<span class="title"> Listar </span>
									</a>
								</li>
							</ul>
						</li>						
					</ul>
					<!-- end: MAIN NAVIGATION MENU -->
				</div>
				<!-- end: SIDEBAR -->
			</div>
			<!-- start: PAGE -->
			
                                 <?php  
                                    $url->pegaControllerAction();
                                 ?>
			<!-- end: PAGE -->
		</div>
		<!-- end: MAIN CONTAINER -->
		<!-- start: FOOTER -->
		<div class="footer clearfix">
			<div class="footer-inner">
				2014 &copy; Leo Bessa Desenvolvimento.
			</div>
			<div class="footer-items">
				<span class="go-top"><i class="clip-chevron-up"></i></span>
			</div>
		</div>
		<!-- end: FOOTER -->
		<div id="event-management" class="modal fade" tabindex="-1" data-width="760" style="display: none;">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							&times;
						</button>
						<h4 class="modal-title">Event Management</h4>
					</div>
					<div class="modal-body"></div>
					<div class="modal-footer">
						<button type="button" data-dismiss="modal" class="btn btn-light-grey">
							Close
						</button>
						<button type="button" class="btn btn-danger remove-event no-display">
							<i class='fa fa-trash-o'></i> Delete Event
						</button>
						<button type='submit' class='btn btn-success save-event'>
							<i class='fa fa-check'></i> Save
						</button>
					</div>
				</div>
			</div>
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<!--[if lt IE 9]>
                    <script src="<?php echo PASTAADMIN;?>plugins/respond.min.js"></script>
                    <script src="<?php echo PASTAADMIN;?>plugins/excanvas.min.js"></script>
                    <script type="text/javascript" src="<?php echo INCLUDES;?>jquery-1.10.2.js"></script>
		<![endif]-->                
		<!--[if gte IE 9]><!-->
		<script src="<?php echo INCLUDES;?>jquery-2.0.3.js"></script>
		<!--<![endif]-->
                <!--<script src="<?php echo PASTAADMIN;?>plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>-->
                <script src="<?php echo INCLUDES;?>jquery-ui.js"></script>
                <script type="text/javascript" src="<?php echo INCLUDES;?>gera-grafico.js"></script>
                <script type="text/javascript" src="<?php echo INCLUDES;?>jquery.mask.js"></script>
                <script type="text/javascript" src="<?php echo INCLUDES;?>jquery.maskMoney.js"></script>
                <?php echo '<script type="text/javascript">
                        function servidor_inicial(){    
                                var home = "'.HOME.'";
                                return home;
                        }
                </script>'; ?>
                <script type="text/javascript" src="<?php echo INCLUDES;?>validacoes.js"></script>               
                
		<script src="<?php echo PASTAADMIN;?>plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo PASTAADMIN;?>plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"></script>
		<script src="<?php echo PASTAADMIN;?>plugins/blockUI/jquery.blockUI.js"></script>
		<script src="<?php echo PASTAADMIN;?>plugins/iCheck/jquery.icheck.min.js"></script>
		<script src="<?php echo PASTAADMIN;?>plugins/perfect-scrollbar/src/jquery.mousewheel.js"></script>
		<script src="<?php echo PASTAADMIN;?>plugins/perfect-scrollbar/src/perfect-scrollbar.js"></script>
		<!--<script src="<?php //echo PASTAADMIN;?>plugins/less/less-1.5.0.min.js"></script>-->
		<script src="<?php echo PASTAADMIN;?>plugins/jquery-cookie/jquery.cookie.js"></script>
		<script src="<?php echo PASTAADMIN;?>plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js"></script>
		<script src="<?php echo PASTAADMIN;?>js/main.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="<?php echo PASTAADMIN;?>plugins/flot/jquery.flot.js"></script>
		<script src="<?php echo PASTAADMIN;?>plugins/flot/jquery.flot.pie.js"></script>
		<script src="<?php echo PASTAADMIN;?>plugins/flot/jquery.flot.resize.min.js"></script>
		<script src="<?php echo PASTAADMIN;?>plugins/jquery.sparkline/jquery.sparkline.js"></script>
		<script src="<?php echo PASTAADMIN;?>plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
		<script src="<?php echo PASTAADMIN;?>plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
		<script src="<?php echo PASTAADMIN;?>plugins/fullcalendar/fullcalendar/fullcalendar.js"></script>
		<script src="<?php echo PASTAADMIN;?>js/index.js"></script>
		
                <script src="<?php echo PASTAADMIN;?>plugins/select2/select2.min.js"></script>                 
		<script src="<?php echo PASTAADMIN;?>plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>                
		<script src="<?php echo PASTAADMIN;?>plugins/bootstrap-switch/static/js/bootstrap-switch.min.js"></script>
                <script src="<?php echo PASTAADMIN;?>plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo PASTAADMIN;?>plugins/DataTables/media/js/DT_bootstrap.js"></script>
                <script src="<?php echo PASTAADMIN;?>js/table-data.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
                <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="<?php echo PASTAADMIN;?>plugins/jquery-validation/dist/jquery.validate.min.js"></script>
		<script src="<?php echo PASTAADMIN;?>plugins/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
		<script src="<?php echo PASTAADMIN;?>js/form-wizard.js"></script>
		<script src="<?php echo PASTAADMIN;?>js/Funcoes.js"></script>
		<script>
			jQuery(document).ready(function() {
                                Funcoes.init();
				Main.init();				
                                TableData.init();                               
                                FormWizard.init();
                                Index.init();
			});
		</script>
	</body>
	<!-- end: BODY -->
</html>