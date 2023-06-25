<!--  MODAL FORM DE CADASTRO E EDIÇÃO -->
<div class="modal modal-sm fade in modal-overflow j_cadastro" id="novaCategoriaFC" tabindex="-1"
     role="dialog" aria-hidden="true">
    <div class="modal-header btn-primary">
        <button type="button" class="close cancelar" data-dismiss="modal" aria-hidden="true">
            X
        </button>
        <h4 class="modal-title">Cadastro de Categoria de Fluxo de Caixa</h4>
    </div>
    <div class="modal-body" style="padding: 0;">
        <?= $formCat; ?>
    </div>
</div>
<a data-toggle="modal" role="button" href="#novaCategoriaFC" id="j_cadastro"></a>