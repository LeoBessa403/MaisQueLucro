<!--  MODAL FORM DE CADASTRO E EDIÇÃO -->
<div class="modal modal-sm fade in modal-overflow j_centro" id="novoCentro" tabindex="-1"
     role="dialog" aria-hidden="true">
    <div class="modal-header btn-yellow">
        <button type="button" class="close cancelar" data-dismiss="modal" aria-hidden="true">
            X
        </button>
        <h4 class="modal-title">Centro de Custos (Filial / Setores / Projetos)</h4>
    </div>
    <div class="modal-body" style="padding: 0 2.5%;">
        <h2 style="margin-top: 5px;">
            <small>Centro de Custos Cadastrados</small>
            <button class="btn btn-green btn-novo-centro tooltips"
                    data-original-title="Cadastrar Centro de Custos" data-placement="right">
                <i class="fa fa-plus"></i> Novo Centro de Custos
            </button>
        </h2>
        <?php
        $grid = new Grid();
        $arrColunas = array('Filial / Setores / Projetos', 'Ação');

        $grid->setColunasIndeces($arrColunas);
        $grid->criaGrid();
        /** @var CentroCustoEntidade $centro */
        foreach ($centros as $centro):
            $acao = '<a class="btn btn-primary tooltips editCentro" data-id="' .
                $centro->getCoCentroCusto() . '" data-original-title="Editar Centro de Custo" 
                        data-placement="top"><i class="fa fa-clipboard"></i>
                    </a>';
            $grid->setColunas(strtoupper($centro->getNoCentroCustos()));
            $grid->setColunas($acao, 1);
            $grid->criaLinha($centro->getCoCentroCusto());
        endforeach;
        $grid->finalizaGrid();
        ?>
        <h2 id="cadCentro" style="margin: 0 0 -10px;">
            <small>Cadastra Centro de Custos</small>
        </h2>
        <?= $formCentro; ?>
    </div>
</div>
<a data-toggle="modal" role="button" href="#novoCentro" id="j_centro"></a>