<?php

namespace App\MyORM\Helpers;

class Convertor
{
    public static function stringToMysqlDatetime(string $date)
    {
        return date('Y-m-d H:i:s', strtotime($date));
    }
}