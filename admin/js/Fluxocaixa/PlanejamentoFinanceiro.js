$(function () {


    $('.navigation-toggler').click(function () {
        $(this).hide();
    }).click();

    $('.grid-item').mouseenter(function () {
        var divHover = $(this).attr('data-hover');
        $('.' + divHover).each(function () {
            $(this).addClass('linhaHover');
        });
    }).mouseleave(function () {
        var divHover = $(this).attr('data-hover');
        $('.' + divHover).each(function () {
            $(this).removeClass('linhaHover');
        });
    });

    $(".acao").bind('click', function () {
        var filhas = $(this).parents('.grid-item').attr('data-hover').replace('linha', '');
        if ($(this).hasClass('fa-caret-right')) {
            $('div.filhas' + filhas).slideDown();
            $(this).removeClass('fa-caret-right').addClass('fa-caret-down')
                .attr('title', 'Recolher');
        } else {
            $('div.filhas' + filhas).slideUp();
            $(this).removeClass('fa-caret-down').addClass('fa-caret-right')
                .attr('title', 'Expandir');
        }
    });

    $('#j_mais_ano').click(function () {
        var elementAno = $('#ano_pesquisa b');
        var ano = parseInt(elementAno.text()) + 1;
        elementAno.text(ano);
        $('#anoPesquisa').val(ano);
    });

    $('#j_menos_ano').click(function () {
        var elementAno = $('#ano_pesquisa b');
        var ano = parseInt(elementAno.text()) - 1;
        elementAno.text(ano);
        $('#anoPesquisa').val(ano);
    });

    $('.netas').focusout(function () {
        // vrl-2-202301-3-10
        var id = $(this).attr('id').split('-');
        var somaNetas = 0;
        var somaFilhas = 0;
        $('#grid-col-' + id[2] + ' .filhasf' + id[1] + '-' + id[3]).each(function () {
            var valorNeta = $(this).children('.grid-item-neta').children('table').children('tbody')
                .children('tr').children('td').children('.netas').val();
            somaNetas = somaNetas + valorFloat(valorNeta);
        });
        var soma = converteReal(somaNetas);
        $('#vrl-' + id[1] + '-' + id[2] + '-' + id[3]).val(soma);

        setTimeout(function () {
            $('#grid-col-' + id[2] + ' .filhas' + id[1]).each(function () {

                var vlrCampoFilha = $(this).children('.grid-item-filha').children('table').children('tbody')
                    .children('tr').children('td').children('.filhas').val();

                if (vlrCampoFilha != '0') {
                    somaFilhas = somaFilhas + valorFloat(vlrCampoFilha);
                }
            });
            var soma2 = converteReal(somaFilhas);
            $('#vrl-' + id[1] + '-' + id[2]).val(soma2);
        }, 200);

        setTimeout(function () {
            $('#grid-col-' + id[2] + ' .filhas' + id[1]).each(function () {

                var receita = $('#vrl-1-' + id[2]).val();
                var dd = $('#vrl-2-' + id[2]).val();
                var di = $('#vrl-3-' + id[2]).val();
                var inv = $('#vrl-4-' + id[2]).val();
                var eno = $('#vrl-5-' + id[2]).val();
                var sno = $('#vrl-6-' + id[2]).val();

                $('#vrl-7-' + id[2]).val(converteReal(valorFloat(receita) - valorFloat(dd)));
                $('#vrl-8-' + id[2]).val(converteReal(valorFloat(receita) - valorFloat(dd) - valorFloat(di)));
                $('#vrl-9-' + id[2]).val(converteReal(valorFloat(dd) + valorFloat(di)));
                $('#vrl-10-' + id[2] + ', #vrl-10-' + id[2] + '-2').val(converteReal(
                    valorFloat(receita) - valorFloat(dd) - valorFloat(di) - valorFloat(inv)));
                $('#vrl-11-' + id[2]).val(converteReal(valorFloat(receita) - valorFloat(dd)
                    - valorFloat(di) - valorFloat(inv) - valorFloat(sno) + valorFloat(eno)));
            });
        }, 300);
    });

    function valorFloat(vlrCampo) {
        return parseFloat(vlrCampo
            .replace('R$', '').replace('.', '')
            .replace(',', '.').trim());
    }

    function converteReal(valor) {
        return valor.toLocaleString('pt-br', {style: 'currency', currency: 'BRL'})
    }

});