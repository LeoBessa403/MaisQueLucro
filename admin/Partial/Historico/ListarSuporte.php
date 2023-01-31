<style>
    .img_user {
        float: left;
        min-height: 35px;
        margin-right: 8px;
        border: 0.5px solid black;
    }

    .timeline_element {
        min-height: 250px !important;
        width: 95% !important;
        padding: 0 8px !important;
    }

    .btn-anexo {
        box-shadow: 2px 2px 6px black;
        border-radius: 100%;
    }

    .btn-anexo:hover {
        box-shadow: none;
        cursor: pointer;
    }
</style>
<?php
/** @var HistoricoSuporteEntidade $historico */
$historico = $historico;

/** @var UsuarioService $usuarioService */
$usuarioService = new UsuarioService();
/** @var UsuarioEntidade $usuario */
$usuario = $usuarioService->PesquisaUmRegistro($historico->getCoUsuario()->getCoUsuario());

/** @var ImagemService $imagemService */
$imagemService = new ImagemService();
$imagem = false;
if (!is_object($historico->getCoImagem())) {
    /** @var ImagemEntidade $imagem */
    $imagem = $imagemService->PesquisaUmRegistro($historico->getCoImagem());
}

$foto = ImagemService::getImagemCoUsuario(
    $usuario->getCoUsuario()
);
?>
<div class="content">
    <span class="img_user">
        <?php
        $sexo = $usuario->getCoPessoa()->getStSexo();
        $noPessoa = $usuario->getCoPessoa()->getNoPessoa();
        if ($sexo == "M"):
            $fotoPerfil = "avatar-homem.jpg";
        else:
            $fotoPerfil = "avatar-mulher.jpg";
        endif;
        if ($foto != "" && file_exists(PASTA_RAIZ . "uploads/usuarios/" . $foto)):
            echo Valida::GetMiniatura("usuarios/" . $foto,
                $noPessoa, 35, 35, "messages-item-avatar");
        else:
            echo '<img src="' . TIMTHUMB . '?src=' . HOME .
                'library/Imagens/' . $fotoPerfil . '&w=35&h=35"
                                    alt="' . $noPessoa . '" title="' . $noPessoa . '"
                                    class="messages-item-avatar" />';
        endif;
        ?>
    </span>
    Remetente: <b> <?= Valida::Resumi($usuario->getCoPessoa()->getNoPessoa(), 30); ?></b></br>
    Data: <b><?= Valida::DataShow($historico->getDtCadastro(), 'd/m/Y H:i'); ?></b></br></br>
    Mensagem: <b>
        <?= Valida::Resumi($historico->getDsMensagem(), 1000); ?></b></br></br>

    <?php
    if ($historico->getCoImagem()) {
        if(!$imagem){
            $img = $historico->getCoImagem()->getDsCaminho();
        }else{
            $img = $imagem->getDsCaminho();
        }
        ?>
        <a class="btn btn-bricky btn-anexo tooltips" target="_blank"
           href="<?= HOME . 'uploads/Suporte/' . $img; ?>"
           data-original-title="Ver Anexo" data-placement="right">
            <i class="clip-file-pdf"></i>
        </a>
    <?php } ?>
</div>