<?php
namespace App\MyORM\Seed;

class BookSeed
{
    public static function rawSeedQuerry(): string
    {
        $date_old = '27-5-2015 23:15:23';
        $date_for_database = date ('Y-m-d H:i:s', strtotime($date_old));

        return "INSERT INTO book (name, price, publishDate) VALUES ('DDD', '22', '$date_for_database'), 
                                                             ('POO', '22', '$date_for_database'), 
                                                             ('WEB DESIGN', '22', '$date_for_database'),  
                                                             ('COMPUTER NEWTWORKS', '22', '$date_for_database'), 
                                                             ('ERP', '22', '$date_for_database');";
    }
}