create table TB_ENDERECO
(
    co_endereco    int auto_increment primary key,
    ds_endereco    varchar(150) null,
    ds_complemento varchar(100) null,
    ds_bairro      varchar(80)  null,
    nu_cep         varchar(12)  null,
    no_cidade      varchar(80)  null,
    sg_uf          varchar(2)   null
);

INSERT INTO TB_ENDERECO (co_endereco, ds_endereco, ds_complemento, ds_bairro, nu_cep, no_cidade, sg_uf) VALUES (1, 'qr 10 casa 10', '', 'Samambaia', '72111111', 'Brasília', 'DF');
INSERT INTO TB_ENDERECO (co_endereco, ds_endereco, ds_complemento, ds_bairro, nu_cep, no_cidade, sg_uf) VALUES (2, 'Qr 403 10 28', '', 'Samambaia', '72111111', 'Brasília', 'DF');
INSERT INTO TB_ENDERECO (co_endereco, ds_endereco, ds_complemento, ds_bairro, nu_cep, no_cidade, sg_uf) VALUES (3, 'QR 403 Conjunto 10', '37', 'Samambaia Norte (Samambaia)', '72319111', 'Brasília', 'DF');