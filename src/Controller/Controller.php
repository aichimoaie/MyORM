<?php
namespace App\MyORM\Controller;

class Controller implements InterfaceController
{

    //GET	api/Person
    public function index()
    {
    }

    //GET	api/person/{personId}
    public function show($request)
    {
    }

    //post api/person
    public function store($request)
    {
    }

    //PUT/PATCH	api/person/{personID}
    public function update($request)
    {
    }

    //DELETE	api/person/{personID}
    public function delete($request)
    {
    }

    public function jsonResponse($array){
//        echo 'aci';
        header('Content-Type: application/json');
        echo json_encode($array, JSON_UNESCAPED_SLASHES);
    }
}