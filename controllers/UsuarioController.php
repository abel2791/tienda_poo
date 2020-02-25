<?php
require_once 'models/Usuario.php';

class UsuarioController{
    
    public function index(){
        echo 'controlador Usuarios, accion index';
    }
    
    public function registro(){
        require_once 'views/usuario/registro.php'; 
     }
     
     public function save(){
         if(isset($_POST)){
             $usuario = new Usuario();
             $usuario->setNombre($_POST['nombre']);
             $usuario->setApellidos($_POST['apellidos']);
             $usuario->setEmail($_POST['email']);
             $usuario->setPassword($_POST['password']);
             
             $save = $usuario->save();//esto lo que hace es aguardar mi objeto en un registro de mi db
             
             if($save){
                 $_SESSION['register'] = 'complete';
             }else{
                 $_SESSION['register'] = 'failed';
             }
             
         }else{
             $_SESSION['register'] = 'failed';
         }
         header("Location:".base_url.'Usuario/registro');
     }
}
