$(function () {

    var carregaComboCat = true;
    var carregaEstruturaCat = true;
    var carregaComboCatEnt = true;
    var carregaComboCatSaida = true;
    var imgLoad = $('.img-load');

    $('.navigation-toggler').click(function () {
        $(this).hide();
    }).click();

    $('.btn-categoria').click(function () {
        if (carregaComboCat) {
            carregaComboCategorias();
            carregaComboCat = false;
        }
        $("#j_cadastro").click();
        return false;
    });

    $('.btn-est-cat').click(function () {
        if (carregaEstruturaCat) {
            carregaEstruturaCategorias();
            carregaEstruturaCat = false;
        }
        $("#j_estrutura_cat").click();
        return false;
    });

    $('.btn-pesquisa').click(function () {
        $("#j_pesquisa").click();
        return false;
    });

    $('.btn-rep').click(function () {
        $("#j_representacao").click();
        return false;
    });

    $('.btn-centro').click(function () {
        $("#j_centro").click();
        return false;
    });

    $('.btn-trans').click(function () {
        $("#j_TransfSaldo").click();
        return false;
    });

    $('#selTodosLanc').change(function () {
        var checked = $(this).prop('checked');
        $('.bx-lanc').each(function () {
            $(this).prop('checked', checked)
        });
    });

    $('.btn-baixa').click(function () {
        var fcs = '';
        var selecionado = false;
        $('.bx-lanc').each(function () {
            if ($(this).prop('checked')) {
                selecionado = true;
                fcs = fcs + ',' + $(this).val();
            }
        });

        if(selecionado){
            $("#valorDarBaixa").val(fcs);
            $("#j_Baixa").click();
        }else{
            Funcoes.Alerta('Selecione pelo menos um Lançamento para Dar Baixar no Pagamento.');
        }
        return false;
    });

    $('.btn-entrada').click(function () {
        if (carregaComboCatEnt) {
            carregaComboCategoriasEntrada();
            carregaComboCatEnt = false;
        }
        $("#j_entrada").click();
        return false;
    });

    $('.btn-saida').click(function () {
        if (carregaComboCatSaida) {
            carregaComboCategoriasSaida();
            carregaComboCatSaida = false;
        }
        $("#j_saida").click();
        return false;
    });

    $('.btn-conta').click(function () {
        $("#j_cadastro_conta").click();
        $("#dadosContas").show();
        $("#histContas").hide();
        return false;
    });

    $('#CadastrarFluxocaixa #co_categoria_fc').change(function () {
        if (!$(this).val())
            return false;

        var sel = $(this).val().split('-');

        var data = {
            tpCat: sel[0],
            coCat: sel[1]
        };

        var dados = Funcoes.Ajax('Fluxocaixa/PesquisaNuCodigo', data);

        if (dados) {
            if (dados.sucesso) {
                $('#nu_codigo').val(sel[2] + '.' + (dados.nuQtd + 1))
            }
        } else {
            Funcoes.Erro("Erro ao Buscar Categorias!")
        }
        return false;
    });

    $('#btnDarBaixa').click(function () {
        var data6 = $("#valorDarBaixa").val();
        var dados = Funcoes.Ajax('Fluxocaixa/BaixarPagamentos', data6);
        if (dados) {
            if (dados.sucesso && dados.msg === "atualizado") {
                Funcoes.AtualizadoSucesso();
            } else {
                Funcoes.Alerta(dados.msg)
            }
            if (dados.sucesso) {
                setTimeout(function () {
                    location.reload();
                }, 2300);
            }
        } else {
            Funcoes.Erro("Erro: " + dados.msg);
        }
        return false;
    });


    $('#CadastrarFluxocaixa .btn-success').click(function () {
        var sel = $('#CadastrarFluxocaixa #co_categoria_fc').val().split('-');

        var data = {
            tpCat: sel[0],
            coCat: sel[1],
            ds_texto: $('#CadastrarFluxocaixa #ds_texto').val(),
            nu_codigo: $('#CadastrarFluxocaixa #nu_codigo').val()
        };

        var dados = Funcoes.Ajax('Fluxocaixa/CadastroCategoriaFC', data);
        if (dados) {
            if (dados.sucesso && dados.msg === "cadastrado") {
                Funcoes.CadastradoSucesso();
                $('#CadastrarFluxocaixa #ds_texto').val('');
                $('#CadastrarFluxocaixa #nu_codigo').val('');
                carregaComboCategorias();
                carregaEstruturaCategorias();
            } else {
                Funcoes.Alerta(dados.msg)
            }
        } else {
            Funcoes.Erro("Erro: " + dados.msg)
        }
        return false;
    });

    $('#CadastrarContaBancaria .btn-success').click(function () {

        var data2 = {
            st_status: ($("#CadastrarContaBancaria #st_status").prop('checked')) ? 'S' : 'N',
            nu_agencia: $('#CadastrarContaBancaria #nu_agencia').val(),
            nu_conta: $('#CadastrarContaBancaria #nu_conta').val(),
            nu_saldo: $('#CadastrarContaBancaria #nu_saldo').val(),
            no_banco: $('#CadastrarContaBancaria #no_banco').val(),
            ds_observacao: $('#CadastrarContaBancaria #ds_observacao').val(),
            co_conta_bancaria: $('#CadastrarContaBancaria #co_conta_bancaria').val()
        };

        var dados = Funcoes.Ajax('Fluxocaixa/CadastroContaBancaria', data2);
        if (dados) {
            if (dados.sucesso && dados.msg === "cadastrado") {
                Funcoes.CadastradoSucesso();
            } else if (dados.sucesso && dados.msg === "atualizado") {
                Funcoes.AtualizadoSucesso();
            } else {
                Funcoes.Alerta(dados.msg)
            }
            if (dados.sucesso) {
                setTimeout(function () {
                    location.reload();
                }, 2300);
            }
        } else {
            Funcoes.Erro("Erro: " + dados.msg);
        }
        return false;
    });

    $('#Representacao .btn-success').click(function () {

        var data4 = {
            no_representacao: $("#Representacao #no_representacao").val(),
            ds_email: $('#Representacao #ds_email').val(),
            nu_tel1: $('#Representacao #nu_tel1').val(),
            co_representacao: $('#Representacao #co_representacao').val()
        };

        var dados = Funcoes.Ajax('Fluxocaixa/CadastroRepresentacao', data4);
        if (dados) {
            if (dados.sucesso && dados.msg === "cadastrado") {
                Funcoes.CadastradoSucesso();
            } else if (dados.sucesso && dados.msg === "atualizado") {
                Funcoes.AtualizadoSucesso();
            } else {
                Funcoes.Alerta(dados.msg)
            }
            if (dados.sucesso) {
                setTimeout(function () {
                    location.reload();
                }, 2300);
            }
        } else {
            Funcoes.Erro("Erro: " + dados.msg);
        }
        return false;
    });

    $('#FCEntrada .btn-success').click(function () {

        var data5 = {
            tp_pagamento: $("#FCEntrada #tp_pagamento").val(),
            co_categoria_fc: $('#FCEntrada #co_categoria_fc').val(),
            dt_vencimento: $('#FCEntrada #e-dt_vencimento').val(),
            dt_realizado: $('#FCEntrada #e-dt_realizado').val(),
            nu_valor: $('#FCEntrada #nu_valor').val(),
            nu_valor_pago: $('#FCEntrada #nu_valor_pago').val(),
            co_conta_bancaria: $('#FCEntrada #co_conta_bancaria').val(),
            co_representacao: $('#FCEntrada #co_representacao').val(),
            co_centro_custo: $('#FCEntrada #co_centro_custo').val(),
            ds_descricao: $('#FCEntrada #ds_descricao').val(),
            co_fluxo_caixa: $('#FCEntrada #co_fluxo_caixa').val()
        };

        var dados = Funcoes.Ajax('Fluxocaixa/CadastroFCEntrada', data5);
        if (dados) {
            if (dados.sucesso && dados.msg === "cadastrado") {
                Funcoes.CadastradoSucesso();
            } else if (dados.sucesso && dados.msg === "atualizado") {
                Funcoes.AtualizadoSucesso();
            } else {
                Funcoes.Alerta(dados.msg)
            }
            if (dados.sucesso) {
                setTimeout(function () {
                    location.reload();
                }, 2300);
            }
        } else {
            Funcoes.Erro("Erro: " + dados.msg);
        }
        return false;
    });

    $('#FCSaida .btn-success').click(function () {

        var data5 = {
            tp_pagamento: $("#FCSaida #tp_pagamento").val(),
            co_categoria_fc: $('#FCSaida #co_categoria_fc').val(),
            dt_vencimento: $('#FCSaida #s-dt_vencimento').val(),
            dt_realizado: $('#FCSaida #s-dt_realizado').val(),
            nu_valor: $('#FCSaida #nu_valor').val(),
            nu_valor_pago: $('#FCSaida #nu_valor_pago').val(),
            co_conta_bancaria: $('#FCSaida #co_conta_bancaria').val(),
            co_representacao: $('#FCSaida #co_representacao').val(),
            co_centro_custo: $('#FCSaida #co_centro_custo').val(),
            ds_descricao: $('#FCSaida #ds_descricao').val(),
            co_fluxo_caixa: $('#FCSaida #co_fluxo_caixa').val()
        };

        var dados = Funcoes.Ajax('Fluxocaixa/CadastroFCSaida', data5);
        if (dados) {
            if (dados.sucesso && dados.msg === "cadastrado") {
                Funcoes.CadastradoSucesso();
            } else if (dados.sucesso && dados.msg === "atualizado") {
                Funcoes.AtualizadoSucesso();
            } else {
                Funcoes.Alerta(dados.msg)
            }
            if (dados.sucesso) {
                setTimeout(function () {
                    location.reload();
                }, 2300);
            }
        } else {
            Funcoes.Erro("Erro: " + dados.msg);
        }
        return false;
    });

    $('#CentroCustos .btn-success').click(function () {

        var data5 = {
            no_centro_custos: $("#CentroCustos #no_centro_custos").val(),
            co_centro_custo: $('#CentroCustos #co_centro_custo').val()
        };

        var dados = Funcoes.Ajax('Fluxocaixa/CadastroCentroCustos', data5);
        if (dados) {
            if (dados.sucesso && dados.msg === "cadastrado") {
                Funcoes.CadastradoSucesso();
            } else if (dados.sucesso && dados.msg === "atualizado") {
                Funcoes.AtualizadoSucesso();
            } else {
                Funcoes.Alerta(dados.msg)
            }
            if (dados.sucesso) {
                setTimeout(function () {
                    location.reload();
                }, 2300);
            }
        } else {
            Funcoes.Erro("Erro: " + dados.msg);
        }
        return false;
    });

    function carregaComboCategorias() {
        var comboCat = $('#CadastrarFluxocaixa #co_categoria_fc');

        comboCat.select2("destroy").val(null).empty();
        var newOptionCat = new Option('Selecione uma Categoria Pai.', null, !1, !1);
        comboCat.append(newOptionCat);
        var optionsCat = Funcoes.Ajax('Fluxocaixa/CategoriasFCCombo', null);
        console.log(optionsCat);
        $.each(optionsCat, function (key, value) {
            comboCat.append(new Option(value.dsTexto, value.nuCodigo, !1, !1));
        });

        comboCat.select2({allowClear: !1});
    }

    function carregaComboCategoriasEntrada() {
        var comboCat = $('#FCEntrada #co_categoria_fc');

        comboCat.select2("destroy").val(null).empty();
        var newOptionCat = new Option('Selecione uma Categoria', null, !1, !1);
        comboCat.append(newOptionCat);
        var optionsCat = Funcoes.Ajax('Fluxocaixa/CategoriasFCComboEntrada', null);
        console.log(optionsCat);
        $.each(optionsCat, function (key, value) {
            comboCat.append(new Option(value.dsTexto, value.nuCodigo, !1, !1));
        });

        comboCat.select2({allowClear: !1});
    }

    function carregaComboCategoriasSaida() {
        var comboCat = $('#FCSaida #co_categoria_fc');

        comboCat.select2("destroy").val(null).empty();
        var newOptionCat = new Option('Selecione uma Categoria', null, !1, !1);
        comboCat.append(newOptionCat);
        var optionsCat = Funcoes.Ajax('Fluxocaixa/CategoriasFCComboSaida', null);
        console.log(optionsCat);
        $.each(optionsCat, function (key, value) {
            comboCat.append(new Option(value.dsTexto, value.nuCodigo, !1, !1));
        });

        comboCat.select2({allowClear: !1});
    }

    function carregaEstruturaCategorias() {
        var dados = Funcoes.Ajax('Fluxocaixa/EstruturaCategoriasFC', null);

        $('#estCatData').empty().html(dados.html);

        $(".estCatNeta, .estCatFilha, .cancelar-cat, .save-cat, .spanDsTexto").hide();

        $(".acao").bind('click', function () {
            if ($(this).hasClass('fa-caret-right')) {
                $(this).parent('li').next('ul').slideDown();
                $(this).removeClass('fa-caret-right').addClass('fa-caret-down')
                    .attr('title', 'Recolher');
            } else {
                $(this).parent('li').next('ul').slideUp();
                $(this).removeClass('fa-caret-down').addClass('fa-caret-right')
                    .attr('title', 'Expandir');
            }
        });

        $(".edit-cat").bind('click', function () {

            $(".dsTexto, .edit-cat").show();
            $(".save-cat, .cancelar-cat, .spanDsTexto").hide();

            $(this).parent('li').children('.save-cat').show();
            $(this).parent('li').children('.cancelar-cat').show();
            var spanTexto = $(this).parent('li').children('.dsTexto');
            var idEdit = $(this).attr('data-id');//.split('-');

            spanTexto.hide();
            $(this).hide();
            $('#ds_texto_' + idEdit).show();
        });

        $(".cancelar-cat").bind('click', function () {
            $(".dsTexto, .edit-cat").show();
            $(".save-cat, .cancelar-cat, .spanDsTexto").hide();
        });

        $(".save-cat").bind('click', function () {
            var id = $(this).attr('data-id');
            var novaCat = $("#ds_texto_" + id).val();
            var sel = $(this).attr('data-id').split('-');

            var data = {
                tpCat: sel[0],
                coCat: sel[1],
                ds_texto: novaCat
            };

            var dados = Funcoes.Ajax('Fluxocaixa/AlteraCategoriaFC', data);
            if (dados) {
                if (dados.sucesso && dados.msg === "atualizado") {
                    Funcoes.AtualizadoSucesso();
                    carregaComboCategorias();
                    carregaEstruturaCategorias();
                } else {
                    Funcoes.Alerta(dados.msg)
                }
            } else {
                Funcoes.Erro("Erro: " + dados.msg)
            }
        });

        $(".exc-cat").bind('click', function () {
            var sel = $(this).attr('data-id').split('-');
            var data = {
                tpCat: sel[0],
                coCat: sel[1]
            };

            var dados = Funcoes.Ajax('Fluxocaixa/ExcluiCategoriaFC', data);
            if (dados) {
                if (dados.sucesso && dados.msg === "deletado") {
                    Funcoes.DeletadoSucesso();
                    carregaComboCategorias();
                    carregaEstruturaCategorias();
                } else {
                    Funcoes.Alerta(dados.msg)
                }
            } else {
                Funcoes.Erro("Erro: " + dados.msg)
            }
        });
    }

    $(".editCont").click(function () {
        $('#CadastrarContaBancaria #co_conta_bancaria').val($(this).attr('data-id'));
        $('#CadastrarContaBancaria #no_banco').val($(this).parents('tr').children('td:eq(0)').text());
        $('#CadastrarContaBancaria #nu_agencia').val($(this).parents('tr').children('td:eq(1)').text());
        $('#CadastrarContaBancaria #nu_conta').val($(this).parents('tr').children('td:eq(2)').text());
        $('#CadastrarContaBancaria #nu_saldo').val($(this).parents('tr').children('td:eq(3)').text())
            .attr('disabled', 'disabled');
        contaNova();
    });

    $(".editCentro").click(function () {
        $('#CentroCustos #co_centro_custo').val($(this).attr('data-id'));
        $('#CentroCustos #no_centro_custos').val($(this).parents('tr').children('td:eq(0)').text());
        centroNovo();
    });

    $(".editRep").click(function () {
        $('#Representacao #co_representacao').val($(this).attr('data-id'));
        $('#Representacao #no_representacao').val($(this).parents('tr').children('td:eq(0)').text());
        $('#Representacao #ds_email').val($(this).parents('tr').children('td:eq(1)').text());
        $('#Representacao #nu_tel1').val($(this).parents('tr').children('td:eq(2)').text());
        repNova();
    });

    $(".histCont").click(function () {
        var data = {
            co_conta_bancaria: $(this).attr('data-id')
        };
        var dados = Funcoes.Ajax('Fluxocaixa/GerarHistorico', data);
        if (dados) {
            if (dados.sucesso) {
                $("#dadosContas").hide();
                $("#histContas").show();
                $("#histContas").children("#histContasDados").empty().html(dados.html);
            } else {
                Funcoes.Alerta(dados.msg)
            }
        } else {
            Funcoes.Erro("Erro: " + dados.msg)
        }
    });

    $(".btn-nova-conta").click(function () {
        limpaDadosConta();
        contaNova();
    });

    $(".btn-novo-centro").click(function () {
        limpaDadosCentro();
        centroNovo();
    });

    $(".btn-nova-rep").click(function () {
        limpaDadosRep();
        repNova();
    });

    $(".fechaModal").click(function () {
        $(".close").click();
    });

    $(".voltarConta").click(function () {
        $("#dadosContas").show();
        $("#histContas").hide();
    });

    $("#TransfSaldo #co_conta_bancaria_destino").change(function () {
        var sel = $(this).val();

        if (sel == $("#TransfSaldo #co_conta_bancaria_origem").val()) {
            limpaTransferencia();
        } else {
            var data = {
                co_conta_bancaria: sel
            };
            var dados = Funcoes.Ajax('Fluxocaixa/getSaldoContaBancaria', data);
            if (dados) {
                if (dados.sucesso) {
                    $("#TransfSaldo #nu_saldo_destino_ant").val(dados.nu_saldo);
                } else {
                    Funcoes.Alerta(dados.msg)
                }
            } else {
                Funcoes.Erro("Erro: " + dados.msg)
            }
        }
    });

    $("#TransfSaldo #co_conta_bancaria_origem").change(function () {
        var sel = $(this).val();

        if (sel == $("#TransfSaldo #co_conta_bancaria_destino").val()) {
            limpaTransferencia();
        } else {
            var data = {
                co_conta_bancaria: sel
            };
            var dados = Funcoes.Ajax('Fluxocaixa/getSaldoContaBancaria', data);
            if (dados) {
                if (dados.sucesso) {
                    $("#TransfSaldo #nu_saldo_origem_ant").val(dados.nu_saldo);
                } else {
                    Funcoes.Alerta(dados.msg)
                }
            } else {
                Funcoes.Erro("Erro: " + dados.msg)
            }
        }
    });


    $('#TransfSaldo .btn-success').click(function () {

        var data3 = {
            co_conta_bancaria_origem: $("#TransfSaldo #co_conta_bancaria_origem").val(),
            dt_realizado: $('#TransfSaldo #t-dt_realizado').val(),
            co_conta_bancaria_destino: $('#TransfSaldo #co_conta_bancaria_destino').val(),
            nu_valor_transferido: $('#TransfSaldo #nu_valor_transferido').val(),
        };

        var dados = Funcoes.Ajax('Fluxocaixa/TransferiSaldoCB', data3);
        if (dados) {
            if (dados.sucesso && dados.msg === "cadastrado") {
                Funcoes.CadastradoSucesso();
            } else {
                Funcoes.Alerta(dados.msg)
            }
            if (dados.sucesso) {
                setTimeout(function () {
                    location.reload();
                }, 2300);
            }
        } else {
            Funcoes.Erro("Erro: " + dados.msg);
        }
        return false;
    });

    $('#DelFluxoCaixa #btn-success-DelFluxoCaixa').click(function () {

        var dados = Funcoes.Ajax('Fluxocaixa/DelFluxoCaixa', $("#desativar_codigo").val());
        if (dados) {
            if (dados.sucesso && dados.msg === "deletado") {
                Funcoes.DeletadoSucesso();
            } else {
                Funcoes.Alerta(dados.msg)
            }
            if (dados.sucesso) {
                setTimeout(function () {
                    location.reload();
                }, 2300);
            }
        } else {
            Funcoes.Erro("Erro: " + dados.msg);
        }
        return false;
    });

    $(".deleta").click(function () {
        $("#desativar_codigo").val($(this).attr('id'));
    });

    $('.editLanc').click(function () {
        var idEditLanc = $(this).attr('data-id');

        var dados = Funcoes.Ajax('Fluxocaixa/getLancamentoFC', idEditLanc);
        if (dados) {
            if (dados.sucesso) {
                if (dados.tp_fluxo == 1) {
                    var Form = 'FCEntrada';
                    var preDT = 'e';
                    $('.btn-entrada').click();
                } else if (dados.tp_fluxo == 2) {
                    var Form = 'FCSaida';
                    var preDT = 's';
                    $('.btn-saida').click();
                }
                $('#' + Form + ' #tp_pagamento').val(dados.tp_fluxo);
                $('#' + Form + ' #co_categoria_fc').val(dados.co_categoria_fc).trigger('change');
                $('#' + Form + ' #' + preDT + '-dt_vencimento').val(dados.dt_vencimento);
                $('#' + Form + ' #' + preDT + '-dt_realizado').val(dados.dt_realizado);
                $('#' + Form + ' #nu_valor').val(dados.nu_valor);
                $('#' + Form + ' #nu_valor_pago').val(dados.nu_valor_pago);
                $('#' + Form + ' #co_conta_bancaria').val(dados.co_conta_bancaria).trigger('change');
                $('#' + Form + ' #co_representacao').val(dados.co_representacao).trigger('change');
                $('#' + Form + ' #co_centro_custo').val(dados.co_centro_custo).trigger('change');
                $('#' + Form + ' #ds_descricao').val(dados.ds_descricao);
                $('#' + Form + ' #co_fluxo_caixa').val(dados.co_fluxo_caixa);

            } else {
                Funcoes.Alerta(dados.msg)
            }
        } else {
            Funcoes.Erro("Erro: " + dados.msg);
        }
        return false;
    });

    function limpaTransferencia() {
        Funcoes.Alerta('Não pode selecionar o mesmo banco de Origem e Destino');
        $("#TransfSaldo #nu_saldo_origem_ant, #TransfSaldo #nu_saldo_destino_ant, #TransfSaldo #t-dt_realizado, #TransfSaldo #nu_valor_transferido").val('');
        Funcoes.TiraValidacao('t-dt_realizado');
        Funcoes.TiraValidacao('nu_valor_transferido');
        $("#TransfSaldo #co_conta_bancaria_destino")
            .val(null).trigger('change').select2({allowClear: !1});
        $("#TransfSaldo #co_conta_bancaria_origem")
            .val(null).trigger('change').select2({allowClear: !1});

    }

    function contaNova() {
        $('.modal-scrollable').animate({
            scrollTop: $('#cadConta').offset().top
        }, 800, function () {
            $('#CadastrarContaBancaria #no_banco').focus();
        });
    }

    function repNova() {
        $('.modal-scrollable').animate({
            scrollTop: $('#cadRep').offset().top
        }, 800, function () {
            $('#Representacao #no_representacao').focus();
        });
    }

    function centroNovo() {
        $('.modal-scrollable').animate({
            scrollTop: $('#cadCentro').offset().top
        }, 800, function () {
            $('#CentroCustos #no_centro_custos').focus();
        });
    }

    function limpaDadosConta() {
        $("#CadastrarContaBancaria #st_status").prop('checked', true);
        $('#CadastrarContaBancaria #nu_agencia, #CadastrarContaBancaria #nu_conta, #CadastrarContaBancaria #nu_saldo, #CadastrarContaBancaria #no_banco, #CadastrarContaBancaria #ds_observacao, #CadastrarContaBancaria #co_conta_bancaria').val('');
    }

    function limpaDadosRep() {
        $('#Representacao #no_representacao, #Representacao #ds_email, #Representacao #nu_tel1, #Representacao #co_representacao').val('');
    }

    function limpaDadosCentro() {
        $('#CentroCustos #no_centro_custos, #CentroCustos #co_centro_custo').val('');
    }

    $(window).on("load", function () {
        $('.modal .img-load').hide();
    });


});