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
            somaNetas = somaNetas + parseFloat($(this).children('.grid-item-neta').children('table').children('tbody')
                .children('tr').children('td').children('.netas').val()
                .replace('R$ ', '').replace('.', '')
                .replace(',', '.'));
        });
        var soma = somaNetas.toLocaleString('pt-br', {style: 'currency', currency: 'BRL'});
        $('#vrl-' + id[1] + '-' + id[2] + '-' + id[3]).val(soma);

        setTimeout(function () {
            $('#grid-col-' + id[2] + ' .filhas' + id[1]).each(function () {

                var vlrCampoFilha = $(this).children('.grid-item-filha').children('table').children('tbody')
                    .children('tr').children('td').children('.filhas').val();

                if (vlrCampoFilha != '0') {
                    somaFilhas = somaFilhas + parseFloat(vlrCampoFilha
                        .replace('R$', '').replace('.', '')
                        .replace(',', '.').trim());
                }
            });

            var soma2 = somaFilhas.toLocaleString('pt-br', {style: 'currency', currency: 'BRL'});
            $('#vrl-' + id[1] + '-' + id[2]).val(soma2);
        }, 200);
    });

});