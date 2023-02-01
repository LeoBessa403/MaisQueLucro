<?php

class MembroWebForm
{

    public static function Cadastrar($CoInscricao = false, $res = false, $id = false)
    {
        if (!$id):
            $id = "CadastroRetiroCarnaval";
        endif;
        $action = UrlAmigavel::$modulo . "/" . UrlAmigavel::$controller . "/" . UrlAmigavel::$action;

        $formulario = new Form($id, $action);
        if ($res):
            $formulario->setValor($res);

            $label_options = array("1" => "1", "2" => "2", "3" => "3");
            $formulario
                ->setLabel("Números de Parcelas")
                ->setId(NU_PARCELAS)
                ->setType(TiposCampoEnum::SELECT)
                ->setTamanhoInput(12)
                ->setOptions($label_options)
                ->CriaInpunt();

            $label_options = array("Sim", "Não", "verde", "vermelho");
            $formulario
                ->setLabel("Servo?")
                ->setId(ST_EQUIPE_TRABALHO)
                ->setType(TiposCampoEnum::CHECKBOX)
                ->setClasses($res[ST_EQUIPE_TRABALHO])
                ->setTamanhoInput(6)
                ->setOptions($label_options)
                ->CriaInpunt();

        endif;


        $label_options = array("Sim", "Não", "verde", "vermelho");
        $formulario
            ->setLabel("Membro do Grupo GEJ?")
            ->setId(DS_MEMBRO_ATIVO)
            ->setType(TiposCampoEnum::CHECKBOX)
            ->setClasses($res[DS_MEMBRO_ATIVO])
            ->setTamanhoInput(12)
            ->setOptions($label_options)
            ->CriaInpunt();

        $formulario
            ->setId(NO_PESSOA)
            ->setClasses("ob nome")
            ->setInfo("O Nome deve ser Completo Mínimo de 10 Caracteres")
            ->setLabel("Nome Completo")
            ->setTamanhoInput(12)
            ->CriaInpunt();

        $formulario
            ->setId(NU_CPF)
            ->setClasses("cpf ob")
            ->setTamanhoInput(6)
            ->setLabel("CPF")
            ->CriaInpunt();

        $formulario
            ->setId(NU_RG)
            ->setTamanhoInput(6)
            ->setClasses("numero")
            ->setLabel("RG")
            ->CriaInpunt();

        $label_options = array("" => "Selecione um", "M" => "Masculino", "F" => "Feminino");
        $formulario
            ->setLabel("Sexo")
            ->setId(ST_SEXO)
            ->setClasses("ob")
            ->setType(TiposCampoEnum::SELECT)
            ->setTamanhoInput(6)
            ->setOptions($label_options)
            ->CriaInpunt();

        $formulario
            ->setId(DT_NASCIMENTO)
            ->setIcon("clip-calendar-3")
            ->setTamanhoInput(6)
            ->setClasses("data ob")
            ->setInfo("Para maiores de 14 anos")
            ->setLabel("Nascimento")
            ->CriaInpunt();

        $formulario
            ->setId(NU_TEL1)
            ->setTamanhoInput(6)
            ->setIcon("fa fa-mobile-phone")
            ->setLabel("Telefone Celular")
            ->setInfo("Com o Whatsapp")
            ->setClasses("tel ob")
            ->CriaInpunt();

        $formulario
            ->setId(NU_TEL2)
            ->setTamanhoInput(6)
            ->setIcon("fa fa-mobile-phone")
            ->setLabel("Telefone Celular 2")
            ->setClasses("tel")
            ->CriaInpunt();

        $formulario
            ->setId(DS_ENDERECO)
            ->setIcon("clip-home-2")
            ->setTamanhoInput(12)
            ->setClasses("ob")
            ->setLabel("Endereço")
            ->CriaInpunt();

        $formulario
            ->setId(DS_COMPLEMENTO)
            ->setLabel("Complemento")
            ->setTamanhoInput(12)
            ->CriaInpunt();

        $formulario
            ->setId(DS_BAIRRO)
            ->setLabel("Bairro")
            ->setTamanhoInput(12)
            ->CriaInpunt();

        $formulario
            ->setId(NO_CIDADE)
            ->setLabel("Cidade")
            ->setTamanhoInput(12)
            ->CriaInpunt();

        $formulario
            ->setId(NU_CEP)
            ->setLabel("CEP")
            ->setTamanhoInput(4)
            ->setClasses("cep")
            ->CriaInpunt();

        $options = EnderecoService::montaComboEstadosDescricao();
        $formulario
            ->setTamanhoInput(8)
            ->setId(SG_UF)
            ->setType(TiposCampoEnum::SELECT)
            ->setLabel("Estado")
            ->setOptions($options)
            ->CriaInpunt();

        $label_options = array("Sim", "Não", "verde", "vermelho");
        $formulario
            ->setLabel("Participou de algum Retiro?")
            ->setTamanhoInput(5)
            ->setId(DS_RETIRO)
            ->setClasses($res[DS_RETIRO])
            ->setType(TiposCampoEnum::CHECKBOX)
            ->setOptions($label_options)
            ->CriaInpunt();

        $label_options = array("Sim", "Não", "verde", "vermelho");
        $formulario
            ->setLabel("Participa de alguma Pastoral?")
            ->setId("ds_pastoral_ativo")
            ->setClasses($res["ds_pastoral_ativo"])
            ->setTamanhoInput(7)
            ->setType(TiposCampoEnum::CHECKBOX)
            ->setOptions($label_options)
            ->CriaInpunt();

        $formulario
            ->setLabel("Qual Pastoral?")
            ->setTamanhoInput(12)
            ->setId(DS_PASTORAL)
            ->CriaInpunt();

        $opticoes_camisa = MembroWeb::montaComboCamisas();

        $formulario
            ->setId(NU_CAMISA)
            ->setType(TiposCampoEnum::SELECT)
            ->setTamanhoInput(12)
            ->setClasses("ob")
            ->setOptions($opticoes_camisa)
            ->setLabel("Tamanho da Camisa")
            ->CriaInpunt();

        $formulario
            ->setId(NO_RESPONSAVEL)
            ->setTamanhoInput(6)
            ->setClasses("ob nome")
            ->setLabel("Pessoa de Referência")
            ->setInfo("Para caso de EMERGÊNCIA")
            ->CriaInpunt();

        $formulario
            ->setId(NU_TEL_RESPONSAVEL)
            ->setTamanhoInput(6)
            ->setIcon("clip-phone-2")
            ->setClasses("tel ob")
            ->setLabel("Tel. Referência")
            ->CriaInpunt();

        $formulario
            ->setId(DS_EMAIL)
            ->setIcon("fa-envelope fa")
            ->setClasses("email ob")
            ->setLabel("Email")
            ->setTamanhoInput(12)
            ->CriaInpunt();

        $ob = 'ob';
        if ($CoInscricao) {
            $formulario
                ->setType(TiposCampoEnum::HIDDEN)
                ->setId(CO_INSCRICAO)
                ->setValues($CoInscricao)
                ->CriaInpunt();
            $ob = '';
        }
        $formulario
            ->setId(DS_CAMINHO)
            ->setType(TiposCampoEnum::SINGLEFILE)
            ->setInfo("Para a identificação")
            ->setClasses($ob)
            ->setTamanhoInput(12)
            ->setLabel("Foto de Perfil")
            ->CriaInpunt();

        $formulario
            ->setId(DS_DESCRICAO)
            ->setLabel("Fale um pouco sobre você")
            ->setType(TiposCampoEnum::TEXTAREA)
            ->setTamanhoInput(12)
            ->setClasses("ob")
            ->CriaInpunt();

        $formulario
            ->setId(DS_MEDICACAO)
            ->setLabel("Uso de Medicação?")
            ->setType(TiposCampoEnum::TEXTAREA)
            ->setTamanhoInput(12)
            ->setInfo("Descreva se faz uso de alguma medicação e como utiliza.")
            ->CriaInpunt();

        $formulario
            ->setId(DS_ALIMENTACAO)
            ->setLabel("Restrição Alimentar?")
            ->setType(TiposCampoEnum::TEXTAREA)
            ->setTamanhoInput(12)
            ->setInfo("Descreva se tiver alguma restrição alimentar.")
            ->CriaInpunt();


        return $formulario->finalizaForm();
    }
}

?>
   