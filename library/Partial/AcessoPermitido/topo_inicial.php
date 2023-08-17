<?php
$url = new UrlAmigavel();
if ($url::$controller . '/' . $url::$action != 'Index/Acessar') {
    /** @var VisitaService $visitaService */
    $visitaService = new VisitaService();
    $visitaService->gestaoVisita();
}
?>
<!DOCTYPE html>
<!-- Template Name: Clip-One - Responsive Admin Template build with Twitter Bootstrap 3.x Version: 1.4 Author: ClipTheme -->
<!--[if IE 8]>
<html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]>
<html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- start: HEAD -->
<head>
    <title>SISTEMA | <?= DESC_SIS; ?></title>
    <!-- start: META -->
    <meta charset="utf-8"/>
    <!--[if IE]>
    <meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1"/><![endif]-->
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- end: META -->
    <link rel="stylesheet" href="<?= PASTA_LIBRARY; ?>plugins/bootstrap/css/bootstrap.min.css?v=<?= filemtime(
        INCLUDES_LIBRARY ."plugins/bootstrap/css/bootstrap.min.css"); ?>">
    <link rel="stylesheet" href="<?= PASTA_LIBRARY; ?>css/font-awesome.min.css?v=<?= filemtime(
        INCLUDES_LIBRARY ."css/font-awesome.min.css"); ?>">
    <link rel="stylesheet" href="<?= PASTA_LIBRARY; ?>fonts/style.css?v=<?= filemtime(
        INCLUDES_LIBRARY ."fonts/style.css"); ?>">
    <link rel="stylesheet" href="<?= PASTA_LIBRARY; ?>css/main-responsive.css?v=<?= filemtime(
        INCLUDES_LIBRARY ."css/main-responsive.css"); ?>">
    <link rel="stylesheet" href="<?= PASTA_LIBRARY; ?>css/main.css?v=<?= filemtime(
        INCLUDES_LIBRARY ."css/main.css"); ?>">
    <link rel="stylesheet" href="<?= PASTA_LIBRARY; ?>plugins/iCheck/skins/all.css?v=<?= filemtime(
        INCLUDES_LIBRARY ."plugins/iCheck/skins/all.css"); ?>">
    <link rel="stylesheet" href="<?= PASTA_LIBRARY; ?>plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css?v=<?= filemtime(
        INCLUDES_LIBRARY ."plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css"); ?>">
    <link rel="stylesheet" href="<?= PASTA_LIBRARY; ?>plugins/perfect-scrollbar/src/perfect-scrollbar.css?v=<?= filemtime(
        INCLUDES_LIBRARY ."plugins/perfect-scrollbar/src/perfect-scrollbar.css"); ?>">
    <link rel="stylesheet" href="<?= PASTA_LIBRARY; ?>css/theme_navy.css" type="text/css" id="skin_color?v=<?= filemtime(
        INCLUDES_LIBRARY ."css/theme_navy.css"); ?>">
    <link rel="stylesheet" href="<?= PASTA_LIBRARY; ?>plugins/css3-animation/animations.css?v=<?= filemtime(
        INCLUDES_LIBRARY ."plugins/css3-animation/animations.css"); ?>">
    <![endif]-->
    <!-- start: CSS REQUIRED Gritter -->
    <link rel="stylesheet" href="<?= PASTA_LIBRARY; ?>plugins/gritter/css/jquery.gritter.css?v=<?= filemtime(
        INCLUDES_LIBRARY ."plugins/gritter/css/jquery.gritter.css"); ?>">
    <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
    <link rel="shortcut icon" href="<?= HOME; ?>favicon.ico?v=<?= filemtime(
        PASTA_RAIZ ."favicon.ico"); ?>"/>
    <!-- end: MAIN CSS -->
    <!-- start: CSS REQUIRED FOR SELECT -->
    <link rel="stylesheet" href="<?= PASTA_LIBRARY; ?>plugins/select2/select2.css?v=<?= filemtime(
        INCLUDES_LIBRARY ."plugins/select2/select2.css"); ?>">
    <!-- start: CSS REQUIRED FOR CHECK -->
    <link rel="stylesheet"
          href="<?= PASTA_LIBRARY; ?>plugins/bootstrap-switch/static/stylesheets/bootstrap-switch.css?v=<?= filemtime(
              INCLUDES_LIBRARY ."plugins/bootstrap-switch/static/stylesheets/bootstrap-switch.css"); ?>">
    <!--  PARA CADASTRAR USUÁRIO  -->
    <link rel="stylesheet" href="<?= PASTA_LIBRARY; ?>plugins/bootstrap-fileupload/bootstrap-fileupload.min.css?v=<?= filemtime(
        INCLUDES_LIBRARY ."plugins/bootstrap-fileupload/bootstrap-fileupload.min.css"); ?>">
    <!-- start: CSS REQUIRED FOR DATAPICKER -->
    <link rel="stylesheet" href="<?= INCLUDES; ?>Jcalendar.css?v=<?= filemtime(
        INCLUDES_LIBRARY ."Helpers/includes/Jcalendar.css"); ?>">

    <style>
        .coverimg {
            height: 100%;
            width: 100%;
            position: absolute;
            top: 0;
            background-size: cover;
            background-position: center center;
            image-rendering: crisp-edges;
            image-rendering: -moz-crisp-edges;
            image-rendering: -webkit-optimize-contrast;
        }
    </style>
    <!-- end: MAIN CSS -->
</head>
<!-- end: HEAD -->
<!-- start: BODY -->
<body class="login example1">
<?php include 'library/Partial/valida_ambiente.php'; ?>
<div class="coverimg" id="image-daytime"
     style="background-image: url('<?= PASTAADMIN; ?>Imagens/bg (<?= rand(1, NUM_BG_IMAGENS); ?>).jpg')">
    <div class="overlay"></div>
    <img src="<?= PASTAADMIN; ?>Imagens/bg (<?= rand(1, NUM_BG_IMAGENS); ?>).jpg" alt=""
         class="w-100" style="display: none;">
</div>
<div class="main-login col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3" style="padding: 20px 50px;">
    <div class="logo">
        <span class="no_sistema box-shadow"><?= DESC_SIS; ?></span>
    </div>
