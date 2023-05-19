create table TB_PERFIL
(
    co_perfil int auto_increment
        primary key,
    no_perfil varchar(45) charset latin1            not null comment 'Nome do Perfil',
    st_status varchar(1) charset latin1 default 'A' not null comment '''A - Ativo / I - Inativo'''
);

INSERT INTO TB_PERFIL (co_perfil, no_perfil, st_status) VALUES (1, 'Master', 'A');
INSERT INTO TB_PERFIL (co_perfil, no_perfil, st_status) VALUES (2, 'Gestor', 'A');