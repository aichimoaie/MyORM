<?php
namespace App\MyORM;
require __DIR__.'/vendor/autoload.php';

use App\MyORM\Helpers\Convertor;
use App\MyORM\Middleware\AuthenticationMiddleware;
use App\MyORM\Middleware\AuthorizationMiddleware;
use App\MyORM\Middleware\DispatchRoutesMiddleware;
use App\MyORM\Middleware\ThrottleMiddleware;
use App\MyORM\Middleware\Server;
use App\MyORM\test\BookControllerTest;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$data = [
    'ip' => '127.0.0.1',
    'requested_uri' => '/home',
    'user_id' => 'da', /* !! */
    'is_admin' => true,
];
$builder = new Server(
    new AuthenticationMiddleware,
    new AuthorizationMiddleware,
    new ThrottleMiddleware,
    new DispatchRoutesMiddleware
);
//
try {
    $builder->build()->handle($data);
} catch (\Exception $exception){
    var_dump($exception->getMessage());
}

//$L = new LibraryMigration('library');
//$L->up();
//$B= new BookMigration('book');
//$B->up();
//$T = new Library_BookMigration('library_book');
//$T->up();

//$seed = new DatabaseSeed();
//$seed->seed();
//
//$data = '27 may 1995  ';
//echo  Convertor::stringToMysqlDatetime('27-5-2015 23:15:23');


