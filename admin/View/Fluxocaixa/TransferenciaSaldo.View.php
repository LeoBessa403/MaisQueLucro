<!--  MODAL FORM DE CADASTRO E EDIÇÃO -->
<div class="modal modal-sm fade in modal-overflow j_TransfSaldo" id="TransfSaldo" tabindex="-1"
     role="dialog" aria-hidden="true">
    <div class="modal-header btn-teal">
        <button type="button" class="close cancelar" data-dismiss="modal" aria-hidden="true">
            X
        </button>
        <h4 class="modal-title">Transferência de Saldo entre Contas</h4>
    </div>
    <div class="modal-body" style="padding: 0 2.5%;">
        <?= $formTransSaldo; ?>

        <h2 style="margin-top: 15px;">
            <small>Transferências Realizadas</small>
        </h2>
        <?php
        $grid = new Grid();
        $arrColunas = array('Origem', 'Saldo Ant.', 'Saldo Dep.', 'Destino',
            'Saldo Ant.', 'Saldo Dep.', 'Realizado', 'Transferido', 'Responsável');

        $grid->setColunasIndeces($arrColunas);
        $grid->criaGrid();

        /** @var HistTransferenciaEntidade $trans */
        foreach ($transferencias as $trans):
            $grid->setColunas($trans->getCoContaBancariaOrigem()->getNoBanco(), 2);
            $grid->setColunas(Valida::FormataMoeda($trans->getNuSaldoOrigemAnt()), 2);
            $grid->setColunas(Valida::FormataMoeda($trans->getNuSaldoOrigemDep()), 2);
            $grid->setColunas($trans->getCoContaBancariaDestino()->getNoBanco(), 2);
            $grid->setColunas(Valida::FormataMoeda($trans->getNuSaldoDestinoAnt()), 2);
            $grid->setColunas(Valida::FormataMoeda($trans->getNuSaldoDestinoDep()), 1);
            $grid->setColunas(Valida::DataShow($trans->getDtRealizado()), 1);
            $grid->setColunas(Valida::FormataMoeda($trans->getNuValorTransferido()), 1);
            $grid->setColunas($trans->getCoUsuario()->getCoPessoa()->getNoPessoa(), 3);
            $grid->criaLinha($trans->getCoHistTransferencia());
        endforeach;
        $grid->finalizaGrid();
        ?>
    </div>
</div>
<a data-toggle="modal" role="button" href="#TransfSaldo" id="j_TransfSaldo"></a>