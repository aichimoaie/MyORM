<?php

namespace App\MyORM\QueryBuilder;

use Exception;
use stdClass;

class SQLQueryBuilder implements InterfaceSQLQueryBuilder
{
    private $table;
    private $query;

    public function __construct($table)
    {
        $this->table = $table;
    }

    /**
     * Build a base SELECT query.
     */
    public function select(array $fields): SQLQueryBuilder
    {
        $this->reset();
        $this->query->base = "SELECT " . implode(", ", $fields) . " FROM " . $this->table;
        $this->query->type = 'select';

        return $this;
    }

    protected function reset(): void
    {
        $this->query = new stdClass();
    }

    /**
     * Add a WHERE condition.
     */
    public function where(string $field, string $value, string $operator = '='): SQLQueryBuilder
    {
        if (!in_array($this->query->type, ['select', 'update', 'delete'])) {
            throw new Exception("WHERE can only be added to SELECT, UPDATE OR DELETE");
        }
        $this->query->where[] = "$field $operator '$value'";

        return $this;
    }

    /**
     * Add a LIMIT constraint.
     */
    public function limit(int $start, int $offset): SQLQueryBuilder
    {
        if (!in_array($this->query->type, ['select'])) {
            throw new Exception("LIMIT can only be added to SELECT");
        }
        $this->query->limit = " LIMIT " . $start . ", " . $offset;

        return $this;
    }

    /**
     * Get the final query string.
     */
    public function getSQL(): string
    {
        $query = $this->query;
        $sql = $query->base;
        if (!empty($query->where)) {
            $sql .= " WHERE " . implode(' AND ', $query->where);
        }
        if (isset($query->limit)) {
            $sql .= $query->limit;
        }
        $sql .= ";";
        return $sql;
    }

    public function insert(array $associative): SQLQueryBuilder
    {
        $this->reset();
        $this->query->base = "INSERT INTO " . $this->table . "(" . implode(',', array_keys($associative)) . ")"
            . "VALUES ('" . implode('\',\'', array_values($associative)) . "')";
        $this->query->type = 'insert';
        return $this;
    }


    public function update(array $associative)
    {
        $this->reset();
        $pairs = implode(', ', array_map(
            function ($v, $k) { return sprintf("%s='%s'", $k, $v); },
            $associative,
            array_keys($associative)
        ));
        $this->query->base = "UPDATE " . $this->table . " SET $pairs ";
        $this->query->type = 'update';
        return $this;
    }

    public function delete()
    {
        $this->reset();
        $this->query->base = "DELETE FROM " . $this->table;
        $this->query->type = 'delete';
        return $this;
    }

    public function addSelect()
    {
        // TODO: Implement addSelect() method.
    }

    public function orWhere(string $field, string $value, string $operator = '='): SQLQueryBuilder
    {
        // TODO: Implement orWhere() method.
    }

    public function whereBetween(string $field, string $value, string $operator = '='): SQLQueryBuilder
    {
        // TODO: Implement whereBetween() method.
    }

    public function whereNotBetween(string $field, string $value, string $operator = '='): SQLQueryBuilder
    {
        // TODO: Implement whereNotBetween() method.
    }

    public function whereIn(string $field, string $value, string $operator = '='): SQLQueryBuilder
    {
        // TODO: Implement whereIn() method.
    }

    public function whereNull(string $field, string $value, string $operator = '='): SQLQueryBuilder
    {
        // TODO: Implement whereNull() method.
    }

    public function whereNotNull(string $field, string $value, string $operator = '='): SQLQueryBuilder
    {
        // TODO: Implement whereNotNull() method.
    }

    public function whereExists(string $field, string $value, string $operator = '='): SQLQueryBuilder
    {
        // TODO: Implement whereExists() method.
    }

    public function first(): SQLQueryBuilder
    {
        // TODO: Implement first() method.
    }

    public function find()
    {
        // TODO: Implement find() method.
    }

    public function groupBy(): SQLQueryBuilder
    {
        // TODO: Implement groupBy() method.
    }

    public function orderBy(): SQLQueryBuilder
    {
        // TODO: Implement orderBy() method.
    }

    public function having(): SQLQueryBuilder
    {
        // TODO: Implement having() method.
    }

    public function join()
    {
        // TODO: Implement join() method.
    }

    public function leftJoin($table) :SQLQueryBuilder
    {
        $this->query->base .= ' LEFT JOIN ' . $table . '';
        return $this;
    }

    public function on($condition) :SQLQueryBuilder
    {
        $this->query->base .= ' ON ' . $condition;
        return $this;
    }





    public function rightJoin()
    {
        // TODO: Implement rightJoin() method.
    }

    public function subJoin()
    {
        // TODO: Implement subJoin() method.
    }


    public function save()
    {
        // TODO: Implement save() method.
    }


    public function deleteAll()
    {
        // TODO: Implement deleteAll() method.
    }

    public function value()
    {
        // TODO: Implement value() method.
    }

    public function pluck()
    {
        // TODO: Implement pluck() method.
    }

    public function chunk()
    {
        // TODO: Implement chunk() method.
    }

    public function count()
    {
        // TODO: Implement count() method.
    }

    public function max()
    {
        // TODO: Implement max() method.
    }

    public function avg()
    {
        // TODO: Implement avg() method.
    }

    public function exists()
    {
        // TODO: Implement exists() method.
    }

    public function dosentExist()
    {
        // TODO: Implement dosentExist() method.
    }

    public function removeLastComma($SQLQuerryString)
    {
        return substr_replace($SQLQuerryString, " ", -1);
    }
}