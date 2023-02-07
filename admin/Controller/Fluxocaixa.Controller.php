<?php

class Fluxocaixa extends AbstractController
{
    public $result;
    public $formCat;
    public $formConta;
    public $formCliFor;
    public $formEntrada;
    public $formSaida;
    public $formPesquisa;
    public $bancos;
    public $transferencias;
    public $representacoes;
    public $centros;
    public $formTransSaldo;
    public $dadosFC;
    public $dadosTT;
    public $dadosA;
    public $dadosB;
    public $dadosFN;
    public $condicoes;

    public function Lancamento()
    {
        /** @var ContaBancariaService $ContaBancariaService */
        $ContaBancariaService = $this->getService(CONTA_BANCARIA_SERVICE);
        /** @var HistTransferenciaService $HistTransferenciaService */
        $HistTransferenciaService = $this->getService(HIST_TRANSFERENCIA_SERVICE);
        /** @var UsuarioService $UsuarioService */
        $UsuarioService = $this->getService(USUARIO_SERVICE);
        /** @var RepresentacaoService $RepresentacaoService */
        $RepresentacaoService = $this->getService(REPRESENTACAO_SERVICE);
        /** @var CentroCustoService $CentroCustoService */
        $CentroCustoService = $this->getService(CENTRO_CUSTO_SERVICE);
        /** @var FluxoCaixaService $FluxoCaixaService */
        $FluxoCaixaService = $this->getService(FLUXO_CAIXA_SERVICE);

        //PESQUISA AVANÇADA
        /** @var Session $session */
        $session = new Session();
        $Condicoes = [];
        $session->setSession(PESQUISA_AVANCADA, $Condicoes);
        if (!empty($_POST["PesquisaLancamento"])) {
            $_POST[CO_ASSINANTE] = AssinanteService::getCoAssinanteLogado();
            $this->result = $FluxoCaixaService->PesquisaAvancada($_POST);
        } else {
            $this->result = $FluxoCaixaService->PesquisaAvancada([
                CO_ASSINANTE => AssinanteService::getCoAssinanteLogado()
            ]);
        }

        $this->formCat = FluxocaixaForm::CadastrarFluxocaixa([
            CO_ASSINANTE => AssinanteService::getCoAssinanteLogado()
        ]);
        $this->formConta = FluxocaixaForm::CadastrarContaBancaria([
            CO_CONTA_BANCARIA => null,
            CO_ASSINANTE => AssinanteService::getCoAssinanteLogado()
        ]);
        $this->formTransSaldo = FluxocaixaForm::TransfSaldo([]);
        $this->formCliFor = FluxocaixaForm::Representacao([
            CO_REPRESENTACAO => null,
            CO_ASSINANTE => AssinanteService::getCoAssinanteLogado()
        ]);

        $this->formCarteira = FluxocaixaForm::CentroCustos([
            CO_CENTRO_CUSTO => null,
            CO_ASSINANTE => AssinanteService::getCoAssinanteLogado()
        ]);

        $this->formEntrada = FluxocaixaForm::FCEntrada([
            CO_FLUXO_CAIXA => null,
            CO_ASSINANTE => AssinanteService::getCoAssinanteLogado()
        ]);

        $this->formSaida = FluxocaixaForm::FCSaida([
            CO_FLUXO_CAIXA => null,
            CO_ASSINANTE => AssinanteService::getCoAssinanteLogado()
        ]);

        $resultVlr = $FluxoCaixaService->PesquisaAvancadaValorPesquisa();
        $vl1 = $resultVlr['menor_valor_pago'];
        if ($resultVlr['menor_valor'] < $resultVlr['menor_valor_pago']) {
            $vl1 = $resultVlr['menor_valor'];
        }
        $vl2 = $resultVlr['maior_valor_pago'];
        if ($resultVlr['maior_valor'] < $resultVlr['maior_valor_pago']) {
            $vl2 = $resultVlr['maior_valor'];
        }

        $resultValores = $vl1 . '==' . $vl2;
        $this->formPesquisa = FluxocaixaForm::PesquisaLancamento($resultValores);

        $this->bancos = $ContaBancariaService->PesquisaAvancada([
            CO_ASSINANTE => AssinanteService::getCoAssinanteLogado()
        ]);

        $this->transferencias = $HistTransferenciaService->PesquisaTodos([
            CO_ASSINANTE => AssinanteService::getCoAssinanteLogado()
        ]);
        $this->representacoes = $RepresentacaoService->PesquisaTodos([
            CO_ASSINANTE => AssinanteService::getCoAssinanteLogado()
        ]);
        $this->centros = $CentroCustoService->PesquisaTodos([
            CO_ASSINANTE => AssinanteService::getCoAssinanteLogado()
        ]);

        $i = 0;
        /** @var HistTransferenciaEntidade $trans */
        foreach ($this->transferencias as $trans) {
            /** @var ContaBancariaEntidade $contaOrig */
            $contaOrig = $ContaBancariaService->PesquisaUmRegistro($trans->getCoContaBancariaOrigem());
            $trans->setCoContaBancariaOrigem($contaOrig);
            /** @var ContaBancariaEntidade $contaDest */
            $contaDest = $ContaBancariaService->PesquisaUmRegistro($trans->getCoContaBancariaDestino());
            $trans->setCoContaBancariaDestino($contaDest);
            /** @var UsuarioEntidade $user */
            $user = $UsuarioService->PesquisaUmRegistro($trans->getCoUsuario()->getCoUsuario());
            $trans->setCoUsuario($user);
            $this->transferencias[$i] = $trans;
            $i++;
        }
    }

    public static function CadastroCategoriaFC($dados)
    {
        /** @var CategoriaFcService $CategoriaFcService */
        $CategoriaFcService = static::getServiceStatic(CATEGORIA_FC_SERVICE);
        return $CategoriaFcService->CadastroCategoriaFC($dados);
    }

    public static function AlteraCategoriaFC($dados)
    {
        /** @var CategoriaFcService $CategoriaFcService */
        $CategoriaFcService = static::getServiceStatic(CATEGORIA_FC_SERVICE);
        return $CategoriaFcService->AlteraCategoriaFC($dados);
    }

    public static function ExcluiCategoriaFC($dados)
    {
        /** @var CategoriaFcService $CategoriaFcService */
        $CategoriaFcService = static::getServiceStatic(CATEGORIA_FC_SERVICE);
        return $CategoriaFcService->ExcluiCategoriaFC($dados);
    }

    public static function PesquisaNuCodigo($dados)
    {
        /** @var CategoriaFcService $CategoriaFcService */
        $CategoriaFcService = static::getServiceStatic(CATEGORIA_FC_SERVICE);
        return $CategoriaFcService->PesquisaNuCodigo($dados);
    }

    public function CategoriasFCCombo()
    {
        /** @var CategoriaFcService $CategoriaFcService */
        $CategoriaFcService = $this->getService(CATEGORIA_FC_SERVICE);
        return $CategoriaFcService->CategoriasFCCombo();
    }

    public function CategoriasFCComboEntrada()
    {
        /** @var CategoriaFcService $CategoriaFcService */
        $CategoriaFcService = $this->getService(CATEGORIA_FC_SERVICE);
        return $CategoriaFcService->CategoriasFCComboEntrada();
    }

    public function CategoriasFCComboSaida()
    {
        /** @var CategoriaFcService $CategoriaFcService */
        $CategoriaFcService = $this->getService(CATEGORIA_FC_SERVICE);
        return $CategoriaFcService->CategoriasFCComboSaida();
    }

    public function EstruturaCategoriasFC()
    {
        /** @var CategoriaFcService $CategoriaFcService */
        $CategoriaFcService = $this->getService(CATEGORIA_FC_SERVICE);
        return $CategoriaFcService->EstruturaCategoriasFC();
    }

    public static function CadastroContaBancaria($dados)
    {
        /** @var ContaBancariaService $ContaBancariaService */
        $ContaBancariaService = static::getServiceStatic(CONTA_BANCARIA_SERVICE);
        return $ContaBancariaService->CadastroContaBancaria($dados);
    }

    public static function GerarHistorico($dados)
    {
        /** @var ContaBancariaService $ContaBancariaService */
        $ContaBancariaService = static::getServiceStatic(CONTA_BANCARIA_SERVICE);
        return $ContaBancariaService->GerarHistorico($dados);
    }

    public static function getSaldoContaBancaria($dados)
    {
        /** @var ContaBancariaService $ContaBancariaService */
        $ContaBancariaService = static::getServiceStatic(CONTA_BANCARIA_SERVICE);
        return $ContaBancariaService->getSaldoContaBancaria($dados);
    }

    public static function TransferiSaldoCB($dados)
    {
        /** @var HistTransferenciaService $HistTransferenciaService */
        $HistTransferenciaService = static::getServiceStatic(HIST_TRANSFERENCIA_SERVICE);
        return $HistTransferenciaService->TransferiSaldoCB($dados);
    }

    public static function CadastroRepresentacao($dados)
    {
        /** @var RepresentacaoService $RepresentacaoService */
        $RepresentacaoService = static::getServiceStatic(REPRESENTACAO_SERVICE);
        return $RepresentacaoService->CadastroRepresentacao($dados);
    }

    public static function CadastroCentroCustos($dados)
    {
        /** @var CentroCustoService $CentroCustoService */
        $CentroCustoService = static::getServiceStatic(CENTRO_CUSTO_SERVICE);
        return $CentroCustoService->CadastroCentroCustos($dados);
    }

    public static function CadastroFCEntrada($dados)
    {
        /** @var FluxoCaixaService $FluxoCaixaService */
        $FluxoCaixaService = static::getServiceStatic(FLUXO_CAIXA_SERVICE);
        return $FluxoCaixaService->CadastroFCEntrada($dados);
    }

    public static function CadastroFCSaida($dados)
    {
        /** @var FluxoCaixaService $FluxoCaixaService */
        $FluxoCaixaService = static::getServiceStatic(FLUXO_CAIXA_SERVICE);
        return $FluxoCaixaService->CadastroFCSaida($dados);
    }

    public static function getLancamentoFC($dados)
    {
        /** @var FluxoCaixaService $FluxoCaixaService */
        $FluxoCaixaService = static::getServiceStatic(FLUXO_CAIXA_SERVICE);
        return $FluxoCaixaService->getLancamentoFC($dados);
    }

    public static function DelFluxoCaixa($dados)
    {
        /** @var FluxoCaixaService $FluxoCaixaService */
        $FluxoCaixaService = static::getServiceStatic(FLUXO_CAIXA_SERVICE);
        return $FluxoCaixaService->DelFluxoCaixa($dados);
    }

    public static function BaixarPagamentos($dados)
    {
        /** @var FluxoCaixaService $FluxoCaixaService */
        $FluxoCaixaService = static::getServiceStatic(FLUXO_CAIXA_SERVICE);
        return $FluxoCaixaService->BaixarPagamentos($dados);
    }

    public function ListarFluxoCaixa()
    {
        /** @var FluxoCaixaService $FluxoCaixaService */
        $FluxoCaixaService = $this->getService(FLUXO_CAIXA_SERVICE);
        $Condicoes = [];

        if (!empty($_POST)) {
            $Condicoes = $_POST;
            $fluxos = $FluxoCaixaService->PesquisaAvancadaFC($Condicoes);
        } else {
            $Condicoes["anoPesquisa"] = date('Y');
            $Condicoes[CO_CENTRO_CUSTO] = '';
            $Condicoes["verEsperado"] = 1;
            $fluxos = $FluxoCaixaService->PesquisaAvancadaFC($Condicoes);
        }

        $this->condicoes = $Condicoes;

        $dados = [];
        $dadosTT = [];
        $meses = [];
        foreach ($fluxos as $fc) {
            if (!empty($fc["dt_realizado"])) {
                $mesano = Valida::DataShow($fc["dt_realizado"], 'Ym');
            } elseif (!empty($fc["dt_vencimento"])) {
                $mesano = Valida::DataShow($fc["dt_vencimento"], 'Ym');
            }
            if (empty($meses[$mesano])) {
                $meses[$mesano] = $mesano;
            }

            if ($fc["nu_valor_pago"]) {
                if (!empty($dados[$mesano][$fc["co_categoria_fc"]]['esperado'])) {
                    $dados[$mesano][$fc["co_categoria_fc"]]['esperado'] =
                        ($dados[$mesano][$fc["co_categoria_fc"]]['esperado'] + $fc["nu_valor_pago"]);
                } else {
                    $dados[$mesano][$fc["co_categoria_fc"]]['esperado'] = $fc["nu_valor_pago"];
                }
                // Total esperado
                if (!empty($dadosTT[$fc["co_categoria_fc"]]['esperado'])) {
                    $dadosTT[$fc["co_categoria_fc"]]['esperado'] =
                        ($dadosTT[$fc["co_categoria_fc"]]['esperado'] + $fc["nu_valor_pago"]);
                } else {
                    $dadosTT[$fc["co_categoria_fc"]]['esperado'] = $fc["nu_valor_pago"];
                }

                if (!empty($dadosTT[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]['esperado'])) {
                    $dadosTT[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]['esperado'] =
                        ($dadosTT[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]['esperado'] + $fc["nu_valor_pago"]);
                } else {
                    $dadosTT[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]['esperado'] = $fc["nu_valor_pago"];
                }

                if (!empty($dados[$mesano][$fc["co_categoria_fc"]]['realizado'])) {
                    $dados[$mesano][$fc["co_categoria_fc"]]['realizado'] =
                        ($dados[$mesano][$fc["co_categoria_fc"]]['realizado'] + $fc["nu_valor_pago"]);
                } else {
                    $dados[$mesano][$fc["co_categoria_fc"]]['realizado'] = $fc["nu_valor_pago"];
                }

                if (!empty($dados[$mesano][$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]['realizado'])) {
                    $dados[$mesano][$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]['realizado'] =
                        ($dados[$mesano][$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]['realizado']
                            + $fc["nu_valor_pago"]);
                } else if ($fc["no_filha"]) {
                    $dados[$mesano][$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]['realizado'] = $fc["nu_valor_pago"];
                    $dados[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]['no_filha'] =
                        $fc["nu_codigo_f"] . ' - ' . $fc["no_filha"];
                }

                if (!empty($dados[$mesano][$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]['esperado'])) {
                    $dados[$mesano][$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]['esperado'] =
                        ($dados[$mesano][$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]['esperado']
                            + $fc["nu_valor_pago"]);
                } else if ($fc["no_filha"]) {
                    $dados[$mesano][$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]['esperado'] = $fc["nu_valor_pago"];
                    $dados[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]['no_filha'] =
                        $fc["nu_codigo_f"] . ' - ' . $fc["no_filha"];
                }

                if (!empty($dados[$mesano][$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]
                ['netas'][$fc["co_categoria_fc_neta"]]['esperado'])) {
                    $dados[$mesano][$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]['netas']
                    [$fc["co_categoria_fc_neta"]]['esperado'] =
                        ($dados[$mesano][$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]
                            ['netas'][$fc["co_categoria_fc_neta"]]['esperado']
                            + $fc["nu_valor_pago"]);
                } else if ($fc["no_neta"]) {
                    $dados[$mesano][$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]
                    ['netas'][$fc["co_categoria_fc_neta"]]['esperado'] = $fc["nu_valor_pago"];
                    $dados[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]
                    ['netas'][$fc["co_categoria_fc_neta"]]['no_neta'] =
                        $fc["nu_codigo_n"] . ' - ' . $fc["no_neta"];
                }

                if (!empty($dados[$mesano][$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]
                ['netas'][$fc["co_categoria_fc_neta"]]['realizado'])) {
                    $dados[$mesano][$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]['netas']
                    [$fc["co_categoria_fc_neta"]]['realizado'] =
                        ($dados[$mesano][$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]
                            ['netas'][$fc["co_categoria_fc_neta"]]['realizado']
                            + $fc["nu_valor_pago"]);
                } else if ($fc["no_neta"]) {
                    $dados[$mesano][$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]
                    ['netas'][$fc["co_categoria_fc_neta"]]['realizado'] = $fc["nu_valor_pago"];
                    $dados[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]
                    ['netas'][$fc["co_categoria_fc_neta"]]['no_neta'] =
                        $fc["nu_codigo_n"] . ' - ' . $fc["no_neta"];
                }

                if (!empty($dadosTT[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]
                ['netas'][$fc["co_categoria_fc_neta"]]['esperado'])) {
                    $dadosTT[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]['netas']
                    [$fc["co_categoria_fc_neta"]]['esperado'] =
                        ($dadosTT[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]
                            ['netas'][$fc["co_categoria_fc_neta"]]['esperado']
                            + $fc["nu_valor_pago"]);
                } else if ($fc["no_neta"]) {
                    $dadosTT[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]
                    ['netas'][$fc["co_categoria_fc_neta"]]['esperado'] = $fc["nu_valor_pago"];
                    $dadosTT[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]
                    ['netas'][$fc["co_categoria_fc_neta"]]['no_neta'] =
                        $fc["nu_codigo_n"] . ' - ' . $fc["no_neta"];
                }

                if (!empty($dadosTT[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]
                ['netas'][$fc["co_categoria_fc_neta"]]['realizado'])) {
                    $dadosTT[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]['netas']
                    [$fc["co_categoria_fc_neta"]]['realizado'] =
                        ($dadosTT[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]
                            ['netas'][$fc["co_categoria_fc_neta"]]['realizado']
                            + $fc["nu_valor_pago"]);
                } else if ($fc["no_neta"]) {
                    $dadosTT[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]
                    ['netas'][$fc["co_categoria_fc_neta"]]['realizado'] = $fc["nu_valor_pago"];
                    $dadosTT[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]
                    ['netas'][$fc["co_categoria_fc_neta"]]['no_neta'] =
                        $fc["nu_codigo_n"] . ' - ' . $fc["no_neta"];
                }

                // Total realizado
                if (!empty($dadosTT[$fc["co_categoria_fc"]]['realizado'])) {
                    $dadosTT[$fc["co_categoria_fc"]]['realizado'] =
                        ($dadosTT[$fc["co_categoria_fc"]]['realizado'] + $fc["nu_valor_pago"]);
                } else {
                    $dadosTT[$fc["co_categoria_fc"]]['realizado'] = $fc["nu_valor_pago"];
                }

                if (!empty($dadosTT[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]['realizado'])) {
                    $dadosTT[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]['realizado'] =
                        ($dadosTT[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]['realizado'] + $fc["nu_valor_pago"]);
                } else {
                    $dadosTT[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]['realizado'] = $fc["nu_valor_pago"];
                }
            } elseif ($fc["nu_valor"]) {
                if (!empty($dados[$mesano][$fc["co_categoria_fc"]]['esperado'])) {
                    $dados[$mesano][$fc["co_categoria_fc"]]['esperado'] =
                        ($dados[$mesano][$fc["co_categoria_fc"]]['esperado'] + $fc["nu_valor"]);
                } else {
                    $dados[$mesano][$fc["co_categoria_fc"]]['esperado'] = $fc["nu_valor"];
                }

                // Total esperado
                if (!empty($dadosTT[$fc["co_categoria_fc"]]['esperado'])) {
                    $dadosTT[$fc["co_categoria_fc"]]['esperado'] =
                        ($dadosTT[$fc["co_categoria_fc"]]['esperado'] + $fc["nu_valor"]);
                } else {
                    $dadosTT[$fc["co_categoria_fc"]]['esperado'] = $fc["nu_valor"];
                }

                if (!empty($dados[$mesano][$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]['esperado'])) {
                    $dados[$mesano][$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]['esperado'] =
                        ($dados[$mesano][$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]['esperado']
                            + $fc["nu_valor"]);
                } else if ($fc["no_filha"]) {
                    $dados[$mesano][$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]['esperado'] = $fc["nu_valor"];
                    $dados[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]['no_filha'] =
                        $fc["nu_codigo_f"] . ' - ' . $fc["no_filha"];
                }

                if (!empty($dados[$mesano][$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]
                ['netas'][$fc["co_categoria_fc_neta"]]['esperado'])) {
                    $dados[$mesano][$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]['netas']
                    [$fc["co_categoria_fc_neta"]]['esperado'] =
                        ($dados[$mesano][$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]
                            ['netas'][$fc["co_categoria_fc_neta"]]['esperado']
                            + $fc["nu_valor"]);
                } else if ($fc["no_neta"]) {
                    $dados[$mesano][$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]
                    ['netas'][$fc["co_categoria_fc_neta"]]['esperado'] = $fc["nu_valor"];
                    $dados[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]
                    ['netas'][$fc["co_categoria_fc_neta"]]['no_neta'] =
                        $fc["nu_codigo_n"] . ' - ' . $fc["no_neta"];
                }


                if (!empty($dadosTT[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]
                ['netas'][$fc["co_categoria_fc_neta"]]['esperado'])) {
                    $dadosTT[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]['netas']
                    [$fc["co_categoria_fc_neta"]]['esperado'] =
                        ($dadosTT[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]
                            ['netas'][$fc["co_categoria_fc_neta"]]['realizado']
                            + $fc["nu_valor"]);
                } else if ($fc["no_neta"]) {
                    $dadosTT[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]
                    ['netas'][$fc["co_categoria_fc_neta"]]['esperado'] = $fc["nu_valor"];
                    $dadosTT[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]
                    ['netas'][$fc["co_categoria_fc_neta"]]['no_neta'] =
                        $fc["nu_codigo_n"] . ' - ' . $fc["no_neta"];
                }

                if (!empty($dadosTT[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]['esperado'])) {
                    $dadosTT[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]['esperado'] =
                        ($dadosTT[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]['esperado'] + $fc["nu_valor"]);
                } else {
                    $dadosTT[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]['esperado'] = $fc["nu_valor"];
                }
            }
        }

        $meses = array_reverse($meses);

        foreach ($meses as $mes) {
            // MARGEM DE CONTRIBUIÇÃO
            if ((!empty($dados[$mes][1]['esperado'])) && (!empty($dados[$mes][2]['esperado']))) {
                $dados[$mes][7]['esperado'] =
                    ($dados[$mes][1]['esperado'] - $dados[$mes][2]['esperado']);
            }
            if ((!empty($dados[$mes][1]['realizado'])) && (!empty($dados[$mes][2]['realizado']))) {
                $dados[$mes][7]['realizado'] =
                    ($dados[$mes][1]['realizado'] - $dados[$mes][2]['realizado']);
            }
            if ((!empty($dados[$mes][1]['esperado'])) && (empty($dados[$mes][2]['esperado']))) {
                $dados[$mes][7]['esperado'] = $dados[$mes][1]['esperado'];
            }
            if ((!empty($dados[$mes][1]['realizado'])) && (empty($dados[$mes][2]['realizado']))) {
                $dados[$mes][7]['realizado'] = $dados[$mes][1]['realizado'];
            }

            // Total MARGEM DE CONTRIBUIÇÃO esperado
            if ((!empty($dados[$mes][7]['esperado'])) && (empty($dadosTT[7]['esperado']))) {
                $dadosTT[7]['esperado'] = $dados[$mes][7]['esperado'];
            } elseif ((!empty($dados[$mes][7]['esperado'])) && (!empty($dadosTT[7]['esperado']))) {
                $dadosTT[7]['esperado'] = $dadosTT[7]['esperado'] + $dados[$mes][7]['esperado'];
            }
            // Total MARGEM DE CONTRIBUIÇÃO realizado
            if ((!empty($dados[$mes][7]['realizado'])) && (empty($dadosTT[7]['realizado']))) {
                $dadosTT[7]['realizado'] = $dados[$mes][7]['realizado'];
            } elseif ((!empty($dados[$mes][7]['realizado'])) && (!empty($dadosTT[7]['realizado']))) {
                $dadosTT[7]['realizado'] = $dadosTT[7]['realizado'] + $dados[$mes][7]['realizado'];
            }

            // LLAI (Lucro Líquido Antes dos Investimentos)
            if ((!empty($dados[$mes][7]['esperado'])) && (!empty($dados[$mes][3]['esperado']))) {
                $dados[$mes][8]['esperado'] =
                    ($dados[$mes][7]['esperado'] - $dados[$mes][3]['esperado']);
            }
            if ((!empty($dados[$mes][7]['realizado'])) && (!empty($dados[$mes][3]['realizado']))) {
                $dados[$mes][8]['realizado'] =
                    ($dados[$mes][7]['realizado'] - $dados[$mes][3]['realizado']);
            }
            if ((!empty($dados[$mes][7]['esperado'])) && (empty($dados[$mes][3]['esperado']))) {
                $dados[$mes][8]['esperado'] = $dados[$mes][7]['esperado'];
            }
            if ((!empty($dados[$mes][7]['realizado'])) && (empty($dados[$mes][3]['realizado']))) {
                $dados[$mes][8]['realizado'] = $dados[$mes][7]['realizado'];
            }

            // Total LLAI (Lucro Líquido Antes dos Investimentos) esperado
            if ((!empty($dados[$mes][8]['esperado'])) && (empty($dadosTT[8]['esperado']))) {
                $dadosTT[8]['esperado'] = $dados[$mes][8]['esperado'];
            } elseif ((!empty($dados[$mes][8]['esperado'])) && (!empty($dadosTT[8]['esperado']))) {
                $dadosTT[8]['esperado'] = $dadosTT[8]['esperado'] + $dados[$mes][8]['esperado'];
            }
            // Total LLAI (Lucro Líquido Antes dos Investimentos) realizado
            if ((!empty($dados[$mes][8]['realizado'])) && (empty($dadosTT[8]['realizado']))) {
                $dadosTT[8]['realizado'] = $dados[$mes][8]['realizado'];
            } elseif ((!empty($dados[$mes][8]['realizado'])) && (!empty($dadosTT[8]['realizado']))) {
                $dadosTT[8]['realizado'] = $dadosTT[8]['realizado'] + $dados[$mes][8]['realizado'];
            }

            // DESPESA LÍQUIDA TOTAL
            if (!empty($dados[$mes][2]['esperado'])) {
                if (!empty($dados[$mes][9]['esperado'])) {
                    $dados[$mes][9]['esperado'] =
                        ($dados[$mes][9]['esperado'] + $dados[$mes][2]['esperado']);
                } else {
                    $dados[$mes][9]['esperado'] = $dados[$mes][2]['esperado'];
                }
            }
            if (!empty($dados[$mes][2]['realizado'])) {
                if (!empty($dados[$mes][9]['realizado'])) {
                    $dados[$mes][9]['realizado'] =
                        ($dados[$mes][9]['realizado'] + $dados[$mes][2]['realizado']);
                } else {
                    $dados[$mes][9]['realizado'] = $dados[$mes][2]['realizado'];
                }
            }
            if (!empty($dados[$mes][3]['esperado'])) {
                if (!empty($dados[$mes][9]['esperado'])) {
                    $dados[$mes][9]['esperado'] =
                        ($dados[$mes][9]['esperado'] + $dados[$mes][3]['esperado']);
                } else {
                    $dados[$mes][9]['esperado'] = $dados[$mes][3]['esperado'];
                }
            }
            if (!empty($dados[$mes][3]['realizado'])) {
                if (!empty($dados[$mes][9]['realizado'])) {
                    $dados[$mes][9]['realizado'] =
                        ($dados[$mes][9]['realizado'] + $dados[$mes][3]['realizado']);
                } else {
                    $dados[$mes][9]['realizado'] = $dados[$mes][3]['realizado'];
                }
            }
            if (!empty($dados[$mes][4]['esperado'])) {
                if (!empty($dados[$mes][9]['esperado'])) {
                    $dados[$mes][9]['esperado'] =
                        ($dados[$mes][9]['esperado'] + $dados[$mes][4]['esperado']);
                } else {
                    $dados[$mes][9]['esperado'] = $dados[$mes][4]['esperado'];
                }
            }
            if (!empty($dados[$mes][4]['realizado'])) {
                if (!empty($dados[$mes][9]['realizado'])) {
                    $dados[$mes][9]['realizado'] =
                        ($dados[$mes][9]['realizado'] + $dados[$mes][4]['realizado']);
                } else {
                    $dados[$mes][9]['realizado'] = $dados[$mes][4]['realizado'];
                }
            }

            // Total DESPESA LÍQUIDA TOTAL esperado
            if ((!empty($dados[$mes][9]['esperado'])) && (empty($dadosTT[9]['esperado']))) {
                $dadosTT[9]['esperado'] = $dados[$mes][9]['esperado'];
            } elseif ((!empty($dados[$mes][9]['esperado'])) && (!empty($dadosTT[9]['esperado']))) {
                $dadosTT[9]['esperado'] = $dadosTT[9]['esperado'] + $dados[$mes][9]['esperado'];
            }
            // Total DESPESA LÍQUIDA TOTAL realizado
            if ((!empty($dados[$mes][9]['realizado'])) && (empty($dadosTT[9]['realizado']))) {
                $dadosTT[9]['realizado'] = $dados[$mes][9]['realizado'];
            } elseif ((!empty($dados[$mes][9]['realizado'])) && (!empty($dadosTT[9]['realizado']))) {
                $dadosTT[9]['realizado'] = $dadosTT[9]['realizado'] + $dados[$mes][9]['realizado'];
            }


            // LUCRO LÍQUIDO
            if (!empty($dados[$mes][1]['esperado'])) {
                $dados[$mes][10]['esperado'] = $dados[$mes][1]['esperado'];
            }
            if (!empty($dados[$mes][1]['realizado'])) {
                $dados[$mes][10]['realizado'] = $dados[$mes][1]['realizado'];
            }

            if (!empty($dados[$mes][9]['esperado'])) {
                if (!empty($dados[$mes][10]['esperado'])) {
                    $dados[$mes][10]['esperado'] =
                        ($dados[$mes][10]['esperado'] - $dados[$mes][9]['esperado']);
                } else {
                    $dados[$mes][10]['esperado'] = 0 - $dados[$mes][9]['esperado'];
                }
            }

            if (!empty($dados[$mes][9]['realizado'])) {
                if (!empty($dados[$mes][10]['realizado'])) {
                    $dados[$mes][10]['realizado'] =
                        ($dados[$mes][10]['realizado'] - $dados[$mes][9]['realizado']);
                } else {
                    $dados[$mes][10]['realizado'] = 0 - $dados[$mes][9]['realizado'];
                }
            }

            // Total LUCRO LÍQUIDO esperado
            if ((!empty($dados[$mes][10]['esperado'])) && (empty($dadosTT[10]['esperado']))) {
                $dadosTT[10]['esperado'] = $dados[$mes][10]['esperado'];
            } elseif ((!empty($dados[$mes][10]['esperado'])) && (!empty($dadosTT[10]['esperado']))) {
                $dadosTT[10]['esperado'] = $dadosTT[10]['esperado'] + $dados[$mes][10]['esperado'];
            }
            // Total LUCRO LÍQUIDO realizado
            if ((!empty($dados[$mes][10]['realizado'])) && (empty($dadosTT[10]['realizado']))) {
                $dadosTT[10]['realizado'] = $dados[$mes][10]['realizado'];
            } elseif ((!empty($dados[$mes][10]['realizado'])) && (!empty($dadosTT[10]['realizado']))) {
                $dadosTT[10]['realizado'] = $dadosTT[10]['realizado'] + $dados[$mes][10]['realizado'];
            }


            // RESULTADO LÍQUIDO
            if (!empty($dados[$mes][10]['esperado'])) {
                $dados[$mes][11]['esperado'] = $dados[$mes][10]['esperado'];
            }
            if (!empty($dados[$mes][10]['realizado'])) {
                $dados[$mes][11]['realizado'] = $dados[$mes][10]['realizado'];
            }

            if (!empty($dados[$mes][5]['esperado'])) {
                if (!empty($dados[$mes][11]['esperado'])) {
                    $dados[$mes][11]['esperado'] =
                        ($dados[$mes][11]['esperado'] + $dados[$mes][5]['esperado']);
                } else {
                    $dados[$mes][11]['esperado'] = $dados[$mes][5]['esperado'];
                }
            }
            if (!empty($dados[$mes][5]['realizado'])) {
                if (!empty($dados[$mes][11]['realizado'])) {
                    $dados[$mes][11]['realizado'] =
                        ($dados[$mes][11]['realizado'] + $dados[$mes][5]['realizado']);
                } else {
                    $dados[$mes][11]['realizado'] = $dados[$mes][5]['realizado'];
                }
            }

            if (!empty($dados[$mes][6]['esperado'])) {
                if (!empty($dados[$mes][11]['esperado'])) {
                    $dados[$mes][11]['esperado'] =
                        ($dados[$mes][11]['esperado'] - $dados[$mes][6]['esperado']);
                } else {
                    $dados[$mes][11]['esperado'] = 0 - $dados[$mes][6]['esperado'];
                }
            }
            if (!empty($dados[$mes][6]['realizado'])) {
                if (!empty($dados[$mes][11]['realizado'])) {
                    $dados[$mes][11]['realizado'] =
                        ($dados[$mes][11]['realizado'] - $dados[$mes][6]['realizado']);
                } else {
                    $dados[$mes][11]['realizado'] = 0 - $dados[$mes][6]['realizado'];
                }
            }

            // Total RESULTADO LÍQUIDO esperado
            if ((!empty($dados[$mes][11]['esperado'])) && (empty($dadosTT[11]['esperado']))) {
                $dadosTT[11]['esperado'] = $dados[$mes][11]['esperado'];
            } elseif ((!empty($dados[$mes][11]['esperado'])) && (!empty($dadosTT[11]['esperado']))) {
                $dadosTT[11]['esperado'] = $dadosTT[11]['esperado'] + $dados[$mes][11]['esperado'];
            }
            // Total LUCRO LÍQUIDO realizado
            if ((!empty($dados[$mes][11]['realizado'])) && (empty($dadosTT[11]['realizado']))) {
                $dadosTT[11]['realizado'] = $dados[$mes][11]['realizado'];
            } elseif ((!empty($dados[$mes][11]['realizado'])) && (!empty($dadosTT[11]['realizado']))) {
                $dadosTT[11]['realizado'] = $dadosTT[11]['realizado'] + $dados[$mes][11]['realizado'];
            }

            // Calcular Análise Total POr Mês
            if (!empty($dados[$mes][1]['realizado'])) {
                $ttFat = $dados[$mes][1]['realizado'];
                $dados[$mes][1]['at'] = '100%';

                for ($i = 2; $i < 11; $i++) {
                    if (!empty($dados[$mes][$i]['realizado'])) {
                        $dados[$mes][$i]['at'] =
                            Valida::FormataPorcentagem(($dados[$mes][$i]['realizado'] / $ttFat) * 100);
                    }
                }

                for ($i = 1; $i < 7; $i++) {
                    if (!empty($dados[$mes][$i]['filhas'])) {
                        foreach ($dados[$mes][$i]['filhas'] as $nu_codigo => $filha) {
                            if (!empty($filha['realizado'])) {
                                $dados[$mes][$i]['filhas'][$nu_codigo]['at'] =
                                    Valida::FormataPorcentagem(($filha['realizado'] / $ttFat) * 100);

                                $dados = $this->calculaAcFilhas($mes, $i, $nu_codigo, $dados);


                                if (!empty($dados[$mes][$i]['filhas'][$nu_codigo]['netas'])) {
                                    foreach ($dados[$mes][$i]['filhas'][$nu_codigo]['netas'] as $nu_codigo_n => $neta) {
                                        if (!empty($neta['realizado'])) {
                                            $dados[$mes][$i]['filhas'][$nu_codigo]['netas'][$nu_codigo_n]['at'] =
                                                Valida::FormataPorcentagem(($neta['realizado'] / $ttFat) * 100);

                                            $dados = $this->calculaAcNetas($mes, $i, $nu_codigo, $nu_codigo_n, $dados);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }


            }

            for ($i = 1; $i <= 12; $i++) {
                $dados = $this->calculaAc($mes, $i, $dados);
            }

        }

        // Calcular Análise Total Do Total do Período
        if (!empty($dadosTT[1]['realizado'])) {
            $ttFat = $dadosTT[1]['realizado'];
            $dadosTT[1]['at'] = '100%';

            if (!empty($dadosTT[2]['realizado'])) {
                $ttFat = $dadosTT[1]['realizado'];
                $dadosTT[2]['at'] =
                    Valida::FormataPorcentagem(($dadosTT[2]['realizado'] / $ttFat) * 100);
                $dadosTT[7]['at'] =
                    Valida::FormataPorcentagem(($dadosTT[7]['realizado'] / $ttFat) * 100);
            } else {
                $dadosTT[7]['at'] = '100%';
            }

            if (!empty($dadosTT[3]['realizado'])) {
                $dadosTT[3]['at'] =
                    Valida::FormataPorcentagem(($dadosTT[3]['realizado'] / $ttFat) * 100);
            }

            if (!empty($dadosTT[4]['realizado'])) {
                $dadosTT[4]['at'] =
                    Valida::FormataPorcentagem(($dadosTT[4]['realizado'] / $ttFat) * 100);
            }

            if (!empty($dadosTT[5]['realizado'])) {
                $dadosTT[5]['at'] =
                    Valida::FormataPorcentagem(($dadosTT[5]['realizado'] / $ttFat) * 100);
            }

            if (!empty($dadosTT[6]['realizado'])) {
                $dadosTT[6]['at'] =
                    Valida::FormataPorcentagem(($dadosTT[6]['realizado'] / $ttFat) * 100);
            }

            if (!empty($dadosTT[8]['realizado'])) {
                $dadosTT[8]['at'] =
                    Valida::FormataPorcentagem(($dadosTT[8]['realizado'] / $ttFat) * 100);
            }

            if (!empty($dadosTT[9]['realizado'])) {
                $dadosTT[9]['at'] =
                    Valida::FormataPorcentagem(($dadosTT[9]['realizado'] / $ttFat) * 100);
            }

            if (!empty($dadosTT[10]['realizado'])) {
                $dadosTT[10]['at'] =
                    Valida::FormataPorcentagem(($dadosTT[10]['realizado'] / $ttFat) * 100);
            }

            if (!empty($dadosTT[11]['realizado'])) {
                $dadosTT[11]['at'] =
                    Valida::FormataPorcentagem(($dadosTT[11]['realizado'] / $ttFat) * 100);
            }


            for ($i = 1; $i < 7; $i++) {
                if (!empty($dadosTT[$i]['filhas'])) {
                    foreach ($dadosTT[$i]['filhas'] as $nu_codigo => $filha) {
                        if (!empty($filha['realizado'])) {
                            $dadosTT[$i]['filhas'][$nu_codigo]['at'] =
                                Valida::FormataPorcentagem(($filha['realizado'] / $ttFat) * 100);

                            if (!empty($dadosTT[$i]['filhas'][$nu_codigo]['netas'])) {
                                foreach ($dadosTT[$i]['filhas'][$nu_codigo]['netas'] as $nu_codigo_n => $neta) {
                                    if (!empty($neta['realizado'])) {
                                        $dadosTT[$i]['filhas'][$nu_codigo]['netas'][$nu_codigo_n]['at'] =
                                            Valida::FormataPorcentagem(($neta['realizado'] / $ttFat) * 100);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        $this->dadosFC = $dados;
        $this->dadosTT = $dadosTT;
    }

    public function Comparador()
    {
        /** @var FluxoCaixaService $FluxoCaixaService */
        $FluxoCaixaService = $this->getService(FLUXO_CAIXA_SERVICE);
        $CondicoesA = [];
        $CondicoesB = [];

        if (!empty($_POST)) {
            $CondicoesA["periodoInicio"] = $_POST["periodoA1"];
            $CondicoesA["periodoFinal"] = $_POST["periodoA2"];
            $CondicoesA[CO_CENTRO_CUSTO] = $_POST[CO_CENTRO_CUSTO];
            $fluxosA = $FluxoCaixaService->PesquisaAvancadaComparador($CondicoesA);
            $Condicoes['A'] = $CondicoesA;
            $qtdMesesA = Valida::CalculaDiferencaMesesData('01/' . $_POST["periodoA1"], '01/' . $_POST["periodoA2"]);
            $qtdMesesA = $qtdMesesA + 1;

            $CondicoesB["periodoInicio"] = $_POST["periodoB1"];
            $CondicoesB["periodoFinal"] = $_POST["periodoB2"];
            $CondicoesB[CO_CENTRO_CUSTO] = $_POST[CO_CENTRO_CUSTO];
            $fluxosB = $FluxoCaixaService->PesquisaAvancadaComparador($CondicoesB);
            $Condicoes['B'] = $CondicoesB;
            $qtdMesesB = Valida::CalculaDiferencaMesesData('01/' . $_POST["periodoB1"], '01/' . $_POST["periodoB2"]);
            $qtdMesesB = $qtdMesesB + 1;

        } else {
            $mesPeriodoA = Valida::DataShow(
                Valida::DataDBDate(
                    Valida::CalculaData(date('d/m/Y'), 1, '-', 'm')
                ), 'm/Y');
            $CondicoesA["periodoInicio"] = $mesPeriodoA;
            $CondicoesA["periodoFinal"] = $mesPeriodoA;
            $CondicoesA[CO_CENTRO_CUSTO] = '';
            $qtdMesesA = 1;
            $Condicoes['A'] = $CondicoesA;
            $fluxosA = $FluxoCaixaService->PesquisaAvancadaComparador($CondicoesA);
            $CondicoesB["periodoInicio"] = date('m/Y');
            $CondicoesB["periodoFinal"] = date('m/Y');
            $CondicoesB[CO_CENTRO_CUSTO] = '';
            $Condicoes['B'] = $CondicoesB;
            $qtdMesesB = 1;
            $fluxosB = $FluxoCaixaService->PesquisaAvancadaComparador($CondicoesB);
        }

        $this->condicoes = $Condicoes;

        $this->dadosA = $this->getDadosPeriodo($fluxosA, $qtdMesesA);
        $this->dadosB = $this->getDadosPeriodo($fluxosB, $qtdMesesB);
        $this->dadosB = $this->calculaAcComparador($this->dadosA, $this->dadosB);
        $this->dadosFN = $this->getDadosFilhasNetas($fluxosA, $fluxosB);
    }

    private function getDadosPeriodo($fluxos, $qtdMeses)
    {
        $dados = [];
        foreach ($fluxos as $fc) {
            if ($fc["nu_valor_pago"]) {

                if (!empty($dados[$fc["co_categoria_fc"]]['total'])) {
                    $dados[$fc["co_categoria_fc"]]['total'] =
                        ($dados[$fc["co_categoria_fc"]]['total'] + $fc["nu_valor_pago"]);
                } else {
                    $dados[$fc["co_categoria_fc"]]['total'] = $fc["nu_valor_pago"];
                }

                if (!empty($dados[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]['total'])) {
                    $dados[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]['total'] =
                        ($dados[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]['total']
                            + $fc["nu_valor_pago"]);
                } else if ($fc["no_filha"]) {
                    $dados[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]['total'] = $fc["nu_valor_pago"];
                }

                if (!empty($dados[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]
                ['netas'][$fc["co_categoria_fc_neta"]]['total'])) {
                    $dados[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]['netas']
                    [$fc["co_categoria_fc_neta"]]['total'] =
                        ($dados[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]
                            ['netas'][$fc["co_categoria_fc_neta"]]['total']
                            + $fc["nu_valor_pago"]);
                } else if ($fc["no_neta"]) {
                    $dados[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]
                    ['netas'][$fc["co_categoria_fc_neta"]]['total'] = $fc["nu_valor_pago"];
                }


            }
        }


        // MARGEM DE CONTRIBUIÇÃO
        if ((!empty($dados[1]['total'])) && (!empty($dados[2]['total']))) {
            $dados[7]['total'] =
                ($dados[1]['total'] - $dados[2]['total']);
        }
        if ((!empty($dados[1]['total'])) && (empty($dados[2]['total']))) {
            $dados[7]['total'] = $dados[1]['total'];
        }


        // LLAI (Lucro Líquido Antes dos Investimentos)
        if ((!empty($dados[7]['total'])) && (!empty($dados[3]['total']))) {
            $dados[8]['total'] =
                ($dados[7]['total'] - $dados[3]['total']);
        }
        if ((!empty($dados[7]['total'])) && (empty($dados[3]['total']))) {
            $dados[8]['total'] = $dados[7]['total'];
        }

        // DESPESA LÍQUIDA TOTAL
        if (!empty($dados[2]['total'])) {
            if (!empty($dados[9]['total'])) {
                $dados[9]['total'] =
                    ($dados[9]['total'] + $dados[2]['total']);
            } else {
                $dados[9]['total'] = $dados[2]['total'];
            }
        }
        if (!empty($dados[3]['total'])) {
            if (!empty($dados[9]['total'])) {
                $dados[9]['total'] =
                    ($dados[9]['total'] + $dados[3]['total']);
            } else {
                $dados[9]['total'] = $dados[3]['total'];
            }
        }
        if (!empty($dados[4]['total'])) {
            if (!empty($dados[9]['total'])) {
                $dados[9]['total'] =
                    ($dados[9]['total'] + $dados[4]['total']);
            } else {
                $dados[9]['total'] = $dados[4]['total'];
            }
        }


        // LUCRO LÍQUIDO
        if (!empty($dados[1]['total'])) {
            $dados[10]['total'] = $dados[1]['total'];
        }
        if (!empty($dados[9]['total'])) {
            if (!empty($dados[10]['total'])) {
                $dados[10]['total'] =
                    ($dados[10]['total'] - $dados[9]['total']);
            } else {
                $dados[10]['total'] = 0 - $dados[9]['total'];
            }
        }


        // RESULTADO LÍQUIDO
        if (!empty($dados[10]['total'])) {
            $dados[11]['total'] = $dados[10]['total'];
        }

        if (!empty($dados[5]['total'])) {
            if (!empty($dados[11]['total'])) {
                $dados[11]['total'] =
                    ($dados[11]['total'] + $dados[5]['total']);
            } else {
                $dados[11]['total'] = $dados[5]['total'];
            }
        }

        if (!empty($dados[6]['total'])) {
            if (!empty($dados[11]['total'])) {
                $dados[11]['total'] =
                    ($dados[11]['total'] - $dados[6]['total']);
            } else {
                $dados[11]['total'] = 0 - $dados[6]['total'];
            }
        }

        foreach ($dados as $indice => $valor) {
            $dados[$indice]['media'] = $valor["total"] / $qtdMeses;
        }

        // Calcular Análise Total
        if (!empty($dados[1]['total'])) {
            $ttFat = $dados[1]['total'];
            $dados[1]['at'] = '100%';

            for ($i = 2; $i < 11; $i++) {
                if (!empty($dados[$i]['total'])) {
                    $dados[$i]['at'] =
                        Valida::FormataPorcentagem(($dados[$i]['total'] / $ttFat) * 100);
                }
            }

            for ($i = 1; $i < 7; $i++) {
                if (!empty($dados[$i]['filhas'])) {
                    foreach ($dados[$i]['filhas'] as $nu_codigo => $filha) {
                        if (!empty($filha['total'])) {
                            $dados[$i]['filhas'][$nu_codigo]['at'] =
                                Valida::FormataPorcentagem(($filha['total'] / $ttFat) * 100);
                            $dados[$i]['filhas'][$nu_codigo]['media'] =
                                $filha["total"] / $qtdMeses;


                            if (!empty($dados[$i]['filhas'][$nu_codigo]['netas'])) {
                                foreach ($dados[$i]['filhas'][$nu_codigo]['netas'] as $nu_codigo_n => $neta) {
                                    if (!empty($neta['total'])) {
                                        $dados[$i]['filhas'][$nu_codigo]['netas'][$nu_codigo_n]['at'] =
                                            Valida::FormataPorcentagem(($neta['total'] / $ttFat) * 100);
                                        $dados[$i]['filhas'][$nu_codigo]['netas'][$nu_codigo_n]['media'] =
                                            $neta['total'] / $qtdMeses;

                                    }
                                }
                            }
                        }
                    }
                }
            }

        }
        return $dados;
    }

    private function getDadosFilhasNetas($fluxosA, $fluxosB)
    {
        $dados = [];
        $geral['a'] = $fluxosA;
        $geral['b'] = $fluxosB;
        foreach ($geral as $fluxos) {
            foreach ($fluxos as $fc) {
                if ($fc["nu_valor_pago"]) {

                    if (($fc["no_filha"]) &&
                        (empty($dados[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]['no_filha']))) {
                        $dados[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]['no_filha'] =
                            $fc["nu_codigo_f"] . ' - ' . $fc["no_filha"];
                    }

                    if (($fc["no_neta"]) &&
                        (empty($dados[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]
                        ['netas'][$fc["co_categoria_fc_neta"]]['no_neta']))) {
                        $dados[$fc["co_categoria_fc"]]['filhas'][$fc["co_categoria_fc_filha"]]
                        ['netas'][$fc["co_categoria_fc_neta"]]['no_neta'] =
                            $fc["nu_codigo_n"] . ' - ' . $fc["no_neta"];
                    }

                }
            }
        }

        return $dados;
    }

    // Calcular Análise Comparativa Por Mês comparado com o mês anterior
    private function calculaAc($mes, $indice, $dados)
    {
        $mesAnt = $mes - 1;
        if ((!empty($dados[$mesAnt][$indice]['realizado'])) && (!empty($dados[$mes][$indice]['realizado']))) {
            $dados[$mes][$indice]['ac'] =
                Valida::FormataPorcentagem(
                    (($dados[$mes][$indice]['realizado'] - $dados[$mesAnt][$indice]['realizado'])
                        / $dados[$mesAnt][$indice]['realizado']) * 100);
        }
        return $dados;
    }

    // Calcular Análise Comparativa Por Mês comparado com o mês anterior
    private function calculaAcComparador($dadosA, $dadosB)
    {
        foreach ($dadosB as $indice => $dados) {
            if ((!empty($dadosA[$indice]['total'])) && (!empty($dadosB[$indice]['total']))) {
                $dadosB[$indice]['ac'] =
                    Valida::FormataPorcentagem(
                        (($dadosB[$indice]['total'] - $dadosA[$indice]['total'])
                            / $dadosA[$indice]['total']) * 100);
            }

            if (!empty($dadosB[$indice]['filhas'])) {
                foreach ($dadosB[$indice]['filhas'] as $nuFilhas => $filha) {
                    if ((!empty($dadosA[$indice]['filhas'][$nuFilhas]['total'])) &&
                        (!empty($dadosB[$indice]['filhas'][$nuFilhas]['total']))) {
                        $dadosB[$indice]['filhas'][$nuFilhas]['ac'] =
                            Valida::FormataPorcentagem(
                                (($dadosB[$indice]['filhas'][$nuFilhas]['total'] -
                                        $dadosA[$indice]['filhas'][$nuFilhas]['total'])
                                    / $dadosA[$indice]['filhas'][$nuFilhas]['total']) * 100);
                    }


                    if (!empty($dadosB[$indice]['filhas'][$nuFilhas]['netas'])) {
                        foreach ($dadosB[$indice]['filhas'][$nuFilhas]['netas'] as $nuNetas => $neta) {
                            if ((!empty($dadosA[$indice]['filhas'][$nuFilhas]['netas'][$nuNetas]['total'])) &&
                                (!empty($dadosB[$indice]['filhas'][$nuFilhas]['netas'][$nuNetas]['total']))) {
                                $dadosB[$indice]['filhas'][$nuFilhas]['netas'][$nuNetas]['ac'] =
                                    Valida::FormataPorcentagem(
                                        (($dadosB[$indice]['filhas'][$nuFilhas]['netas'][$nuNetas]['total'] -
                                                $dadosA[$indice]['filhas'][$nuFilhas]['netas'][$nuNetas]['total'])
                                            / $dadosA[$indice]['filhas'][$nuFilhas]['netas'][$nuNetas]['total']) * 100);
                            }
                        }
                    }
                }
            }
        }
        return $dadosB;
    }

    // Calcular Análise Comparativa Por Mês comparado com o mês anterior
    private function calculaAcFilhas($mes, $indice, $nu_codigo, $dados)
    {
        $mesAnt = $mes - 1;
        if ((!empty($dados[$mesAnt][$indice]['filhas'][$nu_codigo]['realizado'])) &&
            (!empty($dados[$mes][$indice]['filhas'][$nu_codigo]['realizado']))) {
            $dados[$mes][$indice]['filhas'][$nu_codigo]['ac'] =
                Valida::FormataPorcentagem(
                    (($dados[$mes][$indice]['filhas'][$nu_codigo]['realizado'] -
                            $dados[$mesAnt][$indice]['filhas'][$nu_codigo]['realizado'])
                        / $dados[$mesAnt][$indice]['filhas'][$nu_codigo]['realizado']) * 100);
        }
        return $dados;
    }

    // Calcular Análise Comparativa Por Mês comparado com o mês anterior
    private function calculaAcNetas($mes, $indice, $nu_codigo, $nu_codigo_n, $dados)
    {
        $mesAnt = $mes - 1;
        if ((!empty($dados[$mesAnt][$indice]['filhas'][$nu_codigo]['netas'][$nu_codigo_n]['realizado'])) &&
            (!empty($dados[$mes][$indice]['filhas'][$nu_codigo]['netas'][$nu_codigo_n]['realizado']))) {
            $dados[$mes][$indice]['filhas'][$nu_codigo]['netas'][$nu_codigo_n]['ac'] =
                Valida::FormataPorcentagem(
                    (($dados[$mes][$indice]['filhas'][$nu_codigo]['netas'][$nu_codigo_n]['realizado'] -
                            $dados[$mesAnt][$indice]['filhas'][$nu_codigo]['netas'][$nu_codigo_n]['realizado'])
                        / $dados[$mesAnt][$indice]['filhas'][$nu_codigo]['netas'][$nu_codigo_n]['realizado']) * 100);
        }
        return $dados;
    }

}