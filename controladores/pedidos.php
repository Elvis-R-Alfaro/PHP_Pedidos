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
        session_start(); 
        if(isset($_SESSION['usuario'])){ 
            $this->vista->titulo = 'Pedidos';
            $this->vista->url = 'pedidos';
            $this->setModelo('pedidos');
            $this->vista->datos = $this->modelo->listar('','',1);
            $this->vista->render('pedidos/index');
        }
        else{
            header('Location: /inicio');
        } 

        
    }
    function nuevo(){
        session_start(); 
        if(isset($_SESSION['usuario'])){ 
            $this->vista->titulo = 'Nuevo pedido';
            $this->vista->url = 'pedidos/nuevo';
            $this->setModelo('pedidos');
            $this->vista->datos = $this->modelo->listarMesas();
            $this->vista->clientes = $this->modelo->listarClientes();
            $this->vista->datos = $this->modelo->listarMeseros();
            $this->vista->estaciones = $this->modelo->listarEstaciones();
            $this->vista->render('pedidos/nuevo');
        }
        else{
            header('Location: /inicio');
        } 
        
    }

    function listar() {
        $this->setModelo('pedidos');
        $this->vista->datos = $this->modelo->listar('','',1);
    }

    function buscarId() {
        session_start(); 
        if(isset($_SESSION['usuario'])){ 
            try {
                $id = $_GET['id'];
                $this->setModelo('pedidos');
                $this->vista->datos = $this->modelo->buscarId($id);
                $this->vista->render('pedidos/buscarId');
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
                if($buscar == 'mesa'){
                    $buscar = 'ME';
                }
                else if($buscar == 'llevar'){
                    $buscar = 'Ll';
                }
                else if($buscar == 'domicilio'){
                    $buscar = 'DO';
                }
                $this->vista->titulo = 'Buscar pedido';
                $this->vista->url = 'pedidos/buscar';
                $this->setModelo('pedidos');
                $this->vista->datos = $this->modelo->listar($filtro,$buscar,1);
                $this->vista->render('pedidos/buscar');            
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
            $arregloDetallePedido = $_POST['detallePedido'];
            foreach($arregloDetallePedido as $item){
                echo $item["producto"];
                echo '<br>';
                echo $item["cantidad"];
                echo '<br>';
                echo $item["subproducto"];
                echo '<br>';
                echo $item["notas"];
                echo '<br>';
            }
            
            
            $idmesero = $_POST['idmesero'];
            $fechahora = date('Y-m-d H:i:s',time());
            $Estacion = $_POST['Estacion'];
            $activo = $_POST['activo'];
            $modalidad = $_POST['modalidad'];  
            $elaborado = isset($_POST['elaborado'])? 'S':'N';
            $entregado = isset($_POST['entregado'])? 'S':'N';
            $facturado = isset($_POST['facturado'])? 'S':'N';
            $estado =$elaborado.$entregado.$facturado;
            
            $this -> setModelo('pedidos');
            $ultimoId=$this -> modelo -> insert(['idmesero' => $idmesero, 'fechahora' => $fechahora, 'Estacion' => $Estacion, 'activo' => $activo, 'modalidad' => $modalidad, 'estado' => $estado]);
            $this -> setModelo('detallepedidos');
            echo "Ultimo".$ultimoId;
            $this -> modelo -> insertBulk($arregloDetallePedido,$ultimoId);
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
            $activo = isset($_POST['activo']);
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
            $this->setModelo('pedidos');
            $this->modelo->delete($id);
            header('Location: /pedidos/',true,301);
            exit;
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }


}