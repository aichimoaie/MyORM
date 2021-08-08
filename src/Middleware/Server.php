<?php

namespace App\MyORM\Middleware;


class Server
{
    private $authenticationMiddleware;
    private $authorizationMiddleware;
    private $throttlingMiddleware;
    private $dispatchRoutesMiddleware;


    public function __construct(
        HandlerInterface $authenticationMiddleware,
        HandlerInterface $authorizationMiddleware,
        HandlerInterface $throttlingMiddleware,
        HandlerInterface $dispatchRoutesMiddleware
    ) {
        $this->authenticationMiddleware = $authenticationMiddleware;
        $this->authorizationMiddleware = $authorizationMiddleware;
        $this->throttlingMiddleware = $throttlingMiddleware;
        $this->dispatchRoutesMiddleware = $dispatchRoutesMiddleware;
    }


    public function build(): HandlerInterface
    {
        $this->authenticationMiddleware
            ->setNext($this->authorizationMiddleware)
            ->setNext($this->throttlingMiddleware)
            ->setNext($this->dispatchRoutesMiddleware);

        return $this->authenticationMiddleware;
    }

}