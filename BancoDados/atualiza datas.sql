select f1.co_fluxo_caixa,
       f1.dt_vencimento,
       DATE_ADD((select dt_vencimento from tb_fluxo_caixa f2 where f1.co_fluxo_caixa = f2.co_fluxo_caixa), INTERVAL +9
                month) as novo_vencimento,
       f1.dt_cadastro,
       DATE_ADD((select dt_cadastro from tb_fluxo_caixa f2 where f1.co_fluxo_caixa = f2.co_fluxo_caixa), INTERVAL +9
                month) as novo_cadastro,
       f1.dt_realizado,
       DATE_ADD((select dt_realizado from tb_fluxo_caixa f2 where f1.co_fluxo_caixa = f2.co_fluxo_caixa), INTERVAL +9
                month) as novo_dt_realizado
from tb_fluxo_caixa f1
where 1 = 1;
#       dt_vencimento BETWEEN DATE_ADD(CURRENT_DATE(), INTERVAL -9 month) AND CURRENT_DATE()
#   and

update tb_fluxo_caixa f1
set dt_vencimento = DATE_ADD((select dt_vencimento from tb_fluxo_caixa f2
where f1.co_fluxo_caixa = f2.co_fluxo_caixa),
                             INTERVAL +9 month ),
dt_cadastro = DATE_ADD((select dt_cadastro from tb_fluxo_caixa f3 where f1.co_fluxo_caixa = f3.co_fluxo_caixa),
                             INTERVAL +9 month),
dt_realizado = DATE_ADD((select dt_realizado from tb_fluxo_caixa f4 where f1.co_fluxo_caixa = f4.co_fluxo_caixa),
                             INTERVAL +9 month)
where 1 = 1;

SET SQL_MODE='ALLOW_INVALID_DATES';


