<?php

class Pedidoselaborados extends Controlador{
    function __construct(){
        parent::__construct();
        $this->vista->titulo = 'Pedidoselaborados';
        $this->vista->url = 'Pedidoselaborados';
    }
    function inicio(){
        session_start(); 
        if(isset($_SESSION['usuario'])){ 
            $this->vista->titulo = 'Pedidoselaborados';
            $this->vista->url = 'Pedidoselaborados';
            $this->setModelo('pedidoselaborados');
            $this->vista->datos = $this->modelo->listar();
            $this->vista->render('Pedidoselaborados/index');
        }
        else{
            header('Location: /inicio');
        } 
    }
    function nuevo(){
        session_start(); 
        if(isset($_SESSION['usuario'])){ 
            $this->vista->titulo = 'Nuevo Pedido Elaborado';
            $this->vista->url = 'Pedidoselaborados/nuevo';
            $this->setModelo('pedidoselaborados');
            $this->vista->datos = $this->modelo->listarusuarios();
            $this->vista->render('Pedidoselaborados/nuevo');
        }
        else{
            header('Location: /inicio');
        } 
    }
    function guardar(){
        try {
            $iddetallepedido = $_POST['iddetallepedido'];
            $idusuario = $_POST['idusuario'];
            $fechahora = $_POST['fechahora'];
            $this->setModelo('pedidoselaborados');
            $this->modelo->insert(["iddetallepedido"=>$iddetallepedido, "idusuario"=>$idusuario, "fechahora"=>$fechahora]);
            header("Location: /Pedidoselaborados/", TRUE, 301);
            exit;
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }
    function listar(){
        try {
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $this->setModelo('pedidoselaborados');
            $this->modelo->insert(["nombre"=>$nombre, "descripcion"=>$descripcion]);
            header("Location: /Pedidoselaborados/");
            exit;
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

    /*function buscarid(){
        session_start(); 
        if(isset($_SESSION['usuario'])){ 
            try {
                $id = $_GET['id'];
                $this->setModelo('pedidoselaborados');
                $this->vista->datos = $this->modelo->buscarID($id);
                $this->vista->render('Pedidoselaborados/buscarid');
            } catch (\Throwable $th) {
                var_dump($th);
            }
        }
        else{
            header('Location: /inicio');
        } 
    }*/

    function editar(){
        session_start(); 
        if(isset($_SESSION['usuario'])){ 
            try {
                $id = $_GET['id'];
                $this->setModelo('pedidoselaborados');
                $this->vista->datos = $this->modelo->buscarID($id);
                $this->vista->render('Pedidoselaborados/editar');
            } catch (\Throwable $th) {
                var_dump($th);
            }
        }
        else{
            header('Location: /inicio');
        } 
    }

    function actualizar(){
        try {
            $iddetallepedido = $_GET['id'];
            $idusuario = $_POST['idusuario'];
            $fechahora = $_POST['fechahora'];
            $this->setModelo('pedidoselaborados');
            $this->modelo->actualizar(["idusuario"=>$idusuario, "fechahora"=>$fechahora, "iddetallepedido"=>$iddetallepedido]);
            header("Location: /Pedidoselaborados/", TRUE, 301);
            exit();
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

    function eliminar(){
        try {
            $id = $_GET['id'];
            $this->setModelo('pedidoselaborados');
            $query=$this->modelo->eliminar($id);
            print_r($query);
            header("Location: /Pedidoselaborados/");
            exit;
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

    function buscar(){
        session_start(); 
        if(isset($_SESSION['usuario'])){ 
            try {
                isset($_POST['filtro']) ? $filtro = $_POST['filtro'] : $filtro = '';
                isset($_POST['buscar']) ? $buscar = $_POST['buscar'] : $buscar = '';
                
                $this->vista->titulo = 'Buscar pedido elaborado';
                $this->vista->url = 'pedidoselaborados/buscar';
                $this->setModelo('pedidoselaborados');
                $this->vista->datos = $this->modelo->listarResultados($filtro,$buscar,1);
                $this->vista->render('pedidoselaborados/buscar');            
            } catch (\Throwable $th) {
                var_dump($th);
            }
        }
        else{
            header('Location: /inicio');
        }
    }
}



?>