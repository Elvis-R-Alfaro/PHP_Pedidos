<?php

class pedidosLlevar extends Controlador{
    function __construct(){
        parent :: __construct();
        $this -> vista -> titulo ='pedidos_llevar';
        $this -> vista -> url = 'pedidos_llevar';
        $this -> vista -> render('pedidos_llevar/index');
    }

    function Inicio(){
        $this->vista->titulo='Pedidos_llevar';
        $this->vista->url='pedidos_llevar';

        $this->setModelo('pedidos_llevar');
        $this->vista->datos = $this->modelo->listar();
        $this->vista->render('pedidos_llevar/index');
    }

    function Nuevo(){
        $this -> vista -> titulo ='Nuevo pedido';
        $this -> vista -> url = 'pedidos_llevar/nuevo';
        $this -> vista -> render('pedidos_llevar/nuevo');
    }

    function Guardar(){
        try {
            $idregistro = $_POST['idregistro'];
            $idpedido = $_POST['idpedido'];
            $idcliente = $_POST['idcliente'];
            $this->setModelo('pedidos_llevar');
            $this->modelo->insert([
                'idregistro' => $idregistro,
                'idpedido' => $idpedido,
                'idcliente' => $idcliente
                
            ]);
            header('Location: /pedidos_llevar', true, 301);
            exit();
        } catch (\Throwable $th) {
            var_dump($th); //tirar error y para la ejecusion del programa
        }
    }

    function buscarId() {
        try {
            $id = $_GET['id'];
            $this->setModelo('pedidos_llevar');
            $this->vista->datos = $this->modelo->buscarId($id);
            $this->vista->render('pedidos_llevar/buscarId');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}