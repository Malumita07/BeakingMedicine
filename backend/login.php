<?php
    session_start();
    include 'conexion.php';
    if($_POST["tipo"] == "login") {
        $bd = new Conexion();
        $bd->Conectar();
        $query = "SELECT * FROM persona WHERE nombre = '".$_POST["nombre"]."'";
        $consulta = $bd->Consulta($query);
        $usuario = $consulta->fetch_assoc();

        if($_POST["password"] == "") {
            echo "Ingrese una contraseña";
        }
        else if( $_POST["nombre"] == "") {
            echo "Ingrese un nombre de usuario";
        }
        else {
            if(password_verify($_POST["password"], $usuario["contrasenia"])) {
                echo "Logeado correctamente";
                $_SESSION["id_user"] = $usuario["Id"];

                $query1 = "SELECT * FROM administrador WHERE Id_user = '".$usuario["Id"]."'";
                $consulta1 = $bd->Consulta($query1);
                $admin = $consulta1->fetch_assoc();
            if($consulta1->num_rows > 0) {
                if($admin["nivel"] == 1) {
                    $_SESSION["admin"] = 1;
                }elseif ($admin["nivel"] == 2) {
                    $_SESSION["admin"] = 2;
                }elseif ($admin["nivel"] == 3) {
                    $_SESSION["admin"] = 3;
                }
            }
            $queryAcc = "UPDATE usuario SET acceso = '".date('Y')."-".date('m')."-".date('d')."' WHERE Id_user = '".$usuario["Id"]."'";
            $consultaAcc = $bd->Consulta($queryAcc);
            }
            else {echo "Error al logearse";}
        }
    }
?>