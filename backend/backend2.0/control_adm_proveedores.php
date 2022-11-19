<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
      <link rel="stylesheet" href="main.css">
 
    </head>
    <body>
        <?php
        include '../conexion.php';
        $bd = new Conexion();
        $bd->Conectar();
        if (isset($_POST["buscar"])) {
            $query = "SELECT * FROM proveedor where nombre_p like '%".$_POST["buscar"]."%'";
        }else {
            $query = "SELECT * FROM proveedor";
        }
        
        if ($consulta = $bd->Consulta($query)){
        ?>
        <div class="tabla-adm-madre scrollbar">
            <table class="tabla-adm">
                <tr class="tr-adm">
                    <td>Id_p</td>
                    <td>Nombre</td>
                    <td>Telefono</td>
                    <td>Calle</td>
                    <td>Numero</td>
                    <td>Esquina</td>
                </tr>
        <?php while ($proveedor = $consulta->fetch_assoc()) {?>
                    <tr>
                        <td><?php echo $proveedor["Id_p"]; ?></td>
                        <td><?php echo $proveedor["nombre_p"]; ?></td>
                        <td><?php echo $proveedor["telefono_p"]; ?></td>
                        <td><?php echo $proveedor["calle_p"]; ?></td>
                        <td><?php echo $proveedor["numero_p"]; ?></td>
                        <td><?php echo $proveedor["esquina_p"]; ?></td>
                    </tr>
        <?php }} ?>  
            </table>
        </div> 
        </body>
</html>