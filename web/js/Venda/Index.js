$(function () {

    $('.menu_click').bind('click', function (e) {
        var div_ref = $(this).attr('data-class');
        var plano = $(this).attr('data-plano');
        if (div_ref) {
            $('html, body').animate({
                scrollTop: $("#" + div_ref).offset().top
            }, 1000);
            $("#co_plano").val(plano);
            Funcoes.ValidaOK('co_plano');
        }

        var coBotao = $(this).attr('data-co-botao');
        if (coBotao) {
            Funcoes.Ajax('Venda/CliqueBotaoAjax', coBotao);
        }
    });

    $("button.bg-color-green").attr('type', 'button');

    var imgBand = '';
    $('.debito,.credito').parents('.input-group').hide();
    $('.user-edit-image-buttons').hide();

    $("#co_plano").change(function () {
        limpaComboParcelas();
        $(".cartao_credito").val('');
        Funcoes.TiraValidacao('numCartao');
    });

    $("#tp_pagamento").change(function () {
        $(".img-load").show();
        var tpPagamento = $(this).val();
        if (tpPagamento == 3) {
            $('.debito').parents('.input-group').hide();
            $('.credito').parents('.input-group').show();
            carregaSession();
        } else if (tpPagamento == 4) {
            $('.debito').parents('.input-group').show();
            $('.credito').parents('.input-group').hide();
        } else {
            $('.debito,.credito').parents('.input-group').hide();
            carregaSession();
        }
        $(".img-load").hide();
    });

    $(".cartao_credito").keyup(function () {
        var numCartao = $(this).val().replace(/[^0-9]+/g, '');
        var TamNumCartao = numCartao.length;
        if (TamNumCartao == 16) {
            numCartao = $(this).val().replace(/[^0-9]+/g, '').substring(6, 0);
            TamNumCartao = numCartao.length;
        }
        var spanBandeira = $(this).parents('.input-group').children('.input-group-addon');
        var spanMensagem = $(this).parents('.input-group').parents('.form-group').children('span.help-block');
        if (TamNumCartao == 6) {
            PagSeguroDirectPayment.getBrand({
                cardBin: numCartao, success: function (retorno) {
                    imgBand = retorno.brand.name;
                    spanBandeira.html("<img src='https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/42x20/" + imgBand + ".png'>")
                }, error: function (retorno) {
                    spanBandeira.empty().html('<i class="fa fa-credit-card-alt"></i>');
                    spanMensagem.text('Cartão inválido');
                }, complete: function (retorno) {
                    $(this).focus()
                }
            })
        } else if (TamNumCartao < 6) {
            spanBandeira.empty().html('<i class="fa fa-credit-card-alt"></i>');
            Funcoes.ValidaErro('numCartao', 'Cartão inválido');
            limpaComboParcelas();
            iniciaComboParcelas()
        }
        var valor = $(this).val().replace(/[^0-9]+/g, '');
        valor = valor.val().replace(/[^.-]+/g, '');
        $(this).val(valor)
    }).focusout(function () {
        var spanBandeira = $(this).parents('.input-group').children('.input-group-addon');
        var numCartao = $(this).val().replace(/[^0-9]+/g, '');
        var TamNumCartao = numCartao.length;
        if (TamNumCartao < 16) {
            spanBandeira.empty().html('<i class="fa fa-credit-card-alt"></i>');
            Funcoes.ValidaErro('numCartao', 'Cartão inválido');
            limpaComboParcelas();
        } else {
            $('#bandeiraCartao').val(imgBand);
            Funcoes.ValidaOK('numCartao', 'Cartão Válido');
            recupParcelas(imgBand)
        }
    });

    function recupParcelas(bandeira) {
        var coPlano = $("#co_plano").val();
        var comboParc = $("#qntParcelas");
        if (coPlano) {
            var dados = Funcoes.Ajax('Venda/getValorPlano', coPlano);
            var valorPlano = dados.nu_valor_assinatura;
            limpaComboParcelas();
            var noIntInstalQuantity = 3;
            PagSeguroDirectPayment.getInstallments({
                amount: valorPlano,
                maxInstallmentNoInterest: noIntInstalQuantity,
                brand: bandeira,
                success: function (retorno) {
                    $.each(retorno.installments, function (ia, obja) {
                        $.each(obja, function (ib, objb) {
                            var valorParcela = objb.installmentAmount.toFixed(2).replace(".", ",");
                            comboParc.append(new Option(objb.quantity + " x R$ " + valorParcela, objb.quantity, !1, !1)).trigger('change')
                        })
                    });
                    iniciaComboParcelas()
                },
                error: function (retorno) {
                },
                complete: function (retorno) {
                }
            })
        }
    }

    $("#qntParcelas").change(function () {
        if ($(this).val() != 'null') {
            var valorParcela = $("#qntParcelas option:selected").text().split(' x R$ ');
            $("#installmentValue").val(valorParcela[1])
        }
    });

    function limpaComboParcelas() {
        var comboParc = $("#qntParcelas");
        comboParc.empty();
        var newOptionParc = new Option('Selecione um Parcelamento', null, !1, !1);
        comboParc.append(newOptionParc);
    }

    function iniciaComboParcelas() {
        var comboParc = $("#qntParcelas");
    }

    function carregaSession() {
        var dados = Funcoes.Ajax('Venda/getReferenciaPagamentoInscricao', null);
        PagSeguroDirectPayment.setSessionId(dados.id);
    }

    $(".bg-color-green").click(function () {
        $(".img-load").show();
        var tpPagamento = $("#tp_pagamento").val();
        if (tpPagamento) {
            if (tpPagamento == 3) {
                var validade = $('#validadeCartao').val().split('/');
                var numCartao = $('#numCartao').val().replace(/[^0-9]+/g, '');
                PagSeguroDirectPayment.createCardToken({
                    cardNumber: numCartao,
                    brand: $('#bandeiraCartao').val(),
                    cvv: $('#cvvCartao').val(),
                    expirationMonth: validade[0],
                    expirationYear: validade[1],
                    success: function (retorno) {
                        $('#tokenCartao').val(retorno.card.token);
                        recupHashCartao();
                    },
                    error: function (retorno) {
                        $(".img-load").hide();
                    },
                    complete: function (retorno) {
                    }
                });
            } else if (tpPagamento == 5) {
                recupHashCartao();
            } else if (tpPagamento == 4) {
                recupHashCartao();
            }
        } else {
            recupHashCartao();
        }
    });

    function recupHashCartao() {
        PagSeguroDirectPayment.onSenderHashReady(function (retorno) {
            if (retorno.status == 'error') {
                $(".img-load").hide();
                Funcoes.Erro(retorno.message);
                return 1
            } else {
                $("#hash").val(retorno.senderHash);
                $("#VendaAssinatura").submit();
            }
        })
    }

});
