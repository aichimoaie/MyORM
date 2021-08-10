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

    public function testShow($id)
    {
        $curl = Curl::getInstance();
        //some assert or smth
        echo $curl::getRequest('/api/book/show/?id=' . $id);
    }

    public function testStore(){
        $data = array('name' => 'League of leaguse', 'publishDate' => '27 may 1996', 'price' =>'44', 'libraries' => ([1,4, 5]));

        $curl = Curl::getInstance();
        $curl::postRequest('/api/book/store', $data);

    }
    public function testUpdate() {
        $data = array( 'id' => 58,  'name' => 'League of leaguse', 'publishDate' => '27 may 1996', 'price' =>'44', 'libraries' => ([3,4,5]));
//        $data = array( 'id' =>57,  'name' => 'League of sannicolau', 'publishDate' => '21 may 1996', 'price' =>'42');

        $curl = Curl::getInstance();
        $curl::postRequest('/api/book/update', $data);
    }

    public function testDelete($id){
        $data = array( 'id' => $id );

        $curl = Curl::getInstance();
        $curl::postRequest('/api/book/delete', $data);
    }

    public function testCustom(){

    }
}

//$B = new BookControllerTest();

//$B->testStore();
//$B->testDelete(1);

