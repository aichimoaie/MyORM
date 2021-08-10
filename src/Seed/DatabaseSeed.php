<?php
namespace App\MyORM\Seed;

use App\MyORM\Adapter\Config as Config;
use App\MyORM\Adapter\Factory as DatabaseFactory;

class DatabaseSeed
{
    protected $db;
    public function __construct(){
        $this->db = DatabaseFactory::connect(Config::getInstance());
    }

    public function seed(){
        $this->db->fetch(LibrarySeed::rawSeedQuerry());
        $this->db->fetch(BookSeed::rawSeedQuerry());
        $this->db->fetch(Library_BookSeed::rawSeedQuerry());
    }
}

