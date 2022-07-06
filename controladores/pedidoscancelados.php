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
        session_start(); 
        if(isset($_SESSION['usuario'])){ 
            $this->vista->titulo = 'Pedidos Cancelados';
            $this->vista->url = 'pedidoscancelados';
            $this->setModelo('pedidoscancelados');
            $this->vista->datos=$this->modelo->select();
            $this->vista->render('pedidoscancelados/index');
        }
        else{
            header('Location: /inicio');
        }
    }
    function nuevo(){
        session_start(); 
        if(isset($_SESSION['usuario'])){ 
        $this->vista->titulo = 'Nuevo pedido a cancelar';
        $this->vista->url = 'pedidoscancelados/nuevo';
        $this->setModelo('pedidoscancelados');
        $this->vista->usuarios = $this->modelo->listarusuarios();
        $this->vista->pedidos = $this->modelo->listarPedidos();
        $this->vista->render('pedidoscancelados/nuevo');
    }
    else{
        header('Location: /inicio');
    } 
    }


    function listar() {
        $this->setModelo('pedidoscancelados');
        $this->vista->datos = $this->modelo->listar();
    }



    function guardar(){
        try {
            $numeropedido = $_POST['numeropedido'];
            $usuario = $_POST['usuario'];
            $fechahora = $_POST['fechahora'];
            $this -> setModelo('pedidoscancelados');
            $this -> modelo -> insert(['numeropedido' => $numeropedido, 'usuario' => $usuario, 'fechahora'=>$fechahora]);
            header('Location: /pedidoscancelados', true, 301);
            exit();
        } catch (\Throwable $th) {
            var_dump($th); //tirar error y para la ejecusion del programa
        }
    }
    function buscarid(){
        $id=$_GET['id'];
        $this->vista->titulo = 'Mostrando Pedidos Cancelados';
        $this->vista->url = 'pedidoscancelados/buscarid';
        $this->setModelo('pedidoscancelados');
        $this->vista->usuarios=$this->modelo->listarusuarios();
        $this->vista->pedidos=$this->modelo->listarPedidos();
        $this->vista->datos=$this->modelo->buscarid($id);
        $this->vista->render('pedidoscancelados/buscarid');
    }

    function buscar(){
        session_start(); 
        if(isset($_SESSION['usuario'])){ 
            try {
                isset($_POST['filtro']) ? $filtro = $_POST['filtro'] : $filtro = '';
                isset($_POST['buscar']) ? $buscar = $_POST['buscar'] : $buscar = '';
                $this->vista->titulo = 'Buscar pedido a cancelar';
                $this->vista->url = 'pedidoscancelados/buscar';
                $this->setModelo('pedidoscancelados');
                $this->vista->datos = $this->modelo->listarResultados($filtro,$buscar,1);
                $this->vista->render('pedidoscancelados/buscar');            
            } catch (\Throwable $th) {
                var_dump($th);
            }
        }
        else{
            header('Location: /inicio');
        }
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
        try {
            $id = $_GET['id'];
            $this->setModelo('pedidoscancelados');
            $query=$this->modelo->delete($id);
            print_r($query);
            header("Location: /pedidoscancelados/");
            exit();
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }


}

?>