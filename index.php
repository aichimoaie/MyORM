<?php
namespace App\MyORM;
require __DIR__.'/vendor/autoload.php';

use App\MyORM\MigrationBuilder\MigrationDirector;
use App\MyORM\Model\Person;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();


//$person = new Person();
//$p = $person->get();
//echo json_encode($p);
//echo ($p[0]->id);

$r = new MigrationDirector('FIRST');
$r->up();

