create table TB_USUARIO
(
    co_usuario     int(10) auto_increment,
    ds_senha       varchar(100)           not null,
    ds_code        varchar(50)            not null comment 'Senha criptografada',
    st_status      varchar(1) default 'I' not null comment '''A - Ativo / I - Inativo''',
    st_troca_senha varchar(1) default 'N' null,
    dt_cadastro    datetime               not null,
    co_imagem      int(10)                not null,
    co_pessoa      int                    not null,
    co_assinante   int                    not null,
    primary key (co_usuario, co_imagem, co_pessoa, co_assinante)
);

INSERT INTO TB_USUARIO (co_usuario, ds_senha, ds_code, st_status, st_troca_senha, dt_cadastro, co_imagem, co_pessoa, co_assinante) VALUES (1, '123456**', 'TVRJek5EVTJLaW89', 'A', 'S', '2016-10-31 00:00:00', 1, 1, 0);
INSERT INTO TB_USUARIO (co_usuario, ds_senha, ds_code, st_status, st_troca_senha, dt_cadastro, co_imagem, co_pessoa, co_assinante) VALUES (2, '123456**', 'TVRJek5EVTJLaW89', 'A', 'S', '2016-10-31 00:00:00', 2, 2, 1);
INSERT INTO TB_USUARIO (co_usuario, ds_senha, ds_code, st_status, st_troca_senha, dt_cadastro, co_imagem, co_pessoa, co_assinante) VALUES (3, '123456**', 'TVRJek5EVTJLaW89', 'A', 'S', '2023-04-26 10:57:31', 3, 3, 2);