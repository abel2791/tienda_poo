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
             $nombre    = isset($_POST['nombre']) ? $_POST['nombre'] :false;
             $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] :false;
             $email     = isset($_POST['email']) ? $_POST['email'] :false;
             $password  =isset($_POST['nombre']) ? $_POST['nombre'] :false;
             
             if($nombre && $apellidos && $email && $password){
             $usuario = new Usuario();
             $usuario->setNombre($nombre);
             $usuario->setApellidos($apellidos);
             $usuario->setEmail($email);
             $usuario->setPassword($password);
             
             $save = $usuario->save();//esto lo que hace es aguardar mi objeto en un registro de mi db
             
             if($save){
                 $_SESSION['register'] = 'complete';
             }else{
                 $_SESSION['register'] = 'failed';
              }
            }else{
               $_SESSION['register'] = 'failed'; 
            }
             
         }else{
             $_SESSION['register'] = 'failed';
         }
         header("Location:".base_url.'Usuario/registro');
     }
}
