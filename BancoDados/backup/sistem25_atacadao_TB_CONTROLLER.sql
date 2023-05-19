create table TB_CONTROLLER
(
    co_controller int auto_increment
        primary key,
    no_controller varchar(60) null,
    ds_class_icon varchar(30) null comment 'Classe do Ícone'
);

INSERT INTO TB_CONTROLLER (co_controller, no_controller, ds_class_icon) VALUES (1, 'Gestão', 'clip-data');
INSERT INTO TB_CONTROLLER (co_controller, no_controller, ds_class_icon) VALUES (2, 'Auditoria', 'fa fa-crosshairs');
INSERT INTO TB_CONTROLLER (co_controller, no_controller, ds_class_icon) VALUES (3, 'Acesso', 'clip-connection-2');
INSERT INTO TB_CONTROLLER (co_controller, no_controller, ds_class_icon) VALUES (4, 'Funcionalidade', 'fa fa-outdent');
INSERT INTO TB_CONTROLLER (co_controller, no_controller, ds_class_icon) VALUES (5, 'Perfil', 'clip-stack-empty');
INSERT INTO TB_CONTROLLER (co_controller, no_controller, ds_class_icon) VALUES (6, 'Usuário', 'fa fa-group');
INSERT INTO TB_CONTROLLER (co_controller, no_controller, ds_class_icon) VALUES (7, 'Visita', 'clip-airplane');
INSERT INTO TB_CONTROLLER (co_controller, no_controller, ds_class_icon) VALUES (8, 'Relatorio', 'fa fa-clipboard');
INSERT INTO TB_CONTROLLER (co_controller, no_controller, ds_class_icon) VALUES (9, 'Suporte', 'fa fa-envelope');
INSERT INTO TB_CONTROLLER (co_controller, no_controller, ds_class_icon) VALUES (10, 'Fluxocaixa', 'fa fa-money');
INSERT INTO TB_CONTROLLER (co_controller, no_controller, ds_class_icon) VALUES (11, 'Plano', 'clip-banknote');
INSERT INTO TB_CONTROLLER (co_controller, no_controller, ds_class_icon) VALUES (12, 'Assinante', 'clip-user-5');
INSERT INTO TB_CONTROLLER (co_controller, no_controller, ds_class_icon) VALUES (13, 'Ai', 'clip-earth-2');