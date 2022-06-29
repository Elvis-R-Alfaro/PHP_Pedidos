<?php

class Pedidoselaborados extends Controlador{
    function __construct(){
        parent::__construct();
        $this->vista->titulo = 'Pedidoselaborados';
        $this->vista->url = 'Pedidoselaborados';
    }
    function inicio(){
        $this->vista->titulo = 'Pedidoselaborados';
        $this->vista->url = 'Pedidoselaborados';
        $this->setModelo('pedidoselaborados');
        $this->vista->datos = $this->modelo->listar();
        $this->vista->render('Pedidoselaborados/index');
    }
    function nuevo(){
        $this->vista->titulo = 'Nuevo Pedido Elaborado';
        $this->vista->url = 'Pedidoselaborados/nuevo';
        $this->vista->render('Pedidoselaborados/nuevo');
    }
    function guardar(){
        try {
            $iddetallepedido = $_POST['iddetallepedido'];
            $idusuario = $_POST['idusuario'];
            $fechahora = $_POST['fechahora'];
            $this->setModelo('pedidoselaborados');
            $this->modelo->insert(["iddetallepedido"=>$iddetallepedido, "idusuario"=>$idusuario, "fechahora"=>$fechahora]);
            header("Location: /Pedidoselaborados/", TRUE, 301);
            exit();
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }
    function listar(){
        try {
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $this->setModelo('Pedidoselaborados');
            $this->modelo->insert(["nombre"=>$nombre, "descripcion"=>$descripcion]);
            header("Location: /Pedidoselaborados/", TRUE, 301);
            exit();
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

    function buscarid(){
        try {
            $id = $_GET['id'];
            $this->setModelo('Pedidoselaborados');
            $this->vista->datos = $this->modelo->buscarID($id);
            $this->vista->render('Pedidoselaborados/buscarid');
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

    function editar(){
        try {
            $id = $_GET['id'];
            $this->setModelo('Pedidoselaborados');
            $this->vista->datos = $this->modelo->buscarID($id);
            $this->vista->render('Pedidoselaborados/editar');
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

    function actualizar(){
        try {
            $iddetallepedido = $_GET['id'];
            $idusuario = $_POST['idusuario'];
            $fechahora = $_POST['fechahora'];
            $this->setModelo('Pedidoselaborados');
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
            $this->setModelo('Pedidoselaborados');
            $this->modelo->eliminar(["id"=>$id]);
            header("Location: /Pedidoselaborados/", TRUE, 301);
            exit();
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

}



?>