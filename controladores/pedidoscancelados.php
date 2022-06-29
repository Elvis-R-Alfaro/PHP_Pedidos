<?php

class Pedidoscancelados extends Controlador{
    function __construct(){
        parent::__construct();
        $this->vista->titulo = 'Pedidos Cancelados';
        $this->vista->url = 'pedidoscancelados';
        //$this->vista->render('cargos/index');
        //echo "<h2>Controlador de inicio</h2>";
    }
    function inicio(){
        $this->vista->titulo = 'Pedidos Cancelados';
        $this->vista->url = 'pedidoscancelados';
        $this->setModelo('pedidoscancelados');
        $this->vista->datos=$this->modelo->select();
        $this->vista->render('pedidoscancelados/index');
    }
    function nuevo(){
        $this->vista->titulo = 'Nuevo Pedido Cancelado';
        $this->vista->url = 'pedidoscancelados/nuevo';
        $this->vista->render('pedidoscancelados/nuevo');
    }
    function guardar(){
        try {
            $numeropedido = $_POST['numeropedido'];
            $usuario = $_POST['usuario'];
            $fechahora = $_POST['fechahora'];
            $this->setModelo('pedidoscancelados');
            $this->modelo->insert(["numeropedido"=>$numeropedido, "usuario"=>$usuario, "fechahora"=>$fechahora]);
            header("Location: /pedidoscancelados/", TRUE, 301);
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
        $this->vista->titulo = 'Mostrando Pedidos Cancelados';
        $this->vista->url = 'pedidoscancelados/buscarid';
        $this->setModelo('pedidoscancelados');
        $this->vista->datos=$this->modelo->buscarid($id);
        $this->vista->render('pedidoscancelados/buscarid');
    }

    function actualizar(){
        $id=$_GET['id'];
        $this->vista->titulo = 'Editando Pedidos Cancelados';
        $this->vista->url = 'pedidoscancelados/actualizar';
        $this->setModelo('pedidoscancelados');
        $this->vista->datos=$this->modelo->buscarid($id);
        $this->vista->render('pedidoscancelados/actualizar');
    }

    function editar(){
        try {
            $id=$_GET['id'];
            $usuario = $_POST['usuario'];
            $fechahora = $_POST['fechahora'];
            $this->setModelo('pedidoscancelados');
            $this->modelo->update(["numeropedido"=>$id, "usuario"=>$usuario, "fechahora"=>$fechahora]);
            header("Location: /pedidoscancelados/", TRUE, 301);
            exit();
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

    function eliminar(){
        $id=$_GET['id'];
        $this->vista->titulo = 'Eliminando Pedidos Cancelados';
        $this->vista->url = 'pedidoscancelados/eliminar';
        $this->setModelo('pedidoscancelados');
        $this->vista->datos=$this->modelo->buscarid($id);
        $this->vista->render('pedidoscancelados/eliminar');
    }

    function borrar(){
        try {
            $id=$_GET['id'];
            $this->setModelo('pedidoscancelados');
            $this->modelo->delete(["numeropedido"=>$id]);
            header("Location: /pedidoscancelados/", TRUE, 301);
            exit();
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

}

?>