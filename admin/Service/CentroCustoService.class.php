<?php

/**
 * CentroCustoService.class [ SERVICE ]
 * @copyright (c) 2021, Leo Bessa
 */
class  CentroCustoService extends AbstractService
{

    private $ObjetoModel;


    public function __construct()
    {
        parent::__construct(CentroCustoEntidade::ENTIDADE);
        $this->ObjetoModel = new CentroCustoModel();
    }

    /**
     * @param $dados
     * @return array
     */
    public function CadastroCentroCustos($dados)
    {
        /** @var PDO $PDO */
        $PDO2 = $this->getPDO();
        $retorno = [
            SUCESSO => false,
            MSG => null
        ];

        $PDO2->beginTransaction();
        $centro[NO_CENTRO_CUSTOS] = $dados[NO_CENTRO_CUSTOS];
        $centro[CO_ASSINANTE] = AssinanteService::getCoAssinanteLogado();

        if ($dados[CO_CENTRO_CUSTO]) {
            $retorno[SUCESSO] = $this->Salva($centro, $dados[CO_CENTRO_CUSTO]);
            $retorno[MSG] = ATUALIZADO;
        } else {
            $retorno[SUCESSO] = $this->Salva($centro);
            $retorno[MSG] = CADASTRADO;
        }

        if ($retorno[SUCESSO]) {
            $retorno[SUCESSO] = true;
            $PDO2->commit();
        } else {
            $retorno[MSG] = "Erro ao Salvar!";
            $retorno[SUCESSO] = false;
            $PDO2->rollBack();
        }

        return $retorno;
    }

    public static function CentroCustoCombo()
    {
        /** @var CentroCustoService $CentroCustoService */
        $CentroCustoService = new CentroCustoService();

        $comboCentros = [
            '' => Mensagens::MSG_SEM_ITEM_SELECIONADO
        ];
        $centros = $CentroCustoService->PesquisaTodos([], 'A');
        /** @var CentroCustoEntidade $centro */
        foreach ($centros as $centro) {
            $comboCentros[$centro->getCoCentroCusto()] =
                $centro->getNoCentroCustos();
        }
        return $comboCentros;
    }

    public function PesquisaCentroCusto($dados)
    {
        return $this->ObjetoModel->PesquisaCentroCusto($dados);
    }

}