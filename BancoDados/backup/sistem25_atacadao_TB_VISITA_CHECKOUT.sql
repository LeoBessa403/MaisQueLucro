create table TB_VISITA_CHECKOUT
(
    co_visita_checkout int auto_increment,
    co_visita          int not null,
    co_checkout        int not null,
    primary key (co_visita_checkout, co_visita, co_checkout)
);

