<?php
namespace App\MyORM\test;
require dirname(__DIR__, 2 ) . '/vendor/autoload.php';

use App\MyORM\Helpers\Curl;

class BookControllerTest
{

    public function __construct()
    {
    }

    public function testIndex()
    {
        $curl = Curl::getInstance();
        //some assert or smth
        echo $curl::getRequest('/api/book/index');
    }

    public function testShow()
    {
        $curl = Curl::getInstance();
        //some assert or smth
        $id = 2;
        echo $curl::getRequest('/api/book/show/?id=' . $id);
    }

    public function testStore(){

        $data = array('name' => 'League of leaguse', 'publishDate' => '27 may 1996', 'price' =>'44');
        //directly asigning to  libraries
        $data = array('name' => 'League of leaguse', 'publishDate' => '27 may 1996', 'price' =>'44', 'libraries' => '4, 5, 6');

        $curl = Curl::getInstance();
        $curl::postRequest('/api/book/store', $data);

    }
    public function testUpdate(){

    }

    public function testDelete(){

    }

    public function testCustom(){

    }
}

$B = new BookControllerTest();
echo $B->testStore();

