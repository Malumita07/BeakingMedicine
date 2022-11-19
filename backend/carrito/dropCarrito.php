<?php 
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
    include_once $_SERVER["DOCUMENT_ROOT"]."/Prueba/breaking-medicine-Proyecto/backend/conexion.php";
    $bd = new Conexion();
    $bd->Conectar();

    if (count($_SESSION["carrito"]) == 0) {

        $_SESSION["carrito"] = [];
        echo "<div style='margin: 5px;'><p style='margin-bottom: 0px;'>No ha agregado articulos al carrito</p></div>";
        $total = count($_SESSION["carrito"]);
    }if (count($_SESSION["carrito"]) > 0):
?>

    <h5 style="margin-bottom: 5px; margin-top: 10px;">Total: $<span id="h5Total"></span></h5>  
        <a href="carrito.php" class=" boton-carrito-mini-a"> <button type="button" class="btn  boton-carrito-mini">Ver y realizar pedido</button> </a>
<?php
        $total = 0;
        $i = 0;
        foreach ($_SESSION["carrito"] as $id => $cantidad):
            $query = "SELECT * FROM articulos where Cod_Art = ".$id;
            $consulta = $bd->Consulta($query)->fetch_assoc();
            $i++;
            if ($i < 4):
?>

                     
                        
                      
            <div class="item-carrito">
                <div class="item-left">
                    <img src="<?php echo "imgArt/".$consulta["imagen"]?>" alt="" class="img-carrito-mini">
                    <div class="item-info">
                        <div style="overflow: hidden;"><?php echo substr($consulta["nombre"], 0, 18); if(strlen($consulta["nombre"]) >= 18) echo "..."?></div>
                        
                    </div>
                    <div style="margin-left: 5px;">        
                        <?php 
                            if ($consulta["descuento"] == 0) {
                                echo "$".$consulta["precio"];
                            }elseif ($consulta["descuento"] > 0 && $consulta["descuento"] < 100) {
                                echo "$".(($consulta["precio"])-($consulta["precio"]*($consulta["descuento"]/100)));
                            }
                        ?>
                    </div>
                    <div class="item-right">
                        <button class="basura-mini-carrito" onclick="BorrarCarrito('<?php echo $id?>')"> <img src="img/basura.svg" alt="" class="basura-mini-carrito">  </button>
                    </div>
                </div>
                
            </div>

<?php   

            endif;
if ($consulta["descuento"] == 0) {
    $total += $consulta["precio"]*$_SESSION["carrito"][$id]["cantidad"];
}elseif ($consulta["descuento"] > 0 && $consulta["descuento"] < 100) {
    $total += (($consulta["precio"])-($consulta["precio"]*($consulta["descuento"]/100)))*$_SESSION["carrito"][$id]["cantidad"];
}
        endforeach;
        if ($i == 4) {
            echo "  <div class='container div-footer-carrito'>
                        <footer>
                            <p class='text-center text-white' style='margin-bottom: 0px;'>Hay ".(count($_SESSION["carrito"])-3)." articulo más en su carrito</p>
                        </footer>
                    </div>";
        }
        elseif ($i > 4) {
            echo "  <div class='container div-footer-carrito'>
                        <footer>
                            <p class='text-center text-white' style='margin-bottom: 0px;'>Hay ".(count($_SESSION["carrito"])-3)." articulos más en su carrito</p>
                        </footer>
                    </div>";
        }
    endif;  
?>
<span style="display: none;" id="oculto"><?php echo $total ?></span>
<script>
    document.getElementById("h5Total").innerHTML = <?php echo $total ?>;
</script>
