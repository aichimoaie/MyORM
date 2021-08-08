<?php

namespace App\MyORM\Middleware;

use Exception;

class AuthenticationMiddleware extends AbstractMiddleware
{
    public function handle($data = null)
    {
//        var_dump(__METHOD__ . " - checking that user is logged in");
        if (empty($data['user_id'])) {
            throw new Exception("Must be logged in");
        }

        return parent::handle($data);
    }
}