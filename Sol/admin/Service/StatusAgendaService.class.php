<?php

/**
 * StatusAgendaService.class [ SEVICE ]
 * @copyright (c) 2019, Leo Bessa
 */
class  StatusAgendaService extends AbstractService
{

    private $ObjetoModel;


    public function __construct()
    {
        parent::__construct(StatusAgendaEntidade::ENTIDADE);
        $this->ObjetoModel = New StatusAgendaModel();
    }


}