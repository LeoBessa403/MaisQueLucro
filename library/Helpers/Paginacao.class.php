<?php

/**
 * Paginação.class [ HELPER ]
 * Realização a gestão e a paginação de resultados do sistema!
 * 
 * @copyright (c) 2014, Leo Bessa
 */
class Paginacao {
    
            private static $total;
            private static $maximo;
            private static $page;
            private static $link;           
            private static $inicio;
            private static $fim;
            private static $paginas;
            private static $qt_links;
            private static $pesquisa;
            
            /**
            * <b>Construtor da classe</b> Inicia a configuração para paginação.             
            * @param STRING $total = Total de registros encontrados sem limit e offset, 
            * @param STRING $maximo = Máximo de resgistro apresentados por página
            */
             function __construct($total,$maximo,$pesquisa) {
                 self::$total = $total;
                 self::$maximo = $maximo;
                 self::$link = HOME.UrlAmigavel::$modulo."/".UrlAmigavel::$controller."/".UrlAmigavel::$action;
                 self::$qt_links = 3;
                 self::$pesquisa = $pesquisa;
                 if (self::$pesquisa != ""):
                     self::$pesquisa = "/grid_pesquisa/".self::$pesquisa;
                 endif;                 
             }
             
           /**
            * <b>setQtLinks</b> Seta quantidades de links antes e apos a página atual.             
            * @param INT $qt_links = Númerico de links.           
            */
             public static function setQtLinks($qt_links){
                 self::$qt_links = $qt_links;
             }
             
             /**
            * <b>setMaximo</b> Seta quantidades Máxima de registros por Páginas.             
            * @param INT $maximo = Númerico de registros por Páginas.           
            */
             public static function setMaximo($maximo) {
                 self::$maximo = $maximo;
             }

                          
           /**
            * <b>Paginação</b> Gera a paginação.             
            * @param STRING $page = Página atual do parametro (page) da url.           
            */
             public function paginacao($page) {
            
                self::$page = $page;               
		self::$inicio = ((self::$page * self::$maximo) - self::$maximo) +1;
		self::$fim    = self::$page * self::$maximo;
                $linkMaximo = "/maximo/".self::$maximo;
                
		if (self::$fim > self::$total){
			self::$fim = self::$total;
		}
		self::$paginas = ceil(self::$total / self::$maximo);
                
                /**** CASO A PÁGINA ATUAL NÃO TENHA RESULTADO, ASSUME O VALOR DA ÚLTIMA PÁGINA E REDIRECIONA PARA ELA ****/
                if(self::$page > self::$paginas):
                    self::$page = self::$paginas;
                    //Valida::Redireciona(UrlAmigavel::$modulo."/".UrlAmigavel::$controller."/".UrlAmigavel::$action."/page/".self::$page.self::$pesquisa.$linkMaximo);
                endif;
                
		if (self::$total == 0){
			echo "<div id=\"registros\">Nenhum Registro Encontrado!</div>";
		}elseif ((self::$total > 0)&&(self::$total < 10)){
			echo "<div id=\"registros\">Registros do ".self::$inicio." ao ".self::$fim.". Total: <strong>0".self::$total." </strong></div>";
		}else {
			echo "<div id=\"registros\">Registros do ".self::$inicio." ao ".self::$fim.". Total: <strong>".self::$total." </strong></div>";
		}
		
		if (self::$paginas > 1){
			echo '<div id="paginacao">';
			if (self::$page == 1){
				echo "<span class=\"ativo\"><img src='".PASTAIMG."primeiro.png' width='14' height='14' /></span>";
			}else{
				echo "<a href=\"".self::$link."/page/1".self::$pesquisa.$linkMaximo."\"><img src='".PASTAIMG."primeiro2.png' width='14' height='14' /></a>";
			}
			
			for ($i = self::$page - self::$qt_links; $i <= self::$page-1; $i++){
			if ($i <= 0){
				}else{
					echo"<a href=\"".self::$link."/page/".$i.self::$pesquisa.$linkMaximo."\">$i</a>";
				}
			}echo "<span class=\"ativo\">".self::$page."</span>";
			
			for($i = self::$page + 1; $i <= self::$page + self::$qt_links; $i++){
			if($i > self::$paginas){
				}else{
					echo "<a href=\"".self::$link."/page/".$i.self::$pesquisa.$linkMaximo."\">$i</a>";
				}
			}
			if (self::$page == self::$paginas){
				echo "<span class=\"ativo\"><img src='".PASTAIMG."ultimo.png' width='14' height='14' /></span>";
			}else{
				echo "<a href=\"".self::$link."/page/".self::$paginas.self::$pesquisa.$linkMaximo."\"><img src='".PASTAIMG."ultimo2.png' width='14' height='14' /></a>";
			}
			echo '</div><div class="clear"></div>'; 
	 	}   
            }

}