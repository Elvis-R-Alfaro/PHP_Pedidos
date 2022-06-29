<?php

class Inicio extends Controlador{
    function __construct(){
        parent::__construct();
        $this->vista->titulo = 'Tablero de Inicio';
        $this->vista->url = 'inicio';
        //echo "<h2>Controlador de inicio</h2>";
    }
    function inicio(){
        $this->vista->titulo = 'Tablero de Inicio';
        $this->vista->url = 'inicio';
       
        $this->vista->render('inicio/index');
    }
}

?>