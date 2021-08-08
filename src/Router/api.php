<?php

class api {

    private $table = array();

    public function __construct() {

        $this->table['api/person'] = new Route('Person', 'PersonController', 'index');
        $this->table['api/person'] = new Route('Person', 'PersonController','create');
        $this->table['api/person'] = new Route('Person', 'PersonController','update');
        $this->table['api/person'] = new Route('Person', 'PersonController','delete');

    }

    public function getRoute($route) {
        $route = strtolower($route);


        return $this->table[$route];
    }

}
