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
        session_start(); 
        if(isset($_SESSION['usuario'])){ 
        $this->vista->titulo = 'Pedidos Ventas';
        $this->vista->url = 'pedidosventas';
        $this->setModelo('pedidosventas');
        $this->vista->datos = $this->modelo->listar();
        $this->vista->render('pedidosventas/index');

    }
    else{
        header('Location: /inicio');
    }
    }

    function nuevo(){
        $this->vista->titulo = 'Nuevo Venta';
        $this->vista->url = 'pedidosventas/nuevo';
        $this->setModelo('pedidosventas');
        $this->vista->productos = $this->modelo->listarProductos();
        $this->vista->facturas = $this->modelo->listarFacturas();
        $this->vista->render('pedidosventas/nuevo');
    }

    function buscar(){
        session_start(); 
        if(isset($_SESSION['usuario'])){ 
            try {
                isset($_POST['filtro']) ? $filtro = $_POST['filtro'] : $filtro = '';
                isset($_POST['buscar']) ? $buscar = $_POST['buscar'] : $buscar = '';
                $this->vista->titulo = 'Buscar pedido de venta';
                $this->vista->url = 'pedidosventas/buscar';
                $this->setModelo('pedidosventas');
                $this->vista->datos = $this->modelo->listarResultados($filtro,$buscar,1);
                $this->vista->render('pedidosventas/buscar');            
            } catch (\Throwable $th) {
                var_dump($th);
            }
        }
        else{
            header('Location: /inicio');
        }
    }



    function listar() {
        $this->setModelo('pedidosventas');
        $this->vista->datos = $this->modelo->listar();
    }

    function buscarId() {
        session_start(); 
        if(isset($_SESSION['usuario'])){ 
        try {
            $id = $_GET['id'];
            $this->setModelo('pedidosventas');
            $this->vista->productos = $this->modelo->listarProductos();
            $this->vista->facturas = $this->modelo->listarFacturas();
            $this->vista->datos = $this->modelo->buscarId($id);
            $this->vista->render('pedidosventas/buscarId');
        } catch (\Throwable $th) {
            var_dump($th); 
        }
    }
    else{
        header('Location: /inicio');

    }
    }

    function guardar(){
        try {
            $NumeroPedido = $_POST['NumeroPedido'];
            $this -> setModelo('pedidosventas');
            $this -> modelo -> insert(['NumeroPedido' => $NumeroPedido]);
            header('Location: /pedidosventas', true, 301);
            exit();
        } catch (\Throwable $th) {
            var_dump($th); //tirar error y para la ejecusion del programa
        }
    }

    function actualizar(){
        try {
            $id = $_GET['id'];
            $NumeroPedido = $_POST['NumeroPedido'];
            $this -> setModelo('pedidosventas');
            $this -> modelo -> update(['id' =>$id ,'NumeroPedido' => $NumeroPedido]);
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
            $this -> modelo -> delete([ 'NumeroFactura' => $id]);
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