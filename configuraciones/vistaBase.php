<?php

class Vista {
    function __construct(){
        $this->nombreApp = 'SIGRES';
        $this->titulo='Inicio';
        $this->url='inicio';
        //echo "<h2>Vista base</h2>";
    }
    function render($nombre){
        require 'vistas/' . $nombre . '.php';
    }
}

?>