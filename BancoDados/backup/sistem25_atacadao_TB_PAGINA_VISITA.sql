create table TB_PAGINA_VISITA
(
    co_pagina_visita int auto_increment,
    co_visita        int not null,
    co_pagina        int not null,
    primary key (co_pagina_visita, co_visita, co_pagina)
);

INSERT INTO TB_PAGINA_VISITA (co_pagina_visita, co_visita, co_pagina) VALUES (1, 0, 1);
INSERT INTO TB_PAGINA_VISITA (co_pagina_visita, co_visita, co_pagina) VALUES (2, 0, 2);