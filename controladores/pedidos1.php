<?php

class Pedidos1 extends Controlador{
    function __construct(){
        parent::__construct();
        $this->vista->titulo = 'Pedidos1';
        $this->vista->url = 'pedidos1';
        //$this->vista->render('cargos/index');
        //echo "<h2>Controlador de inicio</h2>";
    }
    function inicio(){
        session_start(); 
        if(isset($_SESSION['usuario'])){ 
            $this->vista->titulo = 'Pedidos1';
            $this->vista->url = 'pedidos1';
            $this->setModelo('pedidos');
            $this->vista->datos = $this->modelo->listar('','',1);
            $this->vista->render('pedidos1/index');
        }
        else{
            header('Location: /inicio');
        } 

        
    }
    function nuevo(){
        session_start(); 
        if(isset($_SESSION['usuario'])){ 
            $this->vista->titulo = 'Nuevo pedido';
            $this->vista->url = 'pedidos1/nuevo';
            $this->setModelo('pedidos');
            $this->vista->clientes = $this->modelo->listarClientes();
            $this->vista->datos = $this->modelo->listarMeseros();
            $this->vista->estaciones = $this->modelo->listarEstaciones();
            $this->setModelo('pedidosmesa');
            $this->vista->mesas = $this->modelo->listarMesa();
            $this->setModelo('detallepedidos');
            $this->vista->productos = $this->modelo->listarProductos();
            $this->vista->render('pedidos1/nuevo');
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
                $this->vista->clientes = $this->modelo->listarClientes();
                $this->vista->meseros = $this->modelo->listarMeseros();
                $this->vista->estaciones = $this->modelo->listarEstaciones();
                $this->setModelo('pedidosmesa');
                $this->vista->mesas = $this->modelo->listarMesa();
                if($this->vista->datos[0]['modalidad']=='ME'){
                    $this->vista->datosMesa = $this->modelo->buscarIdPedido($id);
                    $this->vista->datosCliente[0]['idcliente'] = 0;
                    $this->vista->datosCliente[0]['nombre'] = 'Seleccione un valor';
                }
                else if($this->vista->datos[0]['modalidad']=='LL'){
                    $this->vista->datosMesa[0]['idmesa'] = 0;
                    $this->vista->datosMesa[0]['Mesa'] = 'Seleccione un valor';
                    $this->vista->datosMesa[0]['cuenta'] = "";
                    $this->vista->datosMesa[0]['nombrecuenta'] = "";
                    $this->setModelo('pedidosllevar');
                    $this->vista->datosCliente = $this->modelo->buscarIdPedido($id);
                }
                else{
                    $this->vista->datosCliente[0]['idcliente'] = 0;
                    $this->vista->datosCliente[0]['nombre'] = 'Seleccione un valor';
                    $this->vista->datosMesa[0]['idmesa'] = 0;
                    $this->vista->datosMesa[0]['Mesa'] = 'Seleccione un valor';
                    $this->vista->datosMesa[0]['cuenta'] = "";
                    $this->vista->datosMesa[0]['nombrecuenta'] = "";
                    $this->setModelo('pedidosllevar');
                }
                /* $this->vista->datosMesa = $this->modelo->buscarIdPedido($id);
                $this->setModelo('pedidosllevar');
                $this->vista->datosCliente = $this->modelo->buscarIdPedido($id); */
                $this->setModelo('detallepedidos');
                $this->vista->productos = $this->modelo->listarProductos();
                $this->vista->datosDetalle = $this->modelo->buscarIdPedido($id);

                $this->vista->render('pedidos1/buscarId');
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
                $this->vista->url = 'pedidos1/buscar';
                $this->setModelo('pedidos');
                $this->vista->datos = $this->modelo->listar($filtro,$buscar,1);
                $this->vista->render('pedidos1/buscar');            
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
            $elaborado = isset($_POST['elaborado'])? 'S':'N';
            $entregado = isset($_POST['entregado'])? 'S':'N';
            $facturado = isset($_POST['facturado'])? 'S':'N';
            $estado =$elaborado.$entregado.$facturado;

            $arregloDetallePedido = $_POST['detallePedido'];           
            
            $idmesero = $_POST['idmesero'];
            $fechahora = date('Y-m-d H:i:s',time());
            $Estacion = $_POST['Estacion'];
            $activo = $_POST['activo'];
            $modalidad = $_POST['modalidad'];
            
            
            
            $this -> setModelo('pedidos');
            $ultimoId=$this -> modelo -> insert(['idmesero' => $idmesero, 'fechahora' => $fechahora, 'Estacion' => $Estacion, 'activo' => $activo, 'modalidad' => $modalidad, 'estado' => $estado]);

            // $this -> modelo -> insertBulk($arregloDetallePedido,$ultimoId);
            if($modalidad == 'ME'){
                $idmesa = $_POST['idmesa'];
                $cuenta = $_POST['cuenta'];
                $nombrecuenta = $_POST['nombrecuenta'];
                $this->setModelo('pedidosmesa');
                $this->modelo->insert(["idpedido"=>$ultimoId, "idmesa"=>$idmesa, "cuenta"=>$cuenta,"nombrecuenta"=>$nombrecuenta,]);
            }
            else if($modalidad == 'LL'){
                $idcliente = $_POST['idcliente'];
                $this -> setModelo('pedidosLlevar');
                $this -> modelo -> insert(['idpedido' => $ultimoId, 'idcliente' => $idcliente]);
            }
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