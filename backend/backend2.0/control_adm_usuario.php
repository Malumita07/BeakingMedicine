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
        if (isset($_POST["buscar"]) && $_POST["buscar"] != '') {
            $query = "SELECT *, TIMESTAMPDIFF(DAY, acceso, '".date('Y')."-".date('m')."-".date('d')."') AS dias FROM usuarioComp having dias >= ".$_POST["buscar"].";";
        }else {
            $query = "SELECT * FROM usuarioComp";
        }
        if ($consulta = $bd->Consulta($query)){
        ?>
        <div class="tabla-adm-madre scrollbar">
            <table class="tabla-adm">
                <tr class="tr-adm">
                    <td>Id</td>
                    <td>Nombre</td>
                    <td>Correo</td>
                    <td>Estado</td>
                    <td>Acceso</td>
                </tr>
        <?php while ($usuarios = $consulta->fetch_assoc()) {?>
                    <tr>
                        <td><?php echo $usuarios["Id"]; ?></td>
                        <td><?php echo $usuarios["nombre"]; ?></td>
                        <td><?php echo $usuarios["correo"]; ?></td>
                        <td><?php echo $usuarios["estado"]; ?></td>
                        <td><?php echo $usuarios["acceso"]; ?></td>
                    </tr>
        <?php }} ?>  
            </table>
        </div> 
        </body>
</html>