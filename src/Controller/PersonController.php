<?php


namespace App\MyORM\Controller;


use App\MyORM\Model\Person;

class PersonController extends Controller
{
    protected $person;
    public function __construct()
    {
        $this->person = new Person;
//        var_dump(__METHOD__ . " PersonControlleConstructor");
    }

    //GET	api/Person
    public function index()
    {
//        var_dump(__METHOD__ . " PersonControllerIndex");
        $persons = $this->person->all();
        $this->jsonResponse($persons);
    }

    //GET	api/person/{personId}
    public function show($id)
    {
//        var_dump(__METHOD__ . " PersonControllerSHOW(". $id['id']. ")" );
        $person = $this->person->findOrFail($id['id']);

        $person = new Person();
        $person->firstname = 'cv';
        $person->lastname = 'c3v';
        $person->save();
//        $this->jsonResponse($person);
    }

    //post api/person
    public function store($request)
    {
        $person = new Person();
        $person->firstname = $request['firstname'];
        $person->lastname = $request['lastname'];
        $person->firstparent_id = $request['firstparent_id'];
        $person->secondparent_id = $request['secondparent_id'];

        var_dump(__METHOD__ . "    " . $request['email']);
    }

    //PUT/PATCH	api/person/{personID}
    public function update($request)
    {
//        var_dump(__METHOD__ . " " . $request['email']);
//        $this->person->findOrFail(2) ;
        $this->person->firstname = 'cv';
        $this->person->lastname = 'c3v';
        $this->person->updateAll()->where('id' , 1, '=')->fetch();
    }

    //DELETE	api/person/{personID}
    public function delete($request)
    {
        var_dump(__METHOD__ . " " . $request['email']);
        $this->person->delete()->where('id' , 1, '=')->fetch();
    }

    public function custom($request)
    {
        var_dump(__METHOD__ . " PersonControllerCustom");
        $this->person->with('books');
    }

}