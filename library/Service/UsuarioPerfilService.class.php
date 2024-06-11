<?php

/**
 * UsuarioPerfilService.class [ SEVICE ]
 * @copyright (c) 2017, Leo Bessa
 */
class  UsuarioPerfilService extends AbstractService
{
    private $ObjetoModel;

    public function __construct()
    {
        parent::__construct(UsuarioPerfilEntidade::ENTIDADE);
        $this->ObjetoModel = New UsuarioPerfilModel();
    }

    public function PesquisaPerfisUsuario($coUsuario)
    {
        return $this->ObjetoModel->PesquisaPerfisUsuario($coUsuario);
    }


}