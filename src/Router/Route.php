<?php
namespace App\MyORM\Router;

class Route
{
    public $model;
    public $controller;
    public $action;
    public $requestType;

    public function __construct($model, $controller, $action, $requestType)
    {
        $this->model = $model;
        $this->controller = $controller;
        $this->action = $action;
        $this->requestType = $requestType;
    }

    /**
     * @return mixed
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model): void
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getController() : string
    {
        return $this->controller;
    }

    /**
     * @param mixed $controller
     */
    public function setController($controller): void
    {
        $this->controller = $controller;
    }

    /**
     * @return mixed
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action): void
    {
        $this->action = $action;
    }

    /**
     * @return mixed
     */
    public function getRequestType(): string
    {
        return $this->requestType;
    }

    /**
     * @param mixed $requestType
     */
    public function setRequestType($requestType): void
    {
        $this->requestType = $requestType;
    }
}
