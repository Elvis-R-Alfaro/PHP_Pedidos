<?php

class Inicio extends Controlador{
    function __construct(){
        parent::__construct();
        $this->vista->titulo = 'Tablero de Inicio';
        $this->vista->url = 'inicio';
        //echo "<h2>Controlador de inicio</h2>";
    }
    function inicio(){
        session_start();
        if(isset($_SESSION['usuario'])){
            header('Location: /pedidos');
        }
        else{
            if(isset($_POST["usuario"])){  
                $_SESSION['usuario'] = 'admin';
                header('Location: /pedidos');
            } 
        }        
        $this->vista->titulo = 'Tablero de Inicio';
        $this->vista->url = 'inicio';       
        $this->vista->render('inicio/index');
    }
    function logout(){        
        $this->vista->titulo = 'Cerrar Sesion';
        $this->vista->url = 'inicio/logout';       
        $this->vista->render('inicio/logout');
    }
}

?>