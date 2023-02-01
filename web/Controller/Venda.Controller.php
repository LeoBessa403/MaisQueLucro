<?php

class Venda extends AbstractController
{
    public $result;
    public $form;

    public function Index()
    {
        $url = new UrlAmigavel();
        $session = new Session();
        /** @var PlanoService $planoService */
        $planoService = $this->getService(PLANO_SERVICE);
        $this->result = $planoService->PesquisaTodos([
            ST_STATUS => StatusAcessoEnum::ATIVO
        ]);

        $urlExplode = explode('/',$url::getLink());
        $noCookie = Valida::ValNome(DESC . '-user-clique');
        if (!$session::CheckCookie($noCookie)) {
            /** @var CliqueService $CliqueService */
            $CliqueService = $this->getService(CLIQUE_SERVICE);
            $cobotao = $urlExplode[3];
            if ($cobotao) {
                $CliqueService->salvaClique($cobotao);
                $session::setCookie($noCookie, $cobotao, 24 * 60);
            }
        }
    }

    public function Assinatura()
    {
        /** @var AssinanteService $assinanteService */
        $assinanteService = $this->getService(ASSINANTE_SERVICE);

        if (!empty($_POST)):
            $retorno = $assinanteService->salvaAssinante($_POST);
            if ($retorno[SUCESSO]) {
                Redireciona(UrlAmigavel::$modulo . '/' . UrlAmigavel::$controller . '/Index');
            }
        endif;
    }

    public static function getReferenciaPagamentoInscricao()
    {
        /** @var PlanoAssinanteAssinaturaService $PlanoAssinanteAssinaturaService */
        $PlanoAssinanteAssinaturaService = new PlanoAssinanteAssinaturaService();
        return $PlanoAssinanteAssinaturaService->getReferenciaPagamentoPlano();
    }

    public static function getValorPlano($coPlano)
    {
        /** @var PlanoService $planoService */
        $planoService = static::getServiceStatic(PLANO_SERVICE);
        return $planoService->getValorPlano($coPlano);
    }

    public static function CliqueBotaoAjax($coBotao)
    {
        /** @var CliqueService $CliqueService */
        $CliqueService = static::getServiceStatic(CLIQUE_SERVICE);
        return $CliqueService->salvaClique($coBotao);
    }
}