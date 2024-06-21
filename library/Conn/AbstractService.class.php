<?php

class AbstractService extends AbstractModel
{
    public function __construct($Entidade)
    {
        parent::__construct($Entidade);
    }

    public function getService($service)
    {
        return new $service();
    }

    public static function getServiceStatic($service)
    {
        return new $service();
    }

    public function getDados($dados, $entidade)
    {
        $abstractEntidade = new AbstractEntidade();
        return $abstractEntidade->getDados($dados, $entidade);
    }
}