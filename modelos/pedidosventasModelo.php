<?php 

class PedidosVentasModelo extends Modelo{
    function __construct(){
        parent::__construct();
    }

    public function insert($datos){
        $query = $this-> db-> conectar()-> prepare('INSERT INTO pedidosyventas(NumeroFactura, NumeroPedido) VALUES (:NumeroFactura, :NumeroPedido)');
        $query->execute($datos);
    }

    public function update($datos){
        $query = $this-> db-> conectar()-> prepare('UPDATE pedidosyventas SET NumeroFactura = :NumeroFactura, NumeroPedido = :NumeroPedido WHERE id = :id');
        $query->execute($datos);
    }

    public function delete($datos){
        $query = $this-> db-> conectar()-> prepare('DELETE FROM pedidosyventas WHERE NumeroPedido = :id');
        $query->execute($datos);
    }

    public function listar(){
        $lista=[];
        try {
            $sql = 'SELECT * from pedidosyventas';
            $query = $this->db->conectar()->query($sql);
            foreach ($query as $row) {
                $pedido_venta =[
                    'id' => $row['id'],
                    'NumeroFactura' => $row['NumeroFactura'],
                    'NumeroPedido' => $row['NumeroPedido']
                    
                ];
                array_push($lista,$pedido_venta);
            }
            return $lista;
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

    public function buscarId($id){
        $lista=[];
        try {
            $sql = 'SELECT * from pedidosyventas where id='.$id;
            $query = $this->db->conectar()->query($sql);
            foreach ($query as $row) {
                $pedido_venta =[
                    'id' => $row['id'],
                    'NumeroFactura' => $row['NumeroFactura'],
                    'NumeroPedido' => $row['NumeroPedido']
                    
                ];
                array_push($lista,$pedido_venta);
            }
            return $lista;
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

}