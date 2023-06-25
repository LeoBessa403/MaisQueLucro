<style>
    .saldo{
        font-weight: bolder;
        font-size: 1.2em;
    }
</style>
<!--  MODAL FORM DE CADASTRO E EDIÇÃO -->
<div class="modal modal-sm fade in modal-overflow j_cadastro_conta" id="novaContaBancaria" tabindex="-1"
     role="dialog" aria-hidden="true">
    <div class="modal-header btn-orange">
        <button type="button" class="close cancelar" data-dismiss="modal" aria-hidden="true">
            X
        </button>
        <h4 class="modal-title">Contas Bancária</h4>
    </div>
    <div class="modal-body" style="padding: 0 2.5%;">
        <div id="dadosContas">
            <h2 style="margin-top: 5px;">
                <small>Contas Cadastrados</small>
                <button class="btn btn-green btn-nova-conta tooltips"
                        data-original-title="Cadastrar Conta Bancária" data-placement="right">
                    <i class="fa fa-plus"></i> Nova Conta
                </button>
            </h2>
            <?php
            $grid = new Grid();
            $arrColunas = array('Banco', 'Agência', 'Conta', 'Saldo Atual', 'Ativa', 'Ações');

            $grid->setColunasIndeces($arrColunas);
            $grid->criaGrid();


            /** @var ContaBancariaEntidade $banco */
            foreach ($bancos as $banco):
                $acao = '';
                if ($banco["co_conta_bancaria"] != 1) {
                    $acao .= '<a class="btn btn-primary tooltips editCont" data-id="' .
                        $banco["co_conta_bancaria"] . '" data-original-title="Editar Conta" 
                        data-placement="top"><i class="fa fa-clipboard"></i>
                    </a>';
                }

                $acao .= ' <a class="btn btn-med-grey tooltips histCont" data-id="' .
                    $banco["co_conta_bancaria"] . '" data-original-title="Histórico da Conta Bancária" 
                    data-placement="top"><i class="clip-folder-open"></i>
                     </a>';

                $saldo = Valida::FormataMoeda($banco["nu_saldo"]);
                if($saldo < 0){
                    $lbSaldo = '<p class="text-danger saldo">' . $saldo . '</p>';
                }else{
                    $lbSaldo = '<p class="text-success saldo">' . $saldo . '</p>';
                }

                $grid->setColunas(strtoupper($banco["no_banco"]), 2);
                $grid->setColunas($banco["nu_agencia"], 2);
                $grid->setColunas($banco["nu_conta"], 2);
                $grid->setColunas($lbSaldo, 2);
                $grid->setColunas(Valida::SituacaoSimNao($banco["st_status"]), 1);
                $grid->setColunas($acao, 1);
                $grid->criaLinha($banco["co_conta_bancaria"]);
            endforeach;
            $grid->finalizaGrid();
            ?>
            <h2 id="cadConta" style="margin: 0 0 -10px;">
                <small>Cadastra Conta</small>
            </h2>
            <?= $formConta; ?>
        </div>
        <div id="histContas" style="display: none;">
            <h2>
                <small>Histórico da Conta</small>
            </h2>
            <div id="histContasDados" style="padding: 3px 0 20px;">

            </div>
            <span class="pull-right" style="margin-right: 10px; margin-bottom: 10px; display: block;">
                <a class="btn btn-teal voltarConta"> Voltar
                <i class="clip-arrow-right-2"></i></a>
            </span>
            <span class="pull-right" style="margin-right: 10px; margin-bottom: 10px; display: block;">
                <a class="btn btn-primary fechaModal"> Fechar
                <i class="clip-close"></i></a>
            </span>
        </div>
    </div>
</div>
<a data-toggle="modal" role="button" href="#novaContaBancaria" id="j_cadastro_conta"></a>
