<?php

class IndexController extends AbstractController
{
    public function Index()
    {
        $dados = [];
        if (AssinanteService::getCoAssinanteLogado()) {
            /** @var FluxocaixaService $FluxocaixaService */
            $FluxocaixaService = $this->getService(FLUXO_CAIXA_SERVICE);
            /** @var ContaBancariaService $ContaBancariaService */
            $ContaBancariaService = $this->getService(CONTA_BANCARIA_SERVICE);

            $dados['bancos'] = $ContaBancariaService->PesquisaAvancada([
                CO_ASSINANTE => AssinanteService::getCoAssinanteLogado()
            ]);

            $graficos1 = $FluxocaixaService->PesquisaAvancadaGrafico1();

            $graficoSO1[] = "['Categoria','Total']";
            foreach ($graficos1 as $grafico1) {
                $graficoSO1[] = "['" . $grafico1['ds_texto'] . "'," . $grafico1['total'] . "]";
            }

            // GRAFICO PIZZA
            $grafico = new Grafico(Grafico::PIZZA, "Despesas No Ano / Categoria Específica", "div_um");
            $grafico->SetDados($graficoSO1);
            $grafico->GeraGrafico();

            $graficos2 = $FluxocaixaService->PesquisaAvancadaGrafico2();

            $graficoSO2[] = "['Categoria','Total']";
            $coCats = '0';
            foreach ($graficos2 as $grafico2) {
                $graficoSO2[] = "['" . $grafico2['ds_texto'] . "'," . $grafico2['total'] . "]";
                $coCats .= ', ' . $grafico2[CO_CATEGORIA_FC_FILHA];
            }

            // GRAFICO PIZZA
            $grafico = new Grafico(Grafico::PIZZA, "Despesas No Ano / Categoria", "div_dois");
            $grafico->SetDados($graficoSO2);
            $grafico->GeraGrafico();


            $graficos3 = [];
            for ($i = 5; $i >= 0; $i--) {
                $dt1 = Valida::CalculaData('01/' . date('m/Y'), $i, '-', 'm');
                $dt2 = Valida::CalculaData('31/' . date('m/Y'), $i, '-', 'm');
                $mes = Valida::DataShow(str_replace('/', '-', $dt1), 'M/Y');
                $mesExt = explode('/', $mes);
                $mesArray = Valida::getMesesHistorico();
                $mesExt[0] = $mesArray[$mesExt[0]];
                $graficos3[implode('/', $mesExt)] =
                    $FluxocaixaService->PesquisaAvancadaGrafico3($dt1, $dt2, $coCats);
            }
            $cats = [];

            foreach ($graficos3 as $cat) {
                foreach ($cat as $cat1) {
                    $cats[$cat1[DS_TEXTO]] = $cat1[DS_TEXTO];
                }
            }
            $graficoFinal3 = array("['Mês', '" . implode("', '", $cats) . "']");
            $graficoFinal333 = [];
            foreach ($graficos3 as $data => $esforcos) {
                foreach ($esforcos as $esf) {
                    $graficoFinal333[$data][$esf["ds_texto"]] = $esf["total"];
                }
            }
            foreach ($graficoFinal333 as $data2 => $esforcos2) {
                $strGraficoFinal3 = "['" . $data2 . "'";
                foreach ($cats as $esf2) {
                    if (!empty($esforcos2[$esf2])) {
                        $strGraficoFinal3 .= "," . $esforcos2[$esf2];
                    } else {
                        $strGraficoFinal3 .= ',' . 0;
                    }
                }
                $strGraficoFinal3 .= "]";
                $graficoFinal3[] = $strGraficoFinal3;
            }

            $grafico = new Grafico(Grafico::COLUNA, "Despesas por Categoria 6+", "div_tres");
            $grafico->SetDados($graficoFinal3);
            $grafico->GeraGrafico();


            $graficos4 = [];
            for ($i = 5; $i >= 0; $i--) {
                $dt1 = Valida::CalculaData('01/' . date('m/Y'), $i, '-', 'm');
                $dt2 = Valida::CalculaData('31/' . date('m/Y'), $i, '-', 'm');
                $mes = Valida::DataShow(str_replace('/', '-', $dt1), 'M/Y');
                $mesExt = explode('/', $mes);
                $mesArray = Valida::getMesesHistorico();
                $mesExt[0] = $mesArray[$mesExt[0]];
                $graficos4[implode('/', $mesExt)] =
                    $FluxocaixaService->PesquisaAvancadaGrafico4($dt1, $dt2);
            }

            $graficoFinal4090 = array("['Mês', 'Recebimentos', { role: 'style' }, 'Despesas', { role: 'style' }]");
            $graficoFinal444 = [];
            foreach ($graficos4 as $data => $esforcos) {
                foreach ($esforcos as $esf) {
                    $graficoFinal444[$data]["despesas"] = $esf["despesas"];
                    $graficoFinal444[$data]["recebimentos"] = $esf["recebimentos"];
                }
            }

            foreach ($graficoFinal444 as $data2 => $esforcos2) {
                $strGraficoFinal4 = "['" . $data2 . "'";
                if (!$esforcos2["recebimentos"])
                    $esforcos2["recebimentos"] = 0;
                if (!$esforcos2["despesas"])
                    $esforcos2["despesas"] = 0;
                $strGraficoFinal4 .= "," . $esforcos2["recebimentos"] . ",'color: green'," . $esforcos2["despesas"] . ",'color: gold'";
                $strGraficoFinal4 .= "]";
                $graficoFinal4090[] = $strGraficoFinal4;
            }

            $grafico = new Grafico(Grafico::COLUNA, "Recebimentos x Despesas", "div_quatro");
            $grafico->SetDados($graficoFinal4090);
            $grafico->GeraGrafico();


            $graficos5 = [];
            for ($i = 1; $i <= 6; $i++) {
                $dt1 = Valida::CalculaData('01/' . date('m/Y'), $i, '+', 'm');
                $dt2 = Valida::CalculaData('31/' . date('m/Y'), $i, '+', 'm');
                $mes = Valida::DataShow(str_replace('/', '-', $dt1), 'M/Y');
                $mesExt = explode('/', $mes);
                $mesArray = Valida::getMesesHistorico();
                $mesExt[0] = $mesArray[$mesExt[0]];
                $graficos5[implode('/', $mesExt)] =
                    $FluxocaixaService->PesquisaAvancadaGrafico5($dt1, $dt2);
            }

            $saldo_geral = $FluxocaixaService->PesquisaAvancadaGrafico6();

            $graficoFinal5 = array("['Mês', 'Recebimentos',{ role: 'annotation' }, 'Despesas',{ role: 'annotation' }, 
            'Saldo Acumulado', { role: 'style' },{ role: 'annotation' }]");
            $graficoFinal555 = [];
            $saldoContas = $saldo_geral["saldo_geral"];
            foreach ($graficos5 as $data => $esforcos) {
                foreach ($esforcos as $esf) {
                    $graficoFinal555[$data]["despesas"] = $esf["despesas"];
                    $graficoFinal555[$data]["recebimentos"] = $esf["recebimentos"];
                    if ($esf["despesas"])
                        $saldoContas = ($saldoContas - $esf["despesas"]);
                    if ($esf["recebimentos"])
                        $saldoContas = ($saldoContas + $esf["recebimentos"]);
                    $graficoFinal555[$data]["saldo"] = $saldoContas;
                }
            }
            foreach ($graficoFinal555 as $data2 => $esforcos2) {
                $strGraficoFinal5 = "['" . $data2 . "'";
                $recebimentos = ($esforcos2["recebimentos"]) ? $esforcos2["recebimentos"] : 0;
                $despesas = ($esforcos2["despesas"]) ? $esforcos2["despesas"] : 0;
                $strGraficoFinal5 .= "," . $recebimentos . "," . $recebimentos . "," . $despesas . "," . $despesas
                    . "," . $esforcos2["saldo"] . ",'color: green'," . $esforcos2["saldo"];
                $strGraficoFinal5 .= "]";
                $graficoFinal5[] = $strGraficoFinal5;
            }

            $grafico = new Grafico(Grafico::LINHA, "Previsão de Recebimentos, Despesas e Saldo Acumulado", "div_cinco");
            $grafico->SetDados($graficoFinal5);
            $grafico->GeraGrafico();


            $dadosPE = [];
            for ($i = 6; $i >= 1; $i--) {
                $dt1 = Valida::CalculaData('01/' . date('m/Y'), $i, '-', 'm');
                $dt2 = Valida::CalculaData('31/' . date('m/Y'), $i, '-', 'm');
                $mes = Valida::DataShow(str_replace('/', '-', $dt1), 'M/Y');
                $mesExt = explode('/', $mes);
                $mesArray = Valida::getMesesHistorico();
                $mesExt[0] = $mesArray[$mesExt[0]];
                $dadosPE[implode('/', $mesExt)] =
                    $FluxocaixaService->PesquisaAvancDadosIndicadores($dt1, $dt2);
            }
            $qtdMesAnt = 0;
            $fat = 0;
            $despVar = 0;
            $despFix = 0;
            foreach ($dadosPE as $dadosPEs) {
                if (!empty($dadosPEs["recebimentos"])) {
                    $fat += $dadosPEs["recebimentos"];
                    $despVar += $dadosPEs["desp_var"];
                    $despFix += $dadosPEs["desp_fix"];
                    $qtdMesAnt++;
                }
            }
            if ($fat > 0) {
                $dados['mcPerc'] = (($fat - $despVar) / $fat) * 100;
                $dados['PE'] = (($despFix / $qtdMesAnt) / $dados['mcPerc']) * 100;
                $dados['despFix'] = $despFix / $qtdMesAnt;
            } else {
                $dados['mcPerc'] = 0;
                $dados['PE'] = 0;
                $dados['despFix'] = 0;
            }

            $graficoFinalInd = array("['Mês', 'Lucro Líquido',{ role: 'annotation' }, 'Margem de Contribuição',
            { role: 'annotation' },'LL Antes dos Investimentos (LLAI)',{ role: 'annotation' }, 'Despesas Total',
             { role: 'annotation' }, 'Resultado Líquido', { role: 'annotation' }]");

            $graficoFinalRecDesp = array("['Mês', 'Receita',{ role: 'annotation' }, 'Despesas Direta (cv)',
            { role: 'annotation' },'Despesas Indiretas (cf)',{ role: 'annotation' }, 'Investimentos',
             { role: 'annotation' }, 'Saídas não Operacionais', { role: 'annotation' },
             'Entradas não Operacionais', { role: 'annotation' }]");

            foreach ($dadosPE as $dataMes => $dadosPEs) {
                if (!empty($dadosPEs["recebimentos"])) {
                    $graficoFinalRecDesp2 = "['" . $dataMes . "'";
                    $graficoFinalInd2 = "['" . $dataMes . "'";
                    $recebimentos = ($dadosPEs["recebimentos"]) ? $dadosPEs["recebimentos"] : 0;
                    $desp_var = ($dadosPEs["desp_var"]) ? $dadosPEs["desp_var"] : 0;
                    $desp_fix = ($dadosPEs["desp_fix"]) ? $dadosPEs["desp_fix"] : 0;
                    $invest = ($dadosPEs["invest"]) ? $dadosPEs["invest"] : 0;
                    $saidas = ($dadosPEs["saidas"]) ? $dadosPEs["saidas"] : 0;
                    $entradas = ($dadosPEs["entradas"]) ? $dadosPEs["entradas"] : 0;
                    $graficoFinalRecDesp2 .= "," . $recebimentos . "," . $recebimentos . "," . $desp_var . "," .
                        $desp_var . "," . $desp_fix . "," . $desp_fix . "," . $invest . "," . $invest . "," .
                        $saidas . "," . $saidas . "," . $entradas . "," . $entradas;

                    $mc = $recebimentos - $desp_var;
                    $llai = $mc - $desp_fix;
                    $despTotal = $desp_fix + $desp_var + $invest;
                    $resLiq = $recebimentos - $despTotal - $saidas + $entradas;
                    $lucLiq = $recebimentos - $despTotal;

                    $graficoFinalInd2 .= "," . $lucLiq . "," . $lucLiq . "," . $mc . "," .
                        $mc . "," . $llai . "," . $llai . "," . $despTotal . "," . $despTotal . "," .
                        $resLiq . "," . $resLiq;

                    $graficoFinalRecDesp2 .= "]";
                    $graficoFinalInd2 .= "]";
                    $graficoFinalRecDesp[] = $graficoFinalRecDesp2;
                    $graficoFinalInd[] = $graficoFinalInd2;
                }
            }

            $grafico = new Grafico(Grafico::LINHA, "Receitas x Despesas", "div_sete");
            $grafico->SetDados($graficoFinalRecDesp);
            $grafico->GeraGrafico();

            $grafico = new Grafico(Grafico::LINHA, "Indicadores Financeiros", "div_seis");
            $grafico->SetDados($graficoFinalInd);
            $grafico->GeraGrafico();

            $dados['RecPag'] = $FluxocaixaService->PesquisaAvancPagRec();
        }

        return $dados;
    }

    public function CronExecute()
    {

    }
}