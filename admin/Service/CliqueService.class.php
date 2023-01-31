<?php

/**
 * CliqueService.class [ SERVICE ]
 * @copyright (c) 2021, Leo Bessa
 */
class  CliqueService extends AbstractService
{

    private $ObjetoModel;


    public function __construct()
    {
        parent::__construct(CliqueEntidade::ENTIDADE);
        $this->ObjetoModel = new CliqueModel();
    }


    public function salvaClique($cobotao)
    {
        /** @var BotaoService $BotaoService */
        $BotaoService = $this->getService(BOTAO_SERVICE);

        /** @var PDO $PDO */
        $PDO = $this->getPDO();
        $PDO->beginTransaction();

        /** @var BotaoEntidade $botao */
        $botao = $BotaoService->PesquisaUmRegistro($cobotao);

        if (!empty($botao)) {
            $clique[DT_CADASTRO] = Valida::DataHoraAtualBanco();
            $clique[CO_BOTAO] = (int)$cobotao;
            $this->Salva($clique);

            $btn[NU_TOTAL_CLIQUES] = $botao->getNuTotalCliques() + 1;
            $retorno[SUCESSO] = $BotaoService->Salva($btn, $cobotao);

            if ($retorno[SUCESSO]) {
                $PDO->commit();
            } else {
                $PDO->rollBack();
            }
        }
    }
}