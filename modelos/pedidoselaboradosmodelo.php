<?php

class pedidoselaboradosModelo extends Modelo{
    function __construct(){
        parent::__construct();
        
    }
    public function insert($datos){
       $query = $this->db->conectar()->prepare('insert into pedidos_elaborados (iddetallepedido, idusuario, fechahora) value(:iddetallepedido, :idusuario, :fechahora)');
       $query->execute($datos);
    }
    public function listar(){
        $lista=[];
        try{
            $sql='select iddetallepedido, idusuario, fechahora from pedidos_elaborados';
            $query = $this->db->conectar()->query($sql);
            foreach($query as $row){
                $pedidoelaborado=[//esto es un array 18-22
                    'iddetallepedido'=>$row['iddetallepedido'],
                    'idusuario'=>$row['idusuario'],
                    'fechahora'=>$row['fechahora']//array que esta dentro de una variable
                ];
                array_push($lista, $pedidoelaborado);//lista = array de array o array de 2 dimensiones
            }
            return $lista;
        }catch (\Throwable $th){
            return $th;
        }
    }

    public function buscarID($id){
        $lista=[];
        try{
            $sql='select iddetallepedido, idusuario, fechahora from pedidos_elaborados where iddetallepedido =  '. $id;
            $query = $this->db->conectar()->query($sql);
            foreach($query as $row){
                $pedidoelaborado=[//esto es un array 18-22
                    'iddetallepedido'=>$row['iddetallepedido'],
                    'idusuario'=>$row['idusuario'],
                    'fechahora'=>$row['fechahora']//array que esta dentro de una variable
                ]; 
                array_push($lista, $pedidoelaborado);//lista = array de array o array de 2 dimensiones
                
            }
            return $lista;
        }catch (\Throwable $th){
            return $th;
        }
    }
    
    public function actualizar($datos){
        $query = $this->db->conectar()->prepare(' update pedidos_elaborados set idusuario=:idusuario, fechahora=:fechahora where iddetallepedido=:iddetallepedido ');
        $query->execute($datos);
     }

     public function eliminar($datos){
        $query = $this->db->conectar()->prepare(' delete from pedidos_elaborados where iddetallepedido=:id ');
        $query->execute($datos);
     }

}

?>