<?php
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
    include_once $_SERVER["DOCUMENT_ROOT"]."/Prueba/breaking-medicine-Proyecto/backend/conexion.php";
    $bd = new Conexion();
    $bd->Conectar();

?>



<?php 
    if (count($_SESSION["carrito"]) == 0) {

        // $_SESSION["carrito"] = [];
        echo "<div><p>No ha agregado articulos al carrito</p></div>";

    }if (count($_SESSION["carrito"]) > 0):
    
    $total = 0;
    foreach ($_SESSION["carrito"] as $id => $cantidad):
        $query = "SELECT * FROM articulos where Cod_Art = ".$id;
        $consulta = $bd->Consulta($query)->fetch_assoc();
        if ($consulta["descuento"] == 0) {
            $total += $consulta["precio"]*$_SESSION["carrito"][$id]["cantidad"];
        }elseif ($consulta["descuento"] > 0 && $consulta["descuento"] < 100) {
            $total += (($consulta["precio"])-($consulta["precio"]*($consulta["descuento"]/100)))*$_SESSION["carrito"][$id]["cantidad"];
        }
?>
<div class="row mb-3 d-flex justify-content-between align-items-center" id="articuloRes<?php echo $id?>">
    <div class="col d-flex align-items-center col-md-auto">
        <h6 class="text-muted" style="margin-bottom: 0px; width: fit-content;"><?php echo $consulta["nombre"]?> x <span id="formRes<?php echo $id?>"><?php echo $_SESSION["carrito"][$id]["cantidad"]; ?></span></h6>
    </div>
    <div class="col d-flex justify-content-end col-md-auto"  style="text-align: end;">
    <h6 class="mb-0" style="width: fit-content;" id="resumen<?php echo $id?>"><?php if ($consulta["descuento"] == 0) {
            echo "$".$consulta["precio"]*$_SESSION["carrito"][$id]["cantidad"];
            }elseif ($consulta["descuento"] > 0 && $consulta["descuento"] < 100) {
            echo "$".(($consulta["precio"])-($consulta["precio"]*($consulta["descuento"]/100)))*$_SESSION["carrito"][$id]["cantidad"];}?></h6>
    </div>
</div>
<?php   endforeach;

?>
<hr class="my-4">

<div class="d-flex justify-content-between mb-5">
  <h5 class="text-uppercase">Precio total</h5>
  <h5>$<span id="carritoTotal"><?php echo $total; ?></span></h5>
</div>

   <button type="button" class="btn btn-dark btn-block btn-lg"
  data-mdb-ripple-color="dark" onclick="finalizarCompra()">Compra</button>
  <button type="button" class="btn btn-dark btn-block btn-lg" style="display: none;"
  data-mdb-ripple-color="dark" onclick="">Confirmar Compra</button>
<?php
        endif;
?>
