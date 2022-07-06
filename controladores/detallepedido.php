<?php

class DetallePedido extends Controlador{
    function __construct(){
        parent::__construct();
        $this->vista->titulo = 'Detalle Pedido';
        $this->vista->url = 'detallepedido';
    }
    function inicio(){
        $this->vista->titulo = 'Detalle Pedido';
        $this->vista->url = 'detallepedido';
        $this->setModelo('detallepedidos');
        $this->vista->datos = $this->modelo->listar('','',1);
        $this->vista->render('detallepedido/index');
    }
    function nuevo(){
        $this->vista->titulo = 'Nuevo Detalle Pedido';
        $this->vista->url = 'detallepedido/nuevo';
        $this->setModelo('detallepedidos');
        $this->vista->productos = $this->modelo->listarProductos();
        $this->vista->render('detallepedido/nuevo');
    }

    function buscar(){
        session_start(); 
        if(isset($_SESSION['usuario'])){ 
            try {
                isset($_POST['filtro']) ? $filtro = $_POST['filtro'] : $filtro = '';
                isset($_POST['buscar']) ? $buscar = $_POST['buscar'] : $buscar = '';
                $this->vista->titulo = 'Buscar Detalle Pedido';
                $this->vista->url = 'detallepedido/buscar';
                $this->setModelo('detallepedidos');
                $this->vista->datos = $this->modelo->listar($filtro,$buscar,1);
                $this->vista->render('detallepedido/buscar');            
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
            $numeropedidos = $_POST['numeropedidos'];
            $codigoproducto = $_POST['codigoproducto'];
            $cantidad = $_POST['cantidad'];
            $notas = $_POST['notas'];
            $subproducto = $_POST['subproducto'];
            $cancelado = isset($_POST['cancelado'])?"1":"0";
            $elaborado = isset($_POST['elaborado'])?"1":"0";
            $entregado = isset($_POST['entregado'])?"1":"0";
            $facturado = isset($_POST['facturado'])?"1":"0";
            

            $this->setModelo('detallepedidos');
            $ultimoId=$this->modelo->insert(
                [
                    "numeropedidos"=>$numeropedidos, 
                    "codigoproducto"=>$codigoproducto,
                    "cantidad"=>$cantidad,
                    "notas"=>$notas,
                    "subproducto"=>$subproducto,
                    "cancelado"=>$cancelado,
                    "elaborado"=>$elaborado,
                    "entregado"=>$entregado,
                    "facturado"=>$facturado
            ]);
            if($cancelado == "1"){
                $this->setModelo('pedidoscancelados');
                $this -> modelo -> insert(['numeropedido' => $ultimoId, 'usuario' => 1, 'fechahora'=>date("Y-m-d H:i:s")]);
            }
            if($elaborado == "1"){
                $this->setModelo('pedidoselaborados');
                $this->modelo->insert(["iddetallepedido"=>$ultimoId, "idusuario"=>1, "fechahora"=>date("Y-m-d H:i:s")]);
            }
            if($entregado == "1"){
                $this->setModelo('entregapedido');
                $this->modelo->insert(["iddetalle_pedido"=>$ultimoId, "usuario"=>1, "fechahora"=>date("Y-m-d H:i:s"), "identrega"=>1]);
            }

            header("Location: /detallepedido/", TRUE, 301);
            exit();
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

    function buscarId() {
        try {
            $idregisto = $_GET['id'];
            
            $this->setModelo('detallepedidos');
            $this->vista->datos = $this->modelo->buscarId($idregisto);
            $this->vista->render('detallepedido/buscarId');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    function editar() {
        try {
            $idregisto = $_GET['id'];
            $this->setModelo('detallepedidos');
            $this->vista->datos = $this->modelo->buscarId($idregisto);            
            $this->vista->productos = $this->modelo->listarProductos();
            $this->vista->render('detallepedido/editar');
            exit;
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

    function update() {
        try {
            $idregisto = $_GET['id'];
            $numeropedidos = $_POST['numeropedidos'];
            $codigoproducto = $_POST['codigoproducto'];
            $cantidad = $_POST['cantidad'];
            $notas = $_POST['notas'];
            $subproducto = $_POST['subproducto'];
            $cancelado = isset($_POST['cancelado'])?"1":"0";
            $elaborado = isset($_POST['elaborado'])?"1":"0";
            $entregado = isset($_POST['entregado'])?"1":"0";
            $facturado = isset($_POST['facturado'])?"1":"0";
            $this->setModelo('detallepedidos');
            $this->modelo->actualizar( [
                "idregistro"=>$idregisto, 
                "numeropedidos"=>$numeropedidos, 
                "codigoproducto"=>$codigoproducto,
                "cantidad"=>$cantidad,
                "notas"=>$notas,
                "subproducto"=>$subproducto,
                "cancelado"=>$cancelado,
                "elaborado"=>$elaborado,
                "entregado"=>$entregado,
                "facturado"=>$facturado
            ]);
            if($cancelado == "1"){
                $this->setModelo('pedidoscancelados');
                $buscarDetalle=$this->modelo->buscarId($idregisto);
                var_dump($buscarDetalle);
                if(empty($buscarDetalle)){
                    $this -> modelo -> insert(['numeropedido' => $idregisto, 'usuario' => 1, 'fechahora'=>date("Y-m-d H:i:s")]);
                }
            }else{
                $this->setModelo('pedidoscancelados');
                $this->modelo->delete($idregisto);
            }
            if($elaborado == "1"){
                $this->setModelo('pedidoselaborados');
                $buscarDetalle=$this->modelo->buscarId($idregisto);
                if(empty($buscarDetalle)){
                    $this->modelo->insert(["iddetallepedido"=>$idregisto, "idusuario"=>1, "fechahora"=>date("Y-m-d H:i:s")]);
                }
            }else{
                $this->setModelo('pedidoselaborados');
                $this->modelo->eliminar($idregisto);
            }
            if($entregado == "1"){
                $this->setModelo('entregapedido');                
                $buscarDetalle=$this->modelo->buscarId($idregisto);
                if(empty($buscarDetalle)){
                    $this->modelo->insert(["iddetalle_pedido"=>$idregisto, "usuario"=>1, "fechahora"=>date("Y-m-d H:i:s"), "identrega"=>1]);
                }
            }else{
                $this->setModelo('entregapedido');
                $this->modelo->eliminar($idregisto);
            }
            header('Location: /detallepedido/',true,301);
            exit;
        } catch (\Throwable $th) {
            var_dump($th);
        }
        
    }

    function eliminar() {
        try {
            $idregisto = $_GET['id'];
            $this->setModelo('detallepedidos');
            $this->modelo->eliminar($idregisto);
            header('Location: /detallepedido/',true,301);
            exit;
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }
}

?>