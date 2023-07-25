$(function () {
    $('.navigation-toggler').click(function () {
        $(this).hide();
    }).click();

    $('.table').on('click', '.btn-conta', function () {
        var data = {
            co_conta_bancaria: $(this).attr('data-id')
        };
        var dados = Funcoes.Ajax('Fluxocaixa/GerarHistorico', data);
        if (dados) {
            if (dados.sucesso) {
                $("#histContas").children("#histContasDados").empty().html(dados.html);
                $("#j_saldo_conta").click();
            } else {
                Funcoes.Alerta(dados.msg)
            }
        } else {
            Funcoes.Erro("Erro: " + dados.msg)
        }
        return false;
    });

    function calcular_pontEquil() {
        var data5 = {
            ponto_equilibrio: $('#ponto_equilibrio').text(),
            perc_lucro: $('#perc_lucro').val()
        };

        var dados = Funcoes.Ajax('Fluxocaixa/CalcularPEL', data5);
        if (dados.sucesso) {
            $("#ponto_equil_luc").text(dados.sucesso);
        } else {
            Funcoes.Erro("Erro: " + dados.msg);
        }
    }

    calcular_pontEquil();

    $("#calcular_pel").click(function () {
        calcular_pontEquil();
    });
});