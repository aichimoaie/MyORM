<?php

namespace App\MyORM\Adapter;

use App\MyORM\Adapter\Config as Config;
use PDOException;

/**
 * MySQLi Adapter
 */
class Pdo implements InterfaceAdapter
{
    private static $instance;
    private $_dbh;

//    private function __construct(){
//
//    }

    public function connect(Config $config)
    {
//        $this->_dbh = new \PDO("mysql:host={$config->getHost()}; dbname={$configname}", $this->user,$this->pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        $dsn = sprintf('mysql:host=%s;dbname=%s', $config->getHost(), $config->getDbName());
        try {
            $this->_dbh = new \PDO(
                $dsn,
                $config->getUser(),
                $config->getPassword(),
                array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")
            );
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function fetch($sql)
    {
        $sth = $this->_dbh->prepare($sql);
        $sth->execute();
        return $sth->fetchAll(\PDO::FETCH_ASSOC);
//        return $sth->fetchObject( \PDO::FETCH_CLASS'App\\MyORM\\Model\\Person');
//        return $sth->fetchAll( \PDO::FETCH_CLASS,'App\\MyORM\\Model\\Person');

    }

    public function lastInsertId()
    {
        return $this->_dbh->lastInsertId();
    }

    function checkTableExists($tableName) : bool
    {
        $results = $this->_dbh->query("SHOW TABLES LIKE '$tableName'");
        return $results->rowCount() > 0 ? true : false;
    }

}