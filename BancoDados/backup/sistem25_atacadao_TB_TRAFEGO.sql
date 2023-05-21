create table TB_TRAFEGO
(
    co_trafego             int auto_increment
        primary key,
    nu_ip                  varchar(20)  null,
    ds_pais                varchar(100) null,
    ds_code_pais           varchar(100) null,
    ds_uf                  varchar(45)  null,
    ds_estado              varchar(100) null,
    ds_cidade              varchar(120) null,
    ds_navegador           varchar(45)  null,
    ds_sistema_operacional varchar(45)  null,
    ds_dispositivo         varchar(45)  null,
    ds_agente              varchar(255) null
);

