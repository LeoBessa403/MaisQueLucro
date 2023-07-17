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

    /* create cookie */
    function setCookie(cname, cvalue, exdays) {
        const d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        let expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";  path=/; SameSite=None; Secure";
    }

    function getCookie(cname) {
        let name = cname + "=";
        let ca = document.cookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    if(getCookie('SOLlayoutMenuFC')){
        setMenu(getCookie('SOLlayoutMenuFC'));
    }else{
        setMenu('modelo1');
    }

    $('.modelo-menu').click(function () {
        setMenu($(this).attr('data-id'));
    });

    function setMenu(showMenuId) {
        $('.tp-menu').hide();
        $('#' + showMenuId).show();
        setCookie('SOLlayoutMenuFC', showMenuId, 60);
    }

});