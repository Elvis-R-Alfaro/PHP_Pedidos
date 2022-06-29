<?php
class App{
    function __construct(){
        //echo "<h1>Aplicacion WEB Portales II</h1>";
        $url = $_GET['url'];
        if(empty($url)){
            require_once 'controladores/inicio.php';
            $controlador = new inicio;
            $controlador->inicio();
        }  
        else{
            $url = rtrim($url, '/');
            $url = explode('/',$url);
            $nombreApp = 'SIGRES';
            
            $archivoControlador = 'controladores/' . $url[0] . '.php';
            if(file_exists($archivoControlador)){
                require_once $archivoControlador;
                $controlador = new $url[0];
                if(isset($url[1])){
                    try {
                        $controlador->{$url[1]}();          
                    } 
                    catch (\Throwable $th) {
                        //console.error($th);
                        //$controlador = new Errores;
                        var_dump($th);
                    }
                }
                else{
                    $controlador->inicio();
                }
            }
            else{
                var_dump($url);
                //$controlador = new Errores;
                //$controlador->inicio();
                //$controlador->error();
            }
        }
        
    }
}
?>