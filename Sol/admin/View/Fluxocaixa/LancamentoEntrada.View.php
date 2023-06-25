<!--  MODAL FORM DE CADASTRO E EDIÇÃO -->
<div class="modal modal-sm fade in modal-overflow j_entrada" id="LancamentoEntrada" tabindex="-1"
     role="dialog" aria-hidden="true">
    <div class="modal-header btn-green">
        <button type="button" class="close cancelar" data-dismiss="modal" aria-hidden="true">
            X
        </button>
        <h4 class="modal-title">Lancamento de Entrada</h4>
    </div>
    <div class="modal-body" style="padding: 0 2.5%;">
        <?= $formEntrada; ?>
    </div>
</div>
</div>
<a data-toggle="modal" role="button" href="#LancamentoEntrada" id="j_entrada"></a>
