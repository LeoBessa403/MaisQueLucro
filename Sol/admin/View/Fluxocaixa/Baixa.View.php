<!--  MODAL FORM DE CADASTRO E EDIÇÃO -->
<div class="modal modal-sm fade in modal-overflow j_Baixa" id="darBaixa" tabindex="-1"
     role="dialog" aria-hidden="true">
    <div class="modal-header btn-dark-beige">
        <button type="button" class="close cancelar" data-dismiss="modal" aria-hidden="true">
            X
        </button>
        <h4 class="modal-title">Dar Baixa nos Lançamentos</h4>
    </div>
    <div class="modal-body" style="padding: 2.5%;">
        <h4>Você confirma dar baixa nos Lançamentos selecionados?</h4>
        <h5><b>Obs: A data e valor lançados como esperados seram lançados como data paga e valor pago.
                O Sistema irá dar a baixa levando em conta a data Esperada de cada lançamento selecionado.
                Lançamentos com data futura a data paga será lançado a data de hoje. Você Confirma?</b></h5>
    </div>
    <div class="modal-footer">
        <button aria-hidden="true" data-dismiss="modal" class="btn btn-bricky cancelar">
            Cancelar
        </button>
        <button class="btn btn-success" data-dismiss="modal" id="btnDarBaixa">
            OK
        </button>
        <input type="hidden" name="valorDarBaixa" id="valorDarBaixa" value="" />
    </div>
</div>
<a data-toggle="modal" role="button" href="#darBaixa" id="j_Baixa"></a>