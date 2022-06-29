<?php

class PedidosXVenta extends Controlador{
    function __construct(){
        parent :: __construct();
        $this -> vista -> titulo ='pedidos_x_ventas';
        $this -> vista -> url = 'pedidos_x_ventas';
        $this -> vista -> render('pedidos_ventas/index');
    }

    function Inicio(){
        $this->vista->titulo='Pedidos Ventas';
        $this->vista->url='pedidos_ventas';

        $this->setModelo('pedidos_ventas');
        $this->vista->datos = $this->modelo->listar();
        $this->vista->render('pedidos_ventas/index');
    }

    function Nuevo(){
        $this -> vista -> titulo ='Nuevo pedido X ventas';
        $this -> vista -> url = 'pedidos_ventas/nuevo';
        $this -> vista -> render('pedidos_ventas/nuevo');
    }

    function Guardar(){
        try {
            $NumeroFactura = $_POST['NumeroFactura'];
            $NumeroPedido = $_POST['NumeroPedido'];
           
            $this->setModelo('pedidos_ventas');
            $this->modelo->insert([
                'NumeroFactura' => $NumeroFactura,
                'NumeroPedido' => $NumeroPedido
                
            ]);
            header('Location: /pedidos_ventas', true, 301);
            exit();
        } catch (\Throwable $th) {
            var_dump($th); //tirar error y para la ejecusion del programa
        }
    }


    function buscarId() {
        try {
            $id = $_GET['id'];
            $this->setModelo('pedidos_ventas');
            $this->vista->datos = $this->modelo->buscarId($id);
            $this->vista->render('pedidos_ventas/buscarId');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}