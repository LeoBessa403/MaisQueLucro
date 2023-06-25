<?php
/**
 * Created by PhpStorm.
 * User: leonardobessa
 * Date: 16-05-2018
 * Time: 09:54
 */

///** @var ProdutoService $produtoService */
//$produtoService = new ProdutoService();
//$produtos = $produtoService->PesquisaTodos();
///** @var CategoriaService $categoriaService */
//$categoriaService = new CategoriaService();
//$categorias = $categoriaService->PesquisaTodos();
///** @var FabricanteService $fabricanteService */
//$fabricanteService = new FabricanteService();
//$fabricantes = $fabricanteService->PesquisaTodos();
///** @var SegmentoService $segmentoService */
//$segmentoService = new SegmentoService();
//$segmentos = $segmentoService->PesquisaTodos();
//
//
//if ($produtos):
//    // Produtos
//    /** @var ProdutoEntidade $produto */
//    foreach ($produtos as $produto):
//        $this->Sitemap .= '<url>' . "\r\n";
//        $this->Sitemap .= '<loc>' . HOME . SITE . '/Produtos/DetalharProduto/' . $produto->getNoProdutoUrlAmigavel() . '</loc>' . "\r\n";
//        $this->Sitemap .= '<lastmod>' . date('Y-m-d\TH:i:sP', strtotime($produto->getDtCadastro())) . '</lastmod>' . "\r\n";
//        $this->Sitemap .= '<changefreq>daily</changefreq>' . "\r\n";
//        $this->Sitemap .= '<priority>1.0</priority >' . "\r\n";
//        $this->Sitemap .= '</url>' . "\r\n";
//    endforeach;
//endif;
//
//if ($categorias):
//    // Categorias
//    /** @var CategoriaEntidade $categoria */
//    foreach ($categorias as $categoria):
//        $this->Sitemap .= '<url>' . "\r\n";
//        $this->Sitemap .= '<loc>' . PASTASITE . 'Categorias/ListarCategorias/' . $categoria->getNoCategoriaUrlAmigavel() . '</loc>' . "\r\n";
//        $this->Sitemap .= '<lastmod>' . date('Y-m-d\TH:i:sP') . '</lastmod>' . "\r\n";
//        $this->Sitemap .= '<changefreq>weekly</changefreq>' . "\r\n";
//        $this->Sitemap .= '<priority>0.9</priority >' . "\r\n";
//        $this->Sitemap .= '</url>' . "\r\n";
//    endforeach;
//endif;
//if ($fabricantes):
//    //Fabricantes
//    /** @var FabricanteEntidade $fabricante */
//    foreach ($fabricantes as $fabricante):
//        $this->Sitemap .= '<url>' . "\r\n";
//        $this->Sitemap .= '<loc>' . PASTASITE . 'Fabricantes/ListarFabricantes/' . $fabricante->getNoFabricanteUrlAmigavel() . '</loc>' . "\r\n";
//        $this->Sitemap .= '<lastmod>' . date('Y-m-d\TH:i:sP', strtotime($fabricante->getDtCadastro())) . '</lastmod>' . "\r\n";
//        $this->Sitemap .= '<changefreq>weekly</changefreq>' . "\r\n";
//        $this->Sitemap .= '<priority>0.9</priority >' . "\r\n";
//        $this->Sitemap .= '</url>' . "\r\n";
//    endforeach;
//endif;
//if ($segmentos):
//    //Segmentos
//    /** @var SegmentoEntidade $segmento */
//    foreach ($segmentos as $segmento):
//        $this->Sitemap .= '<url>' . "\r\n";
//        $this->Sitemap .= '<loc>' . PASTASITE . 'Segmentos/ListarSegmentos/' . $segmento->getNoSegmentoUrlAmigavel() . '</loc>' . "\r\n";
//        $this->Sitemap .= '<lastmod>' . date('Y-m-d\TH:i:sP') . '</lastmod>' . "\r\n";
//        $this->Sitemap .= '<changefreq>weekly</changefreq>' . "\r\n";
//        $this->Sitemap .= '<priority>0.9</priority >' . "\r\n";
//        $this->Sitemap .= '</url>' . "\r\n";
//    endforeach;
//endif;

//Contatos
$this->Sitemap .= '<url>' . "\r\n";
$this->Sitemap .= '<loc>' . HOME . 'web/Institucional/Contatos</loc>' . "\r\n";
$this->Sitemap .= '<lastmod>' . date('Y-m-d\TH:i:sP') . '</lastmod>' . "\r\n";
$this->Sitemap .= '<changefreq>monthly</changefreq>' . "\r\n";
$this->Sitemap .= '<priority>0.8</priority >' . "\r\n";
$this->Sitemap .= '</url>' . "\r\n";

//Sobre Nós
$this->Sitemap .= '<url>' . "\r\n";
$this->Sitemap .= '<loc>' . HOME . 'web/Institucional/SobreNos</loc>' . "\r\n";
$this->Sitemap .= '<lastmod>' . date('Y-m-d\TH:i:sP') . '</lastmod>' . "\r\n";
$this->Sitemap .= '<changefreq>monthly</changefreq>' . "\r\n";
$this->Sitemap .= '<priority>0.8</priority >' . "\r\n";
$this->Sitemap .= '</url>' . "\r\n";
