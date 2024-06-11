<?php

/**
 * WhatsAppService.class [ SERVICE ]
 * @copyright (c) 2020, Leo Bessa
 */
class  WhatsAppService extends AbstractService
{
    private $tokenApiWhats;
    private $InstanceApiWhats;


    public function __construct()
    {
        $this->InstanceApiWhats = WHATSAPP_INSTANCE;
        $this->tokenApiWhats = API_WHATS_TOKEN;
    }

    private function conectaApi($url, $dados)
    {
        $curl = curl_init();

        $dados['appkey'] = $this->InstanceApiWhats;
        $dados['authkey'] = $this->tokenApiWhats;

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://chatbot.menuia.com/api/" . $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $dados,
        ));
        $response = curl_exec($curl);
        curl_close($curl);

        $retorno = json_decode($response);
        if ($retorno->status == 200) {
            Notificacoes::geraMensagem(
                'Mensagem enviada com Sucesso!',
                TiposMensagemEnum::SUCESSO
            );
        } else {
            Notificacoes::geraMensagem(
                'Erro ao Enviar! <br>' . $retorno->message,
                TiposMensagemEnum::ERRO
            );
        }
        return json_decode($response);
    }

    public function verificaStatus()
    {
        if (API_WHATS_SERVER) {
            $dados = [
                'authkey' => 'uLjsts3u5ObTXfMDh31qS6y63mp1tBgR5Ew3Lq9fg4eMgsaGMy',
                'message' => WHATSAPP_MSG,
                'checkDispositivo' => 'true',
            ];

            $retorno = $this->conectaApi('developer', $dados);

            debug($retorno, 1);

//            if ($data["accountStatus"] == 'authenticated') {
//                return true;
//            } else {
//                return false;
//            }
        }
        return false;
    }

    public function enviarMensagem($telDestinatario, $msg, $nacional = true)
    {
        $msgZap = urldecode($msg);
        $telDestinatario = filter_var(Valida::RetiraMascara($telDestinatario), FILTER_SANITIZE_NUMBER_INT);
        $url = 'create-message';
        $telSendMsg = (PROD) ? ($nacional) ? '55' . $telDestinatario : $telDestinatario : WHATSAPP_MSG;
        $dados = [
            'to' => $telSendMsg,
            'message' => $msgZap,
            'sandbox' => 'false'
        ];
        return $this->conectaApi($url, $dados);
    }

    public function enviarMensagemArquivo($telDestinatario, $msg, $arquivo, $nacional = true)
    {
        $msgZap = urldecode($msg);
        $telDestinatario = filter_var(Valida::RetiraMascara($telDestinatario), FILTER_SANITIZE_NUMBER_INT);
        $url = $this->urlApiWhats . 'sendFile?token=' . $this->tokenApiWhats;
        $telSendMsg = (PROD) ? ($nacional) ? '55' . $telDestinatario : $telDestinatario : WHATSAPP_MSG;
        $data = [
            'phone' => $telSendMsg, // Número do Telefone
            'body' => $arquivo['caminho'], // Arquivo
            'filename' => $arquivo['nome'], // Nome do Arquivo
            'caption' => $msgZap, // Menssagem com o Arquivo
        ];
        $json = json_encode($data); // Encode data to JSON
        // Make a POST request
        $options = stream_context_create(['http' => [
            'method' => 'POST',
            'header' => 'Content-type: application/json',
            'content' => $json
        ]
        ]);
        // Send a request
        return file_get_contents($url, false, $options);
    }

    public function enviaMsgUsuarioInicial($dadosEmail, $coUsuario)
    {
        $Mensagem = "  Olá " . strtoupper($dadosEmail[NO_PESSOA]) . ", Seu cadastro no *" . DESC .
            "* foi realizado com sucesso.
                 
   Seu Login é: " . $dadosEmail[DS_EMAIL] . "              
   Sua Senha é: _*" . $dadosEmail[DS_SENHA] . "*_";
        $Mensagem .= ". 
        _Ao acessar o Sistema pela primeira vez, deve trocar a senha._
              
   Acesso pelo link: " . HOME . "admin para fazer a ATIVAÇÃO DO CADASTRO.
   
   Acesse o SOL agora mesmo e começe a usar-lo para uma melhor Controle Financeiro. Esperamos por você!";
        return $this->enviarMensagem($dadosEmail[NU_TEL1], $Mensagem);
    }


}