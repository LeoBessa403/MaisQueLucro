create table TB_PAGINA
(
    co_pagina              int auto_increment
        primary key,
    dt_cadastro            datetime     null,
    ds_titulo_url_amigavel varchar(255) null comment 'Url amigável da página',
    nu_visualizacao        int          null,
    nu_usuario             int          null comment 'Número de usuário que visitou a página'
);

INSERT INTO TB_PAGINA (co_pagina, dt_cadastro, ds_titulo_url_amigavel, nu_visualizacao, nu_usuario) VALUES (1, '2023-02-02 11:55:19', 'web/Venda/Index', 1, 1);
INSERT INTO TB_PAGINA (co_pagina, dt_cadastro, ds_titulo_url_amigavel, nu_visualizacao, nu_usuario) VALUES (2, '2023-02-06 18:07:28', 'web/IndexWeb/Index', 1, 1);