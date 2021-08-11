<?php
namespace App\MyORM\Model;

use App\MyORM\Adapter\Config as Config;
use App\MyORM\Adapter\Factory as DatabaseFactory;
use App\MyORM\QueryBuilder\SQLQueryBuilder;

abstract class BaseModel extends SQLQueryBuilder
{
    private $name;
    private $db;

    public function __construct($table){
        parent::__construct($table);
        $this->name = $table;
        $this->db = DatabaseFactory::connect(Config::getInstance());
    }
    public function fetch(){
        return $this->db->fetch($this->getSQL());
    }

    public function all(){
         $this->select(['*']);
        return $this->db->fetch($this->getSQL());
    }

     public function findOrFail($id){
         $this->select(['*'])->where('id',$id,'=');
         return $this->db->fetch($this->getSQL());
     }

    public function save(){
        $this->insert($this->toArray());
        $this->fetch($this->getSQL());
        //very coupled to mysql and classes ar still not implemented correctly
        $this->id=$this->db->lastInsertId();

    }
    public function attachTo($tableName){
        $pivotName = $this->name . "_" . $tableName;
        if($this->db->checkTableExists($pivotName) === false){
            $pivotName =  $tableName . "_" . $this->name;
            if($this->db->checkTableExists($pivotName) === false) {
                //throw error
                return ;
            }
        }
        $this->attach($pivotName, $this->toArray());
        return $this->db->fetch($this->getSQL());
    }
    public function deAtttachFrom($tableName){

        $pivotName = $this->name . "_" . $tableName;
        if($this->db->checkTableExists($pivotName) === false){
            $pivotName =  $tableName . "_" . $this->name;
            if($this->db->checkTableExists($pivotName) === false) {
                //throw error
                return ;
            }
        }
        $this->deAttach($pivotName, $this->toArray());

        echo $this->getSQL();

        return $this->db->fetch($this->getSQL());
    }

    public function updateAll()
    {
        return $this->update($this->toArray());
//        return $this->db->fetch($this->getSQL());
    }
    public function rawSQLQuerry($querry){
        $this->rawSql($querry);
        return $this->db->fetch($this->getSQL());
    }

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
    abstract protected function toArray();
}