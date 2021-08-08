<?php

namespace App\MyORM\Middleware;

interface HandlerInterface
{
    /** set the next handler: */
    public function setNext(HandlerInterface $handler): HandlerInterface;

    /** run this handler's code */
    public function handle($data = null);
}