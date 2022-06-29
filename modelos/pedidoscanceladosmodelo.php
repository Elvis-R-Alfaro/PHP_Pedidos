<?php

class pedidoscanceladosModelo extends Modelo{
    function __construct(){
        parent::__construct();
        
    }
    public function insert($datos){
       $query = $this->db->conectar()->prepare('insert into pedidos_cancelados (numeropedido, usuario, fechahora) value(:numeropedido, :usuario, :fechahora)');
       $query->execute($datos);
    }

    public function select(){
        $lista = [];
        try {
            $sql = 'select * from pedidos_cancelados';
            $query = $this->db->conectar()->query($sql);
            foreach($query as $row){
                $pedidocancelado = [
                    'numeropedido'=>$row['numeropedido'],
                    'usuario'=>$row['usuario'],
                    'fechahora'=>$row['fechahora']
                ];
                array_push($lista, $pedidocancelado);
            }
            return $lista;
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

    public function buscarid($numeropedido){
        $lista = [];
        try {
            $sql = 'select * from pedidos_cancelados where numeropedido='.$numeropedido;
            $query = $this->db->conectar()->query($sql);
            foreach($query as $row){
                $pedidocancelado = [
                    'numeropedido'=>$row['numeropedido'],
                    'usuario'=>$row['usuario'],
                    'fechahora'=>$row['fechahora']
                ];
                array_push($lista, $pedidocancelado);
            }
            return $lista;
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

    public function update($datos){
        $query = $this->db->conectar()->prepare('update pedidos_cancelados set usuario=:usuario, fechahora=:fechahora where numeropedido=:numeropedido');
        $query->execute($datos);
    }

    public function delete($datos){
        $query = $this->db->conectar()->prepare('delete from pedidos_cancelados where numeropedido=:numeropedido');
        $query->execute($datos);
    }
}

?>