<?php

/**
 * HistoricoSuporteService.class [ SEVICE ]
 * @copyright (c) 2020, Leo Bessa
 */
class  HistoricoSuporteService extends AbstractService
{

    private $ObjetoModel;


    public function __construct()
    {
        parent::__construct(HistoricoSuporteEntidade::ENTIDADE);
        $this->ObjetoModel = New HistoricoSuporteModel();
    }


}