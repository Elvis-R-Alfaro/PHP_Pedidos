<?php 

class PedidosLLevarModelo extends Modelo{
    function __construct(){
        parent::__construct();
    }

    public function insert($datos){
        $query = $this-> db-> conectar()-> prepare('INSERT INTO pedidos_llevar(idpedido, idcliente) VALUES (:idpedido, :idcliente)');
        $query->execute($datos);
    }

    public function update($datos){
        $query = $this-> db-> conectar()-> prepare('UPDATE pedidos_llevar SET idpedido = :idpedido, idcliente = :idcliente WHERE idregistro = :id');
        $query->execute($datos);
    }

    public function delete($datos){
        $query = $this-> db-> conectar()-> prepare('DELETE FROM pedidos_llevar WHERE idregistro = :idregistro');
        $query->execute($datos);
    }

    public function listar(){
        $lista=[];
        try {
            $sql = 'select * from pedidos_llevar';
            $query = $this->db->conectar()->query($sql);
            foreach ($query as $row) {
                $pedido_llevar =[
                    'idregistro' => $row['idregistro'],
                    'idpedido' => $row['idpedido'],
                    'idcliente' => $row['idcliente']
                    
                ];
                array_push($lista,$pedido_llevar);
            }
            return $lista;
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

    public function buscarId($id){
        $lista=[];
        try {
            $sql = 'select * from pedidos_llevar where idregistro='.$id;
            $query = $this->db->conectar()->query($sql);
            foreach ($query as $row) {
                $pedido_listar =[
                    'id' => $row['idregistro'],
                    'idpedido' => $row['idpedido'],
                    'idcliente' => $row['idcliente']
                    
                ];
                array_push($lista,$pedido_listar);
            }
            return $lista;
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

}