<?php

class Perfil extends Controlador{
    function __construct(){
        parent::__construct();
        $this->vista->titulo = 'Perfil de usuario';
        $this->vista->url = 'perfil';
        //echo "<h2>Controlador de inicio</h2>";
    }
    function inicio(){
        $this->vista->titulo = 'Perfil de usuario';
        $this->vista->url = 'perfil';
       
        $this->vista->render('perfil/index');
    }
}

?>