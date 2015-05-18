<?php

class PagamentoModel{
      
    const tabela = "tb_pagamento";
    const campos = "id_negociacao,valor_pago,tipo_pagamento,valor_total,observacao,situacao,numero_parcelas";
    const chave_primaria = "id_pagamento";
    
    public static function cadastraPagamento(array $dados){
        $cadastro = new Cadastra();
        $cadastro->Cadastrar(self::tabela, $dados);
        return $cadastro->getUltimoIdInserido();
    }
    
    public static function atualizaPagamento(array $dados,$id){
        $atualiza = new Atualiza();
        $atualiza->Atualizar(self::tabela, $dados, "where ".self::chave_primaria." = :id", "id={$id}");
        return $atualiza->getResult();
    }    
    
    
    public static function pesquisaPagamentoAtivo($id){
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar(self::tabela,"where id_negociacao = :id", "id={$id}");
        $result   = $pesquisa->getResult();
        if($result):
            return $result[0];
        esle:
            return $result;
        endif;
        
    }
    
    public static function pesquisaPagamentosEmAberto(){
       $tabela =   "tb_negociacao neg".
                   " inner join tb_pessoa pes".
                   " on neg.id_entidade = pes.id_entidade".
                   " inner join tb_pagamento pag".
                   " on neg.id_negociacao = pag.id_negociacao".
                   " inner join tb_parcelamento parc".
                   " on parc.id_pagamento = pag.id_pagamento";
        
        $campos = "neg.tipo_negociacao, pag.tipo_pagamento, parc.valor_parcela, parc.vencimento, pes.nome_fantasia, pes.nome_razao";
        
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar($tabela,"where neg.situacao = 'F' AND parc.vencimento <= '".Valida::DataAtual("Y/m/d")."' AND parc.vencimento_pago is NULL AND neg.tipo_negociacao IN ('CP', 'VD') order by parc.vencimento ASC",null,$campos);
        return $pesquisa->getResult();
        
    }
    
    public static function pesquisaPagamentosProximos(){
       $tabela =   "tb_negociacao neg".
                   " inner join tb_pessoa pes".
                   " on neg.id_entidade = pes.id_entidade".
                   " inner join tb_pagamento pag".
                   " on neg.id_negociacao = pag.id_negociacao".
                   " inner join tb_parcelamento parc".
                   " on parc.id_pagamento = pag.id_pagamento";
        
        $campos = "neg.tipo_negociacao, pag.tipo_pagamento, parc.valor_parcela, parc.vencimento, pes.nome_fantasia, pes.nome_razao";
        
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar($tabela,"where neg.situacao = 'F' AND parc.vencimento BETWEEN '".Valida::DataShow(Valida::DataDB(Valida::CalculaData(Valida::DataAtual("d/m/Y"), 1, "+"),"Y/m/d"),"Y/m/d")."' AND '".Valida::DataShow(Valida::DataDB(Valida::CalculaData(Valida::DataAtual("d/m/Y"), 6, "+"),"Y/m/d"),"Y/m/d")."' AND parc.vencimento_pago is NULL AND neg.tipo_negociacao IN ('CP', 'VD') order by parc.vencimento ASC",null,$campos);
        return $pesquisa->getResult();
        
    }
    
}