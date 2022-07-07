<?php

class Entregapedido extends Controlador{
    function __construct(){
        parent::__construct();
        $this->vista->titulo = 'Entrega pedidos';
        $this->vista->url = 'entregapedido';
    }
    function inicio(){
        session_start(); 
        if(isset($_SESSION['usuario'])){ 
            $this->vista->titulo = 'Entrega pedido';
            $this->vista->url = 'entregapedido';
            $this->setModelo('entregapedido');
            $this->vista->datos = $this->modelo->listar();
            $this->vista->render('entregapedido/index');
        }
        else{
            header('Location: /inicio');
        } 
    }
    function nuevo(){
        session_start(); 
        if(isset($_SESSION['usuario'])){ 
            $this->vista->titulo = 'Nuevo Entrega Pedido';
            $this->vista->url = 'entregapedido/nuevo';
            $this->setModelo('entregapedido');
            $this->vista->datos = $this->modelo->listarusuarios();
            $this->vista->render('entregapedido/nuevo');
        }
        else{
            header('Location: /inicio');
        } 
    }
    function guardar(){
        try {
            $iddetalle_pedido = $_POST['iddetalle_pedido'];
            $usuario = $_POST['usuario'];
            $fechahora = $_POST['fechahora'];
            $identrega = $_POST['identrega'];
            $this->setModelo('entregapedido');
            $this->modelo->insert(["iddetalle_pedido"=>$iddetalle_pedido, "usuario"=>$usuario, "fechahora"=>$fechahora, "identrega"=>$identrega]);
            header("Location: /entregapedido/", TRUE, 301);
            exit;
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }
    function listar(){
        try {
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $this->setModelo('entregapedido');
            $this->modelo->insert(["nombre"=>$nombre, "descripcion"=>$descripcion]);
            header("Location: /entregapedido/");
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
                $this->setModelo('entregapedido');
                $this->vista->datos = $this->modelo->buscarID($id);
                $this->vista->entregapedido = $this->modelo->listarusuarios();
                $this->vista->render('entregapedido/editar');
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
            $iddetalle_pedido = $_POST['iddetalle_pedido'];
            $usuario = $_POST['usuario'];
            $fechahora = $_POST['fechahora'];
            $identrega = $_POST['identrega'];
            $this->setModelo('entregapedido');
            $this->modelo->actualizar(["usuario"=>$usuario, "fechahora"=>$fechahora, "identrega"=>$identrega, "iddetalle_pedido"=>$iddetalle_pedido]);
            header("Location: /entregapedido/", TRUE, 301);
            exit();
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

    function eliminar(){
        try {
            $id = $_GET['id'];
            $this->setModelo('entregapedido');
            $query=$this->modelo->eliminar($id);
            print_r($query);
            header("Location: /entregapedido/");
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
                
                $this->vista->titulo = 'Buscar Entrega Pedido';
                $this->vista->url = 'Entregapedido/buscar';
                $this->setModelo('entregapedido');
                $this->vista->datos = $this->modelo->listarResultados($filtro,$buscar,1);
                $this->vista->render('entregapedido/buscar');            
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