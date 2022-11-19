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

    foreach ($_SESSION["carrito"] as $id => $cantidad):
        $query = "SELECT * FROM articulos where Cod_Art = ".$id;
        $consulta = $bd->Consulta($query)->fetch_assoc();

?>
<div class="row mb-4 d-flex justify-content-between align-items-center" id="articulo<?php echo $id?>">
    <div class="col-md-2 col-lg-2 col-xl-2 ">
        <img src="<?php echo "imgArt/".$consulta["imagen"]?>" class="img-fluid rounded-3 img-responsive-carrito">
    </div>
    <div class="col-md-3 col-lg-3 col-xl-3">
        <h6 class="text-muted span-carrito"><?php echo $consulta["nombre"]?></h6>
        <!-- <h6 class="text-black mb-0"><?php // echo $consulta["descripcion"]?></h6> -->
    </div>
    <div class="col-md-3 d-flex justify-content-center">
        <button style="text-decoration: none; font-size: 20px; border: none; color:blue" class="btn px-2" onclick="spanCantidad('menos', '<?php echo $id?>')">
            <i class="fas fa-minus">-</i>
        </button>
        <span id="form<?php echo $id?>" min="0" name="quantity" value="1" class="span-carrito"><?php echo $_SESSION["carrito"][$id]["cantidad"]?></span>
        

        <button style="text-decoration: none; font-size: 20px; border: none; color:blue" class="btn px-2" onclick="spanCantidad('mas', '<?php echo $id?>')">
            <i class="fas fa-plus">+</i>
        </button>
    </div>
    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
        <h6 class="mb-0" id="precio<?php echo $id?>">
        <?php if ($consulta["descuento"] == 0) {
        echo "$".$consulta["precio"];
    }elseif ($consulta["descuento"] > 0 && $consulta["descuento"] < 100) {
        echo "$".(($consulta["precio"])-($consulta["precio"]*($consulta["descuento"]/100)));
    }
    ?></h6>
    </div>
    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
        <button onclick="BorrarCarrito('<?php echo $id?>')" class="basura-mini-carrito"> <img src="img/basura.svg" alt="" class="basura-mini-carrito">  </button>
    </div>
</div>
<?php   endforeach;
        endif;
?>