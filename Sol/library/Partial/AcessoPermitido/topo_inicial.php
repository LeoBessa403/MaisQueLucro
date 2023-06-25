<?php
$url = new UrlAmigavel();
if ($url::$controller . '/' . $url::$action != 'Index/Acessar') {
    /** @var VisitaService $visitaService */
    $visitaService = new VisitaService();
    $visitaService->gestaoVisita();
}
?>

<html lang="en" class="dark-mode">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>SOL - <?= DESC_SIS; ?></title>

    <!-- manifest meta -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="manifest" href="manifest.json" />

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="<?= PASTAIMG; ?>favicon180.png" sizes="180x180">
    <link rel="icon" href="<?= PASTAIMG; ?>favicon32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="<?= PASTAIMG; ?>favicon16.png" sizes="16x16" type="image/png">

    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="<?= PASTA_LIBRARY; ?>css/bootstrap-icons.css">

    <!-- swiper carousel css -->
    <link rel="stylesheet" href="<?= PASTA_LIBRARY; ?>css/swiper-bundle.min.css">

    <!-- style css for this template -->
    <link href="<?= PASTA_LIBRARY; ?>css/stylePrincipal.css" rel="stylesheet" id="style">
</head>

<body class="d-flex flex-column h-100 sidebar-pushcontent sidebar-filled" data-sidebarstyle="sidebar-pushcontent">

<!-- page loader -->
<div class="container-fluid h-100 position-fixed loader-wrap bg-blur">
    <div class="row justify-content-center h-100">
        <div class="col-auto align-self-center text-center px-5 leaf">
            <h2 class="mb-1">SOL</h2>
            <h6 class="mb-4 text-secondary">Sistema Online Lucrativo</h6>
            <div class="logo-square animated mb-4">
                <div class="icon-logo">
                    <img src="<?= PASTAIMG; ?>logo-icon.png" alt="" />
                </div>
            </div>
            <p class="text-secondary small">Petal of flower being ready to <span class="text-gradient">blossom</span></p>

            <div class="dotslaoder">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <br>
        </div>
    </div>
</div>
<!-- page loader ends -->

<!-- background -->
<div class="coverimg h-100 w-100 top-0 start-0 position-absolute" id="image-daytime">
    <div class="overlay"></div>
    <img src="<?= PASTAIMG; ?>bg-1.jpg" alt="" class="w-100" />
</div>
<!-- background ends  -->

<!-- header -->
<header class="header">
    <!-- Fixed navbar -->
    <nav class="navbar fixed-top">
        <div class="container-fluid">
            <div class="col-auto">
                <a href="landing.html" class="btn btn-link text-secondary text-center"><i class="bi bi-chevron-left"></i></a>
            </div>
            <div class="col-auto ms-2">
                <a class="navbar-brand d-block" href="#">
                    <div class="row">
                        <div class="col-auto"><span class="logo-icon"><img src="<?= PASTAIMG; ?>logo-icon.png" class="mx-100" alt="" /></span></div>
                        <div class="col ps-0 align-self-center">
                            <h5 class="fw-normal text-dark">SOL</h5>
                            <p class="small text-secondary">Sistema Online lucrativo</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-auto ms-auto">
                <button type="button" class="btn btn-link text-secondary text-center" id="addtohome"><i class="bi bi-cloud-download-fill me-0 me-lg-1"></i> <span class="d-none d-lg-inline-block">Install</span></button>
            </div>
        </div>
    </nav>
</header>
<!-- header ends -->

<!-- Begin page content -->
<main class="main mainheight container-fluid">
    <form class="row h-100 justify-content-center">
        <div class="col-12 mb-auto">
            <!-- time and temperature -->
            <div class="row text-white my-2">
                <div class="col">
                    <p class="display-3 mb-0"><span id="time"></span><small></small></p>
                    <p class="lead fw-normal" id="date"></p>
                </div>
                <div class="col-auto text-end">
                    <p class="display-3 mb-0">
                        <img src="<?= PASTAIMG; ?>cloud-sun.png" alt="" class="vm me-0 tempimage" id="tempimage" />
                        <span id="temperature">46</span><span class="h4 text-uppercase"> <sup>0</sup>C</span>
                    </p>

                    <a href="javascript:void()" class="btn btn-link text-white dd-arrow-none dropdown-toggle p-0" id="selectCity" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="h5 fw-normal" id="city">Brasília</span>
                    </a>
                </div>
            </div>
            <!-- time and temperature ends -->

        </div>
