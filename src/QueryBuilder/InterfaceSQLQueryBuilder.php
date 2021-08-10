<?php

namespace App\MyORM\QueryBuilder;

interface InterfaceSQLQueryBuilder
{
//    public function selectRaw(string $table, array $fields): SQLQueryBuilder;

    public function select(array $fields): SQLQueryBuilder;

    public function limit(int $start, int $offset): SQLQueryBuilder;

    public function addSelect();

    public function where(string $field, string $value, string $operator = '='): SQLQueryBuilder;

    public function orWhere(string $field, string $value, string $operator = '='): SQLQueryBuilder;

    public function whereBetween(string $field, string $value, string $operator = '='): SQLQueryBuilder;

    public function whereNotBetween(string $field, string $value, string $operator = '='): SQLQueryBuilder;

    public function whereIn(string $field, string $value, string $operator = '='): SQLQueryBuilder;

    public function whereNull(string $field, string $value, string $operator = '='): SQLQueryBuilder;

    public function whereNotNull(string $field, string $value, string $operator = '='): SQLQueryBuilder;

    public function whereExists(string $field, string $value, string $operator = '='): SQLQueryBuilder;


    public function first(): SQLQueryBuilder;

    public function find();

//    public function findOrFail(): SQLQueryBuilder;

    public function groupBy(): SQLQueryBuilder;

    public function orderBy(): SQLQueryBuilder;

    public function having(): SQLQueryBuilder;

    public function join();

    public function leftJoin($table);

    public function on($condition);

    public function rightJoin();

    public function subJoin();


//    public function update(array $associative);

    public function save();

    public function delete();

    public function deleteAll();

    public function value();

    public function pluck();

    public function chunk();

    public function count();

    public function max();

    public function avg();

    public function exists();

    public function dosentExist();


    public function getSQL(): string;
}