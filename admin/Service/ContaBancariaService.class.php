<?php

/**
 * ContaBancariaService.class [ SERVICE ]
 * @copyright (c) 2021, Leo Bessa
 */
class  ContaBancariaService extends AbstractService
{

    private $ObjetoModel;


    public function __construct()
    {
        parent::__construct(ContaBancariaEntidade::ENTIDADE);
        $this->ObjetoModel = new ContaBancariaModel();
    }


    /**
     * @param $dados
     * @return array
     */
    public function CadastroContaBancaria($dados)
    {
        /** @var HistSaldoCbService $HistSaldoCbService */
        $HistSaldoCbService = $this->getService(HIST_SALDO_CB_SERVICE);

        /** @var PDO $PDO */
        $PDO = $this->getPDO();
        $retorno = [
            SUCESSO => false,
            MSG => null
        ];

        $PDO->beginTransaction();
        $conta[ST_STATUS] = $dados[ST_STATUS];
        $conta[NU_AGENCIA] = $dados[NU_AGENCIA];
        $conta[NU_CONTA] = $dados[NU_CONTA];
        $conta[DS_OBSERVACAO] = $dados[DS_OBSERVACAO];
        $conta[NO_BANCO] = $dados[NO_BANCO];

        if ($dados[CO_CONTA_BANCARIA]) {
            $hist[CO_CONTA_BANCARIA] = $dados[CO_CONTA_BANCARIA];
            $this->Salva($conta, $dados[CO_CONTA_BANCARIA]);
            /** @var ContaBancariaEntidade $conta */
            $conta = $this->PesquisaUmRegistro($dados[CO_CONTA_BANCARIA]);
            $hist[NU_SALDO] = $conta->getCoUltimoHistSaldoCb()->getNuSaldo();
            $retorno[MSG] = ATUALIZADO;
        } else {
            $conta[DT_CADASTRO] = Valida::DataHoraAtualBanco();
            $hist[CO_CONTA_BANCARIA] = $this->Salva($conta);
            $hist[NU_SALDO] = Valida::FormataMoedaBanco($dados[NU_SALDO]);
            $retorno[MSG] = CADASTRADO;
        }

        $hist[DS_OBSERVACAO] = $dados[DS_OBSERVACAO];
        $hist[DT_CADASTRO] = Valida::DataHoraAtualBanco();
        $hist[CO_USUARIO] = UsuarioService::getCoUsuarioLogado();

        $retorno[SUCESSO] = $HistSaldoCbService->Salva($hist);

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

    /**
     * @param $dados
     * @return array
     */
    public function GerarHistorico($dados)
    {
        /** @var UsuarioService $usuarioService */
        $usuarioService = new UsuarioService();

        $retorno = [
            SUCESSO => false,
            MSG => null
        ];
        /** @var ContaBancariaEntidade $conta */
        $conta = $this->PesquisaUmRegistro($dados['co_conta_bancaria']);
        $html = '<div id="timeline" class="demo1">
                        <div class="timeline">
                            <div class="spine"></div>';

        $cores = Valida::getCoresHistorico();
        $mes_extenso = Valida::getMesesHistorico();
        $historicos = array_reverse($conta->getCoHistSaldoCb());

        $meses = '';
        $fechamento = '';
        $corI = 0;
        $controle = true;
        /** @var HistSaldoCbEntidade $historico */
        foreach ($historicos as $historico) {
            $data = strtotime($historico->getDtCadastro());
            if ($meses != Valida::DataShow($historico->getDtCadastro(), 'Y/m')) {
                if (!$controle)
                    $fechamento = '</ul>';
                $controle = false;
                $meses = Valida::DataShow($historico->getDtCadastro(), 'Y/m');

                $html .= '<div class="date_separator">
                                    <span>';
                $mes = date('M', $data);
                $dia = date('d', $data);
                $ano = date('Y', $data);
                $html .= $mes_extenso["$mes"] . " de {$ano}";

                $html .= '</span>
                            </div>
                            <ul class="columns">';
            } else {
                $fechamento = '';
            }
            if ($corI == 5)
                $corI = 0;

            $html .= '<li>
                        <div class="timeline_element ' . $cores[$corI] . '">
                            <div class="timeline_title">
                                <span class="timeline_date"></span>
                            </div>';

            /** @var UsuarioEntidade $usuario */
            $usuario = $usuarioService->PesquisaUmRegistro($historico->getCoUsuario()->getCoUsuario());

            $html .= '<div class="content">
                    Saldo R$: <b>' . Valida::FormataMoeda($historico->getNuSaldo()) . '</b></br>
                    Tipo de Fluxo: <b>' . TipoFluxoCaixaEnum::$label[$historico->getTpFluxo()] . '</b></br>
                    Valor: <b>' . $historico->getNuValorPago() . '</b></br>
                    Cadastrado em: <b>' .
                Valida::DataShow(
                    $historico->getDtCadastro(), 'd/m/Y H:i'
                )
                . '</b></br>
                    Cadastrado por: <b>' . Valida::Resumi($usuario->getCoPessoa()->getNoPessoa(), 30) . '</b></br>
                    Observação: <b>' . $historico->getDsObservacao() . '</b></br>
                    </div>';


            $html .= '</div></li>';
            $html .= $fechamento;
            $corI++;
        }
        $html .= '</div></div>';

        $retorno[SUCESSO] = true;
        $retorno['html'] = $html;

        return $retorno;
    }


    public static function ContaBancariaCombo()
    {
        /** @var ContaBancariaService $ContaBancariaService */
        $ContaBancariaService = new ContaBancariaService();

        $comboConta = [
            '' => Mensagens::MSG_SEM_ITEM_SELECIONADO
        ];
        $Contas = $ContaBancariaService->PesquisaTodos([], 'A', NO_BANCO);
        /** @var ContaBancariaEntidade $Conta */
        foreach ($Contas as $Conta) {
            if ($Conta->getCoContaBancaria() == 1) {
                $comboConta[$Conta->getCoContaBancaria()] =
                    $Conta->getNoBanco();
            } else {
                $comboConta[$Conta->getCoContaBancaria()] =
                    $Conta->getNoBanco() . ' - Ag: ' . $Conta->getNuAgencia();
            }
        }
        return $comboConta;
    }

    public function getSaldoContaBancaria($dados)
    {
        /** @var ContaBancariaService $ContaBancariaService */
        $ContaBancariaService = new ContaBancariaService();

        $retorno = [
            SUCESSO => false,
            NU_SALDO => null
        ];
        /** @var ContaBancariaEntidade $conta */
        $conta = $ContaBancariaService->PesquisaUmRegistro($dados[CO_CONTA_BANCARIA]);
        $retorno[NU_SALDO] = Valida::FormataMoeda($conta->getCoUltimoHistSaldoCb()->getNuSaldo());
        $retorno[SUCESSO] = true;

        return $retorno;
    }
}