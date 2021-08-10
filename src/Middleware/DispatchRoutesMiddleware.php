<?php

namespace App\MyORM\Middleware;


use App\MyORM\Controller\FrontController;
use App\MyORM\Router\RouterAPI;

class DispatchRoutesMiddleware extends AbstractMiddleware
{

    /**
     * @inheritDoc
     */
    public function handle($data = null)
    {
//        var_dump(__METHOD__ . " dispatch Route");
        $frontController = new FrontController(new RouterApi);
        $frontController->dispatchController();

        return parent::handle($data);
    }
}