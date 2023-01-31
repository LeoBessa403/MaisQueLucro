<?php

/**
 * Profissionalalidador [ VALIDATOR ]
 * @copyright (c) 2018, Leo Bessa
 */
class  ProfissionalValidador extends AbstractValidador
{
    private $retorno = [
        SUCESSO => true,
        MSG => [],
        DADOS => []
    ];

    public function validarProfissional($dados)
    {
        $this->retorno[DADOS][] = $this->ValidaCampoObrigatorioValido(
            $dados[NO_PESSOA], AbstractValidador::VALIDACAO_NOME, 'Nome Completo'
        );
        if (!empty($dados[NU_CPF])) {
            $this->retorno[DADOS][] = $this->ValidaCampoObrigatorioValido(
                $dados[NU_CPF], AbstractValidador::VALIDACAO_CPF, 'CPF'
            );
        }
        return $this->MontaRetorno($this->retorno);
    }

}