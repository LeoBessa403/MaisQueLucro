$(function () {

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


    $.mask.definitions['r'] = "[0-1]";
    $.mask.definitions['d'] = "[0-9]";
    $.mask.definitions['h'] = "[2]";
    $.mask.definitions['g'] = "[0]";
    $.mask.definitions['m'] = "[1-3]";
    $.mask.definitions['s'] = "[0-9]";
    $(".periodo").mask("rd/hgms");

});