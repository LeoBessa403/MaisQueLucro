create table TB_CONTATO
(
    co_contato   int auto_increment
        primary key,
    nu_tel1      varchar(15)  null,
    nu_tel2      varchar(15)  null,
    nu_tel3      varchar(15)  null,
    nu_tel_0800  varchar(30)  null,
    ds_email     varchar(150) null,
    ds_site      varchar(100) null,
    ds_facebook  varchar(90)  null,
    ds_twitter   varchar(90)  null,
    ds_instagram varchar(90)  null
);

INSERT INTO TB_CONTATO (co_contato, nu_tel1, nu_tel2, nu_tel3, nu_tel_0800, ds_email, ds_site, ds_facebook, ds_twitter, ds_instagram) VALUES (1, '61993274991', '6130826060', '', '', 'sistema@atacadaobessa.com.br', '', '', '', '');
INSERT INTO TB_CONTATO (co_contato, nu_tel1, nu_tel2, nu_tel3, nu_tel_0800, ds_email, ds_site, ds_facebook, ds_twitter, ds_instagram) VALUES (2, '61993274991', '6130826060', '', '', 'gestor@atacadaobessa.com.br', '', '', '', '');
INSERT INTO TB_CONTATO (co_contato, nu_tel1, nu_tel2, nu_tel3, nu_tel_0800, ds_email, ds_site, ds_facebook, ds_twitter, ds_instagram) VALUES (3, '61992931084', '', '', '', 'ramos.amaury96@gmail.com', null, null, null, 'loja.sangiuseppe');