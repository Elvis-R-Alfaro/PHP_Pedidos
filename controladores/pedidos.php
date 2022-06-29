<?php

class Pedidos extends Controlador{
    function __construct(){
        parent::__construct();
        $this->vista->titulo = 'Pedidos';
        $this->vista->url = 'pedidos';
        //$this->vista->render('cargos/index');
        //echo "<h2>Controlador de inicio</h2>";
    }
    function inicio(){
        $this->vista->titulo = 'Pedidos';
        $this->vista->url = 'pedidos';
        $this->setModelo('pedidos');
        $this->vista->datos = $this->modelo->listar();
        $this->vista->render('pedidos/index');
    }
    function nuevo(){
        $this->vista->titulo = 'Nuevo pedido';
        $this->vista->url = 'pedidos/nuevo';
        $this->vista->render('pedidos/nuevo');
    }

    function listar() {
        $this->setModelo('pedidos');
        $this->vista->datos = $this->modelo->listar();
    }

    function buscarId() {
        try {
            $id = $_GET['id'];
            $this->setModelo('pedidos');
            $this->vista->datos = $this->modelo->buscarId($id);
            $this->vista->render('pedidos/buscarId');
        } catch (\Throwable $th) {
            var_dump($th); 
        }
    }

    function guardar(){
        try {
            $idmesero = $_POST['idmesero'];
            $fechahora = date('Y-m-d H:i:s',time());
            $Estacion = $_POST['Estacion'];
            $activo = $_POST['activo'];
            $modalidad = $_POST['modalidad'];
            $estado = $_POST['estado'];
            $this -> setModelo('pedidos');
            $this -> modelo -> insert(['idmesero' => $idmesero, 'fechahora' => $fechahora, 'Estacion' => $Estacion, 'activo' => $activo, 'modalidad' => $modalidad, 'estado' => $estado]);
            header('Location: /pedidos', true, 301);
            exit();
        } catch (\Throwable $th) {
            var_dump($th); //tirar error y para la ejecusion del programa
        }
    }

    function actualizar(){
        try {
            $id = $_GET['id'];
            $idmesero = $_POST['idmesero'];
            $fechahora = date('Y-m-d H:i:s',time());
            $Estacion = $_POST['Estacion'];
            $activo = $_POST['activo'];
            $modalidad = $_POST['modalidad'];
            $estado = $_POST['estado'];
            $this -> setModelo('pedidos');
            $this -> modelo -> update([ 'id' => $id ,'idmesero' => $idmesero, 'fechahora' => $fechahora, 'Estacion' => $Estacion, 'activo' => $activo, 'modalidad' => $modalidad, 'estado' => $estado]);
            header('Location: /pedidos', true, 301);
            exit();
        } catch (\Throwable $th) {
            var_dump($th); //tirar error y para la ejecusion del programa
        }
    }

    function eliminar(){
        try {
            $id = $_GET['id'];
            $this -> setModelo('pedidos');
            $this -> modelo -> delete([ 'NumeroPedido' => $id]);
            header('Location: /pedidos', true, 301);
            exit();
        } catch (\Throwable $th) {
            var_dump($th); //tirar error y para la ejecusion del programa
        }
    }


}