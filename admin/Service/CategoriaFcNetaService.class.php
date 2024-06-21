<?php

/**
 * CategoriaFcNetaService.class [ SERVICE ]
 * @copyright (c) 2021, Leo Bessa
 */
class  CategoriaFcNetaService extends AbstractService
{

    private $ObjetoModel;


    public function __construct()
    {
        parent::__construct(CategoriaFcNetaEntidade::ENTIDADE);
        $this->ObjetoModel = new CategoriaFcNetaModel();
    }

    public function carregaComboCatPesquisaLanc($coAssinante, $tpFluxo = null)
    {
        return $this->ObjetoModel->carregaComboCatPesquisaLanc($coAssinante, $tpFluxo);
    }

    public static function cadastrarCatNetasAssinante($coAssinante, $codCats)
    {
        /** @var CategoriaFcNetaService $CategoriaFcNetaService */
        $CategoriaFcNetaService = static::getServiceStatic(CATEGORIA_FC_NETA_SERVICE);
        $cats = [
            ['Receitas em Dinheiro', '1.0.1', $codCats[1]], 
            ['Receitas em Boleto', '1.0.2', $codCats[1]], 
            ['Receitas em PIX', '1.0.3', $codCats[1]], 
            ['Receitas em Cartão de Crédito', '1.0.4', $codCats[1]], 
            ['Receitas em Cartão de Débito', '1.0.5', $codCats[1]], 
            ['Outros Produtos/Serviços', '1.0.6', $codCats[1]], 
            ['Simples Nacional', '2.0.1', $codCats[2]], 
            ['Taxas de Cartões', '2.0.2', $codCats[2]], 
            ['Taxas de Boleto', '2.0.3', $codCats[2]], 
            ['Compras com Fornecedores', '2.1.1', $codCats[3]], 
            ['Frete de Compras', '2.1.2', $codCats[3]], 
            ['Outros custos com Fornecedor', '2.1.3', $codCats[3]], 
            ['Combustível', '2.2.1', $codCats[4]], 
            ['Estacionamento', '2.2.2', $codCats[4]], 
            ['Alimentação', '2.2.3', $codCats[4]], 
            ['Manuteção de Veículos', '2.2.4', $codCats[4]], 
            ['Terceirização da entrega', '2.2.5', $codCats[4]], 
            ['Outros custos com Entregas', '2.2.6', $codCats[4]], 
            ['Embalagens', '2.3.1', $codCats[5]], 
            ['Sacolas', '2.3.2', $codCats[5]], 
            ['Caixas', '2.3.3', $codCats[5]], 
            ['Outros custos com Embalagens', '2.3.4', $codCats[5]], 
            ['Comissão Vendedor', '2.4.1', $codCats[6]], 
            ['Telefone e Internet', '3.0.1', $codCats[7]], 
            ['Energia Elétrica', '3.0.2', $codCats[7]], 
            ['Água', '3.0.3', $codCats[7]], 
            ['Aluguel e Condomínio', '3.0.4', $codCats[7]], 
            ['IPTU e Taxas Públicas', '3.0.5', $codCats[7]], 
            ['Almoço / Supermercado / Lanches', '3.0.6', $codCats[7]], 
            ['Contador', '3.0.7', $codCats[7]], 
            ['Salário de Funcionários', '3.1.1', $codCats[8]], 
            ['Bolsa de Estágio', '3.1.2', $codCats[8]], 
            ['VT e VR', '3.1.3', $codCats[8]], 
            ['Rescisão', '3.1.4', $codCats[8]], 
            ['FGTS', '3.1.5', $codCats[8]], 
            ['INSS - Sindicato - IR', '3.1.6', $codCats[8]], 
            ['13º e Férias', '3.1.7', $codCats[8]], 
            ['Exames ocupacionais', '3.1.8', $codCats[8]], 
            ['Pro-Labores', '3.1.9', $codCats[8]], 
            ['Plano de Saúde', '3.1.10', $codCats[8]], 
            ['Confraternizações / Festas da Empresa', '3.1.11', $codCats[8]], 
            ['Manutenção Máquinas e Equipamentos', '3.2.1', $codCats[9]], 
            ['Serviços Técnicos em geral', '3.2.2', $codCats[9]], 
            ['Materiais de Expediente/Escritório', '3.2.3', $codCats[9]], 
            ['Materiais de Limpeza e Manutenção da Loja', '3.2.4', $codCats[9]], 
            ['Papelaria Materiais impressos (folder, cartão visitas, etc.)', '4.0.1', $codCats[10]], 
            ['Site / Sistema', '4.0.2', $codCats[10]], 
            ['Mídias/ Propaganda', '4.0.3', $codCats[10]], 
            ['Prestadores de serviços de marketing', '4.0.4', $codCats[10]], 
            ['Compra de Equipamentos', '4.1.1', $codCats[11]], 
            ['Reformas / Estrutura', '4.1.2', $codCats[11]], 
            ['Mobiliário', '4.1.3', $codCats[11]], 
            ['Consultoria', '4.2.1', $codCats[12]], 
            ['Treinamentos', '4.2.2', $codCats[12]], 
            ['Capitalização dos sócios', '5.0.1', $codCats[13]], 
            ['Empréstimos obtidos', '5.0.2', $codCats[13]], 
            ['Venda de equipamentos usados', '5.0.3', $codCats[13]], 
            ['Pagamento de Empréstimos', '6.0.1', $codCats[14]], 
            ['Juros Bancários e por Atraso', '6.0.2', $codCats[14]], 
            ['Pagamento de dívidas passadas', '6.0.3', $codCats[14]], 
            ['Distribuição de Lucros ', '6.0.4', $codCats[14]], 
            ['Juros de Antecipação de Recebíveis', '6.0.5', $codCats[14]], 
            ['Estorno de Capital', '6.0.6', $codCats[14]], 
            ['Passagem', '2.5.1', $codCats[15]], 
            ['Viagem Uber / Taxi', '2.5.2', $codCats[15]], 
            ['Hospedagem', '2.5.3', $codCats[15]], 
            ['Viagem Alimentação', '2.5.4', $codCats[15]]
        ];

        $catAss[CO_ASSINANTE] = $coAssinante;
        foreach ($cats as $cat) {
            $catAss[DS_TEXTO] = $cat[0];
            $catAss[NU_CODIGO] = $cat[1];
            $catAss[CO_CATEGORIA_FC_FILHA] = $cat[2];
            $CategoriaFcNetaService->Salva($catAss);
        }
    }

}