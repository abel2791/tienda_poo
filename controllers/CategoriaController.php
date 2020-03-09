<?php
//en los controladores yo llamo a los modelos
require_once 'models/Categoria.php';

class CategoriaController{
    
    public function index(){
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        
        
        require_once 'views/categoria/index.php';
    }
    
    public function crear(){
        Utils::isAdmin();
        require_once 'views/categoria/crear.php';
    }
    
    public function save(){
        //primero tenemos que comprobar si el usuario que esta guardando la categoria es admin
        Utils::isAdmin();
        if(isset($_POST) && isset($_POST['nombre'])){               
             //Guardar la categoria en la base de datos
             $categoria = new Categoria();
             $categoria->setNombre($_POST['nombre']);
             $save = $categoria->save();
        }
        header("Location:".base_url."Categoria/index");
    }
}
