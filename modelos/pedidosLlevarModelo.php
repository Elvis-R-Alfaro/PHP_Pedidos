<?php 

    class PedidoLlevarModelo extends Modelo{
        function __construct(){
            parent::__construct();
        }
    
        public function insert($datos){
            $query = $this->db->conectar()->prepare('INSERT INTO pedidos_llevar (idregistro, idpedido, idcliente) VALUES (:idregistro, :idpedido, :idcliente)');
            $query->execute($datos);        
        }

        public function listar(){
            $lista=[];
            try {
                $sql = 'select * from pedidos_llevar';
                $query = $this->db->conectar()->query($sql);
                foreach ($query as $row) {
                    $pedidos_llevar =[
                        'idregistro' => $row['idregistro'],
                        'idpedido' => $row['idpedido'],
                        'idcliente' => $row['idcliente']
                    ];
                    array_push($lista,$pedidos_llevar);
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
                    $pedidos_llevar =[
                        'idregistro' => $row['idregistro'],
                        'idpedido' => $row['idpedido'],
                        'idcliente' => $row['idcliente']
                    ];
                    array_push($lista,$pedidos_llevar);
                }
                return $lista;
            } catch (\Throwable $th) {
                var_dump($th);
            }
        }
    }   

?>