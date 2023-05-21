create table TB_USUARIO_PERFIL
(
    co_usuario_perfil   int auto_increment,
    co_usuario          int(10) not null,
    co_perfil           int     not null,
    co_perfil_assinante int(10) not null,
    primary key (co_usuario_perfil, co_usuario, co_perfil, co_perfil_assinante)
);

INSERT INTO TB_USUARIO_PERFIL (co_usuario_perfil, co_usuario, co_perfil, co_perfil_assinante) VALUES (1, 1, 1, 1);
INSERT INTO TB_USUARIO_PERFIL (co_usuario_perfil, co_usuario, co_perfil, co_perfil_assinante) VALUES (2, 2, 2, 1);
INSERT INTO TB_USUARIO_PERFIL (co_usuario_perfil, co_usuario, co_perfil, co_perfil_assinante) VALUES (3, 3, 2, 1);