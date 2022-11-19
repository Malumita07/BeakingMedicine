<?php
    session_start();

    unset($_SESSION["carrito"][$_POST["id"]]);
    
    echo count($_SESSION["carrito"]);
?>