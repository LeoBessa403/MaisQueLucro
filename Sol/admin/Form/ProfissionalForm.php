<?php

/**
 * ProfissionalForm [ FORM ]
 * @copyright (c) 2018, Leo Bessa
 */
class ProfissionalForm
{
    public static function Cadastrar($res = false)
    {
        $id = "cadastroProfissional";

        $formulario = new FormAssistente($id, null, null, null, "Cadastro de profissionais");
        $formulario->setValor($res);

        // Aba 1
        $formulario
            ->criaAba("Profissonal", "Informações Pessoais");

        $formulario
            ->setId(NU_CPF)
            ->setClasses("cpf")
            ->setLabel("CPF")
            ->CriaInpunt();

        $formulario
            ->setId(NU_RG)
            ->setTamanhoInput(6)
            ->setClasses("numero")
            ->setLabel("RG")
            ->CriaInpunt();

        $formulario
            ->setId(NO_PESSOA)
            ->setClasses("ob nome")
            ->setInfo("O Nome deve ser Completo Mínimo de 10 Caracteres")
            ->setLabel("Nome Completo")
            ->CriaInpunt();

        $formulario
            ->setId(NO_APELIDO)
            ->setInfo("Como gosta de ser chamado")
            ->setLabel("Apelido")
            ->CriaInpunt();

        $formulario
            ->setId(DT_NASCIMENTO)
            ->setClasses("data")
            ->setLabel("Nascimento")
            ->setInfo("Data de Nascimento")
            ->CriaInpunt();

        $label_options = array("" => "Selecione um", "M" => "Masculino", "F" => "Feminino");
        $formulario
            ->setLabel("Sexo")
            ->setId(ST_SEXO)
            ->setType(TiposCampoEnum::SELECT)
            ->setOptions($label_options)
            ->CriaInpunt();

        $formulario
            ->setId(DS_CAMINHO)
            ->setType(TiposCampoEnum::SINGLEFILE)
            ->setLabel("Foto do Perfil")
            ->CriaInpunt();

        $formulario
            ->setType(TiposCampoEnum::TEXTAREA)
            ->setId(DS_SOBRE)
            ->setLabel("Sobre")
            ->CriaInpunt();

        $formulario
            ->finalizaAba();

        // Aba 2
        $formulario
            ->criaAba("Endereço", "Informações de Endereço");

        $formulario
            ->setId(NU_CEP)
            ->setLabel("CEP")
            ->setClasses("cep")
            ->CriaInpunt();

        $formulario
            ->setId(DS_ENDERECO)
            ->setIcon("clip-home-2")
            ->setLabel("Endereço")
            ->CriaInpunt();

        $formulario
            ->setId(DS_COMPLEMENTO)
            ->setLabel("Complemento")
            ->CriaInpunt();

        $formulario
            ->setId(DS_BAIRRO)
            ->setLabel("Bairro")
            ->CriaInpunt();

        $formulario
            ->setId(NO_CIDADE)
            ->setLabel("Cidade")
            ->CriaInpunt();

        $options = EnderecoService::montaComboEstadosDescricao();
        $formulario
            ->setId(SG_UF)
            ->setType(TiposCampoEnum::SELECT)
            ->setLabel("Estado")
            ->setOptions($options)
            ->CriaInpunt();

        $formulario
            ->finalizaAba();

        // Aba 3
        $formulario
            ->criaAba("Contatos", "Informações de Contatos");

        $formulario
            ->setId(NU_TEL1)
            ->setIcon("fa fa-mobile-phone")
            ->setLabel("Telefone (WhatsApp)")
            ->setClasses("tel")
            ->CriaInpunt();

        $formulario
            ->setId(NU_TEL2)
            ->setIcon("fa fa-mobile-phone")
            ->setLabel("Telefone Celular 2")
            ->setClasses("tel")
            ->CriaInpunt();

        $formulario
            ->setId(DS_EMAIL)
            ->setIcon("fa-envelope fa")
            ->setClasses("email")
            ->setLabel("Email")
            ->CriaInpunt();

        $formulario
            ->setId(DS_FACEBOOK)
            ->setIcon("fa-facebook fa")
            ->setLabel("Facebook")
            ->CriaInpunt();

        $formulario
            ->setId(DS_INSTAGRAM)
            ->setIcon("fa-instagram fa")
            ->setLabel("Instagram")
            ->CriaInpunt();

        $formulario
            ->setId(DS_TWITTER)
            ->setIcon("fa-twitter fa")
            ->setLabel("Twitter")
            ->CriaInpunt();

        $formulario
            ->finalizaAba(true);


        if (!empty($res[CO_PROFISSIONAL])):
            $formulario
                ->setType(TiposCampoEnum::HIDDEN)
                ->setId(CO_PROFISSIONAL)
                ->setValues($res[CO_PROFISSIONAL])
                ->CriaInpunt();
            $formulario
                ->setType(TiposCampoEnum::HIDDEN)
                ->setId(CO_ENDERECO)
                ->setValues($res[CO_ENDERECO])
                ->CriaInpunt();
            $formulario
                ->setType(TiposCampoEnum::HIDDEN)
                ->setId(CO_CONTATO)
                ->setValues($res[CO_CONTATO])
                ->CriaInpunt();
            $formulario
                ->setType(TiposCampoEnum::HIDDEN)
                ->setId(CO_PESSOA)
                ->setValues($res[CO_PESSOA])
                ->CriaInpunt();
            $formulario
                ->setType(TiposCampoEnum::HIDDEN)
                ->setId(CO_IMAGEM)
                ->setValues($res[CO_IMAGEM])
                ->CriaInpunt();
        endif;

        return $formulario->finalizaFormAssistente();
    }

    public static function Pesquisar()
    {
        $id = "pesquisaProfissional";

        $formulario = new Form($id, ADMIN . "/" . UrlAmigavel::$controller . "/" . UrlAmigavel::$action, "Pesquisa", 12);

        $formulario
            ->setId(NO_PESSOA)
            ->setIcon("clip-user-6")
            ->setTamanhoInput(12)
            ->setLabel("Nome do Profissional")
            ->setInfo("Pode ser Parte do nome")
            ->CriaInpunt();

        $label_options = array("" => "Selecione um", "M" => "Masculino", "F" => "Feminino");
        $formulario
            ->setLabel("Sexo")
            ->setId(ST_SEXO)
            ->setTamanhoInput(6)
            ->setType(TiposCampoEnum::SELECT)
            ->setOptions($label_options)
            ->CriaInpunt();

        $meses = DiasEnum::$montaComboMes;
        $formulario
            ->setId('mes_aniversariante')
            ->setLabel("Aniversariante do Mês")
            ->setTamanhoInput(6)
            ->setClasses("multipla")
            ->setType(TiposCampoEnum::SELECT)
            ->setOptions($meses)
            ->CriaInpunt();


        return $formulario->finalizaFormPesquisaAvancada();
    }
}
