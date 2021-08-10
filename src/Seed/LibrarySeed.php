<?php
namespace App\MyORM\Seed;


class LibrarySeed
{
    public static function rawSeedQuerry(): string
    {
        $date_old = '27-5-2015 23:15:23';
        $date_for_database = date ('Y-m-d H:i:s', strtotime($date_old));

        return "INSERT INTO library (name ,establishDate) VALUES ('ELEFANT', '$date_for_database'), 
                                                                 ('CARTURESTI', '$date_for_database'), 
                                                                 ('LIBRIS', '$date_for_database'),  
                                                                 ('BANATUL', '$date_for_database'), 
                                                                 ('EUROPA', '$date_for_database');";
    }
}