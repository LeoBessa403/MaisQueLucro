$(function () {

        var divGraf1 = document.getElementById('graf1');

        // Carrega Grafico PONTO EQUILIBRIO
        google.charts.load('current', {packages: ['corechart']});
        google.charts.setOnLoadCallback(atualGrafPE);

        function atualGrafPE(PEOBASE = 1, PEOTURBO = 1, PELBASE = 1, PELTURBO = 1, CENARIO = 1) {
            var data5 = google.visualization.arrayToDataTable([['', 'FATURAMENTO' + CENARIO,
                {role: 'annotation'}, {role: 'style'}, 'P.Eq.' + CENARIO,
                {role: 'annotation'}, {role: 'style'}],
                ['CENÁRIO ATUAL', PEOBASE, converteReal(PEOBASE), 'color: darkgreen',
                    PEOTURBO, converteReal(PEOTURBO), 'color: darkblue'],
                ['CENÁRIO SIMULADO', PELBASE, converteReal(PELBASE), 'color: green',
                    PELTURBO, converteReal(PELTURBO), 'color: blue']]);
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

        function atualizaGrafPE() {
            var cf2 = valorFloat($('#valor_cf_base').val());
            var cfTT2 = valorFloat($('#valor_cf_total').val());
            var mc2 = $('#valor_mc_base_perc').text().replace('%', '');
            var mcTT2 = $('#valor_mc_total_perc').text().replace('%', '');
            var loTT2 = $('#valor_lo_total_perc').text().replace('%', '');

            var PEOBASE = parseFloat(((cf2 / mc2) * 100).toFixed(2));
            var PELBASE = parseFloat(((cf2 / (parseFloat(mc2) - parseFloat(loTT2))) * 100)
                .toFixed(2));
            var PEOTURBO = parseFloat(((cfTT2 / mcTT2) * 100).toFixed(2));
            var PELTURBO = parseFloat(((cfTT2 / (parseFloat(mcTT2) - parseFloat(loTT2))) * 100)
                .toFixed(2));

            atualGrafPE(PEOBASE, PEOTURBO, PELBASE, PELTURBO);
        }

        $('.navigation-toggler').click(function () {
            $(this).hide();
        }).click();


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