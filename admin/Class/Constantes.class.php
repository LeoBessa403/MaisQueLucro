<?php

/**
 * Constantes.class [ HELPER ]
 * Classe responável por manipular e validade dados do sistema!
 *
 * @copyright (c) 2018, Leo Bessa
 */

// CONSTANTES
define('CO_AGENDA', 'co_agenda');
define('CO_STATUS_AGENDA', 'co_status_agenda');
define('DT_INICIO_AGENDA', 'dt_inicio_agenda');
define('DT_FIM_AGENDA', 'dt_fim_agenda');
define('CO_CLIENTE', 'co_cliente');
define('NO_APELIDO', 'no_apelido');
define('ST_RECEBER_EMAIL_AGENDAMENTO', 'st_receber_email_agendamento');
define('ST_LEMBRETE_HORARIO_AGENDAMENTO', 'st_lembrete_horario_agendamento');
define('ST_SMS_MARKETING', 'st_sms_marketing');
define('ST_EMAIL_MARKETING', 'st_email_marketing');
define('NU_COMO_CONHECEU', 'nu_como_conheceu');
define('CO_PROFISSIONAL', 'co_profissional');
define('DS_COR_AGENDA', 'ds_cor_agenda');
define('ST_ASSISTENTE', 'st_assistente');
define('DS_SOBRE', 'ds_sobre');
define('DS_MOTIVO', 'ds_motivo');
define('ST_AGENDA', 'st_agenda');
define('ST_AGENDA_ONLINE', 'st_agenda_online');
define('TP_CONTRATACAO', 'tp_contratacao');
define('DT_ADMISSAO', 'dt_admissao');
define('DT_DEMISSAO', 'dt_demissao');
define('CO_SERVICO', 'co_servico');
define('NO_SERVICO', 'no_servico');
define('NU_DURACAO', 'nu_duracao');
define('CO_BOTAO', 'co_botao');
define('NO_BOTAO', 'no_botao');
define('DS_BOTAO', 'ds_botao');
define('NU_TOTAL_CLIQUES', 'nu_total_cliques');
define('CO_CLIQUE', 'co_clique');
define('CO_CATEGORIA_FC', 'co_categoria_fc');
define('DS_TEXTO', 'ds_texto');
define('NU_CODIGO', 'nu_codigo');
define('CO_CATEGORIA_FC_FILHA', 'co_categoria_fc_filha');
define('CO_CATEGORIA_FC_NETA', 'co_categoria_fc_neta');
define('CO_CENTRO_CUSTO', 'co_centro_custo');
define('NO_CENTRO_CUSTOS', 'no_centro_custos');
define('CO_CONTA_BANCARIA', 'co_conta_bancaria');
define('NO_BANCO', 'no_banco');
define('NU_AGENCIA', 'nu_agencia');
define('NU_CONTA', 'nu_conta');
define('CO_FLUXO_CAIXA', 'co_fluxo_caixa');
define('DT_VENCIMENTO', 'dt_vencimento');
define('NU_VALOR_PAGO', 'nu_valor_pago');
define('TP_FLUXO', 'tp_fluxo');
define('CO_REPRESENTACAO', 'co_representacao');
define('CO_HIST_SALDO_CB', 'co_hist_saldo_cb');
define('NU_SALDO', 'nu_saldo');
define('CO_HIST_TRANSFERENCIA', 'co_hist_transferencia');
define('NU_SALDO_ORIGEM_ANT', 'nu_saldo_origem_ant');
define('NU_SALDO_ORIGEM_DEP', 'nu_saldo_origem_dep');
define('NU_SALDO_DESTINO_ANT', 'nu_saldo_destino_ant');
define('NU_SALDO_DESTINO_DEP', 'nu_saldo_destino_dep');
define('NU_VALOR_TRANSFERIDO', 'nu_valor_transferido');
define('CO_CONTA_BANCARIA_ORIGEM', 'co_conta_bancaria_origem');
define('CO_CONTA_BANCARIA_DESTINO', 'co_conta_bancaria_destino');
define('NO_REPRESENTACAO', 'no_representacao');
define('CO_PLANEJAMENTO_FINANCEIRO', 'co_planejamento_financeiro');
define('NU_ANO', 'nu_ano');



// SERVICES
define('AGENDA_SERVICE', 'AgendaService');
define('CLIENTE_SERVICE', 'ClienteService');
define('PROFISSIONAL_SERVICE', 'ProfissionalService');
define('SERVICO_SERVICE', 'ServicoService');
define('STATUS_AGENDA_SERVICE', 'StatusAgendaService');
define('BOTAO_SERVICE', 'BotaoService');
define('CLIQUE_SERVICE', 'CliqueService');
define('CATEGORIA_FC_SERVICE', 'CategoriaFcService');
define('CATEGORIA_FC_FILHA_SERVICE', 'CategoriaFcFilhaService');
define('CATEGORIA_FC_NETA_SERVICE', 'CategoriaFcNetaService');
define('CENTRO_CUSTO_SERVICE', 'CentroCustoService');
define('CONTA_BANCARIA_SERVICE', 'ContaBancariaService');
define('FLUXO_CAIXA_SERVICE', 'FluxoCaixaService');
define('HIST_SALDO_CB_SERVICE', 'HistSaldoCbService');
define('HIST_TRANSFERENCIA_SERVICE', 'HistTransferenciaService');
define('REPRESENTACAO_SERVICE', 'RepresentacaoService');
define('PLANEJAMENTO_FINANCEIRO_SERVICE', 'PlanejamentoFinanceiroService');
