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

    public function listar(){
        $lista=[];
        try {
            $sql = 'select pedidos_mesa.*, mesas_x_area.Mesa from pedidos_mesa join mesas_x_area 
            on pedidos_mesa.idmesa = mesas_x_area.idregistro';
            $query = $this->db->conectar()->query($sql);
            foreach ($query as $row) {
                $pedido_mesa =[
                    //'mesa' => $row['mesa'],
                    'idregistro' => $row['idregistro'],
                    'idpedido' => $row['idpedido'],
                    'Mesa' => $row['Mesa'],
                    //'idmesa' => $row['idmesa'],
                    'cuenta' => $row['cuenta'],
                    'nombrecuenta' => $row['nombrecuenta']
                    
                    
                ];
                array_push($lista,$pedido_mesa);
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

    public function listarResultados($filtro,$buscar,$estado){
        $lista=[];
        try {            
            if($buscar == ''){
                $sql = 'select pedidos_mesa.*, mesas_x_area.Mesa from pedidos_mesa join mesas_x_area 
                on pedidos_mesa.idmesa = mesas_x_area.idregistro';
            }
            else{
                $sql = 'select pedidos_mesa.*, mesas_x_area.Mesa from pedidos_mesa inner join mesas_x_area 
                on pedidos_mesa.idmesa = mesas_x_area.idregistro
                WHERE '.$filtro .' LIKE "%'.$buscar.'%"';
            }
            
            $query = $this->db->conectar()->query($sql);
            foreach ($query as $row) {
                $pedidomesa =[
                    'idregistro' => $row['idregistro'],
                    'idpedido' => $row['idpedido'],
                 //   'idmesa' => $row['idmesa'],
                    'Mesa' => $row['Mesa'],
                    'cuenta' => $row['cuenta'],
                    'nombrecuenta' => $row['nombrecuenta']
                ];
                array_push($lista,$pedidomesa);
            }
            return $lista;
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }
    public function buscarId($id){
        $lista = [];
        try {
            $sql = 'select pedidos_mesa.*, mesas_x_area.Mesa from pedidos_mesa join mesas_x_area
            on pedidos_mesa.idmesa = mesas_x_area.idregistro where pedidos_mesa.idregistro = '.$id;
            $query = $this->db->conectar()->query($sql);
            foreach($query as $row){
                $pedidomesa_listar = [
                    'idpedido'=>$row['idpedido'],
                    'idmesa'=>$row['idmesa'],
                    'cuenta'=>$row['cuenta'],
                    'nombrecuenta'=>$row['nombrecuenta'],
                    'idregistro'=>$row['idregistro'],
                    'Mesa'=>$row['Mesa']
                ];
                array_push($lista, $pedidomesa_listar);
            }
            return $lista;
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

    public function buscarIdPedido($id){
        $lista = [];
        try {
            $sql = 'select pedidos_mesa.*, mesas_x_area.Mesa from pedidos_mesa join mesas_x_area
            on pedidos_mesa.idmesa = mesas_x_area.idregistro where pedidos_mesa.idpedido = '.$id;
            $query = $this->db->conectar()->query($sql);
            foreach($query as $row){
                $pedidomesa_listar = [
                    'idpedido'=>$row['idpedido'],
                    'idmesa'=>$row['idmesa'],
                    'cuenta'=>$row['cuenta'],
                    'nombrecuenta'=>$row['nombrecuenta'],
                    'idregistro'=>$row['idregistro'],
                    'Mesa'=>$row['Mesa']
                ];
                array_push($lista, $pedidomesa_listar);
            }
            return $lista;
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

    public function update($datos){
        $query = $this->db->conectar()->prepare('UPDATE pedidos_mesa SET idpedido=:idpedido, idmesa=:idmesa, cuenta=:cuenta, nombrecuenta=:nombrecuenta WHERE idregistro=:idregistro');
        $query->execute($datos);
    }

    public function delete($datos){
        $query = $this->db->conectar()->prepare('delete from pedidos_mesa where idregistro=:idregistro');
        $query->execute($datos);
    }
}

?>