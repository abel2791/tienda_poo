<?php
//en los controladores yo llamo a los modelos
require_once 'models/Categoria.php';
require_once 'models/Producto.php';

class CategoriaController{
    
    public function index(){
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        
        
        require_once 'views/categoria/index.php';
    }
    
    public function ver(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            
            //conseguir categoria
            $categoria = new Categoria();
            $categoria->setId($id);
            $categoria = $categoria->getOne();
            
            //conseguir productos
            $producto = new Producto();
            $producto->setCategoria_id($id);
            $productos = $producto->getAllCategory();
            
        
        }
        
        require_once 'views/categoria/ver.php';
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
