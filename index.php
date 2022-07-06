<?php
require_once 'configuraciones/basedatos.php';
require_once 'configuraciones/modeloBase.php';
require_once 'configuraciones/app.php';
require_once 'configuraciones/controladorBase.php';
require_once 'configuraciones/vistaBase.php';
require_once 'controladores/errores.php';
$app = new App();
$expira = time() + (3600*24*30); //tiempo de expiración de la cookie en 30 días
setcookie("id", "", $expira); //elimina la cookie

?>