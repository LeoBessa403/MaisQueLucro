<?php
ob_start();

include_once "./library/Partial/Site/topo_inicial.php";

$url->pegaControllerAction();

include_once "./library/Partial/Site/rodape_inicial.php";
ob_end_flush();