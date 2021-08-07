<?php

namespace App\MyORM\Adapter;
/**
 * Db Factory
 */
class Factory
{
    public static function connect(Config $config)
    {
        $className = sprintf("\\App\\MyORM\\Adapter\\%s", $config->getDriver());
        if (class_exists($className)) {
            $adapter = new $className();
            $adapter->connect($config);
            return $adapter;
        }
    }
}