<?php

namespace Application\Model;

use Application\Adapter\Conexao;
use Zend\Db\Sql\Sql;

class Anuncio
{
    protected $id_anuncio;
    protected $titulo;
    protected $descricao;
    protected $categoria;
    protected $criado_em;
    protected $atualizado_em;
    protected $preco;
    protected $vendedor_nome;
    protected $vendedor_email;
    protected $vendedor_telefone;
    protected $vendedor_estado;
    protected $vendedor_cidade;
    protected $categoria_grupo;

    function __construct()
    {

        $this->id_anuncio = null;
        $this->titulo = null;
        $this->descricao = null;
        $this->categoria = null;
        $this->preco = null;
        $this->vendedor_nome = null;
        $this->vendedor_email = null;
        $this->vendedor_telefone = null;
        $this->vendedor_estado = null;
        $this->vendedor_cidade = null;
        $this->categoria_grupo = null;
        $this->criado_em = null;
        $this->atualizado_em = null;

    }

    public function criar($titulo, $descricao, $categoria, $preco, $vendedor_nome, $vendedor_email,
                         $vendedor_telefone, $vendedor_estado, $vendedor_cidade, $categoria_grupo)
    {

        $this->titulo = $titulo;
        $this->descricao = $descricao;
        $this->categoria = $categoria;
        $this->preco = $preco;
        $this->vendedor_nome = $vendedor_nome;
        $this->vendedor_email = $vendedor_email;
        $this->vendedor_telefone = $vendedor_telefone;
        $this->vendedor_estado = $vendedor_estado;
        $this->vendedor_cidade = $vendedor_cidade;
        $this->categoria_grupo = $categoria_grupo;

        $data_atual = date('Y-m-d H:i:s');
        $this->criado_em = $data_atual;
        $this->atualizado_em = $data_atual;

    }

    public function save(){

        $adapter = Conexao::getConexao();

        $sql = new Sql($adapter);

        $insert = $sql->insert('anuncios');

        $insert->values(array('titulo' => $this->titulo, 'descricao' => $this->descricao,
            'categoria' => $this->categoria, 'criado_em' => $this->criado_em,
            'atualizado_em' => $this->atualizado_em, 'preco' => $this->preco, 'vendedor_nome' => $this->vendedor_nome,
            'vendedor_email' => $this->vendedor_email, 'vendedor_telefone' => $this->vendedor_telefone,
            'vendedor_estado' => $this->vendedor_estado, 'vendedor_cidade' => $this->vendedor_cidade,
            'categoria_grupo' => $this->categoria_grupo));

        $insertString = $sql->buildSqlString($insert);
        $result = $adapter->query($insertString, $adapter::QUERY_MODE_EXECUTE);

    }

    public function buscarAnuncioPorID($id_anuncio){

        $adapter = Conexao::getConexao();

        $sql = new Sql($adapter);

        $select = $sql->select('anuncios');

        $select->where(array('id_anuncio' => $id_anuncio));

        $selectString = $sql->buildSqlString($select);
        $result = $adapter->query($selectString, $adapter::QUERY_MODE_EXECUTE);

        $result = $result->toArray();

        $count = count($result);

        if ($count > 0){

            $this->titulo = $result[0]['titulo'];
            $this->descricao = $result[0]['descricao'];
            $this->categoria = $result[0]['categoria'];
            $this->preco = $result[0]['preco'];
            $this->vendedor_nome = $result[0]['vendedor_nome'];
            $this->vendedor_email = $result[0]['vendedor_email'];
            $this->vendedor_telefone = $result[0]['vendedor_telefone'];
            $this->vendedor_estado = $result[0]['vendedor_estado'];
            $this->vendedor_cidade = $result[0]['vendedor_cidade'];
            $this->categoria_grupo = $result[0]['categoria_grupo'];
            $this->criado_em = $result[0]['criado_em'];
            $this->atualizado_em = $result[0]['atualizado_em'];

        }

    }

    /**
     * @return mixed
     */
    public function getIdAnuncio()
    {
        return $this->id_anuncio;
    }

    /**
     * @param mixed $id_anuncio
     */
    public function setIdAnuncio($id_anuncio)
    {
        $this->id_anuncio = $id_anuncio;
    }

    /**
     * @return mixed
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param mixed $titulo
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * @return mixed
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @param mixed $categoria
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    /**
     * @return mixed
     */
    public function getCriadoEm()
    {
        return $this->criado_em;
    }

    /**
     * @param mixed $criado_em
     */
    public function setCriadoEm($criado_em)
    {
        $this->criado_em = $criado_em;
    }

    /**
     * @return mixed
     */
    public function getAtualizadoEm()
    {
        return $this->atualizado_em;
    }

    /**
     * @param mixed $atualizado_em
     */
    public function setAtualizadoEm($atualizado_em)
    {
        $this->atualizado_em = $atualizado_em;
    }

    /**
     * @return mixed
     */
    public function getPreco()
    {
        return $this->preco;
    }

    /**
     * @param mixed $preco
     */
    public function setPreco($preco)
    {
        $this->preco = $preco;
    }

    /**
     * @return mixed
     */
    public function getVendedorNome()
    {
        return $this->vendedor_nome;
    }

    /**
     * @param mixed $vendedor_nome
     */
    public function setVendedorNome($vendedor_nome)
    {
        $this->vendedor_nome = $vendedor_nome;
    }

    /**
     * @return mixed
     */
    public function getVendedorEmail()
    {
        return $this->vendedor_email;
    }

    /**
     * @param mixed $vendedor_email
     */
    public function setVendedorEmail($vendedor_email)
    {
        $this->vendedor_email = $vendedor_email;
    }

    /**
     * @return mixed
     */
    public function getVendedorTelefone()
    {
        return $this->vendedor_telefone;
    }

    /**
     * @param mixed $vendedor_telefone
     */
    public function setVendedorTelefone($vendedor_telefone)
    {
        $this->vendedor_telefone = $vendedor_telefone;
    }

    /**
     * @return mixed
     */
    public function getVendedorEstado()
    {
        return $this->vendedor_estado;
    }

    /**
     * @param mixed $vendedor_estado
     */
    public function setVendedorEstado($vendedor_estado)
    {
        $this->vendedor_estado = $vendedor_estado;
    }

    /**
     * @return mixed
     */
    public function getVendedorCidade()
    {
        return $this->vendedor_cidade;
    }

    /**
     * @param mixed $vendedor_cidade
     */
    public function setVendedorCidade($vendedor_cidade)
    {
        $this->vendedor_cidade = $vendedor_cidade;
    }

    /**
     * @return mixed
     */
    public function getCategoriaGrupo()
    {
        return $this->categoria_grupo;
    }

    /**
     * @param mixed $categoria_grupo
     */
    public function setCategoriaGrupo($categoria_grupo)
    {
        $this->categoria_grupo = $categoria_grupo;
    }




}