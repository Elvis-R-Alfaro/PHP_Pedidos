<?php 

class PedidosVentasModelo extends Modelo{
    function __construct(){
        parent::__construct();
    }

    public function insert($datos){
        $query = $this-> db-> conectar()-> prepare('INSERT INTO pedidos_x_ventas(NumeroPedido) VALUES (:NumeroPedido)');
        $query->execute($datos);
    }

    public function update($datos){
        $query = $this-> db-> conectar()-> prepare('UPDATE pedidos_x_ventas SET NumeroPedido = :NumeroPedido WHERE NumeroFactura = :id');
        $query->execute($datos);
    }

    public function delete($datos){
        $query = $this-> db-> conectar()-> prepare('DELETE FROM pedidos_x_ventas WHERE NumeroFactura = :NumeroFactura');
        $query->execute($datos);
    }

    public function listar(){
        $lista=[];
        try {
            $sql = 'select pedidos_x_ventas.NumeroFactura, detalle_pedido.NumeroPedido, productos.Nombre from detalle_pedido          
            inner join productos on detalle_pedido.CodigoProducto = productos.Codigo
            inner join pedidos_x_ventas on detalle_pedido.NumeroPedido = pedidos_x_ventas.NumeroPedido';
            $query = $this->db->conectar()->query($sql);
            foreach ($query as $row) {
                $pedido_venta =[
                    'NumeroFactura' => $row['NumeroFactura'],
                    'NumeroPedido' => $row['NumeroPedido'],
                    'Nombre' => $row['Nombre']
                    
                ];
                array_push($lista,$pedido_venta);
            }
            return $lista;
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }


    public function listarProductos(){
        $lista=[];
        try {
            $sql = 'select Nombre from productos';
            $query = $this->db->conectar()->query($sql);
            foreach ($query as $row) {
                $productos =[
                    'Nombre' => $row['Nombre']
                ];
                array_push($lista,$productos);
            }
            return $lista;
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

    public function listarFacturas(){
        $lista=[];
        try {
            $sql = 'select detalle_pedido.NumeroPedido,productos.Nombre from detalle_pedido          
            inner join productos on detalle_pedido.CodigoProducto = productos.Codigo';
            $query = $this->db->conectar()->query($sql);
            foreach ($query as $row) {
                $facturas =[
                    'Nombre' => $row['Nombre'],
                    'NumeroPedido' => $row['NumeroPedido']
                ];
                array_push($lista,$facturas);
            }
            return $lista;
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }


    public function listarResultados($filtro,$buscar,$estado){
        $lista=[];
        try {            
            if($buscar == ''){
                $sql = 'select pedidos_x_ventas.NumeroFactura, detalle_pedido.NumeroPedido, productos.Nombre from detalle_pedido          
                inner join productos on detalle_pedido.CodigoProducto = productos.Codigo
                inner join pedidos_x_ventas on detalle_pedido.NumeroPedido = pedidos_x_ventas.NumeroPedido';
            }
            else{
                $sql = 'select pedidos_x_ventas.NumeroFactura, detalle_pedido.NumeroPedido, productos.Nombre from detalle_pedido          
                inner join productos on detalle_pedido.CodigoProducto = productos.Codigo
                inner join pedidos_x_ventas on detalle_pedido.NumeroPedido = pedidos_x_ventas.NumeroPedido
                WHERE '.$filtro .' LIKE "%'.$buscar.'%"';
            }
            
            $query = $this->db->conectar()->query($sql);
            foreach ($query as $row) {
                $pedidoVenta =[
                    'NumeroFactura' => $row['NumeroFactura'],
                    'NumeroPedido' => $row['NumeroPedido'],
                    'Nombre' => $row['Nombre']
                    
                ];
                array_push($lista,$pedidoVenta);
            }
            return $lista;
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }



    public function buscarId($id){
        $lista=[];
        try {
            $sql = 'select pedidos_x_ventas.NumeroFactura, detalle_pedido.NumeroPedido, productos.Nombre from detalle_pedido          
            inner join productos on detalle_pedido.CodigoProducto = productos.Codigo
            inner join pedidos_x_ventas on detalle_pedido.NumeroPedido = pedidos_x_ventas.NumeroPedido where NumeroFactura = '.$id;
            $query = $this->db->conectar()->query($sql);
            foreach ($query as $row) {
                $pedido_venta =[
                    'id' => $row['NumeroFactura'],
                    'NumeroPedido' => $row['NumeroPedido'],
                    'Nombre' => $row['Nombre']
                ];
                array_push($lista,$pedido_venta);
            }
            return $lista;
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

}