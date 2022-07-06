<?php 

class PedidosModelo extends Modelo{
    function __construct(){
        parent::__construct();
    }

    public function insert($datos){
        try {
            $opciones = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $pdo = new PDO("mysql:host=localhost;dbname=sigresdesarrollo;charset=utf8", "root", "", $opciones);
            
            $query = $pdo->prepare('INSERT INTO pedidos(idmesero, fechahora, Estacion, activo, modalidad, estado) VALUES (:idmesero, :fechahora, :Estacion, :activo, :modalidad, :estado)');
            $query->execute($datos);
            $id = $pdo->lastInsertId();
            
            return $id;
            //code...
        } catch (\Throwable $th) {
            return $th;
        }
        //return last id

        
    }

    public function update($datos){
        $query = $this-> db-> conectar()-> prepare('UPDATE pedidos SET idmesero = :idmesero, fechahora = :fechahora, Estacion = :Estacion, activo = :activo, modalidad = :modalidad, estado = :estado WHERE NumeroPedido = :id');
        $query->execute($datos);
    }

    public function delete($id){
        $sql = 'DELETE FROM pedidos WHERE NumeroPedido = '.$id;
        $query = $this->db->conectar()->query($sql);
        $query->execute();
    }

    public function listar($filtro,$buscar,$estado){
        $lista=[];
        try {            
            if($buscar == ''){
                $sql = 'SELECT pedidos.*,meseros.nombre AS nombremesero,estaciones.nombre AS nombreestacion FROM pedidos 
                JOIN meseros ON pedidos.idmesero = meseros.idmesero 
                JOIN estaciones on pedidos.Estacion = estaciones.NumeroEstacion 
                WHERE pedidos.estado != "AAA"';
            }
            else{
                $sql = 'SELECT pedidos.*,meseros.nombre AS nombremesero, estaciones.nombre AS nombreestacion FROM pedidos
                INNER JOIN meseros ON pedidos.idmesero = meseros.idmesero
                INNER JOIN estaciones ON pedidos.Estacion = estaciones.NumeroEstacion
                WHERE '.$filtro .' LIKE "%'.$buscar.'%" AND pedidos.estado != AAA';
            }
            
            $query = $this->db->conectar()->query($sql);
            foreach ($query as $row) {
                $pedido =[
                    'NumeroPedido' => $row['NumeroPedido'],
                    'idmesero' => $row['idmesero'],
                    'fechahora' => $row['fechahora'],
                    'Estacion' => $row['Estacion'],
                    'activo' => $row['activo'],
                    'modalidad' => $row['modalidad'],
                    'estado' => $row['estado'],
                    'nombremesero' => $row['nombremesero'],
                    'nombreestacion' => $row['nombreestacion'],
                    
                ];
                $estado = $pedido['estado'];
                if($estado[0] == 'S'){
                    $pedido['elaborado'] = 'checked';
                }
                else{
                    $pedido['elaborado'] = '';
                }
                if($estado[1] == 'S'){
                    $pedido['entregado'] = 'checked';
                }
                else{
                    $pedido['entregado'] = '';
                }
                if($estado[2] == 'S'){
                    $pedido['facturado'] = 'checked';
                }
                else{
                    $pedido['facturado'] = '';
                }
                // isset($pedido['activo'])? 'Activo':'Inactivo';
                if($pedido['activo'] == '1'){
                    $pedido['activo'] = 'Pendiente';
                }
                else{
                    $pedido['activo'] = 'Finalizado';
                }
                if($pedido['modalidad'] == 'DO'){
                    $pedido['modalidad'] = 'Domicilio';
                }
                else if($pedido['modalidad'] == 'ME'){
                    $pedido['modalidad'] = 'Mesa';
                }
                else{
                    $pedido['modalidad'] = 'Llevar';
                }
                
                array_push($lista,$pedido);
            }
            return $lista;
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

    public function listarMeseros(){
        $lista=[];
        try {
            $sql = 'SELECT * FROM meseros';
            $query = $this->db->conectar()->query($sql);
            foreach ($query as $row) {
                $mesero =[
                    'idmesero' => $row['idmesero'],
                    'nombre' => $row['nombre']
                ];
                array_push($lista,$mesero);
            }
            return $lista;
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

    public function listarClientes(){
        $lista=[];
        try {
            $sql = 'SELECT * FROM clientes';
            $query = $this->db->conectar()->query($sql);
            foreach ($query as $row) {
                $mesero =[
                    'idcliente' => $row['idcliente'],
                    'nombre' => $row['nombre']
                ];
                array_push($lista,$mesero);
            }
            return $lista;
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }


    public function listarEstaciones(){
        $lista=[];
        try {
            $sql = 'SELECT NumeroEstacion,nombre FROM estaciones';
            $query = $this->db->conectar()->query($sql);
            foreach ($query as $row) {
                $estacion =[
                    'NumeroEstacion' => $row['NumeroEstacion'],
                    'nombre' => $row['nombre']
                ];
                array_push($lista,$estacion);
            }
            return $lista;
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

    public function buscarId($id){
        $lista=[];
        try {
            $sql = 'select * from pedidos where NumeroPedido='.$id;
            $query = $this->db->conectar()->query($sql);
            foreach ($query as $row) {
                $pedido =[
                    'id' => $row['NumeroPedido'],
                    'idmesero' => $row['idmesero'],
                    'fechahora' => $row['fechahora'],
                    'Estacion' => $row['Estacion'],
                    'activo' => $row['activo'],
                    'modalidad' => $row['modalidad'],
                    'estado' => $row['estado']
                ];
                array_push($lista,$pedido);
            }
            return $lista;
        } catch (\Throwable $th) {
            var_dump($th);
        }
    }

}