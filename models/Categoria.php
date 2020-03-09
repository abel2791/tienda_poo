<?php
//el modelo reprensenta a los registros de la tabla categoria en la bd 
//modelo logica de negocios BD

class Categoria{
    private $id;
    private $nombre;
    private $db;
    
    public function __construct() {
        $this->db = Database::connect();;
    }
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    //creamos metodo categorias
    public function getAll(){
        $categorias =$this->db->query("SELECT * FROM categorias ORDER BY id DESC;");
        return $categorias;        
    }
    
    public function save(){
        $sql = "INSERT INTO categorias VALUES(NULL, '{$this->getNombre()}' );"; 
        $save = $this->db->query($sql);
        
        $result = false;
        if($save){
           $result = true;   
        }
        return $result;  
    }
}

