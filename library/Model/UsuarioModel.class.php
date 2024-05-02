<?php

/**
 * UsuarioModel.class [ MODEL ]
 * @copyright (c) 2017, Leo Bessa
 */
class  UsuarioModel extends AbstractModel
{
    public function __construct()
    {
        parent::__construct(UsuarioEntidade::ENTIDADE);
    }

    public function PesquisaAvancada($Condicoes)
    {
        $tabela = UsuarioEntidade::TABELA . " usu" .
            " inner join " . PessoaEntidade::TABELA . " pes" .
            " on usu." . PessoaEntidade::CHAVE . " = pes." . PessoaEntidade::CHAVE;

        $campos = "usu.*";
        $pesquisa = new Pesquisa();
        $where = $pesquisa->getClausula($Condicoes);
        $pesquisa->Pesquisar($tabela, $where, null, $campos);
        $usuarios = [];
        /** @var UsuarioEntidade $usuario */
        foreach ($pesquisa->getResult() as $usuario) {
            $usu[0] = $usuario;
            $usuarios[] = $this->getUmObjeto(UsuarioEntidade::ENTIDADE, $usu);
        }
        return $usuarios;
    }

    public function PesquisaUsuarioLogar($dados)
    {
        $tabela = "TB_PESSOA pes
                             left join TB_CONTATO con  on con.co_contato = pes.co_contato
                             left join TB_USUARIO usu on usu.co_pessoa = pes.co_pessoa
                             left join TB_ASSINANTE ass on ass.co_assinante = usu.co_assinante
                             left join TB_IMAGEM img on pes.co_imagem = img.co_imagem";

        $campos = "usu.st_status, usu.co_usuario, img.ds_caminho, pes.nu_cpf, pes.no_pessoa,
       usu.st_troca_senha, pes.st_sexo, usu.co_assinante, ass.dt_expiracao, ass.st_dados_complementares";
        $pesquisa = new Pesquisa();
        $where = $pesquisa->getClausula($dados);
        $pesquisa->Pesquisar($tabela, $where, null, $campos);
        return $pesquisa->getResult()[0];
    }

    public function Deleta($coUsuario)
    {
        /** @var PDO $PDO */
        $PDO = $this->getPDO();
        $PDO->beginTransaction();

        /** @var UsuarioEntidade $usuario */
        $usuario = $this->PesquisaUmRegistro($coUsuario);
        $this->Deleta($coUsuario);

        /** @var PessoaModel $PessoaModel */
        $PessoaModel = new PessoaModel();
        $PessoaModel->Deleta($usuario->getCoPessoa()->getCoPessoa());

        /** @var EnderecoModel $EnderecoModel */
        $EnderecoModel = new EnderecoModel();
        $EnderecoModel->Deleta($usuario->getCoPessoa()->getCoEndereco()->getCoEndereco());

        /** @var ContatoModel $ContatoModel */
        $ContatoModel = new ContatoModel();
        $ContatoModel->Deleta($usuario->getCoPessoa()->getCoContato()->getCoContato());

        /** @var ImagemModel $ImagemModel */
        $ImagemModel = new ImagemModel();
        $usuario = $ImagemModel->Deleta($usuario->getCoImagem()->getCoImagem());
        if ($usuario) {
            $PDO->commit();
        } else {
            $PDO->rollBack();
        }
        return $usuario;
    }

    public function getNoPessoaCoUsuario($coUsuario)
    {
        $tabela = UsuarioEntidade::TABELA . " usu" .
            " inner join " . PessoaEntidade::TABELA . " pes" .
            " on usu." . PessoaEntidade::CHAVE . " = pes." . PessoaEntidade::CHAVE;

        $campos = "pes.". NO_PESSOA;
        $pesquisa = new Pesquisa();
        $where = $pesquisa->getClausula([CO_USUARIO => $coUsuario]);
        $pesquisa->Pesquisar($tabela, $where, null, $campos);
        return $pesquisa->getResult()[0][NO_PESSOA];
    }

    public function getPessoaCoUsuario($coUsuario)
    {
        $tabela = UsuarioEntidade::TABELA . " usu" .
            " inner join " . PessoaEntidade::TABELA . " pes" .
            " on usu." . PessoaEntidade::CHAVE . " = pes." . PessoaEntidade::CHAVE;

        $campos = "usu.*";
        $pesquisa = new Pesquisa();
        $where = $pesquisa->getClausula([CO_USUARIO => $coUsuario]);
        $pesquisa->Pesquisar($tabela, $where, null, $campos);
        /** @var UsuarioEntidade $usuario */
        $usuario = $this->getUmObjeto(UsuarioEntidade::ENTIDADE, $pesquisa->getResult());
        return $usuario->getCoPessoa();
    }

}