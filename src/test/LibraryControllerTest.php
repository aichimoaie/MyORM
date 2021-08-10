<?php
namespace App\MyORM\test;
require dirname(__DIR__, 2 ) . '/vendor/autoload.php';

use App\MyORM\Helpers\Curl;

class LibraryControllerTest
{

    public function __construct()
    {
    }

    public function testIndex()
    {
        $curl = Curl::getInstance();
        //some assert or smth
        echo $curl::getRequest('/api/library/index');
    }

    public function testShow($id)
    {
        $curl = Curl::getInstance();
        //some assert or smth
        echo $curl::getRequest('/api/library/show/?id=' . $id);
    }

    public function testStore(){
//        $data = array('name' => 'Nemtia', 'establishDate' => '19 may 1999');
        $data = array('name' => 'Nemtia2', 'establishDate' => '19 may 1999', 'books' => ([2]));

        $curl = Curl::getInstance();
        $curl::postRequest('/api/library/store', $data);

    }
    public function testUpdate() {
        $data = array( 'id' => 7,  'name' => 'nemtia 5', 'establishDate' => '17 may 1996', 'books' => ([3,5]));

        $curl = Curl::getInstance();
        $curl::postRequest('/api/library/update', $data);
    }

    public function testDelete($id){
        $dataa = array( 'id' => 7 );

        var_dump($dataa);
        $curl = Curl::getInstance();
        $curl::postRequest('/api/library/delete', $dataa);
    }

    public function testCustom(){

    }
}

//$B = new LibraryControllerTest();
//
//$B->testDelete(7);

