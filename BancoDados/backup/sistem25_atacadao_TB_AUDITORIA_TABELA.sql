create table TB_AUDITORIA_TABELA
(
    co_auditoria_tabela int auto_increment,
    no_tabela           varchar(45) null,
    tp_operacao         varchar(1)  null,
    co_registro         int         null,
    co_auditoria        int         not null,
    primary key (co_auditoria_tabela, co_auditoria)
);
