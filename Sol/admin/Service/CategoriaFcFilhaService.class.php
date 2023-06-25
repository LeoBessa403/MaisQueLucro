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
        $this->ObjetoModel = New CategoriaFcFilhaModel();
    }


}