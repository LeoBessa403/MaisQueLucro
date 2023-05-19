create table TB_PLANO_PACOTE
(
    co_plano_pacote int(10) auto_increment comment 'Planos do Módulo',
    co_plano        int not null,
    co_pacote       int not null,
    primary key (co_plano_pacote, co_plano, co_pacote)
);

