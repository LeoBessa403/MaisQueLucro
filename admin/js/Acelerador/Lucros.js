$(function () {

    $('.iMenos').click(function () {
        var elementProx = $(this).next();
        elementProx.val(parseFloat(elementProx.val()) - 1);
    });
    $('.iMais').click(function () {
        var elementProx = $(this).prev();
        var valorPerc = parseFloat(elementProx.val()) + 1;
        elementProx.val(valorPerc);
        var tipo = $(this).attr('id').replace('iMais_','');

        var valorRef = (valorPerc / 100) + 1

        var receita = valorFloat($('#valor_rec_' + tipo).val());
        var cv = valorFloat($('#valor_cv_' + tipo).val());
        var cf = valorFloat($('#valor_cf_' + tipo).val());

        if(tipo == 'venda')
            receita = receita * valorRef;

        Funcoes.Informativo(receita);
        // calcDados(receita, tipo, cv, cf);


    });

    $('.receita').blur(function () {
        var tipo = $(this).attr('alt');
        var receita = valorFloat($(this).val());
        var cv = valorFloat($('#valor_cv_' + tipo).val());
        var cf = valorFloat($('#valor_cf_' + tipo).val());
        calcDados(receita, tipo, cv, cf);
        calcDados(receita, 'venda', cv, cf);
    });

    $('.cv').blur(function () {
        var tipo = $(this).attr('alt');
        var cv = valorFloat($(this).val());
        var receita = valorFloat($('#valor_rec_' + tipo).val());
        var cf = valorFloat($('#valor_cf_' + tipo).val());
        calcDados(receita, tipo, cv, cf);
        calcDados(receita, 'venda', cv, cf);
    });

    $('.cf').blur(function () {
        var tipo = $(this).attr('alt');
        var cf = valorFloat($(this).val());
        var receita = valorFloat($('#valor_rec_' + tipo).val());
        var cv = valorFloat($('#valor_cv_' + tipo).val());
        calcDados(receita, tipo, cv, cf);
        calcDados(receita, 'venda', cv, cf);
    });

    function calcDados(receita = 0, tipo= '', cv= 0, cf= 0) {
        if (receita) {
            $('#valor_rec_' + tipo + '_perc').text('100%');
            $('#valor_cv_' + tipo + '_perc').text(valorPorc(cv, receita));
            $('#valor_rec_' + tipo).val(converteReal(receita));
            if (cv) {
                var mc = receita - cv;
                $('#valor_mc_' + tipo).val(converteReal(mc));
                $('#valor_cv_' + tipo).val(converteReal(cv));
                $('#valor_mc_' + tipo + '_perc').text(valorPorc(mc, receita));
            }
            if (cf) {
                $('#valor_cf_' + tipo + '_perc').text(valorPorc(cf, receita));
                $('#valor_cf_' + tipo).val(converteReal(cf));
                var lo = receita - cv - cf;

                if (lo) {
                    $('#valor_lo_' + tipo).val(converteReal(lo));
                    $('#valor_lo_' + tipo + '_perc').text(valorPorc(lo, receita));
                    $('#perc_' + tipo).text(valorPorc(lo, receita));

                    if(lo > 0){
                        $('#perc_' + tipo).css('background-color' , 'green');
                    }else{
                        $('#perc_' + tipo).css('background-color' , 'red');
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

});