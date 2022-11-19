<?php
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
    include_once $_SERVER["DOCUMENT_ROOT"]."/Prueba/breaking-medicine-Proyecto/backend/conexion.php";
    $bd = new Conexion();
    $bd->Conectar(); 
    if($_SESSION['carrito'] != ""):
?>

      <h5> Datos de compra: </h5>
        
        
            <hr>
            <div class="row">
              <div class="col col-md-auto" style="display: flex; width: 50% !important; flex-direction: column; justify-content: start;">
                <h5> Producto: </h5>
                <?php
                  foreach ($_SESSION["carrito"] as $id => $cantidad){
                    $query = "SELECT * FROM articulos where Cod_Art = ".$id;
                    $consulta = $bd->Consulta($query)->fetch_assoc();
                    echo "<p>".$consulta["nombre"]." x ".$_SESSION['carrito'][$i]['cantidad']."</p>";
                  }
                ?>
                <h5> Total: </h5>
              </div>

              <div class="col d-flex justify-content-center">
                <div class="col-md-auto">
                  <h5 style="text-align: left;"> Precio: </h5>
                  <?php
                    foreach ($_SESSION["carrito"] as $id => $cantidad){
                      $query = "SELECT * FROM articulos where Cod_Art = ".$id;
                      $consulta = $bd->Consulta($query)->fetch_assoc();
                        if ($consulta["descuento"] == 0) {
                        echo "<p style='text-align: left;' id='Dresumen".$id."'>$".$consulta["precio"]*$_SESSION["carrito"][$id]["cantidad"]."</p>";
                        }elseif ($consulta["descuento"] > 0 && $consulta["descuento"] < 100) {
                          echo "<p style='text-align: left;' id='Dresumen".$id."'>$".(($consulta["precio"])-($consulta["precio"]*($consulta["descuento"]/100)))*$_SESSION["carrito"][$id]["cantidad"]."</p>";
                        }
                    }
                  ?>
                  <h5>
                    <div>$<span id="mostrarprecio-div1"></span></div> 
                  </h5>
                </div>
              </div>
            </div>
<?php
    endif;
?>