<?php

namespace App\MyORM\Model;

use DateTime;

class Person extends BaseModel
{

    public int $id;
    public string $firstname;
    public string $lastname;
//    public int $firstparent_id;
//    public int $secondparent_id;
    public DateTime $date; //date("Y-m-d H:i:s");

//$date = new DateTime('2000-01-01');
//echo $date->format('Y-m-d H:i:sP') . "\n";

    public function __construct()
    {
        parent::__construct('person');
    }

    //traits, etc....

    public function get()
    {
        $obj = [];
        $array = parent::get();
//         $instance = new self();

        foreach ($array as $key => $item) {
            $obj[] = (object)$item;
        }
        return $obj;
    }
}