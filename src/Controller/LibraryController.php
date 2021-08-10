<?php


namespace App\MyORM\Controller;


use App\MyORM\Helpers\Convertor;
use App\MyORM\Model\Library;

class LibraryController extends Controller
{
    protected $library;
    protected $LibraryService;

    public function __construct(){
        $this->library = new Library;
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
//        $this->jsonResponse($this->library->findOrFail($id['id']));
        $library = $this->library->select(['library.id as libId', 'library.name as libName','library.establishDate as establishDate' ,'book.id as bookId' , 'book.name as bookName', 'book.publishDate as publishDate'])
            ->leftJoin('library_book')->on('library_book.library_id = library.id')
            ->leftJoin('book')->on('library_book.book_id = book.id')
            ->where('library.id', $id['id'], '=')->fetch();
        $this->jsonResponse($library);
    }

    //post api/book
    public function store($request)
    {
        //        var_dump(__METHOD__);
        $library = new Library();
        $library->name = $request['name'];
        $library->establishDate = Convertor::stringToMysqlDatetime($request['establishDate']);
        $library->save();

        //may change later
        if (!is_null($request['books'])) {
            $libraryId = $library->id;
            foreach ($request['books'] as $bookId) {
                $_library = new Library();
                $_library->library_id = $libraryId;
                $_library->book_id = $bookId;
                $_library->attachTo('book');
            }
        }
    }

    //PUT/PATCH	api/book/{id}
    public function update($request)
    {
        var_dump(__METHOD__);
        $this->library->name = $request['name'];
        $this->library->establishDate = Convertor::stringToMysqlDatetime($request['establishDate']);
        $this->library->updateAll()->where('id', $request['id'], '=')->fetch();

        //for sure will change later
        if (!is_null($request['books'])) {
            $libraryId = $request['id'];
            $storedBooks = $this->library->select(['book.id'])->leftJoin('library_book')->on(
                'library_book.library_id = library.id'
            )->leftJoin('book')->on('library_book.book_id = book.id')->where('library.id', $libraryId, '=')->notNull('book.id')->fetch();


            foreach ($storedBooks as $key => $curBook) {
                if (in_array($curBook['id'], $request['books']) === false) {
                    //remove  from pivot table db
                    $_library = new Library();
                    $_library->book_id = $curBook['id'];
                    $_library->library_id = $libraryId;
                    $_library->deAtttachFrom('book');
                } else {
                    ///if already exist, remove from $request libraries
                    array_splice($request['books'], array_search($curBook['id'], $request['books']), 1);
                }
            }
        }
        foreach ($request['books'] as $bookId) {
            $_library = new Library();
            $_library->book_id = $bookId;
            $_library->library_id = $libraryId;
            $_library->attachTo('book');
        }

    }

    //DELETE
    public function delete($request)
    {
        var_dump(__METHOD__);
        $this->library->delete()->where('id' , $request['id'], '=')->fetch();

    }
    public function custom($request)
    {
        var_dump(__METHOD__);
//        $this->book->with('library');
    }
}