<?php
class detallepedidosModelo extends Modelo{
    function __construct(){
        parent::__construct();
    }
    public function insert($datos){
        $query = $this->db->conectar()->prepare("INSERT INTO detalle_pedido (NumeroPedido, CodigoProducto,Cantidad,Notas,subproducto,Cancelado,Elaborado,Entregado,Facturado) VALUES (:numeropedidos, :codigoproducto, :cantidad, :notas, :subproducto, :cancelado, :elaborado, :entregado, :facturado)");
        $query->execute($datos);
    }
    public function insertBulk($arregloDetallePedido,$ultimoIdPedido){
        foreach($arregloDetallePedido as $item){
            $datos=[
                "numeropedidos"=>$ultimoIdPedido, 
                "codigoproducto"=>strval($item["producto"]),
                "cantidad"=>strval($item["cantidad"]),
                "notas"=>strval($item["notas"]),
                "subproducto"=>strval($item["subproducto"])
            ];
            $query = $this->db->conectar()->prepare("INSERT INTO detalle_pedido (NumeroPedido, CodigoProducto,Cantidad,Notas,subproducto) VALUES (:numeropedidos, :codigoproducto, :cantidad, :notas, :subproducto) ");
            $query->execute($datos);
        }
        
    }

    public function DeleteAllNumeroPedido($idPedido){
        $sql = 'DELETE FROM detalle_pedido WHERE NumeroPedido='.$idPedido;
        $query = $this->db->conectar()->query($sql);
        $query->execute();
        
    }

    public function listar($filtro,$buscar,$estado){
        
        $lista=[];
        try {
            if($buscar == ''){
                $sql = 'SELECT detalle_pedido.*,p1.Nombre AS NombreProducto ,p2.Nombre AS NombreSubproducto  from detalle_pedido 
                LEFT JOIN productos AS p1 ON p1.Codigo = detalle_pedido.CodigoProducto 
                LEFT JOIN productos AS p2 ON p2.Codigo = detalle_pedido.subproducto
                order by idregistro asc';
            }
            else{
                $sql = 'SELECT detalle_pedido.*,p1.Nombre AS NombreProducto ,p2.Nombre AS NombreSubproducto  from detalle_pedido 
                LEFT JOIN productos AS p1 ON p1.Codigo = detalle_pedido.CodigoProducto 
                LEFT JOIN productos AS p2 ON p2.Codigo = detalle_pedido.subproducto                
                WHERE '.$filtro .' LIKE "%'.$buscar.'%" order by idregistro asc';
            }
            $query = $this->db->conectar()->query($sql);
            foreach ($query as $row) {
                $detallepedido =[
                    'idregistro' => $row['idregistro'],
                    'NumeroPedidos' => $row['NumeroPedido'],
                    'CodigoProducto' => $row['CodigoProducto'],
                    'NombreProducto' => $row['NombreProducto'],
                    'NombreSubproducto' => $row['NombreSubproducto'],
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

    public function listarProductos(){
        
        $lista=[];
        try {
            $sql = 'SELECT Codigo, Nombre from productos';
            $query = $this->db->conectar()->query($sql);
            foreach ($query as $row) {
                $detallepedido =[
                    'codigo' => $row['Codigo'],
                    'nombre' => $row['Nombre'],
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
            $sql = 'SELECT detalle_pedido.*,p1.Nombre AS NombreProducto ,p2.Nombre AS NombreSubproducto  from detalle_pedido 
            LEFT JOIN productos AS p1 ON p1.Codigo = detalle_pedido.CodigoProducto 
            LEFT JOIN productos AS p2 ON p2.Codigo = detalle_pedido.subproducto
            WHERE idregistro='.$idregisto.' order by idregistro asc';
            $query = $this->db->conectar()->query($sql);
            foreach ($query as $row) {
                $detallepedido =[
                    'idregistro' => $row['idregistro'],
                    'NumeroPedido' => $row['NumeroPedido'],
                    'CodigoProducto' => $row['CodigoProducto'],
                    'NombreProducto' => $row['NombreProducto'],
                    'NombreSubproducto' => $row['NombreSubproducto'],
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

    public function buscarIdPedido($NumeroPedido){
        $lista=[];
        try {
            $sql = 'select detalle_pedido.*, productos.nombre from detalle_pedido 
            JOIN productos ON productos.Codigo = detalle_pedido.CodigoProducto 
            where detalle_pedido.NumeroPedido ='.$NumeroPedido;
            $query = $this->db->conectar()->query($sql);
            foreach ($query as $row) {
                $detallepedido =[
                    'idregistro' => $row['idregistro'],
                    'NumeroPedidos' => $row['NumeroPedido'],
                    'CodigoProducto' => $row['CodigoProducto'],
                    'Cantidad' => $row['Cantidad'],
                    'Notas' => $row['Notas'],
                    'subproducto' => $row['subproducto'],
                    'Cancelado' => $row['Cancelado'],
                    'Elaborado' => $row['Elaborado'],
                    'Entregado' => $row['Entregado'],
                    'Facturado' => $row['Facturado'],
                    'Nombre' => $row['nombre']
                ];
                array_push($lista,$detallepedido);
            }
            return $lista;
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

    public function actualizar($datos){
        $query = $this->db->conectar()->prepare("UPDATE detalle_pedido SET NumeroPedido=:numeropedidos, CodigoProducto=:codigoproducto, Cantidad=:cantidad, Notas=:notas, subproducto=:subproducto, Cancelado=:cancelado, Elaborado=:elaborado, Entregado=:entregado, Facturado=:facturado WHERE idregistro=:idregistro");
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