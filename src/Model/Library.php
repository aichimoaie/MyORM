<?php

namespace App\MyORM\Model;

use DateTime;

class Library  extends BaseModel {

    public int $id;
    public string $name;
    public string $establishDate;//public DateTime $establishDate;


    public function __construct()
    {
        parent::__construct('library');
    }

    public function toArray()
    {
        $array = [];
        foreach ($this as $key => $value) {
            $array[$key] = $value;
        }
        return ($array);
    }
}
