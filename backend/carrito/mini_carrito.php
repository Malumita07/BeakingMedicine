<?php
    session_start();
    if(!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
    if(!isset($_POST["cantidad"])) {
        $_SESSION["carrito"][$_POST["id"]] = array("cantidad" => 1);
        echo "ejecutado if";
    }
    else {
        $_SESSION["carrito"][$_POST["id"]] = array("cantidad" => $_POST["cantidad"]);
        echo "ejecutado else";
    }
    echo "<br>".$_POST["id"];
?>