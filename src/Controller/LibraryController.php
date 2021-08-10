<?php


namespace App\MyORM\Controller;


use App\MyORM\Helpers\Convertor;
use App\MyORM\Model\Library;

class LibraryController extends Controller
{
    protected $library;
    protected $LibraryService;

    public function __construct(){
        $this->library = new Library();
    }

    public function index()
    {
//        var_dump(__METHOD__);
        $this->jsonResponse($this->library->all());
    }

    //GET	api/person/{personId}
    public function show($id)
    {
//        var_dump(__METHOD__);;
        $this->jsonResponse($this->library->findOrFail($id['id']));
    }

    //post api/book
    public function store($request)
    {
        //        var_dump(__METHOD__);
        $library = new Library();
        $library->name= 'Bucharest';
        $library->establishDate = Convertor::stringToMysqlDatetime('27-8-2021 23:15:23');
        $library->save();
    }

    //PUT/PATCH	api/book/{id}
    public function update($request)
    {
//        var_dump(__METHOD__);
        $this->library->name = 'Brasov';
        $this->library->establishDate = Convertor::stringToMysqlDatetime('27-12-2025 23:15:23');;
        $this->library->updateAll()->where('id' , 1, '=')->fetch();
    }

    //DELETE	api/person/{personID}
    public function delete($request)
    {
        var_dump(__METHOD__);
        $this->library->delete()->where('id' , 1, '=')->fetch();
    }
    public function custom($request)
    {
        var_dump(__METHOD__);
//        $this->book->with('library');
    }
}