$(function () {

    $('.iMenos').click(function () {
        var elementProx = $(this).next();
        elementProx.val(parseFloat(elementProx.val()) - 1);
    });
    $('.iMais').click(function () {
        var elementProx = $(this).prev();
        elementProx.val(parseFloat(elementProx.val()) + 1);
    });

});