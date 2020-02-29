<?php
//el modelo reprensenta a los registros de la tabla categoria en la bd 

class Categoria{
    private $id;
    private $nombre;
    private $db;
    
    public function __construct() {
        $this->db = Database::connect();;
    }
}

