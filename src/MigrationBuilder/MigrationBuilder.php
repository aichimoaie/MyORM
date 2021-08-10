<?php

namespace App\MyORM\MigrationBuilder;

use stdClass;

class MigrationBuilder implements InterfaceMigrationBuilder
{
    protected $Schema;

    public function __construct()
    {
        $this->reset();
    }

    protected function reset(): void
    {
        $this->Schema = new stdClass();
    }

    public function init($schemaName)
    {
        $this->Schema->base = "CREATE TABLE  `" . $schemaName . "` (";
    }

    public function run(): string
    {
        $sql = $this->Schema->base;
        $constraints = $this->Schema->constraints;
        if (!empty($constraints)) {
            if (!empty($constraints['PRIMARY_KEY'])) {
                $pkColumns = implode('`,`', $constraints['PRIMARY_KEY']);
                $sql .= "PRIMARY KEY (`" . $pkColumns . "`),";
            }

//CONSTRAINT FK_PersonOrder FOREIGN KEY (PersonID)
//REFERENCES Persons(PersonID)
            if (!empty($constraints['FOREIGN_KEY'])) {
                foreach ($constraints['FOREIGN_KEY'] as $key => $fk_constraint) {
                    $sql .= "CONSTRAINT " . $key . " FOREIGN KEY (`" . $fk_constraint['col_name'] . "`) 
                    REFERENCES " . $fk_constraint['ref_table_name'] . " (`" . $fk_constraint['ref_col_name'] . "`),";
//missing on update.
                }
            }
            if (!empty($constraints['UNIQUE'])) {
                $pkColumns = implode('`,`', $constraints['UNIQUE']);
                $sql .= "CONSTRAINT CONSTRAINT_UNIQ UNIQUE (`" . $pkColumns . "`),";
            }
        }

        $sql = $this->removeLastComma($sql);
        $sql .= ") ENGINE=InnoDB DEFAULT CHARSET=utf8;";
        return $sql;
    }

    public function removeLastComma($SQLQuerryString)
    {
        return substr_replace($SQLQuerryString, " ", -1);
    }

    public function bigIncrements($col_name = 'id'): InterfaceMigrationBuilder
    {
        if (isset($this->Schema->hasAutoIncrementsField)) {
            echo 'Incorrect table definition; there can be only one auto column and it must be defined as a key';
            //ofc there should be an event to stop the entire builder
            return $this;
        }
        $this->Schema->base .= "`" . $col_name . "` int NOT NULL AUTO_INCREMENT,";
        $this->Schema->constraints['PRIMARY_KEY'][] = $col_name;
        return $this;
    }

    public function boolean($col_name): InterfaceMigrationBuilder
    {
        $this->Schema->base .= "`" . $col_name . "` BOOLEAN,";
        return $this;
    }

    public function stringg($col_name): InterfaceMigrationBuilder
    {
        $this->Schema->base .= "`" . $col_name . "` VARCHAR(255),";
        return $this;
    }

    public function integer($col_name): InterfaceMigrationBuilder
    {
        $this->Schema->base .= "`" . $col_name . "` INT,";
        return $this;
    }


    public function primaryKey($col_name = 'undefined'): InterfaceMigrationBuilder
    {
        $sql = $this->Schema->base;
        $sql = $this->removeLastComma($sql);
        $sql .= "NOT NULL,";

        if ($col_name === 'undefined') {
            preg_match_all('/\`(.*?)\`/', $sql, $matches);
            $col_name = end($matches[1]);
        }
        $this->Schema->constraints['PRIMARY_KEY'][] = $col_name;
        $this->Schema->base = $sql;
        return $this;
    }

    public function unique($col_name = 'undefined'): InterfaceMigrationBuilder
    {
        $sql = $this->Schema->base;
        $sql = $this->removeLastComma($sql);
        $sql .= "NOT NULL,";

        if ($col_name === 'undefined') {
            preg_match_all('/\`(.*?)\`/', $sql, $matches);
            $col_name = end($matches[1]);
        }
        $this->Schema->constraints['UNIQUE'][] = $col_name;
        $this->Schema->base = $sql;
        return $this;
    }

    public function foreignKey($col_name = null): InterfaceMigrationBuilder
    {
        $sql = $this->Schema->base;

        if (is_null($col_name)) {
            preg_match_all('/\`(.*?)\`/', $sql, $matches);
            $col_name = end($matches[1]);
        }

        $FK_NUMBER = isset($this->Schema->constraints['FOREIGN_KEY']) == true ? count(
            $this->Schema->constraints['FOREIGN_KEY']
        ) : 0;
        $FK_CONSTRAINT_NAME = 'FK_' . $col_name . '_' . $FK_NUMBER;

        $this->Schema->constraints['FOREIGN_KEY'][$FK_CONSTRAINT_NAME]['col_name'] = $col_name;
        return $this;
    }

    public function references($table_name): InterfaceMigrationBuilder
    {
        $lastFK = array_key_last($this->Schema->constraints['FOREIGN_KEY']);
        $this->Schema->constraints['FOREIGN_KEY'][$lastFK]['ref_table_name'] = $table_name;
        return $this;
    }

    public function on($col_name): InterfaceMigrationBuilder
    {
        $lastFK = array_key_last($this->Schema->constraints['FOREIGN_KEY']);
        $this->Schema->constraints['FOREIGN_KEY'][$lastFK]['ref_col_name'] = $col_name;
        return $this;
    }

    public function onDelete($col_name)
    {
        $lastFK = array_key_last($this->Schema->constraints['FOREIGN_KEY']);
        $this->Schema->constraints['FOREIGN_KEY'][$lastFK]['onDelete'] = $col_name;
        return $this;
    }

    public function onUpdate($col_name)
    {
        $lastFK = array_key_last($this->Schema->constraints['FOREIGN_KEY']);
        $this->Schema->constraints['FOREIGN_KEY'][$lastFK]['onUpdate'] = $col_name;
        return $this;
    }

    public function dateTime(string $col_name): InterfaceMigrationBuilder
    {
        $this->Schema->base .= "`" . $col_name . "` DATETIME NOT NULL,";
        return $this;
    }


    public function float($col_name): InterfaceMigrationBuilder
    {
        $this->Schema->base .= "`" . $col_name . "` FLOAT,";
        return $this;
    }

    public function removeLastComma2(&$SQLQuerryString)
    {
        substr_replace($SQLQuerryString, " ", -1);
        return $SQLQuerryString;
    }

    public function default($param): InterfaceMigrationBuilder
    {
        $sql = $this->removeLastComma($this->Schema->base);
        $sql .= ' DEFAULT ' . $param . ',';
        $this->Schema->base = $sql;
        return $this;
    }

    public function notNull(): InterfaceMigrationBuilder
    {
        $sql = $this->removeLastComma($this->Schema->base);
        $sql .= ' NOT NULL,';
        $this->Schema->base = $sql;
        return $this;
    }

    //
//    public function index($col_name)
//    {
//    it may be useful, but i am thinking at repostitory pattern for the moment
//    }
//
//    public function timestamps($col_name)
//    {
//    }
}