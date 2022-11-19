<?php
    include "conexion.php";
    $bd = new Conexion();
    $bd->Conectar();

    // $query = "SELECT * from";
    // $consulta = $bd->Consulta($query);

    if(isset($_POST["categorias"])) {
        $query = "SELECT * from categoria";
        $consulta = $bd->Consulta($query);
        $resultado = array();
        while ($array = $consulta->fetch_assoc()) {
            echo '<option value="'.$array["Id_Cat"].'">'.$array["Nombre"].'</option>';
        }
    }
    elseif (isset($_POST["subcategorias"])) {
        if($_POST["id_categoria"] != "") $query = "SELECT * from subcategoria where Id_Cat = ".$_POST["id_categoria"];
        else $query = "SELECT * from subcategoria where Id_Cat = 1";
        $consulta = $bd->Consulta($query);
        $resultado = array();
        while ($array = $consulta->fetch_assoc()) {
            echo '<option value="'.$array["Id_SubCat"].'">'.$array["nombre"].'</option>';
        }
    }
    elseif (isset($_POST["minicategorias"])) {
        if($_POST["id_subcategoria"] != "") $query = "SELECT * from minicategoria where Id_SubCat = ".$_POST["id_subcategoria"];
        else $query = "SELECT * from minicategoria where Id_SubCat = 1";
        $consulta = $bd->Consulta($query);
        $resultado = array();
        while ($array = $consulta->fetch_assoc()) {
            echo '<option value="'.$array["Id_MiniCat"].'">'.$array["nombre"].'</option>';
        }
    }
?>

