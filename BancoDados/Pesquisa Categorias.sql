select tc.co_categoria_fc as cod,
       tc.nu_codigo as numero,
       tc.ds_texto as nome,
       tcff.co_categoria_fc_filha as codFil,
       tcff.nu_codigo as numeroFil,
       tcff.ds_texto as nomeFil,
       tcfn.co_categoria_fc_neta as codNet,
       tcfn.nu_codigo as numeroNet,
       tcfn.ds_texto as nomeNet
from tb_categoria_fc tc
         inner join tb_categoria_fc_filha tcff
                    on tc.co_categoria_fc = tcff.co_categoria_fc
         inner join tb_categoria_fc_neta tcfn
                    on tcff.co_categoria_fc_filha = tcfn.co_categoria_fc_filha
where tcfn.co_assinante = 1
order by tc.nu_codigo, tcff.nu_codigo, tcfn.nu_codigo;
