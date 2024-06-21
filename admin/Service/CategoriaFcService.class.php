<?php

/**
 * CategoriaFcService.class [ SERVICE ]
 * @copyright (c) 2021, Leo Bessa
 */
class  CategoriaFcService extends AbstractService
{

    private $ObjetoModel;


    public function __construct()
    {
        parent::__construct(CategoriaFcEntidade::ENTIDADE);
        $this->ObjetoModel = new CategoriaFcModel();
    }


    public static function CategoriasFCCombo()
    {
        return self::comboCat("1,2,3,4,5,6", false);
    }

    public static function CategoriasFCComboEntrada()
    {
        return self::comboCat("1,5");
    }

    public static function CategoriasFCComboSaida()
    {
        return self::comboCat("2,3,4,6");
    }

    public static function comboCat($catsPai, $catNetas = true)
    {
        /** @var CategoriaFcNetaService $CategoriaFcNetaService */
        $CategoriaFcNetaService = new CategoriaFcNetaService();
        $comboCategoria = [
            '' => 'Selecione uma Categoria Pai.'
        ];
        $i = 0;
        $Categorias = $CategoriaFcNetaService->carregaComboCatPesquisaLanc(
            AssinanteService::getCoAssinanteLogado(), $catsPai
        );
        $dadosCat = [];
        foreach ($Categorias as $cat) {
            $dadosCat[$cat["cod"]]["cod"] = $cat["cod"];
            $dadosCat[$cat["cod"]]["numero"] = $cat["numero"];
            $dadosCat[$cat["cod"]]["nome"] = $cat["nome"];

            $dadosCat[$cat["cod"]]['filhas'][$cat["codFil"]]["codFil"] = $cat["codFil"];
            $dadosCat[$cat["cod"]]['filhas'][$cat["codFil"]]["numeroFil"] = $cat["numeroFil"];
            $dadosCat[$cat["cod"]]['filhas'][$cat["codFil"]]["nomeFil"] = $cat["nomeFil"];

            $dadosCat[$cat["cod"]]['filhas'][$cat["codFil"]]['netas'][$cat["codNet"]]["codNet"] = $cat["codNet"];
            $dadosCat[$cat["cod"]]['filhas'][$cat["codFil"]]['netas'][$cat["codNet"]]["numeroNet"] = $cat["numeroNet"];
            $dadosCat[$cat["cod"]]['filhas'][$cat["codFil"]]['netas'][$cat["codNet"]]["nomeNet"] = $cat["nomeNet"];
        }
        foreach ($dadosCat as $cat) {
            $i++;
            $comboCategoria[$i]['nuCodigo'] =
                'p-' . $cat["cod"] . '-' . $cat["numero"];
            $comboCategoria[$i]['dsTexto'] =
                $cat["cod"] . ' - ' . $cat["nome"];

            foreach ($cat["filhas"] as $catFilha) {
                $i++;
                $comboCategoria[$i]['nuCodigo'] =
                    'f-' . $catFilha["codFil"] . '-' . $catFilha["numeroFil"];
                $comboCategoria[$i]['dsTexto'] =
                    '...' . $catFilha["numeroFil"] .
                    ' - ' . $catFilha["nomeFil"];

                if ($catNetas) {
                    foreach ($catFilha["netas"] as $catNeta) {
                        $i++;
                        $comboCategoria[$i]['nuCodigo'] =
                            'n-' . $catNeta["codNet"] . '-' . $catNeta["numeroNet"];
                        $comboCategoria[$i]['dsTexto'] =
                            '......' . $catNeta["numeroNet"] .
                            ' - ' . $catNeta["nomeNet"];
                    }
                }
            }
        }
        return $comboCategoria;
    }

    /**
     * @param $dados
     * @return array
     */
    public function CadastroCategoriaFC($dados)
    {
        /** @var CategoriaFcFilhaService $CategoriaFcFilhaService */
        $CategoriaFcFilhaService = $this->getService(CATEGORIA_FC_FILHA_SERVICE);
        /** @var CategoriaFcNetaService $CategoriaFcNetaService */
        $CategoriaFcNetaService = $this->getService(CATEGORIA_FC_NETA_SERVICE);

        /** @var PDO $PDO */
        $PDO = $this->getPDO();
        $retorno = [
            SUCESSO => false,
            MSG => null
        ];

        $PDO->beginTransaction();
        $cat[DS_TEXTO] = $dados['ds_texto'];
        $cat[NU_CODIGO] = $dados['nu_codigo'];
        $cat[CO_ASSINANTE] = AssinanteService::getCoAssinanteLogado();

        if ($dados['tpCat'] == 'p') {
            $cat[CO_CATEGORIA_FC] = $dados['coCat'];
            $retorno[SUCESSO] = $CategoriaFcFilhaService->Salva($cat);
        } elseif ($dados['tpCat'] == 'f') {
            $cat[CO_CATEGORIA_FC_FILHA] = $dados['coCat'];
            $retorno[SUCESSO] = $CategoriaFcNetaService->Salva($cat);
        }
        if ($retorno[SUCESSO]) {
            $retorno[SUCESSO] = true;
            $retorno[MSG] = CADASTRADO;
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
    public function AlteraCategoriaFC($dados)
    {
        /** @var CategoriaFcFilhaService $CategoriaFcFilhaService */
        $CategoriaFcFilhaService = $this->getService(CATEGORIA_FC_FILHA_SERVICE);
        /** @var CategoriaFcNetaService $CategoriaFcNetaService */
        $CategoriaFcNetaService = $this->getService(CATEGORIA_FC_NETA_SERVICE);

        /** @var PDO $PDO */
        $PDO = $this->getPDO();
        $retorno = [
            SUCESSO => false,
            MSG => null
        ];

        $PDO->beginTransaction();
        $cat[DS_TEXTO] = $dados['ds_texto'];

        if ($dados['tpCat'] == 'f') {
            $retorno[SUCESSO] = $CategoriaFcFilhaService->Salva($cat, $dados['coCat']);
        } elseif ($dados['tpCat'] == 'n') {
            $retorno[SUCESSO] = $CategoriaFcNetaService->Salva($cat, $dados['coCat']);
        }
        if ($retorno[SUCESSO]) {
            $retorno[SUCESSO] = true;
            $retorno[MSG] = ATUALIZADO;
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
    public function ExcluiCategoriaFC($dados)
    {
        /** @var CategoriaFcFilhaService $CategoriaFcFilhaService */
        $CategoriaFcFilhaService = $this->getService(CATEGORIA_FC_FILHA_SERVICE);
        /** @var CategoriaFcNetaService $CategoriaFcNetaService */
        $CategoriaFcNetaService = $this->getService(CATEGORIA_FC_NETA_SERVICE);

        /** @var PDO $PDO */
        $PDO = $this->getPDO();
        $retorno = [
            SUCESSO => false,
            MSG => null
        ];

        $PDO->beginTransaction();

        if ($dados['tpCat'] == 'f') {
            $retorno[SUCESSO] = $CategoriaFcNetaService->DeletaQuando([CO_CATEGORIA_FC_FILHA => $dados['coCat']]);
            $retorno[SUCESSO] = $CategoriaFcFilhaService->Deleta($dados['coCat']);
        } elseif ($dados['tpCat'] == 'n') {
            $retorno[SUCESSO] = $CategoriaFcNetaService->Deleta($dados['coCat']);
        }
        if ($retorno[SUCESSO]) {
            $retorno[SUCESSO] = true;
            $retorno[MSG] = DELETADO;
            $PDO->commit();
        } else {
            $retorno[MSG] = "Erro ao Deletar!";
            $retorno[SUCESSO] = false;
            $PDO->rollBack();
        }

        return $retorno;
    }

    /**
     * @param $dados
     * @return array
     */
    public function PesquisaNuCodigo($dados, $coAssinante)
    {
        /** @var CategoriaFcFilhaService $CategoriaFcFilhaService */
        $CategoriaFcFilhaService = $this->getService(CATEGORIA_FC_FILHA_SERVICE);
        /** @var CategoriaFcNetaService $CategoriaFcNetaService */
        $CategoriaFcNetaService = $this->getService(CATEGORIA_FC_NETA_SERVICE);

        $retorno = [
            SUCESSO => false,
            'nuQtd' => null
        ];

        if ($dados['tpCat'] == 'p') {
            $cats = $CategoriaFcFilhaService->PesquisaTodos([
                CO_CATEGORIA_FC => $dados['coCat'],
                CO_ASSINANTE => $coAssinante
            ]);
            $retorno['nuQtd'] = count($cats) - 1;
            $retorno[SUCESSO] = true;
        } elseif ($dados['tpCat'] == 'f') {
            $cats = $CategoriaFcNetaService->PesquisaTodos([
                CO_CATEGORIA_FC_FILHA => $dados['coCat'],
                CO_ASSINANTE => $coAssinante
            ]);
            $retorno['nuQtd'] = count($cats);
            $retorno[SUCESSO] = true;
        }
        return $retorno;
    }

    public static function EstruturaCategoriasFC()
    {
        /** @var CategoriaFcNetaService $CategoriaFcNetaService */
        $CategoriaFcNetaService = new CategoriaFcNetaService();

        $Categorias = $CategoriaFcNetaService->carregaComboCatPesquisaLanc(AssinanteService::getCoAssinanteLogado());
        $est = '';
        $dadosCat = [];
        foreach ($Categorias as $cat) {
            $dadosCat[$cat["cod"]]["cod"] = $cat["cod"];
            $dadosCat[$cat["cod"]]["numero"] = $cat["numero"];
            $dadosCat[$cat["cod"]]["nome"] = $cat["nome"];

            $dadosCat[$cat["cod"]]['filhas'][$cat["codFil"]]["codFil"] = $cat["codFil"];
            $dadosCat[$cat["cod"]]['filhas'][$cat["codFil"]]["numeroFil"] = $cat["numeroFil"];
            $dadosCat[$cat["cod"]]['filhas'][$cat["codFil"]]["nomeFil"] = $cat["nomeFil"];

            $dadosCat[$cat["cod"]]['filhas'][$cat["codFil"]]['netas'][$cat["codNet"]]["codNet"] = $cat["codNet"];
            $dadosCat[$cat["cod"]]['filhas'][$cat["codFil"]]['netas'][$cat["codNet"]]["numeroNet"] = $cat["numeroNet"];
            $dadosCat[$cat["cod"]]['filhas'][$cat["codFil"]]['netas'][$cat["codNet"]]["nomeNet"] = $cat["nomeNet"];
        }
        foreach ($dadosCat as $categ) {
            $est .= '<li class="catPai"><i class="fa fa-caret-right acao" title="Expandir"></i> ' .
                $categ["numero"] . ' - ' . $categ["nome"] . '</li>';

            $est .= '<ul class="estCatFilha">';
            foreach ($categ["filhas"] as $categFil) {
                $est .= '<li class="catFilha">
                                <i class="fa fa-caret-right acao" title="Expandir"></i> 
                                ' . $categFil["numeroFil"] . ' - <span class="dsTexto">' .
                    $categFil["nomeFil"] . '</span> 
                        <input type="text" class="form-control spanDsTexto"
                                id="ds_texto_f-' . $categFil["codFil"] . '" 
                                name="ds_texto_f-' . $categFil["codFil"] . '" 
                                value="' . $categFil["nomeFil"] . '">
                        <i class="fa fa-save save-cat" title="Salvar"
                            data-id="f-' . $categFil["codFil"] . '"></i>
                        <i class="clip-pencil-2 edit-cat" title="Editar"
                           data-id="f-' . $categFil["codFil"] . '"></i>
                        <i class="fa fa-ban cancelar-cat" title="Cancelar"
                           data-id="f-' . $categFil["codFil"] . '"></i>
                        <i class="fa fa-trash-o exc-cat" title="Excluir"
                           data-id="f-' . $categFil["codFil"] . '"></i></li>';
                $est .= '<ul class="estCatNeta">';
                foreach ($categFil["netas"] as $categNet) {
                    $est .= '<li class="catNeta">    
                                ' . $categNet["numeroNet"] . ' -  <span class="dsTexto">' .
                        $categNet["nomeNet"] . '</span> 
                        <input type="text" class="form-control spanDsTexto"
                                id="ds_texto_n-' . $categNet["codNet"] . '" 
                                name="ds_texto_n-' . $categNet["codNet"] . '" 
                                value="' . $categNet["nomeNet"] . '">
                        <i class="fa fa-save save-cat" title="Salvar"
                            data-id="n-' . $categNet["codNet"] . '"></i>
                        <i class="clip-pencil-2 edit-cat" title="Editar" 
                            data-id="n-' . $categNet["codNet"] . '"></i>
                        <i class="fa fa-ban cancelar-cat" title="Cancelar" 
                            data-id="n-' . $categNet["codNet"] . '"></i>
                        <i class="fa fa-trash-o exc-cat" title="Excluir"
                            data-id="n-' . $categNet["codNet"] . '"></i></li>';

                }
                $est .= '</ul>';
            }
            $est .= '</ul>';
        }

        $retorno['html'] = $est;
        return $retorno;
    }

    public static function getComboTodasCategoriasFC($coAssinante)
    {
        /** @var CategoriaFcNetaService $CategoriaFcNetaService */
        $CategoriaFcNetaService = new CategoriaFcNetaService();
        $comboCategoria = [
            '' => Mensagens::MSG_SEM_ITEM_SELECIONADO
        ];
        $Categorias = $CategoriaFcNetaService->carregaComboCatPesquisaLanc($coAssinante);
        foreach ($Categorias as $cat) {

            $comboCategoria['p-' . $cat["cod"] . '-' . $cat["numero"]]
                = $cat["numero"] . ' - ' . $cat["nome"];

            $comboCategoria['f-' . $cat["codFil"] . '-' . $cat["numeroFil"]]
                = '...' . $cat["numeroFil"] . ' - ' . $cat["nomeFil"];

            $comboCategoria['n-' . $cat["codNet"] . '-' . $cat["numeroNet"]]
                = '......' . $cat["numeroNet"] . ' - ' . $cat["nomeNet"];
        }
        return $comboCategoria;
    }


}