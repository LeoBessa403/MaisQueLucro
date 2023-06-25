<?php

/**
 * HistSaldoCbService.class [ SERVICE ]
 * @copyright (c) 2021, Leo Bessa
 */
class  HistSaldoCbService extends AbstractService
{

    private $ObjetoModel;


    public function __construct()
    {
        parent::__construct(HistSaldoCbEntidade::ENTIDADE);
        $this->ObjetoModel = New HistSaldoCbModel();
    }


}