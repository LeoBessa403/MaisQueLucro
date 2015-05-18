<?php
/**
 * Grid.class [ HELPER ]
 * Classe responável por gerar as Grids do Sistema!
 * 
 * @copyright (c) 2014, Leo Bessa
 */
class Grid {

    private static $dados;
    private static $maximoRegistro;
    private static $colunas;
    private static $titulo;
    private static $tabela;
    private static $where;
    private static $valores;
    private static $campos;
    private static $camposPesquisa;
    private static $pesquisa;
    
    
    function __construct($tabela, $where = null, $valores = null, $campos = null, $titulo, array $colunas, $maximoRegistros,$camposPesquisa, $pesquisa) {
        self::$titulo         = $titulo;
        self::$colunas        = $colunas;
        self::$maximoRegistro = (int) $maximoRegistros;
        self::$tabela         = $tabela;
        self::$where          = $where;
        self::$valores        = $valores;
        self::$campos         = $campos;
        self::$camposPesquisa = $camposPesquisa;
        self::$pesquisa       = Valida::LimpaVariavel($pesquisa);
        if(self::$pesquisa != null):
            $this->preparaPesquisa();
        endif;        
    }
    
    private function preparaPesquisa(){
        $camposPesquisa = explode(",", self::$camposPesquisa);
        
        if(self::$where == null): 
             self::$where = "where 1=1"; 
        endif;
        if(self::$valores == null):
            self::$valores = "grid_tentando_arrumar_o_valor=grid_tentando_arrumar_o_valor";
        endif;
        $i = 0;
        $totalDados = count($camposPesquisa);
        self::$where .= " and (";
        foreach ($camposPesquisa as $valor):
            self::$where .= $valor." like '%".self::$pesquisa."%'";
            if (($totalDados-1) > $i):
                 self::$where .= " or ";               
            endif;
            self::$valores .= "&pesquisa".$i."=".self::$pesquisa;
            $i++;
        endforeach;
        self::$where .= ") "; 
    }
    public static function geraGrid(){
        ?>
            <div class="loadgif">
                <div class="loadgif2">
                 <p>Carregando Dados... Aguarde...</p>
                         <img src="<?php echo PASTAIMG;?>ajax-loader.gif" alt="gif" title="gif"/>
                 </div>
            </div>
            <table class="grid">
                <tr class="tituloGrid">
                    <td colspan="<?php echo count(self::$colunas)+2; ?>">
                        <span class="titulo">
                            <?php echo self::$titulo; ?>
                        </span>
                        <div class="configuracao">                            
                            <form action="<?php echo HOME.UrlAmigavel::$modulo."/".UrlAmigavel::$controller."/".UrlAmigavel::$action; ?>" method="post">                                
                                <label for="pesquisa">Pesquisar</label>
                                <input type="text" id="grid_pesquisa" name="grid_pesquisa" value="<?php echo self::$pesquisa; ?>"/>                              
                                <label for="maximo">Registros</label>
                                <select id="maximo" name="maximo">
                                    <option value="10"<?php if(self::$maximoRegistro == 10):echo " selected";endif; ?>>10</option>
                                    <option value="20"<?php if(self::$maximoRegistro == 20):echo " selected";endif; ?>>20</option>
                                    <option value="30"<?php if(self::$maximoRegistro == 30):echo " selected";endif; ?>>30</option>
                                    <option value="50"<?php if(self::$maximoRegistro == 50):echo " selected";endif; ?>>50</option>
                                    <option value="100"<?php if(self::$maximoRegistro == 100):echo " selected";endif; ?>>100</option>
                                </select>
                                <input type="submit" id="pesquisar" name="pesquisar" value="Pesquisar"/> 
                                <div id="pdf" class="pdf"></div>
                            </form>  
                         </div>                        
                    </td>
                </tr>

                <tr class="tituloColunas">
                    <?php 
                       $i = 0;
                     foreach (self::$colunas as $resCol): 
                        echo "<td>".self::$colunas[$i]."</td>\n\t\t\t\t\t";
                        $i++;
                     endforeach;
                     ?>
                    <td colspan="2">Ações</td>
                </tr>
             <?php 
                
                $page = (UrlAmigavel::pegaParametro("page") ? UrlAmigavel::pegaParametro("page") : 1);
                $inicio = (($page * self::$maximoRegistro) - self::$maximoRegistro);
                $pesquisa = new Pesquisa(); 
                $pesquisa->Pesquisar(self::$tabela, self::$where." LIMIT ".$inicio.", ".self::$maximoRegistro, self::$valores, "id,".self::$campos);
                self::$dados = $pesquisa->getResult();
             
                    if(!empty(self::$dados)):
                    $keys = array_keys(self::$dados[0]);
                    unset($keys[0]);
                    $cor = 0;
                        foreach (self::$dados as $res):  
                             $id = $res["id"];
                             unset($res["id"]);                             
                             $i = 0;
                        $cor++;
                             if($cor%2==0):
                                $corClass = "cor1";
                             else:
                                $corClass = "cor2";
                             endif;
                             echo "\n\t\t\t\t\t<tr class='dados ".$corClass."'>";
                             foreach ($keys as $resCol):
                                   echo "\n\t\t\t\t\t\t\t<td>".$res[$resCol]."</td>";
                                   $i++;
                            endforeach;
                                ?>                
                                <td style="width: 25px;"><img src="<?php echo PASTAIMG;?>editar.png" alt="Editar" title="Editar"  id="<?php echo $id; ?>"/></td>
                                <td style="width: 25px;"><img src="<?php echo PASTAIMG;?>fechar.png" alt="Excluir" title="Excluir" id="<?php echo $id; ?>"/></td>
                                <?php
                                 echo "\n\t\t\t\t\t</tr>";
                        endforeach;
                endif;
             ?>
                <tr>
                    <td class="montaPaginacao" colspan="<?php echo count(self::$colunas); ?>">
                    <?php
                        $pesquisa->Pesquisar(self::$tabela, self::$where , self::$valores, self::$campos);
                        $paginacao = new Paginacao($pesquisa->getRegistrosEncontrados(), self::$maximoRegistro,self::$pesquisa);
                        $paginacao->paginacao($page);
                    ?>   
                   </td>
                </tr>
            </table>
<?php
    }

}
