$(function () {
    var home = $("#home").attr('data-val');
    $("#btn-success-DeletaSuporte").click(function () {

        var metodo = $(this).attr("data-url-action");
        var coSuporte = $('#DeletaSuporte #ativar_codigo').val();
        var dados = Funcoes.Ajax(metodo, coSuporte);
        if (dados) {
            if (!dados.sucesso) {
                Funcoes.Alerta(dados.msg);
            } else if (dados.sucesso) {
                window.location.href = home + "admin/Suporte/ListarSuporte"
            }
        } else {
            Funcoes.Erro("Erro: " + dados.msg);
        }
        return false;
    });

});