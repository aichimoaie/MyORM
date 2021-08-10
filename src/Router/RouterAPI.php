<?php

namespace App\MyORM\Router;

class RouterAPI
{

    private $table = array();

    public function __construct()
    {
        $this->table['/api/person/index'] = new Route('Person', 'PersonController', 'index', 'GET');
        $this->table['/api/person/show/'] = new Route('Person', 'PersonController', 'show', 'GET');


        $this->table['/api/person/store'] = new Route('Person', 'PersonController', 'store', 'POST');
        $this->table['/api/person/update'] = new Route('Person', 'PersonController', 'update', 'PUT');
        $this->table['/api/person/delete'] = new Route('Person', 'PersonController', 'delete', 'DELETE');
        $this->table['/api/person/custom'] = new Route('Person', 'PersonController', 'custom', 'GET');

        //auth routes
        $this->table['/auth/api/person/index'] = new Route('Person', 'PersonController', 'index', 'GET');
        $this->table['/auth/api/person/show/'] = new Route('Person', 'PersonController', 'show', 'GET');
        $this->table['/auth/api/person/store'] = new Route('Person', 'PersonController', 'store', 'POST');
        $this->table['/auth/api/person/update'] = new Route('Person', 'PersonController', 'update', 'PUT');
        $this->table['/auth/api/person/delete'] = new Route('Person', 'PersonController', 'delete', 'DELETE');
        $this->table['/auth/api/person/Custom'] = new Route('Person', 'PersonController', 'Custom', 'GET');
    }

    public function getRoute($route)
    {
        return $this->table[strtolower($route)];
    }
}
