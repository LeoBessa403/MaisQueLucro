INSERT INTO atacadao10.TB_CONTROLLER (no_controller, ds_class_icon) VALUES ("AceleradorResultado", "fa fa-calculator");

INSERT INTO atacadao10.TB_FUNCIONALIDADE (no_funcionalidade, ds_action, st_menu, co_controller, st_status) VALUES ("Lucro", "Lucro", "S", "14", "A");

INSERT INTO atacadao10.TB_PERFIL_FUNCIONALIDADE (co_funcionalidade, co_perfil) VALUES ("48", "2");

UPDATE atacadao10.TB_FUNCIONALIDADE SET no_funcionalidade = "Lucros", ds_action = "Lucros", st_menu = "S", co_controller = "14" where co_funcionalidade = 48;

DELETE FROM atacadao10.TB_PERFIL_FUNCIONALIDADE where co_funcionalidade in (48);

INSERT INTO atacadao10.TB_PERFIL_FUNCIONALIDADE (co_funcionalidade, co_perfil) VALUES ("48", "2");

