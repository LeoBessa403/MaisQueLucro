SELECT tc.co_categoria_fc         as cod,
       tc.nu_codigo               as numero,
       tc.ds_texto                as nome,
       tcff.co_categoria_fc_filha as codFil,
       tcff.nu_codigo             as numeroFil,
       tcff.ds_texto              as nomeFil,
       tcfn.co_categoria_fc_neta  as codNet,
       tcfn.nu_codigo             as numeroNet,
       tcfn.ds_texto              as nomeNet
FROM TB_CATEGORIA_FC tc
         inner join TB_CATEGORIA_FC_FILHA tcff
                    on tc.co_categoria_fc = tcff.co_categoria_fc
         left join TB_CATEGORIA_FC_NETA tcfn
                   on tcff.co_categoria_fc_filha = tcfn.co_categoria_fc_filha
where ((tcfn.co_assinante = 2) or (tcff.co_assinante = 2))
order by tc.nu_codigo, tcff.nu_codigo, tcfn.nu_codigo