<?php

namespace App\MyORM\Middleware;


class DispatchRoutesMiddleware extends AbstractMiddleware
{

    /**
     * @inheritDoc
     */
    public function handle($data = null)
    {
//        var_dump(__METHOD__ . " dispatch Route");

        return parent::handle($data);
    }
}