var Funcoes = function () {
    var inicio = function () {
                // CADASTRO DE FORNECEDOR
                function disabilitaCamposCredenciados(){
                     if($("#tipo").prop('checked')){
                         $("#cnpj").attr("disabled",true).val("");
                         $("#cpf").attr("disabled",false);
                     }else{
                         $("#cpf").attr("disabled",true).val("");
                         $("#cnpj").attr("disabled",false);
                     }
                }

                disabilitaCamposCredenciados();

                // CADASTRO DE FORNECEDOR
                $("#tipo").change(function(){
                    $('#cpf,#cnpj').parent(".form-group").removeClass('has-success has-error');
                    $('span#cpf-info').text("").append('<span class="help-block" id="cpf-info"><i class="fa fa-info-circle"></i> Caso seja Pessoa Física</span>');
                    $('span#cnpj-info').text("").append('<span class="help-block" id="cpf-info"><i class="fa fa-info-circle"></i> Caso seja Pessoa Jurídica</span>');
                    disabilitaCamposCredenciados();
                });
               
        
    };
    return {
        init: function () {
            inicio();
        }
    };
}();

