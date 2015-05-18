$(function() { 
    //VARIÁVEIS GLOBAIS
    var home = servidor_inicial();

    var urlValida = home + 'library/Helpers/Valida.Controller.php';
   

        //function to initiate Select2        
       $(".search-select").select2({          
           allowClear: false
       });

        function validaData(data, id) {
           if (data != "") {
               var erro = "";
               var bissexto = 0;
               var tam = data.length;
               if (tam == 10) {
                   var dia = data.substr(0, 2);
                   var mes = data.substr(3, 2);
                   var ano = data.substr(6, 4);
                   if ((ano > 1900) || (ano < 2100)) {
                       switch (mes) {
                           case '01':
                           case '03':
                           case '05':
                           case '07':
                           case '08':
                           case '10':
                           case '12':
                               if (dia <= 31) {
                                   erro = true;
                               }
                               break
                           case '04':
                           case '06':
                           case '09':
                           case '11':
                               if (dia <= 30) {
                                   erro = true;
                               }
                               break
                           case '02':
                               if ((ano % 4 == 0) || (ano % 100 == 0) || (ano % 400 == 0)) {
                                   bissexto = 1;
                               }
                               if ((bissexto == 1) && (dia <= 29)) {
                                   erro = true;
                               }
                               if ((bissexto != 1) && (dia <= 28)) {
                                   erro = true;
                               }
                               break
                           }
                   }
               }
               if (erro != true) {
                   validaErro(id,"DATA Informada Inválida!");                     
               } else {
                   validaOK(id,"Data válida!");                    
               }
           }
        }
        function validaCPF(cpf, id) {
            if (cpf != "") {
                $.get(urlValida, {valida: 'valcpf', cpf: cpf}, function(retorno) {
                    if (retorno == 2) { 
                        validaErro(id,"CPF inválido! favor verificar.");                        
                    } else {
                        validaOK(id,"CPF válido!");
                    }
                });
            }
        }
        function validaEmail(email, id) { 
            if (email != "") {
                $.get(urlValida, {valida: 'valemail', email: email}, function(retorno) { 
                    if (retorno == 2) {
                        validaErro(id,"E-mail incorreto! favor verificar.");
                    } else {
                        validaOK(id,"E-mail válido!");
                    }
                });
            }
        }
        function validaCNPJ(cnpj, id) {
            if (cnpj != "") {
                $.get(urlValida, {valida: 'valcnpj', cnpj: cnpj}, function(retorno) {
                    if (retorno == 2) {
                        validaErro(id,"CNPJ inválido! favor verificar.");
                    } else {
                        validaOK(id,"CNPJ válido!");
                    }
                });
            }
        }
        $(".formulario .ob").change(function(){
            var ob = $(this).val();
            var id = $(this).attr("id");
            
            if(ob != ""){
                validaOK(id,"Campo Obrigatório OK!");
            }else{
                validaErro(id,"Campo Obrigatório");
            }
        });
        
        function validaErro(id, msg){
            $('#' + id).parent(".form-group").addClass('has-error').removeClass('has-success');
            $('.' + id).parent(".form-group").addClass('has-error').removeClass('has-success');
            $('span#' + id + '-info').text(msg).prepend('<i class="fa clip-cancel-circle-2"></i> ');
            return false;
        }
        
        function validaOK(id, msg){
           $('#' + id).parent(".form-group").addClass('has-success').removeClass('has-error');
           $('.' + id).parent(".form-group").addClass('has-success').removeClass('has-error');
           $('span#' + id + '-info').text(msg).prepend('<i class="fa clip-checkmark-circle-2"></i> ');
           return true;
        }
        
        // MASCARAS         
        $.mask.definitions['h'] = "[0-2]";
        $.mask.definitions['g'] = "[0-9]";
        $.mask.definitions['m'] = "[0-6]";
        $.mask.definitions['s'] = "[0-9]";
        $(".horas").mask("hg:ms").change(function(){
            var horas   = $(this).val().substring(0,2);
            var minutos = $(this).val().substring(3,5);
            if((horas > 23) || (minutos > 59)){
                alert("Horário Inválido!");
                $(this).val("");
            }
        });   
        $(".cep").mask("99.999-999");
        $(".tel").mask("(99) 9999-9999");
        $(".tel0800").mask("0800-999-9999");
        $(".data").mask("99/99/9999").change(function() {
            var data = $(this).val();
            var id = $(this).attr("id");
            validaData(data, id);
        }).datepicker({changeMonth: true, changeYear: true, yearRange: "c-80:c+15", currentText: "Hoje", monthNamesShort: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"], dayNamesMin: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab"], dateFormat: "dd/mm/yy", showMonthAfterYear: true, showAnim: "clip" });
        $(".cpf").mask("999.999.999-99").change(function() {
            var cpf = $(this).val();
            var id = $(this).attr("id");
            validaCPF(cpf, id);
        });
        $(".cnpj").mask("99.999.999/9999-99").change(function() {
            var cnpj = $(this).val();
            var id = $(this).attr("id");
            validaCNPJ(cnpj, id);
        });
        $(".email").change(function() { 
            var email = $(this).val();
            var id = $(this).attr("id");
            validaEmail(email, id)
        });
        $(".numero").keypress(function(e) {
            var tecla = (window.event) ? event.keyCode : e.which;
            if ((tecla > 47 && tecla < 58))
                return true;
            else {
                if (tecla == 8 || tecla == 0)
                    return true;
                else
                    return false;
            }
        });
        $(".moeda").maskMoney({
            symbol: 'R$ ',
            showSymbol: true,
            thousands: '.',
            decimal: ',',
            symbolStay: true
        }).focusout(function(){
            var valor = $(this).val();
            if(valor == "" || valor == "R$ 0,00"){
                $(this).val("0,00");
            }
        });

        $(".formulario").submit(function() {
            var obrigatorios = campoObrigatorio();
            var validacao = "";
            $(".go-top,.alert .close").click();
            $(".formulario .has-error").each(function() {
                validacao = "error";
            });
           
            if (obrigatorios == true) {
                if (validacao == "error") {                   
                    $(".row:last").before('<div class="alert alert-danger"><button data-dismiss="alert" class="close">&times;</button><i class="fa fa-exclamation-triangle"></i> <b> ALERTA: </b>Existe(em) campo(s) com erro, favor verificar!</div>');
                     return false;
                } 
            } else {
                $(".row:last").before('<div class="alert alert-info"><button data-dismiss="alert" class="close">&times;</button><i class="fa fa-info-circle"></i> <b> INFORMATIVO: </b>Existe(em) campo(s) obrigatório(s) em branco, favor verificar!</div>');
                return false;
            }
        });
        
         //CAMPO OBRIGATÓRIO 
        function campoObrigatorio() {
            var campos = "";
            $(".formulario .ob").each(function() {
                var valor = $(this).val();
                var id = $(this).attr("id");
                var tem = id.search("s2id_");                
                
                if(tem != 0){
                    if (valor == "") {
                        campos = "teste";
                        validaErro(id,"Campo Obrigatório");  
                        $(".ob:first").focus();
                    }
                }
              
            });
            if (campos != "") {
                return false;
            } else {
                return true;
            }
        }
        
        $(".deleta_registro .btn-success").click(function(){
            var id = $(this).attr("id");
            var registro = $(".deleta_registro").attr("id");
            $("#load").click();  
            
            $.get(urlValida, {valida: 'deleta_registro', registro: registro, id: id}, function(retorno) {
                    $("#carregando .cancelar").click(); 
                     
                    if(retorno == true){
                        $("#registro-"+id).fadeOut("fast");
                        $(".confirmacao .modal-header").removeClass("btn-bricky").addClass("btn-success");
                        $(".confirmacao .modal-header .modal-title").text("CONFIRMAÇÃO");
                        $(".confirmacao #confirmacao_msg b").html("A exclusão do registro Foi realizada com Sucesso!");
                        $("#confirmacao").click();
                    }else if(retorno != ""){
                         $(".deletando").css("background","#fdfdfd").removeClass("deletando");
                         $(".confirmacao .modal-header").removeClass("btn-success").addClass("btn-bricky");
                         $(".confirmacao .modal-header .modal-title").text("Erro ao Excluir");
                         $(".confirmacao #confirmacao_msg b").html(retorno);
                         $("#confirmacao").click();
                    }else{            
                        $(".deletando").css("background","#fdfdfd").removeClass("deletando");
                        $(".confirmacao .modal-header").removeClass("btn-success").addClass("btn-bricky");
                        $(".confirmacao .modal-header .modal-title").text("Erro ao Excluir");
                        $(".confirmacao #confirmacao_msg b").html("Foi identificado um Erro<br>Favor entrar em contato com o Administrador do Sistema<br>Informando o erro ocorrido.");
                    }
             });
        })                
        
        $(".deleta").click(function(){
            var id = $(this).attr("id");
            $(".deleta_registro .btn-success").attr('id',id);
            $("#registro-"+id).attr("style","").css("background","#ffcccc").addClass("deletando");
        })
        
        $(".cancelar").click(function(){
            $(".deletando").css("background","#fdfdfd").removeClass("deletando");
        })
        
        // FECHA MODAL DE CONFIRMAÇÃO
         $(".confirmacao .btn-success").click(function(){
             location.reload();
         })
        
        // ATIVA E DESATIVA O MENU.
        $(".main-navigation-menu li").click(function(){
            $(".main-navigation-menu").find("li").removeClass("active").removeClass("open");
            $(".main-navigation-menu li ul li").css("display","none");
            $(this).addClass("active");
            $(this).find("li").css("display","block");
        })        
});