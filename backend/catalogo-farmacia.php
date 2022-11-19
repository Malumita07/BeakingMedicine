<?php
    include_once "conexion.php";
    session_start();
    $bd = new Conexion();
    $bd->Conectar();

    if($_GET["cat"] == -1) {
        $query = "SELECT Nombre FROM categoria";
        $consulta = $bd->Consulta($query);
        $listaCategorias = array();
        while ($categoria = $consulta->fetch_assoc()) {
            array_push($listaCategorias, $categoria);
        }
        echo json_encode($listaCategorias, JSON_UNESCAPED_UNICODE);
    }else if($_GET["subcat"] == -1) {
        $query = "SELECT subcategoria.Nombre FROM subcategoria JOIN categoria ON categoria.Id_Cat=subcategoria.id_Cat WHERE categoria.Nombre = '".$_GET["cat"]."'";
        $consulta = $bd->Consulta($query);
        $listaSubCategorias = array();
        while ($subcategoria = $consulta->fetch_assoc()) {
            array_push($listaSubCategorias, $subcategoria);
        }
        echo json_encode($listaSubCategorias, JSON_UNESCAPED_UNICODE);
    }else if($_GET["minicat"] == -1) {
        $query = "SELECT minicategoria.nombre as Nombre FROM minicategoria JOIN subcategoria ON subcategoria.id_Cat=minicategoria.Id_SubCat WHERE subcategoria.Nombre = '".$_GET["subcat"]."'";
        $consulta = $bd->Consulta($query);
        $listaMiniCategorias = array();
        while ($minicategoria = $consulta->fetch_assoc()) {
            array_push($listaMiniCategorias, $minicategoria);
        }
        echo json_encode($listaMiniCategorias, JSON_UNESCAPED_UNICODE);
    }
?>