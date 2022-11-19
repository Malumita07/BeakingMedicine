<?php
    include_once $_SERVER["DOCUMENT_ROOT"]."/Prueba/breaking-medicine-Proyecto/backend/conexion.php";
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
</head>
<body>



  <?php 
    if(!empty($_REQUEST["nume"])){ $_REQUEST["nume"] = $_REQUEST["nume"];}else{ $_REQUEST["nume"] = '1';}
    if($_REQUEST["nume"] == ""){$_REQUEST["nume"] == "1";}



  $bd = new Conexion();
  $bd->Conectar();
  $articulos = "SELECT COUNT('Cod_Art') FROM articulos";
  $num_registros = $bd->Consulta($articulos)->fetch_assoc();
  
    $registros = '2';
    $pagina=$_REQUEST["nume"];
    
    if(is_numeric($pagina))
    $inicio= (($pagina-1)*$registros);
    else
    $inicio=0;
    $busqueda= "SELECT COUNT('Cod_Art') FROM articulos LIMIT $inicio, $registros";
    $paginas=ceil($num_registros["COUNT('Cod_Art')"]/$registros);
  ?>


      <h3>cantidad articulos: (<?php echo $num_registros["COUNT('Cod_Art')"]?>)</h3>

      <?php
    whie ($resultado = $bd->Consulta($busqueda)->fetch_assoc()) {?>
    <?php include "../backend/catalogo.php";?>
    <?php } ?>

    <?php
    if($_REQUEST["nume"] == "1"){ $_REQUEST["nume"] == "0";
    echo "";
    }else{
        if($pagina>1)
        $ant = $_REQUEST["nume"] - 1;
        echo "<a class='page-link' arial-label='Previus' href='main.php?=nume1'><span aria-hidden='true'>&laquo;</span>Previous</a>";
        echo "<li class='page-item'> <a class='page-link' href='main.php?nume=" . ($pagina-1) . "'>.$ant.</a></li>"; }
        echo "<li class='page-item active'><a class='page-link' >".$_REQUEST["nume"]. "</a></li>";

        $sigui = $_REQUEST["nume"] + 1;
        $ultima = $num_registros["COUNT('Cod_Art')"]/$registros;
        if($ultima == $_REQUEST["nume"] +1){
            $ultima == "";
        }
        if($pagina<$paginas && $paginas>1)
        echo "<li class='page-item'><a class='page-link' href='main.php?nume=". ($pagina+1) . "'>".$sigui."</a></li>";

        if($pagina<$paginas && $paginas>1)
        echo "<li class='page-item'><a class='page-link' arial-label='Next' href='main.php?nume=". ceil($ultima) .">'<span aria-hidden='true'>&raquo; </span> <span> Next</span> </a></li>"

   
    ?>
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>

   


  </ul>
</nav>

</body>