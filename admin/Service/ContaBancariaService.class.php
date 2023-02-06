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
        $conta[NU_AGENCIA] = (int)$dados[NU_AGENCIA];
        $conta[NU_CONTA] = $dados[NU_CONTA];
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
            $conta[CO_ASSINANTE] = AssinanteService::getCoAssinanteLogado();
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
        $retorno = [
            SUCESSO => false,
            MSG => null
        ];
        $historicos = $this->PesquisaAvancadaHistConta([
            CO_CONTA_BANCARIA => $dados['co_conta_bancaria']
        ]);

        $html = '<div id="timeline" class="demo1">
                        <div class="timeline">
                            <div class="spine"></div>';

        $cores = Valida::getCoresHistorico();
        $mes_extenso = Valida::getMesesHistorico();
        $historicos = array_reverse($historicos);

        $meses = '';
        $fechamento = '';
        $corI = 0;
        $controle = true;

        foreach ($historicos as $historico) {
            $data = strtotime($historico["dt_cadastro"]);
            if ($meses != Valida::DataShow($historico["dt_cadastro"], 'Y/m')) {
                if (!$controle)
                    $fechamento = '</ul>';
                $controle = false;
                $meses = Valida::DataShow($historico["dt_cadastro"], 'Y/m');

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


            $noUsuario = UsuarioService::getNoPessoaCoUsuario($historico["co_usuario"]);

            if ($historico["tp_fluxo"]) {
                $tpFc = TipoFluxoCaixaEnum::$label[$historico["tp_fluxo"]];
                $vlFc = $historico["nu_valor_pago"];
            } else {
                $tpFc = "Cadastro Conta";
                $vlFc = $historico["nu_saldo"];
            }

            $html .= '<div class="content">
                    Saldo R$: <b>' . Valida::FormataMoeda($historico["nu_saldo"]) . '</b></br>
                    Tipo de Lançamento: <b>' . $tpFc . '</b></br>
                    Valor: <b>' . Valida::FormataMoeda($vlFc) . '</b></br>
                    Realizado em: <b>' .
                Valida::DataShow(
                    $historico["dt_cadastro"], 'd/m/Y H:i'
                )
                . '</b></br>
                    Realizado por: <b>' . Valida::Resumi($noUsuario, 30) . '</b></br>
                    Observação: <b>' . $historico["ds_observacao"] . '</b></br>
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
        $comboConta = [
            '' => Mensagens::MSG_SEM_ITEM_SELECIONADO
        ];

        $Contas = self::PesquisaAvancadaCombo([
            CO_ASSINANTE => AssinanteService::getCoAssinanteLogado()
        ]);

        foreach ($Contas as $Conta) {
            $comboConta[$Conta["co_conta_bancaria"]] =
                $Conta["no_banco"] . ' - Ag: ' . $Conta["nu_agencia"];
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

    public static function PesquisaAvancadaCombo($dados)
    {
        $ObjetoModel = new ContaBancariaModel();
        return $ObjetoModel->PesquisaAvancadaCombo($dados);
    }

    public function PesquisaAvancada($dados)
    {
        return $this->ObjetoModel->PesquisaAvancada($dados);
    }

    public function PesquisaAvancadaHistConta($dados)
    {
        return $this->ObjetoModel->PesquisaAvancadaHistConta($dados);
    }

}