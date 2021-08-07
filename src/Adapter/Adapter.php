<?php


namespace App\MyORM\Adapter;


class Adapter implements InterfaceAdapter
{

    public function connect($configs = array())
    {
        // TODO: Implement connect() method.
    }

    public function disconnect()
    {
        // TODO: Implement disconnect() method.
    }

    public function execute($query, $bind_params = array())
    {
        // TODO: Implement execute() method.
    }

    public function hasError()
    {
        // TODO: Implement hasError() method.
    }

    public function getDriverInfo()
    {
        // TODO: Implement getDriverInfo() method.
    }

    public function getErrors()
    {
        // TODO: Implement getErrors() method.
    }

    public function escape($query)
    {
        // TODO: Implement escape() method.
    }

    public function getLastQuery()
    {
        // TODO: Implement getLastQuery() method.
    }

    public function startTransaction()
    {
        // TODO: Implement startTransaction() method.
    }

    public function commitTransaction()
    {
        // TODO: Implement commitTransaction() method.
    }

    public function rollback()
    {
        // TODO: Implement rollback() method.
    }
}