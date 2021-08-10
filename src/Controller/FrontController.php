<?php

namespace App\MyORM\Controller;

use App\MyORM\Router\routerAPI;
use ReflectionClass;

class FrontController
{

    private $controller;
    private $action;
    private $params = array();

    public function __construct(routerAPI $router)
    {
        $route = $router->getRoute($_SERVER['PATH_INFO']);
        if (is_null($route)) {
            $this->sendOutput('Route not found', 'HTTP/1.1 404 NotFound');
        }
        $this->setController($route->getController());
        $this->setAction($route->getAction());
        $this->setParams($this->getParams());
    }

    public function sendOutput($data, $httpHeaders = array())
    {
        if (is_array($httpHeaders) && count($httpHeaders)) {
            foreach ($httpHeaders as $httpHeader) {
                header($httpHeader);
            }
        }
        echo $data;
        exit;
    }

    public function setController($controllerName)
    {
        $controller = "\\App\\MyORM\\Controller\\" . $controllerName;
        if (!class_exists($controller)) {
            $this->sendOutput('Controller not found', 'HTTP/1.1 404 NotFound');
        }
        $this->controller = $controller;
        return $this;
    }

    public function setAction($action)
    {
        $reflector = new ReflectionClass($this->controller);
        if (!$reflector->hasMethod($action)) {
            $this->sendOutput('Action not found', 'HTTP/1.1 404 NotFound');
        }
        $this->action = $action;
        return $this;
    }

    protected function getParams()
    {
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET' :
                parse_str($_SERVER['QUERY_STRING'], $params);
                break;
            case 'POST' :
                $params = json_decode(file_get_contents('php://input'), true);
                break;
            case 'PUT' :
                $params = json_decode(file_get_contents('php://input'), true);
                break;
            case 'DELETE' :
                $params = json_decode(file_get_contents('php://input'), true);
                break;
        }
        return $params;
    }

    public function setParams(array $params)
    {
        $this->params = $params;
        return $this;
    }

    public function dispatchController()
    {
//        call_user_func_array(array(new $this->controller, $this->action), $this->params);
        call_user_func(array(new $this->controller, $this->action), $this->params);
    }

    public function verifyRequestMethod(string $requestMethod): bool
    {
        return $_SERVER['REQUEST_METHOD'] === $requestMethod ? true : false;
    }

    protected function getUriSegments()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = explode('/', $uri);
        return $uri;
    }
}