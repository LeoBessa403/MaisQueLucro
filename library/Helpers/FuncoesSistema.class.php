<?php

/**
 * Check.class [ HELPER ]
 * Classe responável por manipular e validade dados do sistema!
 * 
 * @copyright (c) 2014, Leo Bessa
 */
class FuncoesSistema {

    private static $Data;
    private static $Format;

    /**
     * <b>Verifica E-mail:</b> Executa validação de formato de e-mail. Se for um email válido retorna true, ou retorna false.
     * @param STRING $Email = Uma conta de e-mail
     * @return BOOL = 1 para True em um email válido, ou 2 para false
     */
    public static function CalculaValorVenda($valor,$lucro) {
        
        if($valor == null  || $valor == "0.00"):
            return Valida::formataMoeda("0.00","R$");
        else:
             return Valida::formataMoeda((( $valor * $lucro ) / 100) + $valor,"R$");
        endif;
    } 
    
    public static function tipoPagamento($tipo) {
        
        if($tipo == "CH"):
            return "Cheque";
        elseif($tipo == "DI"):
             return "Dinheiro";
        elseif($tipo == "BT"):
             return "Boleto";
        elseif($tipo == "CR"):
             return "Crédito";
        elseif($tipo == "DB"):
             return "Débito";
        endif;
    } 
        
 }
