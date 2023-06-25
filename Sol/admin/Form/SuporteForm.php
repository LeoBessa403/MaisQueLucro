<?php

/**
 * HistoriaForm [ FORM ]
 * @copyright (c) 2017, Leo Bessa
 */
class SuporteForm
{
    public static function Cadastrar($res = false)
    {
        $id = "cadastroSuporte";

        $formulario = new Form($id, ADMIN . "/" . UrlAmigavel::$controller . "/" . UrlAmigavel::$action,
            "Enviar", 6);

        if ($res):
            $formulario->setValor($res);
        endif;
        $class = '';
        if (!empty($res[CO_SUPORTE])):
            $formulario
                ->setType(TiposCampoEnum::HIDDEN)
                ->setId(CO_SUPORTE)
                ->setValues($res[CO_SUPORTE])
                ->CriaInpunt();
            $class = ' disabilita';
        endif;

        if (!$class) {
            $label_options = TipoAssuntoEnum::$descricao;
            $formulario
                ->setLabel("Tipo do Assunto")
                ->setId(ST_TIPO_ASSUNTO)
                ->setClasses("ob")
                ->setType(TiposCampoEnum::SELECT)
                ->setOptions($label_options)
                ->CriaInpunt();
        } else {
            $formulario
                ->setId(ST_TIPO_ASSUNTO)
                ->setClasses("disabilita")
                ->setLabel("Tipo do Assunto")
                ->CriaInpunt();
        }

        $formulario
            ->setId(DS_ASSUNTO)
            ->setClasses("ob" . $class)
            ->setLabel("Título do Suporte")
            ->CriaInpunt();

        $formulario
            ->setId(DS_CAMINHO)
            ->setType(TiposCampoEnum::SINGLEFILE)
            ->setInfo("Anexo")
            ->setLabel("Foto Imagem")
            ->CriaInpunt();

        $formulario
            ->setType(TiposCampoEnum::TEXTAREA)
            ->setClasses("ckeditor")
            ->setId(DS_MENSAGEM)
            ->setLabel("Mensagem")
            ->CriaInpunt();

        return $formulario->finalizaForm();
    }
}

?>
   