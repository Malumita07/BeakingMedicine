<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<link rel="stylesheet" href="main.css">
<!-- <style>
  #after-prueba::after {
    content: '';
    display: block;
    border-top: 1px solid #999999;
    position: absolute;
    top: 50%;
    width: 100%;
  }
</style> -->
<?php
    
    include_once $_SERVER["DOCUMENT_ROOT"]."/Prueba/breaking-medicine-Proyecto/backend/conexion.php";
    $bd = new Conexion();
    $bd->Conectar();
    
    $search = "SELECT * FROM articulos, categoriavis WHERE articulos.Cod_Art = categoriavis.Cod_Art AND estado = 1";
    if(isset($_GET['search'])) {
      $search .= " AND nombre LIKE '%".$_GET['search']."%'";
    }
    if(isset($_GET['cat'])) {
      $search .= " AND Categoria = '".$_GET['cat']."'";
    }
    if(isset($_GET['subcat'])) {
      $search .= " AND Subcategoria = '".$_GET['subcat']."'";
    }
    if(isset($_GET['minicat'])) {
      $search .= " AND Minicategoria = '".$_GET['minicat']."'";
    }
    if(isset($_GET['min']) && is_numeric($_GET['min'])) {
      $search .= " AND precio >= '".$_GET['min']."'";
    }
    if(isset($_GET['max']) && is_numeric($_GET['max'])) {
      $search .= " AND precio <= '".$_GET['max']."'";
    }
    if(isset($_GET['pag']) && is_numeric($_GET['pag'])) {
      $pag = $_GET['pag'];
    }else {
      $pag = 1;
    }

    //echo $search;
    //$query = "SELECT * FROM articulos where estado = 1 and nombre like '%".$_GET['search']."%'";
    $consulta = $bd->Consulta($search);

    if($consulta != false):
      $i = 0;
      $consulta->data_seek(($pag-1)*12);
    while ($producto = $consulta->fetch_assoc()):
      if($i > 11) break;
?>
            <div class="col">
              <div class="card shadow-sm">
                <a href="articulo/<?php echo $producto['Cod_Art'] ?>"><img class="bd-placeholder-img card-img-top img-fluid" width="100%" height="325" src=<?php echo '"imgArt/'.$producto['imagen'].'"'?> alt=""></a>
              <hr>
                <div class="card-body">
                  <p class="titulo-producto text-center h3"><b><?php echo $producto['nombre']?></b></p>
                  
                  <div class="d-flex justify-content-between align-items-center">
                    <?php
                      if($producto["descuento"] == 0) $precio = "<span>".$producto["precio"]."</span>";
                      else $precio = "".($producto["precio"]*((100-$producto["descuento"])/100))."<p style=\"text-decoration:line-through; color: #999999;margin-left:10px\">$".$producto["precio"]."</p>";  
                    ?>
                    <p class="precio-producto h4 ">$<?php echo $precio?></p>
                  </div>
                  
                  <div class="d-grid gap-2">
                  <button type="button" class="btn boton-agregar-al-carrito" onclick="AñadirCarrito(<?php echo $producto['Cod_Art']?>)">Añadir al carrito</button>
                  </div>
                </div>
              </div>
            </div>
<?php
    $i += 1;
    endwhile;
  else: echo "Error al hacer la consulta";
  endif;

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
