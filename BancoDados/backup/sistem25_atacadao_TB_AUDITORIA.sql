create table TB_AUDITORIA
(
    co_auditoria      int auto_increment,
    dt_realizado      datetime null,
    ds_perfil_usuario text     null,
    co_usuario        int(10)  not null,
    primary key (co_auditoria, co_usuario)
);
