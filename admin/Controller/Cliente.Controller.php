<?php

class Cliente extends AbstractController
{
    public $result;
    public $form;
    public $jornada;

    public function ListarCliente()
    {
        /** @var ClienteService $clienteService */
        $clienteService = $this->getService(CLIENTE_SERVICE);
        /** @var Session $session */
        $session = new Session();
        if ($session->CheckSession(PESQUISA_AVANCADA)) {
            $session->FinalizaSession(PESQUISA_AVANCADA);
        }
        $Condicoes = [];
        $Condicoes[CO_ASSINANTE] = AssinanteService::getCoAssinanteLogado();

        if (!empty($_POST)) {
            $Condicoes = array(
                "pes." . NO_PESSOA => trim($_POST[NO_PESSOA]),
                "pes." . NO_APELIDO => trim($_POST[NO_APELIDO]),
                "pes." . ST_SEXO => $_POST[ST_SEXO][0],
                "like#end." . NO_CIDADE => $_POST[NO_CIDADE],
                "end." . SG_UF => $_POST[SG_UF][0],
                "cli." . ST_RECEBER_EMAIL_AGENDAMENTO => $_POST[ST_RECEBER_EMAIL_AGENDAMENTO][0],
                "cli." . ST_LEMBRETE_HORARIO_AGENDAMENTO => $_POST[ST_LEMBRETE_HORARIO_AGENDAMENTO][0],
                "cli." . ST_EMAIL_MARKETING => $_POST[ST_EMAIL_MARKETING][0],
                "cli." . ST_SMS_MARKETING => $_POST[ST_SMS_MARKETING][0],
                "in#month(pes." . DT_NASCIMENTO . ")" => (!empty($_POST['mes_aniversariante']))
                    ? implode("', '", $_POST['mes_aniversariante']) : null,
            );
            $this->result = $clienteService->PesquisaAvancada($Condicoes);
            $session->setSession(PESQUISA_AVANCADA, $Condicoes);
        } else {
            $this->result = $clienteService->PesquisaAvancada($Condicoes);
        }

    }

    public function ListarClientePesquisaAvancada()
    {
        echo ClienteForm::Pesquisar();
    }

    public function CadastroCliente()
    {
        /** @var ClienteService $clienteService */
        $clienteService = $this->getService(CLIENTE_SERVICE);

        if (!empty($_POST)):
            $retorno = $clienteService->salvaCliente($_POST, $_FILES);
            if ($retorno[SUCESSO]) {
                Redireciona(UrlAmigavel::$modulo . '/Cliente/ListarCliente/');
            }
        endif;

        /** @var EnderecoService $enderecoService */
        $enderecoService = $this->getService(ENDERECO_SERVICE);
        /** @var ContatoService $contatoService */
        $contatoService = $this->getService(CONTATO_SERVICE);
        /** @var PessoaService $pessoaService */
        $pessoaService = $this->getService(PESSOA_SERVICE);

        $coCliente = UrlAmigavel::PegaParametro(CO_CLIENTE);
        if ($coCliente) {
            /** @var ClienteService $clienteService */
            $clienteService = $this->getService(CLIENTE_SERVICE);
            /** @var ClienteEntidade $cliente */
            $cliente = $clienteService->PesquisaUmRegistro($coCliente);
            // Aba 1
            $res = $pessoaService->getArrayDadosPessoa($cliente->getCoPessoa(), []);
            $res[NO_APELIDO] = $cliente->getNoApelido();
            $res[DS_OBSERVACAO] = $cliente->getDsObservacao();
            // Carrega a Imagem de perfil
            $foto = null;
            if (!empty($cliente->getCoPessoa()->getCoImagem()) &&
                (file_exists(PASTA_RAIZ . "uploads/clientes/" . $cliente->getCoPessoa()->getCoImagem()->getDsCaminho()))) {
                $foto = "clientes/" . $cliente->getCoPessoa()->getCoImagem()->getDsCaminho();
            }
            $res[DS_CAMINHO] = $foto;

            // Aba 2
            if($cliente->getCoPessoa()->getCoEndereco()) {
                /** @var EnderecoEntidade $endereco */
                $endereco = $enderecoService->PesquisaUmRegistro(
                    $cliente->getCoPessoa()->getCoEndereco()->getCoEndereco()
                );
                $res = $enderecoService->getArrayDadosEndereco($endereco, $res);
                $res[CO_ENDERECO] = $cliente->getCoPessoa()->getCoEndereco()->getCoEndereco();
            }else{
                $res[CO_ENDERECO] = null;
            }


            // Aba 3
            /** @var ContatoEntidade $contato */
            $contato = $contatoService->PesquisaUmRegistro(
                $cliente->getCoPessoa()->getCoContato()->getCoContato()
            );
            $res = $contatoService->getArrayDadosContato($contato, $res);


            // Aba 4
            $res[ST_RECEBER_EMAIL_AGENDAMENTO] = ($cliente->getStReceberEmailAgendamento() == 'S')
                ? 'checked' : '';
            $res[ST_LEMBRETE_HORARIO_AGENDAMENTO] = ($cliente->getStLembreteHorarioAgendamento() == 'S')
                ? 'checked' : '';
            $res[ST_EMAIL_MARKETING] = ($cliente->getStEmailMarketing() == 'S')
                ? 'checked' : '';
            $res[ST_SMS_MARKETING] = ($cliente->getStSmsMarketing() == 'S')
                ? 'checked' : '';
            $res[NU_COMO_CONHECEU] = $cliente->getNuComoConheceu();


            // Inicia parametros para edição
            $res[CO_CLIENTE] = $cliente->getCoCliente();
            $res[CO_CONTATO] = $cliente->getCoPessoa()->getCoContato()->getCoContato();
            $res[CO_PESSOA] = $cliente->getCoPessoa()->getCoPessoa();
            $res[CO_IMAGEM] = ($cliente->getCoPessoa()->getCoImagem())
                ? $cliente->getCoPessoa()->getCoImagem()->getCoImagem() : null;

        } else {
            // Inicia elementos do Form
            $res[ST_RECEBER_EMAIL_AGENDAMENTO] = 'checked';
            $res[ST_LEMBRETE_HORARIO_AGENDAMENTO] = 'checked';
            $res[ST_EMAIL_MARKETING] = 'checked';
            $res[ST_SMS_MARKETING] = 'checked';
        }

        $this->form = ClienteForm::Cadastrar($res);
    }

}