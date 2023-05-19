create table TB_PERFIL_FUNCIONALIDADE
(
    co_perfil_funcionalidade int auto_increment,
    co_funcionalidade        int not null,
    co_perfil                int not null,
    co_perfil_assinante      int not null,
    primary key (co_perfil_funcionalidade, co_funcionalidade, co_perfil, co_perfil_assinante)
);

INSERT INTO TB_PERFIL_FUNCIONALIDADE (co_perfil_funcionalidade, co_funcionalidade, co_perfil, co_perfil_assinante) VALUES (1, 1, 1, 1);
INSERT INTO TB_PERFIL_FUNCIONALIDADE (co_perfil_funcionalidade, co_funcionalidade, co_perfil, co_perfil_assinante) VALUES (2, 45, 2, 1);
INSERT INTO TB_PERFIL_FUNCIONALIDADE (co_perfil_funcionalidade, co_funcionalidade, co_perfil, co_perfil_assinante) VALUES (3, 44, 2, 1);
INSERT INTO TB_PERFIL_FUNCIONALIDADE (co_perfil_funcionalidade, co_funcionalidade, co_perfil, co_perfil_assinante) VALUES (4, 43, 2, 1);
INSERT INTO TB_PERFIL_FUNCIONALIDADE (co_perfil_funcionalidade, co_funcionalidade, co_perfil, co_perfil_assinante) VALUES (5, 42, 2, 1);
INSERT INTO TB_PERFIL_FUNCIONALIDADE (co_perfil_funcionalidade, co_funcionalidade, co_perfil, co_perfil_assinante) VALUES (6, 41, 2, 1);
INSERT INTO TB_PERFIL_FUNCIONALIDADE (co_perfil_funcionalidade, co_funcionalidade, co_perfil, co_perfil_assinante) VALUES (7, 40, 2, 1);
INSERT INTO TB_PERFIL_FUNCIONALIDADE (co_perfil_funcionalidade, co_funcionalidade, co_perfil, co_perfil_assinante) VALUES (8, 39, 2, 1);
INSERT INTO TB_PERFIL_FUNCIONALIDADE (co_perfil_funcionalidade, co_funcionalidade, co_perfil, co_perfil_assinante) VALUES (9, 37, 2, 1);
INSERT INTO TB_PERFIL_FUNCIONALIDADE (co_perfil_funcionalidade, co_funcionalidade, co_perfil, co_perfil_assinante) VALUES (10, 36, 2, 1);
INSERT INTO TB_PERFIL_FUNCIONALIDADE (co_perfil_funcionalidade, co_funcionalidade, co_perfil, co_perfil_assinante) VALUES (12, 34, 2, 1);
INSERT INTO TB_PERFIL_FUNCIONALIDADE (co_perfil_funcionalidade, co_funcionalidade, co_perfil, co_perfil_assinante) VALUES (13, 32, 2, 1);
INSERT INTO TB_PERFIL_FUNCIONALIDADE (co_perfil_funcionalidade, co_funcionalidade, co_perfil, co_perfil_assinante) VALUES (14, 31, 2, 1);
INSERT INTO TB_PERFIL_FUNCIONALIDADE (co_perfil_funcionalidade, co_funcionalidade, co_perfil, co_perfil_assinante) VALUES (15, 30, 2, 1);
INSERT INTO TB_PERFIL_FUNCIONALIDADE (co_perfil_funcionalidade, co_funcionalidade, co_perfil, co_perfil_assinante) VALUES (16, 11, 2, 1);
INSERT INTO TB_PERFIL_FUNCIONALIDADE (co_perfil_funcionalidade, co_funcionalidade, co_perfil, co_perfil_assinante) VALUES (17, 6, 2, 1);
INSERT INTO TB_PERFIL_FUNCIONALIDADE (co_perfil_funcionalidade, co_funcionalidade, co_perfil, co_perfil_assinante) VALUES (19, 35, 2, 1);
INSERT INTO TB_PERFIL_FUNCIONALIDADE (co_perfil_funcionalidade, co_funcionalidade, co_perfil, co_perfil_assinante) VALUES (20, 46, 2, 0);