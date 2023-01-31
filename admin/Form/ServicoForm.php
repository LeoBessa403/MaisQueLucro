<?php

/**
 * ServicoForm [ FORM ]
 * @copyright (c) 2018, Leo Bessa
 */
class ServicoForm
{
    public static function CadastrarCategoria($res = false)
    {
        $id = "CadastroCategoriaServico";

        $formulario = new Form($id, ADMIN . "/" . UrlAmigavel::$controller . "/" . UrlAmigavel::$action,
            "Cadastrar", 6);
        $formulario->setValor($res);


        $label_options2 = array("<i class='fa fa-check fa-white'></i>", "<i class='fa fa-times fa-white'></i>", "verde", "vermelho");
        $formulario
            ->setLabel("Status da Categoria")
            ->setClasses($res[ST_STATUS])
            ->setId(ST_STATUS)
            ->setType(TiposCampoEnum::CHECKBOX)
            ->setInfo("Ativa ou Inativa?")
            ->setOptions($label_options2)
            ->CriaInpunt();

        $formulario
            ->setId(NO_CATEGORIA_SERVICO)
            ->setClasses("ob")
            ->setLabel("Nome da Categoria")
            ->CriaInpunt();

        if (!empty($res[CO_CATEGORIA_SERVICO])):
            $formulario
                ->setType(TiposCampoEnum::HIDDEN)
                ->setId(CO_CATEGORIA_SERVICO)
                ->setValues($res[CO_CATEGORIA_SERVICO])
                ->CriaInpunt();
        endif;

        return $formulario->finalizaForm('Servico/ListarCategoriaServico');
    }

    public static function Cadastrar($res = false)
    {
        $id = "CadastroServico";

        $formulario = new Form($id, ADMIN . "/" . UrlAmigavel::$controller . "/" . UrlAmigavel::$action,
            "Cadastrar", 6);
        $formulario->setValor($res);


        $label_options2 = array("<i class='fa fa-check fa-white'></i>", "<i class='fa fa-times fa-white'></i>", "verde", "vermelho");
        $formulario
            ->setLabel("Status do Serviço")
            ->setClasses($res[ST_STATUS])
            ->setId(ST_STATUS)
            ->setType(TiposCampoEnum::CHECKBOX)
            ->setTamanhoInput(6)
            ->setInfo("Ativo ou Inativo?")
            ->setOptions($label_options2)
            ->CriaInpunt();

        $label_options2 = array("<i class='fa fa-check fa-white'></i>", "<i class='fa fa-times fa-white'></i>", "verde", "vermelho");
        $formulario
            ->setLabel("Precisa de Assistente?")
            ->setClasses($res[ST_ASSISTENTE])
            ->setId(ST_ASSISTENTE)
            ->setType(TiposCampoEnum::CHECKBOX)
            ->setTamanhoInput(6)
            ->setOptions($label_options2)
            ->CriaInpunt();

        $formulario
            ->setId(NO_SERVICO)
            ->setClasses("ob")
            ->setInfo("O Nome para o serviço")
            ->setLabel("Serviço")
            ->CriaInpunt();

        $formulario
            ->setId(NU_VALOR)
            ->setClasses("moeda ob")
            ->setLabel("Preço R$")
            ->setTamanhoInput(3)
            ->CriaInpunt();

        $formulario
            ->setId(NU_DURACAO)
            ->setTamanhoInput(3)
            ->setClasses("numero ob")
            ->setInfo("Duração do Serviço em minutos")
            ->setLabel("Duração")
            ->CriaInpunt();

        $options = CategoriaServicoService::categoriasServicoCombo();
        $formulario
            ->setId(CO_CATEGORIA_SERVICO)
            ->setType(TiposCampoEnum::SELECT)
            ->setClasses("ob")
            ->setTamanhoInput(6)
            ->setLabel("Categoria do Serviço")
            ->setOptions($options)
            ->CriaInpunt();

        $ob = ' ob';
        if (!empty($res[CO_IMAGEM])):
            $formulario
                ->setType(TiposCampoEnum::HIDDEN)
                ->setId(CO_IMAGEM)
                ->setValues($res[CO_IMAGEM])
                ->CriaInpunt();

            $ob = '';
        endif;

        $formulario
            ->setId(DS_CAMINHO)
            ->setType(TiposCampoEnum::SINGLEFILE)
            ->setClasses($ob)
            ->setTamanhoInput(12)
            ->setLabel("Foto do Serviço")
            ->CriaInpunt();

        $formulario
            ->setType(TiposCampoEnum::TEXTAREA)
            ->setId(DS_DESCRICAO)
            ->setClasses("ob")
            ->setTamanhoInput(12)
            ->setLabel("Descrição")
            ->CriaInpunt();

        if (!empty($res[CO_SERVICO])):
            $formulario
                ->setType(TiposCampoEnum::HIDDEN)
                ->setId(CO_SERVICO)
                ->setValues($res[CO_SERVICO])
                ->CriaInpunt();
        endif;

        return $formulario->finalizaForm('Servico/ListarServico');
    }

    public static function ComissaoServico($res = false)
    {
        $id = "configComissao";

        $formulario = new Form($id, ADMIN . "/" . UrlAmigavel::$controller . "/" . UrlAmigavel::$action,
            "Cadastrar", 6);
        $formulario->setValor($res);

        $formulario
            ->setId(NU_TIPO_COMISSAO . TipoComissaoEnum::UNICO_PROFISSIONAL)
            ->setClasses("porc-int ob")
            ->setLabel("Único Profissional")
            ->setIcon("%", 'dir')
            ->setInfo('Comissão quando for Único Profissional.')
            ->setTamanhoInput(4)
            ->CriaInpunt();

        $formulario
            ->setId(NU_TIPO_COMISSAO . TipoComissaoEnum::COM_ASSISTENTE)
            ->setClasses("porc-int ob")
            ->setIcon("%", 'dir')
            ->setLabel("Com Assistente")
            ->setInfo('Comissão quando for Com Assistente.')
            ->setTamanhoInput(4)
            ->CriaInpunt();

        $formulario
            ->setId(NU_TIPO_COMISSAO . TipoComissaoEnum::ASSISTENTE)
            ->setClasses("porc-int ob")
            ->setIcon("%", 'dir')
            ->setLabel("Assistente")
            ->setInfo('Comissão quando for O Assistente.')
            ->setTamanhoInput(4)
            ->CriaInpunt();


        if (!empty($res[CO_SERVICO])):
            $formulario
                ->setType(TiposCampoEnum::HIDDEN)
                ->setId(CO_SERVICO)
                ->setValues($res[CO_SERVICO])
                ->CriaInpunt();

        endif;

        if (!empty($res[CO_PROFISSIONAL])):
            $formulario
                ->setType(TiposCampoEnum::HIDDEN)
                ->setId(CO_PROFISSIONAL)
                ->setValues($res[CO_PROFISSIONAL])
                ->CriaInpunt();

        endif;

        return $formulario->finalizaForm();
    }


    public static function Pesquisar($resultPreco)
    {
        $id = "pesquisaServico";

        $formulario = new Form($id, ADMIN . "/" . UrlAmigavel::$controller . "/" . UrlAmigavel::$action, "Pesquisa", 12);

        $formulario
            ->setId(NO_SERVICO)
            ->setTamanhoInput(6)
            ->setLabel("Nome do Serviço")
            ->setInfo("Pode ser Parte do nome")
            ->CriaInpunt();

        $formulario
            ->setId(DS_DESCRICAO)
            ->setTamanhoInput(6)
            ->setLabel("Contém na Descrição")
            ->CriaInpunt();

        $options = CategoriaServicoService::categoriasServicoCombo();
        $formulario
            ->setId(CO_CATEGORIA_SERVICO)
            ->setType(TiposCampoEnum::SELECT)
            ->setLabel("Categoria do Serviço")
            ->setTamanhoInput(6)
            ->setOptions($options)
            ->CriaInpunt();

        $formulario
            ->setId(NU_VALOR)
            ->setTamanhoInput(6)
            ->setIntervalo($resultPreco)
            ->setType(TiposCampoEnum::SLIDER)
            ->setLabel("Valor R$")
            ->CriaInpunt();

        $label_options = array("" => "Selecione um", "A" => "Ativo", "I" => "Inativo");
        $formulario
            ->setLabel("Status do Serviço")
            ->setId(ST_STATUS)
            ->setTamanhoInput(6)
            ->setType(TiposCampoEnum::SELECT)
            ->setOptions($label_options)
            ->CriaInpunt();

        $label_options = array("" => "Selecione um", "S" => "Sim", "N" => "Não");
        $formulario
            ->setLabel("Assistente")
            ->setId(ST_ASSISTENTE)
            ->setTamanhoInput(6)
            ->setType(TiposCampoEnum::SELECT)
            ->setOptions($label_options)
            ->CriaInpunt();


        return $formulario->finalizaFormPesquisaAvancada();
    }


    public static function CadastroPacoteServico($res = false)
    {
        $id = "CadastroPacoteServico";

        $formulario = new Form($id, ADMIN . "/" . UrlAmigavel::$controller . "/" . UrlAmigavel::$action,
            "Cadastrar");
        $formulario->setValor($res);

        $label_options2 = array("<i class='fa fa-check fa-white'></i>", "<i class='fa fa-times fa-white'></i>", "verde", "vermelho");
        $formulario
            ->setLabel("Status do Pacote")
            ->setClasses($res[ST_STATUS])
            ->setId(ST_STATUS)
            ->setTamanhoInput(3)
            ->setType(TiposCampoEnum::CHECKBOX)
            ->setInfo("Ativo ou Inativo?")
            ->setOptions($label_options2)
            ->CriaInpunt();

        $formulario
            ->setId(NO_PACOTE_SERV)
            ->setTamanhoInput(9)
            ->setClasses("ob")
            ->setLabel("Nome do pacote")
            ->CriaInpunt();

        $formulario
            ->setId(NU_VALOR)
            ->setClasses("moeda ob")
            ->setLabel("Preço R$")
            ->setTamanhoInput(3)
            ->CriaInpunt();

        $options = ServicoService::servicosCombo();
        $formulario
            ->setId(CO_SERVICO)
            ->setType(TiposCampoEnum::SELECT)
            ->setLabel("Serviços do Pacote")
            ->setTamanhoInput(9)
            ->setClasses("multipla ob")
            ->setOptions($options)
            ->CriaInpunt();

        $formulario
            ->setType(TiposCampoEnum::TEXTAREA)
            ->setId(DS_DESCRICAO)
            ->setClasses("ob")
            ->setTamanhoInput(12)
            ->setLabel("Descrição")
            ->CriaInpunt();


        if (!empty($res[CO_PACOTE_SERV])):
            $formulario
                ->setType(TiposCampoEnum::HIDDEN)
                ->setId(CO_PACOTE_SERV)
                ->setValues($res[CO_PACOTE_SERV])
                ->CriaInpunt();

        endif;

        return $formulario->finalizaForm('Servico/PacoteServico');
    }

    public static function CadastroPromocaoServico($res = false)
    {
        $id = "CadastroPromocaoServico";

        $formulario = new Form($id, ADMIN . "/" . UrlAmigavel::$controller . "/" . UrlAmigavel::$action,
            "Cadastrar");
        $formulario->setValor($res);

        $label_options2 = array("<i class='fa fa-check fa-white'></i>", "<i class='fa fa-times fa-white'></i>", "verde", "vermelho");
        $formulario
            ->setLabel("Status da Promoção")
            ->setClasses($res[ST_STATUS])
            ->setId(ST_STATUS)
            ->setTamanhoInput(3)
            ->setType(TiposCampoEnum::CHECKBOX)
            ->setInfo("Ativo ou Inativo?")
            ->setOptions($label_options2)
            ->CriaInpunt();

        $formulario
            ->setId(NO_TITULO)
            ->setTamanhoInput(9)
            ->setClasses("ob")
            ->setLabel("Título")
            ->CriaInpunt();

        $formulario
            ->setType(TiposCampoEnum::TEXTAREA)
            ->setId(DS_DESCRICAO)
            ->setClasses("ob")
            ->setTamanhoInput(12)
            ->setLabel("Descrição")
            ->CriaInpunt();

        $options = ServicoService::servicosCombo();
        $formulario
            ->setId(CO_SERVICO)
            ->setType(TiposCampoEnum::SELECT)
            ->setLabel("Serviço da Promoção")
            ->setTamanhoInput(12)
            ->setClasses("ob")
            ->setOptions($options)
            ->CriaInpunt();

        $formulario
            ->setId('valor_servico')
            ->setClasses("disabilita")
            ->setLabel("Preço R$")
            ->setTamanhoInput(4)
            ->CriaInpunt();

        $formulario
            ->setId(NU_VALOR)
            ->setClasses("moeda ob")
            ->setLabel("Preço Promocional R$")
            ->setTamanhoInput(4)
            ->CriaInpunt();

        $formulario
            ->setId('desconto')
            ->setClasses("porc-decimal")
            ->setLabel("Desconto")
            ->setIcon("%", 'dir')
            ->setTamanhoInput(4)
            ->CriaInpunt();

        $formulario
            ->setId(DT_INICIO)
            ->setTamanhoInput(3)
            ->setClasses("data ob")
            ->setIcon("clip-calendar-3")
            ->setLabel("Data de Inicio")
            ->CriaInpunt();

        $formulario
            ->setId(DT_FIM)
            ->setTamanhoInput(3)
            ->setClasses("data ob")
            ->setIcon("clip-calendar-3")
            ->setLabel("Data de Termino")
            ->CriaInpunt();

        $formulario
            ->setId(NU_HORA_ABERTURA)
            ->setTamanhoInput(3)
            ->setClasses("horas ob")
            ->setPlace("Formato 24Hrs")
            ->setIcon("clip-clock-2", "dir")
            ->setLabel("Hórario de Início")
            ->CriaInpunt();

        $formulario
            ->setId(NU_HORA_FECHAMENTO)
            ->setTamanhoInput(3)
            ->setClasses("horas ob")
            ->setPlace("Formato 24Hrs")
            ->setIcon("clip-clock-2", "dir")
            ->setLabel("Hórario de Término")
            ->CriaInpunt();

        $options = DiasEnum::$descricao;
        $formulario
            ->setId(NU_DIA_SEMANA)
            ->setTamanhoInput(12)
            ->setClasses("inline")
            ->setType(TiposCampoEnum::CHECKBOX)
            ->setLabel("Dias de atendimento:")
            ->setLabelCheckRadio($options)
            ->CriaInpunt();


        if (!empty($res[CO_PROMOCAO])):
            $formulario
                ->setType(TiposCampoEnum::HIDDEN)
                ->setId(CO_PROMOCAO)
                ->setValues($res[CO_PROMOCAO])
                ->CriaInpunt();
        endif;

        return $formulario->finalizaForm('Servico/PromocaoServico');
    }


    public static function CadastroCortesiaServico($res = false)
    {
        $id = "CadastroCortesiaServico";

        $formulario = new Form($id, ADMIN . "/" . UrlAmigavel::$controller . "/" . UrlAmigavel::$action,
            "Cadastrar");
        $formulario->setValor($res);

        $label_options2 = array("<i class='fa fa-check fa-white'></i>", "<i class='fa fa-times fa-white'></i>", "verde", "vermelho");
        $formulario
            ->setLabel("Status da Cortesia")
            ->setClasses($res[ST_STATUS])
            ->setId(ST_STATUS)
            ->setTamanhoInput(3)
            ->setType(TiposCampoEnum::CHECKBOX)
            ->setInfo("Ativa ou Inativa?")
            ->setOptions($label_options2)
            ->CriaInpunt();

        $options = ServicoService::servicosCombo();
        $formulario
            ->setId(CO_SERVICO)
            ->setType(TiposCampoEnum::SELECT)
            ->setLabel("Cortesia")
            ->setTamanhoInput(9)
            ->setClasses("ob")
            ->setOptions($options)
            ->CriaInpunt();

        $formulario
            ->setId(DT_INICIO)
            ->setTamanhoInput(3)
            ->setClasses("data ob")
            ->setIcon("clip-calendar-3")
            ->setLabel("Data de Inicio")
            ->CriaInpunt();

        $formulario
            ->setId(DT_FIM)
            ->setTamanhoInput(3)
            ->setClasses("data ob")
            ->setIcon("clip-calendar-3")
            ->setLabel("Data de Termino")
            ->CriaInpunt();

        $formulario
            ->setId(NU_HORA_ABERTURA)
            ->setTamanhoInput(3)
            ->setClasses("horas ob")
            ->setPlace("Formato 24Hrs")
            ->setIcon("clip-clock-2", "dir")
            ->setLabel("Hórario de Início")
            ->CriaInpunt();

        $formulario
            ->setId(NU_HORA_FECHAMENTO)
            ->setTamanhoInput(3)
            ->setClasses("horas ob")
            ->setPlace("Formato 24Hrs")
            ->setIcon("clip-clock-2", "dir")
            ->setLabel("Hórario de Término")
            ->CriaInpunt();

        $options = DiasEnum::$descricao;
        $formulario
            ->setId(NU_DIA_SEMANA)
            ->setTamanhoInput(12)
            ->setClasses("inline")
            ->setType(TiposCampoEnum::CHECKBOX)
            ->setLabel("Dias de atendimento:")
            ->setLabelCheckRadio($options)
            ->setInfo("Dias que pode ser utilizada")
            ->CriaInpunt();

        $formulario
            ->setType(TiposCampoEnum::TEXTAREA)
            ->setId(DS_MOTIVO)
            ->setClasses("ob")
            ->setTamanhoInput(12)
            ->setLabel("Motivo")
            ->CriaInpunt();


        if (!empty($res[CO_CORTESIA])):
            $formulario
                ->setType(TiposCampoEnum::HIDDEN)
                ->setId(CO_CORTESIA)
                ->setValues($res[CO_CORTESIA])
                ->CriaInpunt();
        endif;

        return $formulario->finalizaForm('Servico/CortesiaServico');
    }

    public static function CadastroValePresenteServico($res = false)
    {
        $id = "CadastroValePresenteServico";

        $formulario = new Form($id, ADMIN . "/" . UrlAmigavel::$controller . "/" . UrlAmigavel::$action,
            "Cadastrar");
        $formulario->setValor($res);

        $label_options2 = array("<i class='fa fa-check fa-white'></i>", "<i class='fa fa-times fa-white'></i>", "verde", "vermelho");
        $formulario
            ->setLabel("Status da Cortesia")
            ->setClasses($res[ST_STATUS])
            ->setId(ST_STATUS)
            ->setTamanhoInput(4)
            ->setType(TiposCampoEnum::CHECKBOX)
            ->setInfo("Ativo ou Inativo?")
            ->setOptions($label_options2)
            ->CriaInpunt();

        $formulario
            ->setId(DT_VALIDO)
            ->setTamanhoInput(4)
            ->setClasses("data ob")
            ->setIcon("clip-calendar-3")
            ->setLabel("Validade")
            ->CriaInpunt();

        $formulario
            ->setId(NU_VALOR)
            ->setClasses("moeda ob")
            ->setLabel("Valor R$")
            ->setTamanhoInput(4)
            ->CriaInpunt();


        $formulario
            ->setType(TiposCampoEnum::TEXTAREA)
            ->setId(DS_MOTIVO)
            ->setClasses("ob")
            ->setTamanhoInput(12)
            ->setLabel("Motivo")
            ->CriaInpunt();


        if (!empty($res[CO_VALE_PRESENTE])):
            $formulario
                ->setType(TiposCampoEnum::HIDDEN)
                ->setId(CO_VALE_PRESENTE)
                ->setValues($res[CO_VALE_PRESENTE])
                ->CriaInpunt();
        endif;

        return $formulario->finalizaForm('Servico/ValePresenteServico');
    }
}
