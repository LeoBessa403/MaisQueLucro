<?php

/**
 * FluxocaixaValidador [ VALIDATOR ]
 * @copyright (c) 2018, Leo Bessa
 */
class  FluxocaixaValidador extends AbstractValidador
{
    private $retorno = [
        SUCESSO => true,
        MSG => [],
        DADOS => []
    ];
    public function validarFc($dados)
    {
        $this->retorno[DADOS][] = $this->ValidaCampoObrigatorioDescricao(
            $dados[CO_CATEGORIA_FC], 3,'Categoria'
        );
        $this->retorno[DADOS][] = $this->ValidaCampoObrigatorioValido(
            $dados[CO_CONTA_BANCARIA], AbstractValidador::VALIDACAO_NUMERO,'Conta Bancária'
        );
        if ((empty($dados[DT_REALIZADO])) && (empty($dados[DT_VENCIMENTO]))) {
            $this->retorno[DADOS][] = $this->ValidaCampoObrigatorioValido(
                $dados[DT_REALIZADO], AbstractValidador::VALIDACAO_DATA, 'Data Paga OU '
            );
            $this->retorno[DADOS][] = $this->ValidaCampoObrigatorioValido(
                $dados[DT_VENCIMENTO], AbstractValidador::VALIDACAO_DATA, 'A Pagar'
            );
        }else{
            if (empty($dados[DT_REALIZADO])){
                $this->retorno[DADOS][] = $this->ValidaCampoValido(
                    $dados[DT_REALIZADO], AbstractValidador::VALIDACAO_DATA, 'Data Paga'
                );
            }
            if (empty($dados[DT_VENCIMENTO])){
                $this->retorno[DADOS][] = $this->ValidaCampoValido(
                    $dados[DT_VENCIMENTO], AbstractValidador::VALIDACAO_DATA, 'Data A Pagar'
                );
            }
        }

        return $this->MontaRetorno($this->retorno);
    }

}