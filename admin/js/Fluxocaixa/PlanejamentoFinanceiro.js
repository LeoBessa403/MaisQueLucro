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
        var ano = parseInt(elementAno.text())  - 1;
        elementAno.text(ano);
        $('#anoPesquisa').val(ano);
    });


});