<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ingreso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
  </head>
  <body>
    <div class="container-fluid bg-white">
      <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand mx-auto h1-titulo-breaking display-3"><h1 class="display-3 h1-titulo-breaking">Breaking Medicine</h1></a>
        </div>
      </nav>
    </div>

    <div class="form-container">
        <div class="login-container">
            <h2>Bienvenido</h2>
            <p class="h3">Ingresar</p>

            <form id="formulario" action="main.php" method="post">
              <p>
                <label for="username">Nombre usuario</label>
                <input class="input"  type="text" name="username" maxlength="13" id="username">
              </p>
              <p>
                <label for="password">Contraseña</label>
                <input class="input" type="password" name="password" id="password">
              </p>
              <div class="opciones">
                <div>
                  recordarme <input type="checkbox" name="recordarme" id="recordarme">
                </div>
                <div>
                    <a href="#">Olvide mi Contraseña</a>
                </div>
              </div>
              <p>
                <button type="button" class="btn btn-login" onclick="peticion('login')">Iniciar session</button>
              </p>
              <div id="output"></div>
            </form>
        </div>
    </div>
<!-- Footeer -->
<?php include "footer.php"; ?>
<!--Java script BOOSTRAP--> <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script>
      function peticion(tipo) {
          document.getElementById("output").innerHTML = "";
          variable = new XMLHttpRequest();
          variable.onload = function() {
              document.getElementById("output").innerHTML = this.responseText;
              if(this.responseText == "Logeado correctamente") window.location.href = "http://localhost";
              
          }
          variable.open("POST", "../backend/login.php");
          variable.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          var get = document.getElementById.bind(document);
          cadena = "tipo="+tipo+"&nombre="+get("username").value+"&password="+get("password").value;
          variable.send(cadena);
      }
    </script>
    
  </body>
</html>