<?php

/**
 * SuporteValidador [ VALIDATOR ]
 * @copyright (c) 2020, Leo Bessa
 */
class  SuporteValidador extends AbstractValidador
{
    private $retorno = [
        SUCESSO => true,
        MSG => [],
        DADOS => []
    ];

    public function validarSuporte($dados)
    {
        $this->retorno[DADOS][] = $this->ValidaCampoObrigatorioDescricao(
            $dados[DS_MENSAGEM], 5, 'Mensagem'
        );
        if (!empty($dados[CO_SUPORTE])) {
            $this->retorno[DADOS][] = $this->ValidaCampoObrigatorioValido(
                $dados[CO_SUPORTE], AbstractValidador::VALIDACAO_NUMERO, 'Código do Suporte'
            );
        } else {
            $this->retorno[DADOS][] = $this->ValidaCampoSelectObrigatorio(
                $dados[ST_TIPO_ASSUNTO], 'Tipo do Assunto'
            );
            $this->retorno[DADOS][] = $this->ValidaCampoObrigatorioDescricao(
                $dados[DS_ASSUNTO], 5, 'Título do Suporte'
            );
        }
        return $this->MontaRetorno($this->retorno);
    }
}