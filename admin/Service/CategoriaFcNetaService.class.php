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
        $this->ObjetoModel = New CategoriaFcNetaModel();
    }

    public function carregaComboCatPesquisaLanc($coAssinante, $tpFluxo = null)
    {
        return $this->ObjetoModel->carregaComboCatPesquisaLanc($coAssinante, $tpFluxo);
    }

}