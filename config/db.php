<?php

class Databse{
    public static function connect(){
        $db = new mysqli('localhost', 'root', 'toor', 'tienda_master');
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}