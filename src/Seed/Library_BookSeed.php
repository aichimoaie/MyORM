<?php

namespace App\MyORM\Seed;


class Library_BookSeed
{
    public static function rawSeedQuerry(): string
    {
        return "INSERT INTO library_book (library_id ,book_id) VALUES (1 , 1),
                                                                        (1, 2),
                                                                        (1, 3),
                                                                        (2 , 1),
                                                                        (2, 2),
                                                                        (3, 1),
                                                                        (4, 2);";
    }
}