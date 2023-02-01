$(function () {
    var mask = true;
    function mascaraTel(element, valor) {
        if (valor.length === 11) {
            element.unmask();
            element.mask("(99) 99999-999?9");
        } else if (valor.length === 10) {
            element.unmask();
            element.mask("(99) 9999-9999?9");
        }
    }

    $(".tel").focus(function () {
        if(mask){
            $(this).mask("(99) 9999-9999?9");
            mask = false;
        }
    }).keyup(function () {
        var valor = $(this).val().replace(/[^0-9]+/g, '');
        mascaraTel($(this), valor);
        valor = valor.val().replace(/[^()-]+/g, '');
        $(this).val(valor);
    });


    $('.home_inicio').bind('click', function (e) {
        $('html, body').animate({
            scrollTop: 0 //back-to-top
        }, 1000)
    });

    $('.planos_sistema').bind('click', function (e) {
        $('html, body').animate({
            scrollTop: $(".beautypress-section-headinig").offset().top
        }, 1000)
    });

    $('.saiba_mais').bind('click', function (e) {
        $('html, body').animate({
            scrollTop: $(".beautypress-video-section").offset().top
        }, 1000)
    });
});
