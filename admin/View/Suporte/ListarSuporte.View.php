<style>
    .btn-search {
        margin-top: 0 !important;
        padding: 6.5px 9px !important;
        font-size: 14px !important;
        position: relative !important;
    }

    .no_link {
        text-decoration: none !important;
    }

    .bg-light {
        background-color: lightgrey;
    }

</style>
<div class="main-content">
    <div class="container">
        <!-- start: PAGE HEADER -->
        <div class="row">
            <div class="col-sm-12">
                <!-- start: PAGE TITLE & BREADCRUMB -->
                <ol class="breadcrumb">
                    <li>
                        <i class="clip-file"></i>
                        <a href="#">
                            Suporte
                        </a>
                    </li>
                    <li class="active">
                        Mensagens
                    </li>
                </ol>
                <div class="page-header">
                    <h1>Suporte
                        <small>Mensagens</small>
                        <?php Valida::geraBtn(' Escrever', 'CadastroSuporte', 'btn-green',
                            'NovoSuporte', 'fa fa-envelope-o'); ?>
                    </h1>
                </div>
                <!-- end: PAGE TITLE & BREADCRUMB -->
            </div>
        </div>
        <!-- end: PAGE HEADER -->
        <!-- start: PAGE CONTENT -->
        <div class="row">
            <div class="col-md-12">
                <!-- start: INBOX PANEL -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-envelope-o"></i>
                        Inbox
                    </div>
                    <div class="panel-body messages">
                        <ul class="messages-list">
                            <li class="messages-search">
                                <?php
                                $action = HOME . UrlAmigavel::$modulo . "/" . UrlAmigavel::$controller
                                    . "/" . UrlAmigavel::$action;
                                ?>
                                <form action="<?= $action; ?>" method="post" name="pesquisa_suporte"
                                      id="pesquisa_suporte" class="form-inline">
                                    <div class="input-group">
                                        <input type="text" name="txt_pesquisa" id="txt_pesquisa"
                                               class="form-control" placeholder="Pesquisar...">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary btn-search" type="submit">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </li>
                            <?php
                            /** @var SuporteEntidade $mensagem */
                            $mensagem = $mensagem;

                            if ($mensagem) {
                                Modal::ModalConfirmaAtivacao("DeletaSuporte",
                                    'Deseja realmente Apagar esse Suporte?',
                                    $mensagem->getCoSuporte(), 'Suporte/DeletaSuporte');
                            }

                            /** @var SuporteEntidade $suporte */
                            foreach ($result as $suporte):
                                $foto = ImagemService::getImagemCoUsuario(
                                    $suporte->getCoPrimeiraMensagem()->getCoUsuario()->getCoUsuario()
                                );
                                /** @var PessoaEntidade $pessoa */
                                $pessoa = UsuarioService::getPessoaCoUsuario(
                                    $suporte->getCoPrimeiraMensagem()->getCoUsuario()->getCoUsuario()
                                );
                                $noPessoa = $pessoa->getNoPessoa();
                                echo '<a class="no_link" href="' . PASTAADMIN . 'Suporte/ListarSuporte/' .
                                    Valida::GeraParametro(CO_SUPORTE . "/" . $suporte->getCoSuporte()) . '">';
                                ?>
                                <li class="messages-item<?php
                                echo ($suporte->getCoUltimaMensagem()->getStLido() == SimNaoEnum::NAO) ?
                                    ' bg-light' : ''; ?>" id="<?= $suporte->getCoSuporte(); ?>">
                                    <?php
                                    $sexo = $pessoa->getStSexo();
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
                                    <span class="messages-item-from"><?= Valida::Resumi($noPessoa, 15); ?></span>
                                    <div class="messages-item-time">
                                    <span class="text"><?=
                                        Valida::DataShow($suporte->getCoUltimaMensagem()->getDtCadastro(), 'd/m/y H:i');
                                        ?></span>
                                    </div>
                                    <span class="messages-item-subject"><?=
                                        Valida::Resumi($suporte->getDsAssunto(), 35);
                                        ?></span>
                                    <span class="messages-item-preview"><?=
                                        strip_tags(Valida::Resumi($suporte->getCoUltimaMensagem()->getDsMensagem(), 75));
                                        ?></span>
                                </li>
                                <?php
                                echo '</a>';
                            endforeach;
                            ?>
                        </ul>

                        <div class="messages-content">
                            <?php if (!$mensagem) { ?>
                                <div class="message-header">
                                    <h1><i class="fa fa-envelope-o"></i> Selecione uma mensagem</h1>
                                </div>
                            <?php } else { ?>
                                <div class="message-header">
                                    <div class="message-time data_mensagem">
                                        <?= Valida::DataShow(
                                            $mensagem->getCoUltimaMensagem()->getDtCadastro(), 'd/m/Y H:i:s'
                                        ); ?>
                                    </div>
                                    <div class="message-from nome_mensagem">
                                        Remetente: <?=
                                        UsuarioService::getNoPessoaCoUsuario(
                                            $mensagem->getCoPrimeiraMensagem()->getCoUsuario()->getCoUsuario()
                                        ); ?>
                                    </div>
                                    <div class="message-to">
                                        Tipo de Assunto: <span
                                                style="font-weight: bolder; font-size: 1.5em;"
                                                class="tp_assunto_mensagem">
                                        <?= TipoAssuntoEnum::getDescricaoValor($mensagem->getStTipoAssunto()); ?>
                                    </span>
                                    </div>
                                    <div class="message-subject">
                                        Assunto: <span
                                                style="font-weight: bolder; font-size: 1.5em;"
                                                class="assunto_mensagem">
                                        <?= $mensagem->getDsAssunto(); ?>
                                    </span>
                                    </div>
                                    <?php
                                    if (PerfilService::perfilMaster()) {
                                        ?>
                                        <div class="message-subject">
                                            Status da Mensagem: <span
                                                    style="color: red; font-size: 1.5em;"
                                                    class="assunto_mensagem">
                                        <?= Valida::StatusLabel($mensagem->getStStatus()); ?>
                                    </span>
                                        </div>
                                    <?php } ?>
                                    <div class="message-actions">
                                        <?php
                                        if ($mensagem->getStStatus() == StatusAcessoEnum::ATIVO) {
//                                            echo '<a class="btn" title="Excluir" href=" ' . PASTAADMIN . 'Suporte/DeletaSuporte/' .
//                                                Valida::GeraParametro(CO_SUPORTE . "/" . $mensagem->getCoSuporte()) .
//                                                '"><i class="fa fa-trash-o"></i></a>';
                                            echo '<a data-toggle="modal" role="button" class="btn btn-green tooltips acao" 
                                                        id="' . $mensagem->getCoSuporte() . '" data-msg-restricao="MSG03"
                                                       href="#DeletaSuporte" data-original-title="Excluir Suporte" data-placement="top"
                                                       data-url-action="' . PASTAADMIN . 'Suporte/DeletaSuporte/">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>';
                                            echo '<a class="btn" title="Responder" href=" ' . PASTAADMIN . 'Suporte/CadastroSuporte/' .
                                                Valida::GeraParametro(CO_SUPORTE . "/" . $mensagem->getCoSuporte()) .
                                                '"><i class="fa fa-reply"></i></a>';
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="message-content">
                                    <?php
                                    $nome = "Histórico de Mensagens";
                                    $historicos = $mensagem->getCoHistoricoSuporte();
                                    require_once PARTIAL_LIBRARY . 'Admin/historico.php';
                                    ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!-- end: INBOX PANEL -->
            </div>
        </div>
        <!-- end: PAGE CONTENT-->
    </div>
</div>