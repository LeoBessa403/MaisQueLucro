<?php

/**
 * ServicoValidador [ VALIDATOR ]
 * @copyright (c) 2018, Leo Bessa
 */
class  ServicoValidador extends AbstractValidador
{
    private $retorno = [
        SUCESSO => true,
        MSG => [],
        DADOS => []
    ];

    public function validarServico($dados, $files)
    {
        $this->retorno[DADOS][] = $this->ValidaCampoObrigatorioDescricao(
            $dados[NO_SERVICO], 5, 'Nome Completo'
        );
        $this->retorno[DADOS][] = $this->ValidaCampoObrigatorioValido(
            $dados[NU_VALOR], AbstractValidador::VALIDACAO_MOEDA, 'Preço'
        );
        $this->retorno[DADOS][] = $this->ValidaCampoObrigatorioValido(
            $dados[NU_DURACAO], AbstractValidador::VALIDACAO_NUMERO, 'Duração'
        );
        $this->retorno[DADOS][] = $this->ValidaCampoSelectObrigatorio(
            $dados[CO_CATEGORIA_SERVICO], 'Categoria do Serviço'
        );
        $this->retorno[DADOS][] = $this->ValidaCampoObrigatorioDescricao(
            $dados[DS_DESCRICAO], 5, 'Descrição'
        );
        if (empty($dados[CO_IMAGEM])) {
            $this->retorno[DADOS][] = $this->ValidaCampoArquivo(
                $files[DS_CAMINHO], 'Foto do Serviço'
            );
        }
        return $this->MontaRetorno($this->retorno);
    }

    public function validarPacoteServico($dados)
    {
        $this->retorno[DADOS][] = $this->ValidaCampoObrigatorioDescricao(
            $dados[NO_PACOTE_SERV], 5, 'Nome do pacote'
        );
        $this->retorno[DADOS][] = $this->ValidaCampoObrigatorioValido(
            $dados[NU_VALOR], AbstractValidador::VALIDACAO_MOEDA, 'Preço'
        );
        $this->retorno[DADOS][] = $this->ValidaCampoSelectObrigatorio(
            $dados[CO_SERVICO], 'Serviços do Pacote'
        );
        $this->retorno[DADOS][] = $this->ValidaCampoObrigatorioDescricao(
            $dados[DS_DESCRICAO], 5, 'Descrição'
        );
        return $this->MontaRetorno($this->retorno);
    }

    public function validarPromocao($dados)
    {
        $this->retorno[DADOS][] = $this->ValidaCampoObrigatorioDescricao(
            $dados[NO_TITULO], 3, 'Título'
        );
        $this->retorno[DADOS][] = $this->ValidaCampoObrigatorioValido(
            $dados[NU_VALOR], AbstractValidador::VALIDACAO_MOEDA, 'Preço Promocional'
        );
        $this->retorno[DADOS][] = $this->ValidaCampoSelectObrigatorio(
            $dados[CO_SERVICO], 'Serviço da Promoção'
        );
        $this->retorno[DADOS][] = $this->ValidaCampoObrigatorioDescricao(
            $dados[DS_DESCRICAO], 5, 'Descrição'
        );
        $this->retorno[DADOS][] = $this->ValidaCampoObrigatorioValido(
            $dados[NU_HORA_ABERTURA], AbstractValidador::VALIDACAO_HORAS, 'Hórario de Início'
        );
        $this->retorno[DADOS][] = $this->ValidaCampoObrigatorioValido(
            $dados[NU_HORA_FECHAMENTO], AbstractValidador::VALIDACAO_HORAS, 'Hórario de Término'
        );
        $this->retorno[DADOS][] = $this->ValidaCampoObrigatorioValido(
            $dados[DT_INICIO], AbstractValidador::VALIDACAO_DATA, 'Data de Inicio'
        );
        $this->retorno[DADOS][] = $this->ValidaCampoObrigatorioValido(
            $dados[DT_FIM], AbstractValidador::VALIDACAO_DATA, 'Data de Termino'
        );
        return $this->MontaRetorno($this->retorno);
    }

    public function validarCortesia($dados)
    {
        $this->retorno[DADOS][] = $this->ValidaCampoSelectObrigatorio(
            $dados[CO_SERVICO], 'Cortesia'
        );
        $this->retorno[DADOS][] = $this->ValidaCampoObrigatorioDescricao(
            $dados[DS_MOTIVO], 5, 'Motivo'
        );
        $this->retorno[DADOS][] = $this->ValidaCampoObrigatorioValido(
            $dados[NU_HORA_ABERTURA], AbstractValidador::VALIDACAO_HORAS, 'Hórario de Início'
        );
        $this->retorno[DADOS][] = $this->ValidaCampoObrigatorioValido(
            $dados[NU_HORA_FECHAMENTO], AbstractValidador::VALIDACAO_HORAS, 'Hórario de Término'
        );
        $this->retorno[DADOS][] = $this->ValidaCampoObrigatorioValido(
            $dados[DT_INICIO], AbstractValidador::VALIDACAO_DATA, 'Data de Inicio'
        );
        $this->retorno[DADOS][] = $this->ValidaCampoObrigatorioValido(
            $dados[DT_FIM], AbstractValidador::VALIDACAO_DATA, 'Data de Termino'
        );
        return $this->MontaRetorno($this->retorno);
    }

    public function validarValePresente($dados)
    {
        $this->retorno[DADOS][] = $this->ValidaCampoObrigatorioDescricao(
            $dados[DS_MOTIVO], 5, 'Motivo'
        );
        $this->retorno[DADOS][] = $this->ValidaCampoObrigatorioValido(
            $dados[DT_VALIDO], AbstractValidador::VALIDACAO_DATA, 'Validade'
        );
        $this->retorno[DADOS][] = $this->ValidaCampoObrigatorioValido(
            $dados[NU_VALOR], AbstractValidador::VALIDACAO_MOEDA, 'Valor R$'
        );
        return $this->MontaRetorno($this->retorno);
    }
}