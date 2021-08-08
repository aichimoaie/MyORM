<?php
namespace App\MyORM\api;
use App\MyORM\Model\Person;

require dirname(__DIR__, 1).'/vendor/autoload.php';
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(dirname(__DIR__, 1));
$dotenv->load();

$person = new Person();
echo json_encode($person->get());


$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
//$input = json_decode(file_get_contents('php://input'),true);
