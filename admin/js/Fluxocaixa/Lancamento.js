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
        desabilitaCat('CadastrarFluxocaixa');
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

    $('#e-tp_lanc').change(function () {
        var tp_lanc = $(this).val();
        if (tp_lanc > 1) {
            $('#e-nu_repetidos, #e-intervalo').parent(".form-group").show();
        } else {
            limpaCamposTpLanc('e');
        }
    });

    $('#s-tp_lanc').change(function () {
        var tp_lanc = $(this).val();
        if (tp_lanc > 1) {
            $('#s-nu_repetidos, #s-intervalo').parent(".form-group").show();
        } else {
            limpaCamposTpLanc('s');
        }
    });

    function limpaCamposTpLanc(TpLanc) {
        $('#' + TpLanc + '-nu_repetidos, #' + TpLanc + '-intervalo').parent(".form-group").hide();
        $('#' + TpLanc + '-nu_repetidos').val(1).trigger('change');
        $('#' + TpLanc + '-intervalo').val(30).trigger('change');
        Funcoes.TiraValidacao(TpLanc + '-nu_repetidos');
    }

    $('.btn-baixa').click(function () {
        var fcs = '';
        var selecionado = false;
        $('.bx-lanc').each(function () {
            if ($(this).prop('checked')) {
                selecionado = true;
                fcs = fcs + ',' + $(this).val();
            }
        });

        if (selecionado) {
            $("#valorDarBaixa").val(fcs);
            $("#j_Baixa").click();
        } else {
            Funcoes.Alerta('Selecione pelo menos um Lançamento para Dar Baixar no Pagamento.');
        }
        return false;
    });

    $('.btn-entrada').click(function () {
        if (carregaComboCatEnt) {
            carregaComboCategoriasEntrada();
            carregaComboCatEnt = false;
        }
        $('#FCEntrada #e-tp_lanc').val(1).prop("disabled", false).select2({allowClear: !1});
        limpaCamposTpLanc('e');
        $("#j_entrada").click();
        desabilitaCat('FCEntrada', true);
        return false;
    });

    $('.btn-saida').click(function () {
        if (carregaComboCatSaida) {
            carregaComboCategoriasSaida();
            carregaComboCatSaida = false;
        }
        $('#FCSaida #s-tp_lanc').val(1).prop("disabled", false).select2({allowClear: !1});
        limpaCamposTpLanc('s');
        $("#j_saida").click();
        desabilitaCat('FCSaida', true);
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
                atualizaPagina();
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
                if (dados.sucesso) {
                    atualizaPagina();
                }
            } else {
                Funcoes.Alerta(dados.msg);
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
                atualizaPagina();
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
                atualizaPagina();
            }
        } else {
            Funcoes.Erro("Erro: " + dados.msg);
        }
        return false;
    });

    $('#FCEntrada .btn-success').click(function () {
        var nuValor = $('#FCEntrada #nu_valor').val();
        var nuValorPago = $('#FCEntrada #nu_valor_pago').val();
        var coContaBancaria = $('#FCEntrada #co_conta_bancaria').val();
        var coCategoriaFc = $('#FCEntrada #co_categoria_fc').val();
        var dtRealizado = $('#FCEntrada #e-dt_realizado').val();
        var dtvencimento = $('#FCEntrada #e-dt_vencimento').val();

        if (coCategoriaFc == 'null') {
            Funcoes.Alerta('O Campo Categoria é Obrigatório.');
            return false;
        }
        if (!coContaBancaria) {
            Funcoes.Alerta('O Campo Conta Bancária é Obrigatório.');
            return false;
        }
        if ((!dtRealizado) && (!dtvencimento)) {
            Funcoes.Alerta('O Campo Data A Receber ou Data Paga é Obrigatório.');
            return false;
        }
        if ((!nuValor) && (!nuValorPago)) {
            Funcoes.Alerta('O Campo Valor a Receber ou Valor Pago é Obrigatório.');
            return false;
        }
        var data5 = {
            tp_pagamento: $("#FCEntrada #tp_pagamento").val(),
            co_categoria_fc: coCategoriaFc,
            dt_vencimento: dtvencimento,
            dt_realizado: dtRealizado,
            nu_valor: nuValor,
            nu_valor_pago: nuValorPago,
            co_conta_bancaria: coContaBancaria,
            co_representacao: $('#FCEntrada #co_representacao').val(),
            co_centro_custo: $('#FCEntrada #co_centro_custo').val(),
            ds_descricao: $('#FCEntrada #ds_descricao').val(),
            co_Fluxocaixa: $('#FCEntrada #co_Fluxocaixa').val(),
            nu_repetidos: $('#FCEntrada #e-nu_repetidos').val(),
            tp_lanc: $('#FCEntrada #e-tp_lanc').val(),
            intervalo: $('#FCEntrada #e-intervalo').val()
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
                atualizaPagina();
            }
        } else {
            Funcoes.Erro("Erro: " + dados.msg);
        }
        return false;
    });

    $('#FCSaida .btn-success').click(function () {
        var nuValor = $('#FCSaida #nu_valor').val();
        var nuValorPago = $('#FCSaida #nu_valor_pago').val();
        var coContaBancaria = $('#FCSaida #co_conta_bancaria').val();
        var coCategoriaFc = $('#FCSaida #co_categoria_fc').val();
        var dtRealizado = $('#FCSaida #s-dt_realizado').val();
        var dtvencimento = $('#FCSaida #s-dt_vencimento').val();

        if (coCategoriaFc == 'null') {
            Funcoes.Alerta('O Campo Categoria é Obrigatório.');
            return false;
        }
        if (!coContaBancaria) {
            Funcoes.Alerta('O Campo Conta Bancária é Obrigatório.');
            return false;
        }
        if ((!dtRealizado) && (!dtvencimento)) {
            Funcoes.Alerta('O Campo Data A Pagar ou Data Paga é Obrigatório.');
            return false;
        }
        if ((!nuValor) && (!nuValorPago)) {
            Funcoes.Alerta('O Campo Valor a Pagar ou Valor Pago é Obrigatório.');
            return false;
        }

        var data5 = {
            tp_pagamento: $("#FCSaida #tp_pagamento").val(),
            co_categoria_fc: coCategoriaFc,
            dt_vencimento: dtvencimento,
            dt_realizado: dtRealizado,
            nu_valor: nuValor,
            nu_valor_pago: nuValorPago,
            co_conta_bancaria: coContaBancaria,
            co_representacao: $('#FCSaida #co_representacao').val(),
            co_centro_custo: $('#FCSaida #co_centro_custo').val(),
            ds_descricao: $('#FCSaida #ds_descricao').val(),
            co_Fluxocaixa: $('#FCSaida #co_Fluxocaixa').val(),
            nu_repetidos: $('#FCSaida #s-nu_repetidos').val(),
            tp_lanc: $('#FCSaida #s-tp_lanc').val(),
            intervalo: $('#FCSaida #s-intervalo').val()
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
                atualizaPagina();
            }
        } else {
            Funcoes.Erro("Erro: " + dados.msg);
        }
        return false;
    });

    $('#Centro_custo .btn-success').click(function () {

        var data5 = {
            no_centro_custo: $("#Centro_custo #no_centro_custo").val(),
            co_centro_custo: $('#Centro_custo #co_centro_custo').val()
        };

        var dados = Funcoes.Ajax('Fluxocaixa/CadastroCentro_custo', data5);
        if (dados) {
            if (dados.sucesso && dados.msg === "cadastrado") {
                Funcoes.CadastradoSucesso();
            } else if (dados.sucesso && dados.msg === "atualizado") {
                Funcoes.AtualizadoSucesso();
            } else {
                Funcoes.Alerta(dados.msg)
            }
            if (dados.sucesso) {
                atualizaPagina();
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
        // console.log(optionsCat);
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
        // console.log(optionsCat);
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
        // console.log(optionsCat);
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
                    desabilitaCat('CadastrarFluxocaixa');
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
                    desabilitaCat('CadastrarFluxocaixa');
                } else {
                    Funcoes.Alerta(dados.msg)
                }
            } else {
                Funcoes.Erro("Erro: " + dados.msg)
            }
        });
    }

    $('.table').on('click', '.editCont', function () {
        $('#CadastrarContaBancaria #co_conta_bancaria').val($(this).attr('data-id'));
        $('#CadastrarContaBancaria #no_banco').val($(this).parents('tr').children('td:eq(0)').text());
        $('#CadastrarContaBancaria #nu_agencia').val($(this).parents('tr').children('td:eq(1)').text());
        $('#CadastrarContaBancaria #nu_conta').val($(this).parents('tr').children('td:eq(2)').text());
        $('#CadastrarContaBancaria #nu_saldo').val($(this).parents('tr').children('td:eq(3)').text())
            .attr('disabled', 'disabled');
        contaNova();
    });

    $('.table').on('click', '.editCentro_custo', function () {
        $('#Centro_custo #co_centro_custo').val($(this).attr('data-id'));
        $('#Centro_custo #no_centro_custo').val($(this).parents('tr').children('td:eq(0)').text());
        centro_custoNovo();
    });

    $('.table').on('click', '.editRep', function () {
        $('#Representacao #co_representacao').val($(this).attr('data-id'));
        $('#Representacao #no_representacao').val($(this).parents('tr').children('td:eq(0)').text());
        $('#Representacao #ds_email').val($(this).parents('tr').children('td:eq(1)').text());
        $('#Representacao #nu_tel1').val($(this).parents('tr').children('td:eq(2)').text());
        repNova();
    });

    $('.table').on('click', '.histCont', function () {
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

    $(".btn-novo-centro_custo").click(function () {
        limpaDadosCentro_custo();
        centro_custoNovo();
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
                atualizaPagina();
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
                atualizaPagina();
            }
        } else {
            Funcoes.Erro("Erro: " + dados.msg);
        }
        return false;
    });

    $('.table').on('click', '.deleta', function () {
        $("#desativar_codigo").val($(this).attr('id'));
    });

    $('.table').on('click', '.editLanc', function () {
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
                $('#' + Form + ' #tp_pagamento').val(dados.tp_pagamento).trigger('change');
                $('#' + Form + ' #' + preDT + '-tp_lanc').select2("destroy").val(1).prop("disabled", true);
                $('#' + Form + ' #co_categoria_fc').val(dados.co_categoria_fc).trigger('change');
                $('#' + Form + ' #' + preDT + '-dt_vencimento').val(dados.dt_vencimento);
                $('#' + Form + ' #' + preDT + '-dt_realizado').val(dados.dt_realizado);
                $('#' + Form + ' #nu_valor').val(dados.nu_valor);
                $('#' + Form + ' #nu_valor_pago').val(dados.nu_valor_pago);
                $('#' + Form + ' #co_conta_bancaria').val(dados.co_conta_bancaria).trigger('change');
                $('#' + Form + ' #co_representacao').val(dados.co_representacao).trigger('change');
                $('#' + Form + ' #co_centro_custo').val(dados.co_centro_custo).trigger('change');
                $('#' + Form + ' #ds_descricao').val(dados.ds_descricao);
                $('#' + Form + ' #co_Fluxocaixa').val(dados.co_Fluxocaixa);

            } else {
                Funcoes.Alerta(dados.msg)
            }
        } else {
            Funcoes.Erro("Erro: " + dados.msg);
        }
        return false;
    });

    function limpaTransferencia() {
        Funcoes.Alerta('Não pode selecionar o mesmo banco para Origem e Destino');
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

    function centro_custoNovo() {
        $('.modal-scrollable').animate({
            scrollTop: $('#cadCentro_custo').offset().top
        }, 800, function () {
            $('#Centro_custo #no_centro_custo').focus();
        });
    }

    function limpaDadosConta() {
        $("#CadastrarContaBancaria #st_status").prop('checked', true);
        $('#CadastrarContaBancaria #nu_agencia, #CadastrarContaBancaria #nu_conta, #CadastrarContaBancaria #nu_saldo, #CadastrarContaBancaria #no_banco, #CadastrarContaBancaria #ds_observacao, #CadastrarContaBancaria #co_conta_bancaria').val('');
    }

    function limpaDadosRep() {
        $('#Representacao #no_representacao, #Representacao #ds_email, #Representacao #nu_tel1, #Representacao #co_representacao').val('');
    }

    function limpaDadosCentro_custo() {
        $('#Centro_custo #no_centro_custo, #Centro_custo #co_centro_custo').val('');
    }

    function desabilitaCat(id, filha = false) {
        $('#' + id + ' #co_categoria_fc option').each(function () {
            var nuCat = $(this).val().split('-');
            if (nuCat[0] == "p") {
                $(this).prop("selected", false);
                $(this).prop("disabled", true);
            }
            if (nuCat[0] == "f" && filha) {
                $(this).prop("selected", false);
                $(this).prop("disabled", true);
            }
        });
    }

    function atualizaPagina() {
        setTimeout(function () {
            location.reload();
        }, 2300);
    }

    $(window).on("load", function () {
        $('.modal .img-load').hide();
        $('.help-block').hide();
        $('#e-nu_repetidos, #e-intervalo').parent(".form-group").hide();
        $('#s-nu_repetidos, #s-intervalo').parent(".form-group").hide();
        $('#e-nu_repetidos,#s-nu_repetidos').attr('maxlength', 2);
    });


});