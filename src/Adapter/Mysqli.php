<?php

namespace App\MyORM\Adapter;

use App\MyORM\Adapter\Config as Config;

/**
 * MySQLi Adapter
 */
class Mysqli implements InterfaceAdapter
{

    private $_mysqli;

    public function connect(Config $config)
    {
        $this->_mysqli = new \mysqli(
            $config->getHost(), $config->getUser(), $config->getPassword(), $config->getDbname()
        );
    }

    public function fetch($sql)
    {
        return $this->_mysqli->query($sql)->fetch_object();
    }

}