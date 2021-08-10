<?php

namespace App\MyORM\Controller;

interface InterfaceController
{
    public function index();

    public function show($request);

    public function store($request);

    public function update($request);

    public function delete($request);

    public function jsonResponse($array);
}