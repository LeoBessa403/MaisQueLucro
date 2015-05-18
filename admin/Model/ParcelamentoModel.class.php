<?php

class ParcelamentoModel{
      
    const tabela = "tb_parcelamento";
    const campos = "id_pagamento,parcela,valor_parcela,valor_parcela_pago,vencimento,vencimento_pago,observacao_parcela";
    const chave_primaria = "id_parcelamento";
    
    public static function cadastraParcelamento(array $dados){
        $cadastro = new Cadastra();
        $cadastro->Cadastrar(self::tabela, $dados);
        return $cadastro->getUltimoIdInserido();
    }    
  
    public static function pesquisaInicioPagamento($id_pagamento){        
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar("tb_parcelamento parc","where parc.id_pagamento = :id_pagamento","id_pagamento={$id_pagamento}","parc.vencimento");
        return $pesquisa->getResult();        
    }
    
    public static function pesquisaUmParcelamento($id_parcelamento){  
        $tabela = self::tabela." parc".
                   " inner join tb_pagamento pag".
                   " on pag.id_pagamento = parc.id_pagamento";
        
        $campos = "pag.id_negociacao, parc.*";
        
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar($tabela,"where id_parcelamento = :id_parcelamento","id_parcelamento={$id_parcelamento}",null,$campos);
        return $pesquisa->getResult()[0];        
    }
    
    public static function pesquisaParcelamentoIdPagamento($id_pagamento){        
        $pesquisa = new Pesquisa();
        $pesquisa->Pesquisar("tb_parcelamento","where id_pagamento = :id_pagamento","id_pagamento={$id_pagamento}",null);
        return $pesquisa->getResult();        
    }
    
    public static function deletaParcelamentoIdPagamento($id_pagamento){        
        $deleta = new Deleta();
        $deleta->Deletar(self::tabela, "where id_pagamento = :id_pagamento", "id_pagamento={$id_pagamento}");
        return $deleta->getResult();        
    }
    
    public static function atualizaParcelamento(array $dados,$id){
        $atualiza = new Atualiza();
        $atualiza->Atualizar(self::tabela, $dados, "where ".self::chave_primaria." = :id", "id={$id}");
        return $atualiza->getResult();
    }
    
}