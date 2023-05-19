create table TB_AUDITORIA_ITENS
(
    co_auditoria_itens  int auto_increment,
    ds_item_anterior    varchar(255) null,
    ds_item_atual       varchar(255) null,
    ds_campo            varchar(120) null,
    co_auditoria_tabela int          not null,
    primary key (co_auditoria_itens, co_auditoria_tabela)
);
