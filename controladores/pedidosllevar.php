<?php

class PedidosLlevar extends Controlador{
    function __construct(){
        parent::__construct();
        $this->vista->titulo = 'Pedidos LLevar';
        $this->vista->url = 'pedidosllevar';
        //$this->vista->render('cargos/index');
        //echo "<h2>Controlador de inicio</h2>";
    }
    function inicio(){
        session_start(); 
        if(isset($_SESSION['usuario'])){ 
        $this->vista->titulo = 'Pedidos Llevar';
        $this->vista->url = 'pedidosllevar';
        $this->setModelo('pedidosLlevar');
        $this->vista->datos = $this->modelo->listar();
        $this->vista->render('pedidosllevar/index');
    }
    else{
        header('Location: /inicio');
    } 
    }
    function nuevo(){
        session_start(); 
        if(isset($_SESSION['usuario'])){ 
        $this->vista->titulo = 'Nuevo pedido a llevar';
        $this->vista->url = 'pedidosllevar/nuevo';
        $this->setModelo('pedidosLlevar');
        $this->vista->clientes = $this->modelo->listarClientes();
        $this->vista->pedidos = $this->modelo->listarPedidos();
        $this->vista->render('pedidosllevar/nuevo');
    }
    else{
        header('Location: /inicio');
    } 
    }

    function listar() {
        $this->setModelo('pedidosLlevar');
        $this->vista->datos = $this->modelo->listar();
    }

    function buscarId() {
        session_start(); 
        if(isset($_SESSION['usuario'])){ 
        try {

            $id = $_GET['id'];
            $this->setModelo('pedidosLlevar');
            $this->vista->datos = $this->modelo->buscarId($id);
            $this->vista->clientes = $this->modelo->listarClientes();
            $this->vista->pedidos = $this->modelo->listarPedidos();
            $this->vista->render('pedidosllevar/buscarId');
        } catch (\Throwable $th) {
            var_dump($th); 
        }
    }
    else{
        header('Location: /inicio');
    } 
    }


    function buscar(){
        session_start(); 
        if(isset($_SESSION['usuario'])){ 
            try {
                isset($_POST['filtro']) ? $filtro = $_POST['filtro'] : $filtro = '';
                isset($_POST['buscar']) ? $buscar = $_POST['buscar'] : $buscar = '';
                $this->vista->titulo = 'Buscar pedido a llevar';
                $this->vista->url = 'pedidosllevar/buscar';
                $this->setModelo('pedidosllevar');
                $this->vista->datos = $this->modelo->listarResultados($filtro,$buscar,1);
                $this->vista->render('pedidosllevar/buscar');            
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
            $idpedido = $_POST['idpedido'];
            $idcliente = $_POST['idcliente'];
            $this -> setModelo('pedidosLlevar');
            $this -> modelo -> insert(['idpedido' => $idpedido, 'idcliente' => $idcliente]);
            header('Location: /pedidosllevar', true, 301);
            exit();
        } catch (\Throwable $th) {
            var_dump($th); //tirar error y para la ejecusion del programa
        }
    }

    function actualizar(){
        try {
            $id = $_GET['id'];
            $idpedido = $_POST['idpedido'];
            $idcliente = $_POST['idcliente'];
            $this -> setModelo('pedidosLlevar');
            $this -> modelo -> update([ 'id' => $id ,'idpedido' => $idpedido, 'idcliente' => $idcliente]);
            header('Location: /pedidosllevar', true, 301);
            exit();
        } catch (\Throwable $th) {
            var_dump($th); //tirar error y para la ejecusion del programa
        }
    }

    function eliminar(){
        try {
            $id = $_GET['id'];
            $this -> setModelo('pedidosLlevar');
            $this -> modelo -> delete([ 'idregistro' => $id]);
            header('Location: /pedidosllevar', true, 301);
            exit();
        } catch (\Throwable $th) {
            var_dump($th); //tirar error y para la ejecusion del programa
        }
    }


}