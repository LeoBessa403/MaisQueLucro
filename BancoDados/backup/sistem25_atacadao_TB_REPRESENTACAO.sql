create table TB_REPRESENTACAO
(
    co_representacao int auto_increment,
    no_representacao varchar(45)  null,
    nu_tel1          varchar(15)  null,
    ds_email         varchar(150) null,
    co_assinante     int          not null,
    primary key (co_representacao, co_assinante)
);

INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (1, 'AMAURY', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (2, 'XDX INOX', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (3, 'BAIP', '11947019863', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (4, 'CASA GORDÃO', '11911818090', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (5, 'MAGAZINE BRÁS', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (6, 'ELISA MIX IMPORTAÇÃO', '11948131475', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (7, 'ABC CHAVEIRO ALEXANDRE', '11977627345', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (8, 'SUPERM. ORIENTE', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (9, 'MARLISON', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (10, 'TARCIANA', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (11, 'ERISLUCIA', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (12, 'CAMARGO E QUEIROZ CONECT', '61984900102', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (13, 'NATHAN E CIA', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (14, 'JOSIAS', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (15, 'ADJ COMERCIO', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (16, 'MONISE', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (17, 'ANDRÉIA ARMARINHO RECANTO', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (18, 'BAZAR DO ALUNO', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (19, 'ANDRÉ', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (20, 'Arnaldo Sócio', '61993003405', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (21, 'Leo Sócio', '61993274991', 'leonardomcbessa@gmail.com', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (22, 'Ibanes Fornecedor', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (23, 'Utilidades Primas Guara', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (24, 'Brenda novidades', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (25, 'China Junior', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (26, 'ivaldo', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (27, 'Dodô', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (28, 'Rogério', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (29, 'Antônia Casa das malas', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (30, 'Josefino', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (31, 'FRANKILE', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (32, 'PAPEL. RAFAS', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (33, 'ELIANE', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (34, 'Raiane', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (35, 'BAZAR DA FAMÍLIA ', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (36, 'KEVIN MARLEY', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (37, 'Digg', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (38, 'CASA DA MOCHILA. LEILANE', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (39, 'Drogaria PD', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (40, 'ESTER FARMáCIA E PAPELARIA', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (41, 'A casa do Portugues', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (42, 'Central da Construção', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (43, 'Papelaria Escritiva', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (44, 'Tina novidades mochilas', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (45, 'Outlet das Havaianas ', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (46, 'Rocha turismo ', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (47, 'Armarinho Scalla', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (48, 'Panificadora Lindo Pão ', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (49, 'Colégio CCI ', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (50, 'Maria R Silva Recanto', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (51, 'Antônia Taubate', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (52, 'Lira Recanto ', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (53, 'Supermercado Lucena', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (54, 'Supermercado BH', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (55, 'Ponto Arte', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (56, 'Eletrica hidraúlica Manjolinho', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (57, 'Mercado Manjolinho', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (58, 'Suíno bom', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (59, 'Shopping das frutas', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (60, 'Maria Inês recanto', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (61, 'Priscila e Diego', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (62, 'JM novidades ', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (63, 'JM Motos', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (64, 'Neto matérias de construção', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (65, 'Panificadora Roma', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (66, 'Agro vita agropecuária ', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (67, 'Fátima agropecuária 401', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (68, 'Junior ideal', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (69, 'Drogaria Natal', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (70, 'Br 10 celulares ', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (71, 'Drogaria Rina', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (72, 'Mercado bem bom ', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (73, 'Seu Guilherme ', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (74, 'Baixinho gás ', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (75, 'Ok celular ', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (76, 'Conexão hidráulica ', '', '', 1);
INSERT INTO TB_REPRESENTACAO (co_representacao, no_representacao, nu_tel1, ds_email, co_assinante) VALUES (77, 'Armarinho e papelaria Crucial', '', '', 1);