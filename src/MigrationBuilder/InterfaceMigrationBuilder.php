<?php

namespace App\MyORM\MigrationBuilder;

interface InterfaceMigrationBuilder
{

    public function bigIncrements(string $col_name): InterfaceMigrationBuilder;

    public function boolean(string $col_name): InterfaceMigrationBuilder;

    public function stringg(string $col_name): InterfaceMigrationBuilder;

    public function integer(string $col_name): InterfaceMigrationBuilder;

    public function float(string $col_name): InterfaceMigrationBuilder;

    public function primaryKey(string $col_name): InterfaceMigrationBuilder;

//
    public function unique(string $col_name): InterfaceMigrationBuilder;
//
//    public function index(string $col_name): InterfaceMigrationBuilder;
//
    public function foreignKey(string $col_name): InterfaceMigrationBuilder;

//
    public function references(string $table_name): InterfaceMigrationBuilder;

//
    public function on(string $col_name): InterfaceMigrationBuilder;
//
//    public function onDelete(string $col_name): InterfaceMigrationBuilder;
//
//    public function onUpdate(string $col_name): InterfaceMigrationBuilder;
//
//    public function timestamps(string $col_name): InterfaceMigrationBuilder;

    public function dateTime(string $col_name): InterfaceMigrationBuilder;


    public function removeLastComma($SQLQuerryString);


    public function onDelete($col_name);

    public function onUpdate($col_name);


    public function default($param): InterfaceMigrationBuilder;

    public function notNull(): InterfaceMigrationBuilder;
}