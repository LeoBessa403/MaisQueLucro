<!--  MODAL FORM DE CADASTRO E EDIÇÃO -->
<div class="modal modal-sm fade in modal-overflow j_representacao" id="novaRepresentacao" tabindex="-1"
     role="dialog" aria-hidden="true">
    <div class="modal-header btn-light-grey">
        <button type="button" class="close cancelar" data-dismiss="modal" aria-hidden="true">
            X
        </button>
        <h4 class="modal-title">Cadastro de Representações (Clientes / Fornecedores)</h4>
    </div>
    <div class="modal-body" style="padding: 0 2.5%;">
        <h2 style="margin-top: 5px;">
            <small>Representações Cadastrados</small>
            <button class="btn btn-green btn-nova-rep tooltips"
                    data-original-title="Cadastrar Representação" data-placement="right">
                <i class="fa fa-plus"></i> Nova Representação
            </button>
        </h2>
        <?php
        $grid = new Grid();
        $arrColunas = array('Cliente / Fornecedor', 'Telefone', 'E-mail', 'Ação');

        $grid->setColunasIndeces($arrColunas);
        $grid->criaGrid();

        /** @var RepresentacaoEntidade $rep */
        foreach ($representacoes as $rep):
            $acao = '<a class="btn btn-primary tooltips editRep" data-id="' .
                $rep->getCoRepresentacao() . '" data-original-title="Editar Representação" 
                        data-placement="top"><i class="fa fa-clipboard"></i>
                    </a>';
            $grid->setColunas(strtoupper($rep->getNoRepresentacao()));
            $grid->setColunas($rep->getDsEmail(), 2);
            $grid->setColunas(Valida::MascaraTel($rep->getNuTel1()), 2);
            $grid->setColunas($acao, 1);
            $grid->criaLinha($rep->getCoRepresentacao());
        endforeach;
        $grid->finalizaGrid();
        ?>
        <h2 id="cadRep" style="margin: 0 0 -10px;">
            <small>Cadastra Representação</small>
        </h2>
        <?= $formCliFor; ?>
    </div>
</div>
<a data-toggle="modal" role="button" href="#novaRepresentacao" id="j_representacao"></a>