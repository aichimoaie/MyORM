<?php

namespace App\MyORM\MigrationBuilder;

use App\MyORM\Adapter\Config as Config;
use App\MyORM\Adapter\Factory as DatabaseFactory;

class Library_BookMigration
{
    private $builder;
    private $db;

    public function __construct($schmaName)
    {
        $this->db = DatabaseFactory::connect(Config::getInstance());
        $this->builder = new MigrationBuilder();
        $this->builder->init($schmaName);
    }

    public function up(): void
    {
        $this->builder
            ->integer('book_id')->primaryKEY()->foreignKey()->references('book')->on('id')
            ->integer('library_id')->primaryKEY()->foreignKey()->references('library')->on('id');

//        echo $this->builder->run();

        $this->db->fetch($this->builder->run());
    }

    public function down(): void
    {
//        $this->builder->truncate();
    }

}

