<?php
//nota: el controlador es la interaccion del usuariocon la vista
require_once 'models/Producto.php';

class ProductoController{
    public function index(){
        
        
        //renderizar
        require_once 'views/producto/destacados.php';
    }
    
    public function gestion(){
        Utils::isAdmin();
        
        $producto = new Producto();
        $productos = $producto->getAll();
        
        
        require_once 'views/producto/gestion.php';
    }
    
    public function crear(){
        Utils::isAdmin();
        
        require_once 'views/producto/crear.php';
    }
}
