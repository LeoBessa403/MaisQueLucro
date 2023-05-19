create table TB_CENTRO_CUSTO
(
    co_centro_custo  int auto_increment,
    no_centro_custos varchar(80)  null,
    nu_codigo        int(6)       null,
    ds_descricao     varchar(150) null,
    co_assinante     int          not null,
    primary key (co_centro_custo, co_assinante)
);

