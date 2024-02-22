$(function () {

        var divGraf1 = document.getElementById('graf1');
        var divGraf2 = document.getElementById('graf2');

        // Carrega Grafico PONTO EQUILIBRIO
        google.charts.load('current', {packages: ['corechart']});
        google.charts.setOnLoadCallback(atualGrafPE);

        function atualGrafPE() {
            var rec1 = valorFloat($('#valor_rec_base').val());
            var rec2 = valorFloat($('#valor_rec_simu').val());
            var cf1 = valorFloat($('.res1').text());
            var cf2 = valorFloat($('.res2').text());

            if(rec1 == '0')
                rec1 = 1;
            if(rec2 == '0')
                rec2 = 1;

            var data5 = google.visualization.arrayToDataTable([['', 'FATURAMENTO',
                {role: 'annotation'}, {role: 'style'}, 'P.Eq.',
                {role: 'annotation'}, {role: 'style'}],
                ['CENÁRIO ATUAL', rec1, converteReal(rec1), 'color: darkgreen',
                    cf1, converteReal(cf1), 'color: darkblue'],
                ['CENÁRIO SIMULADO', rec2, converteReal(rec2), 'color: green',
                    cf2, converteReal(cf2), 'color: blue']]);
            var options5 = {
                title: '',
                width: $('#graf1').width(),
                height: $('#graf1').height(),
                titleTextStyle: {color: 'gray', fontSize: 20},
                legend: {position: 'none', maxLines: 3, textStyle: {fontSize: 10}},
            };

            var chart5 = new google.visualization.ColumnChart(divGraf1);
            chart5.draw(data5, options5);
        }

        // Carrega Grafico PONTO EQUILIBRIO
        google.charts.load('current', {packages: ['corechart']});
        google.charts.setOnLoadCallback(atualGrafPE2);

        function atualGrafPE2() {
            var rec1 = valorFloat($('#valor_rec_base_lucro').val());
            var rec2 = valorFloat($('#valor_rec_simu_lucro').val());
            var cf1 = valorFloat($('.res3').text());
            var cf2 = valorFloat($('.res4').text());

            if(rec1 == '0')
                rec1 = 1;
            if(rec2 == '0')
                rec2 = 1;

            var data2 = google.visualization.arrayToDataTable([['', 'FATURAMENTO',
                {role: 'annotation'}, {role: 'style'}, 'P.Eq.',
                {role: 'annotation'}, {role: 'style'}],
                ['CENÁRIO ATUAL', rec1, converteReal(rec1), 'color: darkgreen',
                    cf1, converteReal(cf1), 'color: darkblue'],
                ['CENÁRIO SIMULADO', rec2, converteReal(rec2), 'color: green',
                    cf2, converteReal(cf2), 'color: blue']]);
            var options2 = {
                title: '',
                width: $('#graf2').width(),
                height: $('#graf2').height(),
                titleTextStyle: {color: 'gray', fontSize: 20},
                legend: {position: 'none', maxLines: 3, textStyle: {fontSize: 10}},
            };

            var chart2 = new google.visualization.ColumnChart(divGraf2);
            chart2.draw(data2, options2);
        }

        $('.navigation-toggler').click(function () {
            $(this).hide();
        }).click();


        $('.receita').blur(function () {
            var CENARIO = $(this).attr('alt');
            var receita = valorFloat($(this).val());

            atualGrafPE();
        });
        $('.receita2').blur(function () {
            var CENARIO2 = $(this).attr('alt');
            var receita2 = valorFloat($(this).val());

            atualGrafPE2();
        });

        function calculaMC(cenario) {
            var total = 0;
            $('.porc' + cenario).each(function () {
                total += valorFloat($(this).val());
            });
            var mc = (100 - total).toFixed(2);
            $('.denominador' + cenario).text(mc + "%");
            /// SIMULADOR DE GASTO
            $('.denominador5').text(mc + "%");
            var cf = valorFloat($('.numerador' + cenario).text());
            var peo = converteReal(parseFloat((cf / mc) * 100));
            $('.res' + cenario).text(peo);
            atualGrafPE();
        }

        function calculaMC2(cenario) {
            var total = 0;
            $('.porc' + cenario).each(function () {
                total += valorFloat($(this).val());
            });
            var mc = (100 - total).toFixed(2);
            $('.denominador' + cenario).text(mc + "%");
            /// SIMULADOR DE GASTO
            $('.denominador6').text(mc + "%");
            var cf = valorFloat($('.numerador' + cenario).text());
            var peo = converteReal(parseFloat((cf / mc) * 100));
            $('.res' + cenario).text(peo);
            atualGrafPE2();
        }

        $('.porc1').blur(function () {
            calculaMC(1);
            calculaPEGasto('base');
        });

        $('.porc2').blur(function () {
            calculaMC(2);
        });

        $('.porc3').blur(function () {
            calculaMC2(3);
            calculaPEGasto('simu');
        });

        $('.porc4').blur(function () {
            calculaMC2(4);
        });

        $('.despInd, .pro').blur(function () {
            var tipo = '';
            var CENARIO = $(this).attr('alt');
            var cf = valorFloat($('#valor_des_' + CENARIO).val());
            var pro = valorFloat($('#valor_pro_' + CENARIO).val());

            if (CENARIO == 'base') {
                tipo = 1;
            } else {
                tipo = 2;
            }
            var total = formatReal(parseFloat(cf + pro));

            $('.numerador' + tipo).text(total);
            calculaMC(tipo);
        });

        $('.despInd2, .pro2').blur(function () {
            var tipo = '';
            var CENARIO = $(this).attr('alt');
            var cf = valorFloat($('#valor_des_' + CENARIO + '_lucro').val());
            var pro = valorFloat($('#valor_pro_' + CENARIO + '_lucro').val());

            if (CENARIO == 'base') {
                tipo = 3;
            } else {
                tipo = 4;
            }
            var total = formatReal(parseFloat(cf + pro));

            $('.numerador' + tipo).text(total);
            calculaMC2(tipo);
        });

        $('.gasto').blur(function () {
            var CENARIO = $(this).attr('alt');
            calculaPEGasto(CENARIO);
        });

        function calculaPEGasto(CENARIO){
            var tipo = '';
            var gasto = valorFloat($('#valor_gas_' + CENARIO + '_gasto').val());

            if (CENARIO == 'base') {
                tipo = 5;
            } else {
                tipo = 6;
            }
            var total = formatReal(parseFloat(gasto));

            $('.numerador' + tipo).text(total);

            var mc = valorFloat($('.denominador' + tipo).text());
            var peo = converteReal(parseFloat((gasto / mc)) * 10000);
            $('.res' + tipo).text(peo);
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