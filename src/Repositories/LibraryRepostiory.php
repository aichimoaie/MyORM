<?php

namespace App\MyORM\Repositories;

require dirname(__DIR__, 2) . '/vendor/autoload.php';

use App\MyORM\Model\Library;

class LibraryRepostiory
{
    protected $lib;

    public function __construct()
    {
        $this->lib = new Library;
    }

    public function WithBooks(): array
    {
        //due to lack of time and simplicity will call raw sql for mom
        $libraries = $this->lib->rawSQLQuerry("select l.id,l.name,l.establishDate, GROUP_CONCAT(CONCAT ('[', JSON_OBJECT('id',IFNULL(b.id,'0'),'price',IFNULL(b.price,'0'),'name',IFNULL(b.name,'0'),'publishDate', IFNULL(b.publishDate,'0')),']')) as books from library l left join library_book lb on l.id = lb.library_id left join book b on lb.book_id = b.id group by l.id ;");
        return $libraries;
    }
}
