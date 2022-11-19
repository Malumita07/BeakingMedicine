<!-- <!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
      <link rel="stylesheet" href="main.css">
 
    </head>
    <body> -->
        <?php
        include '../conexion.php';
        $bd = new Conexion();
        $bd->Conectar();
        if (isset($_POST["buscar"])) {
            $query = "SELECT * FROM articulos where nombre like '%".$_POST["buscar"]."%'";
        }else {
            $query = "SELECT * FROM articulos";
        }
        if ($consulta = $bd->Consulta($query)){
        ?>
        <div class="tabla-adm-madre scrollbar">
            <table class="tabla-adm">
                <tr class="tr-adm">
                    <td>Codigo</td>
                    <td>Id_p</td>
                    <td>Nombre</td>
                    <td>Descripcion</td>
                    <td>Precio</td>
                    <td>Stock</td>
                    <td>Estado</td>
                </tr>
        <?php while ($articulos = $consulta->fetch_assoc()) {?>
                    <tr>
                        <td><?php echo $articulos["Cod_Art"]; ?></td>
                        <td><?php echo $articulos["Id_p"]; ?></td>
                        <td style="width: 20%"><?php echo $articulos["nombre"]; ?></td>
                        <td style="width: 25%"><?php echo $articulos["descripcion"]; ?></td>
                        <td><?php echo $articulos["precio"]; ?></td>
                        <td><?php echo $articulos["stock"]; ?></td>
                        <td><?php echo $articulos["estado"]; ?></td>
                    </tr>
        <?php }} ?>  
            </table>
        </div>
        <!-- </body>
</html> -->