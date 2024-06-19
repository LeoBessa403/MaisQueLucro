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
        /** @var CategoriaFcService $CategoriaFcService */
        $CategoriaFcService = new CategoriaFcService();
        /** @var CategoriaFcFilhaService $CategoriaFcFilhaService */
        $CategoriaFcFilhaService = new CategoriaFcFilhaService();
        $comboCategoria = [
            '' => 'Selecione uma Categoria Pai.'
        ];
        $i = 0;
        $Categorias = $CategoriaFcService->PesquisaTodos([], 'A', NU_CODIGO);
        /** @var CategoriaFcEntidade $cat */
        foreach ($Categorias as $cat) {
            $i++;
            $comboCategoria[$i]['nuCodigo'] =
                'p-' . $cat->getCoCategoriaFc() . '-' . $cat->getNuCodigo();
            $comboCategoria[$i]['dsTexto'] =
                $cat->getNuCodigo() . ' - ' . $cat->getDsTexto();

            $catFilhas = $CategoriaFcFilhaService->PesquisaTodos([
                CO_CATEGORIA_FC => $cat->getCoCategoriaFc()
            ], 'A', NU_CODIGO);
            /** @var CategoriaFcFilhaEntidade $catFilha */
            foreach ($catFilhas as $catFilha) {
                $i++;
                $comboCategoria[$i]['nuCodigo'] =
                    'f-' . $catFilha->getCoCategoriaFcFilha() . '-' . $catFilha->getNuCodigo();
                $comboCategoria[$i]['dsTexto'] =
                    '...' . $catFilha->getNuCodigo() .
                    ' - ' . $catFilha->getDsTexto();

            }
        }
        return $comboCategoria;
    }

    public static function CategoriasFCComboEntrada()
    {
        /** @var CategoriaFcService $CategoriaFcService */
        $CategoriaFcService = new CategoriaFcService();
        /** @var CategoriaFcFilhaService $CategoriaFcFilhaService */
        $CategoriaFcFilhaService = new CategoriaFcFilhaService();
        /** @var CategoriaFcNetaService $CategoriaFcNetaService */
        $CategoriaFcNetaService = new CategoriaFcNetaService();
        $comboCategoria = [
            '' => 'Selecione uma Categoria Pai.'
        ];
        $i = 0;
        $Categorias = $CategoriaFcService->PesquisaTodos([
            "in#" . NU_CODIGO => "1','5"
        ], 'A', NU_CODIGO);
        /** @var CategoriaFcEntidade $cat */
        foreach ($Categorias as $cat) {
            $i++;
            $comboCategoria[$i]['nuCodigo'] =
                'p-' . $cat->getCoCategoriaFc() . '-' . $cat->getNuCodigo();
            $comboCategoria[$i]['dsTexto'] =
                $cat->getNuCodigo() . ' - ' . $cat->getDsTexto();

            $catFilhas = $CategoriaFcFilhaService->PesquisaTodos([
                CO_CATEGORIA_FC => $cat->getCoCategoriaFc()
            ], 'A', NU_CODIGO);
            /** @var CategoriaFcFilhaEntidade $catFilha */
            foreach ($catFilhas as $catFilha) {
                $i++;
                $comboCategoria[$i]['nuCodigo'] =
                    'f-' . $catFilha->getCoCategoriaFcFilha() . '-' . $catFilha->getNuCodigo();
                $comboCategoria[$i]['dsTexto'] =
                    '...' . $catFilha->getNuCodigo() .
                    ' - ' . $catFilha->getDsTexto();

                $catNetas = $CategoriaFcNetaService->PesquisaTodos([
                    CO_CATEGORIA_FC_FILHA => $catFilha->getCoCategoriaFcFilha()
                ], 'A', NU_CODIGO);
                /** @var CategoriaFcNetaEntidade $catNeta */
                foreach ($catNetas as $catNeta) {
                    $i++;
                    $comboCategoria[$i]['nuCodigo'] =
                        'n-' . $catNeta->getCoCategoriaFcNeta() . '-' . $catNeta->getNuCodigo();
                    $comboCategoria[$i]['dsTexto'] =
                        '......' . $catNeta->getNuCodigo() .
                        ' - ' . $catNeta->getDsTexto();
                }
            }
        }
        return $comboCategoria;
    }

    public static function CategoriasFCComboSaida()
    {
        /** @var CategoriaFcService $CategoriaFcService */
        $CategoriaFcService = new CategoriaFcService();
        /** @var CategoriaFcFilhaService $CategoriaFcFilhaService */
        $CategoriaFcFilhaService = new CategoriaFcFilhaService();
        /** @var CategoriaFcNetaService $CategoriaFcNetaService */
        $CategoriaFcNetaService = new CategoriaFcNetaService();
        $comboCategoria = [
            '' => 'Selecione uma Categoria Pai.'
        ];
        $i = 0;
        $Categorias = $CategoriaFcService->PesquisaTodos([
            "in#" . NU_CODIGO => "2','3','4','6"
        ], 'A', NU_CODIGO);
        /** @var CategoriaFcEntidade $cat */
        foreach ($Categorias as $cat) {
            $i++;
            $comboCategoria[$i]['nuCodigo'] =
                'p-' . $cat->getCoCategoriaFc() . '-' . $cat->getNuCodigo();
            $comboCategoria[$i]['dsTexto'] =
                $cat->getNuCodigo() . ' - ' . $cat->getDsTexto();

            $catFilhas = $CategoriaFcFilhaService->PesquisaTodos([
                CO_CATEGORIA_FC => $cat->getCoCategoriaFc()
            ], 'A', NU_CODIGO);
            /** @var CategoriaFcFilhaEntidade $catFilha */
            foreach ($catFilhas as $catFilha) {
                $i++;
                $comboCategoria[$i]['nuCodigo'] =
                    'f-' . $catFilha->getCoCategoriaFcFilha() . '-' . $catFilha->getNuCodigo();
                $comboCategoria[$i]['dsTexto'] =
                    '...' . $catFilha->getNuCodigo() .
                    ' - ' . $catFilha->getDsTexto();

                $catNetas = $CategoriaFcNetaService->PesquisaTodos([
                    CO_CATEGORIA_FC_FILHA => $catFilha->getCoCategoriaFcFilha()
                ], 'A', NU_CODIGO);
                /** @var CategoriaFcNetaEntidade $catNeta */
                foreach ($catNetas as $catNeta) {
                    $i++;
                    $comboCategoria[$i]['nuCodigo'] =
                        'n-' . $catNeta->getCoCategoriaFcNeta() . '-' . $catNeta->getNuCodigo();
                    $comboCategoria[$i]['dsTexto'] =
                        '......' . $catNeta->getNuCodigo() .
                        ' - ' . $catNeta->getDsTexto();
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
    public function PesquisaNuCodigo($dados)
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
                CO_CATEGORIA_FC => $dados['coCat']
            ]);
            $retorno['nuQtd'] = count($cats) - 1;
            $retorno[SUCESSO] = true;
        } elseif ($dados['tpCat'] == 'f') {
            $cats = $CategoriaFcNetaService->PesquisaTodos([
                CO_CATEGORIA_FC_FILHA => $dados['coCat']
            ]);
            $retorno['nuQtd'] = count($cats);
//            $retorno[NU_CODIGO] = count($cats);
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
            if (empty($dadosCat[$cat["cod"]])) {
                $est .= '<li class="catPai"><i class="fa fa-caret-right acao" title="Expandir"></i> ' .
                    $cat["cod"] . ' - ' . $cat["nome"] . '</li>';
                $dadosCat[$cat["cod"]] = $cat["nome"];
            }

            $est .= '<ul class="estCatFilha">';

            $est .= '<li class="catFilha">
                                <i class="fa fa-caret-right acao" title="Expandir"></i> 
                                ' . $cat["numeroFil"] . ' - <span class="dsTexto">' .
                $cat["nomeFil"] . '</span> 
                        <input type="text" class="form-control spanDsTexto"
                                id="ds_texto_f-' . $cat["codFil"] . '" 
                                name="ds_texto_f-' . $cat["codFil"] . '" 
                                value="' . $cat["numeroFil"] . '">
                        <i class="fa fa-save save-cat" title="Salvar"
                            data-id="f-' . $cat["codFil"] . '"></i>
                        <i class="clip-pencil-2 edit-cat" title="Editar"
                           data-id="f-' . $cat["codFil"] . '"></i>
                        <i class="fa fa-ban cancelar-cat" title="Cancelar"
                           data-id="f-' . $cat["codFil"] . '"></i>
                        <i class="fa fa-trash-o exc-cat" title="Excluir"
                           data-id="f-' . $cat["codFil"] . '"></i></li>';

            $est .= '<ul class="estCatNeta">';

            $est .= '<li class="catNeta">
                                ' . $cat["numeroNet"] . ' -  <span class="dsTexto">' .
                $cat["nomeNet"] . '</span> 
                        <input type="text" class="form-control spanDsTexto"
                                id="ds_texto_n-' . $cat["codNet"] . '" 
                                name="ds_texto_n-' . $cat["codNet"] . '" 
                                value="' . $cat["nomeNet"] . '">
                        <i class="fa fa-save save-cat" title="Salvar"
                            data-id="n-' . $cat["codNet"] . '"></i>
                        <i class="clip-pencil-2 edit-cat" title="Editar" 
                            data-id="n-' . $cat["codNet"] . '"></i>
                        <i class="fa fa-ban cancelar-cat" title="Cancelar" 
                            data-id="n-' . $cat["codNet"] . '"></i>
                        <i class="fa fa-trash-o exc-cat" title="Excluir"
                            data-id="n-' . $cat["codNet"] . '"></i></li>';
            $est .= '</ul>
            </ul>';
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