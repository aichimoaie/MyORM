<?php

namespace App\MyORM\Middleware;


class IPCheckHandler extends AbstractMiddleware
{
    //shod integrate with redis
    const BANNED_IPS = ['123.123.123.123'];

    public function handle($data = null)
    {
        var_dump(__METHOD__ . " - checking that request is not from banned IP");
        if (in_array($data['ip'], self::BANNED_IPS)) {
            throw new Exception("Invalid IP");
        }
        return parent::handle($data);
    }
}