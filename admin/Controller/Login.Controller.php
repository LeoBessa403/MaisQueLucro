<?php
          
class login{ 
   
    public static function deslogar(){     
//        Session::FinalizaSession(SESSION_USER);
//        header("Location: ".HOME.ADMIN.LOGIN);       
    }
    
    public static function logar(){     
 // CLASSE DE LOGAR
        $login = Valida::LimpaVariavel($_POST['user']);
        $senha = Valida::LimpaVariavel($_POST['senha']);
        
         if(($login != "") && ($senha != "")):
            $acesso = new Pesquisa();

            $acesso->Pesquisar(TABLE_USER);
            $user = "";
            foreach ($acesso->getResult() as $result):
                if (($result[CAMPO_USER] == $login) && ($result[CAMPO_PASS] == $senha)):
                    $user = $result; 
                    break;
                endif;
            endforeach;

            if($user != ""):          
                $user["session_id"] = session_id();               
                $user["ultimo_acesso"] = strtotime(Valida::DataDB(Valida::DataAtual()));               
                Session::setSession(SESSION_USER,$user);
                echo "<script type='text/javascript'>"
                        . "window.location.href = '".HOME."index.php?url=".ADMIN.LOGADO."';"
                     . "</script>";
                    
               // Redireciona("index.php?url=".ADMIN.LOGADO);
               // header("Location: ".HOME."index.php?url=".ADMIN.LOGADO);
            else:
                Redireciona(ADMIN.LOGIN."?o=alerta2");
            endif;
        else:
                Redireciona(ADMIN.LOGIN."?o=info2");
        endif;     
    }
}
?>
   