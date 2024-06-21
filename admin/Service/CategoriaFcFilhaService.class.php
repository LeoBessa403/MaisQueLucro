<?php

/**
 * CategoriaFcFilhaService.class [ SERVICE ]
 * @copyright (c) 2021, Leo Bessa
 */
class  CategoriaFcFilhaService extends AbstractService
{

    private $ObjetoModel;


    public function __construct()
    {
        parent::__construct(CategoriaFcFilhaEntidade::ENTIDADE);
        $this->ObjetoModel = new CategoriaFcFilhaModel();
    }

    public static function cadastrarCatFilhasAssinante($coAssinante)
    {
        /** @var CategoriaFcFilhaService $CategoriaFcFilhaService */
        $CategoriaFcFilhaService = static::getServiceStatic(CATEGORIA_FC_FILHA_SERVICE);
        $cats = [
            ['Receita de Vendas', '1.0', 1],
            ['Custos Tributários ou Financeiros', '2.0', 2],
            ['Custos com Fornecedores', '2.1', 2],
            ['Custos com Entregas', '2.2', 2],
            ['Custos com Embalagens', '2.3', 2],
            ['Custo com Vendas', '2.4', 2],
            ['Despesas Administrativas', '3.0', 3],
            ['Despesas com Pessoal', '3.1', 3],
            ['Despesas com Materiais e Equipamentos', '3.2', 3],
            ['Investimentos em Marketing', '4.0', 4],
            ['Investimentos em Bens Materiais', '4.1', 4],
            ['Investimentos em Desenvolvimento Empresarial', '4.2', 4],
            ['Entradas não Operacionais', '5.0', 5],
            ['Saídas não Operacionais', '6.0', 6],
            ['Viagem para Compra de Produtos', '2.5', 2]
        ];

        $codCats = [];
        $catAss[CO_ASSINANTE] = $coAssinante;
        $i = 1;
        foreach ($cats as $cat){
            $catAss[DS_TEXTO] = $cat[0];
            $catAss[NU_CODIGO] = $cat[1];
            $catAss[CO_CATEGORIA_FC] = $cat[2];
            $codCats[$i] = $CategoriaFcFilhaService->Salva($catAss);
            $i++;
        }
        return $codCats;
    }

}