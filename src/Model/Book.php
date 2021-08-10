<?php

namespace App\MyORM\Model;

use DateTime;
//traits, visible.... ~~~COLLECTIONS!!!??
class Book extends BaseModel
{

    public int $id;
    public string $name;
    public string $publishDate;//public DateTime $releaseDate;
    public string $price;
    public string $library;

    public function __construct()
    {
        parent::__construct('book');
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