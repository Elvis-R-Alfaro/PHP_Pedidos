<?php 

    class PedidosVentas extends Modelo{
        function __construct(){
            parent::__construct();
        }
    
        public function insert($datos){
            $query = $this->db->conectar()->prepare('INSERT INTO pedidos_x_ventas (NumeroFactura, NumeroPedido) VALUES (:NumeroFactura, :NumeroPedido)');
            $query->execute($datos);        
        }

        public function listar(){
            $lista=[];
            try {
                $sql = 'select * from pedidos_x_ventas';
                $query = $this->db->conectar()->query($sql);
                foreach ($query as $row) {
                    $pedidos_ventas =[
                        'NumeroFactura' => $row['NumeroFactura'],
                        'NumeroPedido' => $row['NumeroPedido']
                    ];
                    array_push($lista,$pedidos_ventas);
                }
                return $lista;
            } catch (\Throwable $th) {
                var_dump($th);
            }
        }
        public function buscarId($id){
            $lista=[];
            try {
                $sql = 'select * from pedidos_x_ventas where NumeroFactura='.$id;
                $query = $this->db->conectar()->query($sql);
                foreach ($query as $row) {
                    $pedidos_ventas =[
                        'NumeroFactura' => $row['NumeroFactura'],
                        'NumeroPedido' => $row['NumeroPedido']
                    ];
                    array_push($lista,$pedidos_ventas);
                }
                return $lista;
            } catch (\Throwable $th) {
                var_dump($th);
            }
        }
    }   

?>