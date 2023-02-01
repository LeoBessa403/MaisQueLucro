<?php

class IndexWeb extends AbstractController
{
    public $result;
    public $form;

    public function Index()
    {
        /** @var PlanoService $planoService */
        $planoService = $this->getService(PLANO_SERVICE);
        $this->result = $planoService->PesquisaTodos();
    }
}