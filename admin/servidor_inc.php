<?php

function servidor_inicial(){
//URL base do projeto
//define('HOME', 'http://192.168.25.27/atacadaobessa/');
define('HOME', 'http://localhost/BR_Financas/');

// CONFIGRAÇÕES DO BANCO DE DADOS ####################
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBSA', 'br_financas');


//////////////////////////////////////////////
// ******* CONFIGURAÇÕES DO SITE ********** //
//////////////////////////////////////////////

// Título do Site
define('DESC', 'BR Finan&ccedil;as');
// Tabela de pesquisa de usuário para validação
define('TABLE_USER', 'tb_user');
// Campo de login na Tabela de pesquisa de usuário para validação
define('CAMPO_USER', 'login');
// Campo da senha na Tabela de pesquisa de usuário para validação
define('CAMPO_PASS', 'senha');
// Campo do Perfil na Tabela de pesquisa de usuário para validação dos perfis 
// (Ex.: cadastrante, administrador, pesquisador) Sepmre separados por (, )
define('CAMPO_PERFIL', 'perfil');
// Atribui o nome da Sessão do usuario Logado no sitema
define('SESSION_USER', 'user_br_financas');

}
