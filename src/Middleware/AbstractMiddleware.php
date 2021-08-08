<?php

namespace App\MyORM\Middleware;

use App\MyORM\Middleware\HandlerInterface;

abstract class AbstractMiddleware implements HandlerInterface
{
    /** @var  HandlerInterface */
    private $nextHandler;

    public function setNext(HandlerInterface $handler): HandlerInterface
    {
        $this->nextHandler = $handler;
        return $handler;
    }

    /** run the next handler */
    public function handle($data = null)
    {
        if ($this->nextHandler) {
            return $this->nextHandler->handle($data);
        }
        return null;
    }
}