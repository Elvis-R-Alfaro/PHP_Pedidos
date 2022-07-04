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
            $sql='select pedidos_elaborados.*,usuarios.LoginUsuario from pedidos_elaborados join usuarios on pedidos_elaborados.idusuario=usuarios.idregistro';
            $query = $this->db->conectar()->query($sql);
            foreach($query as $row){
                $pedidoelaborado=[//esto es un array 18-22
                    'iddetallepedido'=>$row['iddetallepedido'],
                    'idusuario'=>$row['idusuario'],
                    'fechahora'=>$row['fechahora'],//array que esta dentro de una variable
                    'loginusuario'=>$row['LoginUsuario']//array que esta dentro de una variable
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
            $sql='select pedidos_elaborados.*,usuarios.LoginUsuario from pedidos_elaborados JOIN usuarios ON usuarios.idregistro = pedidos_elaborados.idusuario where iddetallepedido ='. $id;
            $query = $this->db->conectar()->query($sql);
            foreach($query as $row){
                $pedidoelaborado=[//esto es un array 18-22
                    'iddetallepedido'=>$row['iddetallepedido'],
                    'idusuario'=>$row['idusuario'],
                    'fechahora'=>$row['fechahora'],//array que esta dentro de una variable
                    'loginusuario'=>$row['LoginUsuario']//array que esta dentro de una variable
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

     public function eliminar($id){
        try {
            $query = $this->db->conectar()->query('delete from pedidos_elaborados where iddetallepedido='.$id);
            $query->execute();
            return $query;
        } catch (Throwable $th) {
            return $th;
        }
        
     }

     public function listarusuarios(){
        $lista=[];
        try{
            $sql='select idregistro, LoginUsuario from usuarios';
            $query = $this->db->conectar()->query($sql);
            foreach($query as $row){
                $pedidoelaborado=[//esto es un array 18-22
                    'idregistro'=>$row['idregistro'],
                    'loginusuario'=>$row['LoginUsuario']//array que esta dentro de una variable
                ];
                array_push($lista, $pedidoelaborado);//lista = array de array o array de 2 dimensiones
            }
            return $lista;
        }catch (\Throwable $th){
            return $th;
        }
    }
}

?>