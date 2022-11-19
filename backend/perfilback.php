<?php
 include_once $_SERVER["DOCUMENT_ROOT"]."/Prueba/breaking-medicine-Proyecto/backend/conexion.php";

$id = $_POST['id'];
$calle = $_POST['calle-p'];
$numero = $_POST['numero-p']; 
$esquina = $_POST['esquina-p'];
if ($id != "" && $calle != "" && $numero != "" && $esquina != "") {

$bd = new Conexion();
$bd->Conectar();
  
$query = 'UPDATE persona SET calle="'.$calle.'", numero='.$numero.', esquina="'.$esquina.'" WHERE id='.$id;
$consulta = $bd->Consulta($query);
echo $query;
if($consulta) {
  echo "a";
}
}

?>