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
        $this->vista->datos=$this->modelo->select();
        $this->vista->render('pedidosmesa/index');
    }
    function nuevo(){
        $this->vista->titulo = 'Nuevo Pedido Mesa';
        $this->vista->url = 'pedidosmesa/nuevo';
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
    function buscarid(){
        $id=$_GET['id'];
        $this->vista->titulo = 'Mostrando Pedidos Mesa';
        $this->vista->url = 'pedidosmesa/buscarid';
        $this->setModelo('pedidosmesa');
        $this->vista->datos=$this->modelo->buscarid($id);
        $this->vista->render('pedidosmesa/buscarid');
    }

    function actualizar(){
        $id=$_GET['id'];
        $this->vista->titulo = 'Editando Pedidos Mesa';
        $this->vista->url = 'pedidosmesa/actualizar';
        $this->setModelo('pedidosmesa');
        $this->vista->datos=$this->modelo->buscarid($id);
        $this->vista->render('pedidosmesa/actualizar');
    }

    function editar(){
        try {
            $id=$_GET['id'];
            $idmesa = $_POST['idmesa'];
            $cuenta = $_POST['cuenta'];
            $nombrecuenta = $_POST['nombrecuenta'];
            $this->setModelo('pedidosmesa');
            $this->modelo->update(["idpedido"=>$id, "idmesa"=>$idmesa, "cuenta"=>$cuenta, "nombrecuenta"=>$nombrecuenta]);
            header("Location: /pedidosmesa/", TRUE, 301);
            exit();
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

    function eliminar(){
        $id=$_GET['id'];
        $this->vista->titulo = 'Eliminando Pedidos Mesa';
        $this->vista->url = 'pedidosmesa/eliminar';
        $this->setModelo('pedidosmesa');
        $this->vista->datos=$this->modelo->buscarid($id);
        $this->vista->render('pedidosmesa/eliminar');
    }

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

}

?>