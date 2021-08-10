<?php

namespace App\MyORM\MigrationBuilder;

use App\MyORM\Adapter\Config as Config;
use App\MyORM\Adapter\Factory as DatabaseFactory;

class BookMigration
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
            ->bigIncrements('id')
            ->stringg('name')
            ->float('price')//SHOULD USE DECIMAL
            ->dateTime('publishDate')->default('CURRENT_TIMESTAMP');

//        echo $this->builder->run();

        $this->db->fetch($this->builder->run());
    }

    public function down(): void
    {
//        $this->builder->truncate();
    }

}