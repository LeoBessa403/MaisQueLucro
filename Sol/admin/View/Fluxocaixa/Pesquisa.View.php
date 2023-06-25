<!--  MODAL FORM DE CADASTRO E EDIÇÃO -->
<div class="modal modal-sm fade in modal-overflow j_pesquisa" id="novaPesquisa" tabindex="-1"
     role="dialog" aria-hidden="true">
    <div class="modal-header btn-success">
        <button type="button" class="close cancelar" data-dismiss="modal" aria-hidden="true">
            X
        </button>
        <h4 class="modal-title">Pesqusiar Lançamentos</h4>
    </div>
    <div class="modal-body" style="padding: 0;">
        <?= $formPesquisa; ?>
    </div>
</div>
<a data-toggle="modal" role="button" href="#novaPesquisa" id="j_pesquisa"></a>