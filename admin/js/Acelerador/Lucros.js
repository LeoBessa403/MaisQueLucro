$(function () {

        var divGraf1 = document.getElementById('graf1');
        var divGraf2 = document.getElementById('graf2');
        // Carrega Grafico 1 PIZZA
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawChart2);

        function drawChart2() {
            var data2 = google.visualization.arrayToDataTable([['', ''],
                ['DESPESAS DIRETAS (CV)', 1], ['DESPESAS INDIRETAS (CF)', 1],
                ['LUCRO LÍQUIDO (LO)', 1]]);
            var options2 = {
                title: 'DIVISÃO DO FATURAMENTO',
                is3D: true
            };
            var chart2 = new google.visualization.PieChart(divGraf1);
            chart2.draw(data2, options2);
        }

        // FIM Grafico 1 PIZZA
        function atualizaGrafPizza(CV, CF, LO) {
            if (LO < 0)
                LO = 0;
            var data11 = google.visualization.arrayToDataTable([['', ''],
                ['DESPESAS DIRETAS (CV)', CV], ['DESPESAS INDIRETAS (CF)', CF],
                ['LUCRO LÍQUIDO (LO)', LO]]);
            var options11 = {
                title: 'DIVISÃO DO FATURAMENTO',
                is3D: true
            };
            var chart11 = new google.visualization.PieChart(divGraf1);
            chart11.draw(data11, options11);
        }

        // Carrega Grafico PONTO EQUILIBRIO
        google.charts.load('current', {packages: ['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data5 = google.visualization.arrayToDataTable([['', 'BASE',
                {role: 'annotation'}, {role: 'style'}, 'TURBINADO',
                {role: 'annotation'}, {role: 'style'}],
                ['P.E OPERACIONAL', 47564.31, 47564.31, 'color: darkgreen', 39654.31, 39654.31, 'color: darkblue'],
                ['P.E LUCRATIVO', 59564.31, 59564.31, 'color: green', 49854.31, 49854.31, 'color: blue']]);
            var options5 = {
                title: '',
                width: $('#graf2').width(),
                height:  $('#graf2').height(),
                titleTextStyle: {color: 'gray', fontSize: 20},
                legend: {position: 'none', maxLines: 3, textStyle: {fontSize: 10}},
            };

            var chart5 = new google.visualization.ColumnChart(divGraf2);
            chart5.draw(data5, options5);
        }

        // FIM Grafico PONTO EQUILIBRIO

        function atualizaGrafPE(CV, CF, LO) {
            var data33 = google.visualization.arrayToDataTable([['', 'BASE',
                {role: 'annotation'}, {role: 'style'}, 'TURBINADO',
                {role: 'annotation'}, {role: 'style'}],
                ['P.E OPERACIONAL', 564.31, 564.31, 'color: darkgreen', 654.31, 654.31, 'color: darkblue'],
                ['P.E LUCRATIVO', 564.31, 564.31, 'color: green', 854.31, 854.31, 'color: blue']]);
            var options33 = {
                title: '',
                width: $('#graf2').width(),
                height:  $('#graf2').height(),
                titleTextStyle: {color: 'gray', fontSize: 20},
                legend: {position: 'none', maxLines: 3, textStyle: {fontSize: 10}},
            };

            var chart33 = new google.visualization.ColumnChart(divGraf2);
            chart33.draw(data33, options33);
        }

        $('.navigation-toggler').click(function () {
            $(this).hide();
        }).click();


        $('.iMenos').click(function () {
            var elementProx = $(this).next();
            var valorPerc = parseFloat(elementProx.val()) - 1;
            elementProx.val(valorPerc);
            var tipo = $(this).attr('id').replace('iMenos_', '');
            calculaValores(tipo);
            calcPercDif(tipo, valorPerc);
            calcPercDifTotal();
        });
        $('.iMais').click(function () {
            var elementProx = $(this).prev();
            var valorPerc = parseFloat(elementProx.val()) + 1;
            elementProx.val(valorPerc);
            var tipo = $(this).attr('id').replace('iMais_', '');
            calculaValores(tipo);
            calcPercDif(tipo, valorPerc);
            calcPercDifTotal();
        });

        function calcPercDifTotal() {
            var percBase = $('#valor_lo_base').val().replace('R$ ', '').trim();
            var percTotal = $('#valor_lo_total').val().replace('R$', '').trim();

            var valorDif = 0;
            if (valorFloat(percTotal) > 0) {
                valorDif = (valorFloat(percTotal) - valorFloat(percBase)).toFixed(2);
            } else {
                percTotal = percTotal.replace('-', '').trim();
                valorDif = ((valorFloat(percTotal) * -1) - valorFloat(percBase)).toFixed(2);
            }
            var percDif = ((valorDif / valorFloat(percBase)) * 100).toFixed(2);
            var elemValor = $('#valor_diflo_total');
            var elemValorPerc = $('#valor_diflo_total_perc');
            valorDif = 'R$ ' + formatReal(valorDif);
            if (percTotal == 0) {
                percDif = '0.00%'
                valorDif = 'R$ 0.00'
                elemValorPerc.css('color', 'black');
                elemValor.css('color', '#858585');
            } else if (percDif < 0) {
                percDif = '<i class="fa fa-level-down"></i> ' + percDif + '%'
                elemValorPerc.css('color', 'red');
                elemValor.css('color', 'red');
            } else if (percDif > 0) {
                percDif = '<i class="fa fa-level-up"></i> ' + percDif + '%'
                elemValorPerc.css('color', 'green');
                elemValor.css('color', 'green');
            }
            elemValorPerc.html(percDif);
            elemValor.val(converteReal(valorDif));
        }

        function calcPercDif(tipo, valorPerc) {
            var percBase = $('#valor_lo_base').val().replace('R$ ', '').trim();
            var percTipo = $('#valor_lo_' + tipo).val().replace('R$', '').trim();
            var valorDif = 0;
            if (valorFloat(percTipo) > 0) {
                valorDif = (valorFloat(percTipo) - valorFloat(percBase)).toFixed(2);
            } else {
                percTipo = percTipo.replace('-', '').trim();
                valorDif = ((valorFloat(percTipo) * -1) - valorFloat(percBase)).toFixed(2);
            }
            var percDif = ((valorDif / valorFloat(percBase)) * 100).toFixed(2);
            var elemValor = $('#valor_diflo_' + tipo);
            var elemValorPerc = $('#valor_diflo_' + tipo + '_perc');
            var elemValorImp = $('#valor_dif' + tipo);
            var elemValorPercImp = $('#valor_dif' + tipo + '_perc');//55678
            valorDif = 'R$ ' + formatReal(valorDif);
            if (valorPerc == 0) {
                percDif = '0.00%'
                valorDif = 'R$ 0.00'
                elemValorPerc.css('color', 'black');
                elemValor.css('color', '#858585');
                elemValorPercImp.css('color', 'black');
                elemValorImp.css('color', '#858585');
            } else if (percDif < 0) {
                percDif = '<i class="fa fa-level-down"></i> ' + percDif + '%'
                elemValorPerc.css('color', 'red');
                elemValor.css('color', 'red');
                elemValorPercImp.css('color', 'red');
                elemValorImp.css('color', 'red');
            } else if (percDif > 0) {
                percDif = '<i class="fa fa-level-up"></i> ' + percDif + '%'
                elemValorPerc.css('color', 'green');
                elemValor.css('color', 'green');
                elemValorPercImp.css('color', 'green');
                elemValorImp.css('color', 'green');

            }
            elemValorPerc.html(percDif);
            elemValor.val(converteReal(valorDif));
            elemValorImp.val(converteReal(valorDif));
            elemValorPercImp.html(percDif);
        }

        function calculaValores(tipo) {

            var receita = valorFloat($('#valor_rec_base').val());
            var cv = valorFloat($('#valor_cv_base').val());
            var cf = valorFloat($('#valor_cf_base').val());
            var percCV = parseFloat(valorPorc(cv, receita)) / 100;

            var receitaTT = valorFloat($('#valor_rec_total').val());
            var cvTT = valorFloat($('#valor_cv_total').val());
            var cfTT = valorFloat($('#valor_cf_total').val());

            var percVenda = (parseFloat($('#valor_perc_venda').val()) / 100) + 1;
            var percPreco = (parseFloat($('#valor_perc_preco').val()) / 100) + 1;
            var percCustVar = (parseFloat($('#valor_perc_custVar').val()) / 100) + 1;
            var perccustFix = (parseFloat($('#valor_perc_custFix').val()) / 100) + 1;

            switch (tipo) {
                case 'venda':
                    // Fator de Venda
                    receitaTT = receita * percVenda;
                    cvTT = receitaTT * percCV;
                    // Fator de Preço
                    receitaTT = receitaTT * percPreco;

                    receita = receita * percVenda;
                    cv = receita * percCV;
                    break;
                case 'preco':
                    // Fator de Venda
                    receitaTT = receita * percVenda;
                    cvTT = receitaTT * percCV;
                    // Fator de Preço
                    receitaTT = receitaTT * percPreco;

                    receita = receita * percPreco;
                    break;
                case 'custVar':
                    cv = cv * percCustVar;

                    // Fator de Venda
                    receitaTT = receita * percVenda;
                    cvTT = receitaTT * percCV;
                    // Fator de Preço
                    receitaTT = receitaTT * percPreco;
                    // Fator de CV
                    cvTT = cvTT * percCustVar;

                    break;
                case 'custFix':
                    cf = cf * perccustFix;
                    cfTT = cf;
                    break;
            }

            calcDados(receita, tipo, cv, cf);
            calcDados(receitaTT, 'total', cvTT, cfTT);
        }

        $('.receita').blur(function () {
            var tipo = $(this).attr('alt');
            var receita = valorFloat($(this).val());
            var cv = valorFloat($('#valor_cv_' + tipo).val());
            var cf = valorFloat($('#valor_cf_' + tipo).val());
            refazCalcDados(receita, cv, cf);
            var lo1 = receita - cv - cf;
            atualizaGrafPizza(cv, cf, lo1);
            atualizaGrafPE(cv, cf, lo1);
        });

        $('.cv').blur(function () {
            var tipo = $(this).attr('alt');
            var cv = valorFloat($(this).val());
            var receita = valorFloat($('#valor_rec_' + tipo).val());
            var cf = valorFloat($('#valor_cf_' + tipo).val());
            refazCalcDados(receita, cv, cf);
            var lo1 = receita - cv - cf;
            atualizaGrafPizza(cv, cf, lo1);
            atualizaGrafPE(cv, cf, lo1);
        });

        $('.cf').blur(function () {
            var tipo = $(this).attr('alt');
            var cf = valorFloat($(this).val());
            var receita = valorFloat($('#valor_rec_' + tipo).val());
            var cv = valorFloat($('#valor_cv_' + tipo).val());
            refazCalcDados(receita, cv, cf);
            var lo1 = receita - cv - cf;
            atualizaGrafPizza(cv, cf, lo1);
            atualizaGrafPE(cv, cf, lo1);
        });

        function refazCalcDados(receita = 0, cv = 0, cf = 0) {
            calcDados(receita, 'base', cv, cf);
            calcDados(receita, 'venda', cv, cf);
            calcDados(receita, 'preco', cv, cf);
            calcDados(receita, 'custVar', cv, cf);
            calcDados(receita, 'custFix', cv, cf);
            calcDados(receita, 'total', cv, cf);
        }

        function calcDados(receita = 0, tipo = '', cv = 0, cf = 0) {
            if (receita) {
                $('#valor_rec_' + tipo + '_perc').text('100%');
                $('#valor_cv_' + tipo + '_perc').text(valorPorc(cv, receita));
                if (tipo == 'base')
                    $('#valor_rec_' + tipo).val(converteRealSemSimbolo(receita));
                else
                    $('#valor_rec_' + tipo).val(converteReal(receita));
                if (cv) {
                    var mc = receita - cv;
                    $('#valor_mc_' + tipo).val(converteReal(mc));

                    if (tipo == 'base')
                        $('#valor_cv_' + tipo).val(converteRealSemSimbolo(cv));
                    else
                        $('#valor_cv_' + tipo).val(converteReal(cv));

                    $('#valor_mc_' + tipo + '_perc').text(valorPorc(mc, receita));
                }
                if (cf) {
                    $('#valor_cf_' + tipo + '_perc').text(valorPorc(cf, receita));

                    if (tipo == 'base')
                        $('#valor_cf_' + tipo).val(converteRealSemSimbolo(cf));
                    else
                        $('#valor_cf_' + tipo).val(converteReal(cf));

                    var lo = receita - cv - cf;

                    if (lo) {
                        $('#valor_lo_' + tipo).val(converteReal(lo));
                        $('#valor_lo_' + tipo + '_perc').text(valorPorc(lo, receita));
                        $('#perc_' + tipo).text(valorPorc(lo, receita));
                        if (tipo == 'base' || tipo == 'total') {
                            if (lo > 0) {
                                $('#perc_' + tipo).css('background-color', 'green');
                            } else {
                                $('#perc_' + tipo).css('background-color', 'red');
                            }
                        } else {
                            $('#valor_lo_' + tipo + '_perc')
                        }
                    }
                }
            } else {
                $('#valor_rec_' + tipo + '_perc').text('0%');
            }
            atualizaGrafPizza(cv)
        }

        function valorFloat(vlrCampo) {
            return parseFloat(vlrCampo
                .replace('R$', '').replace('.', '')
                .replace(',', '.').trim());
        }

        function valorMoeda(vlrCampo) {
            return parseFloat(vlrCampo
                .replace('R$', '').replace('.', '')
                .replace(',', '.').trim());
        }

        function valorPorc(vlrCampo, receita) {
            return parseFloat((vlrCampo / receita) * 100).toFixed(2) + '%';
        }

        function converteReal(valor) {
            return valor.toLocaleString('pt-br', {style: 'currency', currency: 'BRL'})
        }

        function formatReal(numero) {
            var tmp = numero + '';
            var neg = false;

            if (tmp - (Math.round(numero)) == 0) {
                tmp = tmp + '00';
            }

            if (tmp.indexOf(".")) {
                tmp = tmp.replace(".", "");
            }

            if (tmp.indexOf("-") == 0) {
                neg = true;
                tmp = tmp.replace("-", "");
            }

            if (tmp.length == 1) tmp = "0" + tmp

            tmp = tmp.replace(/([0-9]{2})$/g, ",$1");

            if (tmp.length > 6)
                tmp = tmp.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");

            if (tmp.length > 9)
                tmp = tmp.replace(/([0-9]{3}).([0-9]{3}),([0-9]{2}$)/g, ".$1.$2,$3");

            if (tmp.length = 12)
                tmp = tmp.replace(/([0-9]{3}).([0-9]{3}).([0-9]{3}),([0-9]{2}$)/g, ".$1.$2.$3,$4");

            if (tmp.length > 12)
                tmp = tmp.replace(/([0-9]{3}).([0-9]{3}).([0-9]{3}).([0-9]{3}),([0-9]{2}$)/g, ".$1.$2.$3.$4,$5");

            if (tmp.indexOf(".") == 0) tmp = tmp.replace(".", "");
            if (tmp.indexOf(",") == 0) tmp = tmp.replace(",", "0,");

            return (neg ? '-' + tmp : tmp);
        }

        function converteRealSemSimbolo(valor) {
            return valor.toLocaleString('pt-br');
        }

    }
);