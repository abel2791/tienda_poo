<?php
require_once 'models/Pedido.php';

class PedidoController{
    
    public function hacer(){
        
        require_once 'views/pedido/hacer.php';
    }
    
    public function add(){
        if(isset($_SESSION['identity'])){
          $usuario_id = $_SESSION['identity']->id;
          $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;  
          $localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false;  
          $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;  
          
          $stats = Utils::statsCarrito();
          $coste = $stats['total'];
          
          if($provincia && $localidad && $direccion){
            //Guardar datos en bd    
            $pedido = new Pedido();
            $pedido->setUsuario_id($usuario_id);
            $pedido->setProvincia($provincia);
            $pedido->setLocalidad($localidad);
            $pedido->setDireccion($direccion);
            $pedido->setCoste($coste);
            
            //con esto guardamos en la bd
            $save = $pedido->save();
            
            //Guardar linea pedido
            $save_linea = $pedido->save_linea();
            
            if($save && $save_linea){
                $_SESSION['pedido'] = "complete";
            }else{
                $_SESSION['pedido'] = "failed";
            }
            
          }else{
              $_SESSION['pedido'] = "failed";
          }
          
          header("Location:".base_url.'Pedido/confirmado');
          
    }else{
         //Redirigir al index
         header("Location:".base_url);
        }
    }
        public function confirmado(){
            if(isset($_SESSION['identity'])){
                $identity = $_SESSION['identity'];
                $pedido = new Pedido();
                $pedido->setUsuario_id($identity->id);
                
                $pedido = $pedido->getOneByUser();
                
                $pedido_productos = new Pedido();
                $productos = $pedido_productos->getProductosByPedido($pedido->id);
            }            
            require_once 'views/pedido/confirmado.php';
        }
        
        public function mis_pedidos(){
            Utils::isIdentity();
            
            $usuario_id = $_SESSION['identity']->id;
            $pedido = new Pedido();
            
            //sacar los pedidos del usuario
            $pedido->setUsuario_id($usuario_id);
            $pedidos = $pedido->getAllByUser();
 
            require_once 'views/pedido/mis_pedidos.php';
        }
        
        public function detalle(){
            Utils::isIdentity();
            
            require_once 'views/pedido/detalle.php';
        }
}
