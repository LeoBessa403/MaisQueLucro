<?php

/**
 * PlanejamentoFinanceiroService.class [ SERVICE ]
 * @copyright (c) 2023, Leo Bessa
 */
class  PlanejamentoFinanceiroService extends AbstractService
{

    private $ObjetoModel;


    public function __construct()
    {
        parent::__construct(PlanejamentoFinanceiroEntidade::ENTIDADE);
        $this->ObjetoModel = New PlanejamentoFinanceiroModel();
    }


}