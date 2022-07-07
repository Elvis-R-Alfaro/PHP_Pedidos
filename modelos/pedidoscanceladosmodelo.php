<?php

class pedidoscanceladosModelo extends Modelo{
    function __construct(){
        parent::__construct();
        
    }
    public function insert($datos){
       $query = $this->db->conectar()->prepare('INSERT INTO pedidos_cancelados (numeropedido, usuario, fechahora) values(:numeropedido, :usuario, :fechahora)');
       $query->execute($datos);
    }

    public function select(){
        $lista = [];
        try {
            $sql = 'SELECT pedidos_cancelados.*,usuarios.LoginUsuario FROM pedidos_cancelados JOIN usuarios ON pedidos_cancelados.usuario = usuarios.idregistro';
            $query = $this->db->conectar()->query($sql);
            foreach($query as $row){
                $pedidocancelado = [
                    'numeropedido'=>$row['numeropedido'],
                    'LoginUsuario'=>$row['LoginUsuario'],
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
            $sql = 'select pedidos_cancelados.*, usuarios.LoginUsuario from pedidos_cancelados join usuarios 
            on pedidos_cancelados.usuario = usuarios.idregistro where pedidos_cancelados.numeropedido = '.$numeropedido;
            $query = $this->db->conectar()->query($sql);
            foreach ($query as $row) {
                $pedidocancelado =[
                    'LoginUsuario' => $row['LoginUsuario'],
                    'numeropedido' => $row['numeropedido'],
                    'fechahora' => $row['fechahora'],
                    'usuario' => $row['usuario']
                    
                ];
                array_push($lista, $pedidocancelado);
            }
            return $lista;
        } catch (\Throwable $th) {
            var_dump($th);
        }
        
    }

    public function listarusuarios(){
        $lista=[];
        try {
            $sql = 'select * from usuarios';
            $query = $this->db->conectar()->query($sql);
            foreach ($query as $row) {
                $usuarios =[
                    'LoginUsuario' => $row['LoginUsuario'],
                    'idregistro' => $row['idregistro']

                ];
                array_push($lista,$usuarios);
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
                $sql = 'select pedidos_cancelados.*, usuarios.LoginUsuario from pedidos_cancelados join usuarios 
                on pedidos_cancelados.usuario = usuarios.idregistro';
            }
            else{
                $sql = 'select pedidos_cancelados.*, usuarios.LoginUsuario from pedidos_cancelados inner join usuarios 
                on pedidos_cancelados.usuario = usuarios.idregistro
                WHERE '.$filtro .' LIKE "%'.$buscar.'%"';
            }
            
            $query = $this->db->conectar()->query($sql);
            foreach ($query as $row) {
                $pedido =[
                    'numeropedido' => $row['numeropedido'],
                    'usuario' => $row['usuario'],
                    'fechahora' => $row['fechahora'],
                    'LoginUsuario' => $row['LoginUsuario']
                    
                ];
                array_push($lista,$pedido);
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

    public function delete($id){
        try {
            $query = $this->db->conectar()->query('delete from pedidos_cancelados where numeropedido='.$id);
            $query->execute();
            return $query;
        } catch (Throwable $th) {
            return $th;
        }
        
     }

}

?>