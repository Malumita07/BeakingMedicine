<?php
    session_start();
    include "../conexion.php";
    $bd = new Conexion();
    $bd->Conectar();
    $total = 0;
    $id = $_POST["id"];
    $query = "SELECT * FROM articulos where Cod_Art = ".$id;
    $consulta = $bd->Consulta($query)->fetch_assoc();
    $query1 = "SELECT * FROM articulos";
    $consulta1 = $bd->Consulta($query1);
    if ($consulta["descuento"] == 0) {
        echo '{"precio":"$'.$consulta["precio"]*$_SESSION["carrito"][$id]["cantidad"].'",';
    }elseif ($consulta["descuento"] > 0 && $consulta["descuento"] < 100) {
        echo '{"precio":"$'.(($consulta["precio"])-($consulta["precio"]*($consulta["descuento"]/100)))*$_SESSION["carrito"][$id]["cantidad"].'",';
    }
    foreach ($_SESSION["carrito"] as $id => $cantidad){
        $query = "SELECT * FROM articulos where Cod_Art = ".$id;
        $consulta = $bd->Consulta($query)->fetch_assoc();
        if ($consulta["descuento"] == 0) {
            $total += $consulta["precio"]*$_SESSION["carrito"][$id]["cantidad"];
        }elseif ($consulta["descuento"] > 0 && $consulta["descuento"] < 100) {
            $total += (($consulta["precio"])-($consulta["precio"]*($consulta["descuento"]/100)))*$_SESSION["carrito"][$id]["cantidad"];
        }
    }
echo '"total":"'.$total.'"}';

?>