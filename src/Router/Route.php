<?php


class Route
{
    public $model;
    public $controller;
    public $action;

    public function __construct($model, $controller , $action)
    {
        $this->model = $model;
        $this->controller = $controller;
        $this->action = $action;

    }
}
