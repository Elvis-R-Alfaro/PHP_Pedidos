<?php

class PedidosVentas extends Controlador{
    function __construct(){
        parent::__construct();
        $this->vista->titulo = 'Pedidos Ventas';
        $this->vista->url = 'pedidosventas';
        //$this->vista->render('cargos/index');
        //echo "<h2>Controlador de inicio</h2>";
    }
    function inicio(){
        $this->vista->titulo = 'Pedidos Ventas';
        $this->vista->url = 'pedidosventas';
        $this->setModelo('pedidosventas');
        $this->vista->datos = $this->modelo->listar();
        $this->vista->render('pedidosventas/index');
    }
    function nuevo(){
        $this->vista->titulo = 'Nuevo Venta';
        $this->vista->url = 'pedidosventas/nuevo';
        $this->vista->render('pedidosventas/nuevo');
    }

    function listar() {
        $this->setModelo('pedidosventas');
        $this->vista->datos = $this->modelo->listar();
    }

    function buscarId() {
        try {
            $id = $_GET['id'];
            $this->setModelo('pedidosventas');
            $this->vista->datos = $this->modelo->buscarId($id);
            $this->vista->render('pedidosventas/buscarId');
        } catch (\Throwable $th) {
            var_dump($th); 
        }
    }

    function guardar(){
        try {
            $NumeroFactura = $_POST['NumeroFactura'];
            $NumeroPedido = $_POST['NumeroPedido'];
            $this -> setModelo('pedidosventas');
            $this -> modelo -> insert(['NumeroFactura' => $NumeroFactura, 'NumeroPedido' => $NumeroPedido]);
            header('Location: /pedidosventas', true, 301);
            exit();
        } catch (\Throwable $th) {
            var_dump($th); //tirar error y para la ejecusion del programa
        }
    }

    function actualizar(){
        try {
            $id = $_GET['id'];
            $NumeroFactura = $_POST['NumeroFactura'];
            $NumeroPedido = $_POST['NumeroPedido'];
            $this -> setModelo('pedidosventas');
            $this -> modelo -> update([ 'id' => $id ,'NumeroFactura' => $NumeroFactura, 'NumeroPedido' => $NumeroPedido]);
            header('Location: /pedidosventas', true, 301);
            exit();
        } catch (\Throwable $th) {
            var_dump($th); //tirar error y para la ejecusion del programa
        }
    }

    function eliminar(){
        try {
            $id = $_GET['id'];
            $this -> setModelo('pedidosventas');
            $this -> modelo -> delete([ 'id' => $id]);
            header('Location: /pedidosventas', true, 301);
            exit();
        } catch (\Throwable $th) {
            var_dump($th); //tirar error y para la ejecusion del programa
        }
    }

    function editar(){
        try {
            $id = $_GET['id'];
            $this->setModelo('pedidosventas');
            $this->vista->datos = $this->modelo->buscarID($id);
            $this->vista->render('pedidosventas/editar');
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }


}