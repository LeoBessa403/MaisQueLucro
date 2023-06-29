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
</main>
<!-- footer sticky bottom -->
<footer class="footer-sticky">
    <div class="container">
        <ul class="nav nav-pills nav-justified">
            <li class="nav-item">
                <a class="nav-link" href="home.html">
                        <span>
                            <i class="nav-icon bi bi-house"></i>
                            <span class="nav-text">Home</span>
                        </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="finance-dashboard.html">
                        <span>
                            <i class="nav-icon bi bi-binoculars"></i>
                            <span class="nav-text">Money</span>
                        </span>
                </a>
            </li>
            <li class="nav-item centerbutton">
                <a class="nav-link" href="personalization.html">
                        <span class="bg-radial-gradient-theme">
                            <i class="bi bi-palette size-22"></i>
                        </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="app-email.html">
                        <span>
                            <i class="nav-icon bi bi-bag"></i>
                            <span class="nav-text">Email</span>
                        </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="profile.html">
                        <span>
                            <i class="nav-icon bi bi-person"></i>
                            <span class="nav-text">Profile</span>
                        </span>
                </a>
            </li>
        </ul>
    </div>
    <p class="text-secondary"><?php include_once 'controle_versao_admin.php'; ?></p>
</footer>
<!-- footer sticky bottom ends -->


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
<script src="<?= INCLUDES; ?>swiper-bundle.min.js"></script>

<!-- Simple lightbox script -->
<script src="<?= INCLUDES; ?>simple-lightbox.jquery.min.js"></script>

<!-- app tour script-->
<script src="<?= INCLUDES; ?>lib.js"></script>

<script src="<?= INCLUDES; ?>footable.min.js"></script>

<!-- page level script here -->
<script src="<?= INCLUDES; ?>header-title.js"></script>
<!--<script src="--><?//= INCLUDES; ?><!--dashboard.js"></script>-->
<!--<script src="--><?//= INCLUDES; ?><!--finance-dashboard.js"></script>-->

<!--<script type="text/javascript" src="--><? //= PASTA_LIBRARY; ?><!--js/js_padrao.min.js"></script>-->
<?php include_once PARTIAL_LIBRARY . 'constantes_javascript.php'; ?>
<script type="text/javascript" src="<?= PASTA_LIBRARY; ?>js/Funcoes.js"></script>
<script type="text/javascript" src="<?= PASTA_LIBRARY; ?>js/jquery.mask.js"></script>
<script type="text/javascript" src="<?= PASTA_LIBRARY; ?>js/jquery.maskMoney.js"></script>
<script type="text/javascript" src="<?= PASTA_LIBRARY; ?>js/validacoes.js"></script>
<?php carregaJs($url); ?>
<!-- Carrega DIVs dos Alertas e Notificações   -->
<?php //include_once 'alertas.php'; ?>
</body>

</html>
<?php
ob_end_flush();