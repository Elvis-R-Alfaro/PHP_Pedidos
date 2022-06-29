<?php

class Controlador {
    function __construct(){
        //echo "<h2>Controlador base</h2>"; 
        $this->vista = new Vista();
    }
    function setModelo($modelo){
        $url = 'modelos/' . $modelo . 'modelo.php';
        if(file_exists($url)){
            require $url;
            $nombreModelo = $modelo . 'Modelo';
            $this->modelo = new $nombreModelo();
        }
    }
}

?>