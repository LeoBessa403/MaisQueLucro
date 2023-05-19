create table TB_PERFIL_ASSINANTE
(
    co_perfil_assinante int auto_increment,
    no_perfil           varchar(45) null,
    st_status           varchar(1)  null,
    co_assinante        int         not null,
    primary key (co_perfil_assinante, co_assinante)
);

