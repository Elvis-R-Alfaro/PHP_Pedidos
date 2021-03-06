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
    function anulados(){
        session_start(); 
        if(isset($_SESSION['usuario'])){ 
            $this->vista->titulo = 'Pedidos Anulados';
            $this->vista->url = 'pedidos/anulados';
            $this->setModelo('pedidos');
            $this->vista->datos = $this->modelo->listarAnulados();
            $this->vista->render('pedidos/anulados');
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
            $this->vista->clientes = $this->modelo->listarClientes();
            $this->vista->datos = $this->modelo->listarMeseros();
            $this->vista->estaciones = $this->modelo->listarEstaciones();
            $this->setModelo('pedidosmesa');
            $this->vista->mesas = $this->modelo->listarMesa();
            $this->setModelo('detallepedidos');
            $this->vista->productos = $this->modelo->listarProductos();
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
            $this -> modelo -> insert(['idmesero' => $idmesero, 'fechahora' => $fechahora, 'Estacion' => $Estacion, 'activo' => $activo, 'modalidad' => $modalidad, 'estado' => $estado]);
            $ultimoId =  $_COOKIE['id'];
            $this -> setModelo('detallepedidos');
            echo "Ultimo".$ultimoId;
            foreach($arregloDetallePedido as $item){
                $datos=[
                    "numeropedidos"=>$ultimoId, 
                    "codigoproducto"=>strval($item["producto"]),
                    "cantidad"=>strval($item["cantidad"]),
                    "notas"=>strval($item["notas"]),
                    "subproducto"=>strval($item["subproducto"]),
                    "cancelado"=>$item["cancelado"],
                    "elaborado"=>$item["elaborado"],
                    "entregado"=>$item["entregado"],
                    "facturado"=>$item["facturado"]
                ];
                $ultimoIdDetallePedido=$this->modelo->insert($datos);

            }

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
            
            $arregloDetallePedido = $_POST['detallePedido'];  
            $this -> setModelo('detallepedidos');            
            $this -> modelo -> DeleteAllNumeroPedido($id);
            foreach($arregloDetallePedido as $item){
                $cancelado = isset($item["cancelado"])?"1":"0";
                $elaborado = isset($item["elaborado"])?"1":"0";
                $entregado = isset($item["entregado"])?"1":"0";
                $facturado = isset($item["facturado"])?"1":"0";
                $datos=[
                    "numeropedidos"=>$id, 
                    "codigoproducto"=>strval($item["producto"]),
                    "cantidad"=>strval($item["cantidad"]),
                    "notas"=>strval($item["notas"]),
                    "subproducto"=>strval($item["subproducto"]),
                    "cancelado"=>$cancelado,
                    "elaborado"=>$elaborado,
                    "entregado"=>$entregado,
                    "facturado"=>$facturado
                ];
                $ultimoIdDetallePedido=$this->modelo->insert($datos);
                if($cancelado == "1"){
                    $this->setModelo('pedidoscancelados');
                    $buscarDetalle=$this->modelo->buscarId($ultimoIdDetallePedido);
                    var_dump($buscarDetalle);
                    if(empty($buscarDetalle)){
                        $this -> modelo -> insert(['numeropedido' => $ultimoIdDetallePedido, 'usuario' => 1, 'fechahora'=>date("Y-m-d H:i:s")]);
                    }
                }else{
                    $this->setModelo('pedidoscancelados');
                    $this->modelo->delete($ultimoIdDetallePedido);
                }
                if($elaborado == "1"){
                    $this->setModelo('pedidoselaborados');
                    $buscarDetalle=$this->modelo->buscarId($ultimoIdDetallePedido);
                    if(empty($buscarDetalle)){
                        $this->modelo->insert(["iddetallepedido"=>$ultimoIdDetallePedido, "idusuario"=>1, "fechahora"=>date("Y-m-d H:i:s")]);
                    }
                }else{
                    $this->setModelo('pedidoselaborados');
                    $this->modelo->eliminar($ultimoIdDetallePedido);
                }
                if($entregado == "1"){
                    $this->setModelo('entregapedido');                
                    $buscarDetalle=$this->modelo->buscarId($ultimoIdDetallePedido);
                    if(empty($buscarDetalle)){
                        $this->modelo->insert(["iddetalle_pedido"=>$ultimoIdDetallePedido, "usuario"=>1, "fechahora"=>date("Y-m-d H:i:s"), "identrega"=>1]);
                    }
                }else{
                    $this->setModelo('entregapedido');
                    $this->modelo->eliminar($ultimoIdDetallePedido);
                }

            }
            /*  
            $idmesero = $_POST['idmesero'];
            $fechahora = date('Y-m-d H:i:s',time());
            $Estacion = $_POST['Estacion'];
            $activo = isset($_POST['activo']);
            $modalidad = $_POST['modalidad'];
            $estado = $_POST['estado'];
            $this -> setModelo('pedidos');
            $this -> modelo -> update([ 'id' => $id ,'idmesero' => $idmesero, 'fechahora' => $fechahora, 'Estacion' => $Estacion, 'activo' => $activo, 'modalidad' => $modalidad, 'estado' => $estado]); */
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
            $this->modelo->anular($id);
            /* $this->modelo->delete($id);
            $this -> setModelo('detallepedidos');            
            $this -> modelo -> DeleteAllNumeroPedido($id); */
            header('Location: /pedidos/',true,301);
            exit;
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

    function restaurar(){
        try {
            $id = $_GET['id'];
            $this->setModelo('pedidos');
            $this->modelo->restaurar($id);
            /* $this->modelo->delete($id);
            $this -> setModelo('detallepedidos');            
            $this -> modelo -> DeleteAllNumeroPedido($id); */
            header('Location: /pedidos/anulados',true,301);
            exit;
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }


}