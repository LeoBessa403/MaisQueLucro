<?php

/**
 * Relacionamentos.class [ RELACIONAMENTOS DO BANCO ]
 * @copyright (c) 2018, Leo Bessa
 */

class Relacionamentos
{

    public static function getRelacionamentos()
    {
        return array(
            (AssinanteEntidade::TABELA) => array(
                (CO_PLANO_ASSINANTE_ASSINATURA) => array(
                    ('Campo') => CO_ASSINANTE,
                    ('Entidade') => 'PlanoAssinanteAssinaturaEntidade',
                    ('Tipo') => '2',
                ),
                (CO_EMPRESA) => array(
                    ('Campo') => CO_EMPRESA,
                    ('Entidade') => 'EmpresaEntidade',
                    ('Tipo') => '1',
                ),
                (CO_PESSOA) => array(
                    ('Campo') => CO_PESSOA,
                    ('Entidade') => 'PessoaEntidade',
                    ('Tipo') => '1',
                ),
                (CO_IMAGEM_ASSINANTE) => array(
                    ('Campo') => CO_ASSINANTE,
                    ('Entidade') => 'ImagemAssinanteEntidade',
                    ('Tipo') => '2',
                ),
//                (CO_CATEGORIA_FC) => array(
//                    ('Campo') => CO_ASSINANTE,
//                    ('Entidade') => 'CategoriaFcEntidade',
//                    ('Tipo') => '1',
//                ),
//                (CO_CATEGORIA_FC_FILHA) => array(
//                    ('Campo') => CO_ASSINANTE,
//                    ('Entidade') => 'CategoriaFcFilhaEntidade',
//                    ('Tipo') => '1',
//                ),
//                (CO_CATEGORIA_FC_NETA) => array(
//                    ('Campo') => CO_ASSINANTE,
//                    ('Entidade') => 'CategoriaFcNetaEntidade',
//                    ('Tipo') => '1',
//                ),
//                (CO_CENTRO_CUSTO) => array(
//                    ('Campo') => CO_ASSINANTE,
//                    ('Entidade') => 'CentroCustoEntidade',
//                    ('Tipo') => '1',
//                ),
//                (CO_CONTA_BANCARIA) => array(
//                    ('Campo') => CO_ASSINANTE,
//                    ('Entidade') => 'ContaBancariaEntidade',
//                    ('Tipo') => '1',
//                ),
//                (CO_FLUXO_CAIXA) => array(
//                    ('Campo') => CO_ASSINANTE,
//                    ('Entidade') => 'FluxocaixaEntidade',
//                    ('Tipo') => '1',
//                ),
//                (CO_REPRESENTACAO) => array(
//                    ('Campo') => CO_ASSINANTE,
//                    ('Entidade') => 'RepresentacaoEntidade',
//                    ('Tipo') => '1',
//                ),
            ),
            (EmpresaEntidade::TABELA) => array(
                (CO_ASSINANTE) => array(
                    ('Campo') => CO_EMPRESA,
                    ('Entidade') => 'AssinanteEntidade',
                    ('Tipo') => '1',
                ),
            ),
            (AcessoEntidade::TABELA) => array(
                (CO_USUARIO) => array(
                    ('Campo') => CO_USUARIO,
                    ('Entidade') => 'UsuarioEntidade',
                    ('Tipo') => '1',
                ),
                (CO_TRAFEGO) => array(
                    ('Campo') => CO_TRAFEGO,
                    ('Entidade') => 'TrafegoEntidade',
                    ('Tipo') => '1',
                ),
            ),
            (UsuarioEntidade::TABELA) => array(
                (CO_ACESSO) => array(
                    ('Campo') => CO_USUARIO,
                    ('Entidade') => 'AcessoEntidade',
                    ('Tipo') => '2',
                ),
                (CO_AUDITORIA) => array(
                    ('Campo') => CO_USUARIO,
                    ('Entidade') => 'AuditoriaEntidade',
                    ('Tipo') => '2',
                ),
                (CO_IMAGEM) => array(
                    ('Campo') => CO_IMAGEM,
                    ('Entidade') => 'ImagemEntidade',
                    ('Tipo') => '1',
                ),
                (CO_PESSOA) => array(
                    ('Campo') => CO_PESSOA,
                    ('Entidade') => 'PessoaEntidade',
                    ('Tipo') => '1',
                ),
                (CO_USUARIO_PERFIL) => array(
                    ('Campo') => CO_USUARIO,
                    ('Entidade') => 'UsuarioPerfilEntidade',
                    ('Tipo') => '2',
                ),
            ),
            (FuncionalidadeEntidade::TABELA) => array(
                (CO_PERFIL_FUNCIONALIDADE) => array(
                    ('Campo') => CO_FUNCIONALIDADE,
                    ('Entidade') => 'PerfilFuncionalidadeEntidade',
                    ('Tipo') => '2',
                ),
                (CO_CONTROLLER) => array(
                    ('Campo') => CO_CONTROLLER,
                    ('Entidade') => 'ControllerEntidade',
                    ('Tipo') => '1',
                ),
            ),
            (AuditoriaEntidade::TABELA) => array(
                (CO_USUARIO) => array(
                    ('Campo') => CO_USUARIO,
                    ('Entidade') => 'UsuarioEntidade',
                    ('Tipo') => '1',
                ),
                (CO_AUDITORIA_TABELA) => array(
                    ('Campo') => CO_AUDITORIA,
                    ('Entidade') => 'AuditoriaTabelaEntidade',
                    ('Tipo') => '2',
                ),
            ),
            (AuditoriaItensEntidade::TABELA) => array(
                (CO_AUDITORIA_TABELA) => array(
                    ('Campo') => CO_AUDITORIA_TABELA,
                    ('Entidade') => 'AuditoriaTabelaEntidade',
                    ('Tipo') => '1',
                ),
            ),
            (AuditoriaTabelaEntidade::TABELA) => array(
                (CO_AUDITORIA_ITENS) => array(
                    ('Campo') => CO_AUDITORIA_TABELA,
                    ('Entidade') => 'AuditoriaItensEntidade',
                    ('Tipo') => '2',
                ),
                (CO_AUDITORIA) => array(
                    ('Campo') => CO_AUDITORIA,
                    ('Entidade') => 'AuditoriaEntidade',
                    ('Tipo') => '1',
                ),
            ),
            (PessoaEntidade::TABELA) => array(
                (CO_ENDERECO) => array(
                    ('Campo') => CO_ENDERECO,
                    ('Entidade') => 'EnderecoEntidade',
                    ('Tipo') => '1',
                ),
                (CO_CONTATO) => array(
                    ('Campo') => CO_CONTATO,
                    ('Entidade') => 'ContatoEntidade',
                    ('Tipo') => '1',
                ),
                (CO_IMAGEM) => array(
                    ('Campo') => CO_IMAGEM,
                    ('Entidade') => 'ImagemEntidade',
                    ('Tipo') => '1',
                ),
                (CO_USUARIO) => array(
                    ('Campo') => CO_PESSOA,
                    ('Entidade') => 'UsuarioEntidade',
                    ('Tipo') => '1',
                ),
                (CO_ASSINANTE) => array(
                    ('Campo') => CO_PESSOA,
                    ('Entidade') => 'AssinanteEntidade',
                    ('Tipo') => '1',
                ),
            ),
            (ContatoEntidade::TABELA) => array(
                (CO_PESSOA) => array(
                    ('Campo') => CO_CONTATO,
                    ('Entidade') => 'PessoaEntidade',
                    ('Tipo') => '1',
                ),
            ),
            (EnderecoEntidade::TABELA) => array(
                (CO_PESSOA) => array(
                    ('Campo') => CO_ENDERECO,
                    ('Entidade') => 'PessoaEntidade',
                    ('Tipo') => '1',
                ),
            ),
            (ImagemEntidade::TABELA) => array(),
            (PerfilFuncionalidadeEntidade::TABELA) => array(
                (CO_PERFIL) => array(
                    ('Campo') => CO_PERFIL,
                    ('Entidade') => 'PerfilEntidade',
                    ('Tipo') => '1',
                ),
                (CO_FUNCIONALIDADE) => array(
                    ('Campo') => CO_FUNCIONALIDADE,
                    ('Entidade') => 'FuncionalidadeEntidade',
                    ('Tipo') => '1',
                ),
            ),
            (PerfilEntidade::TABELA) => array(
                (CO_PERFIL_FUNCIONALIDADE) => array(
                    ('Campo') => CO_PERFIL,
                    ('Entidade') => 'PerfilFuncionalidadeEntidade',
                    ('Tipo') => '2',
                ),
                (CO_USUARIO_PERFIL) => array(
                    ('Campo') => CO_PERFIL,
                    ('Entidade') => 'UsuarioPerfilEntidade',
                    ('Tipo') => '2',
                ),
            ),
            (UsuarioPerfilEntidade::TABELA) => array(
                (CO_USUARIO) => array(
                    ('Campo') => CO_USUARIO,
                    ('Entidade') => 'UsuarioEntidade',
                    ('Tipo') => '1',
                ),
                (CO_PERFIL) => array(
                    ('Campo') => CO_PERFIL,
                    ('Entidade') => 'PerfilEntidade',
                    ('Tipo') => '1',
                ),
            ),
            (VisitaEntidade::TABELA) => array(
                (CO_TRAFEGO) => array(
                    ('Campo') => CO_TRAFEGO,
                    ('Entidade') => 'TrafegoEntidade',
                    ('Tipo') => '1',
                ),
                (CO_PAGINA_VISITA) => array(
                    ('Campo') => CO_VISITA,
                    ('Entidade') => 'PaginaVisitaEntidade',
                    ('Tipo') => '2',
                ),
            ),
            (PaginaEntidade::TABELA) => array(
                (CO_PAGINA_VISITA) => array(
                    ('Campo') => CO_PAGINA,
                    ('Entidade') => 'PaginaVisitaEntidade',
                    ('Tipo') => '2',
                ),
            ),
            (PaginaVisitaEntidade::TABELA) => array(
                (CO_PAGINA) => array(
                    ('Campo') => CO_PAGINA,
                    ('Entidade') => 'PaginaEntidade',
                    ('Tipo') => '1',
                ),
                (CO_VISITA) => array(
                    ('Campo') => CO_VISITA,
                    ('Entidade') => 'VisitaEntidade',
                    ('Tipo') => '1',
                ),
            ),
            (AnotacaoEntidade::TABELA) => array(
                (CO_HISTORIA) => array(
                    ('Campo') => CO_HISTORIA,
                    ('Entidade') => 'HistoriaEntidade',
                    ('Tipo') => '1',
                ),
            ),
            (HistoricoHistoriaEntidade::TABELA) => array(
                (CO_HISTORIA) => array(
                    ('Campo') => CO_HISTORIA,
                    ('Entidade') => 'HistoriaEntidade',
                    ('Tipo') => '1',
                ),
            ),
            (HistoriaEntidade::TABELA) => array(
                (CO_ANOTACAO) => array(
                    ('Campo') => CO_HISTORIA,
                    ('Entidade') => 'AnotacaoEntidade',
                    ('Tipo') => '2',
                ),
                (CO_SESSAO) => array(
                    ('Campo') => CO_SESSAO,
                    ('Entidade') => 'SessaoEntidade',
                    ('Tipo') => '1',
                ),
                (CO_HISTORICO_HISTORIA) => array(
                    ('Campo') => CO_HISTORIA,
                    ('Entidade') => 'HistoricoHistoriaEntidade',
                    ('Tipo') => '2',
                ),
            ),
            (SessaoEntidade::TABELA) => array(
                (CO_HISTORIA) => array(
                    ('Campo') => CO_SESSAO,
                    ('Entidade') => 'HistoriaEntidade',
                    ('Tipo') => '2',
                ),
                (CO_MODULO) => array(
                    ('Campo') => CO_MODULO,
                    ('Entidade') => 'ModuloEntidade',
                    ('Tipo') => '1',
                ),
            ),
            (ModuloEntidade::TABELA) => array(
                (CO_PROJETO) => array(
                    ('Campo') => CO_PROJETO,
                    ('Entidade') => 'ProjetoEntidade',
                    ('Tipo') => '1',
                ),
                (CO_SESSAO) => array(
                    ('Campo') => CO_MODULO,
                    ('Entidade') => 'SessaoEntidade',
                    ('Tipo') => '2',
                ),
            ),
            (ProjetoEntidade::TABELA) => array(
                (CO_MODULO) => array(
                    ('Campo') => CO_PROJETO,
                    ('Entidade') => 'ModuloEntidade',
                    ('Tipo') => '2',
                ),
            ),
            (TrafegoEntidade::TABELA) => array(),
            (PlanoPacoteEntidade::TABELA) => array(
                (CO_PLANO) => array(
                    ('Campo') => CO_PLANO,
                    ('Entidade') => 'PlanoEntidade',
                    ('Tipo') => '1',
                ),
                (CO_PACOTE) => array(
                    ('Campo') => CO_PACOTE,
                    ('Entidade') => 'PacoteEntidade',
                    ('Tipo') => '1',
                ),
            ),
            (PlanoEntidade::TABELA) => array(
                (CO_PLANO_PACOTE) => array(
                    ('Campo') => CO_PLANO,
                    ('Entidade') => 'PlanoPacoteEntidade',
                    ('Tipo') => '2',
                ),
                (CO_PLANO_ASSINANTE) => array(
                    ('Campo') => CO_PLANO,
                    ('Entidade') => 'PlanoAssinanteEntidade',
                    ('Tipo') => '2',
                ),
            ),
            (ControllerEntidade::TABELA) => array(
                (CO_FUNCIONALIDADE) => array(
                    ('Campo') => CO_CONTROLLER,
                    ('Entidade') => 'FuncionalidadeEntidade',
                    ('Tipo') => '2',
                ),
            ),
            (PacoteEntidade::TABELA) => array(
                (CO_PLANO_PACOTE) => array(
                    ('Campo') => CO_PACOTE,
                    ('Entidade') => 'PlanoPacoteEntidade',
                    ('Tipo') => '2',
                ),
            ),
            (PlanoAssinanteEntidade::TABELA) => array(
                (CO_PLANO) => array(
                    ('Campo') => CO_PLANO,
                    ('Entidade') => 'PlanoEntidade',
                    ('Tipo') => '1',
                ),
                (CO_PLANO_ASSINANTE_ASSINATURA) => array(
                    ('Campo') => CO_PLANO_ASSINANTE,
                    ('Entidade') => 'PlanoAssinanteAssinaturaEntidade',
                    ('Tipo') => '2',
                ),
            ),
            (PlanoAssinanteAssinaturaEntidade::TABELA) => array(
                (CO_ASSINANTE) => array(
                    ('Campo') => CO_ASSINANTE,
                    ('Entidade') => 'AssinanteEntidade',
                    ('Tipo') => '1',
                ),
                (CO_PLANO_ASSINANTE) => array(
                    ('Campo') => CO_PLANO_ASSINANTE,
                    ('Entidade') => 'PlanoAssinanteEntidade',
                    ('Tipo') => '1',
                ),
                (CO_HISTORICO_PAG_ASSINATURA) => array(
                    ('Campo') => CO_PLANO_ASSINANTE_ASSINATURA,
                    ('Entidade') => 'HistoricoPagAssinaturaEntidade',
                    ('Tipo') => '2',
                ),
            ),
            (ImagemAssinanteEntidade::TABELA) => array(
                (CO_ASSINANTE) => array(
                    ('Campo') => CO_ASSINANTE,
                    ('Entidade') => 'AssinanteEntidade',
                    ('Tipo') => '1',
                ),
                (CO_IMAGEM) => array(
                    ('Campo') => CO_IMAGEM,
                    ('Entidade') => 'ImagemEntidade',
                    ('Tipo') => '1',
                ),
            ),
            (AgendaEntidade::TABELA) => array(
                (CO_ASSINANTE) => array(
                    ('Campo') => CO_ASSINANTE,
                    ('Entidade') => 'AssinanteEntidade',
                    ('Tipo') => '1',
                ),
                (CO_STATUS_AGENDA) => array(
                    ('Campo') => CO_AGENDA,
                    ('Entidade') => 'StatusAgendaEntidade',
                    ('Tipo') => '2',
                ),
            ),
            (StatusAgendaEntidade::TABELA) => array(
                (CO_AGENDA) => array(
                    ('Campo') => CO_AGENDA,
                    ('Entidade') => 'AgendaEntidade',
                    ('Tipo') => '1',
                ),
                (CO_USUARIO) => array(
                    ('Campo') => CO_USUARIO,
                    ('Entidade') => 'UsuarioEntidade',
                    ('Tipo') => '1',
                ),
            ),
            (ClienteEntidade::TABELA) => array(
                (CO_PESSOA) => array(
                    ('Campo') => CO_PESSOA,
                    ('Entidade') => 'PessoaEntidade',
                    ('Tipo') => '1',
                ),
                (CO_ASSINANTE) => array(
                    ('Campo') => CO_ASSINANTE,
                    ('Entidade') => 'AssinanteEntidade',
                    ('Tipo') => '1',
                ),
            ),
            (ProfissionalEntidade::TABELA) => array(
                (CO_PESSOA) => array(
                    ('Campo') => CO_PESSOA,
                    ('Entidade') => 'PessoaEntidade',
                    ('Tipo') => '1',
                ),
                (CO_ASSINANTE) => array(
                    ('Campo') => CO_ASSINANTE,
                    ('Entidade') => 'AssinanteEntidade',
                    ('Tipo') => '1',
                ),
                (CO_IMAGEM) => array(
                    ('Campo') => CO_IMAGEM,
                    ('Entidade') => 'ImagemEntidade',
                    ('Tipo') => '1',
                ),
            ),
            (ServicoEntidade::TABELA) => array(
                (CO_ASSINANTE) => array(
                    ('Campo') => CO_ASSINANTE,
                    ('Entidade') => 'AssinanteEntidade',
                    ('Tipo') => '1',
                ),
            ),
            (SuporteEntidade::TABELA) => array(
                (CO_ASSINANTE) => array(
                    ('Campo') => CO_ASSINANTE,
                    ('Entidade') => 'AssinanteEntidade',
                    ('Tipo') => '1',
                ),
                (CO_HISTORICO_SUPORTE) => array(
                    ('Campo') => CO_SUPORTE,
                    ('Entidade') => 'HistoricoSuporteEntidade',
                    ('Tipo') => '2',
                ),
            ),
            (HistoricoSuporteEntidade::TABELA) => array(
                (CO_SUPORTE) => array(
                    ('Campo') => CO_SUPORTE,
                    ('Entidade') => 'SuporteEntidade',
                    ('Tipo') => '1',
                ),
                (CO_USUARIO) => array(
                    ('Campo') => CO_USUARIO,
                    ('Entidade') => 'UsuarioEntidade',
                    ('Tipo') => '1',
                ),
                (CO_IMAGEM) => array(
                    ('Campo') => CO_IMAGEM,
                    ('Entidade') => 'ImagemEntidade',
                    ('Tipo') => '1',
                ),
            ),
            (HistoricoPagAssinaturaEntidade::TABELA) => array(
                (CO_PLANO_ASSINANTE_ASSINATURA) => array(
                    ('Campo') => CO_PLANO_ASSINANTE_ASSINATURA,
                    ('Entidade') => 'PlanoAssinanteAssinaturaEntidade',
                    ('Tipo') => '1',
                ),
            ),
            (CliqueEntidade::TABELA) => array(
                (CO_BOTAO) => array(
                    ('Campo') => CO_BOTAO,
                    ('Entidade') => 'BotaoEntidade',
                    ('Tipo') => '1',
                ),
            ),
            (BotaoEntidade::TABELA) => array(
                (CO_CLIQUE) => array(
                    ('Campo') => CO_BOTAO,
                    ('Entidade') => 'CliqueEntidade',
                    ('Tipo') => '2',
                ),
            ),
            (CategoriaFcEntidade::TABELA) => array(
                (CO_ASSINANTE) => array(
                    ('Campo') => CO_ASSINANTE,
                    ('Entidade') => 'AssinanteEntidade',
                    ('Tipo') => '1',
                ),
                (CO_CATEGORIA_FC_FILHA) => array(
                    ('Campo') => CO_CATEGORIA_FC,
                    ('Entidade') => 'CategoriaFcFilhaEntidade',
                    ('Tipo') => '1',
                ),
                (CO_FLUXO_CAIXA) => array(
                    ('Campo') => CO_CATEGORIA_FC,
                    ('Entidade') => 'FluxocaixaEntidade',
                    ('Tipo') => '1',
                ),
            ),
            (CategoriaFcFilhaEntidade::TABELA) => array(
                (CO_CATEGORIA_FC) => array(
                    ('Campo') => CO_CATEGORIA_FC,
                    ('Entidade') => 'CategoriaFcEntidade',
                    ('Tipo') => '1',
                ),
                (CO_ASSINANTE) => array(
                    ('Campo') => CO_ASSINANTE,
                    ('Entidade') => 'AssinanteEntidade',
                    ('Tipo') => '1',
                ),
                (CO_CATEGORIA_FC_NETA) => array(
                    ('Campo') => CO_CATEGORIA_FC_FILHA,
                    ('Entidade') => 'CategoriaFcNetaEntidade',
                    ('Tipo') => '2',
                ),
                (CO_FLUXO_CAIXA) => array(
                    ('Campo') => CO_CATEGORIA_FC_FILHA,
                    ('Entidade') => 'FluxocaixaEntidade',
                    ('Tipo') => '2',
                ),
            ),
            (CategoriaFcNetaEntidade::TABELA) => array(
                (CO_CATEGORIA_FC_FILHA) => array(
                    ('Campo') => CO_CATEGORIA_FC_FILHA,
                    ('Entidade') => 'CategoriaFcFilhaEntidade',
                    ('Tipo') => '1',
                ),
                (CO_ASSINANTE) => array(
                    ('Campo') => CO_ASSINANTE,
                    ('Entidade') => 'AssinanteEntidade',
                    ('Tipo') => '1',
                ),
                (CO_FLUXO_CAIXA) => array(
                    ('Campo') => CO_CATEGORIA_FC_NETA,
                    ('Entidade') => 'FluxocaixaEntidade',
                    ('Tipo') => '2',
                ),
            ),
            (CentroCustoEntidade::TABELA) => array(
                (CO_ASSINANTE) => array(
                    ('Campo') => CO_ASSINANTE,
                    ('Entidade') => 'AssinanteEntidade',
                    ('Tipo') => '1',
                ),
                (CO_FLUXO_CAIXA) => array(
                    ('Campo') => CO_CENTRO_CUSTO,
                    ('Entidade') => 'FluxocaixaEntidade',
                    ('Tipo') => '2',
                ),
            ),
            (ContaBancariaEntidade::TABELA) => array(
                (CO_ASSINANTE) => array(
                    ('Campo') => CO_ASSINANTE,
                    ('Entidade') => 'AssinanteEntidade',
                    ('Tipo') => '1',
                ),
                (CO_FLUXO_CAIXA) => array(
                    ('Campo') => CO_CONTA_BANCARIA,
                    ('Entidade') => 'FluxocaixaEntidade',
                    ('Tipo') => '2',
                ),
                (CO_HIST_SALDO_CB) => array(
                    ('Campo') => CO_CONTA_BANCARIA,
                    ('Entidade') => 'HistSaldoCbEntidade',
                    ('Tipo') => '2',
                ),
            ),
            (FluxocaixaEntidade::TABELA) => array(
                (CO_CATEGORIA_FC) => array(
                    ('Campo') => CO_CATEGORIA_FC,
                    ('Entidade') => 'CategoriaFcEntidade',
                    ('Tipo') => '1',
                ),
                (CO_CATEGORIA_FC_FILHA) => array(
                    ('Campo') => CO_CATEGORIA_FC_FILHA,
                    ('Entidade') => 'CategoriaFcFilhaEntidade',
                    ('Tipo') => '1',
                ),
                (CO_CATEGORIA_FC_NETA) => array(
                    ('Campo') => CO_CATEGORIA_FC_NETA,
                    ('Entidade') => 'CategoriaFcNetaEntidade',
                    ('Tipo') => '1',
                ),
                (CO_CENTRO_CUSTO) => array(
                    ('Campo') => CO_CENTRO_CUSTO,
                    ('Entidade') => 'CentroCustoEntidade',
                    ('Tipo') => '1',
                ),
                (CO_CONTA_BANCARIA) => array(
                    ('Campo') => CO_CONTA_BANCARIA,
                    ('Entidade') => 'ContaBancariaEntidade',
                    ('Tipo') => '1',
                ),
                (CO_REPRESENTACAO) => array(
                    ('Campo') => CO_REPRESENTACAO,
                    ('Entidade') => 'RepresentacaoEntidade',
                    ('Tipo') => '1',
                ),
                (CO_USUARIO) => array(
                    ('Campo') => CO_USUARIO,
                    ('Entidade') => 'UsuarioEntidade',
                    ('Tipo') => '1',
                ),
                (CO_ASSINANTE) => array(
                    ('Campo') => CO_ASSINANTE,
                    ('Entidade') => 'AssinanteEntidade',
                    ('Tipo') => '1',
                ),
            ),
            (RepresentacaoEntidade::TABELA) => array(
                (CO_FLUXO_CAIXA) => array(
                    ('Campo') => CO_REPRESENTACAO,
                    ('Entidade') => 'FluxocaixaEntidade',
                    ('Tipo') => '2',
                ),
                (CO_ASSINANTE) => array(
                    ('Campo') => CO_ASSINANTE,
                    ('Entidade') => 'AssinanteEntidade',
                    ('Tipo') => '1',
                ),
            ),
            (HistSaldoCbEntidade::TABELA) => array(
                (CO_CONTA_BANCARIA) => array(
                    ('Campo') => CO_CONTA_BANCARIA,
                    ('Entidade') => 'ContaBancariaEntidade',
                    ('Tipo') => '1',
                ),
                (CO_USUARIO) => array(
                    ('Campo') => CO_USUARIO,
                    ('Entidade') => 'UsuarioEntidade',
                    ('Tipo') => '1',
                ),
            ),
            (HistTransferenciaEntidade::TABELA) => array(
                (CO_CONTA_BANCARIA_ORIGEM) => array(
                    ('Campo') => CO_CONTA_BANCARIA_ORIGEM,
                    ('Entidade') => 'ContaBancariaEntidade',
                    ('Tipo') => '1',
                ),
                (CO_CONTA_BANCARIA_DESTINO) => array(
                    ('Campo') => CO_CONTA_BANCARIA_DESTINO,
                    ('Entidade') => 'ContaBancariaEntidade',
                    ('Tipo') => '1',
                ),
                (CO_USUARIO) => array(
                    ('Campo') => CO_USUARIO,
                    ('Entidade') => 'UsuarioEntidade',
                    ('Tipo') => '1',
                ),
            ),
            (ContaBancariaEntidade::TABELA) => array(
                (CO_HIST_SALDO_CB) => array(
                    ('Campo') => CO_CONTA_BANCARIA,
                    ('Entidade') => 'HistSaldoCbEntidade',
                    ('Tipo') => '2',
                ),
                (CO_CONTA_BANCARIA_DESTINO) => array(
                    ('Campo') => CO_CONTA_BANCARIA_DESTINO,
                    ('Entidade') => 'HistTransferenciaEntidade',
                    ('Tipo') => '2',
                ),
                (CO_CONTA_BANCARIA_ORIGEM) => array(
                    ('Campo') => CO_CONTA_BANCARIA_ORIGEM,
                    ('Entidade') => 'HistTransferenciaEntidade',
                    ('Tipo') => '2',
                ),
                (CO_ASSINANTE) => array(
                    ('Campo') => CO_ASSINANTE,
                    ('Entidade') => 'AssinanteEntidade',
                    ('Tipo') => '1',
                ),
            ),
        );
    }
}
