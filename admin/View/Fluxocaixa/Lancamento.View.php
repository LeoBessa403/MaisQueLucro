<div class="main-content">
    <div class="container">
        <?php include_once 'BotoesLancamento.View.php' ?>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php
                        $perfil_master = false;
                        Modal::ModalConfirmaDesativacao("DelFluxoCaixa", 'Deseja Realmente excluir esse Lançamento?');
                        $grid = new Grid();
                        ?>
                        <h2>
                            <small>Lançamentos Cadastrados</small>
                        </h2>
                        <?php
                        Modal::load();
                        $cpTodos = '<label class="divCheck tooltips" data-original-title="Marcar/Desmarcar Todos" 
                                    data-placement="top">
                                          <input type="checkbox" id="selTodosLanc">
                                          <span class="checkmark"></span>
                                    </label>';


                        $arrColunas = array($cpTodos, 'Tipo de Lançamento', 'Categoria', 'Lançado', 'Vencimento', 'Pago em',
                            'Status Pagamento', 'Valor', 'Valor Pago', 'Forma de Pagamento',
                            'Conta', 'Centro de Custo', 'Representção', 'Responsável', 'Ações');

                        $grid->setColunasIndeces($arrColunas);
                        $grid->criaGrid();

                        /** @var FluxoCaixaEntidade $res */
                        foreach ($result as $res):
                            $acao = '<a data-id="' . $res->getCoFluxoCaixa() . '"
                                    class="btn btn-primary tooltips editLanc"
                                    data-original-title="Editar Lançamento" data-placement="top">
                                    <i class="fa fa-clipboard"></i>
                                </a>
                                <a data-toggle="modal" role="button" class="btn btn-bricky tooltips deleta"
                                    id="' . $res->getCoFluxoCaixa() . '"
                                   href="#DelFluxoCaixa" data-original-title="Excluir Lançamento"
                                   data-placement="top">
                                    <i class="fa fa-trash-o"></i>
                                </a>';

                            $catLanc = '';
                            if ($res->getCoCategoriaFcNeta()) {
                                $catLanc = $res->getCoCategoriaFcNeta()->getNuCodigo()
                                    . ' - ' . $res->getCoCategoriaFcNeta()->getDsTexto();
                            } elseif ($res->getCoCategoriaFcFilha()) {
                                $catLanc = $res->getCoCategoriaFcFilha()->getNuCodigo()
                                    . ' - ' . $res->getCoCategoriaFcFilha()->getDsTexto();
                            } elseif ($res->getCoCategoriaFc()) {
                                $catLanc = $res->getCoCategoriaFc()->getNuCodigo()
                                    . ' - ' . $res->getCoCategoriaFc()->getDsTexto();
                            }

                            $labelStPg = '<span class="circle-img label-' .
                                StatusPagamentoFCEnum::$cores[$res->getStPagamento()] .
                                '">&nbsp;&nbsp;&nbsp;&nbsp;</span> ';

                            $dtVenc = ($res->getDtVencimento()) ? Valida::DataShow($res->getDtVencimento()) : '';
                            $dtReal = ($res->getDtRealizado()) ? Valida::DataShow($res->getDtRealizado()) : '';
                            $val = ($res->getNuValor()) ? Valida::FormataMoeda($res->getNuValor()) : '';
                            $valPg = ($res->getNuValorPago()) ? Valida::FormataMoeda($res->getNuValorPago()) : '';
                            $centro = ($res->getCoCentroCusto())
                                ? $res->getCoCentroCusto()->getNoCentroCustos() : '';
                            $rep = ($res->getCoRepresentacao())
                                ? $res->getCoRepresentacao()->getNoRepresentacao() : '';
                            $cpBaixa = '';
                            if ($res->getStPagamento() != StatusPagamentoFCEnum::PAGO) {
                                $cpBaixa = '<label class="divCheck">
                                          <input type="checkbox" class="bx-lanc"
                                               value="' . $res->getCoFluxoCaixa() . '" id="' . CO_FLUXO_CAIXA .
                                    $res->getCoFluxoCaixa() . '" name="' . CO_FLUXO_CAIXA . '[' .
                                    $res->getCoFluxoCaixa() . ']"/>
                                          <span class="checkmark"></span>
                                    </label>';
                            }

                            $grid->setColunas($cpBaixa);
                            $grid->setColunas(TipoFluxoCaixaEnum::$label[$res->getTpFluxo()]);
                            $grid->setColunas($catLanc);
                            $grid->setColunas(Valida::DataShow($res->getDtCadastro()));
                            $grid->setColunas($dtVenc);
                            $grid->setColunas($dtReal);
                            $grid->setColunas($labelStPg .
                                StatusPagamentoFCEnum::getDescricaoValor($res->getStPagamento()));
                            $grid->setColunas($val);
                            $grid->setColunas($valPg);
                            $grid->setColunas(TipoPagamentoEnum::getDescricaoValor($res->getTpPagamento()));
                            $grid->setColunas($res->getCoContaBancaria()->getNoBanco());
                            $grid->setColunas($centro);
                            $grid->setColunas($rep);
                            $grid->setColunas($res->getCoUsuario()->getCoPessoa()->getNoPessoa());
                            $grid->setColunas($acao, 2);
                            $grid->criaLinha($res->getCoFluxoCaixa());
                        endforeach;
                        $grid->finalizaGrid();
                        ?>
                    </div>
                </div>
                <!-- end: DYNAMIC TABLE PANEL -->
                <?php include_once 'CadastroCategoriaFC.View.php' ?>
                <?php include_once 'EstruturaCategoriaFC.View.php' ?>
                <?php include_once 'CadastroContaBancaria.View.php' ?>
                <?php include_once 'TransferenciaSaldo.View.php' ?>
                <?php include_once 'CadastroRepresentacao.View.php' ?>
                <?php include_once 'CadastroCentroCusto.View.php' ?>
                <?php include_once 'LancamentoEntrada.View.php' ?>
                <?php include_once 'LancamentoSaida.View.php' ?>
                <?php include_once 'Pesquisa.View.php' ?>
                <?php include_once 'Baixa.View.php' ?>
            </div>
        </div>
        <!-- end: PAGE CONTENT-->
    </div>
</div>
<!-- end: PAGE -->
