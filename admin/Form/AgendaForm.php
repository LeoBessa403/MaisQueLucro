<?php

/**
 * AgendaForm [ FORM ]
 * @copyright (c) 2019, Leo Bessa
 */
class AgendaForm
{
    public static function CadastroAgendamento()
    {
        $id = "CadastroAgendamento";

        $formulario = new Form($id, ADMIN . "/" . UrlAmigavel::$controller . "/" . UrlAmigavel::$action,
            "Cadastrar", 12);

        $options = StatusAgendamentoEnum::$descricao;
        unset($options[StatusAgendamentoEnum::DELETADO]);
        $formulario
            ->setId(ST_STATUS)
            ->setType(TiposCampoEnum::SELECT)
            ->setLabel("Status Agendamento")
            ->setTamanhoInput(3)
            ->setClasses("ob")
            ->setOptions($options)
            ->CriaInpunt();

        $formulario
            ->setId('dt_agenda')
            ->setTamanhoInput(3)
            ->setClasses("data ob")
            ->setIcon("clip-calendar-3")
            ->setLabel("Data do agendamento")
            ->CriaInpunt();

        $formulario
            ->setId('nu_hora_inicio_agenda')
            ->setTamanhoInput(3)
            ->setClasses("horas ob")
            ->setPlace("Formato 24Hrs")
            ->setIcon("clip-clock-2", "dir")
            ->setLabel("Hórario de Início")
            ->CriaInpunt();

        $formulario
            ->setId('nu_hora_fim_agenda')
            ->setTamanhoInput(3)
            ->setClasses("horas ob")
            ->setPlace("Formato 24Hrs")
            ->setIcon("clip-clock-2", "dir")
            ->setLabel("Hórario de Término")
            ->CriaInpunt();

        $label_options2 = array("Sim", "Não", "verde", "vermelho");
        $formulario
            ->setLabel("Cliente Novo?")
            ->setId('st_cliente')
            ->setType(TiposCampoEnum::CHECKBOX)
            ->setTamanhoInput(3)
            ->setOptions($label_options2)
            ->CriaInpunt();

        $options = ClienteService::clientesCombo();
        $formulario
            ->setId(CO_CLIENTE)
            ->setType(TiposCampoEnum::SELECT)
            ->setLabel("Cliente")
            ->setTamanhoInput(9)
            ->setClasses('visivel')
            ->setOptions($options)
            ->CriaInpunt();

        $formulario
            ->setId('no_cliente')
            ->setTamanhoInput(6)
            ->setLabel("Nome do Cliente")
            ->CriaInpunt();

        $formulario
            ->setId(NU_TEL1)
            ->setTamanhoInput(3)
            ->setIcon("fa fa-mobile-phone")
            ->setLabel("Celular Cliente")
            ->setInfo("Com <i class=\"fa fa-whatsapp\" style='color: green;' '></i> WhatSapp")
            ->setClasses("tel")
            ->CriaInpunt();


        $label_options2 = array("Sim", "Não", "verde", "vermelho");
        $formulario
            ->setLabel("Serviço Novo?")
            ->setId('st_servico')
            ->setType(TiposCampoEnum::CHECKBOX)
            ->setTamanhoInput(3)
            ->setOptions($label_options2)
            ->CriaInpunt();

        $options = ServicoService::servicosCombo();
        $formulario
            ->setId(CO_SERVICO)
            ->setType(TiposCampoEnum::SELECT)
            ->setLabel("Serviço")
            ->setClasses('visivel')
            ->setTamanhoInput(9)
            ->setOptions($options)
            ->CriaInpunt();


        $formulario
            ->setId(NO_SERVICO)
            ->setTamanhoInput(9)
            ->setLabel("Nome do Serviço")
            ->CriaInpunt();


        $label_options2 = array("Sim", "Não", "verde", "vermelho");
        $formulario
            ->setLabel("Profissional Novo?")
            ->setId('st_profissional')
            ->setType(TiposCampoEnum::CHECKBOX)
            ->setTamanhoInput(3)
            ->setOptions($label_options2)
            ->CriaInpunt();


        $options = ProfissionalService::ProfissionaisAtivosCombo();
        $formulario
            ->setId(CO_PROFISSIONAL)
            ->setType(TiposCampoEnum::SELECT)
            ->setLabel("Profissional")
            ->setClasses('visivel')
            ->setTamanhoInput(9)
            ->setOptions($options)
            ->CriaInpunt();


        $formulario
            ->setId('no_profissional')
            ->setTamanhoInput(9)
            ->setLabel("Nome do Profissional")
            ->CriaInpunt();

        $formulario
            ->setType(TiposCampoEnum::TEXTAREA)
            ->setId(DS_OBSERVACAO)
            ->setTamanhoInput(12)
            ->setLabel("Observação")
            ->CriaInpunt();


        $formulario
            ->setType(TiposCampoEnum::HIDDEN)
            ->setId(CO_AGENDA)
            ->setValues(null)
            ->CriaInpunt();

        return $formulario->finalizaForm(false, false);
    }

    public static function DeletarAgendamento()
    {
        $id = "DeletarAgendamento";

        $formulario = new Form($id, ADMIN . "/" . UrlAmigavel::$controller . "/" . $id,
            "Deletar", 12);

        $formulario
            ->setType(TiposCampoEnum::TEXTAREA)
            ->setId(DS_MOTIVO)
            ->setClasses('ob')
            ->setTamanhoInput(12)
            ->setLabel("Motivo:")
            ->CriaInpunt();

        return $formulario->finalizaForm(false, false);
    }

    public static function Pesquisar()
    {
        $id = "PesquisaAvancadaAgendamento";

        $formulario = new Form($id, ADMIN . "/" . UrlAmigavel::$controller . "/" . UrlAmigavel::$action,
            "Pesquisa", 12);
        $formulario = AgendaForm::geraCamposPesquisa($formulario);
        return $formulario->finalizaForm('', false);
    }

    public static function PesquisarRelatorio()
    {
        $id = "PesquisarRelatorio";

        $formulario = new Form($id, ADMIN . "/" . UrlAmigavel::$controller . "/" . UrlAmigavel::$action,
            "Pesquisa", 12);
        $formulario = AgendaForm::geraCamposPesquisa($formulario);
        return $formulario->finalizaFormPesquisaAvancada();
    }

    private static function geraCamposPesquisa($formulario)
    {
        $options[''] = 'Selecione um status';
        foreach (StatusAgendamentoEnum::$descricao as $chave => $valor) {
            $options[$chave] = $valor;
        }
        $formulario
            ->setId(ST_STATUS . '-pesquisa')
            ->setType(TiposCampoEnum::SELECT)
            ->setLabel("Status Agendamento")
            ->setClasses('multipla')
            ->setTamanhoInput(6)
            ->setOptions($options)
            ->CriaInpunt();

        $options = ClienteService::clientesCombo();
        $formulario
            ->setId(CO_CLIENTE . '-pesquisa')
            ->setType(TiposCampoEnum::SELECT)
            ->setLabel("Cliente")
            ->setClasses('multipla')
            ->setTamanhoInput(6)
            ->setOptions($options)
            ->CriaInpunt();

        $formulario
            ->setId(CO_PROFISSIONAL . '-pesquisa')
            ->setType(TiposCampoEnum::SELECT)
            ->setLabel("Profissional")
            ->setClasses('multipla')
            ->setTamanhoInput(6)
            ->setOptions(ProfissionalService::ProfissionaisAtivosCombo())
            ->CriaInpunt();

        $formulario
            ->setId(CO_SERVICO . '-pesquisa')
            ->setType(TiposCampoEnum::SELECT)
            ->setClasses('multipla')
            ->setLabel("Serviço")
            ->setTamanhoInput(6)
            ->setOptions(ServicoService::servicosCombo())
            ->CriaInpunt();

        $formulario
            ->setId('dt1-pesquisa')
            ->setIcon("clip-calendar-3")
            ->setTamanhoInput(6)
            ->setClasses("data dt1 ob")
            ->setValor(date('d/m/Y'))
            ->setLabel("Período Inicío")
            ->CriaInpunt();

        $formulario
            ->setId('dt2-pesquisa')
            ->setIcon("clip-calendar-3")
            ->setTamanhoInput(6)
            ->setValor(date('d/m/Y'))
            ->setClasses("data dt2 ob")
            ->setLabel("Fim")
            ->CriaInpunt();

        return $formulario;
    }
}
