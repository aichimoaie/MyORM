<?php
namespace App\MyORM\Model;

use App\MyORM\Adapter\Config as Config;
use App\MyORM\Adapter\Factory as DatabaseFactory;
use App\MyORM\QueryBuilder\SQLQueryBuilder;

 class BaseModel extends SQLQueryBuilder
{
    protected $name;
    private $db;

    public function __construct($table){
        parent::__construct($table);
        $this->name = $table;
        $this->db = DatabaseFactory::connect(Config::getInstance());
    }

    public function get()
    {
        $this->select(['*']);
//        $this->limit(2,1);
        return $this->db->fetch($this->getSQL());
    }
//
//    public function save(){
//
//    }
//    public function update(){
//
//    }
//    public function delete(){
//
//    }
//    public function all(){
//
//    }
//    public function find(){
//
//    }
//    public function take(){
//
//    }
//    public function count(){
//
//    }

}