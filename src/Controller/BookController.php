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
        $book = $this->book->select(['*'])->leftJoin('library_book')->on('library_book.book_id = book.id')->where(
            'id',
            $id['id'],
            '='
        )->fetch();
//        $person = $this->book->findOrFail($id['id']);
        $this->jsonResponse($book);
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
        if (!is_null($request['libraries'])) {
            $bookId = $book->id;
            foreach ($request['libraries'] as $libId) {
                $_book = new Book();
                $_book->library_id = $libId;
                $_book->book_id = $bookId;
                $_book->attachTo('library');
            }
        }
    }

    //PUT/PATCH	api/book/{id}
    public function update($request)
    {
        var_dump(__METHOD__);
        $this->book->price = $request['price'];
        $this->book->name = $request['name'];
        $this->book->publishDate = Convertor::stringToMysqlDatetime($request['publishDate']);
        $this->book->updateAll()->where('id', $request['id'], '=')->fetch();

        //for sure will change later
        if (!is_null($request['libraries'])) {
            $bookId = $request['id'];
            $storedLibs = $this->book->select(['library.id'])->leftJoin('library_book')->on(
                'library_book.book_id = book.id'
            )->leftJoin('library')->on('library_book.library_id = library.id')->where('book.id', $bookId, '=')->notNull(
                'library.id'
            )->fetch();
            foreach ($storedLibs as $key => $curLib) {
                //                if(empty($request['libraries'])){
//                    $_book = new Book();
//                    $_book->library_id = $curLib['id'];
//                    $_book->book_id = $bookId;
//                    $_book->deAtttachFrom('library');
//                    continue ;
//                }
                if (in_array($curLib['id'], $request['libraries']) === false) {
                    //remove  from pivot table db
                    $_book = new Book();

                    $_book->library_id = $curLib['id'];
                    $_book->book_id = $bookId;
                    $_book->deAtttachFrom('library');
                } else {
                    ///if already exist, remove from $request libraries
                    array_splice($request['libraries'], array_search($curLib['id'], $request['libraries']), 1);
                }
            }
        }
        foreach ($request['libraries'] as $libId) {
            $_book = new Book();
            $_book->library_id = $libId;
            $_book->book_id = $bookId;
            $_book->attachTo('library');
        }
    }

    //DELETE	api/person/{personID}
    public function delete($request)
    {
        var_dump(__METHOD__);

        //on delete cascade feature
        $this->book->delete()->where('id', $request['id'], '=')->fetch();
        var_dump($this->book->getSQL());
    }

    public function custom($request)
    {
        var_dump(__METHOD__);
//        $this->book->with('library');
    }

    public function asignBookInLibrary()
    {
    }
}