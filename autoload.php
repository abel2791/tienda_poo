<?php

function autocargar($classname){
    
    include 'controllers/' . $classname . '.php';
    
    var_dump($classname);
}

spl_autoload_register('autocargar');

