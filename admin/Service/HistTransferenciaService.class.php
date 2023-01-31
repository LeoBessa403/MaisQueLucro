<?php

/**
 * HistTransferenciaService.class [ SERVICE ]
 * @copyright (c) 2021, Leo Bessa
 */
class  HistTransferenciaService extends AbstractService
{

    private $ObjetoModel;


    public function __construct()
    {
        parent::__construct(HistTransferenciaEntidade::ENTIDADE);
        $this->ObjetoModel = new HistTransferenciaModel();
    }

    public function TransferiSaldoCB($dados)
    {
        /** @var ContaBancariaService $ContaBancariaService */
        $ContaBancariaService = $this->getService(CONTA_BANCARIA_SERVICE);
        /** @var HistSaldoCbService $HistSaldoCbService */
        $HistSaldoCbService = $this->getService(HIST_SALDO_CB_SERVICE);

        /** @var PDO $PDO */
        $PDO = $this->getPDO();
        $retorno = [
            SUCESSO => false,
            MSG => null
        ];

        $PDO->beginTransaction();
        $hist[CO_CONTA_BANCARIA_ORIGEM] = $dados[CO_CONTA_BANCARIA_ORIGEM];
        $hist[DT_REALIZADO] = Valida::DataDB($dados[DT_REALIZADO]);
        $hist[CO_CONTA_BANCARIA_DESTINO] = $dados[CO_CONTA_BANCARIA_DESTINO];
        $hist[NU_VALOR_TRANSFERIDO] = Valida::FormataMoedaBanco($dados[NU_VALOR_TRANSFERIDO]);
        $hist[DT_CADASTRO] = Valida::DataHoraAtualBanco();
        $hist[CO_USUARIO] = UsuarioService::getCoUsuarioLogado();

        /** @var ContaBancariaEntidade $contaOrig */
        $contaOrig = $ContaBancariaService->PesquisaUmRegistro($dados[CO_CONTA_BANCARIA_ORIGEM]);
        $hist[NU_SALDO_ORIGEM_ANT] = $contaOrig->getCoUltimoHistSaldoCb()->getNuSaldo();
        $hist[NU_SALDO_ORIGEM_DEP] = ($contaOrig->getCoUltimoHistSaldoCb()->getNuSaldo() -
            Valida::FormataMoedaBanco($dados[NU_VALOR_TRANSFERIDO]));


        $histSaldoCB[DT_CADASTRO] = Valida::DataHoraAtualBanco();
        $histSaldoCB[CO_USUARIO] = UsuarioService::getCoUsuarioLogado();
        $histSaldoCB[NU_VALOR_PAGO] = Valida::FormataMoedaBanco($dados[NU_VALOR_TRANSFERIDO]);
        $histSaldoCB[TP_FLUXO] = TipoFluxoCaixaEnum::SAIDA;
        $histSaldoCB[CO_CONTA_BANCARIA] = $dados[CO_CONTA_BANCARIA_ORIGEM];
        $histSaldoCB[DS_OBSERVACAO] = 'Transferência entre contas.';
        $histSaldoCB[NU_SALDO] = $hist[NU_SALDO_ORIGEM_DEP];
        $HistSaldoCbService->Salva($histSaldoCB);

        /** @var ContaBancariaEntidade $contaDest */
        $contaDest = $ContaBancariaService->PesquisaUmRegistro($dados[CO_CONTA_BANCARIA_DESTINO]);
        $hist[NU_SALDO_DESTINO_ANT] = $contaDest->getCoUltimoHistSaldoCb()->getNuSaldo();
        $hist[NU_SALDO_DESTINO_DEP] = ($contaDest->getCoUltimoHistSaldoCb()->getNuSaldo() +
            Valida::FormataMoedaBanco($dados[NU_VALOR_TRANSFERIDO]));


        $histSaldoCB2[DT_CADASTRO] = Valida::DataHoraAtualBanco();
        $histSaldoCB2[CO_USUARIO] = UsuarioService::getCoUsuarioLogado();
        $histSaldoCB2[NU_VALOR_PAGO] = Valida::FormataMoedaBanco($dados[NU_VALOR_TRANSFERIDO]);
        $histSaldoCB2[TP_FLUXO] = TipoFluxoCaixaEnum::ENTRADA;
        $histSaldoCB2[CO_CONTA_BANCARIA] = $dados[CO_CONTA_BANCARIA_DESTINO];
        $histSaldoCB2[DS_OBSERVACAO] = 'transferência entre contas.';
        $histSaldoCB2[NU_SALDO] = $hist[NU_SALDO_DESTINO_DEP];
        $HistSaldoCbService->Salva($histSaldoCB2);

        $retorno[SUCESSO] = $this->Salva($hist);
        $retorno[MSG] = CADASTRADO;

        if ($retorno[SUCESSO]) {
            $retorno[SUCESSO] = true;
            $PDO->commit();
        } else {
            $retorno[MSG] = "Erro ao Salvar!";
            $retorno[SUCESSO] = false;
            $PDO->rollBack();
        }

        return $retorno;
    }
}