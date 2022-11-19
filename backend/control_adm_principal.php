<?php
session_start(); 
include 'conexion.php';
if (isset($_POST['listaProveedores'])) {
    $bd = new Conexion();
    $bd->Conectar();
    $query_p = "SELECT Id_p, nombre_p FROM proveedor";
    $consulta_p = $bd->Consulta($query_p);
    while ($proveedor = $consulta_p->fetch_assoc()) {
        echo '<option value="'.$proveedor['Id_p'].'">'.$proveedor['nombre_p'].'</option>';
    }
}
if (isset($_POST['enviar-insertar']) && $_SESSION["admin"] == 2) {
    $bd = new Conexion();
    $bd->Conectar();
    $Id_PInsert = $_POST['lista-Proveedores'];
    $nombreinsert = $_POST['insertar-nombre'];
    $descripcioninsert = $_POST['insertar-descripcion'];
    $precioinsert = $_POST['insertar-precio'];
    $stockinsert = $_POST['insertar-stock'];
    $estadoinsert = $_POST['insertar-estado'];
    $subcat = $_POST["insertar-subcategoria"];
    if($_POST["insertar-minicategoria"] != "")$minicat = $_POST["insertar-minicategoria"];
    else $minicat = false;
    
    if ($_POST['insertar-nombre'] != '' && $_POST['insertar-descripcion'] != '' && $_FILES['insertar-img'] != null && $_POST['insertar-precio'] != '' && $_POST['insertar-stock'] != '' && $_POST['insertar-estado'] != '' && $subcat != "") {
        $imageninsert = $_FILES["insertar-img"]["name"][0];
        $target_dir = "../frontend/imgArt/";
        $target_file = $target_dir.basename($_FILES["insertar-img"]['name'][0]);
        $uploadOk = imagen('insertar-img');
        $query_insertar = "INSERT INTO articulos VALUES(NULL, ".$Id_PInsert.", '".$nombreinsert."', '".$descripcioninsert."', '".$imageninsert."', ".$precioinsert.", ".$stockinsert.", ".$estadoinsert.")";
        if (!file_exists($target_file)) {
            echo "Insertado con exito<br>";
            moveImg('insertar-img');
            $consulta_insertar = $bd->Consulta($query_insertar);

            $query_Cod = "SELECT Cod_Art FROM articulos where nombre = '".$nombreinsert."' && descripcion = '".$descripcioninsert."'";
            $consulta_Cod = $bd->Consulta($query_Cod);
            $resultado_Cod = $consulta_Cod->fetch_assoc();
            
            if($minicat != false) $query_categorias = "INSERT INTO artcat values(".$subcat.", ".$minicat.", ".$resultado_Cod['Cod_Art'].")";
            else $query_categorias = "INSERT INTO artcat values(".$subcat.", null, ".$resultado_Cod['Cod_Art'].")";
            $consulta_categoria = $bd->Consulta($query_categorias);
            
            if($consulta_categoria) echo "categoria ingresada con exito";
            else "error al insertar categoria";
        } elseif ($uploadOk == 0) {
            unlink($target_file);
            echo "Error al insertar<br>";
            echo "Ingrese nuevamente<br>";

        }
    }else {
        echo "Error al insertar.";
    }

    if (isset($_POST['checkBox']) && $consulta_insertar) {
        $receta = $_POST['receta'];
        $especificaciones = $_POST['especificaciones'];
        $query_Cod = "SELECT Cod_Art FROM articulos where nombre = '".$nombreinsert."' && descripcion = '".$descripcioninsert."'";
        $consulta_Cod = $bd->Consulta($query_Cod);
        $resultado_Cod = $consulta_Cod->fetch_assoc();
        $query_insertar_med = "INSERT INTO medicamentos VALUES(NULL, ".$resultado_Cod['Cod_Art'].", '".$especificaciones."', ".$receta.")";
        $consulta_med = $bd->Consulta($query_insertar_med);
    }
}

if (isset($_POST['enviar-modificar']) && $_SESSION["admin"] == 3) {
    $idmodificar = $_POST['modificar-id'];
    $preciomodificar = $_POST['modificar-precio'];
    $stockmodificar = $_POST['modificar-stock'];

    if ($_POST['modificar-id'] != '' && $_POST['modificar-precio'] != '' && $_POST['modificar-stock'] != '') {
        $query_modificar = "UPDATE articulos SET precio = ".$preciomodificar.", stock = ".$stockmodificar." WHERE Cod_Art = ".$idmodificar." ";
        $consulta_modificar = $bd->Consulta($query_modificar);
        if ($consulta_modificar) {
            echo "Stock y precio modificado con exito";
        } else {
            echo "Error al modificar stock y precio";
        }
    }
}elseif(isset($_POST['enviar-modificar']) && $_SESSION["admin"] == 2) {
    $uploadOk = 1;
    $idmodificar = $_POST['modificar-id'];
    $nombremodificar = $_POST['modificar-nombre'];
    $descripcionmodificar = $_POST['modificar-descripcion'];
    $preciomodificar = $_POST['modificar-precio'];
    $stockmodificar = $_POST['modificar-stock'];
    $estadomodificar = $_POST['modificar-estado'];
    $bd = new Conexion();
    $bd->Conectar();
    if ($_POST['modificar-id'] != '' && $_POST['modificar-nombre'] != '' && $_POST['modificar-descripcion'] != '' && $_FILES['modificar-img'] != null && $_POST['modificar-precio'] != '' && $_POST['modificar-stock'] != '' && $_POST['modificar-estado'] != '') {
        imagen('modificar-img');
        $query_modificar = "UPDATE articulos SET nombre = '".$nombremodificar."', descripcion = '".$descripcionmodificar."', imagen = '".$_FILES['modificar-img']['name'][0]."' , precio = ".$preciomodificar.", stock = ".$stockmodificar.", estado = ".$estadomodificar." WHERE Cod_Art = ".$idmodificar." ";
        $consulta_modificar = $bd->Consulta($query_modificar);
        if ($consulta_modificar) {
            echo "Modificado con exito";
            moveImg('modificar-img');
        } else {
            echo "Error al modificar";
        }
    }elseif ($_POST['modificar-id'] != '' && $_POST['modificar-nombre'] != '' && $_POST['modificar-descripcion'] != '' && $_FILES['modificar-img'] == null && $_POST['modificar-precio'] != '' && $_POST['modificar-stock'] != '' && $_POST['modificar-estado'] != '') {
        $query_modificar = "UPDATE articulos SET nombre = '".$nombremodificar."', descripcion = '".$descripcionmodificar."', precio = ".$preciomodificar.", stock = ".$stockmodificar.", estado = ".$estadomodificar." WHERE Cod_Art = ".$idmodificar." ";
        $consulta_modificar = $bd->Consulta($query_modificar);
        if ($consulta_modificar) {
            echo "Modificado con exito";
        } else {
            echo "Error al modificar";
        }
    }
}

if (isset($_POST['proveedores']) && $_SESSION["admin"] == 1) {
    if (isset($_POST['insertar-proveedores'])) {
        if (isset($_POST['enviar-proveedoresI'])) {
            if ($_POST['proveedores-nombre'] != "" && $_POST['proveedores-telefono'] != "" && $_POST['proveedores-calle'] != "" && $_POST['proveedores-numero'] != "" && $_POST['proveedores-esquina'] != "") {
                $nombre_p = $_POST['proveedores-nombre'];
                $telefono_p = $_POST['proveedores-telefono'];
                $calle_p = $_POST['proveedores-calle'];
                $numero_p = $_POST['proveedores-numero'];
                $esquina_p = $_POST['proveedores-esquina'];

                $bd = new Conexion();
                $bd->Conectar();
                $query_proveedor = "INSERT INTO proveedor VALUES(NULL, '".$nombre_p."', ".$telefono_p.", '".$calle_p."', ".$numero_p.", '".$esquina_p."', 1)";
                $consulta_proveedor = $bd->Consulta($query_proveedor);
                if ($consulta_proveedor) {
                    echo "Insertado con exito";
                } else {
                    echo "Error al insertar";
                    echo $nombre_p." ".$telefono_p." ".$calle_p." ".$numero_p." ".$esquina_p;
                }
            }
        }
    }elseif (isset($_POST['modificar-proveedores'])) {
        if (isset($_POST['enviar-proveedoresM'])) {
            if ($_POST['proveedores-idM'] != "" && $_POST['proveedores-nombreM'] != "" && $_POST['proveedores-telefonoM'] != "" && $_POST['proveedores-calleM'] != "" && $_POST['proveedores-numeroM'] != "" && $_POST['proveedores-esquinaM'] != "" && $_POST['proveedores-estadoM'] != "") {
                $Id_PM = $_POST['proveedores-idM'];
                $nombre_pM = $_POST['proveedores-nombreM'];
                $telefono_pM = $_POST['proveedores-telefonoM'];
                $calle_pM = $_POST['proveedores-calleM'];
                $numero_pM = $_POST['proveedores-numeroM'];
                $esquina_pM = $_POST['proveedores-esquinaM'];
                $estado_pM = $_POST['proveedores-estadoM'];
                $bd = new Conexion();
                $bd->Conectar();
                $query_proveedor_m = "UPDATE proveedor SET nombre_p = '".$nombre_pM."', telefono_p = ".$telefono_pM.", calle_p = '".$calle_pM."', numero_p = ".$numero_pM.", esquina_p = '".$esquina_pM."', estado_p = ".$estado_pM." WHERE Id_p = ".$Id_PM."";
                $consulta_proveedor_m = $bd->Consulta($query_proveedor_m);
                if ($consulta_proveedor_m) {
                    echo "Modificado con exito";
                } else {
                    echo "Error al modificar";
                }
            }
        }
    }
}

if (isset($_POST['enviar-usuarios']) && $_SESSION["admin"] == 2) {
    $bd = new Conexion();
    $bd->Conectar();
    $query_usuario = "UPDATE usuario SET estado = ".$_POST["usuarios-estado"]." Where Id_user = ".$_POST["usuarios-id"]."";
    $consulta = $bd->Consulta($query_usuario);
    if($consulta) {
        if($bd->Affected_rows() == 0) echo "Ningun usuario fue Modificado.";
        else echo "Usuario modificado";
    }
    else echo "Error al modificar el usuario.";
}

function imagen($imagen) {

        $target_dir = "../frontend/imgArt/";
        $target_file = $target_dir.basename($_FILES[$imagen]['name'][0]);
        
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES[$imagen]["tmp_name"][0]);
        if($check !== false) {
          $uploadOk = 1;
        } else {
          echo "File is not an image.<br>";
          $uploadOk = 0;
        }
      
      
      // Check if file already exists
      if (file_exists($target_file)) {
        echo "Sorry, file already exists.<br>";
        $uploadOk = 0;
      }
      
      // Check file size
      if ($_FILES[$imagen]["size"][0] > 500000) {
        echo "Sorry, your file is too large.<br>";
        $uploadOk = 0;
      }
      
      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
        $uploadOk = 0;
      }
      
      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.<br>";
        return $uploadOk;
      // if everything is ok, try to upload file
      } else {
        function moveImg($imagen){
            $target_dir = "../frontend/imgArt/";
            $target_file = $target_dir.basename($_FILES[$imagen]['name'][0]);
        if (move_uploaded_file($_FILES[$imagen]["tmp_name"][0], $target_file)) {
          echo "The file ". htmlspecialchars( basename( $_FILES[$imagen]["name"][0])). " has been uploaded.<br>";
        } else {
          echo "Sorry, there was an error uploading your file.<br>";
        }
        
      }
      return $uploadOk;
    }
    }
?>