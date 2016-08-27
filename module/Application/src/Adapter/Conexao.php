<?php

namespace Application\Adapter;

use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;

class Conexao {

    public static function getConexao() {
        return new Adapter(array(
            'driver' => 'Mysqli',
            'username' => 'root',
            'password' => '821000si',
            'hostname' => 'mercadobd.com.br',
            'database' => 'mercadobd'
        ));
    }

    public static function getConexaoSqlServer() {
        return new Adapter(array(
            'driver' => 'Sqlsrv',
            'servername' => '192.168.31.46',
            'database' => 'ALMOX_CROMG',
            'uid' => 'sa',
            'pwd' => '@mssql40!2104'
        ));
    }
    //put your code here
}
