<?php

class pedidosmesaModelo extends Modelo{
    function __construct(){
        parent::__construct();
        
    }
    public function insert($datos){
       $query = $this->db->conectar()->prepare('insert into pedidos_mesa (idpedido, idmesa, cuenta, nombrecuenta) value(:idpedido, :idmesa, :cuenta, :nombrecuenta)');
       $query->execute($datos);
    }

    public function select(){
        $lista = [];
        try {
            $sql = 'select * from pedidos_mesa';
            $query = $this->db->conectar()->query($sql);
            foreach($query as $row){
                $pedidosmesa = [
                    'idpedido'=>$row['idpedido'],
                    'idmesa'=>$row['idmesa'],
                    'cuenta'=>$row['cuenta'],
                    'nombrecuenta'=>$row['nombrecuenta']
                ];
                array_push($lista, $pedidosmesa);
            }
            return $lista;
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

    
    public function listarMesa(){
        $lista=[];
        try {
            $sql = 'select * from mesas_x_area';
            $query = $this->db->conectar()->query($sql);
            foreach ($query as $row) {
                $mesas =[
                    'Mesa' => $row['Mesa'],
                    'idregistro' => $row['idregistro'],
                    
                    
                ];
                array_push($lista,$mesas);
            }
            return $lista;
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }


    public function listarPedidos(){
        $lista=[];
        try {
            $sql = 'select NumeroPedido from pedidos';
            $query = $this->db->conectar()->query($sql);
            foreach ($query as $row) {
                $pedidos =[
                    'NumeroPedido' => $row['NumeroPedido'],
                ];
                array_push($lista,$pedidos);
            }
            return $lista;
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

    public function buscarid($id){
        $lista = [];
        try {
            $sql = 'select * from pedidos_mesa where idpedido='.$idpedido;
            $query = $this->db->conectar()->query($sql);
            foreach($query as $row){
                $pedidosmesa = [
                    'idpedido'=>$row['idpedido'],
                    'idmesa'=>$row['idmesa'],
                    'cuenta'=>$row['cuenta'],
                    'nombrecuenta'=>$row['nombrecuenta']
                ];
                array_push($lista, $pedidosmesa);
            }
            return $lista;
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

    public function update($datos){
        $query = $this->db->conectar()->prepare('update pedidos_mesa set idmesa=:idmesa, cuenta=:cuenta, nombrecuenta=:nombrecuenta where idpedido=:idpedido');
        $query->execute($datos);
    }

    public function delete($datos){
        $query = $this->db->conectar()->prepare('delete from pedidos_mesa where idpedido=:idpedido');
        $query->execute($datos);
    }
}

?>