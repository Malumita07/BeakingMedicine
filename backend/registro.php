<?php
    include 'conexion.php';
    if( $_POST["nombre"] != "" && $_POST["correo"] != "" && $_POST["password"] != "" && $_POST["password2"] != "" && $_POST["password"] == $_POST["password2"]) {
        if (strlen($_POST["nombre"]) > 12 || strlen($_POST["password"]) > 12) {
            exit("ERROR");
        }
        
        $bd = new Conexion();
        $bd->Conectar();
        $query = "SELECT * from Persona where nombre = '".$_POST["nombre"]."' or correo = '".$_POST["correo"]."'";
        $consulta = $bd->Consulta($query);
        $row = $consulta->fetch_assoc();

        if ($consulta->num_rows == 0) {
            $query = "INSERT INTO Persona(nombre, correo, contrasenia) values('".$_POST["nombre"]."', '".$_POST["correo"]."', '".password_hash($_POST["password"], PASSWORD_DEFAULT)."')";
            $consulta = $bd->Consulta($query);
            
            
            if($consulta){
            $query1 = "SELECT Id from Persona where nombre = '".$_POST["nombre"]."'";
            $Consulta1 = $bd->Consulta($query1);
            $query2 = "INSERT INTO Usuario(Id_user, estado) values('".$Consulta1->fetch_assoc()["Id"]."', 1)";
            $consulta2 = $bd->Consulta($query2);
            echo "Registrado correctamente";
            }
            else echo "Error al registrarse";
        }
        else if($row["correo"] == $_POST["correo"]) {
            echo "El correo ya esta registrado";
        }
        else {
            echo "El nombre ya esta ocupado";
        }
    }
    else echo "  ERROR AL REGISTRARSE  ";
    
?>