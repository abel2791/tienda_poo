<?php

class UsuarioController{
    
    public function index(){
        echo 'controlador Usuarios, accion index';
    }
    
    public function registro(){
        require_once 'views/usuario/registro.php'; 
     }
     
     public function save(){
         
     }
}
