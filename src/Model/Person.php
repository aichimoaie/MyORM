<?php

namespace App\MyORM\Model;

use DateTime;
//traits, visible.... ~~~COLLECTIONS!!!??
class Person extends BaseModel
{

    public int $id;
    public string $firstname;
    public string $lastname;
    public DateTime $date; //date("Y-m-d H:i:s");


    public function __construct()
    {
        parent::__construct('person');
    }

    public function with($table){
        $this->select(['*'])->leftJoin($table)->on('person.id = ' . $table .'.id' )->leftJoin($table)->on('person.id = ' . $table .'.id' )->fetch();
    }

//    public function get()
//    {
//        $obj = [];
//        $array = parent::get();
////         $instance = new self();
//
//        foreach ($array as $key => $item) {
//            $obj[] = (object)$item;
//        }
//        return $obj;
//    }
    public function toArray()
    {
        $array = [];
        foreach ($this as $key => $value) {
            $array[$key] = $value;
        }
        return ($array);
    }
}