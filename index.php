<?php
namespace App\MyORM;
require __DIR__.'/vendor/autoload.php';

use App\MyORM\Middleware\AuthenticationMiddleware;
use App\MyORM\Middleware\AuthorizationMiddleware;
use App\MyORM\Middleware\DispatchRoutesMiddleware;
use  App\MyORM\Middleware\Middelware2;
use App\MyORM\Middleware\Server;
use App\MyORM\Middleware\ThrottleMiddleware;
use App\MyORM\MigrationBuilder\MigrationDirector;
use App\MyORM\Model\Person;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();


//$person = new Person();
//$p = $person->get();
//echo json_encode($p);
//echo ($p[0]->id);
//
//$r = new MigrationDirector('FIRST');
//$r->up();
//
//$method = $_SERVER['REQUEST_METHOD'];
//$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));



//$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
//$uri = explode( '/', $uri );
//var_dump($_SERVER['REQUEST_URI']);
//var_dump($_SERVER['REQUEST_METHOD']);

$data = [
    'ip' => '127.0.0.1',
    'requested_uri' => '/home',
    'user_id' => 'da', /* !! */
    'is_admin' => false,
];
$builder = new Server(
    new AuthenticationMiddleware,
    new AuthorizationMiddleware,
    new ThrottleMiddleware,
    new DispatchRoutesMiddleware
);

try {
    $builder->build()->handle($data);
} catch (\Exception $exception){
    var_dump($exception->getMessage());
}

//if ((isset($uri[2]) && $uri[2] != 'user') || !isset($uri[3])) {
//    header("HTTP/1.1 404 Not Found");
//    exit();
//}


//$objFeedController = new UserController();
//$strMethodName = $uri[3] . 'Action';
//$objFeedController->{$strMethodName}();
