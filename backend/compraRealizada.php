'".date('Y')."-".date('m')."-".date('d')."'
<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
include_once $_SERVER["DOCUMENT_ROOT"]."/Prueba/breaking-medicine-Proyecto/backend/conexion.php";
$bd = new Conexion();
$bd->Conectar();

if ($aaaa) {
    # code...
}
?>