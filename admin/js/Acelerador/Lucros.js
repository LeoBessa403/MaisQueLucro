$(function () {

    $('.iMenos').click(function () {
        var elementProx = $(this).next();
        var valorPerc = parseFloat(elementProx.val()) - 1;
        elementProx.val(valorPerc);
        var tipo = $(this).attr('id').replace('iMenos_', '');
        calculaValores(valorPerc, tipo);
        calcPercDif(tipo, valorPerc);
    });
    $('.iMais').click(function () {
        var elementProx = $(this).prev();
        var valorPerc = parseFloat(elementProx.val()) + 1;
        elementProx.val(valorPerc);
        var tipo = $(this).attr('id').replace('iMais_', '');
        calculaValores(valorPerc, tipo);
        calcPercDif(tipo, valorPerc);
    });

    function calcPercDif(tipo, valorPerc) {
        var percBase = $('#valor_lo_base').val().replace('R$ ', '').trim();
        var percTipo = $('#valor_lo_' + tipo).val().replace('R$', '').trim();
        var valorDif = 0;
        Funcoes.Informativo(percTipo);
        if(percTipo > 0){
            valorDif = (valorFloat(percTipo) - valorFloat(percBase)).toFixed(2);
        }else{
            percTipo = percTipo * -1;
            valorDif = (converteRealSemSimbolo(percTipo) - valorFloat(percBase)).toFixed(2);
        }
        var percDif = ((valorDif / valorFloat(percBase)) * 100).toFixed(2);
        // Funcoes.Informativo('valorDif: ' + valorDif + ' / percBase: ' + valorFloat(percBase) +
        //     ' / percDif: ' + percDif + ' / percTipo: ' + valorFloat(percTipo));
        var elemValor = $('#valor_diflo_' + tipo);
        var elemValorPerc = $('#valor_diflo_' + tipo + '_perc');
        valorDif = 'R$ ' + converteReal(valorDif);
        if (valorPerc == 0) {
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
        elemValor.val(valorDif);
    }

    function calculaValores(valorPerc, tipo) {
        var valorRef = (valorPerc / 100) + 1

        var receita = valorFloat($('#valor_rec_base').val());
        var cv = valorFloat($('#valor_cv_base').val());
        var cf = valorFloat($('#valor_cf_base').val());

        switch (tipo) {
            case 'venda':
                var percCV = parseFloat(valorPorc(cv, receita)) / 100;
                receita = receita * valorRef;
                cv = receita * percCV;
                break;
            case 'preco':
                receita = receita * valorRef;
                break;
            case 'custVar':
                cv = cv * valorRef;
                break;
            case 'custFix':
                cf = cf * valorRef;
                break;
        }
        calcDados(receita, tipo, cv, cf);
    }

    $('.receita').blur(function () {
        var tipo = $(this).attr('alt');
        var receita = valorFloat($(this).val());
        var cv = valorFloat($('#valor_cv_' + tipo).val());
        var cf = valorFloat($('#valor_cf_' + tipo).val());
        refazCalcDados(receita, cv, cf);
    });

    $('.cv').blur(function () {
        var tipo = $(this).attr('alt');
        var cv = valorFloat($(this).val());
        var receita = valorFloat($('#valor_rec_' + tipo).val());
        var cf = valorFloat($('#valor_cf_' + tipo).val());
        refazCalcDados(receita, cv, cf);
    });

    $('.cf').blur(function () {
        var tipo = $(this).attr('alt');
        var cf = valorFloat($(this).val());
        var receita = valorFloat($('#valor_rec_' + tipo).val());
        var cv = valorFloat($('#valor_cv_' + tipo).val());
        refazCalcDados(receita, cv, cf);
    });

    function refazCalcDados(receita = 0, cv = 0, cf = 0) {
        calcDados(receita, 'base', cv, cf);
        calcDados(receita, 'venda', cv, cf);
        calcDados(receita, 'preco', cv, cf);
        calcDados(receita, 'custVar', cv, cf);
        calcDados(receita, 'custFix', cv, cf);
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
                    if (tipo == 'base') {
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

    }

    function valorFloat(vlrCampo) {
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

    function converteRealSemSimbolo(valor) {
        return valor.toLocaleString('pt-br');
    }

});