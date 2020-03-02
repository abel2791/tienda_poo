<?php

class Utils{
    
    public static function deleteSession($name){
        if(isset($_SESSION[$name])){
        $_SESSION[$name] = null;
        unset($_SESSION[$name]);
        }
        
        return $name;
    }
    
    //esto comprueba si el usuario es administrador
    public static function isAdmin(){
        if(!isset($_SESSION['admin'])){
            header("Location:".base_url);
        }else{
            return true;
        }
    }
}