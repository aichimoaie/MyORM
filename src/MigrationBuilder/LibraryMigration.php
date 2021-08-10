<?php

namespace App\MyORM\MigrationBuilder;

use App\MyORM\Adapter\Config as Config;
use App\MyORM\Adapter\Factory as DatabaseFactory;

class LibraryMigration
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
            ->dateTime('establishDate')->default('CURRENT_TIMESTAMP');


//        echo $this->builder->run();

        $this->db->fetch($this->builder->run());
    }

    public function down(): void
    {
//        $this->builder->truncate();
    }

}