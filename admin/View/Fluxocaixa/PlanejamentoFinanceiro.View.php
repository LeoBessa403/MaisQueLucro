<link rel="stylesheet" href="<?= PASTA_LIBRARY; ?>css/TableFluxoCaixa.css?v=<?= filemtime(
    INCLUDES_LIBRARY . 'css/TableFluxoCaixa.css'); ?>">
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Planejamento Financeiro |
                    <form action="" enctype="multipart/form-data" id="pesquisaFC"
                          style="display: inline;" method="post">
                        <label for=""><small>Ano:</small>
                            <div class="btn-group">
                                <?php Valida::geraBtn('', '',
                                    'btn-primary btn-sm', 'j_menos_ano', 'clip-minus-circle-2'); ?>
                                <?php Valida::geraBtn('<b>' . $condicoes["anoPesquisa"] . '</b>', '',
                                    'btn-default btn-sm', 'ano_pesquisa', ''); ?>
                                <?php Valida::geraBtn('', '',
                                    'btn-primary btn-sm', 'j_mais_ano', 'clip-plus-circle-2'); ?>
                            </div>
                            <input type="hidden" id="anoPesquisa" name="anoPesquisa"
                                   value="<?= $condicoes["anoPesquisa"]; ?>"/>
                        </label>
                        <button class="btn btn-success btn-pesquisa tooltips"
                                data-original-title="Pesquisar Lançamentos" data-placement="top">
                            <i class="clip-search-3"></i>
                        </button>
                    </form>
                </h3>
                <?php
                Modal::load();
                ?>
                <div class="panel panel-default" style="padding: 10px;">
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
                                    if (!empty($dadosFC[1]['filhas'])) {
                                        foreach ($dadosFC[1]['filhas'] as $nu_codigo => $filha) {
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
                                    if (!empty($dadosFC[2]['filhas'])) {
                                        foreach ($dadosFC[2]['filhas'] as $nu_codigo => $filha) {
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
                                    if (!empty($dadosFC[3]['filhas'])) {
                                        foreach ($dadosFC[3]['filhas'] as $nu_codigo => $filha) {
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
                                    if (!empty($dadosFC[4]['filhas'])) {
                                        foreach ($dadosFC[4]['filhas'] as $nu_codigo => $filha) {
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
                                    if (!empty($dadosFC[5]['filhas'])) {
                                        foreach ($dadosFC[5]['filhas'] as $nu_codigo => $filha) {
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
                                    if (!empty($dadosFC[6]['filhas'])) {
                                        foreach ($dadosFC[6]['filhas'] as $nu_codigo => $filha) {
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
                                <div class="grid-item catPai linha11 ultimaLinha" data-hover="linha11">
                                    <p>RESULTADO LÍQUIDO</p>
                                </div>
                            </div>
                            <?php
                            $meses = Valida::getMeses();
                            foreach ($meses as $nuMes => $mes) {
                                $nuMes = ($nuMes < 10) ? '0' . $nuMes : $nuMes;
                                $anomes = date('Y') . $nuMes;
                                ?>
                                <div id="grid-col-<?= $anomes; ?>" class="grid-col">
                                    <div class="grid-item grid-item--header">
                                        <table>
                                            <thead>
                                            <tr>
                                                <th colspan="4"><?= $mes; ?></th>
                                            </tr>
                                            </thead>
                                            <tr>
                                                <td class="grid-top">Planejado</td>
                                                <td class="grid-top">Realizado</td>
                                                <td class="grid-top">AT</td>
                                                <td class="grid-top">AC</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="grid-item" data-hover="linha12">
                                        <table>
                                            <tr>
                                                <td class="linha12"><?php
                                                    $valor = '0';
                                                    if (!empty($dadosFC[$anomes][10]['planejado'])) {
                                                        $valor = Valida::FormataMoeda($dadosFC[$anomes][10]['planejado']);
                                                    }
                                                    ?>
                                                    <input type="text" class="form-control" disabled
                                                           id="vrl-10-<?= $anomes; ?>-2" name="vrl-10-<?= $anomes; ?>"
                                                           value="<?= $valor; ?>">
                                                </td>
                                                <td class="linha12"><?php
                                                    if (!empty($dadosFC[$anomes][10]['realizado'])) {
                                                        echo Valida::FormataMoeda($dadosFC[$anomes][10]['realizado']);
                                                    } else {
                                                        echo '-';
                                                    }
                                                    ?></td>
                                                <td class="linha12"><?php
                                                    if (!empty($dadosFC[$anomes][10]['at'])) {
                                                        echo $dadosFC[$anomes][10]['at'];
                                                    } else {
                                                        echo '-';
                                                    }
                                                    ?></td>
                                                <td class="linha12"><?php
                                                    if (!empty($dadosFC[$anomes][10]['ac'])) {
                                                        echo $dadosFC[$anomes][10]['ac'];
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
                                                    $valor = '0';
                                                    if (!empty($dadosFC[$anomes][1]['planejado'])) {
                                                        $valor = Valida::FormataMoeda($dadosFC[$anomes][1]['planejado']);
                                                    }
                                                    ?>
                                                    <input type="text" class="form-control" disabled
                                                           id="vrl-1-<?= $anomes; ?>" name="vrl-1-<?= $anomes; ?>"
                                                           value="<?= $valor; ?>">
                                                </td>
                                                <td class="linha1"><?php
                                                    if (!empty($dadosFC[$anomes][1]['realizado'])) {
                                                        echo Valida::FormataMoeda($dadosFC[$anomes][1]['realizado']);
                                                    } else {
                                                        echo '-';
                                                    }
                                                    ?></td>
                                                <td class="linha1"><?php
                                                    if (!empty($dadosFC[$anomes][1]['at'])) {
                                                        echo $dadosFC[$anomes][1]['at'];
                                                    } else {
                                                        echo '-';
                                                    }
                                                    ?></td>
                                                <td class="linha1"><?php
                                                    if (!empty($dadosFC[$anomes][1]['ac'])) {
                                                        echo $dadosFC[$anomes][1]['ac'];
                                                    } else {
                                                        echo '-';
                                                    }
                                                    ?></td>
                                            </tr>

                                        </table>
                                    </div>
                                    <?php
                                    if (!empty($dadosFC[1]['filhas'])) {
                                        foreach ($dadosFC[1]['filhas'] as $nu_codigo => $filha) {
                                            ?>
                                            <div class="filhas1" style="display: none;">
                                                <div class="grid-item grid-item-filha"
                                                     data-hover="linhaf1-<?= $nu_codigo; ?>">
                                                    <table>
                                                        <tr>
                                                            <td class="linhaf1-<?= $nu_codigo; ?>"><?php
                                                                $valor = '0';
                                                                if (!empty(
                                                                $dadosFC[$anomes][1]['filhas'][$nu_codigo]['planejado'])) {
                                                                    $valor = Valida::FormataMoeda(
                                                                        $dadosFC[$anomes][1]['filhas'][$nu_codigo]['planejado']);
                                                                }
                                                                ?>
                                                                <input type="text" class="form-control filhas" disabled
                                                                       id="vrl-1-<?= $anomes . '-' . $nu_codigo; ?>"
                                                                       name="vrl-1-<?= $anomes . '-' . $nu_codigo; ?>"
                                                                       value="<?= $valor; ?>"/>
                                                            </td>
                                                            <td class="linhaf1-<?= $nu_codigo; ?>"><?php
                                                                if (!empty($dadosFC[$anomes][1]['filhas'][$nu_codigo]['realizado'])) {
                                                                    echo Valida::FormataMoeda($dadosFC[$anomes][1]['filhas'][$nu_codigo]['realizado']);
                                                                } else {
                                                                    echo '-';
                                                                }
                                                                ?></td>
                                                            <td class="linhaf1-<?= $nu_codigo; ?>"><?php
                                                                if (!empty($dadosFC[$anomes][1]['filhas'][$nu_codigo]['at'])) {
                                                                    echo $dadosFC[$anomes][1]['filhas'][$nu_codigo]['at'];
                                                                } else {
                                                                    echo '-';
                                                                }
                                                                ?></td>
                                                            <td class="linhaf1-<?= $nu_codigo; ?>"><?php
                                                                if (!empty($dadosFC[$anomes][1]['filhas'][$nu_codigo]['ac'])) {
                                                                    echo $dadosFC[$anomes][1]['filhas'][$nu_codigo]['ac'];
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
                                                    if (!empty($dadosFC[$anomes][1]['filhas'][$nu_codigo]['netas']))
                                                        $dadosNeta = $dadosFC[$anomes][1]['filhas'][$nu_codigo]['netas'];
                                                    foreach ($filha['netas'] as $nu_codigo_n => $neta) { ?>
                                                        <div class="filhasf1-<?= $nu_codigo; ?>" style="display: none;">
                                                            <div class="grid-item grid-item-neta"
                                                                 data-hover="linhan1-<?= $nu_codigo_n; ?>">
                                                                <table>
                                                                    <tr>
                                                                        <td class="linhan1-<?= $nu_codigo_n; ?>"><?php
                                                                            $valor = '0';
                                                                            if (!empty($dadosNeta[$nu_codigo_n]['planejado'])) {
                                                                                $valor = Valida::FormataMoeda(
                                                                                    $dadosNeta[$nu_codigo_n]['planejado']);
                                                                            }
                                                                            $passou = '';
//                                                                            $anomesAtual = date('Ym');
//                                                                            if ($anomes <= $anomesAtual)
//                                                                                $passou = 'disabled';
                                                                            ?>
                                                                            <input type="text"
                                                                                   class="form-control netas moeda"
                                                                                   id="vrl-1-<?= $anomes . '-' . $nu_codigo .
                                                                                   '-' . $nu_codigo_n; ?>"
                                                                                   name="vrl-1-<?= $anomes
                                                                                   . '-' . $nu_codigo . '-' . $nu_codigo_n; ?>"
                                                                                   value="<?= $valor; ?>" <?= $passou; ?>/>
                                                                        </td>
                                                                        <td class="linhan1-<?= $nu_codigo_n; ?>"><?php
                                                                            if (!empty($dadosNeta[$nu_codigo_n]['realizado'])) {
                                                                                echo Valida::FormataMoeda(
                                                                                    $dadosNeta[$nu_codigo_n]['realizado']);
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
                                                    $valor = '0';
                                                    if (!empty($dadosFC[$anomes][2]['planejado'])) {
                                                        $valor = Valida::FormataMoeda($dadosFC[$anomes][2]['planejado']);
                                                    }
                                                    ?>
                                                    <input type="text" class="form-control" disabled
                                                           id="vrl-2-<?= $anomes; ?>" name="vrl-2-<?= $anomes; ?>"
                                                           value="<?= $valor; ?>">
                                                </td>
                                                <td class="linha2"><?php
                                                    if (!empty($dadosFC[$anomes][2]['realizado'])) {
                                                        echo Valida::FormataMoeda($dadosFC[$anomes][2]['realizado']);
                                                    } else {
                                                        echo '-';
                                                    }
                                                    ?></td>
                                                <td class="linha2"><?php
                                                    if (!empty($dadosFC[$anomes][2]['at'])) {
                                                        echo $dadosFC[$anomes][2]['at'];
                                                    } else {
                                                        echo '-';
                                                    }
                                                    ?></td>
                                                <td class="linha2"><?php
                                                    if (!empty($dadosFC[$anomes][2]['ac'])) {
                                                        echo $dadosFC[$anomes][2]['ac'];
                                                    } else {
                                                        echo '-';
                                                    }
                                                    ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <?php
                                    if (!empty($dadosFC[2]['filhas'])) {
                                        foreach ($dadosFC[2]['filhas'] as $nu_codigo => $filha) {
                                            ?>
                                            <div class="filhas2" style="display: none;">
                                                <div class="grid-item grid-item-filha"
                                                     data-hover="linhaf2-<?= $nu_codigo; ?>">
                                                    <table>
                                                        <tr>
                                                            <td class="linhaf2-<?= $nu_codigo; ?>"><?php
                                                                $valor = '0';
                                                                if (!empty(
                                                                $dadosFC[$anomes][2]['filhas'][$nu_codigo]['planejado'])) {
                                                                    $valor = Valida::FormataMoeda(
                                                                        $dadosFC[$anomes][2]['filhas'][$nu_codigo]['planejado']);
                                                                }
                                                                ?>
                                                                <input type="text" class="form-control filhas" disabled
                                                                       id="vrl-2-<?= $anomes . '-' . $nu_codigo; ?>"
                                                                       name="vrl-2-<?= $anomes . '-' . $nu_codigo; ?>"
                                                                       value="<?= $valor; ?>"/>
                                                            </td>
                                                            <td class="linhaf2-<?= $nu_codigo; ?>"><?php
                                                                if (!empty($dadosFC[$anomes][2]['filhas'][$nu_codigo]['realizado'])) {
                                                                    echo Valida::FormataMoeda($dadosFC[$anomes][2]['filhas'][$nu_codigo]['realizado']);
                                                                } else {
                                                                    echo '-';
                                                                }
                                                                ?></td>
                                                            <td class="linhaf2-<?= $nu_codigo; ?>"><?php
                                                                if (!empty($dadosFC[$anomes][2]['filhas'][$nu_codigo]['at'])) {
                                                                    echo $dadosFC[$anomes][2]['filhas'][$nu_codigo]['at'];
                                                                } else {
                                                                    echo '-';
                                                                }
                                                                ?></td>
                                                            <td class="linhaf2-<?= $nu_codigo; ?>"><?php
                                                                if (!empty($dadosFC[$anomes][2]['filhas'][$nu_codigo]['ac'])) {
                                                                    echo $dadosFC[$anomes][2]['filhas'][$nu_codigo]['ac'];
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
                                                    if (!empty($dadosFC[$anomes][2]['filhas'][$nu_codigo]['netas']))
                                                        $dadosNeta = $dadosFC[$anomes][2]['filhas'][$nu_codigo]['netas'];
                                                    foreach ($filha['netas'] as $nu_codigo_n => $neta) { ?>
                                                        <div class="filhasf2-<?= $nu_codigo; ?>" style="display: none;">
                                                            <div class="grid-item grid-item-neta"
                                                                 data-hover="linhan2-<?= $nu_codigo_n; ?>">
                                                                <table>
                                                                    <tr>
                                                                        <td class="linhan2-<?= $nu_codigo_n; ?>"><?php
                                                                            $valor = '0';
                                                                            if (!empty($dadosNeta[$nu_codigo_n]['planejado'])) {
                                                                                $valor = Valida::FormataMoeda(
                                                                                    $dadosNeta[$nu_codigo_n]['planejado']);
                                                                            }
                                                                            ?>
                                                                            <input type="text"
                                                                                   class="form-control netas moeda"
                                                                                   id="vrl-2-<?= $anomes . '-' . $nu_codigo .
                                                                                   '-' . $nu_codigo_n; ?>"
                                                                                   name="vrl-2-<?= $anomes
                                                                                   . '-' . $nu_codigo . '-' . $nu_codigo_n; ?>"
                                                                                   value="<?= $valor; ?>"/>
                                                                        </td>
                                                                        <td class="linhan2-<?= $nu_codigo_n; ?>"><?php
                                                                            if (!empty($dadosNeta[$nu_codigo_n]['realizado'])) {
                                                                                echo Valida::FormataMoeda(
                                                                                    $dadosNeta[$nu_codigo_n]['realizado']);
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
                                                    $valor = '0';
                                                    if (!empty($dadosFC[$anomes][7]['planejado'])) {
                                                        $valor = Valida::FormataMoeda($dadosFC[$anomes][7]['planejado']);
                                                    }
                                                    ?>
                                                    <input type="text" class="form-control" disabled
                                                           id="vrl-7-<?= $anomes; ?>" name="vrl-7-<?= $anomes; ?>"
                                                           value="<?= $valor; ?>">
                                                </td>
                                                <td class="linha7"><?php
                                                    if (!empty($dadosFC[$anomes][7]['realizado'])) {
                                                        echo Valida::FormataMoeda($dadosFC[$anomes][7]['realizado']);
                                                    } else {
                                                        echo '-';
                                                    }
                                                    ?></td>
                                                <td class="linha7"><?php
                                                    if (!empty($dadosFC[$anomes][7]['at'])) {
                                                        echo $dadosFC[$anomes][7]['at'];
                                                    } else {
                                                        echo '-';
                                                    }
                                                    ?></td>
                                                <td class="linha7"><?php
                                                    if (!empty($dadosFC[$anomes][7]['ac'])) {
                                                        echo $dadosFC[$anomes][7]['ac'];
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
                                                    $valor = '0';
                                                    if (!empty($dadosFC[$anomes][3]['planejado'])) {
                                                        $valor = Valida::FormataMoeda($dadosFC[$anomes][3]['planejado']);
                                                    }
                                                    ?>
                                                    <input type="text" class="form-control" disabled
                                                           id="vrl-3-<?= $anomes; ?>" name="vrl-3-<?= $anomes; ?>"
                                                           value="<?= $valor; ?>">
                                                </td>
                                                <td class="linha3"><?php
                                                    if (!empty($dadosFC[$anomes][3]['realizado'])) {
                                                        echo Valida::FormataMoeda($dadosFC[$anomes][3]['realizado']);
                                                    } else {
                                                        echo '-';
                                                    }
                                                    ?></td>
                                                <td class="linha3"><?php
                                                    if (!empty($dadosFC[$anomes][3]['at'])) {
                                                        echo $dadosFC[$anomes][3]['at'];
                                                    } else {
                                                        echo '-';
                                                    }
                                                    ?></td>
                                                <td class="linha3"><?php
                                                    if (!empty($dadosFC[$anomes][3]['ac'])) {
                                                        echo $dadosFC[$anomes][3]['ac'];
                                                    } else {
                                                        echo '-';
                                                    }
                                                    ?></td>
                                            </tr>

                                        </table>
                                    </div>
                                    <?php
                                    if (!empty($dadosFC[3]['filhas'])) {
                                        foreach ($dadosFC[3]['filhas'] as $nu_codigo => $filha) {
                                            ?>
                                            <div class="filhas3" style="display: none;">
                                                <div class="grid-item grid-item-filha"
                                                     data-hover="linhaf3-<?= $nu_codigo; ?>">
                                                    <table>
                                                        <tr>
                                                            <td class="linhaf3-<?= $nu_codigo; ?>"><?php
                                                                $valor = '0';
                                                                if (!empty(
                                                                $dadosFC[$anomes][3]['filhas'][$nu_codigo]['planejado'])) {
                                                                    $valor = Valida::FormataMoeda(
                                                                        $dadosFC[$anomes][3]['filhas'][$nu_codigo]['planejado']);
                                                                }
                                                                ?>
                                                                <input type="text" class="form-control filhas" disabled
                                                                       id="vrl-3-<?= $anomes . '-' . $nu_codigo; ?>"
                                                                       name="vrl-3-<?= $anomes . '-' . $nu_codigo; ?>"
                                                                       value="<?= $valor; ?>"/>
                                                            </td>
                                                            <td class="linhaf3-<?= $nu_codigo; ?>"><?php
                                                                if (!empty($dadosFC[$anomes][3]['filhas'][$nu_codigo]['realizado'])) {
                                                                    echo Valida::FormataMoeda($dadosFC[$anomes][3]['filhas'][$nu_codigo]['realizado']);
                                                                } else {
                                                                    echo '-';
                                                                }
                                                                ?></td>
                                                            <td class="linhaf3-<?= $nu_codigo; ?>"><?php
                                                                if (!empty($dadosFC[$anomes][3]['filhas'][$nu_codigo]['at'])) {
                                                                    echo $dadosFC[$anomes][3]['filhas'][$nu_codigo]['at'];
                                                                } else {
                                                                    echo '-';
                                                                }
                                                                ?></td>
                                                            <td class="linhaf3-<?= $nu_codigo; ?>"><?php
                                                                if (!empty($dadosFC[$anomes][3]['filhas'][$nu_codigo]['ac'])) {
                                                                    echo $dadosFC[$anomes][3]['filhas'][$nu_codigo]['ac'];
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
                                                    if (!empty($dadosFC[$anomes][3]['filhas'][$nu_codigo]['netas']))
                                                        $dadosNeta = $dadosFC[$anomes][3]['filhas'][$nu_codigo]['netas'];
                                                    foreach ($filha['netas'] as $nu_codigo_n => $neta) { ?>
                                                        <div class="filhasf3-<?= $nu_codigo; ?>" style="display: none;">
                                                            <div class="grid-item grid-item-neta"
                                                                 data-hover="linhan3-<?= $nu_codigo_n; ?>">
                                                                <table>
                                                                    <tr>
                                                                        <td class="linhan3-<?= $nu_codigo_n; ?>"><?php
                                                                            $valor = '0';
                                                                            if (!empty($dadosNeta[$nu_codigo_n]['planejado'])) {
                                                                                $valor = Valida::FormataMoeda(
                                                                                    $dadosNeta[$nu_codigo_n]['planejado']);
                                                                            }
                                                                            ?>
                                                                            <input type="text"
                                                                                   class="form-control netas moeda"
                                                                                   id="vrl-3-<?= $anomes . '-' . $nu_codigo .
                                                                                   '-' . $nu_codigo_n; ?>"
                                                                                   name="vrl-3-<?= $anomes
                                                                                   . '-' . $nu_codigo . '-' . $nu_codigo_n; ?>"
                                                                                   value="<?= $valor; ?>"/>
                                                                        </td>
                                                                        <td class="linhan3-<?= $nu_codigo_n; ?>"><?php
                                                                            if (!empty($dadosNeta[$nu_codigo_n]['realizado'])) {
                                                                                echo Valida::FormataMoeda(
                                                                                    $dadosNeta[$nu_codigo_n]['realizado']);
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
                                                    $valor = '0';
                                                    if (!empty($dadosFC[$anomes][8]['planejado'])) {
                                                        $valor = Valida::FormataMoeda($dadosFC[$anomes][8]['planejado']);
                                                    }
                                                    ?>
                                                    <input type="text" class="form-control" disabled
                                                           id="vrl-8-<?= $anomes; ?>" name="vrl-8-<?= $anomes; ?>"
                                                           value="<?= $valor; ?>">
                                                </td>
                                                <td class="linha8"><?php
                                                    if (!empty($dadosFC[$anomes][8]['realizado'])) {
                                                        echo Valida::FormataMoeda($dadosFC[$anomes][8]['realizado']);
                                                    } else {
                                                        echo '-';
                                                    }
                                                    ?></td>
                                                <td class="linha8"><?php
                                                    if (!empty($dadosFC[$anomes][8]['at'])) {
                                                        echo $dadosFC[$anomes][8]['at'];
                                                    } else {
                                                        echo '-';
                                                    }
                                                    ?></td>
                                                <td class="linha8"><?php
                                                    if (!empty($dadosFC[$anomes][8]['ac'])) {
                                                        echo $dadosFC[$anomes][8]['ac'];
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
                                                    $valor = '0';
                                                    if (!empty($dadosFC[$anomes][4]['planejado'])) {
                                                        $valor = Valida::FormataMoeda($dadosFC[$anomes][4]['planejado']);
                                                    }
                                                    ?>
                                                    <input type="text" class="form-control" disabled
                                                           id="vrl-4-<?= $anomes; ?>" name="vrl-4-<?= $anomes; ?>"
                                                           value="<?= $valor; ?>">
                                                </td>
                                                <td class="linha4"><?php
                                                    if (!empty($dadosFC[$anomes][4]['realizado'])) {
                                                        echo Valida::FormataMoeda($dadosFC[$anomes][4]['realizado']);
                                                    } else {
                                                        echo '-';
                                                    }
                                                    ?></td>
                                                <td class="linha4"><?php
                                                    if (!empty($dadosFC[$anomes][4]['at'])) {
                                                        echo $dadosFC[$anomes][4]['at'];
                                                    } else {
                                                        echo '-';
                                                    }
                                                    ?></td>
                                                <td class="linha4"><?php
                                                    if (!empty($dadosFC[$anomes][4]['ac'])) {
                                                        echo $dadosFC[$anomes][4]['ac'];
                                                    } else {
                                                        echo '-';
                                                    }
                                                    ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <?php
                                    if (!empty($dadosFC[4]['filhas'])) {
                                        foreach ($dadosFC[4]['filhas'] as $nu_codigo => $filha) {
                                            ?>
                                            <div class="filhas4" style="display: none;">
                                                <div class="grid-item grid-item-filha"
                                                     data-hover="linhaf4-<?= $nu_codigo; ?>">
                                                    <table>
                                                        <tr>
                                                            <td class="linhaf4-<?= $nu_codigo; ?>"><?php
                                                                $valor = '0';
                                                                if (!empty(
                                                                $dadosFC[$anomes][4]['filhas'][$nu_codigo]['planejado'])) {
                                                                    $valor = Valida::FormataMoeda(
                                                                        $dadosFC[$anomes][4]['filhas'][$nu_codigo]['planejado']);
                                                                }
                                                                ?>
                                                                <input type="text" class="form-control filhas" disabled
                                                                       id="vrl-4-<?= $anomes . '-' . $nu_codigo; ?>"
                                                                       name="vrl-4-<?= $anomes . '-' . $nu_codigo; ?>"
                                                                       value="<?= $valor; ?>"/>
                                                            </td>
                                                            <td class="linhaf4-<?= $nu_codigo; ?>"><?php
                                                                if (!empty($dadosFC[$anomes][4]['filhas'][$nu_codigo]['realizado'])) {
                                                                    echo Valida::FormataMoeda($dadosFC[$anomes][4]['filhas'][$nu_codigo]['realizado']);
                                                                } else {
                                                                    echo '-';
                                                                }
                                                                ?></td>
                                                            <td class="linhaf4-<?= $nu_codigo; ?>"><?php
                                                                if (!empty($dadosFC[$anomes][4]['filhas'][$nu_codigo]['at'])) {
                                                                    echo $dadosFC[$anomes][4]['filhas'][$nu_codigo]['at'];
                                                                } else {
                                                                    echo '-';
                                                                }
                                                                ?></td>
                                                            <td class="linhaf4-<?= $nu_codigo; ?>"><?php
                                                                if (!empty($dadosFC[$anomes][4]['filhas'][$nu_codigo]['ac'])) {
                                                                    echo $dadosFC[$anomes][4]['filhas'][$nu_codigo]['ac'];
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
                                                    if (!empty($dadosFC[$anomes][4]['filhas'][$nu_codigo]['netas']))
                                                        $dadosNeta = $dadosFC[$anomes][4]['filhas'][$nu_codigo]['netas'];
                                                    foreach ($filha['netas'] as $nu_codigo_n => $neta) { ?>
                                                        <div class="filhasf4-<?= $nu_codigo; ?>" style="display: none;">
                                                            <div class="grid-item grid-item-neta"
                                                                 data-hover="linhan4-<?= $nu_codigo_n; ?>">
                                                                <table>
                                                                    <tr>
                                                                        <td class="linhan4-<?= $nu_codigo_n; ?>"><?php
                                                                            $valor = '0';
                                                                            if (!empty($dadosNeta[$nu_codigo_n]['planejado'])) {
                                                                                $valor = Valida::FormataMoeda(
                                                                                    $dadosNeta[$nu_codigo_n]['planejado']);
                                                                            }
                                                                            ?>
                                                                            <input type="text"
                                                                                   class="form-control netas moeda"
                                                                                   id="vrl-4-<?= $anomes . '-' . $nu_codigo .
                                                                                   '-' . $nu_codigo_n; ?>"
                                                                                   name="vrl-4-<?= $anomes
                                                                                   . '-' . $nu_codigo . '-' . $nu_codigo_n; ?>"
                                                                                   value="<?= $valor; ?>"/>
                                                                        </td>
                                                                        <td class="linhan4-<?= $nu_codigo_n; ?>"><?php
                                                                            if (!empty($dadosNeta[$nu_codigo_n]['realizado'])) {
                                                                                echo Valida::FormataMoeda(
                                                                                    $dadosNeta[$nu_codigo_n]['realizado']);
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
                                                    $valor = '0';
                                                    if (!empty($dadosFC[$anomes][9]['planejado'])) {
                                                        $valor = Valida::FormataMoeda($dadosFC[$anomes][9]['planejado']);
                                                    }
                                                    ?>
                                                    <input type="text" class="form-control" disabled
                                                           id="vrl-9-<?= $anomes; ?>" name="vrl-9-<?= $anomes; ?>"
                                                           value="<?= $valor; ?>">
                                                </td>
                                                <td class="linha9"><?php
                                                    if (!empty($dadosFC[$anomes][9]['realizado'])) {
                                                        echo Valida::FormataMoeda($dadosFC[$anomes][9]['realizado']);
                                                    } else {
                                                        echo '-';
                                                    }
                                                    ?></td>
                                                <td class="linha9"><?php
                                                    if (!empty($dadosFC[$anomes][9]['at'])) {
                                                        echo $dadosFC[$anomes][9]['at'];
                                                    } else {
                                                        echo '-';
                                                    }
                                                    ?></td>
                                                <td class="linha9"><?php
                                                    if (!empty($dadosFC[$anomes][9]['ac'])) {
                                                        echo $dadosFC[$anomes][9]['ac'];
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
                                                    $valor = '0';
                                                    if (!empty($dadosFC[$anomes][10]['planejado'])) {
                                                        $valor = Valida::FormataMoeda($dadosFC[$anomes][10]['planejado']);
                                                    }
                                                    ?>
                                                    <input type="text" class="form-control" disabled
                                                           id="vrl-10-<?= $anomes; ?>" name="vrl-10-<?= $anomes; ?>"
                                                           value="<?= $valor; ?>">
                                                </td>
                                                <td class="linha10"><?php
                                                    if (!empty($dadosFC[$anomes][10]['realizado'])) {
                                                        echo Valida::FormataMoeda($dadosFC[$anomes][10]['realizado']);
                                                    } else {
                                                        echo '-';
                                                    }
                                                    ?></td>
                                                <td class="linha10"><?php
                                                    if (!empty($dadosFC[$anomes][10]['at'])) {
                                                        echo $dadosFC[$anomes][10]['at'];
                                                    } else {
                                                        echo '-';
                                                    }
                                                    ?></td>
                                                <td class="linha10"><?php
                                                    if (!empty($dadosFC[$anomes][10]['ac'])) {
                                                        echo $dadosFC[$anomes][10]['ac'];
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
                                                    $valor = '0';
                                                    if (!empty($dadosFC[$anomes][5]['planejado'])) {
                                                        $valor = Valida::FormataMoeda($dadosFC[$anomes][5]['planejado']);
                                                    }
                                                    ?>
                                                    <input type="text" class="form-control" disabled
                                                           id="vrl-5-<?= $anomes; ?>" name="vrl-5-<?= $anomes; ?>"
                                                           value="<?= $valor; ?>">
                                                </td>
                                                <td class="linha5"><?php
                                                    if (!empty($dadosFC[$anomes][5]['realizado'])) {
                                                        echo Valida::FormataMoeda($dadosFC[$anomes][5]['realizado']);
                                                    } else {
                                                        echo '-';
                                                    }
                                                    ?></td>
                                                <td class="linha5"><?php
                                                    if (!empty($dadosFC[$anomes][5]['at'])) {
                                                        echo $dadosFC[$anomes][5]['at'];
                                                    } else {
                                                        echo '-';
                                                    }
                                                    ?></td>
                                                <td class="linha5"><?php
                                                    if (!empty($dadosFC[$anomes][5]['ac'])) {
                                                        echo $dadosFC[$anomes][5]['ac'];
                                                    } else {
                                                        echo '-';
                                                    }
                                                    ?></td>
                                            </tr>

                                        </table>
                                    </div><?php
                                    if (!empty($dadosFC[5]['filhas'])) {
                                        foreach ($dadosFC[5]['filhas'] as $nu_codigo => $filha) {
                                            ?>
                                            <div class="filhas5" style="display: none;">
                                                <div class="grid-item grid-item-filha"
                                                     data-hover="linhaf5-<?= $nu_codigo; ?>">
                                                    <table>
                                                        <tr>
                                                            <td class="linhaf5-<?= $nu_codigo; ?>"><?php
                                                                $valor = '0';
                                                                if (!empty(
                                                                $dadosFC[$anomes][5]['filhas'][$nu_codigo]['planejado'])) {
                                                                    $valor = Valida::FormataMoeda(
                                                                        $dadosFC[$anomes][5]['filhas'][$nu_codigo]['planejado']);
                                                                }
                                                                ?>
                                                                <input type="text" class="form-control filhas" disabled
                                                                       id="vrl-5-<?= $anomes . '-' . $nu_codigo; ?>"
                                                                       name="vrl-5-<?= $anomes . '-' . $nu_codigo; ?>"
                                                                       value="<?= $valor; ?>"/>
                                                            </td>
                                                            <td class="linhaf5-<?= $nu_codigo; ?>"><?php
                                                                if (!empty($dadosFC[$anomes][5]['filhas'][$nu_codigo]['realizado'])) {
                                                                    echo Valida::FormataMoeda($dadosFC[$anomes][5]['filhas'][$nu_codigo]['realizado']);
                                                                } else {
                                                                    echo '-';
                                                                }
                                                                ?></td>
                                                            <td class="linhaf5-<?= $nu_codigo; ?>"><?php
                                                                if (!empty($dadosFC[$anomes][5]['filhas'][$nu_codigo]['at'])) {
                                                                    echo $dadosFC[$anomes][5]['filhas'][$nu_codigo]['at'];
                                                                } else {
                                                                    echo '-';
                                                                }
                                                                ?></td>
                                                            <td class="linhaf5-<?= $nu_codigo; ?>"><?php
                                                                if (!empty($dadosFC[$anomes][5]['filhas'][$nu_codigo]['ac'])) {
                                                                    echo $dadosFC[$anomes][5]['filhas'][$nu_codigo]['ac'];
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
                                                    if (!empty($dadosFC[$anomes][5]['filhas'][$nu_codigo]['netas']))
                                                        $dadosNeta = $dadosFC[$anomes][5]['filhas'][$nu_codigo]['netas'];
                                                    foreach ($filha['netas'] as $nu_codigo_n => $neta) { ?>
                                                        <div class="filhasf5-<?= $nu_codigo; ?>" style="display: none;">
                                                            <div class="grid-item grid-item-neta"
                                                                 data-hover="linhan5-<?= $nu_codigo_n; ?>">
                                                                <table>
                                                                    <tr>
                                                                        <td class="linhan5-<?= $nu_codigo_n; ?>"><?php
                                                                            $valor = '0';
                                                                            if (!empty($dadosNeta[$nu_codigo_n]['planejado'])) {
                                                                                $valor = Valida::FormataMoeda(
                                                                                    $dadosNeta[$nu_codigo_n]['planejado']);
                                                                            }
                                                                            ?>
                                                                            <input type="text"
                                                                                   class="form-control netas moeda"
                                                                                   id="vrl-5-<?= $anomes . '-' . $nu_codigo .
                                                                                   '-' . $nu_codigo_n; ?>"
                                                                                   name="vrl-5-<?= $anomes
                                                                                   . '-' . $nu_codigo . '-' . $nu_codigo_n; ?>"
                                                                                   value="<?= $valor; ?>"/>
                                                                        </td>
                                                                        <td class="linhan5-<?= $nu_codigo_n; ?>"><?php
                                                                            if (!empty($dadosNeta[$nu_codigo_n]['realizado'])) {
                                                                                echo Valida::FormataMoeda(
                                                                                    $dadosNeta[$nu_codigo_n]['realizado']);
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
                                                    $valor = '0';
                                                    if (!empty($dadosFC[$anomes][6]['planejado'])) {
                                                        $valor = Valida::FormataMoeda($dadosFC[$anomes][6]['planejado']);
                                                    }
                                                    ?>
                                                    <input type="text" class="form-control" disabled
                                                           id="vrl-6-<?= $anomes; ?>" name="vrl-6-<?= $anomes; ?>"
                                                           value="<?= $valor; ?>">
                                                </td>
                                                <td class="linha6"><?php
                                                    if (!empty($dadosFC[$anomes][6]['realizado'])) {
                                                        echo Valida::FormataMoeda($dadosFC[$anomes][6]['realizado']);
                                                    } else {
                                                        echo '-';
                                                    }
                                                    ?></td>
                                                <td class="linha6"><?php
                                                    if (!empty($dadosFC[$anomes][6]['at'])) {
                                                        echo $dadosFC[$anomes][6]['at'];
                                                    } else {
                                                        echo '-';
                                                    }
                                                    ?></td>
                                                <td class="linha6"><?php
                                                    if (!empty($dadosFC[$anomes][6]['ac'])) {
                                                        echo $dadosFC[$anomes][6]['ac'];
                                                    } else {
                                                        echo '-';
                                                    }
                                                    ?></td>
                                            </tr>

                                        </table>
                                    </div><?php
                                    if (!empty($dadosFC[6]['filhas'])) {
                                        foreach ($dadosFC[6]['filhas'] as $nu_codigo => $filha) {
                                            ?>
                                            <div class="filhas6" style="display: none;">
                                                <div class="grid-item grid-item-filha"
                                                     data-hover="linhaf6-<?= $nu_codigo; ?>">
                                                    <table>
                                                        <tr>
                                                            <td class="linhaf6-<?= $nu_codigo; ?>"><?php
                                                                $valor = '0';
                                                                if (!empty(
                                                                $dadosFC[$anomes][6]['filhas'][$nu_codigo]['planejado'])) {
                                                                    $valor = Valida::FormataMoeda(
                                                                        $dadosFC[$anomes][6]['filhas'][$nu_codigo]['planejado']);
                                                                }
                                                                ?>
                                                                <input type="text" class="form-control filhas" disabled
                                                                       id="vrl-6-<?= $anomes . '-' . $nu_codigo; ?>"
                                                                       name="vrl-6-<?= $anomes . '-' . $nu_codigo; ?>"
                                                                       value="<?= $valor; ?>"/>
                                                            </td>
                                                            <td class="linhaf6-<?= $nu_codigo; ?>"><?php
                                                                if (!empty($dadosFC[$anomes][6]['filhas'][$nu_codigo]['realizado'])) {
                                                                    echo Valida::FormataMoeda($dadosFC[$anomes][6]['filhas'][$nu_codigo]['realizado']);
                                                                } else {
                                                                    echo '-';
                                                                }
                                                                ?></td>
                                                            <td class="linhaf6-<?= $nu_codigo; ?>"><?php
                                                                if (!empty($dadosFC[$anomes][6]['filhas'][$nu_codigo]['at'])) {
                                                                    echo $dadosFC[$anomes][6]['filhas'][$nu_codigo]['at'];
                                                                } else {
                                                                    echo '-';
                                                                }
                                                                ?></td>
                                                            <td class="linhaf6-<?= $nu_codigo; ?>"><?php
                                                                if (!empty($dadosFC[$anomes][6]['filhas'][$nu_codigo]['ac'])) {
                                                                    echo $dadosFC[$anomes][6]['filhas'][$nu_codigo]['ac'];
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
                                                    if (!empty($dadosFC[$anomes][6]['filhas'][$nu_codigo]['netas']))
                                                        $dadosNeta = $dadosFC[$anomes][6]['filhas'][$nu_codigo]['netas'];
                                                    foreach ($filha['netas'] as $nu_codigo_n => $neta) { ?>
                                                        <div class="filhasf6-<?= $nu_codigo; ?>" style="display: none;">
                                                            <div class="grid-item grid-item-neta"
                                                                 data-hover="linhan6-<?= $nu_codigo_n; ?>">
                                                                <table>
                                                                    <tr>
                                                                        <td class="linhan6-<?= $nu_codigo_n; ?>"><?php
                                                                            $valor = '0';
                                                                            if (!empty($dadosNeta[$nu_codigo_n]['planejado'])) {
                                                                                $valor = Valida::FormataMoeda(
                                                                                    $dadosNeta[$nu_codigo_n]['planejado']);
                                                                            }
                                                                            ?>
                                                                            <input type="text"
                                                                                   class="form-control netas moeda"
                                                                                   id="vrl-6-<?= $anomes . '-' . $nu_codigo .
                                                                                   '-' . $nu_codigo_n; ?>"
                                                                                   name="vrl-6-<?= $anomes
                                                                                   . '-' . $nu_codigo . '-' . $nu_codigo_n; ?>"
                                                                                   value="<?= $valor; ?>"/>
                                                                        </td>
                                                                        <td class="linhan6-<?= $nu_codigo_n; ?>"><?php
                                                                            if (!empty($dadosNeta[$nu_codigo_n]['realizado'])) {
                                                                                echo Valida::FormataMoeda(
                                                                                    $dadosNeta[$nu_codigo_n]['realizado']);
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
                                                    $valor = '0';
                                                    if (!empty($dadosFC[$anomes][11]['planejado'])) {
                                                        $valor = Valida::FormataMoeda($dadosFC[$anomes][11]['planejado']);
                                                    }
                                                    ?>
                                                    <input type="text" class="form-control" disabled
                                                           id="vrl-11-<?= $anomes; ?>" name="vrl-11-<?= $anomes; ?>"
                                                           value="<?= $valor; ?>">
                                                </td>
                                                <td class="linha11"><?php
                                                    if (!empty($dadosFC[$anomes][11]['realizado'])) {
                                                        echo Valida::FormataMoeda($dadosFC[$anomes][11]['realizado']);
                                                    } else {
                                                        echo '-';
                                                    }
                                                    ?></td>
                                                <td class="linha11"><?php
                                                    if (!empty($dadosFC[$anomes][11]['at'])) {
                                                        echo $dadosFC[$anomes][11]['at'];
                                                    } else {
                                                        echo '-';
                                                    }
                                                    ?></td>
                                                <td class="linha11"><?php
                                                    if (!empty($dadosFC[$anomes][11]['ac'])) {
                                                        echo $dadosFC[$anomes][11]['ac'];
                                                    } else {
                                                        echo '-';
                                                    }
                                                    ?></td>
                                            </tr>

                                        </table>
                                    </div>
                                </div>

                                <?php
                            }
                            ?>

                            <div class="grid-col total">
                                <div class="grid-item grid-item--header">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th colspan="3">TOTAL</th>
                                        </tr>
                                        </thead>

                                        <tr>
                                            <td class="grid-top">Planejado</td>
                                            <td class="grid-top">Realizado</td>
                                            <td class="grid-top">AT</td>
                                        </tr>

                                    </table>
                                </div>
                                <div class="grid-item" data-hover="linha12">
                                    <table>
                                        <tr>
                                            <td class="linha12"><?php
                                                if (!empty($dadosTT[10]['planejado'])) {
                                                    echo Valida::FormataMoeda($dadosTT[10]['planejado']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha12"><?php
                                                if (!empty($dadosTT[10]['realizado'])) {
                                                    echo Valida::FormataMoeda($dadosTT[10]['realizado']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha12"><?php
                                                if (!empty($dadosTT[10]['at'])) {
                                                    echo $dadosTT[10]['at'];
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
                                                if (!empty($dadosTT[1]['planejado'])) {
                                                    echo Valida::FormataMoeda($dadosTT[1]['planejado']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha1"><?php
                                                if (!empty($dadosTT[1]['realizado'])) {
                                                    echo Valida::FormataMoeda($dadosTT[1]['realizado']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha1"><?php
                                                if (!empty($dadosTT[1]['at'])) {
                                                    echo $dadosTT[1]['at'];
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                        </tr>

                                    </table>
                                </div>
                                <?php
                                if (!empty($dadosTT[1]['filhas'])) {
                                    foreach ($dadosTT[1]['filhas'] as $nu_codigo => $filha) {
                                        ?>
                                        <div class="filhas1" style="display: none;">
                                            <div class="grid-item grid-item-filha"
                                                 data-hover="linhaf1-<?= $nu_codigo; ?>">
                                                <table>
                                                    <tr>
                                                        <td class="linhaf1-<?= $nu_codigo; ?>"><?php
                                                            if (!empty(
                                                            $dadosTT[1]['filhas'][$nu_codigo]['planejado'])) {
                                                                echo Valida::FormataMoeda(
                                                                    $dadosTT[1]['filhas'][$nu_codigo]['planejado']);
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                        <td class="linhaf1-<?= $nu_codigo; ?>"><?php
                                                            if (!empty($dadosTT[1]['filhas'][$nu_codigo]['realizado'])) {
                                                                echo Valida::FormataMoeda($dadosTT[1]['filhas'][$nu_codigo]['realizado']);
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                        <td class="linhaf1-<?= $nu_codigo; ?>"><?php
                                                            if (!empty($dadosTT[1]['filhas'][$nu_codigo]['at'])) {
                                                                echo $dadosTT[1]['filhas'][$nu_codigo]['at'];
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                    </tr>
                                                </table>
                                            </div>

                                            <?php
                                            if (!empty($filha['netas'])) {
                                                $dadosNetaTT = [];
                                                if (!empty($dadosTT[1]['filhas'][$nu_codigo]['netas']))
                                                    $dadosNetaTT = $dadosTT[1]['filhas'][$nu_codigo]['netas'];
                                                foreach ($filha['netas'] as $nu_codigo_n => $neta) { ?>
                                                    <div class="filhasf1-<?= $nu_codigo; ?>" style="display: none;">
                                                        <div class="grid-item grid-item-neta"
                                                             data-hover="linhan1-<?= $nu_codigo_n; ?>">
                                                            <table>
                                                                <tr>
                                                                    <td class="linhan1-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNetaTT[$nu_codigo_n]['planejado'])) {
                                                                            echo Valida::FormataMoeda(
                                                                                $dadosNetaTT[$nu_codigo_n]['planejado']);
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                    <td class="linhan1-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNetaTT[$nu_codigo_n]['realizado'])) {
                                                                            echo Valida::FormataMoeda(
                                                                                $dadosNetaTT[$nu_codigo_n]['realizado']);
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                    <td class="linhan1-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNetaTT[$nu_codigo_n]['at'])) {
                                                                            echo $dadosNetaTT[$nu_codigo_n]['at'];
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
                                                if (!empty($dadosTT[2]['planejado'])) {
                                                    echo Valida::FormataMoeda($dadosTT[2]['planejado']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha2"><?php
                                                if (!empty($dadosTT[2]['realizado'])) {
                                                    echo Valida::FormataMoeda($dadosTT[2]['realizado']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha2"><?php
                                                if (!empty($dadosTT[2]['at'])) {
                                                    echo $dadosTT[2]['at'];
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <?php
                                if (!empty($dadosTT[2]['filhas'])) {
                                    foreach ($dadosTT[2]['filhas'] as $nu_codigo => $filha) {
                                        ?>
                                        <div class="filhas2" style="display: none;">
                                            <div class="grid-item grid-item-filha"
                                                 data-hover="linhaf2-<?= $nu_codigo; ?>">
                                                <table>
                                                    <tr>
                                                        <td class="linhaf2-<?= $nu_codigo; ?>"><?php
                                                            if (!empty(
                                                            $dadosTT[2]['filhas'][$nu_codigo]['planejado'])) {
                                                                echo Valida::FormataMoeda(
                                                                    $dadosTT[2]['filhas'][$nu_codigo]['planejado']);
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                        <td class="linhaf2-<?= $nu_codigo; ?>"><?php
                                                            if (!empty($dadosTT[2]['filhas'][$nu_codigo]['realizado'])) {
                                                                echo Valida::FormataMoeda($dadosTT[2]['filhas'][$nu_codigo]['realizado']);
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                        <td class="linhaf2-<?= $nu_codigo; ?>"><?php
                                                            if (!empty($dadosTT[2]['filhas'][$nu_codigo]['at'])) {
                                                                echo $dadosTT[2]['filhas'][$nu_codigo]['at'];
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                    </tr>
                                                </table>
                                            </div>

                                            <?php
                                            if (!empty($filha['netas'])) {
                                                $dadosNetaTT = [];
                                                if (!empty($dadosTT[2]['filhas'][$nu_codigo]['netas']))
                                                    $dadosNetaTT = $dadosTT[2]['filhas'][$nu_codigo]['netas'];
                                                foreach ($filha['netas'] as $nu_codigo_n => $neta) { ?>
                                                    <div class="filhasf2-<?= $nu_codigo; ?>" style="display: none;">
                                                        <div class="grid-item grid-item-neta"
                                                             data-hover="linhan2-<?= $nu_codigo_n; ?>">
                                                            <table>
                                                                <tr>
                                                                    <td class="linhan2-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNetaTT[$nu_codigo_n]['planejado'])) {
                                                                            echo Valida::FormataMoeda(
                                                                                $dadosNetaTT[$nu_codigo_n]['planejado']);
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                    <td class="linhan2-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNetaTT[$nu_codigo_n]['realizado'])) {
                                                                            echo Valida::FormataMoeda(
                                                                                $dadosNetaTT[$nu_codigo_n]['realizado']);
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                    <td class="linhan2-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNetaTT[$nu_codigo_n]['at'])) {
                                                                            echo $dadosNetaTT[$nu_codigo_n]['at'];
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
                                                if (!empty($dadosTT[7]['planejado'])) {
                                                    echo Valida::FormataMoeda($dadosTT[7]['planejado']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha7"><?php
                                                if (!empty($dadosTT[7]['realizado'])) {
                                                    echo Valida::FormataMoeda($dadosTT[7]['realizado']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha7"><?php
                                                if (!empty($dadosTT[7]['at'])) {
                                                    echo $dadosTT[7]['at'];
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
                                                if (!empty($dadosTT[3]['planejado'])) {
                                                    echo Valida::FormataMoeda($dadosTT[3]['planejado']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha3"><?php
                                                if (!empty($dadosTT[3]['realizado'])) {
                                                    echo Valida::FormataMoeda($dadosTT[3]['realizado']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha3"><?php
                                                if (!empty($dadosTT[3]['at'])) {
                                                    echo $dadosTT[3]['at'];
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <?php
                                if (!empty($dadosTT[3]['filhas'])) {
                                    foreach ($dadosTT[3]['filhas'] as $nu_codigo => $filha) {
                                        ?>
                                        <div class="filhas3" style="display: none;">
                                            <div class="grid-item grid-item-filha"
                                                 data-hover="linhaf3-<?= $nu_codigo; ?>">
                                                <table>
                                                    <tr>
                                                        <td class="linhaf3-<?= $nu_codigo; ?>"><?php
                                                            if (!empty(
                                                            $dadosTT[3]['filhas'][$nu_codigo]['planejado'])) {
                                                                echo Valida::FormataMoeda(
                                                                    $dadosTT[3]['filhas'][$nu_codigo]['planejado']);
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                        <td class="linhaf3-<?= $nu_codigo; ?>"><?php
                                                            if (!empty($dadosTT[3]['filhas'][$nu_codigo]['realizado'])) {
                                                                echo Valida::FormataMoeda($dadosTT[3]['filhas'][$nu_codigo]['realizado']);
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                        <td class="linhaf3-<?= $nu_codigo; ?>"><?php
                                                            if (!empty($dadosTT[3]['filhas'][$nu_codigo]['at'])) {
                                                                echo $dadosTT[3]['filhas'][$nu_codigo]['at'];
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                    </tr>
                                                </table>
                                            </div>

                                            <?php
                                            if (!empty($filha['netas'])) {
                                                $dadosNetaTT = [];
                                                if (!empty($dadosTT[3]['filhas'][$nu_codigo]['netas']))
                                                    $dadosNetaTT = $dadosTT[3]['filhas'][$nu_codigo]['netas'];
                                                foreach ($filha['netas'] as $nu_codigo_n => $neta) { ?>
                                                    <div class="filhasf3-<?= $nu_codigo; ?>" style="display: none;">
                                                        <div class="grid-item grid-item-neta"
                                                             data-hover="linhan3-<?= $nu_codigo_n; ?>">
                                                            <table>
                                                                <tr>
                                                                    <td class="linhan3-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNetaTT[$nu_codigo_n]['planejado'])) {
                                                                            echo Valida::FormataMoeda(
                                                                                $dadosNetaTT[$nu_codigo_n]['planejado']);
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                    <td class="linhan3-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNetaTT[$nu_codigo_n]['realizado'])) {
                                                                            echo Valida::FormataMoeda(
                                                                                $dadosNetaTT[$nu_codigo_n]['realizado']);
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                    <td class="linhan3-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNetaTT[$nu_codigo_n]['at'])) {
                                                                            echo $dadosNetaTT[$nu_codigo_n]['at'];
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
                                                if (!empty($dadosTT[8]['planejado'])) {
                                                    echo Valida::FormataMoeda($dadosTT[8]['planejado']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha8"><?php
                                                if (!empty($dadosTT[8]['realizado'])) {
                                                    echo Valida::FormataMoeda($dadosTT[8]['realizado']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha8"><?php
                                                if (!empty($dadosTT[8]['at'])) {
                                                    echo $dadosTT[8]['at'];
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
                                                if (!empty($dadosTT[4]['planejado'])) {
                                                    echo Valida::FormataMoeda($dadosTT[4]['planejado']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha4"><?php
                                                if (!empty($dadosTT[4]['realizado'])) {
                                                    echo Valida::FormataMoeda($dadosTT[4]['realizado']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha4"><?php
                                                if (!empty($dadosTT[4]['at'])) {
                                                    echo $dadosTT[4]['at'];
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <?php
                                if (!empty($dadosTT[4]['filhas'])) {
                                    foreach ($dadosTT[4]['filhas'] as $nu_codigo => $filha) {
                                        ?>
                                        <div class="filhas4" style="display: none;">
                                            <div class="grid-item grid-item-filha"
                                                 data-hover="linhaf4-<?= $nu_codigo; ?>">
                                                <table>
                                                    <tr>
                                                        <td class="linhaf4-<?= $nu_codigo; ?>"><?php
                                                            if (!empty(
                                                            $dadosTT[4]['filhas'][$nu_codigo]['planejado'])) {
                                                                echo Valida::FormataMoeda(
                                                                    $dadosTT[4]['filhas'][$nu_codigo]['planejado']);
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                        <td class="linhaf4-<?= $nu_codigo; ?>"><?php
                                                            if (!empty($dadosTT[4]['filhas'][$nu_codigo]['realizado'])) {
                                                                echo Valida::FormataMoeda($dadosTT[4]['filhas'][$nu_codigo]['realizado']);
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                        <td class="linhaf4-<?= $nu_codigo; ?>"><?php
                                                            if (!empty($dadosTT[4]['filhas'][$nu_codigo]['at'])) {
                                                                echo $dadosTT[4]['filhas'][$nu_codigo]['at'];
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                    </tr>
                                                </table>
                                            </div>

                                            <?php
                                            if (!empty($filha['netas'])) {
                                                $dadosNetaTT = [];
                                                if (!empty($dadosTT[4]['filhas'][$nu_codigo]['netas']))
                                                    $dadosNetaTT = $dadosTT[4]['filhas'][$nu_codigo]['netas'];
                                                foreach ($filha['netas'] as $nu_codigo_n => $neta) { ?>
                                                    <div class="filhasf4-<?= $nu_codigo; ?>" style="display: none;">
                                                        <div class="grid-item grid-item-neta"
                                                             data-hover="linhan4-<?= $nu_codigo_n; ?>">
                                                            <table>
                                                                <tr>
                                                                    <td class="linhan4-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNetaTT[$nu_codigo_n]['planejado'])) {
                                                                            echo Valida::FormataMoeda(
                                                                                $dadosNetaTT[$nu_codigo_n]['planejado']);
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                    <td class="linhan4-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNetaTT[$nu_codigo_n]['realizado'])) {
                                                                            echo Valida::FormataMoeda(
                                                                                $dadosNetaTT[$nu_codigo_n]['realizado']);
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                    <td class="linhan4-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNetaTT[$nu_codigo_n]['at'])) {
                                                                            echo $dadosNetaTT[$nu_codigo_n]['at'];
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
                                                if (!empty($dadosTT[9]['planejado'])) {
                                                    echo Valida::FormataMoeda($dadosTT[9]['planejado']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha9"><?php
                                                if (!empty($dadosTT[9]['realizado'])) {
                                                    echo Valida::FormataMoeda($dadosTT[9]['realizado']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha9"><?php
                                                if (!empty($dadosTT[9]['at'])) {
                                                    echo $dadosTT[9]['at'];
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
                                                if (!empty($dadosTT[10]['planejado'])) {
                                                    echo Valida::FormataMoeda($dadosTT[10]['planejado']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha10"><?php
                                                if (!empty($dadosTT[10]['realizado'])) {
                                                    echo Valida::FormataMoeda($dadosTT[10]['realizado']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha10"><?php
                                                if (!empty($dadosTT[10]['at'])) {
                                                    echo $dadosTT[10]['at'];
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
                                                if (!empty($dadosTT[5]['planejado'])) {
                                                    echo Valida::FormataMoeda($dadosTT[5]['planejado']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha5"><?php
                                                if (!empty($dadosTT[5]['realizado'])) {
                                                    echo Valida::FormataMoeda($dadosTT[5]['realizado']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha5"><?php
                                                if (!empty($dadosTT[5]['at'])) {
                                                    echo $dadosTT[5]['at'];
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                        </tr>

                                    </table>
                                </div>
                                <?php
                                if (!empty($dadosTT[5]['filhas'])) {
                                    foreach ($dadosTT[5]['filhas'] as $nu_codigo => $filha) {
                                        ?>
                                        <div class="filhas5" style="display: none;">
                                            <div class="grid-item grid-item-filha"
                                                 data-hover="linhaf5-<?= $nu_codigo; ?>">
                                                <table>
                                                    <tr>
                                                        <td class="linhaf5-<?= $nu_codigo; ?>"><?php
                                                            if (!empty(
                                                            $dadosTT[5]['filhas'][$nu_codigo]['planejado'])) {
                                                                echo Valida::FormataMoeda(
                                                                    $dadosTT[5]['filhas'][$nu_codigo]['planejado']);
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                        <td class="linhaf5-<?= $nu_codigo; ?>"><?php
                                                            if (!empty($dadosTT[5]['filhas'][$nu_codigo]['realizado'])) {
                                                                echo Valida::FormataMoeda($dadosTT[5]['filhas'][$nu_codigo]['realizado']);
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                        <td class="linhaf5-<?= $nu_codigo; ?>"><?php
                                                            if (!empty($dadosTT[5]['filhas'][$nu_codigo]['at'])) {
                                                                echo $dadosTT[5]['filhas'][$nu_codigo]['at'];
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                    </tr>
                                                </table>
                                            </div>

                                            <?php
                                            if (!empty($filha['netas'])) {
                                                $dadosNetaTT = [];
                                                if (!empty($dadosTT[5]['filhas'][$nu_codigo]['netas']))
                                                    $dadosNetaTT = $dadosTT[5]['filhas'][$nu_codigo]['netas'];
                                                foreach ($filha['netas'] as $nu_codigo_n => $neta) { ?>
                                                    <div class="filhasf5-<?= $nu_codigo; ?>" style="display: none;">
                                                        <div class="grid-item grid-item-neta"
                                                             data-hover="linhan5-<?= $nu_codigo_n; ?>">
                                                            <table>
                                                                <tr>
                                                                    <td class="linhan5-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNetaTT[$nu_codigo_n]['planejado'])) {
                                                                            echo Valida::FormataMoeda(
                                                                                $dadosNetaTT[$nu_codigo_n]['planejado']);
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                    <td class="linhan5-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNetaTT[$nu_codigo_n]['realizado'])) {
                                                                            echo Valida::FormataMoeda(
                                                                                $dadosNetaTT[$nu_codigo_n]['realizado']);
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                    <td class="linhan5-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNetaTT[$nu_codigo_n]['at'])) {
                                                                            echo $dadosNetaTT[$nu_codigo_n]['at'];
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
                                                if (!empty($dadosTT[6]['planejado'])) {
                                                    echo Valida::FormataMoeda($dadosTT[6]['planejado']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha6"><?php
                                                if (!empty($dadosTT[6]['realizado'])) {
                                                    echo Valida::FormataMoeda($dadosTT[6]['realizado']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha6"><?php
                                                if (!empty($dadosTT[6]['at'])) {
                                                    echo $dadosTT[6]['at'];
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                        </tr>

                                    </table>
                                </div>
                                <?php
                                if (!empty($dadosTT[6]['filhas'])) {
                                    foreach ($dadosTT[6]['filhas'] as $nu_codigo => $filha) {
                                        ?>
                                        <div class="filhas6" style="display: none;">
                                            <div class="grid-item grid-item-filha"
                                                 data-hover="linhaf6-<?= $nu_codigo; ?>">
                                                <table>
                                                    <tr>
                                                        <td class="linhaf6-<?= $nu_codigo; ?>"><?php
                                                            if (!empty(
                                                            $dadosTT[6]['filhas'][$nu_codigo]['planejado'])) {
                                                                echo Valida::FormataMoeda(
                                                                    $dadosTT[6]['filhas'][$nu_codigo]['planejado']);
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                        <td class="linhaf6-<?= $nu_codigo; ?>"><?php
                                                            if (!empty($dadosTT[6]['filhas'][$nu_codigo]['realizado'])) {
                                                                echo Valida::FormataMoeda($dadosTT[6]['filhas'][$nu_codigo]['realizado']);
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                        <td class="linhaf6-<?= $nu_codigo; ?>"><?php
                                                            if (!empty($dadosTT[6]['filhas'][$nu_codigo]['at'])) {
                                                                echo $dadosTT[6]['filhas'][$nu_codigo]['at'];
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?></td>
                                                    </tr>
                                                </table>
                                            </div>

                                            <?php
                                            if (!empty($filha['netas'])) {
                                                $dadosNetaTT = [];
                                                if (!empty($dadosTT[6]['filhas'][$nu_codigo]['netas']))
                                                    $dadosNetaTT = $dadosTT[6]['filhas'][$nu_codigo]['netas'];
                                                foreach ($filha['netas'] as $nu_codigo_n => $neta) { ?>
                                                    <div class="filhasf6-<?= $nu_codigo; ?>" style="display: none;">
                                                        <div class="grid-item grid-item-neta"
                                                             data-hover="linhan6-<?= $nu_codigo_n; ?>">
                                                            <table>
                                                                <tr>
                                                                    <td class="linhan6-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNetaTT[$nu_codigo_n]['planejado'])) {
                                                                            echo Valida::FormataMoeda(
                                                                                $dadosNetaTT[$nu_codigo_n]['planejado']);
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                    <td class="linhan6-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNetaTT[$nu_codigo_n]['realizado'])) {
                                                                            echo Valida::FormataMoeda(
                                                                                $dadosNetaTT[$nu_codigo_n]['realizado']);
                                                                        } else {
                                                                            echo '-';
                                                                        }
                                                                        ?></td>
                                                                    <td class="linhan6-<?= $nu_codigo_n; ?>"><?php
                                                                        if (!empty($dadosNetaTT[$nu_codigo_n]['at'])) {
                                                                            echo $dadosNetaTT[$nu_codigo_n]['at'];
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
                                                if (!empty($dadosTT[11]['planejado'])) {
                                                    echo Valida::FormataMoeda($dadosTT[11]['planejado']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha11"><?php
                                                if (!empty($dadosTT[11]['realizado'])) {
                                                    echo Valida::FormataMoeda($dadosTT[11]['realizado']);
                                                } else {
                                                    echo '-';
                                                }
                                                ?></td>
                                            <td class="linha11"><?php
                                                if (!empty($dadosTT[11]['at'])) {
                                                    echo $dadosTT[11]['at'];
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