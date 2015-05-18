<?php

class DadosModel{
    
    const tabela = "tb_dados";
    const campos = "tel1,tel2,tel3,email,site,id_pessoa";
    const chave_primaria = "id_dados";
    
    public static function cadastraDados(array $dados){
        $cadastro = new Cadastra();
        $cadastro->Cadastrar(self::tabela, $dados);
        return $cadastro->getUltimoIdInserido();
    }
    
    public static function atualizaDados(array $dados,$id){
        $atualiza = new Atualiza();
        $atualiza->Atualizar(self::tabela, $dados, "where ".self::chave_primaria." = :id", "id={$id}");
        return $atualiza->getResult();
    }
    
    
}