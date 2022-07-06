<?php

class Pedidosmesa extends Controlador{
    function __construct(){
        parent::__construct();
        $this->vista->titulo = 'Pedidos Mesa';
        $this->vista->url = 'pedidosmesa';
        //$this->vista->render('cargos/index');
        //echo "<h2>Controlador de inicio</h2>";
    }
    function inicio(){
        $this->vista->titulo = 'Pedidos Mesa';
        $this->vista->url = 'pedidosmesa';
        $this->setModelo('pedidosmesa');
        $this->vista->datos=$this->modelo->listar();
        $this->vista->render('pedidosmesa/index');
    }
    function nuevo(){
        session_start();
        $this->vista->titulo = 'Nuevo Pedido Mesa';
        $this->vista->url = 'pedidosmesa/nuevo';
        $this->setmodelo('pedidosmesa');
        $this->vista->pedidos = $this->modelo->listarPedidos();
        $this->vista->mesas = $this->modelo->listarMesa();
        $this->vista->render('pedidosmesa/nuevo');
    }
    function guardar(){
        try {
            $idpedido = $_POST['idpedido'];
            $idmesa = $_POST['idmesa'];
            $cuenta = $_POST['cuenta'];
            $nombrecuenta = $_POST['nombrecuenta'];
            $this->setModelo('pedidosmesa');
            $this->modelo->insert(["idpedido"=>$idpedido, "idmesa"=>$idmesa, "cuenta"=>$cuenta,"nombrecuenta"=>$nombrecuenta,]);
            header("Location: /pedidosmesa/", TRUE, 301);
            exit();
        } catch (\Throwable $th) {
            var_dump($th);
        }
        //var_dump($_POST);
        
        /*$this->vista->titulo = 'Cargos';
        $this->vista->url = 'cargos';
        $this->vista->render('cargos/index');*/
    }

    function listar() {
        $this->setModelo('pedidosmesa');
        $this->vista->datos = $this->modelo->listar();
    }

    function buscarId() {
        session_start(); 
        if(isset($_SESSION['usuario'])){ 
        try {

            $id = $_GET['id'];
            $this->setModelo('pedidosmesa');
            $this->vista->datos = $this->modelo->buscarId($id);
            $this->vista->pedidos = $this->modelo->listarPedidos();
            $this->vista->mesas = $this->modelo->listarMesa();
            $this->vista->render('pedidosmesa/buscarId');
        } catch (\Throwable $th) {
            var_dump($th); 
        }
    }
    else{
        header('Location: /inicio');
    } 
    }

/*
    function buscarId(){
        $id=$_GET['id'];
        $this->vista->titulo = 'Mostrando Pedidos Mesa';
        $this->vista->url = 'pedidosmesa/buscarid';
        $this->setModelo('pedidosmesa');
        $this->vista->datos=$this->modelo->buscarId($id);
        $this->vista->render('pedidosmesa/buscarid');
    }
*/
    function buscar(){
    session_start(); 
    if(isset($_SESSION['usuario'])){ 
        try {
            isset($_POST['filtro']) ? $filtro = $_POST['filtro'] : $filtro = '';
            isset($_POST['buscar']) ? $buscar = $_POST['buscar'] : $buscar = '';
            $this->vista->titulo = 'Buscar pedidos mesa';
            $this->vista->url = 'pedidosmesa/buscar';
            $this->setModelo('pedidosmesa');
            $this->vista->datos = $this->modelo->listarResultados($filtro,$buscar,1);
            $this->vista->render('pedidosmesa/buscar');            
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }
    else{
        header('Location: /inicio');
    }
    }

/*
    function editar(){
        try {

            $idregistro = $_GET['id'];
            $this->setModelo('pedidosmesa');
            $this->vista->datos = $this->modelo->buscarId($idregistro);
            $this->vista->render('pedidosmesa/editar');
            exit;
            /*
            $id=$_GET['id'];
            $idmesa = $_POST['idmesa'];
            $cuenta = $_POST['cuenta'];
            $nombrecuenta = $_POST['nombrecuenta'];
            $this->setModelo('pedidosmesa');
            $this->modelo->update(["id"=>$id, "idmesa"=>$idmesa, "cuenta"=>$cuenta, "nombrecuenta"=>$nombrecuenta]);
            header("Location: /pedidosmesa/", TRUE, 301);
            exit();
            
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }
*/

    function actualizar(){
        try {
            $id = $_GET['id'];
            $idpedido = $_POST['idpedido'];
            $idmesa = $_POST['idmesa'];
            $cuenta = $_POST['cuenta'];
            $nombrecuenta = $_POST['nombrecuenta'];
            $this -> setModelo('pedidosmesa');
            $this -> modelo -> update([ 'idregistro' => $id ,'idpedido' => $idpedido, 'idmesa' => $idmesa, 'cuenta' => $cuenta, 'nombrecuenta' => $nombrecuenta]);
            header('Location: /pedidosmesa', true, 301);
            exit();
        } catch (\Throwable $th) {
            var_dump($th); //tirar error y para la ejecusion del programa
        }
    }


    function eliminar(){
        try {
            $id = $_GET['id'];
            $this -> setModelo('pedidosmesa');
            $this -> modelo -> delete([ 'idregistro' => $id]);
            header('Location: /pedidosmesa', true, 301);
            exit();
        } catch (\Throwable $th) {
            var_dump($th); //tirar error y para la ejecusion del programa
        }
    }

    /*
    function borrar(){
        try {
            $id=$_GET['id'];
            $this->setModelo('pedidosmesa');
            $this->modelo->delete(["idpedido"=>$id]);
            header("Location: /pedidosmesa/", TRUE, 301);
            exit();
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }
    */


}

?>