<?php

class ProductoController{
    public function index(){
        
        
        //renderizar
        require_once 'views/producto/destacados.php';
    }
    
    public function gestion(){
        
        require_once 'views/producto/gestion.php';
    }
}
