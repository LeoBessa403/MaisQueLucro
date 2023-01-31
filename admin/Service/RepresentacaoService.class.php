<?php

/**
 * RepresentacaoService.class [ SERVICE ]
 * @copyright (c) 2021, Leo Bessa
 */
class  RepresentacaoService extends AbstractService
{

    private $ObjetoModel;


    public function __construct()
    {
        parent::__construct(RepresentacaoEntidade::ENTIDADE);
        $this->ObjetoModel = New RepresentacaoModel();
    }

    /**
     * @param $dados
     * @return array
     */
    public function CadastroRepresentacao($dados)
    {
        /** @var PDO $PDO */
        $PDO2 = $this->getPDO();
        $retorno = [
            SUCESSO => false,
            MSG => null
        ];

        $PDO2->beginTransaction();
        $rep[NO_REPRESENTACAO] = $dados[NO_REPRESENTACAO];
        $rep[DS_EMAIL] = $dados[DS_EMAIL];
        $rep[NU_TEL1] = Valida::RetiraMascara($dados[NU_TEL1]);

        if ($dados[CO_REPRESENTACAO]) {
            $retorno[SUCESSO] = $this->Salva($rep, $dados[CO_REPRESENTACAO]);
            $retorno[MSG] = ATUALIZADO;
        } else {
            $retorno[SUCESSO] = $this->Salva($rep);
            $retorno[MSG] = CADASTRADO;
        }

        if ($retorno[SUCESSO]) {
            $retorno[SUCESSO] = true;
            $PDO2->commit();
        } else {
            $retorno[MSG] = "Erro ao Salvar!";
            $retorno[SUCESSO] = false;
            $PDO2->rollBack();
        }

        return $retorno;
    }


}