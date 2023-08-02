<style>
    .ambiente {
        width: 100%;
        display: block;
        color: white;
        text-align: center;
        height: 36px;
        margin-top: -10px;
        vertical-align : middle;
        padding: 6px;
    }
    .dsv {
        background-color: darkgoldenrod;
    }
    .tst {
        background-color: darkred;
    }
    .ambiente h6 {
        font-weight: 800;
    }
</style>
<?php
$padding = false;
if (AMBI == 1) {
    $padding = true;
    ?>
    <div class="ambiente dsv">
        <h6>Ambiente de Desenvolvimento</h6>
    </div>
<?php } elseif (AMBI == 2) {
    $padding = true;
    ?>
    <div class="ambiente tst">
        <h6>Ambiente de Teste</h6>
    </div>
<?php } ?>