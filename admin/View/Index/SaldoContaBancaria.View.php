<style>
    .saldo {
        font-weight: bolder;
        font-size: 1.2em;
    }
</style>
<!--  MODAL FORM DE CADASTRO E EDIÇÃO -->
<div class="modal modal-sm fade in modal-overflow j_saldo_conta" id="saldoContaBancaria" tabindex="-1"
     role="dialog" aria-hidden="true">
    <div class="modal-header btn-med-grey">
        <button type="button" class="close cancelar" data-dismiss="modal" aria-hidden="true">
            X
        </button>
        <h4 class="modal-title"><i class="fa fa-money"></i> Histórico da Conta</h4>
    </div>
    <div id="histContas" class="modal-body" style="padding: 0 2.5%;">
        <div id="histContasDados" style="padding: 3px 0 20px;">

        </div>
    </div>
</div>
<a data-toggle="modal" role="button" href="#saldoContaBancaria" id="j_saldo_conta"></a>
