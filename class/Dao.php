<?php

namespace FindAPet;

abstract class Dao
{
    // Força a classe que estende ClasseAbstrata a definir esse método
    abstract public static function create($obj);
    abstract public static function find($id);
    abstract public static function all();
    abstract public static function update($obj);
    abstract public static function delete($id);
}