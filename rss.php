<?php
header('Content-Type: application/xml');
require_once 'library/Config.inc.php';
echo '<?xml version="1.0" encoding="UTF-8" ?>' . "\r\n";
echo '<rss version="2.0">' . "\r\n";
echo '<channel>' . "\r\n";
echo '<title>' . DESC . ' - ' . TITULO_SITE . '</title>' . "\r\n";
echo '<link>' . HOME . '</link>' . "\r\n";
echo '<description>' . DESC_SITE . '</description>' . "\r\n";
echo '<language>pt-br</language>' . "\r\n";

/** @var ProdutoService $produtoService */
$produtoService = new ProdutoService();
$produtos = $produtoService->PesquisaTodos();
if ($produtos):
    /** @var ProdutoEntidade $produto */
    foreach ($produtos as $produto):
        echo '<item>' . "\r\n";
        echo '<title>' . $produto->getNoProduto() . '</title>' . "\r\n";
        echo '<link>' . HOME . SITE . '/Produtos/DetalharProduto/' . $produto->getNoProdutoUrlAmigavel() . '</link>' . "\r\n";
        echo '<pubDate>' . date('D, d M Y H:i:s O', strtotime($produto->getDtCadastro())) . '</pubDate>' . "\r\n";
        echo '<description>' . $produto->getNoProduto() . ' - Fabricante: ' . $produto->getCoFabricante()->getNoFabricante() .
            '</description>' . "\r\n";
        echo '<enclosure type="image/*" url="' . HOME . '/uploads/ProdutosCapa/' .
            $produto->getCoImagem()->getDsCaminho() . '"/>' . "\r\n";

        //FB ADS PRODUCTS
        echo '<id>product_' . $produto->getCoProduto() . '</id>' . "\r\n";
        echo '<image_link>' . HOME . '/uploads/ProdutosCapa/' .
            $produto->getCoImagem()->getDsCaminho() . '</image_link>' . "\r\n";
        echo '<condition>new</condition>' . "\r\n";
        echo '<price>' . Valida::FormataMoeda(
                $produto->getUltimoCoProdutoDetalhe()->getNuPrecoVenda()
            ) . '</price>' . "\r\n";
        if ($produto->getUltimoCoProdutoDetalhe()->getNuEstoque() > 0) :
            echo '<availability>Com Estoque</availability>' . "\r\n";
        else:
            echo '<availability>Sem Estoque</availability>' . "\r\n";
        endif;
        echo '<brand>' . $produto->getCoFabricante()->getNoFabricante() . '</brand>' . "\r\n";
        echo '<google_product_category>' . $produto->getCoCategoria()->getNoCategoria() . '</google_product_category>' . "\r\n";
        echo '</item>' . "\r\n";
    endforeach;
endif;

echo '</channel>' . "\r\n";
echo '</rss>' . "\r\n";
