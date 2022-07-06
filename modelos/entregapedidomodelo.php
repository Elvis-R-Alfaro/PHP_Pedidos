<?php

class entregapedidomodelo extends Modelo{
    function __construct(){
        parent::__construct();
        
    }
    public function insert($datos){
       $query = $this->db->conectar()->prepare('insert into entrega_pedido (iddetalle_pedido, usuario, fechahora, identrega) value(:iddetalle_pedido, :usuario, :fechahora, :identrega)');
       $query->execute($datos);
    }
    public function listar(){
        $lista=[];
        try{
            $sql='select entrega_pedido.*,usuarios.LoginUsuario from entrega_pedido join usuarios on entrega_pedido.usuario=usuarios.idregistro';
            $query = $this->db->conectar()->query($sql);
            foreach($query as $row){
                $entregapedido=[//esto es un array 18-22
                    'iddetalle_pedido'=>$row['iddetalle_pedido'],
                    'usuario'=>$row['usuario'],
                    'fechahora'=>$row['fechahora'],//array que esta dentro de una variable
                    'identrega'=>$row['identrega'],
                    'loginusuario'=>$row['LoginUsuario']//array que esta dentro de una variable
                ];
                array_push($lista, $entregapedido);//lista = array de array o array de 2 dimensiones
            }
            return $lista;
        }catch (\Throwable $th){
            return $th;
        }
    }

    public function buscarID($id){
        $lista=[];
        try{
            $sql='select entrega_pedido.*,usuarios.LoginUsuario from entrega_pedido JOIN usuarios ON usuarios.idregistro = entrega_pedido.usuario where iddetalle_pedido ='. $id;
            $query = $this->db->conectar()->query($sql);
            foreach($query as $row){
                $entregapedido=[//esto es un array 18-22
                    'iddetalle_pedido'=>$row['iddetalle_pedido'],
                    'usuario'=>$row['usuario'],
                    'fechahora'=>$row['fechahora'],//array que esta dentro de una variable
                    'identrega'=>$row['identrega'],
                    'loginusuario'=>$row['LoginUsuario']//array que esta dentro de una variable
                ]; 
                array_push($lista, $entregapedido);//lista = array de array o array de 2 dimensiones
                
            }
            return $lista;
        }catch (\Throwable $th){
            return $th;
        }
    }
    
    public function actualizar($datos){
        $query = $this->db->conectar()->prepare(' update entrega_pedido set usuario=:usuario, fechahora=:fechahora, identrega=:identrega  where iddetalle_pedido=:iddetalle_pedido ');
        $query->execute($datos);
     }

     public function eliminar($id){
        try {
            $query = $this->db->conectar()->query('delete from entrega_pedido where iddetalle_pedido='.$id);
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
                $entregapedido=[//esto es un array 18-22
                    'idregistro'=>$row['idregistro'],
                    'loginusuario'=>$row['LoginUsuario']//array que esta dentro de una variable
                ];
                array_push($lista, $entregapedido);//lista = array de array o array de 2 dimensiones
            }
            return $lista;
        }catch (\Throwable $th){
            return $th;
        }
    }

    public function listarResultados($filtro,$buscar,$estado){
        $lista=[];
        try {            
            if($buscar == ''){
                $sql = 'select entrega_pedido.*,usuarios.LoginUsuario from entrega_pedido join usuarios on entrega_pedido.usuario=usuarios.idregistro';
            }
            else{
                $sql = 'select entrega_pedido.*,usuarios.LoginUsuario from entrega_pedido inner join usuarios on entrega_pedido.usuario=usuarios.idregistro
                WHERE '.$filtro .' LIKE "%'.$buscar.'%"';
            }
            
            $query = $this->db->conectar()->query($sql);
            foreach ($query as $row) {
                $pedido =[
                    'iddetalle_pedido'=>$row['iddetalle_pedido'],
                    'usuario'=>$row['usuario'],
                    'fechahora'=>$row['fechahora'],//array que esta dentro de una variable
                    'identrega'=>$row['identrega'],
                    'loginusuario'=>$row['LoginUsuario']//array que esta dentro de una variables
                    
                ];
                
                array_push($lista,$pedido);
            }
            return $lista;
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }


}

?>