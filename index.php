<?php
//todo esto se le conoce  controlador frontal, porque se encarga de cargar un fichero una accion en funcion
// de lo que me llega por la url, es el unico fichero que se encarga de cargarlo absolutamente todo
//para arrancar el mvc pones en la url: http://localhost/master-php/aprendiendo-php-mvc/?controller=Usuario&action=mostrarTodos
require_once 'autoload.php';
require_once 'config/parameters.php';
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';

function show_error(){
    $error = new ErrorController();
    $error->index();
}


if(isset($_GET['controller'])){
      $nombre_controlador = $_GET['controller'].'Controller';
 }elseif(!isset ($GET['controller']) && !isset ($GET['action'])){
     $nombre_controlador = controller_default;
 }
 
 
 else{
     show_error();
      exit();//el exit para que pare la ejecucion y lo de abajo ya no lo ejecute
}
    
    
if(class_exists($nombre_controlador)){   
    $controlador = new $nombre_controlador();
    
    //para poner de manera automatica los metodos y no ponerlos mananualmente
if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){//si la viriable action get, existe
    $action = $_GET['action'];    
    $controlador->$action();
    
    //ponemos esto en la url para llamar a los metodos "?action=crear"
    
    }elseif(!isset ($GET['controller']) && !isset ($GET['action'])){
        $action_default = action_default;
        $controlador->$action_default();        
    }
     else{
       show_error();
    }
 
   }else{
    show_error();
}

require_once 'views/layout/footer.php';
