<?php

namespace App\MyORM\Middleware;


class ThrottleMiddleware extends AbstractMiddleware
{


    public function handle($data = null)
    {
        var_dump(__METHOD__ . " - Inside ThrottleMiddleware");
//        if (false) {
//            throw new Exception("Invalid IP");
//        }
        parent::handle($data);
    }
}