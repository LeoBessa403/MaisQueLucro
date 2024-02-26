<?php
$linhas = fopen('versao.txt', "a+");
$versoes = fgets($linhas);
$versao = explode('//', $versoes);
?>
<?= date("Y"); ?> &copy; Mais Que Lucro. <b>Versão: <?= $versao[2]; ?></b>