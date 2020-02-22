<h1>Bienvenido a mi MVC</h1>
<?php
//todo esto se le conoce  controlador frontal, porque se encarga de cargar un fichero una accion en funcion
// de lo que me llega por la url, es el unico fichero que se encarga de cargarlo absolutamente todo
//para arrancar el mvc pones en la url: http://localhost/master-php/aprendiendo-php-mvc/?controller=Usuario&action=mostrarTodos
require_once 'autoload.php';



if(isset($_GET['controller'])){
      $nombre_controlador = $_GET['controller'].'Controller';
 }else{
      echo 'La pagina no existe';
      exit();//el exit para que pare la ejecucion y lo de abajo ya no lo ejecute
}
    
    
if(class_exists($nombre_controlador)){   
    $controlador = new $nombre_controlador();
    
    //para poner de manera automatica los metodos y no ponerlos mananualmente
if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){//si la viriable action get, existe
    $action = $_GET['action'];    
    $controlador->$action();
    
    //ponemos esto en la url para llamar a los metodos "?action=crear"
    
    }else{
        echo 'La pagina no existe';
    }
 
   }else{
    echo 'La pagina no existe';
}


