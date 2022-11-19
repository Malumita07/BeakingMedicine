<?php
    if(session_status() == PHP_SESSION_NONE) session_start();

    include_once $_SERVER["DOCUMENT_ROOT"]."/Prueba/breaking-medicine-Proyecto/backend/conexion.php";
    $bd = new Conexion();
    $bd->Conectar();
    if(isset($_GET["id"])) $id = $_GET["id"];
    else $id = 1;

    $query = "SELECT * FROM articulos WHERE Cod_Art = ".$id." AND estado = 1";
    $consulta = $bd->Consulta($query);
    if ($consulta->num_rows < 1) {
        include "navbar.php";
        echo "No se encontro el articulo";
    }
    else {
        $articulo = $consulta->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Articulo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="main.css">
    
        <style>
            @media (min-width: 768px) {
                .lol {
                    flex: 0 0 auto;
                    width: 83.33333333%;
                }
            }
        </style>
    </head>
  <?php include "navbar.php"; ?>
  <body style="background-color: #d2c9ff;">

  <div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="images p-3">
                            <div class="text-center p-4"> <img src="<?php echo "imgArt/".$articulo["imagen"] ?>" class="w-100 d-flex flex-column" /> </div>
                            
                            <!-- <div class="thumbnail text-center"> <h6><b>Stock:</b> aca el stock</h6> </div> -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center"> <i class="fa fa-long-arrow-left"></i>  <h6 class="mb-0"><a href="main.php" class="text-body"><i
                                    class="fas fa-long-arrow-alt-left me-2"></i>Volver</a></h6> </div> <i class="fa fa-shopping-cart text-muted"></i>
                                <hr>
                            </div>
                            <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand">Producto</span>
                                <h4 class="text-uppercase"><?php echo $articulo["nombre"] ?></h4>
                                <?php
                                    if($articulo["descuento"] == 0) $precio = "<b>$".$articulo["precio"]."</b>";
                                    else $precio = "<b>$".($articulo["precio"]*((100-$articulo["descuento"])/100))."</b><div style=\"text-decoration:line-through; color: #999999;margin-left:10px\">$".$articulo["precio"]."</div>";  
                                ?>
                                <div class="price d-flex flex-row align-items-center"> <span class="act-price"><div style="display: flex; flex-direction: row;"><?php echo $precio; ?></div></span>
                                    
                                </div>
                            </div>
                            <hr>
                            <p class="about"><?php echo $articulo["descripcion"] ?></p>
                           <hr>
                            <div class="cart mt-4 align-items-center">  <button type="button" class="btn boton-agregar-al-carrito w-100" onclick="AñadirCarrito(<?php echo $articulo['Cod_Art']?>)">Añadir al carrito</button> <i class="fa fa-heart text-muted"></i> <i class="fa fa-share-alt text-muted"></i> </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    }
    include "footer.php";
?>
    <script>
        function AñadirCarrito(id) {
            variable = new XMLHttpRequest();
            variable.onload = function() {
                console.log(this.responseText);
                dropCarrito();
            }
            variable.open("POST", "../backend/carrito/mini_carrito.php");
            variable.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            variable.send("id="+id);
        }
        function dropCarrito() {
            variable = new XMLHttpRequest();
            variable.onload = function() {
                document.getElementById("carrito-navbar").innerHTML = this.responseText;
                document.getElementById("h5Total").innerHTML = document.getElementById("oculto").innerHTML;
            }
            variable.open("POST", "../backend/carrito/dropCarrito.php");
            variable.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            variable.send();
  }
    </script>
</body>
</html>