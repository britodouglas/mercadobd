<?php

/**
 * Created by PhpStorm.
 * User: douglas
 * Date: 26/08/16
 * Time: 15:53
 */

namespace Application\Model;

use Application\Adapter\Conexao;
use Zend\Db\Sql\Sql;

class Usuario
{
    protected $nome;
    protected $cpf;
    protected $telefone;
    protected $passwd;
    protected $email;
    protected $categoria;
    protected $criado_em;
    protected $atualizado_em;

    function __construct($nome, $cpf, $telefone, $passwd, $email, $categoria, $sexo)
    {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->telefone = $telefone;
        $this->passwd = $passwd;
        $this->email = $email;
        $this->categoria = $categoria;
        $this->sexo = $sexo;

        $datetimeAtual = date('Y-m-d H:i:s');

        $this->criado_em = $datetimeAtual;
        $this->atualizado_em = $datetimeAtual;

    }

    public function create(){

        $adapter = Conexao::getConexao();

        $sql = new Sql($adapter);

        $insert = $sql->insert('usuarios');

        $insert->values(array('nome' => $this->nome, 'cpf' => $this->cpf, 'criado_em' => $this->criado_em,
            'atualizado_em' => $this->atualizado_em, 'email' => $this->email, 'passwd' => $this->passwd,
            'telefone' => $this->telefone, 'categoria' => $this->categoria, 'sexo' => $this->sexo));

        $insertString = $sql->buildSqlString($insert);
        $result = $adapter->query($insertString, $adapter::QUERY_MODE_EXECUTE);

}

}