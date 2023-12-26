<link rel="stylesheet" href="<?= PASTA_LIBRARY; ?>css/TableFluxoCaixa.css">
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Comparador de Períodos</h3>
                <form action="" enctype="multipart/form-data" id="pesquisaFC"
                      style="display: inline;" method="post">

                    <label for="periodoA1">Período A</label>
                    <input type="text" class="form-control periodo" id="periodoA1" name="periodoA1"
                        value="<?= $condicoes["A"]["periodoInicio"]; ?>"/>
                    à
                    <input type="text" class="form-control periodo" id="periodoA2" name="periodoA2"
                           value="<?= $condicoes["A"]["periodoFinal"]; ?>"/>

                    <label for="periodoB1">Período B</label>
                    <input type="text" class="form-control periodo" id="periodoB1" name="periodoB1"
                           value="<?= $condicoes["B"]["periodoInicio"]; ?>"/>
                    à
                    <input type="text" class="form-control periodo" id="periodoB2" name="periodoB2"
                           value="<?= $condicoes["B"]["periodoFinal"]; ?>"/>

                    <label for="<?= CO_CENTRO_CUSTO; ?>">
                        Centro de Custo:
                    </label>
                    <select id="<?= CO_CENTRO_CUSTO; ?>" name="<?= CO_CENTRO_CUSTO; ?>"
                            class="form-control search-select multipla select2-offscreen" tabindex="-1"
                            style="width: 300px">
                        <?php
                        $comboCentros = CentroCustoService::CentroCustoCombo();
                        foreach ($comboCentros as $coCentro => $centro) {
                            ?>
                            <option value="<?= $coCentro; ?>"
                                <?= ($condicoes["B"][CO_CENTRO_CUSTO] == $coCentro) ? 'selected' : ''; ?>>
                                <?= $centro; ?></option>
                            <?php
                        } ?>
                    </select>
                    <button class="btn btn-success btn-pesquisa tooltips"
                            data-original-title="Pesquisar Lançamentos" data-placement="top">
                        <i class="clip-search-3"></i>
                    </button>
                </form>

                <?php
                Modal::load();
                ?>
                <div class="panel panel-default" style="padding: 10px; margin-top: 10px">
                    <div class="grid-container">
                        <div class="grid" id="TableFluxoCaixa">
                            <div class="grid-col grid-col--fixed-left">
                                <div class="grid-item grid-item--header catPai">
                                    <p>Categorias \ Período</p>
                                </div>
                                <div class="grid-item catPai linha12" data-hover="linha12">
                                    <p>LUCRO LÍQUIDO (LO)</p>
                                </div>
                                <div class="grid-item catPai linha1" data-hover="linha1">
                                    <p><i class="fa fa-caret-right acao" title="Expandir"></i> 1 - RECEITA / FATURAMENTO
                                    </p>
                                </div>
                                <div class="filhas1" style="display: none;">
                                    <?php
                                    if (!empty($dadosFN[1]['filhas'])) {
                                        foreach ($dadosFN[1]['filhas'] as $nu_codigo => $filha) {
                                            echo ' <div class="grid-item catFilha linhaf1-' . $nu_codigo . '" 
                                        data-hover="linhaf1-' . $nu_codigo . '">
                                                    <p><i class="fa fa-caret-right acao" title="Expandir"></i> ' . $filha["no_filha"] . '</p>
                                                </div>'; ?>
                                            <div class="filhasf1-<?= $nu_codigo; ?>" style="display: none;">
                                                <?php
                                                if (!empty($filha['netas'])) {
                                                    foreach ($filha['netas'] as $nu_codigo_n => $neta) {
                                                        echo ' <div class="grid-item catNeta linhan1-' . $nu_codigo_n . '" 
                                        data-hover="linhan1-' . $nu_codigo_n . '">
                                                    <p>' . $neta["no_neta"] . '</p>
                                                </div>';
                                                    }
                                                } ?>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="grid-item catPai linha2" data-hover="linha2">
                                    <p><i class="fa fa-caret-right acao" title="Expandir"></i> 2 - DESPESAS DIRETAS (cv)
                                    </p>
                                </div>
                                <div class="filhas2" style="display: none;">
                                    <?php
                                    if (!empty($dadosFN[2]['filhas'])) {
                                        foreach ($dadosFN[2]['filhas'] as $nu_codigo => $filha) {
                                            echo ' <div class="grid-item catFilha linhaf2-' . $nu_codigo . '" 
                                        data-hover="linhaf2-' . $nu_codigo . '">
                                                    <p><i class="fa fa-caret-right acao" title="Expandir"></i> ' . $filha["no_filha"] . '</p>
                                                </div>'; ?>
                                            <div class="filhasf2-<?= $nu_codigo; ?>" style="display: none;">
                                                <?php
                                                if (!empty($filha['netas'])) {
                                                    foreach ($filha['netas'] as $nu_codigo_n => $neta) {
                                                        echo ' <div class="grid-item catNeta linhan2-' . $nu_codigo_n . '" 
                                        data-hover="linhan2-' . $nu_codigo_n . '">
                                                    <p>' . $neta["no_neta"] . '</p>
                                                </div>';

                                                    }
                                                } ?>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="grid-item catPai linha7" data-hover="linha7">
                                    <p>MARGEM DE CONTRIBUIÇÃO</p>
                                </div>
                                <div class="grid-item catPai linha3" data-hover="linha3">
                                    <p><i class="fa fa-caret-right acao" title="Expandir"></i> 3 - DESPESAS INDIRETAS
                                        (cf)</p>
                                </div>
                                <div class="filhas3" style="display: none;">
                                    <?php
                                    if (!empty($dadosFN[3]['filhas'])) {
                                        foreach ($dadosFN[3]['filhas'] as $nu_codigo => $filha) {
                                            echo ' <div class="grid-item catFilha linhaf3-' . $nu_codigo . '" 
                                        data-hover="linhaf3-' . $nu_codigo . '">
                                                    <p><i class="fa fa-caret-right acao" title="Expandir"></i> ' . $filha["no_filha"] . '</p>
                                                </div>'; ?>
                                            <div class="filhasf3-<?= $nu_codigo; ?>" style="display: none;">
                                                <?php
                                                if (!empty($filha['netas'])) {
                                                    foreach ($filha['netas'] as $nu_codigo_n => $neta) {
                                                        echo ' <div class="grid-item catNeta linhan3-' . $nu_codigo_n . '" 
                                        data-hover="linhan3-' . $nu_codigo_n . '">
                                                    <p>' . $neta["no_neta"] . '</p>
                                                </div>';

                                                    }
                                                } ?>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="grid-item catPai linha8" data-hover="linha8">
                                    <p>LLAI (Antes dos Investimentos)</p>
                                </div>
                                <div class="grid-item catPai linha4" data-hover="linha4">
                                    <p><i class="fa fa-caret-right acao" title="Expandir"></i> 4 - INVESTIMENTOS</p>
                                </div>
                                <div class="filhas4" style="display: none;">
                                    <?php
                                    if (!empty($dadosFN[4]['filhas'])) {
                                        foreach ($dadosFN[4]['filhas'] as $nu_codigo => $filha) {
                                            echo ' <div class="grid-item catFilha linhaf4-' . $nu_codigo . '" 
                                        data-hover="linhaf4-' . $nu_codigo . '">
                                                    <p><i class="fa fa-caret-right acao" title="Expandir"></i> ' . $filha["no_filha"] . '</p>
                                                </div>'; ?>
                                            <div class="filhasf4-<?= $nu_codigo; ?>" style="display: none;">
                                                <?php
                                                if (!empty($filha['netas'])) {
                                                    foreach ($filha['netas'] as $nu_codigo_n => $neta) {
                                                        echo ' <div class="grid-item catNeta linhan4-' . $nu_codigo_n . '" 
                                        data-hover="linhan4-' . $nu_codigo_n . '">
                                                    <p>' . $neta["no_neta"] . '</p>
                                                </div>';

                                                    }
                                                } ?>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="grid-item catPai linha9" data-hover="linha9">
                                    <p>DESPESA LÍQUIDA TOTAL</p>
                                </div>
                                <div class="grid-item catPai linha10" data-hover="linha10">
                                    <p>LUCRO LÍQUIDO (LO)</p>
                                </div>
                                <div class="grid-item catPai linha5" data-hover="linha5">
                                    <p><i class="fa fa-caret-right acao" title="Expandir"></i> 5 - ENTRADAS NÃO
                                        OPERACIONAIS</p>
                                </div>
                                <div class="filhas5" style="display: none;">
                                    <?php
                                    if (!empty($dadosFN[5]['filhas'])) {
                                        foreach ($dadosFN[5]['filhas'] as $nu_codigo => $filha) {
                                            echo ' <div class="grid-item catFilha linhaf5-' . $nu_codigo . '" 
                                        data-hover="linhaf5-' . $nu_codigo . '">
                                                    <p><i class="fa fa-caret-right acao" title="Expandir"></i> ' . $filha["no_filha"] . '</p>
                                                </div>'; ?>
                                            <div class="filhasf5-<?= $nu_codigo; ?>" style="display: none;">
                                                <?php
                                                if (!empty($filha['netas'])) {
                                                    foreach ($filha['netas'] as $nu_codigo_n => $neta) {
                                                        echo ' <div class="grid-item catNeta linhan5-' . $nu_codigo_n . '" 
                                        data-hover="linhan5-' . $nu_codigo_n . '">
                                                    <p>' . $neta["no_neta"] . '</p>
                                                </div>';

                                                    }
                                                } ?>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="grid-item catPai linha6" data-hover="linha6">
                                    <p><i class="fa fa-caret-right acao" title="Expandir"></i> 6 - SAÍDAS NÃO
                                        OPERACIONAIS</p>
                                </div>
                                <div class="filhas6" style="display: none;">
                                    <?php
                                    if (!empty($dadosFN[6]['filhas'])) {
                                        foreach ($dadosFN[6]['filhas'] as $nu_codigo => $filha) {
                                            echo ' <div class="grid-item catFilha linhaf6-' . $nu_codigo . '" 
                                        data-hover="linhaf6-' . $nu_codigo . '">
                                                    <p><i class="fa fa-caret-right acao" title="Expandir"></i> ' . $filha["no_filha"] . '</p>
                                                </div>'; ?>
                                            <div class="filhasf6-<?= $nu_codigo; ?>" style="display: none;">
                                                <?php
                                                if (!empty($filha['netas'])) {
                                                    foreach ($filha['netas'] as $nu_codigo_n => $neta) {
                                                        echo ' <div class="grid-item catNeta linhan6-' . $nu_codigo_n . '" 
                                        data-hover="linhan6-' . $nu_codigo_n . '">
                                                    <p>' . $neta["no_neta"] . '</p>
                                                </div>';

                                                    }
                                                } ?>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="grid-item catPai ultimaLinha linha11" data-hover="linha11">
                                    <p>RESULTADO LÍQUIDO</p>
                                </div>
                            </div>

                            <div class="grid-col">
                                <div class="grid-item grid-item--header">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th colspan="4">Período A</th>
                                        </tr>
                                        </thead>
                                        <tr>
                                            <td class="grid-top">Total</td>
                                            <td class="grid-top">Média</td>
                                            <td class="grid-top">AT</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="grid-item" data-hover="linha12">
                                    <table>
                                        <tr>
                                            <td class="linha12"><?php
                                                if (!empty($dadosA[10]['total'])) {
                                                    echo Valida::FormataMoeda($dadosA[10]['total']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha12"><?php
                                                if (!empty($dadosA[10]['media'])) {
                                                    echo Valida::FormataMoeda($dadosA[10]['media']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha12"><?php
                                                if (!empty($dadosA[10]['at'])) {
                                                    echo $dadosA[10]['at'];
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="grid-item" data-hover="linha1">
                                    <table>
                                        <tr>
                                            <td class="linha1"><?php
                                                if (!empty($dadosA[1]['total'])) {
                                                    echo Valida::FormataMoeda($dadosA[1]['total']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha1"><?php
                                                if (!empty($dadosA[1]['media'])) {
                                                    echo Valida::FormataMoeda($dadosA[1]['media']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha1"><?php
                                                if (!empty($dadosA[1]['at'])) {
                                                    echo $dadosA[1]['at'];
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                        </tr>

                                    </table>
                                </div>
                                <?php
                                if (!empty($dadosFN[1]['filhas'])) {
                                    foreach ($dadosFN[1]['filhas'] as $nu_codigo => $filha) {
                                        ?>
                                        <div class="filhas1" style="display: none;">
                                            <div class="grid-item grid-item-filha"
                                                 data-hover="linhaf1-<?= $nu_codigo; ?>">
                                                <table>
                                                    <tr>
                                                        <td class="linhaf1-<?= $nu_codigo; ?>"><?php
                                                            if (!empty(
                                                            $dadosA[1]['filhas'][$nu_codigo]['total'])) {
                                                                echo Valida::FormataMoeda(
                                                                    $dadosA[1]['filhas'][$nu_codigo]['total']);
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                        <td class="linhaf1-<?= $nu_codigo; ?>"><?php
                                                            if (!empty($dadosA[1]['filhas'][$nu_codigo]['media'])) {
                                                                echo Valida::FormataMoeda($dadosA[1]['filhas'][$nu_codigo]['media']);
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                        <td class="linhaf1-<?= $nu_codigo; ?>"><?php
                                                            if (!empty($dadosA[1]['filhas'][$nu_codigo]['at'])) {
                                                                echo $dadosA[1]['filhas'][$nu_codigo]['at'];
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <?php
                                            if (!empty($filha['netas'])) {
                                                $dadosNeta = [];
                                                if (!empty($dadosA[1]['filhas'][$nu_codigo]['netas']))
                                                    $dadosNeta = $dadosA[1]['filhas'][$nu_codigo]['netas'];
                                                foreach ($filha['netas'] as $nu_codigo_n => $neta) { ?>
                                                    <div class="filhasf1-<?= $nu_codigo; ?>" style="display: none;">
                                                        <div class="grid-item grid-item-neta"
                                                             data-hover="linhan1-<?= $nu_codigo_n; ?>">
                                                            <table>
                                                                <tr>
                                                                    <td class="linhan1-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNeta[$nu_codigo_n]['total'])) {
                                                                            echo Valida::FormataMoeda(
                                                                                $dadosNeta[$nu_codigo_n]['total']);
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                    <td class="linhan1-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNeta[$nu_codigo_n]['media'])) {
                                                                            echo Valida::FormataMoeda(
                                                                                $dadosNeta[$nu_codigo_n]['media']);
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                    <td class="linhan1-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNeta[$nu_codigo_n]['at'])) {
                                                                            echo $dadosNeta[$nu_codigo_n]['at'];
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                <?php }
                                            } ?>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                                <div class="grid-item" data-hover="linha2">
                                    <table>
                                        <tr>
                                            <td class="linha2"><?php
                                                if (!empty($dadosA[2]['total'])) {
                                                    echo Valida::FormataMoeda($dadosA[2]['total']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha2"><?php
                                                if (!empty($dadosA[2]['media'])) {
                                                    echo Valida::FormataMoeda($dadosA[2]['media']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha2"><?php
                                                if (!empty($dadosA[2]['at'])) {
                                                    echo $dadosA[2]['at'];
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <?php
                                if (!empty($dadosFN[2]['filhas'])) {
                                    foreach ($dadosFN[2]['filhas'] as $nu_codigo => $filha) {
                                        ?>
                                        <div class="filhas2" style="display: none;">
                                            <div class="grid-item grid-item-filha"
                                                 data-hover="linhaf2-<?= $nu_codigo; ?>">
                                                <table>
                                                    <tr>
                                                        <td class="linhaf2-<?= $nu_codigo; ?>"><?php
                                                            if (!empty(
                                                            $dadosA[2]['filhas'][$nu_codigo]['total'])) {
                                                                echo Valida::FormataMoeda(
                                                                    $dadosA[2]['filhas'][$nu_codigo]['total']);
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                        <td class="linhaf2-<?= $nu_codigo; ?>"><?php
                                                            if (!empty($dadosA[2]['filhas'][$nu_codigo]['media'])) {
                                                                echo Valida::FormataMoeda($dadosA[2]['filhas'][$nu_codigo]['media']);
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                        <td class="linhaf2-<?= $nu_codigo; ?>"><?php
                                                            if (!empty($dadosA[2]['filhas'][$nu_codigo]['at'])) {
                                                                echo $dadosA[2]['filhas'][$nu_codigo]['at'];
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                    </tr>
                                                </table>
                                            </div>

                                            <?php
                                            if (!empty($filha['netas'])) {
                                                $dadosNeta = [];
                                                if (!empty($dadosA[2]['filhas'][$nu_codigo]['netas']))
                                                    $dadosNeta = $dadosA[2]['filhas'][$nu_codigo]['netas'];
                                                foreach ($filha['netas'] as $nu_codigo_n => $neta) { ?>
                                                    <div class="filhasf2-<?= $nu_codigo; ?>" style="display: none;">
                                                        <div class="grid-item grid-item-neta"
                                                             data-hover="linhan2-<?= $nu_codigo_n; ?>">
                                                            <table>
                                                                <tr>
                                                                    <td class="linhan2-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNeta[$nu_codigo_n]['total'])) {
                                                                            echo Valida::FormataMoeda(
                                                                                $dadosNeta[$nu_codigo_n]['total']);
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                    <td class="linhan2-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNeta[$nu_codigo_n]['media'])) {
                                                                            echo Valida::FormataMoeda(
                                                                                $dadosNeta[$nu_codigo_n]['media']);
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                    <td class="linhan2-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNeta[$nu_codigo_n]['at'])) {
                                                                            echo $dadosNeta[$nu_codigo_n]['at'];
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                <?php }
                                            } ?>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                                <div class="grid-item" data-hover="linha7">
                                    <table>

                                        <tr>
                                            <td class="linha7"><?php
                                                if (!empty($dadosA[7]['total'])) {
                                                    echo Valida::FormataMoeda($dadosA[7]['total']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha7"><?php
                                                if (!empty($dadosA[7]['media'])) {
                                                    echo Valida::FormataMoeda($dadosA[7]['media']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha7"><?php
                                                if (!empty($dadosA[7]['at'])) {
                                                    echo $dadosA[7]['at'];
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                        </tr>

                                    </table>
                                </div>
                                <div class="grid-item" data-hover="linha3">
                                    <table>

                                        <tr>
                                            <td class="linha3"><?php
                                                if (!empty($dadosA[3]['total'])) {
                                                    echo Valida::FormataMoeda($dadosA[3]['total']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha3"><?php
                                                if (!empty($dadosA[3]['media'])) {
                                                    echo Valida::FormataMoeda($dadosA[3]['media']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha3"><?php
                                                if (!empty($dadosA[3]['at'])) {
                                                    echo $dadosA[3]['at'];
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                        </tr>

                                    </table>
                                </div>
                                <?php
                                if (!empty($dadosFN[3]['filhas'])) {
                                    foreach ($dadosFN[3]['filhas'] as $nu_codigo => $filha) {
                                        ?>
                                        <div class="filhas3" style="display: none;">
                                            <div class="grid-item grid-item-filha"
                                                 data-hover="linhaf3-<?= $nu_codigo; ?>">
                                                <table>
                                                    <tr>
                                                        <td class="linhaf3-<?= $nu_codigo; ?>"><?php
                                                            if (!empty(
                                                            $dadosA[3]['filhas'][$nu_codigo]['total'])) {
                                                                echo Valida::FormataMoeda(
                                                                    $dadosA[3]['filhas'][$nu_codigo]['total']);
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                        <td class="linhaf3-<?= $nu_codigo; ?>"><?php
                                                            if (!empty($dadosA[3]['filhas'][$nu_codigo]['media'])) {
                                                                echo Valida::FormataMoeda($dadosA[3]['filhas'][$nu_codigo]['media']);
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                        <td class="linhaf3-<?= $nu_codigo; ?>"><?php
                                                            if (!empty($dadosA[3]['filhas'][$nu_codigo]['at'])) {
                                                                echo $dadosA[3]['filhas'][$nu_codigo]['at'];
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <?php
                                            if (!empty($filha['netas'])) {
                                                $dadosNeta = [];
                                                if (!empty($dadosA[3]['filhas'][$nu_codigo]['netas']))
                                                    $dadosNeta = $dadosA[3]['filhas'][$nu_codigo]['netas'];
                                                foreach ($filha['netas'] as $nu_codigo_n => $neta) { ?>
                                                    <div class="filhasf3-<?= $nu_codigo; ?>" style="display: none;">
                                                        <div class="grid-item grid-item-neta"
                                                             data-hover="linhan3-<?= $nu_codigo_n; ?>">
                                                            <table>
                                                                <tr>
                                                                    <td class="linhan3-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNeta[$nu_codigo_n]['total'])) {
                                                                            echo Valida::FormataMoeda(
                                                                                $dadosNeta[$nu_codigo_n]['total']);
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                    <td class="linhan3-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNeta[$nu_codigo_n]['media'])) {
                                                                            echo Valida::FormataMoeda(
                                                                                $dadosNeta[$nu_codigo_n]['media']);
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                    <td class="linhan3-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNeta[$nu_codigo_n]['at'])) {
                                                                            echo $dadosNeta[$nu_codigo_n]['at'];
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                <?php }
                                            } ?>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                                <div class="grid-item" data-hover="linha8">
                                    <table>
                                        <tr>
                                            <td class="linha8"><?php
                                                if (!empty($dadosA[8]['total'])) {
                                                    echo Valida::FormataMoeda($dadosA[8]['total']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha8"><?php
                                                if (!empty($dadosA[8]['media'])) {
                                                    echo Valida::FormataMoeda($dadosA[8]['media']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha8"><?php
                                                if (!empty($dadosA[8]['at'])) {
                                                    echo $dadosA[8]['at'];
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                        </tr>

                                    </table>
                                </div>
                                <div class="grid-item" data-hover="linha4">
                                    <table>
                                        <tr>
                                            <td class="linha4"><?php
                                                if (!empty($dadosA[4]['total'])) {
                                                    echo Valida::FormataMoeda($dadosA[4]['total']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha4"><?php
                                                if (!empty($dadosA[4]['media'])) {
                                                    echo Valida::FormataMoeda($dadosA[4]['media']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha4"><?php
                                                if (!empty($dadosA[4]['at'])) {
                                                    echo $dadosA[4]['at'];
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <?php
                                if (!empty($dadosFN[4]['filhas'])) {
                                    foreach ($dadosFN[4]['filhas'] as $nu_codigo => $filha) {
                                        ?>
                                        <div class="filhas4" style="display: none;">
                                            <div class="grid-item grid-item-filha"
                                                 data-hover="linhaf4-<?= $nu_codigo; ?>">
                                                <table>
                                                    <tr>
                                                        <td class="linhaf4-<?= $nu_codigo; ?>"><?php
                                                            if (!empty(
                                                            $dadosA[4]['filhas'][$nu_codigo]['total'])) {
                                                                echo Valida::FormataMoeda(
                                                                    $dadosA[4]['filhas'][$nu_codigo]['total']);
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                        <td class="linhaf4-<?= $nu_codigo; ?>"><?php
                                                            if (!empty($dadosA[4]['filhas'][$nu_codigo]['media'])) {
                                                                echo Valida::FormataMoeda($dadosA[4]['filhas'][$nu_codigo]['media']);
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                        <td class="linhaf4-<?= $nu_codigo; ?>"><?php
                                                            if (!empty($dadosA[4]['filhas'][$nu_codigo]['at'])) {
                                                                echo $dadosA[4]['filhas'][$nu_codigo]['at'];
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <?php
                                            if (!empty($filha['netas'])) {
                                                $dadosNeta = [];
                                                if (!empty($dadosA[4]['filhas'][$nu_codigo]['netas']))
                                                    $dadosNeta = $dadosA[4]['filhas'][$nu_codigo]['netas'];
                                                foreach ($filha['netas'] as $nu_codigo_n => $neta) { ?>
                                                    <div class="filhasf4-<?= $nu_codigo; ?>" style="display: none;">
                                                        <div class="grid-item grid-item-neta"
                                                             data-hover="linhan4-<?= $nu_codigo_n; ?>">
                                                            <table>
                                                                <tr>
                                                                    <td class="linhan4-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNeta[$nu_codigo_n]['total'])) {
                                                                            echo Valida::FormataMoeda(
                                                                                $dadosNeta[$nu_codigo_n]['total']);
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                    <td class="linhan4-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNeta[$nu_codigo_n]['media'])) {
                                                                            echo Valida::FormataMoeda(
                                                                                $dadosNeta[$nu_codigo_n]['media']);
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                    <td class="linhan4-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNeta[$nu_codigo_n]['at'])) {
                                                                            echo $dadosNeta[$nu_codigo_n]['at'];
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                <?php }
                                            } ?>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                                <div class="grid-item" data-hover="linha9">
                                    <table>
                                        <tr>
                                            <td class="linha9"><?php
                                                if (!empty($dadosA[9]['total'])) {
                                                    echo Valida::FormataMoeda($dadosA[9]['total']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha9"><?php
                                                if (!empty($dadosA[9]['media'])) {
                                                    echo Valida::FormataMoeda($dadosA[9]['media']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha9"><?php
                                                if (!empty($dadosA[9]['at'])) {
                                                    echo $dadosA[9]['at'];
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="grid-item" data-hover="linha10">
                                    <table>

                                        <tr>
                                            <td class="linha10"><?php
                                                if (!empty($dadosA[10]['total'])) {
                                                    echo Valida::FormataMoeda($dadosA[10]['total']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha10"><?php
                                                if (!empty($dadosA[10]['media'])) {
                                                    echo Valida::FormataMoeda($dadosA[10]['media']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha10"><?php
                                                if (!empty($dadosA[10]['at'])) {
                                                    echo $dadosA[10]['at'];
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                        </tr>

                                    </table>
                                </div>
                                <div class="grid-item" data-hover="linha5">
                                    <table>

                                        <tr>
                                            <td class="linha5"><?php
                                                if (!empty($dadosA[5]['total'])) {
                                                    echo Valida::FormataMoeda($dadosA[5]['total']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha5"><?php
                                                if (!empty($dadosA[5]['media'])) {
                                                    echo Valida::FormataMoeda($dadosA[5]['media']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha5"><?php
                                                if (!empty($dadosA[5]['at'])) {
                                                    echo $dadosA[5]['at'];
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                        </tr>

                                    </table>
                                </div><?php
                                if (!empty($dadosFN[5]['filhas'])) {
                                    foreach ($dadosFN[5]['filhas'] as $nu_codigo => $filha) {
                                        ?>
                                        <div class="filhas5" style="display: none;">
                                            <div class="grid-item grid-item-filha"
                                                 data-hover="linhaf5-<?= $nu_codigo; ?>">
                                                <table>
                                                    <tr>
                                                        <td class="linhaf5-<?= $nu_codigo; ?>"><?php
                                                            if (!empty(
                                                            $dadosA[5]['filhas'][$nu_codigo]['total'])) {
                                                                echo Valida::FormataMoeda(
                                                                    $dadosA[5]['filhas'][$nu_codigo]['total']);
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                        <td class="linhaf5-<?= $nu_codigo; ?>"><?php
                                                            if (!empty($dadosA[5]['filhas'][$nu_codigo]['media'])) {
                                                                echo Valida::FormataMoeda($dadosA[5]['filhas'][$nu_codigo]['media']);
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                        <td class="linhaf5-<?= $nu_codigo; ?>"><?php
                                                            if (!empty($dadosA[5]['filhas'][$nu_codigo]['at'])) {
                                                                echo $dadosA[5]['filhas'][$nu_codigo]['at'];
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                    </tr>
                                                </table>
                                            </div>


                                            <?php
                                            if (!empty($filha['netas'])) {
                                                $dadosNeta = [];
                                                if (!empty($dadosA[5]['filhas'][$nu_codigo]['netas']))
                                                    $dadosNeta = $dadosA[5]['filhas'][$nu_codigo]['netas'];
                                                foreach ($filha['netas'] as $nu_codigo_n => $neta) { ?>
                                                    <div class="filhasf5-<?= $nu_codigo; ?>" style="display: none;">
                                                        <div class="grid-item grid-item-neta"
                                                             data-hover="linhan5-<?= $nu_codigo_n; ?>">
                                                            <table>
                                                                <tr>
                                                                    <td class="linhan5-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNeta[$nu_codigo_n]['total'])) {
                                                                            echo Valida::FormataMoeda(
                                                                                $dadosNeta[$nu_codigo_n]['total']);
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                    <td class="linhan5-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNeta[$nu_codigo_n]['media'])) {
                                                                            echo Valida::FormataMoeda(
                                                                                $dadosNeta[$nu_codigo_n]['media']);
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                    <td class="linhan5-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNeta[$nu_codigo_n]['at'])) {
                                                                            echo $dadosNeta[$nu_codigo_n]['at'];
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                <?php }
                                            } ?>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                                <div class="grid-item" data-hover="linha6">
                                    <table>

                                        <tr>
                                            <td class="linha6"><?php
                                                if (!empty($dadosA[6]['total'])) {
                                                    echo Valida::FormataMoeda($dadosA[6]['total']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha6"><?php
                                                if (!empty($dadosA[6]['media'])) {
                                                    echo Valida::FormataMoeda($dadosA[6]['media']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha6"><?php
                                                if (!empty($dadosA[6]['at'])) {
                                                    echo $dadosA[6]['at'];
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                        </tr>

                                    </table>
                                </div><?php
                                if (!empty($dadosFN[6]['filhas'])) {
                                    foreach ($dadosFN[6]['filhas'] as $nu_codigo => $filha) {
                                        ?>
                                        <div class="filhas6" style="display: none;">
                                            <div class="grid-item grid-item-filha"
                                                 data-hover="linhaf6-<?= $nu_codigo; ?>">
                                                <table>
                                                    <tr>
                                                        <td class="linhaf6-<?= $nu_codigo; ?>"><?php
                                                            if (!empty(
                                                            $dadosA[6]['filhas'][$nu_codigo]['total'])) {
                                                                echo Valida::FormataMoeda(
                                                                    $dadosA[6]['filhas'][$nu_codigo]['total']);
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                        <td class="linhaf6-<?= $nu_codigo; ?>"><?php
                                                            if (!empty($dadosA[6]['filhas'][$nu_codigo]['media'])) {
                                                                echo Valida::FormataMoeda($dadosA[6]['filhas'][$nu_codigo]['media']);
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                        <td class="linhaf6-<?= $nu_codigo; ?>"><?php
                                                            if (!empty($dadosA[6]['filhas'][$nu_codigo]['at'])) {
                                                                echo $dadosA[6]['filhas'][$nu_codigo]['at'];
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                    </tr>
                                                </table>
                                            </div>


                                            <?php
                                            if (!empty($filha['netas'])) {
                                                $dadosNeta = [];
                                                if (!empty($dadosA[6]['filhas'][$nu_codigo]['netas']))
                                                    $dadosNeta = $dadosA[6]['filhas'][$nu_codigo]['netas'];
                                                foreach ($filha['netas'] as $nu_codigo_n => $neta) { ?>
                                                    <div class="filhasf6-<?= $nu_codigo; ?>" style="display: none;">
                                                        <div class="grid-item grid-item-neta"
                                                             data-hover="linhan6-<?= $nu_codigo_n; ?>">
                                                            <table>
                                                                <tr>
                                                                    <td class="linhan6-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNeta[$nu_codigo_n]['total'])) {
                                                                            echo Valida::FormataMoeda(
                                                                                $dadosNeta[$nu_codigo_n]['total']);
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                    <td class="linhan6-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNeta[$nu_codigo_n]['media'])) {
                                                                            echo Valida::FormataMoeda(
                                                                                $dadosNeta[$nu_codigo_n]['media']);
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                    <td class="linhan6-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNeta[$nu_codigo_n]['at'])) {
                                                                            echo $dadosNeta[$nu_codigo_n]['at'];
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                <?php }
                                            } ?>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                                <div class="grid-item ultimaLinha" data-hover="linha11">
                                    <table>

                                        <tr>
                                            <td class="linha11"><?php
                                                if (!empty($dadosA[11]['total'])) {
                                                    echo Valida::FormataMoeda($dadosA[11]['total']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha11"><?php
                                                if (!empty($dadosA[11]['media'])) {
                                                    echo Valida::FormataMoeda($dadosA[11]['media']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha11"><?php
                                                if (!empty($dadosA[11]['at'])) {
                                                    echo $dadosA[11]['at'];
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                            <div class="grid-col segundo-periodo">
                                <div class="grid-item grid-item--header">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th colspan="4">Período B</th>
                                        </tr>
                                        </thead>
                                        <tr>
                                            <td class="grid-top">Total</td>
                                            <td class="grid-top">Média</td>
                                            <td class="grid-top">AT</td>
                                            <td class="grid-top">AC</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="grid-item" data-hover="linha12">
                                    <table>
                                        <tr>
                                            <td class="linha12"><?php
                                                if (!empty($dadosB[10]['total'])) {
                                                    echo Valida::FormataMoeda($dadosB[10]['total']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha12"><?php
                                                if (!empty($dadosB[10]['media'])) {
                                                    echo Valida::FormataMoeda($dadosB[10]['media']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha12"><?php
                                                if (!empty($dadosB[10]['at'])) {
                                                    echo $dadosB[10]['at'];
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha12"><?php
                                                if (!empty($dadosB[10]['ac'])) {
                                                    echo $dadosB[10]['ac'];
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="grid-item" data-hover="linha1">
                                    <table>
                                        <tr>
                                            <td class="linha1"><?php
                                                if (!empty($dadosB[1]['total'])) {
                                                    echo Valida::FormataMoeda($dadosB[1]['total']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha1"><?php
                                                if (!empty($dadosB[1]['media'])) {
                                                    echo Valida::FormataMoeda($dadosB[1]['media']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha1"><?php
                                                if (!empty($dadosB[1]['at'])) {
                                                    echo $dadosB[1]['at'];
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha1"><?php
                                                if (!empty($dadosB[1]['ac'])) {
                                                    echo $dadosB[1]['ac'];
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                        </tr>

                                    </table>
                                </div>
                                <?php
                                if (!empty($dadosFN[1]['filhas'])) {
                                    foreach ($dadosFN[1]['filhas'] as $nu_codigo => $filha) {
                                        ?>
                                        <div class="filhas1" style="display: none;">
                                            <div class="grid-item grid-item-filha"
                                                 data-hover="linhaf1-<?= $nu_codigo; ?>">
                                                <table>
                                                    <tr>
                                                        <td class="linhaf1-<?= $nu_codigo; ?>"><?php
                                                            if (!empty(
                                                            $dadosB[1]['filhas'][$nu_codigo]['total'])) {
                                                                echo Valida::FormataMoeda(
                                                                    $dadosB[1]['filhas'][$nu_codigo]['total']);
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                        <td class="linhaf1-<?= $nu_codigo; ?>"><?php
                                                            if (!empty($dadosB[1]['filhas'][$nu_codigo]['media'])) {
                                                                echo Valida::FormataMoeda($dadosB[1]['filhas'][$nu_codigo]['media']);
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                        <td class="linhaf1-<?= $nu_codigo; ?>"><?php
                                                            if (!empty($dadosB[1]['filhas'][$nu_codigo]['at'])) {
                                                                echo $dadosB[1]['filhas'][$nu_codigo]['at'];
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                        <td class="linhaf1-<?= $nu_codigo; ?>"><?php
                                                            if (!empty($dadosB[1]['filhas'][$nu_codigo]['ac'])) {
                                                                echo $dadosB[1]['filhas'][$nu_codigo]['ac'];
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <?php
                                            if (!empty($filha['netas'])) {
                                                $dadosNeta = [];
                                                if (!empty($dadosB[1]['filhas'][$nu_codigo]['netas']))
                                                    $dadosNeta = $dadosB[1]['filhas'][$nu_codigo]['netas'];
                                                foreach ($filha['netas'] as $nu_codigo_n => $neta) { ?>
                                                    <div class="filhasf1-<?= $nu_codigo; ?>" style="display: none;">
                                                        <div class="grid-item grid-item-neta"
                                                             data-hover="linhan1-<?= $nu_codigo_n; ?>">
                                                            <table>
                                                                <tr>
                                                                    <td class="linhan1-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNeta[$nu_codigo_n]['total'])) {
                                                                            echo Valida::FormataMoeda(
                                                                                $dadosNeta[$nu_codigo_n]['total']);
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                    <td class="linhan1-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNeta[$nu_codigo_n]['media'])) {
                                                                            echo Valida::FormataMoeda(
                                                                                $dadosNeta[$nu_codigo_n]['media']);
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                    <td class="linhan1-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNeta[$nu_codigo_n]['at'])) {
                                                                            echo $dadosNeta[$nu_codigo_n]['at'];
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                    <td class="linhan1-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNeta[$nu_codigo_n]['ac'])) {
                                                                            echo $dadosNeta[$nu_codigo_n]['ac'];
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                <?php }
                                            } ?>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                                <div class="grid-item" data-hover="linha2">
                                    <table>
                                        <tr>
                                            <td class="linha2"><?php
                                                if (!empty($dadosB[2]['total'])) {
                                                    echo Valida::FormataMoeda($dadosB[2]['total']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha2"><?php
                                                if (!empty($dadosB[2]['media'])) {
                                                    echo Valida::FormataMoeda($dadosB[2]['media']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha2"><?php
                                                if (!empty($dadosB[2]['at'])) {
                                                    echo $dadosB[2]['at'];
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha2"><?php
                                                if (!empty($dadosB[2]['ac'])) {
                                                    echo $dadosB[2]['ac'];
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <?php
                                if (!empty($dadosFN[2]['filhas'])) {
                                    foreach ($dadosFN[2]['filhas'] as $nu_codigo => $filha) {
                                        ?>
                                        <div class="filhas2" style="display: none;">
                                            <div class="grid-item grid-item-filha"
                                                 data-hover="linhaf2-<?= $nu_codigo; ?>">
                                                <table>
                                                    <tr>
                                                        <td class="linhaf2-<?= $nu_codigo; ?>"><?php
                                                            if (!empty(
                                                            $dadosB[2]['filhas'][$nu_codigo]['total'])) {
                                                                echo Valida::FormataMoeda(
                                                                    $dadosB[2]['filhas'][$nu_codigo]['total']);
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                        <td class="linhaf2-<?= $nu_codigo; ?>"><?php
                                                            if (!empty($dadosB[2]['filhas'][$nu_codigo]['media'])) {
                                                                echo Valida::FormataMoeda($dadosB[2]['filhas'][$nu_codigo]['media']);
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                        <td class="linhaf2-<?= $nu_codigo; ?>"><?php
                                                            if (!empty($dadosB[2]['filhas'][$nu_codigo]['at'])) {
                                                                echo $dadosB[2]['filhas'][$nu_codigo]['at'];
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                        <td class="linhaf2-<?= $nu_codigo; ?>"><?php
                                                            if (!empty($dadosB[2]['filhas'][$nu_codigo]['ac'])) {
                                                                echo $dadosB[2]['filhas'][$nu_codigo]['ac'];
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                    </tr>
                                                </table>
                                            </div>

                                            <?php
                                            if (!empty($filha['netas'])) {
                                                $dadosNeta = [];
                                                if (!empty($dadosB[2]['filhas'][$nu_codigo]['netas']))
                                                    $dadosNeta = $dadosB[2]['filhas'][$nu_codigo]['netas'];
                                                foreach ($filha['netas'] as $nu_codigo_n => $neta) { ?>
                                                    <div class="filhasf2-<?= $nu_codigo; ?>" style="display: none;">
                                                        <div class="grid-item grid-item-neta"
                                                             data-hover="linhan2-<?= $nu_codigo_n; ?>">
                                                            <table>
                                                                <tr>
                                                                    <td class="linhan2-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNeta[$nu_codigo_n]['total'])) {
                                                                            echo Valida::FormataMoeda(
                                                                                $dadosNeta[$nu_codigo_n]['total']);
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                    <td class="linhan2-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNeta[$nu_codigo_n]['media'])) {
                                                                            echo Valida::FormataMoeda(
                                                                                $dadosNeta[$nu_codigo_n]['media']);
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                    <td class="linhan2-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNeta[$nu_codigo_n]['at'])) {
                                                                            echo $dadosNeta[$nu_codigo_n]['at'];
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                    <td class="linhan2-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNeta[$nu_codigo_n]['ac'])) {
                                                                            echo $dadosNeta[$nu_codigo_n]['ac'];
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                <?php }
                                            } ?>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                                <div class="grid-item" data-hover="linha7">
                                    <table>

                                        <tr>
                                            <td class="linha7"><?php
                                                if (!empty($dadosB[7]['total'])) {
                                                    echo Valida::FormataMoeda($dadosB[7]['total']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha7"><?php
                                                if (!empty($dadosB[7]['media'])) {
                                                    echo Valida::FormataMoeda($dadosB[7]['media']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha7"><?php
                                                if (!empty($dadosB[7]['at'])) {
                                                    echo $dadosB[7]['at'];
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha7"><?php
                                                if (!empty($dadosB[7]['ac'])) {
                                                    echo $dadosB[7]['ac'];
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                        </tr>

                                    </table>
                                </div>
                                <div class="grid-item" data-hover="linha3">
                                    <table>

                                        <tr>
                                            <td class="linha3"><?php
                                                if (!empty($dadosB[3]['total'])) {
                                                    echo Valida::FormataMoeda($dadosB[3]['total']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha3"><?php
                                                if (!empty($dadosB[3]['media'])) {
                                                    echo Valida::FormataMoeda($dadosB[3]['media']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha3"><?php
                                                if (!empty($dadosB[3]['at'])) {
                                                    echo $dadosB[3]['at'];
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha3"><?php
                                                if (!empty($dadosB[3]['ac'])) {
                                                    echo $dadosB[3]['ac'];
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                        </tr>

                                    </table>
                                </div>
                                <?php
                                if (!empty($dadosFN[3]['filhas'])) {
                                    foreach ($dadosFN[3]['filhas'] as $nu_codigo => $filha) {
                                        ?>
                                        <div class="filhas3" style="display: none;">
                                            <div class="grid-item grid-item-filha"
                                                 data-hover="linhaf3-<?= $nu_codigo; ?>">
                                                <table>
                                                    <tr>
                                                        <td class="linhaf3-<?= $nu_codigo; ?>"><?php
                                                            if (!empty(
                                                            $dadosB[3]['filhas'][$nu_codigo]['total'])) {
                                                                echo Valida::FormataMoeda(
                                                                    $dadosB[3]['filhas'][$nu_codigo]['total']);
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                        <td class="linhaf3-<?= $nu_codigo; ?>"><?php
                                                            if (!empty($dadosB[3]['filhas'][$nu_codigo]['media'])) {
                                                                echo Valida::FormataMoeda($dadosB[3]['filhas'][$nu_codigo]['media']);
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                        <td class="linhaf3-<?= $nu_codigo; ?>"><?php
                                                            if (!empty($dadosB[3]['filhas'][$nu_codigo]['at'])) {
                                                                echo $dadosB[3]['filhas'][$nu_codigo]['at'];
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                        <td class="linhaf3-<?= $nu_codigo; ?>"><?php
                                                            if (!empty($dadosB[3]['filhas'][$nu_codigo]['ac'])) {
                                                                echo $dadosB[3]['filhas'][$nu_codigo]['ac'];
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <?php
                                            if (!empty($filha['netas'])) {
                                                $dadosNeta = [];
                                                if (!empty($dadosB[3]['filhas'][$nu_codigo]['netas']))
                                                    $dadosNeta = $dadosB[3]['filhas'][$nu_codigo]['netas'];
                                                foreach ($filha['netas'] as $nu_codigo_n => $neta) { ?>
                                                    <div class="filhasf3-<?= $nu_codigo; ?>" style="display: none;">
                                                        <div class="grid-item grid-item-neta"
                                                             data-hover="linhan3-<?= $nu_codigo_n; ?>">
                                                            <table>
                                                                <tr>
                                                                    <td class="linhan3-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNeta[$nu_codigo_n]['total'])) {
                                                                            echo Valida::FormataMoeda(
                                                                                $dadosNeta[$nu_codigo_n]['total']);
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                    <td class="linhan3-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNeta[$nu_codigo_n]['media'])) {
                                                                            echo Valida::FormataMoeda(
                                                                                $dadosNeta[$nu_codigo_n]['media']);
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                    <td class="linhan3-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNeta[$nu_codigo_n]['at'])) {
                                                                            echo $dadosNeta[$nu_codigo_n]['at'];
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                    <td class="linhan3-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNeta[$nu_codigo_n]['ac'])) {
                                                                            echo $dadosNeta[$nu_codigo_n]['ac'];
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                <?php }
                                            } ?>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                                <div class="grid-item" data-hover="linha8">
                                    <table>
                                        <tr>
                                            <td class="linha8"><?php
                                                if (!empty($dadosB[8]['total'])) {
                                                    echo Valida::FormataMoeda($dadosB[8]['total']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha8"><?php
                                                if (!empty($dadosB[8]['media'])) {
                                                    echo Valida::FormataMoeda($dadosB[8]['media']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha8"><?php
                                                if (!empty($dadosB[8]['at'])) {
                                                    echo $dadosB[8]['at'];
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha8"><?php
                                                if (!empty($dadosB[8]['ac'])) {
                                                    echo $dadosB[8]['ac'];
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                        </tr>

                                    </table>
                                </div>
                                <div class="grid-item" data-hover="linha4">
                                    <table>
                                        <tr>
                                            <td class="linha4"><?php
                                                if (!empty($dadosB[4]['total'])) {
                                                    echo Valida::FormataMoeda($dadosB[4]['total']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha4"><?php
                                                if (!empty($dadosB[4]['media'])) {
                                                    echo Valida::FormataMoeda($dadosB[4]['media']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha4"><?php
                                                if (!empty($dadosB[4]['at'])) {
                                                    echo $dadosB[4]['at'];
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha4"><?php
                                                if (!empty($dadosB[4]['ac'])) {
                                                    echo $dadosB[4]['ac'];
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <?php
                                if (!empty($dadosFN[4]['filhas'])) {
                                    foreach ($dadosFN[4]['filhas'] as $nu_codigo => $filha) {
                                        ?>
                                        <div class="filhas4" style="display: none;">
                                            <div class="grid-item grid-item-filha"
                                                 data-hover="linhaf4-<?= $nu_codigo; ?>">
                                                <table>
                                                    <tr>
                                                        <td class="linhaf4-<?= $nu_codigo; ?>"><?php
                                                            if (!empty(
                                                            $dadosB[4]['filhas'][$nu_codigo]['total'])) {
                                                                echo Valida::FormataMoeda(
                                                                    $dadosB[4]['filhas'][$nu_codigo]['total']);
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                        <td class="linhaf4-<?= $nu_codigo; ?>"><?php
                                                            if (!empty($dadosB[4]['filhas'][$nu_codigo]['media'])) {
                                                                echo Valida::FormataMoeda($dadosB[4]['filhas'][$nu_codigo]['media']);
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                        <td class="linhaf4-<?= $nu_codigo; ?>"><?php
                                                            if (!empty($dadosB[4]['filhas'][$nu_codigo]['at'])) {
                                                                echo $dadosB[4]['filhas'][$nu_codigo]['at'];
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                        <td class="linhaf4-<?= $nu_codigo; ?>"><?php
                                                            if (!empty($dadosB[4]['filhas'][$nu_codigo]['ac'])) {
                                                                echo $dadosB[4]['filhas'][$nu_codigo]['ac'];
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <?php
                                            if (!empty($filha['netas'])) {
                                                $dadosNeta = [];
                                                if (!empty($dadosB[4]['filhas'][$nu_codigo]['netas']))
                                                    $dadosNeta = $dadosB[4]['filhas'][$nu_codigo]['netas'];
                                                foreach ($filha['netas'] as $nu_codigo_n => $neta) { ?>
                                                    <div class="filhasf4-<?= $nu_codigo; ?>" style="display: none;">
                                                        <div class="grid-item grid-item-neta"
                                                             data-hover="linhan4-<?= $nu_codigo_n; ?>">
                                                            <table>
                                                                <tr>
                                                                    <td class="linhan4-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNeta[$nu_codigo_n]['total'])) {
                                                                            echo Valida::FormataMoeda(
                                                                                $dadosNeta[$nu_codigo_n]['total']);
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                    <td class="linhan4-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNeta[$nu_codigo_n]['media'])) {
                                                                            echo Valida::FormataMoeda(
                                                                                $dadosNeta[$nu_codigo_n]['media']);
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                    <td class="linhan4-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNeta[$nu_codigo_n]['at'])) {
                                                                            echo $dadosNeta[$nu_codigo_n]['at'];
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                    <td class="linhan4-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNeta[$nu_codigo_n]['ac'])) {
                                                                            echo $dadosNeta[$nu_codigo_n]['ac'];
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                <?php }
                                            } ?>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                                <div class="grid-item" data-hover="linha9">
                                    <table>
                                        <tr>
                                            <td class="linha9"><?php
                                                if (!empty($dadosB[9]['total'])) {
                                                    echo Valida::FormataMoeda($dadosB[9]['total']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha9"><?php
                                                if (!empty($dadosB[9]['media'])) {
                                                    echo Valida::FormataMoeda($dadosB[9]['media']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha9"><?php
                                                if (!empty($dadosB[9]['at'])) {
                                                    echo $dadosB[9]['at'];
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha9"><?php
                                                if (!empty($dadosB[9]['ac'])) {
                                                    echo $dadosB[9]['ac'];
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="grid-item" data-hover="linha10">
                                    <table>

                                        <tr>
                                            <td class="linha10"><?php
                                                if (!empty($dadosB[10]['total'])) {
                                                    echo Valida::FormataMoeda($dadosB[10]['total']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha10"><?php
                                                if (!empty($dadosB[10]['media'])) {
                                                    echo Valida::FormataMoeda($dadosB[10]['media']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha10"><?php
                                                if (!empty($dadosB[10]['at'])) {
                                                    echo $dadosB[10]['at'];
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha10"><?php
                                                if (!empty($dadosB[10]['ac'])) {
                                                    echo $dadosB[10]['ac'];
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                        </tr>

                                    </table>
                                </div>
                                <div class="grid-item" data-hover="linha5">
                                    <table>

                                        <tr>
                                            <td class="linha5"><?php
                                                if (!empty($dadosB[5]['total'])) {
                                                    echo Valida::FormataMoeda($dadosB[5]['total']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha5"><?php
                                                if (!empty($dadosB[5]['media'])) {
                                                    echo Valida::FormataMoeda($dadosB[5]['media']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha5"><?php
                                                if (!empty($dadosB[5]['at'])) {
                                                    echo $dadosB[5]['at'];
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha5"><?php
                                                if (!empty($dadosB[5]['ac'])) {
                                                    echo $dadosB[5]['ac'];
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                        </tr>

                                    </table>
                                </div><?php
                                if (!empty($dadosFN[5]['filhas'])) {
                                    foreach ($dadosFN[5]['filhas'] as $nu_codigo => $filha) {
                                        ?>
                                        <div class="filhas5" style="display: none;">
                                            <div class="grid-item grid-item-filha"
                                                 data-hover="linhaf5-<?= $nu_codigo; ?>">
                                                <table>
                                                    <tr>
                                                        <td class="linhaf5-<?= $nu_codigo; ?>"><?php
                                                            if (!empty(
                                                            $dadosB[5]['filhas'][$nu_codigo]['total'])) {
                                                                echo Valida::FormataMoeda(
                                                                    $dadosB[5]['filhas'][$nu_codigo]['total']);
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                        <td class="linhaf5-<?= $nu_codigo; ?>"><?php
                                                            if (!empty($dadosB[5]['filhas'][$nu_codigo]['media'])) {
                                                                echo Valida::FormataMoeda($dadosB[5]['filhas'][$nu_codigo]['media']);
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                        <td class="linhaf5-<?= $nu_codigo; ?>"><?php
                                                            if (!empty($dadosB[5]['filhas'][$nu_codigo]['at'])) {
                                                                echo $dadosB[5]['filhas'][$nu_codigo]['at'];
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                        <td class="linhaf5-<?= $nu_codigo; ?>"><?php
                                                            if (!empty($dadosB[5]['filhas'][$nu_codigo]['ac'])) {
                                                                echo $dadosB[5]['filhas'][$nu_codigo]['ac'];
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                    </tr>
                                                </table>
                                            </div>


                                            <?php
                                            if (!empty($filha['netas'])) {
                                                $dadosNeta = [];
                                                if (!empty($dadosB[5]['filhas'][$nu_codigo]['netas']))
                                                    $dadosNeta = $dadosB[5]['filhas'][$nu_codigo]['netas'];
                                                foreach ($filha['netas'] as $nu_codigo_n => $neta) { ?>
                                                    <div class="filhasf5-<?= $nu_codigo; ?>" style="display: none;">
                                                        <div class="grid-item grid-item-neta"
                                                             data-hover="linhan5-<?= $nu_codigo_n; ?>">
                                                            <table>
                                                                <tr>
                                                                    <td class="linhan5-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNeta[$nu_codigo_n]['total'])) {
                                                                            echo Valida::FormataMoeda(
                                                                                $dadosNeta[$nu_codigo_n]['total']);
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                    <td class="linhan5-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNeta[$nu_codigo_n]['media'])) {
                                                                            echo Valida::FormataMoeda(
                                                                                $dadosNeta[$nu_codigo_n]['media']);
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                    <td class="linhan5-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNeta[$nu_codigo_n]['at'])) {
                                                                            echo $dadosNeta[$nu_codigo_n]['at'];
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                    <td class="linhan5-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNeta[$nu_codigo_n]['ac'])) {
                                                                            echo $dadosNeta[$nu_codigo_n]['ac'];
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                <?php }
                                            } ?>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                                <div class="grid-item" data-hover="linha6">
                                    <table>

                                        <tr>
                                            <td class="linha6"><?php
                                                if (!empty($dadosB[6]['total'])) {
                                                    echo Valida::FormataMoeda($dadosB[6]['total']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha6"><?php
                                                if (!empty($dadosB[6]['media'])) {
                                                    echo Valida::FormataMoeda($dadosB[6]['media']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha6"><?php
                                                if (!empty($dadosB[6]['at'])) {
                                                    echo $dadosB[6]['at'];
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha6"><?php
                                                if (!empty($dadosB[6]['ac'])) {
                                                    echo $dadosB[6]['ac'];
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                        </tr>

                                    </table>
                                </div><?php
                                if (!empty($dadosFN[6]['filhas'])) {
                                    foreach ($dadosFN[6]['filhas'] as $nu_codigo => $filha) {
                                        ?>
                                        <div class="filhas6" style="display: none;">
                                            <div class="grid-item grid-item-filha"
                                                 data-hover="linhaf6-<?= $nu_codigo; ?>">
                                                <table>
                                                    <tr>
                                                        <td class="linhaf6-<?= $nu_codigo; ?>"><?php
                                                            if (!empty(
                                                            $dadosB[6]['filhas'][$nu_codigo]['total'])) {
                                                                echo Valida::FormataMoeda(
                                                                    $dadosB[6]['filhas'][$nu_codigo]['total']);
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                        <td class="linhaf6-<?= $nu_codigo; ?>"><?php
                                                            if (!empty($dadosB[6]['filhas'][$nu_codigo]['media'])) {
                                                                echo Valida::FormataMoeda($dadosB[6]['filhas'][$nu_codigo]['media']);
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                        <td class="linhaf6-<?= $nu_codigo; ?>"><?php
                                                            if (!empty($dadosB[6]['filhas'][$nu_codigo]['at'])) {
                                                                echo $dadosB[6]['filhas'][$nu_codigo]['at'];
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                        <td class="linhaf6-<?= $nu_codigo; ?>"><?php
                                                            if (!empty($dadosB[6]['filhas'][$nu_codigo]['ac'])) {
                                                                echo $dadosB[6]['filhas'][$nu_codigo]['ac'];
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                    </tr>
                                                </table>
                                            </div>


                                            <?php
                                            if (!empty($filha['netas'])) {
                                                $dadosNeta = [];
                                                if (!empty($dadosB[6]['filhas'][$nu_codigo]['netas']))
                                                    $dadosNeta = $dadosB[6]['filhas'][$nu_codigo]['netas'];
                                                foreach ($filha['netas'] as $nu_codigo_n => $neta) { ?>
                                                    <div class="filhasf6-<?= $nu_codigo; ?>" style="display: none;">
                                                        <div class="grid-item grid-item-neta"
                                                             data-hover="linhan6-<?= $nu_codigo_n; ?>">
                                                            <table>
                                                                <tr>
                                                                    <td class="linhan6-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNeta[$nu_codigo_n]['total'])) {
                                                                            echo Valida::FormataMoeda(
                                                                                $dadosNeta[$nu_codigo_n]['total']);
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                    <td class="linhan6-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNeta[$nu_codigo_n]['media'])) {
                                                                            echo Valida::FormataMoeda(
                                                                                $dadosNeta[$nu_codigo_n]['media']);
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                    <td class="linhan6-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNeta[$nu_codigo_n]['at'])) {
                                                                            echo $dadosNeta[$nu_codigo_n]['at'];
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                    <td class="linhan6-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNeta[$nu_codigo_n]['ac'])) {
                                                                            echo $dadosNeta[$nu_codigo_n]['ac'];
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                <?php }
                                            } ?>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                                <div class="grid-item ultimaLinha" data-hover="linha11">
                                    <table>

                                        <tr>
                                            <td class="linha11"><?php
                                                if (!empty($dadosB[11]['total'])) {
                                                    echo Valida::FormataMoeda($dadosB[11]['total']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha11"><?php
                                                if (!empty($dadosB[11]['media'])) {
                                                    echo Valida::FormataMoeda($dadosB[11]['media']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha11"><?php
                                                if (!empty($dadosB[11]['at'])) {
                                                    echo $dadosB[11]['at'];
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha11"><?php
                                                if (!empty($dadosB[11]['ac'])) {
                                                    echo $dadosB[11]['ac'];
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                        </tr>

                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end: PAGE CONTENT-->
        </div>
    </div>
    <!-- end: PAGE -->