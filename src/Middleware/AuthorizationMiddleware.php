<?php

namespace App\MyORM\Middleware;

use Exception;

class AuthorizationMiddleware extends AbstractMiddleware
{

    public function handle($data = null)
    {
//        var_dump(__METHOD__ . " - checking if admin user");
        if (empty($data['is_admin'])) {
            throw new Exception("Must be admin user");
        }
        return parent::handle($data);
    }
}