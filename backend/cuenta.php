<?php
    session_start();
    include 'conexion.php';
    $bd = new Conexion();
    $bd->Conectar();
    if(isset($_SESSION['id_user'])) {
        $query = "SELECT * FROM persona WHERE Id = '".$_SESSION['id_user']."'";
        $consulta = $bd->Consulta($query)->fetch_assoc();
        if(isset($_SESSION["admin"])) echo '{"nombre" : "'.$consulta['nombre'].'", "id" : "'.$_SESSION['id_user'].'", "nivel" : "'.$_SESSION['admin'].'"}';
        else echo '{"nombre" : "'.$consulta['nombre'].'", "id" : "'.$_SESSION['id_user'].'", "nivel" : "0"}';
    }
    else echo '{"nombre" : "", "id" : "-1", "nivel" : "0"}';
?>