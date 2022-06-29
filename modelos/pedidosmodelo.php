<?php 

class PedidosModelo extends Modelo{
    function __construct(){
        parent::__construct();
    }

    public function insert($datos){
        $query = $this-> db-> conectar()-> prepare('INSERT INTO pedidos(idmesero, fechahora, Estacion, activo, modalidad, estado) VALUES (:idmesero, :fechahora, :Estacion, :activo, :modalidad, :estado)');
        $query->execute($datos);
    }

    public function update($datos){
        $query = $this-> db-> conectar()-> prepare('UPDATE pedidos SET idmesero = :idmesero, fechahora = :fechahora, Estacion = :Estacion, activo = :activo, modalidad = :modalidad, estado = :estado WHERE NumeroPedido = :id');
        $query->execute($datos);
    }

    public function delete($datos){
        $query = $this-> db-> conectar()-> prepare('DELETE FROM pedidos WHERE NumeroPedido = :NumeroPedido');
        $query->execute($datos);
    }

    public function listar(){
        $lista=[];
        try {
            $sql = 'select * from pedidos';
            $query = $this->db->conectar()->query($sql);
            foreach ($query as $row) {
                $pedido =[
                    'NumeroPedido' => $row['NumeroPedido'],
                    'idmesero' => $row['idmesero'],
                    'fechahora' => $row['fechahora'],
                    'Estacion' => $row['Estacion'],
                    'activo' => $row['activo'],
                    'modalidad' => $row['modalidad'],
                    'estado' => $row['estado']
                ];
                array_push($lista,$pedido);
            }
            return $lista;
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

    public function buscarId($id){
        $lista=[];
        try {
            $sql = 'select * from pedidos where NumeroPedido='.$id;
            $query = $this->db->conectar()->query($sql);
            foreach ($query as $row) {
                $pedido =[
                    'id' => $row['NumeroPedido'],
                    'idmesero' => $row['idmesero'],
                    'fechahora' => $row['fechahora'],
                    'Estacion' => $row['Estacion'],
                    'activo' => $row['activo'],
                    'modalidad' => $row['modalidad'],
                    'estado' => $row['estado']
                ];
                array_push($lista,$pedido);
            }
            return $lista;
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

}