<?php
ob_start();
$url = new UrlAmigavel();
if (in_array(UrlAmigavel::$action, UrlAmigavel::$ACESSO_PERMITIDO)):
    $url->pegaControllerAction();
    exit;
endif;
$valida = new ValidaUsuario();
$valida->validacao();
$compara = strstr(UrlAmigavel::$action, 'Exporta');
if ($compara != null):
    $url->pegaControllerAction();
    exit;
endif;
/** @var Session $session */
$session = new Session();
/** @var Session $us */
$us = unserialize(serialize($_SESSION[SESSION_USER]));
$user = $us->getUser();
?>

<!doctype html>
<html lang="en" class="dark-mode">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>SISTEMA | <?= DESC_SIS; ?></title>

    <!-- manifest meta -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="manifest" href="manifest.json"/>

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="<?= PASTAIMG; ?>favicon180.png" sizes="180x180">
    <link rel="icon" href="<?= PASTAIMG; ?>favicon32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="<?= PASTAIMG; ?>favicon16.png" sizes="16x16" type="image/png">

    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="<?= PASTA_LIBRARY; ?>css/bootstrap-icons.css">

    <!-- chosen css -->
    <link rel="stylesheet" href="<?= PASTA_LIBRARY; ?>css/chosen.min.css">

    <!-- date range picker -->
    <link rel="stylesheet" href="<?= PASTA_LIBRARY; ?>css/daterangepicker.css">

    <!-- swiper carousel css -->
    <link rel="stylesheet" href="<?= PASTA_LIBRARY; ?>css/swiper-bundle.min.css">

    <!-- simple lightbox css -->
    <link rel="stylesheet" href="<?= PASTA_LIBRARY; ?>css/simple-lightbox.min.css">

    <!-- app tour css -->
    <link rel="stylesheet" href="<?= PASTA_LIBRARY; ?>css/lib.css">

    <!-- style css for this template -->
    <link href="<?= PASTA_LIBRARY; ?>css/stylePrincipal.css" rel="stylesheet">
    <script>
        if (typeof navigator.serviceWorker !== 'undefined') {
            navigator.serviceWorker.register('pwabuilder-sw.js')
        }
    </script>
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
                    <img src="<?= PASTAIMG; ?>logo-icon.png" alt=""/>
                </div>
            </div>
            <p class="text-secondary small">Levando você para a próxima página.</p>

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

<!-- Header -->
<header class="header">
    <!-- Fixed navbar -->
    <nav class="navbar fixed-top">
        <div class="container-fluid">
            <button class="btn btn-link btn-square menu-btn me-2" type="button">
                <i class="bi bi-list fs-4"></i>
            </button>
            <div class="col-auto ms-2">
                <a class="navbar-brand d-block" href="<?= PASTAADMIN; ?>/Index/IndexAdmin">
                    <div class="row">
                        <div class="col-auto"><span class="logo-icon"><img src="<?= PASTAIMG; ?>logo-icon.png"
                                                                           class="mx-100" alt=""/></span></div>
                        <div class="col ps-0 align-self-center">
                            <h5 class="fw-normal text-dark">SOL</h5>
                            <p class="small text-secondary">Sistema Online lucrativo</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="ms-auto">
                <div class="row">
                    <div class="col-auto">
                        <button type="button" class="btn btn-square btn-link text-center" id="addtohome"
                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Install PWA"><i
                                    class="bi bi-cloud-download"></i></button>
                        <button type="button" class="btn btn-square btn-link text-center d-lg-inline-block"
                                id="gofullscreen" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Fullscreen"><i class="bi bi-fullscreen"></i></button>

                        <button type="button" class="btn btn-square btn-link text-center09- d-sm-inline-block"
                                id="showChat" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Chat & Support">
                                <span class="bi bi-chat-right-dots position-relative">
                                    <span class="badge position-absolute top-0 start-100 translate-middle bg-theme textw-white rounded">
                                        <span class="fs-10"><?= SuporteService::PesquisaCountMensagens(); ?></span> <span class="visually-hidden">New alerts</span>
                                    </span>
                                </span>
                        </button>
                        <button type="button" class="btn btn-square btn-link text-center" id="showNotification"
                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Notificações">
                                <span class="bi bi-bell position-relative">
                                   <span class="badge position-absolute top-0 start-100 translate-middle bg-danger textw-white rounded">
                                        <span class="fs-10 nu_notificacoes">9+</span>
                                    </span>
                                </span>
                        </button>
                    </div>
                    <div class="col-auto align-self-center">
                        <div class="dropdown">
                            <a class="dd-arrow-none dropdown-toggle" id="userprofiledd" data-bs-toggle="dropdown"
                               aria-expanded="false" role="button">
                                <div class="row">
                                    <div class="col-auto align-self-center">
                                        <figure class="avatar avatar-30 rounded-circle coverimg vm">
                                            <?php
                                            $noPessoa = $user[md5(NO_PESSOA)];
                                            $foto = $user[md5('ds_caminho')];
                                            $sexo = $user[md5('st_sexo')];
                                            if ($sexo == "M"):
                                                $fotoPerfil = "avatar-homem.jpg";
                                            else:
                                                $fotoPerfil = "avatar-mulher.jpg";
                                            endif;
                                            if ($foto != "" && file_exists(PASTA_RAIZ . "uploads/usuarios/" . $foto)):
                                                echo Valida::GetMiniatura("usuarios/" . $foto,
                                                    $noPessoa, 50, 50, "userphotoonboarding2");
                                            else:
                                                echo '<img src="' . TIMTHUMB . '?src=' . HOME .
                                                    'library/Imagens/' . $fotoPerfil . '&w=35&h=35" 
                                                        alt="' . $noPessoa . '" title="' . $noPessoa . '" 
                                                        class="userphotoonboarding2" />';
                                            endif;
                                            ?>
                                        </figure>
                                    </div>
                                    <div class="col ps-0 align-self-center d-none d-lg-block">
                                        <p class="mb-0">
                                            <span class="text-dark username">
                                                <?php
                                                echo Valida::Resumi($noPessoa, 25);
                                                ?>
                                            </span><br>
                                            <small class="small">
                                                <?php
                                                $no_perfis = $user[md5('no_perfis')];
                                                $perfis = explode(', ', $no_perfis);
                                                $qtdPerfil = count($perfis);
                                                ?>
                                                <?= ($qtdPerfil == 1) ? '1 Perfil Ativo' : $qtdPerfil . ' Perfis Ativos' ?>
                                            </small>
                                        </p>
                                    </div>
                                    <div class="col ps-0 align-self-center d-none d-lg-block">
                                        <i class="bi bi-chevron-down small vm"></i>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end w-300" aria-labelledby="userprofiledd">
                                <div class="dropdown-info bg-radial-gradient-theme">
                                    <div class="row">
                                        <div class="col-auto">
                                            <figure class="avatar avatar-50 rounded-circle coverimg vm">
                                                <?php
                                                if ($foto != "" && file_exists(PASTA_RAIZ . "uploads/usuarios/" . $foto)):
                                                    echo Valida::GetMiniatura("usuarios/" . $foto,
                                                        $noPessoa, 100, 100, "userphotoonboarding2");
                                                else:
                                                    echo '<img src="' . TIMTHUMB . '?src=' . HOME .
                                                        'library/Imagens/' . $fotoPerfil . '&w=35&h=35" 
                                                        alt="' . $noPessoa . '" title="' . $noPessoa . '" 
                                                        class="userphotoonboarding3" />';
                                                endif;
                                                ?>
                                            </figure>
                                        </div>
                                        <div class="col align-self-center ps-0">
                                            <h6 class="mb-0"><span class="username">
                                                    <?php
                                                    echo Valida::Resumi($noPessoa, 25);
                                                    ?>
                                                </span></h6>
                                            <p class="text-muted small">
                                                <?= ($qtdPerfil == 1) ? '1 Perfil Ativo' : $qtdPerfil . ' Perfis Ativos' ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div><a class="dropdown-item" href="<?= PASTAADMIN; ?>Usuario/MeuPerfilUsuario">Meu
                                        Perfil</a></div>
                                <div>
                                    <a class="dropdown-item" href="home.html">
                                        <div class="row g-0">
                                            <div class="col align-self-center">Notificações</div>
                                            <div class="col-auto">
                                                <div class="avatar avatar-20 bg-theme rounded-circle">
                                                    <small class="fs-10 vm"><span
                                                                class="nu_notificacoes"></span></small>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div>
                                    <a class="dropdown-item" href="<?= HOME . ADMIN; ?>/Assinante/MeuPlanoAssinante">
                                        <div class="row g-0">
                                            <div class="col align-self-center">Plano Assinante</div>
                                            <div class="col-auto">
                                                <div class="avatar-50">
                                                    <small style="background-color: green;
                                                    padding: 3px"><?= StatusSistemaEnum::getDescricaoValor("A"); ?></small>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div><a class="dropdown-item"
                                        href="<?= HOME . ADMIN; ?>/Assinante/DadosComplementaresAssinante">Dados
                                        Assinante</a></div>
                                <div>
                                    <a class="dropdown-item" href="<?= HOME . ADMIN; ?>/Suporte/ListarSuporte">
                                        <div class="row g-0">
                                            <div class="col align-self-center">Suporte</div>
                                            <div class="col-auto">
                                                <div class="avatar avatar-20 bg-theme rounded-circle">
                                                    <small class="fs-10 vm">
                                                        <?= SuporteService::PesquisaCountMensagens(); ?></small>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div><a class="dropdown-item"
                                        href="<?= PASTAADMIN; ?>login/deslogar/desloga/10">Sair</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
<!-- Header ends -->

<!-- Begin page content -->
<main class="main mainheight">