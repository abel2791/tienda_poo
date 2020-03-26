<?php
require_once 'models/Producto.php';
//tenemos acceso a la clase para poder crear un objeto aqui

class CarritoController{
    
    public function index(){
        var_dump($_SESSION['carrito']);
        echo 'controlador carrito, accion index';
    }
    
    public function add(){
        //recogemos un parametro por la url
        if(isset($_GET['id'])){
            $producto_id = $_GET['id'];
        }else{
            header('Location:'.base_url);
        }
        
        
        if(isset($_SESSION['carrito'])){
            
        }else{
            //conseguir producto
            $producto = new Producto();
            $producto->setId($producto_id);
            $producto = $producto->getOne();
            
            
            if(is_object($producto)){
               $_SESSION['carrito'][] = array(
                   "id_producto" => $producto->id,
                   "precio" => $producto->precio,
                   "unidades" => 1,
                   "producto" => $producto
               );
            }
        }
        
        header("Location:".base_url."Carrito/index");
    }
    
    public function remove(){
        
    }
    
    public function delete_all(){
        unset($_SESSION['carrito']);
        header("Location:".base_url."Carrito/index");
    }
    
    
}