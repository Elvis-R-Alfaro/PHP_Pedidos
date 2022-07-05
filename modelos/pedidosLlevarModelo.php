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
            $sql = 'select pedidos_llevar.*, clientes.nombre from pedidos_llevar join clientes 
            on pedidos_llevar.idcliente = clientes.idcliente';
            $query = $this->db->conectar()->query($sql);
            foreach ($query as $row) {
                $pedido_llevar =[
                    'nombre' => $row['nombre'],
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


    public function listarClientes(){
        $lista=[];
        try {
            $sql = 'select * from clientes';
            $query = $this->db->conectar()->query($sql);
            foreach ($query as $row) {
                $clientes =[
                    'nombre' => $row['nombre'],
                    'idcliente' => $row['idcliente'],
                    
                    
                ];
                array_push($lista,$clientes);
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
                $sql = 'select pedidos_llevar.*, clientes.nombre from pedidos_llevar join clientes 
                on pedidos_llevar.idcliente = clientes.idcliente';
            }
            else{
                $sql = 'select pedidos_llevar.*, clientes.nombre from pedidos_llevar inner join clientes 
                on pedidos_llevar.idcliente = clientes.idcliente
                WHERE '.$filtro .' LIKE "%'.$buscar.'%"';
            }
            
            $query = $this->db->conectar()->query($sql);
            foreach ($query as $row) {
                $pedido =[
                    'idregistro' => $row['idregistro'],
                    'idpedido' => $row['idpedido'],
                    'idcliente' => $row['idcliente'],
                    'nombre' => $row['nombre']
                    
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
            $sql = 'select pedidos_llevar.*, clientes.nombre from pedidos_llevar join clientes 
            on pedidos_llevar.idcliente = clientes.idcliente where idregistro = '.$id;
            $query = $this->db->conectar()->query($sql);
            foreach ($query as $row) {
                $pedido_listar =[
                    'nombre' => $row['nombre'],
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