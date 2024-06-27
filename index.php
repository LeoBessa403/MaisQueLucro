<?php
require_once 'library/Config.inc.php';
$link = UrlAmigavel::getLink();
$url = (isset($link) && $link != "") ? $link : SITE;
$url = explode("/", $url);

include './' . ADMIN . '/sistema.php';
