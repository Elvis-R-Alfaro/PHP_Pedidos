<?php

class Errores extends Controlador{
    function __construct(){
        parent::__construct();
        $this->vista->titulo = 'Error';
        $this->vista->url = 'errores';
       
        $this->vista->render('errores/index');
    }
    function error(){
        $mensaje = 'Este es un mensaje de error';
        include_once 'vistas/errores.php';
    }
    function inicio(){
        $mensaje = 'Este es un mensaje de error';
        include_once 'vistas/errores.php';
    }
}

?>