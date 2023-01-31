<?php

/**
 * ServicoProfissionalService.class [ SEVICE ]
 * @copyright (c) 2019, Leo Bessa
 */
class  ServicoProfissionalService extends AbstractService
{

    private $ObjetoModel;


    public function __construct()
    {
        parent::__construct(ServicoProfissionalEntidade::ENTIDADE);
        $this->ObjetoModel = New ServicoProfissionalModel();
    }


    public function salvaComissaoServicoProfissional($dados)
    {
        /** @var PercentualComissaoService $percentualComissaoService */
        $percentualComissaoService = $this->getService(PERCENTUAL_COMISSAO_SERVICE);
        /** @var PDO $PDO */
        $PDO = $this->getPDO();
        $retorno = [
            SUCESSO => false,
            MSG => null
        ];
        $servicoProfissionalValidador = new ServicoProfissionalValidador();
        /** @var ServicoProfissionalValidador $validador */
        $validador = $servicoProfissionalValidador->validarComissaoServicoProfissional($dados);
        if ($validador[SUCESSO]) {
            $PDO->beginTransaction();
            foreach ($dados[NU_TIPO_COMISSAO] as $coProfissional => $comissoes) {
                /** @var ServicoProfissionalEntidade $servicoProf */
                $servicoProf = $this->PesquisaUmQuando([
                    CO_SERVICO => $dados[CO_SERVICO],
                    CO_PROFISSIONAL => $coProfissional
                ]);
                if (isset($dados['atende-profissional'])) {
                    $servProf[ST_STATUS] = (isset($dados['atende-profissional'][$coProfissional]))
                        ? SimNaoEnum::SIM : SimNaoEnum::NAO;
                } else {
                    $servProf[ST_STATUS] = SimNaoEnum::NAO;
                }
                if ($servicoProf) {
                    $percCom[CO_SERVICO_PROFISSIONAL] = $servicoProf->getCoServicoProfissional();
                    $this->Salva($servProf, $servicoProf->getCoServicoProfissional());
                } else {
                    $servProf[CO_SERVICO] = $dados[CO_SERVICO];
                    $servProf[CO_PROFISSIONAL] = $coProfissional;

                    $percCom[CO_SERVICO_PROFISSIONAL] = $this->Salva($servProf);
                }
                if (!$percCom[CO_SERVICO_PROFISSIONAL]) {
                    Notificacoes::geraMensagem(
                        'Não foi possível realizar a ação',
                        TiposMensagemEnum::ALERTA
                    );
                    $retorno[SUCESSO] = false;
                    break;
                } else {
                    foreach ($comissoes as $chave => $valor) {
                        $percCom[NU_TIPO_COMISSAO . $chave] = $valor;
                    }
                    $retorno[SUCESSO] = $percentualComissaoService->salvaComissao($percCom);
                }
            }
            if ($retorno[SUCESSO]) {
                $PDO->commit();
            } else {
                $PDO->rollBack();
            }
        } else {
            Notificacoes::geraMensagem(
                $validador[MSG],
                TiposMensagemEnum::ALERTA
            );
            $retorno = $validador;
        }
        return $retorno;
    }

    public function salvaComissaoProfissionalServico($dados)
    {
        /** @var PercentualComissaoService $percentualComissaoService */
        $percentualComissaoService = $this->getService(PERCENTUAL_COMISSAO_SERVICE);
        /** @var PDO $PDO */
        $PDO = $this->getPDO();
        $retorno = [
            SUCESSO => false,
            MSG => null
        ];
        $servicoProfissionalValidador = new ServicoProfissionalValidador();
        /** @var ServicoProfissionalValidador $validador */
        $validador = $servicoProfissionalValidador->validarComissaoProfissionalServico($dados);
        if ($validador[SUCESSO]) {
            $PDO->beginTransaction();
            foreach ($dados[NU_TIPO_COMISSAO] as $coServico => $comissoes) {
                /** @var ServicoProfissionalEntidade $servicoProf */
                $servicoProf = $this->PesquisaUmQuando([
                    CO_SERVICO => $coServico,
                    CO_PROFISSIONAL => $dados[CO_PROFISSIONAL]
                ]);
                if (isset($dados['atende-servico'])) {
                    $servProf[ST_STATUS] = (isset($dados['atende-servico'][$coServico]))
                        ? SimNaoEnum::SIM : SimNaoEnum::NAO;
                } else {
                    $servProf[ST_STATUS] = SimNaoEnum::NAO;
                }
                if ($servicoProf) {
                    $percCom[CO_SERVICO_PROFISSIONAL] = $servicoProf->getCoServicoProfissional();
                    $this->Salva($servProf, $servicoProf->getCoServicoProfissional());
                } else {
                    $servProf[CO_SERVICO] = $coServico;
                    $servProf[CO_PROFISSIONAL] = $dados[CO_PROFISSIONAL];

                    $percCom[CO_SERVICO_PROFISSIONAL] = $this->Salva($servProf);
                }
                if (!$percCom[CO_SERVICO_PROFISSIONAL]) {
                    Notificacoes::geraMensagem(
                        'Não foi possível realizar a ação',
                        TiposMensagemEnum::ALERTA
                    );
                    $retorno[SUCESSO] = false;
                    break;
                } else {
                    foreach ($comissoes as $chave => $valor) {
                        $percCom[NU_TIPO_COMISSAO . $chave] = $valor;
                    }
                    $retorno[SUCESSO] = $percentualComissaoService->salvaComissao($percCom);
                }
            }
            if ($retorno[SUCESSO]) {
                $PDO->commit();
            } else {
                $PDO->rollBack();
            }
        } else {
            Notificacoes::geraMensagem(
                $validador[MSG],
                TiposMensagemEnum::ALERTA
            );
            $retorno = $validador;
        }
        return $retorno;
    }
}