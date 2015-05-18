<?php
/* 
 * Controla as validações dos Formuláriso
 */
require_once '../Config.inc.php';
$valida   = new Valida();

if(isset($_GET['valida'])){    
    
	switch($_GET['valida']){
/*****************************
VALIDA O CPF
*****************************/
	case 'valcpf':
            $cpf = $_GET['cpf'];    
            echo $valida->ValCPF($cpf);            
        break;
/*****************************
VALIDA CNPJ
****************************/
        case 'valcnpj':   
            $cnpj = $_GET['cnpj'];    
            echo $valida->ValCNPJ($cnpj);
         break;
/*****************************
VALIDA O EMAIL
*****************************/	
        case 'valemail':  
            $email = $_GET['email'];    
            echo $valida->ValEmail($email);
        break;
/*****************************
Deleta Registros do Banco da Grid
*****************************/	
        case 'deleta_registro': 
            $id     = $_GET['id'];    
            $metodo = "deleta".$_GET['registro'];
            $objeto = $_GET['registro']."Model";
            $obj    = new $objeto();
            if($_GET['registro'] == "ProdutoCompra"):
                echo $obj->$metodo($id,Session::getSession("compra","id_negociacao"));
            elseif($_GET['registro'] == "ProdutoVenda"):
                echo $obj->$metodo($id,Session::getSession("venda","id_negociacao"));
            else:
                echo $obj->$metodo($id);
            endif;
        break;
    
////////////////////////////////////////////////////////////////////////
/////////////////// PARTICULARIDADES DO SISTEMA ////////////////////////
//////////////////////////////////////////////////////////////////////// 
    
            
}}