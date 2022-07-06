<?php
class detallepedidosModelo extends Modelo{
    function __construct(){
        parent::__construct();
    }
    public function insert($datos){
        $query = $this->db->conectar()->prepare("INSERT INTO detalle_pedido (NumeroPedido, CodigoProducto,Cantidad,Notas,subproducto,Cancelado,Elaborado,Entregado,Facturado) VALUES (:numeropedidos, :codigoproducto, :cantidad, :notas, :subproducto, :cancelado, :elaborado, :entregado, :facturado)");
        $query->execute($datos);
    }

    public function listar(){
        $lista=[];
        try {
            $sql = 'select * from detalle_pedido';
            $query = $this->db->conectar()->query($sql);
            foreach ($query as $row) {
                $detallepedido =[
                    'idregistro' => $row['idregistro'],
                    'NumeroPedidos' => $row['NumeroPedidos'],
                    'CodigoProducto' => $row['CodigoProducto'],
                    'Cantidad' => $row['Cantidad'],
                    'Notas' => $row['Notas'],
                    'subproducto' => $row['subproducto'],
                    'Cancelado' => $row['Cancelado'],
                    'Elaborado' => $row['Elaborado'],
                    'Entregado' => $row['Entregado'],
                    'Facturado' => $row['Facturado']
                ];
                array_push($lista,$detallepedido);
            }
            return $lista;
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

    public function buscarId($idregisto){
        $lista=[];
        try {
            $sql = 'select * from detalle_pedido where idregistro='.$idregisto;
            $query = $this->db->conectar()->query($sql);
            foreach ($query as $row) {
                $detallepedido =[
                    'idregistro' => $row['idregistro'],
                    'NumeroPedidos' => $row['NumeroPedidos'],
                    'CodigoProducto' => $row['CodigoProducto'],
                    'Cantidad' => $row['Cantidad'],
                    'Notas' => $row['Notas'],
                    'subproducto' => $row['subproducto'],
                    'Cancelado' => $row['Cancelado'],
                    'Elaborado' => $row['Elaborado'],
                    'Entregado' => $row['Entregado'],
                    'Facturado' => $row['Facturado']
                ];
                array_push($lista,$detallepedido);
            }
            return $lista;
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

    public function actualizar($datos){
        $query = $this->db->conectar()->prepare("UPDATE detalle_pedido SET NumeroPedidos=:numeropedidos, CodigoProducto=:codigoproducto, Cantidad=:cantidad, Notas=:notas, subproducto=:subproducto, Cancelado=:cancelado, Elaborado=:elaborado, Entregado=:entregado, Facturado=:facturado WHERE idregistro=:idregistro");
        $query->execute($datos);
    }

    public function eliminar($idregisto){
        $sql = 'DELETE FROM detalle_pedido WHERE idregistro='.$idregisto;
        $query = $this->db->conectar()->query($sql);
        $query->execute();
    }

    public function EstadoCancelado($datos){
        $query = $this->db->conectar()->prepare("UPDATE detalle_pedido SET  Cancelado=:cancelado WHERE idregistro=:idregistro");
        $query->execute($datos);
    }
    public function EstadoElaborado($datos){
        $query = $this->db->conectar()->prepare("UPDATE detalle_pedido SET  C Elaborado=:elaborado WHERE idregistro=:idregistro");
        $query->execute($datos);
    }
    public function EstadoEntregado($datos){
        $query = $this->db->conectar()->prepare("UPDATE detalle_pedido SET  Entregado=:entregado, Facturado=:facturado WHERE idregistro=:idregistro");
        $query->execute($datos);
    }
    public function EstadoFacturado($datos){
        $query = $this->db->conectar()->prepare("UPDATE detalle_pedido SET   Facturado=:facturado WHERE idregistro=:idregistro");
        $query->execute($datos);
    }
}