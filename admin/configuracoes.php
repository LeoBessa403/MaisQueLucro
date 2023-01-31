<?php

function servidor_inicial()
{
    if ($_SERVER['HTTP_HOST'] == 'localhost') {
        $config = array(
            'HOME' => 'http://localhost/AtacadaoBessa/',
            'HOST' => 'localhost',
            'USER' => 'root',
            'PASS' => '',
            'DBSA' => 'atacadao10',
            'SCHEMA' => 'maisquelucro10',
            'BANCO' => 1, // 1 = mysql, 2 = postgres
            'DEBUG' => true,
            'PROD' => false,
            'TOKEN_PAGSEGURO' => "5FDD35645CC1412296CE57A3542E48D0",
            'URL_PAGSEGURO' =>
                "https://ws.sandbox.pagseguro.uol.com.br/v2/",
            'JS_PAGSEGURO' =>
                "sandbox.pagseguro.js",
        );
    } else {
        $ambTeste = strstr($_SERVER['SERVER_NAME'], 'teste.atacadaobessa.com.br');
        if ($ambTeste != null) {
            $config = array(
                'HOME' => 'https://teste.maisquelucro.com.br/',
                'HOST' => 'localhost',
                'USER' => 'sistem25_mais_te',
                'PASS' => 'MV]OC@j^(O2e',
                'DBSA' => 'sistem25_mais_teste',
                'SCHEMA' => 'sistem25_mais_teste',
                'BANCO' => 1, // 1 = mysql, 2 = postgres
                'DEBUG' => false,
                'PROD' => false,
                'TOKEN_PAGSEGURO' => "5FDD35645CC1412296CE57A3542E48D0",
                'URL_PAGSEGURO' =>
                    "https://ws.sandbox.pagseguro.uol.com.br/v2/",
                'JS_PAGSEGURO' =>
                    "sandbox.pagseguro.js",
            );
        } else {
            $config = array(
                'HOME' => 'https://atacadaobessa.com.br/',
                'HOST' => 'localhost',
                'USER' => 'sistem25_dabelez',
                'PASS' => 'ahF4805qAd',
                'DBSA' => 'sistem25_dabelez',
                'SCHEMA' => 'sistem25_dabelez',
                'BANCO' => 1, // 1 = mysql, 2 = postgres
                'DEBUG' => false,
                'PROD' => true,
                'TOKEN_PAGSEGURO' => "e420df9f-b88a-4ba4-acfc-ef3dc796abd129194be145c3878bd1e90a4f65786848b0c0-51de-48b2-a242-7ae275f26890",
                'URL_PAGSEGURO' =>
                    "https://ws.pagseguro.uol.com.br/v2/",
                'JS_PAGSEGURO' =>
                    "pagseguro.js",
            );
        }
    }

    define('HOME', $config['HOME']);
    define('HOST', $config['HOST']);
    define('USER', $config['USER']);
    define('PASS', $config['PASS']);
    define('DBSA', $config['DBSA']);
    define('SCHEMA', $config['SCHEMA']);
    define('BANCO', $config['BANCO']);
    define('DEBUG', $config['DEBUG']);
    define('PROD', $config['PROD']);
    define('CO_USUARIO_PADRAO', 1);
    define('NO_USUARIO_PADRAO', 'Usuário Atacdão');
    define("TOKEN_PAGSEGURO", $config['TOKEN_PAGSEGURO']);
    define("URL_PAGSEGURO", $config['URL_PAGSEGURO']);
    define("JS_PAGSEGURO", HOME . 'library/js/' . $config['JS_PAGSEGURO']);
    define("EMAIL_PAGSEGURO", "leodjx@hotmail.com");
    define("EMAIL_LOJA", "leodjx@hotmail.com");
    define("MOEDA_PAGAMENTO", "BRL");
    define("URL_NOTIFICACAO", HOME . "library/NotificacaoPagSeguro.php");
    define("PERFIL_USUARIO_PADRAO", 3);
}
