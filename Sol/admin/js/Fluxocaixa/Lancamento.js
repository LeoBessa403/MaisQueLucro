$(function () {
    /* table data master */
    $('.footable').footable({
        "paging": {
            "enabled": true,
            "container": '#footable-pagination',
            "countFormat": "{CP} of {TP}",
            "limit": 10,
            "position": "center",
            "size": 20
        },
        "sorting": {
            "enabled": true
        },
    }, function (ft) {
        $('#footablestot').html($('.footable-pagination-wrapper .label').html())

        $('.footable-pagination-wrapper ul.pagination li').on('click', function () {
            setTimeout(function () {
                $('#footablestot').html($('.footable-pagination-wrapper .label').html());
            }, 200);
        });

    });

    $('#selTodosLanc').change(function () {
        alert('ok clicou');
        var checked = $(this).prop('checked');
        $('.bx-lanc').each(function () {
            $(this).prop('checked', checked)
        });
    });

    $('.bx-lanc').click(function () {
        alert('oiioo');
        console.log('ewfwfw');
    });

});