<?php


namespace App\MyORM\Controller;


use App\MyORM\Helpers\Convertor;
use App\MyORM\Model\Book;

class BookController extends Controller
{
    protected $book;
    public function __construct()
    {
        $this->book = new Book;
    }

    public function index()
    {
//        var_dump(__METHOD__);
        $this->jsonResponse($this->book->all());
    }

    //GET	api/person/{personId}
    public function show($id)
    {
//        var_dump(__METHOD__);
        $person = $this->book->findOrFail($id['id']);
        $this->jsonResponse($person);
    }

    //post api/book
    public function store($request)
    {
        $book = new Book();
        $book->price = $request['price'];
        $book->name = $request['name'];
        $book->publishDate = Convertor::stringToMysqlDatetime($request['publishDate']);
        $book->save();
        //may change later
        if(!is_null($request['libraries'])){

        }
    }

    //PUT/PATCH	api/book/{id}
    public function update($request)
    {
//        var_dump(__METHOD__);
        $this->book->name = 'Law of laws';
        $this->book->releaseDate = Convertor::stringToMysqlDatetime('27-5-2025 23:15:23');;
        $this->book->updateAll()->where('id' , 1, '=')->fetch();
    }

    //DELETE	api/person/{personID}
    public function delete($request)
    {
        var_dump(__METHOD__);
        $this->book->delete()->where('id' , 1, '=')->fetch();
    }
    public function custom($request)
    {
        var_dump(__METHOD__);
//        $this->book->with('library');
    }

    public function asignBookInLibrary(){

    }
}