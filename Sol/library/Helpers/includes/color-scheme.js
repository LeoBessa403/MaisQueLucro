'use strict'
$(document).ready(function () {

    var html = $('html');
    var body = $('body');

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


    /* layout modes dark-light */
    if (getCookie("SOLlayoutMode") === 'dark-mode') {
        $('#btn-layout-modes-dark').prop('checked', true);
        html.addClass('dark-mode');
    } else {
        $('#btn-layout-modes-dark').prop('checked', false);
        html.removeClass('dark-mode');
    }

    $('#btn-layout-modes-dark').on('click', function () {
        if ($(this).is(':checked')) {
            setCookie('SOLlayoutMode', 'dark-mode', 1);
            html.attr('class', 'dark-mode');
        } else {
            setCookie('SOLlayoutMode', 'light-mode', 1);
            html.attr('class', 'light-mode');
        }
    });


    /* Right to left to right directions  */
    if (getCookie('SOLdirectionMode') === 'rtl') {
        $('#btn-layout-RTL').prop('checked', true);
        html.addClass('rtl');
        html.attr('dir', 'ltr');

    } else {
        $('#btn-layout-RTL').prop('checked', false);
        html.attr('dir', '');
        html.removeClass('rtl');
    }

    $('#btn-layout-RTL').on('click', function () {
        if ($(this).is(':checked')) {
            setCookie('SOLdirectionMode', 'rtl', 1);
            html.attr('dir', 'rtl');
            html.addClass('rtl');

        } else {
            setCookie('SOLdirectionMode', 'ltr', 1);
            html.attr('dir', '');
            html.removeClass('rtl');
        }
    });



    /* color style  */
    var curentstyle = body.attr('data-theme');
    if ($.type(getCookie("SOLtheme")) != 'undefined' && getCookie("SOLtheme") != '') {

        body.addClass(getCookie("SOLtheme"));
        body.attr('data-theme', getCookie("SOLtheme"));
        curentstyle = getCookie("SOLtheme");

        $('#theme-select .select-box').each(function () {
            if ($(this).attr('data-title') === getCookie("SOLtheme")) {
                $(this).addClass("active");
            }
        });
        $('.personalise-color-list li').each(function () {
            if ($(this).attr('data-title') === getCookie("SOLtheme")) {
                $(this).addClass("active");
            }
        });
    }

    $('.personalise-color-list li').on('click', function () {
        body.removeClass(body.attr('data-theme'));

        $('.personalise-color-list li').removeClass('active');
        var setstyle = $(this).attr('data-title');

        if ($(this).hasClass('active') != true && setstyle != '') {
            $(this).addClass('active');
            body.addClass(setstyle).attr('data-theme', setstyle);
            setCookie('SOLtheme', setstyle, 1);
            curentstyle = setstyle;
        }

        if ($('.personalise-preview').length > 0) {

        }
    });

    $('#theme-select').find('.select-box').each(function () {

        $(this).on('click', function () {
            $('#theme-select').find('.select-box').removeClass('active');

            if ($(this).hasClass('active') != true && setstyle != '') {
                var curentstyle = body.attr('data-theme');
                var setstyle = $(this).attr('data-title');

                $(this).addClass('active');
                body.removeClass(curentstyle).addClass(setstyle).attr('data-theme', setstyle);
                setCookie('SOLtheme', setstyle, 1);
                curentstyle = setstyle;
            }
        });
    });

    /* sidebar type */
    if ($.type(getCookie("SolsidebarFilled")) != 'undefined' && getCookie("SolsidebarFilled") != '') {
        body.addClass(getCookie("SolsidebarFilled"));

        $('.personalise-preview-sidebar').each(function () {
            $(this).removeClass("active");
            if ($(this).attr('data-title') === getCookie("SolsidebarFilled")) {
                $(this).addClass("active");
            }
        });
    }
    $('.personalise-preview-sidebar').on('click', function () {
        var setSidebarfill = $(this).attr('data-title');

        $('.personalise-preview-sidebar').removeClass('active');
        $(this).addClass("active");

        if (setSidebarfill != "") {
            body.removeClass(getCookie("SolsidebarFilled")).addClass(setSidebarfill);
            setCookie('SolsidebarFilled', setSidebarfill, 1);
        } else {
            body.removeClass(getCookie("SolsidebarFilled"));
            removeCookie('SolsidebarFilled');
        }
    });



    /* sidebar style */
    var currentstyle = body.attr('data-sidebarstyle');
    if ($.type(getCookie("SOLsidebarStyle")) != 'undefined' && getCookie("SOLsidebarStyle") != '') {
        body.removeClass(currentstyle).addClass(getCookie("SOLsidebarStyle")).attr('data-sidebarstyle', getCookie("SOLsidebarStyle"));

        $('.sidebarstyle').each(function () {
            $(this).removeClass("active");
            if ($(this).attr('data-title') === getCookie("SOLsidebarStyle")) {
                $(this).addClass("active");
            }
        });
    }
    $('.sidebarstyle').on('click', function () {
        var setSidebarStyle = $(this).attr('data-title');
        body.attr('data-sidebarstyle', setSidebarStyle);

        $('.sidebarstyle').removeClass('active');
        $(this).addClass("active");

        if (setSidebarStyle != "") {
            body.removeClass(getCookie("SOLsidebarStyle")).addClass(setSidebarStyle);
            setCookie('SOLsidebarStyle', setSidebarStyle, 1);
        } else {
            body.removeClass(getCookie("SOLsidebarStyle"));
            removeCookie('SOLsidebarStyle');
        }
    });


    /* header logo, photo and user name */
    if ("SOLlogoPath" in sessionStorage) {
        $('.header .navbar-brand img').attr('src', sessionStorage.getItem('SOLlogoPath'));
    }
    if ("SOLuserimg1" in sessionStorage) {
        $('#userprofiledd img, #userphotoonboarding3, .ususerphotoonboarding').parent().css('background-image', sessionStorage.getItem('SOLuserimg1'));
    }
    if (getCookie('SOLusername') != '') {
        $('#userprofiledd .username').html(getCookie('SOLusername'));
    }

});