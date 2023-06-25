<?php
$linhas = fopen('versao.txt', "a+");
$versoes = fgets($linhas);
$versao = explode('//', $versoes);
?>
Versão: <?= $versao[2]; ?>