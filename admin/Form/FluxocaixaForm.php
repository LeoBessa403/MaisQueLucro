<?php

/**
 * FluxoCaixaForm [ FORM ]
 * @copyright (c) 2021, Leo Bessa
 */
class FluxocaixaForm
{
    public static function CadastrarFluxocaixa($res)
    {
        $id = "CadastrarFluxocaixa";

        $formulario = new Form($id, ADMIN . "/" . UrlAmigavel::$controller . "/" . UrlAmigavel::$action,
            "Cadastrar", 12);

        $options = [];
        $formulario
            ->setId(CO_CATEGORIA_FC)
            ->setType(TiposCampoEnum::SELECT)
            ->setLabel("Categoria PAI")
            ->setTamanhoInput(12)
            ->setOptions($options)
            ->CriaInpunt();

        $formulario
            ->setId(NU_CODIGO)
            ->setTamanhoInput(2)
            ->setClasses('disabilita')
            ->setLabel("Código")
            ->CriaInpunt();

        $formulario
            ->setId(DS_TEXTO)
            ->setTamanhoInput(10)
            ->setLabel("Nome da Categoria")
            ->CriaInpunt();

        Form::CriaInputHidden($formulario, $res, []);

        return $formulario->finalizaForm(false, false);
    }

    public static function TransfSaldo($res)
    {
        $id = "TransfSaldo";

        $formulario = new Form($id, ADMIN . "/" . UrlAmigavel::$controller . "/" . UrlAmigavel::$action,
            "Transferir", 12);

        $options = ContaBancariaService::ContaBancariaCombo();
        $formulario
            ->setId(CO_CONTA_BANCARIA_ORIGEM)
            ->setType(TiposCampoEnum::SELECT)
            ->setLabel("Conta de Origem")
            ->setTamanhoInput(5)
            ->setOptions($options)
            ->CriaInpunt();

        $formulario
            ->setId(NU_SALDO_ORIGEM_ANT)
            ->setTamanhoInput(4)
            ->setClasses('disabilita')
            ->setLabel("Saldo Origem")
            ->setInfo("Saldo Atual da conta de Origem")
            ->CriaInpunt();

        $formulario
            ->setId('t-' . DT_REALIZADO)
            ->setTamanhoInput(3)
            ->setClasses('data')
            ->setLabel("Data Realizado")
            ->CriaInpunt();

        $options = ContaBancariaService::ContaBancariaCombo();
        $formulario
            ->setId(CO_CONTA_BANCARIA_DESTINO)
            ->setType(TiposCampoEnum::SELECT)
            ->setLabel("Conta de Destino")
            ->setTamanhoInput(5)
            ->setOptions($options)
            ->CriaInpunt();

        $formulario
            ->setId(NU_SALDO_DESTINO_ANT)
            ->setTamanhoInput(4)
            ->setClasses('disabilita')
            ->setLabel("Saldo Destino")
            ->setInfo("Saldo Atual da conta de Destino")
            ->CriaInpunt();

        $formulario
            ->setId(NU_VALOR_TRANSFERIDO)
            ->setTamanhoInput(3)
            ->setClasses('moeda')
            ->setInfo('Valor a ser Transferido')
            ->setLabel("Valor")
            ->CriaInpunt();

        Form::CriaInputHidden($formulario, $res, []);

        return $formulario->finalizaForm(false, false);
    }

    public static function CadastrarContaBancaria($res)
    {
        $id = "CadastrarContaBancaria";

        $formulario = new Form($id, ADMIN . "/" . UrlAmigavel::$controller . "/" . UrlAmigavel::$action,
            "Cadastrar", 12);

        $label_options2 = array("<i class='fa fa-check fa-white'></i>", "<i class='fa fa-times fa-white'></i>", "verde", "vermelho");
        $formulario
            ->setLabel("Status")
            ->setId(ST_STATUS)
            ->setClasses('checked')
            ->setType(TiposCampoEnum::CHECKBOX)
            ->setTamanhoInput(3)
            ->setInfo('Conta Ativa?')
            ->setOptions($label_options2)
            ->CriaInpunt();

        $formulario
            ->setId(NO_BANCO)
            ->setTamanhoInput(9)
            ->setLabel("Banco")
            ->CriaInpunt();

        $formulario
            ->setId(NU_AGENCIA)
            ->setTamanhoInput(3)
            ->setClasses('numero')
            ->setLabel("Agência")
            ->setInfo('Somente números')
            ->CriaInpunt();

        $formulario
            ->setId(NU_CONTA)
            ->setTamanhoInput(6)
            ->setClasses('numero')
            ->setInfo('Somente números, com digito')
            ->setLabel("Conta")
            ->CriaInpunt();

        $formulario
            ->setId(NU_SALDO)
            ->setTamanhoInput(3)
            ->setClasses('moeda')
            ->setInfo('Saldo atual da Conta')
            ->setLabel("Saldo")
            ->CriaInpunt();

        $formulario
            ->setType(TiposCampoEnum::TEXTAREA)
            ->setId(DS_OBSERVACAO)
            ->setLabel("Observação")
            ->CriaInpunt();

        Form::CriaInputHidden($formulario, $res, [CO_CONTA_BANCARIA]);

        return $formulario->finalizaForm(false, false);
    }

    public static function Representacao($res)
    {
        $id = "Representacao";

        $formulario = new Form($id, ADMIN . "/" . UrlAmigavel::$controller . "/" . UrlAmigavel::$action,
            "Cadastrar", 12);


        $formulario
            ->setId(NO_REPRESENTACAO)
            ->setTamanhoInput(12)
            ->setInfo("Nome Cliente ou Fornecedor")
            ->setLabel("Nome")
            ->CriaInpunt();

        $formulario
            ->setId(DS_EMAIL)
            ->setIcon("fa-envelope fa")
            ->setClasses("email")
            ->setTamanhoInput(8)
            ->setLabel("Email")
            ->CriaInpunt();

        $formulario
            ->setId(NU_TEL1)
            ->setTamanhoInput(4)
            ->setIcon("fa fa-mobile-phone")
            ->setLabel("Telefone Celular")
            ->setInfo("Com <i class=\"fa fa-whatsapp\" style='color: green;'></i> WhatsApp")
            ->setClasses("tel")
            ->CriaInpunt();

        Form::CriaInputHidden($formulario, $res, [CO_REPRESENTACAO]);

        return $formulario->finalizaForm(false, false);
    }

    public static function CentroCustos($res)
    {
        $id = "CentroCustos";

        $formulario = new Form($id, ADMIN . "/" . UrlAmigavel::$controller . "/" . UrlAmigavel::$action,
            "Cadastrar", 12);


        $formulario
            ->setId(NO_CENTRO_CUSTOS)
            ->setTamanhoInput(12)
            ->setInfo("Nome (Filial / Setores / Projetos)")
            ->setLabel("Nome")
            ->CriaInpunt();

        Form::CriaInputHidden($formulario, $res, [CO_CENTRO_CUSTO]);

        return $formulario->finalizaForm(false, false);
    }

    public static function FCEntrada($res)
    {
        $id = "FCEntrada";

        $formulario = new Form($id, ADMIN . "/" . UrlAmigavel::$controller . "/" . UrlAmigavel::$action,
            "Salvar", 12);

        $tp_pag = [
            1 => 'Único',
            2 => 'Repetido',
            3 => 'Parcelado',
        ];
        $formulario
            ->setId('e-tp_lanc')
            ->setType(TiposCampoEnum::SELECT)
            ->setLabel("Tipo Lançamento")
            ->setTamanhoInput(4)
            ->setOptions($tp_pag)
            ->CriaInpunt();

        $options = [];
        $formulario
            ->setId(CO_CATEGORIA_FC)
            ->setType(TiposCampoEnum::SELECT)
            ->setLabel("Categoria")
            ->setTamanhoInput(8)
            ->setOptions($options)
            ->CriaInpunt();

        $formulario
            ->setId('e-nu_repetidos')
            ->setTamanhoInput(6)
            ->setClasses('numero')
            ->setValor(1)
            ->setLabel("Quantidade das Parcelas")
            ->CriaInpunt();

        $options2 = [
            30 => '30 Dias',
            45 => '45 Dias',
            60 => '60 Dias',
            90 => '90 Dias',
            15 => '15 Dias',
            10 => '10 Dias',
            5 => '5 Dias',
            2 => '2 Dias',
            1 => '1 Dias',
        ];
        $formulario
            ->setId('e-intervalo')
            ->setType(TiposCampoEnum::SELECT)
            ->setLabel("Intervalo das Parcelas")
            ->setTamanhoInput(6)
            ->setOptions($options2)
            ->CriaInpunt();

        $formulario
            ->setId(CO_REPRESENTACAO)
            ->setAutocomplete(
                RepresentacaoEntidade::TABELA,
                NO_REPRESENTACAO,
                RepresentacaoEntidade::CHAVE,
                'ASC',
                [CO_ASSINANTE => AssinanteService::getCoAssinanteLogado()]
            )
            ->setType(TiposCampoEnum::SELECT)
            ->setLabel("Cliente")
            ->setTamanhoInput(6)
            ->CriaInpunt();

        $options = ContaBancariaService::ContaBancariaCombo();
        $formulario
            ->setId(CO_CONTA_BANCARIA)
            ->setType(TiposCampoEnum::SELECT)
            ->setLabel("Conta")
            ->setTamanhoInput(6)
            ->setOptions($options)
            ->CriaInpunt();

        $tp_pagamentos = TipoPagamentoEnum::$descricao;
        unset($tp_pagamentos[0]);
        $formulario
            ->setId(TP_PAGAMENTO)
            ->setType(TiposCampoEnum::SELECT)
            ->setLabel("Forma de Pagamento")
            ->setTamanhoInput(4)
            ->setOptions($tp_pagamentos)
            ->CriaInpunt();

        $formulario
            ->setId('e-' . DT_VENCIMENTO)
            ->setTamanhoInput(4)
            ->setClasses('data')
            ->setLabel("Data A Receber")
            ->CriaInpunt();

        $formulario
            ->setId('e-' . DT_REALIZADO)
            ->setTamanhoInput(4)
            ->setClasses('data')
            ->setLabel("Data Paga")
            ->CriaInpunt();

        $formulario
            ->setId(CO_CENTRO_CUSTO)
            ->setAutocomplete(
                CentroCustoEntidade::TABELA,
                NO_CENTRO_CUSTOS,
                CentroCustoEntidade::CHAVE,
                'ASC',
                [CO_ASSINANTE => AssinanteService::getCoAssinanteLogado()]
            )
            ->setType(TiposCampoEnum::SELECT)
            ->setLabel("Centro de custo")
            ->setTamanhoInput(4)
            ->CriaInpunt();

        $formulario
            ->setId(NU_VALOR)
            ->setTamanhoInput(4)
            ->setClasses('moeda')
            ->setLabel("Valor a Receber")
            ->CriaInpunt();

        $formulario
            ->setId(NU_VALOR_PAGO)
            ->setTamanhoInput(4)
            ->setClasses('moeda')
            ->setLabel("Valor Pago")
            ->CriaInpunt();

        $formulario
            ->setType(TiposCampoEnum::TEXTAREA)
            ->setId(DS_DESCRICAO)
            ->setLabel("Descrição")
            ->CriaInpunt();

        Form::CriaInputHidden($formulario, $res, [CO_FLUXO_CAIXA]);

        return $formulario->finalizaForm(false, false);
    }

    public static function FCSaida($res)
    {
        $id = "FCSaida";

        $formulario = new Form($id, ADMIN . "/" . UrlAmigavel::$controller . "/" . UrlAmigavel::$action,
            "Salvar", 12);

        $tp_pag = [
            1 => 'Único',
            2 => 'Repetido',
            3 => 'Parcelado',
        ];
        $formulario
            ->setId('s-tp_lanc')
            ->setType(TiposCampoEnum::SELECT)
            ->setLabel("Tipo Lançamento")
            ->setTamanhoInput(4)
            ->setOptions($tp_pag)
            ->CriaInpunt();

        $options = [];
        $formulario
            ->setId(CO_CATEGORIA_FC)
            ->setType(TiposCampoEnum::SELECT)
            ->setLabel("Categoria")
            ->setTamanhoInput(8)
            ->setOptions($options)
            ->CriaInpunt();

        $formulario
            ->setId('s-nu_repetidos')
            ->setTamanhoInput(6)
            ->setClasses('numero ob')
            ->setValor(1)
            ->setLabel("Quantidade das Parcelas")
            ->CriaInpunt();

        $options2 = [
            30 => '30 Dias',
            45 => '45 Dias',
            60 => '60 Dias',
            90 => '90 Dias',
            15 => '15 Dias',
            10 => '10 Dias',
            5 => '5 Dias',
            2 => '2 Dias',
            1 => '1 Dias',
        ];
        $formulario
            ->setId('s-intervalo')
            ->setType(TiposCampoEnum::SELECT)
            ->setLabel("Intervalo das Parcelas")
            ->setTamanhoInput(6)
            ->setOptions($options2)
            ->CriaInpunt();

        $formulario
            ->setId(CO_REPRESENTACAO)
            ->setAutocomplete(
                RepresentacaoEntidade::TABELA,
                NO_REPRESENTACAO,
                RepresentacaoEntidade::CHAVE,
                'ASC',
                [CO_ASSINANTE => AssinanteService::getCoAssinanteLogado()]
            )
            ->setType(TiposCampoEnum::SELECT)
            ->setLabel("Fornecedor")
            ->setTamanhoInput(6)
            ->CriaInpunt();

        $options = ContaBancariaService::ContaBancariaCombo();
        $formulario
            ->setId(CO_CONTA_BANCARIA)
            ->setType(TiposCampoEnum::SELECT)
            ->setLabel("Conta")
            ->setTamanhoInput(6)
            ->setOptions($options)
            ->CriaInpunt();

        $tp_pagamentos = TipoPagamentoEnum::$descricao;
        unset($tp_pagamentos[0]);
        $formulario
            ->setId(TP_PAGAMENTO)
            ->setType(TiposCampoEnum::SELECT)
            ->setLabel("Forma de Pagamento")
            ->setTamanhoInput(4)
            ->setOptions($tp_pagamentos)
            ->CriaInpunt();

        $formulario
            ->setId('s-' . DT_VENCIMENTO)
            ->setTamanhoInput(4)
            ->setClasses('data')
            ->setLabel("Data A Pagar")
            ->CriaInpunt();

        $formulario
            ->setId('s-' . DT_REALIZADO)
            ->setTamanhoInput(4)
            ->setClasses('data')
            ->setLabel("Data Paga")
            ->CriaInpunt();

        $formulario
            ->setId(CO_CENTRO_CUSTO)
            ->setAutocomplete(
                CentroCustoEntidade::TABELA,
                NO_CENTRO_CUSTOS,
                CentroCustoEntidade::CHAVE,
                'ASC',
                [CO_ASSINANTE => AssinanteService::getCoAssinanteLogado()]
            )
            ->setType(TiposCampoEnum::SELECT)
            ->setLabel("Centro de custo")
            ->setTamanhoInput(4)
            ->CriaInpunt();

        $formulario
            ->setId(NU_VALOR)
            ->setTamanhoInput(4)
            ->setClasses('moeda')
            ->setLabel("Valor a Pagar")
            ->CriaInpunt();

        $formulario
            ->setId(NU_VALOR_PAGO)
            ->setTamanhoInput(4)
            ->setClasses('moeda')
            ->setLabel("Valor Pago")
            ->CriaInpunt();

        $formulario
            ->setType(TiposCampoEnum::TEXTAREA)
            ->setId(DS_DESCRICAO)
            ->setLabel("Descrição")
            ->CriaInpunt();

        Form::CriaInputHidden($formulario, $res, [CO_FLUXO_CAIXA]);

        return $formulario->finalizaForm(false, false);
    }


    public static function PesquisaLancamento($resultIntervalo)
    {
        $id = "PesquisaLancamento";

        $formulario = new Form($id, ADMIN . "/" . UrlAmigavel::$controller . "/" . UrlAmigavel::$action,
            "Pesquisar", 12);

        $options = CategoriaFcService::getComboTodasCategoriasFC();
        $formulario
            ->setId(CO_CATEGORIA_FC)
            ->setType(TiposCampoEnum::SELECT)
            ->setLabel("Categoria")
            ->setTamanhoInput(8)
            ->setOptions($options)
            ->CriaInpunt();

        $options3 = TipoFluxoCaixaEnum::$descricao;
        array_unshift($options3, Mensagens::MSG_SEM_ITEM_SELECIONADO);
        $formulario
            ->setId(TP_FLUXO)
            ->setType(TiposCampoEnum::SELECT)
            ->setLabel("Tipo de Lançamento")
            ->setTamanhoInput(4)
            ->setOptions($options3)
            ->CriaInpunt();

        $options = ContaBancariaService::ContaBancariaCombo();
        $formulario
            ->setId(CO_CONTA_BANCARIA)
            ->setType(TiposCampoEnum::SELECT)
            ->setLabel("Conta")
            ->setTamanhoInput(8)
            ->setOptions($options)
            ->CriaInpunt();

        $options2 = StatusPagamentoFCEnum::$descricao;
        array_unshift($options2, Mensagens::MSG_SEM_ITEM_SELECIONADO);
        $formulario
            ->setId(ST_PAGAMENTO)
            ->setType(TiposCampoEnum::SELECT)
            ->setLabel("Status Pag.")
            ->setTamanhoInput(4)
            ->setOptions($options2)
            ->CriaInpunt();

        $formulario
            ->setId(CO_REPRESENTACAO)
            ->setAutocomplete(
                RepresentacaoEntidade::TABELA,
                NO_REPRESENTACAO,
                RepresentacaoEntidade::CHAVE,
                'ASC',
                [CO_ASSINANTE => AssinanteService::getCoAssinanteLogado()]
            )
            ->setType(TiposCampoEnum::SELECT)
            ->setLabel("Credor")
            ->setTamanhoInput(4)
            ->CriaInpunt();

        $formulario
            ->setId(CO_CENTRO_CUSTO)
            ->setAutocomplete(
                CentroCustoEntidade::TABELA,
                NO_CENTRO_CUSTOS,
                CentroCustoEntidade::CHAVE,
                'ASC',
                [CO_ASSINANTE => AssinanteService::getCoAssinanteLogado()]
            )
            ->setType(TiposCampoEnum::SELECT)
            ->setLabel("Centro de Custo")
            ->setTamanhoInput(4)
            ->CriaInpunt();

        $tp_pagamentos = TipoPagamentoEnum::$descricao;
        $tp_pagamentos[0] = 'Todos';

        $formulario
            ->setId(TP_PAGAMENTO)
            ->setType(TiposCampoEnum::SELECT)
            ->setLabel("Forma de Pagamento")
            ->setTamanhoInput(4)
            ->setClasses("ob")
            ->setOptions($tp_pagamentos)
            ->CriaInpunt();

        $formulario
            ->setId(DT_CADASTRO . '_inicio')
            ->setIcon("clip-calendar-3")
            ->setTamanhoInput(3)
            ->setClasses("data dt1")
            ->setLabel("Lançado Inicío")
            ->CriaInpunt();

        $formulario
            ->setId(DT_CADASTRO . '_fim')
            ->setIcon("clip-calendar-3")
            ->setTamanhoInput(3)
            ->setClasses("data dt2")
            ->setLabel("Fim")
            ->CriaInpunt();

        $formulario
            ->setId(DT_REALIZADO . '_inicio')
            ->setIcon("clip-calendar-3")
            ->setTamanhoInput(3)
            ->setClasses("data dt1")
            ->setLabel("Pagamento Inicío")
            ->CriaInpunt();

        $formulario
            ->setId(DT_REALIZADO . '_fim')
            ->setIcon("clip-calendar-3")
            ->setTamanhoInput(3)
            ->setClasses("data dt2")
            ->setLabel("Fim")
            ->CriaInpunt();

        $formulario
            ->setId(DT_VENCIMENTO . '_inicio')
            ->setIcon("clip-calendar-3")
            ->setTamanhoInput(3)
            ->setClasses("data dt1")
            ->setLabel("Vencimento Inicío")
            ->CriaInpunt();

        $formulario
            ->setId(DT_VENCIMENTO . '_fim')
            ->setIcon("clip-calendar-3")
            ->setTamanhoInput(3)
            ->setClasses("data dt2")
            ->setLabel("Fim")
            ->CriaInpunt();

        $formulario
            ->setId(NU_VALOR_PAGO)
            ->setTamanhoInput(6)
            ->setIntervalo($resultIntervalo)
            ->setType(TiposCampoEnum::SLIDER)
            ->setLabel("Valor R$")
            ->CriaInpunt();

        return $formulario->finalizaForm(false, false);
    }


}