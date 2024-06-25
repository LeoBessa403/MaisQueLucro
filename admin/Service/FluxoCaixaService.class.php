<?php

/**
 * FluxocaixaService.class [ SERVICE ]
 * @copyright (c) 2021, Leo Bessa
 */
class  FluxocaixaService extends AbstractService
{

    private $ObjetoModel;


    public function __construct()
    {
        parent::__construct(FluxocaixaEntidade::ENTIDADE);
        $this->ObjetoModel = new FluxocaixaModel();
    }

    public function CadastroFCEntrada($dados)
    {
        /** @var ContaBancariaService $ContaBancariaService */
        $ContaBancariaService = $this->getService(CONTA_BANCARIA_SERVICE);
        /** @var HistSaldoCbService $HistSaldoCbService */
        $HistSaldoCbService = $this->getService(HIST_SALDO_CB_SERVICE);

        /** @var PDO $PDO */
        $PDO = $this->getPDO();
        $retorno = [
            SUCESSO => false,
            MSG => null
        ];
        $coUsuario = UsuarioService::getCoUsuarioLogado();
        $coAssinante = AssinanteService::getCoAssinanteLogado();

        $PDO->beginTransaction();

        $finValidador = new FluxocaixaValidador();
        /** @var FluxocaixaValidador $validador */
        $validador = $finValidador->validarFc($dados);
        if ($validador[SUCESSO]) {
            $fcEnt[TP_PAGAMENTO] = $dados[TP_PAGAMENTO];
            $fcEnt = $this->getCategoriasCadastro($dados[CO_CATEGORIA_FC], $fcEnt);
            $fcEnt[DT_VENCIMENTO] = ($dados[DT_VENCIMENTO])
                ? Valida::DataDBDate($dados[DT_VENCIMENTO]) : null;
            $fcEnt[DT_REALIZADO] = ($dados[DT_REALIZADO])
                ? Valida::DataDBDate($dados[DT_REALIZADO]) : null;
            $fcEnt[NU_VALOR] = ($dados[NU_VALOR])
                ? Valida::FormataMoedaBanco($dados[NU_VALOR]) : null;
            $fcEnt[NU_VALOR_PAGO] = ($dados[NU_VALOR_PAGO])
                ? Valida::FormataMoedaBanco($dados[NU_VALOR_PAGO]) : null;
            $fcEnt[CO_CONTA_BANCARIA] = $dados[CO_CONTA_BANCARIA];
            $fcEnt[CO_REPRESENTACAO] = $dados[CO_REPRESENTACAO];
            $fcEnt[CO_CENTRO_CUSTO] = $dados[CO_CENTRO_CUSTO];
            $fcEnt[DS_DESCRICAO] = trim($dados[DS_DESCRICAO]);
            $fcEnt[CO_USUARIO] = $coUsuario;

            $dias = Valida::CalculaDiferencaDiasData(date("d/m/Y"), $dados[DT_VENCIMENTO]);
            if ($dados[NU_VALOR_PAGO]) {
                $fcEnt[ST_PAGAMENTO] = StatusPagamentoFCEnum::PAGO;
                /** @var ContaBancariaEntidade $contaDest */
                $contaDest = $ContaBancariaService->PesquisaUmRegistro($dados[CO_CONTA_BANCARIA]);

                $histSaldoCB[DT_CADASTRO] = Valida::DataHoraAtualBanco();
                $histSaldoCB[CO_USUARIO] = $coUsuario;
                $histSaldoCB[CO_CONTA_BANCARIA] = $contaDest->getCoContaBancaria();
                $histSaldoCB[NU_VALOR_PAGO] = Valida::FormataMoedaBanco($dados[NU_VALOR_PAGO]);
                $histSaldoCB[TP_FLUXO] = TipoFluxoCaixaEnum::ENTRADA;
                $histSaldoCB[DS_OBSERVACAO] = trim($dados[DS_DESCRICAO]);
                $histSaldoCB[NU_SALDO] =
                    ($contaDest->getCoUltimoHistSaldoCb()->getNuSaldo() +
                        Valida::FormataMoedaBanco($dados[NU_VALOR_PAGO]));
                $HistSaldoCbService->Salva($histSaldoCB);

            } else if ($dias < 0) {
                $fcEnt[ST_PAGAMENTO] = StatusPagamentoFCEnum::EM_ATRASO;
            } else {
                $fcEnt[ST_PAGAMENTO] = StatusPagamentoFCEnum::A_RECEBER;
            }

            if ($dados[CO_FLUXO_CAIXA]) {
                $retorno[SUCESSO] = $this->Salva($fcEnt, $dados[CO_FLUXO_CAIXA]);
                $retorno[MSG] = ATUALIZADO;
            } else {
                $fcEnt[TP_FLUXO] = TipoFluxoCaixaEnum::ENTRADA;
                $fcEnt[DT_CADASTRO] = Valida::DataHoraAtualBanco();
                $fcEnt[CO_ASSINANTE] = $coAssinante;

                if ($dados["tp_lanc"] > 1) {

                    if ($dados["tp_lanc"] == 3) {

                        $fcEnt[NU_VALOR] = ($fcEnt[NU_VALOR])
                            ? floatval($fcEnt[NU_VALOR]) / $dados["nu_repetidos"] : null;
                        $fcEnt[NU_VALOR_PAGO] = ($fcEnt[NU_VALOR_PAGO])
                            ? floatval($fcEnt[NU_VALOR_PAGO]) / $dados["nu_repetidos"] : null;

                        if ($fcEnt[NU_VALOR]) {
                            $fcEnt[NU_VALOR] = Valida::FormataMoeda($fcEnt[NU_VALOR]);
                            $fcEnt[NU_VALOR] = Valida::FormataMoedaBanco($fcEnt[NU_VALOR]);
                        }
                        if ($fcEnt[NU_VALOR_PAGO]) {
                            $fcEnt[NU_VALOR_PAGO] = Valida::FormataMoeda($fcEnt[NU_VALOR_PAGO]);
                            $fcEnt[NU_VALOR_PAGO] = Valida::FormataMoedaBanco($fcEnt[NU_VALOR_PAGO]);
                        }
                    }
                    $fcEntAux = null;
                    for ($i = 0; $i < $dados["nu_repetidos"]; $i++) {
                        if ($i > 0) {
                            if ($i == 1) {
                                $fcEnt[NU_VALOR] = ($fcEnt[NU_VALOR])
                                    ? $fcEnt[NU_VALOR] : $fcEnt[NU_VALOR_PAGO];
                                $fcEnt[NU_VALOR_PAGO] = null;
                                $fcEnt[DT_VENCIMENTO] = ($dados[DT_VENCIMENTO])
                                    ? $dados[DT_VENCIMENTO] : $dados[DT_REALIZADO];
                                $fcEnt[DT_REALIZADO] = null;
                                $fcEntAux[DT_VENCIMENTO] = Valida::CalculaData(
                                    $fcEnt[DT_VENCIMENTO],
                                    $dados["intervalo"],
                                    "+"
                                );
                                $fcEnt[ST_PAGAMENTO] = StatusPagamentoFCEnum::A_RECEBER;
                            } else {
                                $fcEntAux[DT_VENCIMENTO] = Valida::CalculaData(
                                    $fcEntAux[DT_VENCIMENTO],
                                    $dados["intervalo"],
                                    "+"
                                );
                            }
                            $fcEnt[DT_VENCIMENTO] = Valida::DataDBDate($fcEntAux[DT_VENCIMENTO]);
                        }
                        $retorno[SUCESSO] = $this->Salva($fcEnt);
                    }
                } else {
                    $retorno[SUCESSO] = $this->Salva($fcEnt);
                }
                $retorno[MSG] = CADASTRADO;
            }
        } else {
            $retorno = $validador;
        }

        if ($retorno[SUCESSO]) {
            $retorno[SUCESSO] = true;
            $PDO->commit();
        } else {
            $retorno[MSG] = "Erro ao Salvar!";
            $retorno[SUCESSO] = false;
            $PDO->rollBack();
        }

        return $retorno;
    }

    public function CadastroFCSaida($dados)
    {
        /** @var ContaBancariaService $ContaBancariaService */
        $ContaBancariaService = $this->getService(CONTA_BANCARIA_SERVICE);
        /** @var HistSaldoCbService $HistSaldoCbService */
        $HistSaldoCbService = $this->getService(HIST_SALDO_CB_SERVICE);
        /** @var PDO $PDO */
        $PDO = $this->getPDO();
        $retorno = [
            SUCESSO => false,
            MSG => null
        ];

        $coUsuario = UsuarioService::getCoUsuarioLogado();
        $coAssinante = AssinanteService::getCoAssinanteLogado();
        $PDO->beginTransaction();

        $finValidador = new FluxocaixaValidador();
        /** @var FluxocaixaValidador $validador */
        $validador = $finValidador->validarFc($dados);
        if ($validador[SUCESSO]) {
            $fcEnt[TP_PAGAMENTO] = $dados[TP_PAGAMENTO];
            $fcEnt = $this->getCategoriasCadastro($dados[CO_CATEGORIA_FC], $fcEnt);
            $fcEnt[DT_VENCIMENTO] = ($dados[DT_VENCIMENTO])
                ? Valida::DataDBDate($dados[DT_VENCIMENTO]) : null;
            $fcEnt[DT_REALIZADO] = ($dados[DT_REALIZADO])
                ? Valida::DataDBDate($dados[DT_REALIZADO]) : null;
            $fcEnt[NU_VALOR] = ($dados[NU_VALOR])
                ? Valida::FormataMoedaBanco($dados[NU_VALOR]) : null;
            $fcEnt[NU_VALOR_PAGO] = ($dados[NU_VALOR_PAGO])
                ? Valida::FormataMoedaBanco($dados[NU_VALOR_PAGO]) : null;
            $fcEnt[CO_CONTA_BANCARIA] = $dados[CO_CONTA_BANCARIA];
            $fcEnt[CO_REPRESENTACAO] = $dados[CO_REPRESENTACAO];
            $fcEnt[CO_CENTRO_CUSTO] = $dados[CO_CENTRO_CUSTO];
            $fcEnt[DS_DESCRICAO] = trim($dados[DS_DESCRICAO]);
            $fcEnt[CO_USUARIO] = $coUsuario;

            $dias = Valida::CalculaDiferencaDiasData(date("d/m/Y"), $dados[DT_VENCIMENTO]);
            if ($dados[NU_VALOR_PAGO]) {
                $fcEnt[ST_PAGAMENTO] = StatusPagamentoFCEnum::PAGO;

                /** @var ContaBancariaEntidade $contaDest */
                $contaDest = $ContaBancariaService->PesquisaUmRegistro($dados[CO_CONTA_BANCARIA]);

                $histSaldoCB[DT_CADASTRO] = Valida::DataHoraAtualBanco();
                $histSaldoCB[CO_USUARIO] = $coUsuario;
                $histSaldoCB[NU_VALOR_PAGO] = Valida::FormataMoedaBanco($dados[NU_VALOR_PAGO]);
                $histSaldoCB[TP_FLUXO] = TipoFluxoCaixaEnum::SAIDA;
                $histSaldoCB[CO_CONTA_BANCARIA] = $contaDest->getCoContaBancaria();
                $histSaldoCB[DS_OBSERVACAO] = trim($dados[DS_DESCRICAO]);
                $histSaldoCB[NU_SALDO] =
                    ($contaDest->getCoUltimoHistSaldoCb()->getNuSaldo() -
                        Valida::FormataMoedaBanco($dados[NU_VALOR_PAGO]));
                $HistSaldoCbService->Salva($histSaldoCB);
            } else if ($dias < 0) {
                $fcEnt[ST_PAGAMENTO] = StatusPagamentoFCEnum::EM_ATRASO;
            } else {
                $fcEnt[ST_PAGAMENTO] = StatusPagamentoFCEnum::A_PAGAR;
            }

            if ($dados[CO_FLUXO_CAIXA]) {
                $retorno[SUCESSO] = $this->Salva($fcEnt, $dados[CO_FLUXO_CAIXA]);
                $retorno[MSG] = ATUALIZADO;
            } else {
                $fcEnt[TP_FLUXO] = TipoFluxoCaixaEnum::SAIDA;
                $fcEnt[DT_CADASTRO] = Valida::DataHoraAtualBanco();
                $fcEnt[CO_ASSINANTE] = $coAssinante;

                if ($dados["tp_lanc"] > 1) {
                    $fcEntAux[DT_VENCIMENTO] = $fcEnt[DT_VENCIMENTO];
                    if ($dados["tp_lanc"] == 3) {
                        $fcEnt[NU_VALOR] = ($fcEnt[NU_VALOR])
                            ? floatval($fcEnt[NU_VALOR]) / $dados["nu_repetidos"] : null;
                        $fcEnt[NU_VALOR_PAGO] = ($fcEnt[NU_VALOR_PAGO])
                            ? floatval($fcEnt[NU_VALOR_PAGO]) / $dados["nu_repetidos"] : null;

                        if ($fcEnt[NU_VALOR]) {
                            $fcEnt[NU_VALOR] = Valida::FormataMoeda($fcEnt[NU_VALOR]);
                            $fcEnt[NU_VALOR] = Valida::FormataMoedaBanco($fcEnt[NU_VALOR]);
                        }
                        if ($fcEnt[NU_VALOR_PAGO]) {
                            $fcEnt[NU_VALOR_PAGO] = Valida::FormataMoeda($fcEnt[NU_VALOR_PAGO]);
                            $fcEnt[NU_VALOR_PAGO] = Valida::FormataMoedaBanco($fcEnt[NU_VALOR_PAGO]);
                        }
                    }
                    for ($i = 0; $i < $dados["nu_repetidos"]; $i++) {
                        if ($i > 0) {
                            if ($i == 1) {
                                $fcEnt[NU_VALOR] = ($fcEnt[NU_VALOR])
                                    ? $fcEnt[NU_VALOR] : $fcEnt[NU_VALOR_PAGO];
                                $fcEnt[NU_VALOR_PAGO] = null;
                                $fcEnt[DT_VENCIMENTO] = ($dados[DT_VENCIMENTO])
                                    ? $dados[DT_VENCIMENTO] : $dados[DT_REALIZADO];
                                $fcEnt[DT_REALIZADO] = null;
                                $fcEntAux[DT_VENCIMENTO] = Valida::CalculaData(
                                    $fcEnt[DT_VENCIMENTO],
                                    $dados["intervalo"],
                                    "+"
                                );
                                $fcEnt[ST_PAGAMENTO] = StatusPagamentoFCEnum::A_PAGAR;
                            } else {
                                $fcEntAux[DT_VENCIMENTO] = Valida::CalculaData(
                                    $fcEntAux[DT_VENCIMENTO],
                                    $dados["intervalo"],
                                    "+"
                                );
                            }
                            $fcEnt[DT_VENCIMENTO] = Valida::DataDBDate($fcEntAux[DT_VENCIMENTO]);
                        }
                        $retorno[SUCESSO] = $this->Salva($fcEnt);
                    }
                } else {
                    $retorno[SUCESSO] = $this->Salva($fcEnt);
                }
                $retorno[MSG] = CADASTRADO;
            }
        } else {
            $retorno = $validador;
        }
        if ($retorno[SUCESSO]) {
            $retorno[SUCESSO] = true;
            $PDO->commit();
        } else {
            $retorno[MSG] = $validador[MSG];
            $retorno[SUCESSO] = false;
            $PDO->rollBack();
        }

        return $retorno;
    }

    public function DelFluxoCaixa($dados)
    {
        /** @var HistSaldoCbService $HistSaldoCbService */
        $HistSaldoCbService = $this->getService(HIST_SALDO_CB_SERVICE);
        /** @var PDO $PDO */
        $PDO = $this->getPDO();
        $retorno = [
            SUCESSO => false,
            MSG => null
        ];

        $PDO->beginTransaction();

        /** @var FluxocaixaEntidade $fc */
        $fc = $this->PesquisaUmRegistro($dados);

        if ($fc->getStPagamento() == StatusPagamentoEnum::PAGO) {
            $valorLancamento = ($fc->getNuValorPago())
                ? $fc->getNuValorPago() : $fc->getNuValor();
            if ($fc->getTpFluxo() == TipoFluxoCaixaEnum::ENTRADA) {
                $saldoCb = ($fc->getCoContaBancaria()->getCoUltimoHistSaldoCb()->getNuSaldo() -
                    $valorLancamento);
            } else {
                $saldoCb = ($fc->getCoContaBancaria()->getCoUltimoHistSaldoCb()->getNuSaldo() +
                    $valorLancamento);
            }
        } else {
            $saldoCb = $fc->getCoContaBancaria()->getCoUltimoHistSaldoCb()->getNuSaldo();
            $valorLancamento = 0;
        }

        $histSaldoCB[DT_CADASTRO] = Valida::DataHoraAtualBanco();
        $histSaldoCB[CO_USUARIO] = UsuarioService::getCoUsuarioLogado();
        $histSaldoCB[NU_VALOR_PAGO] = $valorLancamento;
        $histSaldoCB[TP_FLUXO] = $fc->getTpFluxo();
        $histSaldoCB[CO_CONTA_BANCARIA] = $fc->getCoContaBancaria()->getCoContaBancaria();
        $histSaldoCB[DS_OBSERVACAO] = 'Exclusão de Lançamento, ' . $fc->getDsDescricao();
        $histSaldoCB[NU_SALDO] = $saldoCb;
        $retorno[SUCESSO] = $HistSaldoCbService->Salva($histSaldoCB);

        if ($retorno[SUCESSO]) {
            $retorno[SUCESSO] = $this->Deleta($fc->getCoFluxoCaixa());
            if ($retorno[SUCESSO]) {
                $retorno[SUCESSO] = true;
                $retorno[MSG] = DELETADO;
                $PDO->commit();
            } else {
                $retorno[MSG] = "Erro ao Salvar!";
                $retorno[SUCESSO] = false;
                $PDO->rollBack();
            }
        } else {
            $retorno[MSG] = "Erro ao Salvar!";
            $retorno[SUCESSO] = false;
            $PDO->rollBack();
        }

        return $retorno;
    }

    private function getCategoriasCadastro($categoria, $fcEnt)
    {
        /** @var CategoriaFcFilhaService $CategoriaFcFilhaService */
        $CategoriaFcFilhaService = $this->getService(CATEGORIA_FC_FILHA_SERVICE);
        /** @var CategoriaFcNetaService $CategoriaFcNetaService */
        $CategoriaFcNetaService = $this->getService(CATEGORIA_FC_NETA_SERVICE);
        $CatEnt = explode('-', $categoria);
        $tpCat = $CatEnt[0];
        if ($tpCat == 'p') {
            $fcEnt[CO_CATEGORIA_FC] = $CatEnt[1];
        } else if ($tpCat == 'f') {
            $fcEnt[CO_CATEGORIA_FC_FILHA] = $CatEnt[1];
            /** @var CategoriaFcFilhaEntidade $catF */
            $catF = $CategoriaFcFilhaService->PesquisaUmRegistro($CatEnt[1]);
            $fcEnt[CO_CATEGORIA_FC] = $catF->getCoCategoriaFc()->getCoCategoriaFc();
        } else if ($tpCat == 'n') {
            $fcEnt[CO_CATEGORIA_FC_NETA] = $CatEnt[1];
            /** @var CategoriaFcNetaEntidade $catN */
            $catN = $CategoriaFcNetaService->PesquisaUmRegistro($CatEnt[1]);
            $fcEnt[CO_CATEGORIA_FC_FILHA] = $catN->getCoCategoriaFcFilha()->getCoCategoriaFcFilha();
            $fcEnt[CO_CATEGORIA_FC] = $catN->getCoCategoriaFcFilha()->getCoCategoriaFc()->getCoCategoriaFc();

        }
        return $fcEnt;
    }

    public function BaixarPagamentos($dados)
    {
        /** @var HistSaldoCbService $HistSaldoCbService */
        $HistSaldoCbService = $this->getService(HIST_SALDO_CB_SERVICE);
        /** @var PDO $PDO */
        $PDO = $this->getPDO();
        $retorno = [
            SUCESSO => false,
            MSG => null
        ];
        $coUsuario = UsuarioService::getCoUsuarioLogado();

        $fluxos = explode(',', $dados);
        unset($fluxos[0]);

        $PDO->beginTransaction();
        foreach ($fluxos as $fluxo) {
            /** @var FluxocaixaEntidade $fc */
            $fc = $this->PesquisaUmRegistro($fluxo);

            $dias = Valida::CalculaDiferencaDiasData(date("d/m/Y"),
                Valida::DataShow($fc->getDtVencimento(), "d/m/Y"));

            if ($dias > 0) {
                $fcEnt[DT_REALIZADO] = Valida::DataAtualBanco();
            } else {
                $fcEnt[DT_REALIZADO] = $fc->getDtVencimento();
            }

            $fcEnt[NU_VALOR_PAGO] = $fc->getNuValor();
            $fcEnt[CO_USUARIO] = $coUsuario;
            $fcEnt[ST_PAGAMENTO] = StatusPagamentoFCEnum::PAGO;

            $histSaldoCB[DT_CADASTRO] = Valida::DataHoraAtualBanco();
            $histSaldoCB[CO_USUARIO] = $coUsuario;
            $histSaldoCB[NU_VALOR_PAGO] = $fc->getNuValor();
            $histSaldoCB[TP_FLUXO] = $fc->getTpFluxo();
            $histSaldoCB[CO_CONTA_BANCARIA] = $fc->getCoContaBancaria()->getCoContaBancaria();
            $histSaldoCB[DS_OBSERVACAO] = 'Baixa no Pagamento';

            if ($fc->getTpFluxo() == TipoFluxoCaixaEnum::ENTRADA) {
                $histSaldoCB[NU_SALDO] = ($fc->getCoContaBancaria()->getCoUltimoHistSaldoCb()->getNuSaldo() +
                    $fc->getNuValor());
            } else {
                $histSaldoCB[NU_SALDO] = ($fc->getCoContaBancaria()->getCoUltimoHistSaldoCb()->getNuSaldo() -
                    $fc->getNuValor());
            }

            $HistSaldoCbService->Salva($histSaldoCB);
            $retorno[SUCESSO] = $this->Salva($fcEnt, $fc->getCoFluxoCaixa());
            $retorno[MSG] = ATUALIZADO;

        }
        if ($retorno[SUCESSO]) {
            $retorno[SUCESSO] = true;
            $retorno[MSG] = ATUALIZADO;
            $PDO->commit();
        } else {
            $retorno[MSG] = "Erro ao Salvar!";
            $retorno[SUCESSO] = false;
            $PDO->rollBack();
        }
        return $retorno;
    }

    public function getLancamentoFC($coLancamento)
    {
        $retorno[SUCESSO] = true;
        $fc = $this->ObjetoModel->getLancamentoFC($coLancamento);

        $retorno[CO_CATEGORIA_FC_NETA] = 'n-' . $fc["nu_codigo_f"] . '-' . $fc["nu_codigo_n"];
        $retorno[TP_PAGAMENTO] = $fc["tp_pagamento"];
        $retorno[DT_VENCIMENTO] = ($fc["dt_vencimento"])
            ? Valida::DataShow($fc["dt_vencimento"]) : null;
        $retorno[DT_REALIZADO] = ($fc["dt_realizado"])
            ? Valida::DataShow($fc["dt_realizado"]) : null;
        $retorno[NU_VALOR] = ($fc["nu_valor"])
            ? Valida::FormataMoeda($fc["nu_valor"]) : null;
        $retorno[NU_VALOR_PAGO] = ($fc["nu_valor_pago"])
            ? Valida::FormataMoeda($fc["nu_valor_pago"]) : null;
        $retorno[CO_CONTA_BANCARIA] = ($fc["co_conta_bancaria"])
            ? $fc["co_conta_bancaria"] : null;
        $retorno[CO_REPRESENTACAO] = ($fc["co_representacao"])
            ? $fc["co_representacao"] : null;
        $retorno[CO_CENTRO_CUSTO] = ($fc["co_centro_custo"])
            ? $fc["co_centro_custo"] : null;
        $retorno[DS_DESCRICAO] = $fc["ds_descricao"];
        $retorno[ST_PAGAMENTO] = $fc["st_pagamento"];
        $retorno[CO_FLUXO_CAIXA] = $fc["co_fluxo_caixa"];
        $retorno[TP_FLUXO] = $fc["tp_fluxo"];

        return $retorno;
    }

    public function CalcularPEL($dados)
    {
        $percMcLuc = $dados["mcPerc"] - $dados["perc_lucro"];
        $percMcLuc = (Valida::FormataMoedaBanco(str_replace(".", ",", $percMcLuc)));
        $despFix = (Valida::FormataMoedaBanco(str_replace(".", ",", $dados["despFix"])));
        $retorno[SUCESSO] = Valida::FormataMoeda(($despFix / $percMcLuc) * 100);
        return $retorno;
    }

    public function PesquisaAvancadaValorPesquisa()
    {
        return $this->ObjetoModel->PesquisaAvancadaValorPesquisa();
    }

    public function PesquisaAvancada($dados)
    {
        $where = $this->montaWherePesquisa($dados);
        return $this->ObjetoModel->PesquisaAvancada($where);
    }

    public function PesquisaAvancadaFC($dados, $coAssinante)
    {
        $where = $this->montaWherePesquisa2($dados, $coAssinante);
        return $this->ObjetoModel->PesquisaAvancadaFC($where);
    }

    public function PesquisaAvancadaFCRecPag($pesquisa, $coAssinante)
    {
        $where = $this->PesquisaAvancRecPag($pesquisa, $coAssinante);
        return $this->ObjetoModel->PesquisaAvancada($where);
    }

    public function PesquisaAvancadaComparador($dados, $coAssinante)
    {
        $where = $this->montaWherePesquisaComparador($dados, $coAssinante);
        return $this->ObjetoModel->PesquisaAvancadaFC($where);
    }

    public function PesquisaAvancadaGrafico1($coAssinante)
    {
        $where = $this->montaWherePesquisaGrafico1($coAssinante);
        return $this->ObjetoModel->PesquisaAvancadaFCGrafico1($where);
    }

    public function PesquisaAvancadaGrafico2($coAssinante)
    {
        $where = $this->montaWherePesquisaGrafico1($coAssinante);
        return $this->ObjetoModel->PesquisaAvancadaFCGrafico2($where);
    }

    public function PesquisaAvancadaGrafico3($dt1, $dt2, $coCats, $coAssinante)
    {
        $where = $this->montaWherePesquisaGrafico3($dt1, $dt2, $coCats, $coAssinante);
        return $this->ObjetoModel->PesquisaAvancadaFCGrafico2($where);
    }

    public function PesquisaAvancadaGrafico4($dt1, $dt2, $coAssinante)
    {
        $where = $this->montaWherePesquisaGrafico4($dt1, $dt2, $coAssinante);
        return $this->ObjetoModel->PesquisaAvancadaFCGrafico3($where);
    }

    public function PesquisaAvancadaGrafico5($dt1, $dt2, $coAssinante)
    {
        $where = $this->montaWherePesquisaGrafico5($dt1, $dt2, $coAssinante);
        return $this->ObjetoModel->PesquisaAvancadaFCGrafico4($where);
    }

    public function PesquisaAvancadaGrafico6($coAssinante)
    {
        return $this->ObjetoModel->PesquisaAvancadaFCGrafico5($coAssinante);
    }

    public function PesquisaAvancDadosIndicadores($dt1, $dt2, $coAssinante)
    {
        $where = $this->PesquisaAvancDadosIndicad($dt1, $dt2, $coAssinante);
        return $this->ObjetoModel->PesquisaAvancadaDadosIndicadores($where);
    }

    public function PesquisaAvancPagRec($coAssinante)
    {
        return $this->ObjetoModel->PesquisaAvancadaPagRec($coAssinante);
    }

    public function montaWherePesquisa($dados)
    {
        $where = 'where 1 = 1';
        if (!empty($dados[CO_CATEGORIA_FC])) {
            $CatEnt = explode('-', $dados[CO_CATEGORIA_FC][0]);
            $tpCat = $CatEnt[0];
            if ($tpCat == 'p') {
                $where = $where . " and cat." . CO_CATEGORIA_FC . " in (" . $CatEnt[1] . ")";
            } else if ($tpCat == 'f') {
                $where = $where . " and ctf." . CO_CATEGORIA_FC_FILHA . " in (" . $CatEnt[1] . ")";
            } else if ($tpCat == 'n') {
                $where = $where . " and ctn." . CO_CATEGORIA_FC_NETA . " in (" . $CatEnt[1] . ")";
            }
        }
        if (!empty($dados[CO_CONTA_BANCARIA][0])) {
            $where = $where . " and con." . CO_CONTA_BANCARIA . " in (" . $dados[CO_CONTA_BANCARIA][0] . ")";
        }
        if (!empty($dados[CO_CENTRO_CUSTO][0])) {
            $where = $where . " and cen." . CO_CENTRO_CUSTO . " in (" . $dados[CO_CENTRO_CUSTO][0] . ")";
        }
        if (!empty($dados[CO_REPRESENTACAO][0])) {
            $where = $where . " and rep." . CO_REPRESENTACAO . " in (" . $dados[CO_REPRESENTACAO][0] . ")";
        }
        if (!empty($dados[ST_PAGAMENTO][0])) {
            $where = $where . " and tfc." . ST_PAGAMENTO . " in (" . $dados[ST_PAGAMENTO][0] . ")";
        }
        if (!empty($dados[TP_PAGAMENTO][0])) {
            $where = $where . " and tfc." . TP_PAGAMENTO . " in (" . $dados[TP_PAGAMENTO][0] . ")";
        }
        if (!empty($dados[TP_FLUXO][0])) {
            $where = $where . " and tfc." . TP_FLUXO . " in (" . $dados[TP_FLUXO][0] . ")";
        }
        if (!empty($dados[DT_CADASTRO . '_inicio'])) {
            $where = $where . " and tfc." . DT_CADASTRO . " >= '" .
                Valida::DataDBDate($dados[DT_CADASTRO . '_inicio']) . " 00:00:00'";
        }
        if (!empty($dados[DT_CADASTRO . '_fim'])) {
            $where = $where . " and tfc." . DT_CADASTRO . " <= '" .
                Valida::DataDBDate($dados[DT_CADASTRO . '_fim']) . " 23:59:59'";
        }
        if (!empty($dados[DT_VENCIMENTO . '_inicio'])) {
            $where = $where . " and tfc." . DT_VENCIMENTO . " >= '" .
                Valida::DataDBDate($dados[DT_VENCIMENTO . '_inicio']) . " 00:00:00'";
        }
        if (!empty($dados[DT_VENCIMENTO . '_fim'])) {
            $where = $where . " and tfc." . DT_VENCIMENTO . " <= '" .
                Valida::DataDBDate($dados[DT_VENCIMENTO . '_fim']) . " 23:59:59'";
        }
        if (!empty($dados[DT_REALIZADO . '_inicio'])) {
            $where = $where . " and tfc." . DT_REALIZADO . " >= '" .
                Valida::DataDBDate($dados[DT_REALIZADO . '_inicio']) . " 00:00:00'";
        }
        if (!empty($dados[DT_REALIZADO . '_fim'])) {
            $where = $where . " and tfc." . DT_REALIZADO . " <= '" .
                Valida::DataDBDate($dados[DT_REALIZADO . '_fim']) . " 23:59:59'";
        }
        if ((!empty($dados[NU_VALOR_PAGO . 1])) && (!empty($dados[NU_VALOR_PAGO . 2]))) {
            $where = $where . " and ((tfc." . NU_VALOR_PAGO . " >= " . $dados[NU_VALOR_PAGO . 1] .
                " and tfc." . NU_VALOR_PAGO . " <= " . $dados[NU_VALOR_PAGO . 2] . ")
            or (tfc." . NU_VALOR . " >= " . $dados[NU_VALOR_PAGO . 1] .
                " and tfc." . NU_VALOR . " <= " . $dados[NU_VALOR_PAGO . 2] . "))";
        }
        $where = $where . " and tfc." . CO_ASSINANTE . " in (" . $dados[CO_ASSINANTE] . ")";

        return $where;
    }

    public function montaWherePesquisa2($dados, $coAssinante)
    {
        $where = 'where 1 = 1';

        if (!empty($dados[CO_CENTRO_CUSTO])) {
            $where = $where . " and cen." . CO_CENTRO_CUSTO . " in (" . $dados[CO_CENTRO_CUSTO] . ")";
        }
        if (!empty($dados['anoPesquisa'])) {
            $where = $where . " and ((tfc." . DT_REALIZADO . " >= '" . Valida::DataDBDate(
                    '01/01/' . $dados["anoPesquisa"]) . "'";
        }
        if (!empty($dados['anoPesquisa'])) {
            $where = $where . " and tfc." . DT_REALIZADO . " <= '" . Valida::DataDBDate(
                    '31/12/' . $dados["anoPesquisa"]) . "')";
        }
        if (!empty($dados['anoPesquisa'])) {
            $where = $where . " OR (tfc." . DT_VENCIMENTO . " >= '" . Valida::DataDBDate(
                    '01/01/' . $dados["anoPesquisa"]) . "'";
        }
        if (!empty($dados['anoPesquisa'])) {
            $where = $where . " and tfc." . DT_VENCIMENTO . " <= '" . Valida::DataDBDate(
                    '31/12/' . $dados["anoPesquisa"]) . "'))";
        }
        $where = $where . " and tfc." . CO_ASSINANTE . " in (" . $coAssinante . ")";
        return $where;
    }

    public function montaWherePesquisaComparador($dados, $coAssinante)
    {
        $where = 'where 1 = 1';

        if (!empty($dados[CO_CENTRO_CUSTO])) {
            $where = $where . " and cen." . CO_CENTRO_CUSTO . " in (" . $dados[CO_CENTRO_CUSTO] . ")";
        }

        $where = $where . " and tfc." . DT_REALIZADO . " >= '" . Valida::DataDBDate(
                '01/' . $dados["periodoInicio"]) . "'";
        $where = $where . " and tfc." . DT_REALIZADO . " <= '" . Valida::DataDBDate(
                '31/' . $dados["periodoFinal"]) . "'";

        $where = $where . " and " . ST_PAGAMENTO . " = " . StatusPagamentoFCEnum::PAGO;
        $where = $where . " and tfc." . CO_ASSINANTE . " in (" . $coAssinante . ")";

        return $where;
    }

    public function montaWherePesquisaGrafico1($coAssinante)
    {
        $where = 'where 1 = 1';
        $where = $where . " and tfi." . CO_CATEGORIA_FC . " in (2,3)";
        $where = $where . " and " . NU_VALOR_PAGO . " is not null";
        $where = $where . " and " . ST_PAGAMENTO . " = " . StatusPagamentoFCEnum::PAGO;
        $where = $where . " and tfi." . DT_REALIZADO . " >= '" . Valida::DataDBDate(
                '01/01/' . date('Y')) . "'";
        $where = $where . " and tfi." . DT_REALIZADO . " <= '" . Valida::DataDBDate(
                '31/' . date('m/Y')) . "'";
        $where = $where . " and tfi." . CO_ASSINANTE . " in (" . $coAssinante . ")";

        return $where;
    }

    public function montaWherePesquisaGrafico3($dt1, $dt2, $coCats, $coAssinante)
    {
        $where = 'where 1 = 1';
        $where = $where . " and tfi." . CO_CATEGORIA_FC . " in (2,3)";
        $where = $where . " and tfi." . CO_CATEGORIA_FC_FILHA . " in (" . $coCats . ")";
        $where = $where . " and " . ST_PAGAMENTO . " = " . StatusPagamentoFCEnum::PAGO;
        $where = $where . " and " . NU_VALOR_PAGO . " is not null";
        $where = $where . " and tfi." . DT_REALIZADO . " >= '" . Valida::DataDBDate($dt1) . "'";
        $where = $where . " and tfi." . DT_REALIZADO . " <= '" . Valida::DataDBDate($dt2) . "'";
        $where = $where . " and tfi." . CO_ASSINANTE . " in (" . $coAssinante . ")";

        return $where;
    }

    public function montaWherePesquisaGrafico4($dt1, $dt2, $coAssinante)
    {
        $where = " and " . NU_VALOR_PAGO . " is not null";
        $where = $where . " and " . ST_PAGAMENTO . " = " . StatusPagamentoFCEnum::PAGO;
        $where = $where . " and " . DT_REALIZADO . " >= '" . Valida::DataDBDate($dt1) . "'";
        $where = $where . " and " . DT_REALIZADO . " <= '" . Valida::DataDBDate($dt2) . "'";
        $where = $where . " and " . CO_ASSINANTE . " in (" . $coAssinante . ")";

        return $where;
    }

    public function montaWherePesquisaGrafico5($dt1, $dt2, $coAssinante)
    {
        $where = " and " . NU_VALOR_PAGO . " is null";
        $where = $where . " and " . DT_VENCIMENTO . " >= '" . Valida::DataDBDate($dt1) . "'";
        $where = $where . " and " . DT_VENCIMENTO . " <= '" . Valida::DataDBDate($dt2) . "'";
        $where = $where . " and " . CO_ASSINANTE . " in (" . $coAssinante . ")";

        return $where;
    }

    public function PesquisaAvancDadosIndicad($dt1, $dt2, $coAssinante)
    {
        $where = " and " . ST_PAGAMENTO . " = " . StatusPagamentoFCEnum::PAGO;
        $where = $where . " and " . NU_VALOR_PAGO . " is not null";
        $where = $where . " and " . DT_REALIZADO . " >= '" . Valida::DataDBDate($dt1) . "'";
        $where = $where . " and " . DT_REALIZADO . " <= '" . Valida::DataDBDate($dt2) . "'";
        $where = $where . " and " . CO_ASSINANTE . " in (" . $coAssinante . ")";

        return $where;
    }

    public function PesquisaAvancRecPag($pesquisa, $coAssinante)
    {
        $where = "where tfc." . CO_ASSINANTE . " in (" . $coAssinante . ")";
        switch ($pesquisa) {
            case 1:
                $where = $where . " and tfc." . TP_FLUXO . " = " . TipoFluxoCaixaEnum::ENTRADA;
                $where = $where . " and tfc." . ST_PAGAMENTO . " = " . StatusPagamentoFCEnum::EM_ATRASO;
                $where = $where . " and tfc." . DT_VENCIMENTO . " < '" . Valida::DataAtualBanco() . "'";
                break;
            case 2:
                $where = $where . " and tfc." . TP_FLUXO . " = " . TipoFluxoCaixaEnum::SAIDA;
                $where = $where . " and tfc." . ST_PAGAMENTO . " = " . StatusPagamentoFCEnum::EM_ATRASO;
                $where = $where . " and tfc." . DT_VENCIMENTO . " < '" . Valida::DataAtualBanco() . "'";
                break;
            case 3:
                $where = $where . " and tfc." . TP_FLUXO . " = " . TipoFluxoCaixaEnum::ENTRADA;
                $where = $where . " and tfc." . ST_PAGAMENTO . " in (" .
                    StatusPagamentoFCEnum::EM_ATRASO . "," . StatusPagamentoFCEnum::A_RECEBER . ")";
                $where = $where . " and tfc." . DT_VENCIMENTO . " >= '" . date('Y-m') . "-01'";
                $where = $where . " and tfc." . DT_VENCIMENTO . " <= '" . date('Y-m') . "-31'";
                break;
            case 4:
                $where = $where . " and tfc." . TP_FLUXO . " = " . TipoFluxoCaixaEnum::SAIDA;
                $where = $where . " and tfc." . ST_PAGAMENTO . " in (" .
                    StatusPagamentoFCEnum::EM_ATRASO . "," . StatusPagamentoFCEnum::A_PAGAR . ")";
                $where = $where . " and tfc." . DT_VENCIMENTO . " >= '" . date('Y-m') . "-01'";
                $where = $where . " and tfc." . DT_VENCIMENTO . " <= '" . date('Y-m') . "-31'";
                break;
            case 5:
                $where = $where . " and tfc." . TP_FLUXO . " = " . TipoFluxoCaixaEnum::ENTRADA;
                $where = $where . " and tfc." . ST_PAGAMENTO . " = " . StatusPagamentoFCEnum::A_RECEBER;
                $where = $where . " and tfc." . DT_VENCIMENTO . " = '" . Valida::DataAtualBanco() . "'";
                break;
            case 6:
                $where = $where . " and tfc." . TP_FLUXO . " = " . TipoFluxoCaixaEnum::SAIDA;
                $where = $where . " and tfc." . ST_PAGAMENTO . " = " . StatusPagamentoFCEnum::A_PAGAR;
                $where = $where . " and tfc." . DT_VENCIMENTO . " = '" . Valida::DataAtualBanco() . "'";
                break;
            case 7:
                $where = $where . " and tfc." . TP_FLUXO . " = " . TipoFluxoCaixaEnum::ENTRADA;
                $where = $where . " and tfc." . ST_PAGAMENTO . " = " . StatusPagamentoFCEnum::A_RECEBER;
                $where = $where . " and tfc." . DT_VENCIMENTO . " >= '" . Valida::DataAtualBanco() . "'";
                break;
            case 8:
                $where = $where . " and tfc." . TP_FLUXO . " = " . TipoFluxoCaixaEnum::SAIDA;
                $where = $where . " and tfc." . ST_PAGAMENTO . " = " . StatusPagamentoFCEnum::A_PAGAR;
                $where = $where . " and tfc." . DT_VENCIMENTO . " >= '" . Valida::DataAtualBanco() . "'";
                break;
            case 9:
                $where = $where . " and tfc." . TP_FLUXO . " = " . TipoFluxoCaixaEnum::ENTRADA;
                $where = $where . " and tfc." . ST_PAGAMENTO . " in (" . StatusPagamentoFCEnum::EM_ATRASO . "," .
                    StatusPagamentoFCEnum::A_RECEBER . ")";
                break;
            case 10:
                $where = $where . " and tfc." . TP_FLUXO . " = " . TipoFluxoCaixaEnum::SAIDA;
                $where = $where . " and tfc." . ST_PAGAMENTO . " in (" . StatusPagamentoFCEnum::EM_ATRASO . "," .
                    StatusPagamentoFCEnum::A_PAGAR . ")";
                break;
        }

        return $where;
    }

}