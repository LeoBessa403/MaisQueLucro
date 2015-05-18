<?php

class NegociacaoModel{
      
    const tabela = "tb_negociacao";
    const campos = "id_entidade,cadastro,tipo_negociacao";
    const chave_primaria = "id_negociacao";
    
    public static function cadastraPagamento(array $dados){
        $cadastro = new Cadastra();
        $cadastro->Cadastrar(self::tabela, $dados);
        return $cadastro->getUltimoIdInserido();
    }
    
    public static function cadastraRenda(array $dados){
        $cadastro = new Cadastra();
        $cadastro->Cadastrar(self::tabela, $dados);
        return $cadastro->getUltimoIdInserido();
    }
    
    public static function atualizaNegociacao(array $dados,$id){
        $atualiza = new Atualiza();
        $atualiza->Atualizar(self::tabela, $dados, "where ".self::chave_primaria." = :id", "id={$id}");
        return $atualiza->getResult();
    }    
    
    public static function pesquisaNegociacoes($tipo){
        
        $tabela = self::tabela." neg".
                   " inner join tb_pessoa pes".
                   " on neg.id_entidade = pes.id_entidade".
                   " inner join tb_pagamento pag".
                   " on neg.id_negociacao = pag.id_negociacao";
        
        $campos = "pag.numero_parcelas, pag.situacao, neg.id_negociacao, neg.cadastro, pag.tipo_pagamento, pag.valor_total, pes.nome_razao";
        
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar($tabela,"where neg.tipo_negociacao = '$tipo'",null,$campos);
        return $pesquisa->getResult();
        
    }
    
     public static function pesquisaParcelasListar($id_neg){
        
         $tabela = " tb_pagamento pag".                 
                   " inner join tb_parcelamento parc".
                   " on parc.id_pagamento = pag.id_pagamento";
        
        $campos = "pag.situacao, parc.vencimento, parc.vencimento_pago, parc.parcela, parc.valor_parcela_pago";
        
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar($tabela,"where pag.id_negociacao = :id_neg","id_neg={$id_neg}",$campos);
        return $pesquisa->getResult();
        
    }
    
    public static function pesquisaUmaNegociacao($id_neg,$tipo){
        
         $tabela = self::tabela." neg".
                   " inner join tb_pessoa pes".
                   " on neg.id_entidade = pes.id_entidade".
                   " inner join tb_pagamento pag".
                   " on neg.id_negociacao = pag.id_negociacao";
        
        $campos = "pag.id_pagamento, pag.numero_parcelas, pag.situacao, neg.id_negociacao, neg.cadastro, pag.tipo_pagamento, pag.valor_total, pes.nome_razao, neg.observacao, pes.id_entidade";
        
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar($tabela,"where neg.tipo_negociacao = '$tipo' and neg.id_negociacao = :id","id={$id_neg}",$campos);
        return $pesquisa->getResult()[0];
        
    }
    
}