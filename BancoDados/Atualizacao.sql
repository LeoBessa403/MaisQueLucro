INSERT INTO TB_HIST_SALDO_CB (dt_cadastro, co_usuario, nu_valor_pago, tp_fluxo, co_conta_bancaria, ds_observacao, nu_saldo) VALUES ("2024-06-25 14:26:24", "3", "0", "2", "8", "Exclusão de Lançamento, ", "43430.07");

DELETE FROM TB_FLUXO_CAIXA where co_fluxo_caixa = "419";

UPDATE TB_CATEGORIA_FC_FILHA SET ds_texto = "Receita de Vendas 22" where co_categoria_fc_filha = 16;

DELETE FROM TB_CATEGORIA_FC_NETA where co_categoria_fc_filha in (16);

DELETE FROM TB_CATEGORIA_FC_FILHA where co_categoria_fc_filha = "16";

