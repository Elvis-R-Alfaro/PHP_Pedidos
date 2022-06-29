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
        $this->vista->datos = $this->modelo->listar();
        $this->vista->render('detallepedido/index');
    }
    function nuevo(){
        $this->vista->titulo = 'Nuevo Detalle Pedido';
        $this->vista->url = 'detallepedido/nuevo';
        $this->vista->render('detallepedido/nuevo');
    }
    function guardar(){
        try {
            $numeropedidos = $_POST['numeropedidos'];
            $codigoproducto = $_POST['codigoproducto'];
            $cantidad = $_POST['cantidad'];
            $notas = $_POST['notas'];
            $subproducto = $_POST['subproducto'];
            $cancelado = $_POST['cancelado'];
            $elaborado = $_POST['elaborado'];
            $entregado = $_POST['entregado'];
            $facturado = $_POST['entregado'];
            $this->setModelo('detallepedidos');
            $this->modelo->insert(
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
            $cancelado = $_POST['cancelado'];
            $elaborado = $_POST['elaborado'];
            $entregado = $_POST['entregado'];
            $facturado = $_POST['entregado'];
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