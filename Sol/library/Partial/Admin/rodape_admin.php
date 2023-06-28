<!-- Rightbar -->
<div class="rightbar-wrap">
    <div class="rightbar">
        <!-- suporte window -->
        <div class="chatwindow d-none" id="chatwindow">
            <div class="card border-0 h-100">
                <div class="card-body h-100 overflow-y-auto p-0">
                    <ul class="list-group list-group-flush bg-none rounded-0 ">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-auto">
                                    <figure class="avatar avatar-44 coverimg rounded-circle">
                                        <img src="<?= PASTAIMG; ?>user-2.jpg" alt=""/>
                                    </figure>
                                </div>
                                <div class="col-9 align-self-center ps-0">
                                    <div class="row g-0">
                                        <div class="col-8">
                                            <p class="text-truncate mb-0">Angelina Devid</p>
                                        </div>
                                        <div class="col-4 text-end"><small class="text-muted fs-10 mb-1"><i
                                                        class="bi bi-check"></i> 2:00 am</small></div>
                                    </div>
                                    <p class="text-secondary small text-truncate">Spread love and spread this
                                        template</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- chat window ends -->

        <!-- notifications window -->
        <div class="notificationwindow d-none h-100 overflow-y-auto" id="notificationwindow">
            <div class="card border-0 mb-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-auto">
                            <figure class="avatar avatar-40 coverimg rounded-circle">
                                <img src="<?= PASTAIMG; ?>user-2.jpg" alt=""/>
                            </figure>
                        </div>
                        <div class="col ps-0">
                            <p><a href="profile.html">Angelina David</a>, <a href="profile.html">John McMillan</a> and
                                <span class="fw-medium">36 others</span> are also order from same website</p>
                            <p class="text-secondary small">2:14 pm <a href="javascript:void(0)"
                                                                       class="float-end text-secondary text-muted"><i
                                            class="bi bi-trash"></i></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- notifications window ends -->

    </div>
</div>
<!-- Rightbar ends -->

<?php
$url->pegaControllerAction();
?>
<!-- end: PAGE -->
<!--</div>-->
<!-- end: MAIN NAVIGATION MENU --><!-- end: MAIN CONTAINER -->
<!-- start: FOOTER -->
<!--<div class="footer clearfix">-->
<!--    <div class="footer-inner" style="float:none;  text-align: center;">-->
<!--        --><?php //include_once 'controle_versao.php'; ?>
<!--    </div>-->
<!--    <div class="footer-items">-->
<!--        <span class="go-top"><i class="clip-chevron-up"></i></span>-->
<!--    </div>-->
<!--</div>-->


<!-- Required jquery and libraries -->
<script src="<?= INCLUDES; ?>jquery-3.3.1.min.js"></script>
<script src="<?= INCLUDES; ?>popper.min.js"></script>
<script src="<?= INCLUDES; ?>bootstrap.bundle.js"></script>

<!-- Customized jquery file  -->
<script src="<?= INCLUDES; ?>main.js"></script>
<script src="<?= INCLUDES; ?>color-scheme.js"></script>

<!-- PWA app service registration and works -->
<script src="pwa-services.js"></script>

<!-- date range picker -->
<script src="<?= INCLUDES; ?>moment.min.js"></script>
<script src="<?= INCLUDES; ?>daterangepicker.js"></script>

<!-- chosen script -->
<script src="<?= INCLUDES; ?>chosen.jquery.min.js"></script>

<!-- Chart js script -->
<script src="<?= INCLUDES; ?>chart.min.js"></script>

<!-- Progress circle js script -->
<script src="<?= INCLUDES; ?>progressbar.min.js"></script>

<!-- swiper js script -->
<script src="<?= INCLUDES; ?>js/swiper-bundle.min.js"></script>

<!-- Simple lightbox script -->
<script src="<?= INCLUDES; ?>js/simple-lightbox.jquery.min.js"></script>

<!-- app tour script-->
<script src="<?= INCLUDES; ?>js/lib.js"></script>

<!-- page level script here -->
<script src="<?= INCLUDES; ?>js/header-title.js"></script>
<script src="<?= INCLUDES; ?>js/dashboard.js"></script>

<!--<script type="text/javascript" src="--><? //= PASTA_LIBRARY; ?><!--js/js_padrao.min.js"></script>-->
<?php include_once PARTIAL_LIBRARY . 'constantes_javascript.php'; ?>
<script type="text/javascript" src="<?= PASTA_LIBRARY; ?>js/Funcoes.js"></script>
<script type="text/javascript" src="<?= PASTA_LIBRARY; ?>js/jquery.mask.js"></script>
<script type="text/javascript" src="<?= PASTA_LIBRARY; ?>js/jquery.maskMoney.js"></script>
<script type="text/javascript" src="<?= PASTA_LIBRARY; ?>js/validacoes.js"></script>
<?php carregaJs($url); ?>
<!-- Carrega DIVs dos Alertas e Notificações   -->
<?php include_once 'alertas.php'; ?>
</body>

</html>
<?php
ob_end_flush();