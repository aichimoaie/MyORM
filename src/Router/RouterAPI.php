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




        $this->table['/api/book/index'] = new Route('Book', 'BookController', 'index', 'GET');
        $this->table['/api/book/show/'] = new Route('Book', 'BookController', 'show', 'GET');
        $this->table['/api/book/store'] = new Route('Book', 'BookController', 'store', 'POST');
        $this->table['/api/book/update'] = new Route('Book', 'BookController', 'update', 'PUT');
        $this->table['/api/book/delete'] = new Route('Book', 'BookController', 'delete', 'DELETE');
        $this->table['/api/book/custom'] = new Route('Book', 'BookController', 'custom', 'GET');

        $this->table['/api/library/index'] = new Route('Library', 'LibraryController', 'index', 'GET');
        $this->table['/api/library/show/'] = new Route('Library', 'LibraryController', 'show', 'GET');
        $this->table['/api/library/store'] = new Route('Library', 'LibraryController', 'store', 'POST');
        $this->table['/api/library/update'] = new Route('Library', 'LibraryController', 'update', 'PUT');
        $this->table['/api/library/delete'] = new Route('Library', 'LibraryController', 'delete', 'DELETE');
        $this->table['/api/library/custom'] = new Route('Library', 'LibraryController', 'custom', 'GET');

        //authorized routes
        $this->table['/auth/api/book/index'] = new Route('Book', 'BookController', 'index', 'GET');
        $this->table['/auth/api/book/show/'] = new Route('Book', 'BookController', 'show', 'GET');
        $this->table['/auth/api/book/store'] = new Route('Book', 'BookController', 'store', 'POST');
        $this->table['/auth/api/book/update'] = new Route('Book', 'BookController', 'update', 'PUT');
        $this->table['/auth/api/book/delete'] = new Route('Book', 'BookController', 'delete', 'DELETE');
        $this->table['/auth/api/book/custom'] = new Route('Book', 'BookController', 'custom', 'GET');

        $this->table['/auth/api/library/index'] = new Route('Library', 'LibraryController', 'index', 'GET');
        $this->table['/auth/api/library/show/'] = new Route('Library', 'LibraryController', 'show', 'GET');
        $this->table['/auth/api/library/store'] = new Route('Library', 'LibraryController', 'store', 'POST');
        $this->table['/auth/api/library/update'] = new Route('Library', 'LibraryController', 'update', 'PUT');
        $this->table['/auth/api/library/delete'] = new Route('Library', 'LibraryController', 'delete', 'DELETE');
        $this->table['/auth/api/library/custom'] = new Route('Library', 'LibraryController', 'custom', 'GET');
    }

    public function getRoute($route)
    {
        return $this->table[strtolower($route)];
    }
}
