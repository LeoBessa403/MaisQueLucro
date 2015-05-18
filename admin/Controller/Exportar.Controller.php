<?php

class Exportar{ 
    
    public $form;
    public $result;
    public $resultAlt;
   
    function Exportar() {
        
        $formato = UrlAmigavel::PegaParametro("formato");
        $result = CredorModel::pesquisaCredor();
        $i = 0;
        foreach ($result as $value) {
            $res[$i]['nome_razao'] = $value['nome_razao'];
            $res[$i]['contato'] = $value['tel1']." / ".$value['tel2'];
            $res[$i]['site'] = $value['site'];
            $i++;
        }
        $Colunas = array("Nome / Razão Social","Contatos","Site");
        $exporta = new Exportacao($formato, "Relatório de Acesso");
       // $exporta->setPapelOrientacao("paisagem");
        $exporta->setColunas($Colunas);
        $exporta->setConteudo($res);
        $exporta->GeraArquivo();
       
    }
   

}