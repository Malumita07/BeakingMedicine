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
      <!--NAV-->
  <div class="container-fluid bg-white">
    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
        <a class="navbar-brand mx-auto h1-titulo-breaking"><h1 class="display-3 h1-titulo-breaking">Breaking Medicine</h1></a>
      </div>
    </nav>
  </div>
  <!--Caja Registro-->
  <div class="form-container">
    <div class="form-container">
      <div class="register-container">
        <h2 class="">Bienvenido</h2>
        <p class="h3">Registrarse</p>

        <form id="formulario" action="login.php" method="post">
          <p>
            <label for="username">Nombre usuario </label>   
            <input class="input"  type="text" name="username" maxlength="13" id="nombre" placeholder=""> 
          </p> 
          <p>
            <label for="correo">Correo electronico</label>
            <input class="input" type="email" name="correo" id="correo">
          </p>
          <p>
            <label for="password">Contraseña</label>
            <input class="input" type="password" name="password" id="password" onkeyup="password_length(event);">
            <div class="bar_container">
              <div id="password-length"></div>
            </div>
          </p>

          <!--Script de la barra de color-->
          <script>
          function password_length(event) {

          const bar = document.getElementById('password-length');

            var length = event.target.value.length;
              bar.className = ""
              if (length < 6) {             
	          bar.classList.add('bad');
                    } 
              if (length < 6) {             
	                bar.classList.add('bad');
                  } else if (length >= 6 && length < 10) {
              	bar.classList.add('good');
              } else if (length >= 10) {
              	bar.classList.add('perfect');
              }
          }
          </script>

          <p>
            <label for="password2">Repetir Contraseña</label>
            <input class="input" type="password" name="password2" id="password2">
          </p>
          <button class="btn btn-register" onclick="peticion('registro')" type="button"> Registrarse </button>
        </form>
        </p>
        <div id="output"></div>
      </div>
    </div>
  </div>
  <!-- FOOOTEEER-->
    <?php include "footer.php"; ?>
    <script>
      function peticion(tipo) {
        document.getElementById("output").innerHTML = "";
        variable = new XMLHttpRequest();
        variable.onload = function() {
          document.getElementById("output").innerHTML = this.responseText;
          if(this.responseText == "Registrado correctamente"){
            document.getElementById("formulario").submit();
          }
        }
        variable.open("POST", "../backend/registro.php");
        variable.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        var get = document.getElementById.bind(document);
        cadena = "tipo="+tipo+"&nombre="+get("nombre").value+"&correo="+get("correo").value+"&password="+get("password").value+"&password2="+get("password2").value;
        variable.send(cadena);
      }
    </script>
    <!--Java script BOOSTRAP--> <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>
