<?php
if(session_status() == PHP_SESSION_NONE){
  session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
      <link rel="stylesheet" href="main.css">
      <style>
        .scrollbar::-webkit-scrollbar {
          -webkit-appearance: none !important;
        }

        .scrollbar::-webkit-scrollbar:vertical {
          width:10px !important;
        }

        .scrollbar::-webkit-scrollbar-button:increment,
        
        .scrollbar::-webkit-scrollbar-button {
          display: none !important;
        } 

        .scrollbar::-webkit-scrollbar:horizontal {
          height: 10px !important;
        }

        .scrollbar::-webkit-scrollbar-thumb {
          background-color: #797979 !important;
          border-radius: 20px !important;
          border: 2px solid #f1f2f3 !important;
        }
      </style>
  
  </head>
  <body class="scrollbar" >     
  <!-- style="background-color: rgb(38, 39, 56);" -->
                                
                                  <!--Boton responsive -->
    <nav class="navbar navbar-expand-lg bg-light">
      <div class="d-flex container-fluid">
        <div class="d-flex container-fluid justify-content-center menor-menu">
         <!-- Search responsivo-->
         <div class="container-search-responsivo dropdown">
         <div class="container-search-responsivo">
         <form class="d-flex mx-auto formulario-buscador " role="search">

         <input name="search" type="search" placeholder="Buscar" aria-label="Search">
             <div class="search-responsivo"> <img src="./img/search.svg" alt=""></div>
      </form>
             </div>
             </div>


          <div class="d-flex container-fluid justify-content-center div-a menor-menu">
            <div class="titulo-responsivo container-fluid1 justify-content-center navbar-brand">
              <a class="navbar-brand container-fluid " href="main.php"><img src="./img/bmlogo.svg" class="logo-breaking-medicine" alt=""></a>
            </div>
            </div>

            <div class="d-flex justify-content-start boton-menu menor-menu">
            <button class="btn btn-grey d-lg-none boton-menu-responsivo" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasResponsive" aria-controls="offcanvasResponsive"><span class="navbar-toggler-icon"></span></button>
          </div>


           


         
        </div>
<div class="offcanvas-lg offcanvas-start" tabindex="-1" id="offcanvasResponsive" aria-labelledby="offcanvasResponsiveLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasResponsiveLabel">Menu</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close"></button>
    
  </div>
  <div class="offcanva-main">
 
            <ul class="navbar-nav mx-auto segundo-nav-ul">
          
                  <li class="nav-item dropdown">
                    <div id="cuenta-Responsive" class="cuenta-Responsive">
                    <a class="nav-link dropdown-segundo-nav" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <button class="btn btn-outline-success login-register-color"> <img src="./img/user.svg" alt=""> Mi Cuenta</button>
                    </a>
                    <ul class="dropdown-menu dropdown-segundo-nav-despliegue">
                      <li><a class="dropdown-item" href="login.php">Ingresar</a></li>
                      <li><a class="dropdown-item" href="registro.php">Registrarte</a></li>  
                    </ul>
                    </div>
                  </li>

                  <li class="nav-item">
                  <a href="carrito.php"><button class="btn btn-secondary login-register-color" type="button">
  <img src="./img/shopping-cart.svg" alt=""> Carrito</button></a>
                  </li>
                  
                
                   <li class="">
                   <a class="nav-link dropdown-segundo-nav" href="google.com" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <button class="btn btn-outline-success elementos-menu-responsive">Farmacia</button>
                    </a>
                    </li>
                    <li class="">
                   <a class="nav-link dropdown-segundo-nav" href="google.com" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <button class="btn btn-outline-success elementos-menu-responsive">Cuidasdo Personal</button>
                    </a>
                    </li>
                    <li class="">
                   <a class="nav-link dropdown-segundo-nav" href="google.com" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <button class="btn btn-outline-success elementos-menu-responsive">Perfumeria</button>
                    </a>
                    </li>
                    <li class="">
                   <a class="nav-link dropdown-segundo-nav" href="google.com" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <button class="btn btn-outline-success elementos-menu-responsive">Cosmetica</button>
                    </a>
                    </li>
                    <li class="">
                   <a class="nav-link dropdown-segundo-nav" href="google.com" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <button class="btn btn-outline-success elementos-menu-responsive">Bebes y Maternidad</button>
                    </a>
                    </li>
                    <li class="">
                   <a class="nav-link dropdown-segundo-nav" href="google.com" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <button class="btn btn-outline-success elementos-menu-responsive">Ofertas</button>
                    </a>
                    </li>
                    
              </ul>
              
  </div>
  <div class="offcanvas-footer">
  <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
          
        <p class="text-center text-black">&copy; 2022 Breaking Medicine, Inc</p>
        
        </ul>
</footer>
</div>
</div>


 <!--Titulo Principal-->
 <div class="d-flex justify-content-center">
                  <a class="navbar-brand container-fluid breaking-medicine-titulo" href="main.php"><img src="./img/bmlogo.svg" class="logo-breaking-medicine" alt=""></a>
           </div>      
                 
            <!--Buscador-->
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              
            <form action="catalogo.php" class="d-flex mx-auto formulario-buscador " role="search">
              
              <input name="search" class="form-control me-2 search-width " type="search" placeholder="Buscar" aria-label="Search">
              <button class="btn btn-outline-success fondo-negro input-buscador" type="submit"><img src="./img/search.svg" alt=""></button>
           
            </form>
          </div>
        

            <!--Carrito-->
            
      <div class="p2 bd-highlight">
        <div class="btn-group carrito-principal">
          <button class="btn btn-secondary dropdown-toggle login-register-color dropdown-segundo-nav " type="button" id="dropdownMenuClickableInside" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
          <img src="./img/shopping-cart.svg" alt="">Carrito</button>
            
          <ul class="dropdown-menu dropdown-segundo-nav-despliegue"  style="padding-bottom: 0px;" aria-labelledby="dropdownMenuClickableInside" id="dropdownMenuClickableInside" >
            <div class="carrito-navbar" id="carrito-navbar">
                  
                        <?php include_once "../backend/carrito/dropCarrito.php"; ?>
            </div>
          </ul>
        </div>
      </div> 
                    

          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item dropdown">
                    <div id="cuenta" class="cuenta-fixed">
                    <a class="nav-link dropdown-segundo-nav" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <button class="btn btn-outline-success login-register-color Cuenta-responsive"> <img src="./img/user.svg" alt="">Mi Cuenta</button>
                    </a>
                    <ul class="dropdown-menu dropdown-segundo-nav-despliegue">
                      <li><a class="dropdown-item" href="login.php">Ingresar</a></li>
                      <li><a class="dropdown-item" href="registro.php">Registrarte</a></li>  
                    </ul>
                  </div>
                </li>
                    </ul>
                    
                  

      </div>


      
    </nav>

      <!--SEGUNDO NAV CATEGORIAS-->
      <nav class="navbar navbar-expand-lg bg-dark segundo-nav" id="navbarNavAltMarkup">   
        <div class="container-fluid">
            <ul class="navbar-nav mx-auto texto-letras segundo-nav-ul">
                <li class="nav-item">
                    <a class="nav-link" href="#">Farmacia</a>
                  </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Cuidado Personal</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Perfumeria</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Cosmetica</a>
              </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Bebes y maternidad</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Ofertas (beta)</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle dropdown-segundo-nav" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Novedades
                    </a>
                    <ul class="dropdown-menu dropdown-segundo-nav-despliegue">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </li>
            </ul>
                     <a class="boton-ira-adm" id="change-href" href="#" style="display: none;">
                      <button class="btn btn-outline-success login-register-color"> <img src="./img/tool.svg" alt="">Admin</button>
                    </a>
            
        </div>
      </nav>
        <!--Java script BOOSTRAP--> <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <script>
          function cerrarSesion() {
            variable = new XMLHttpRequest();
            variable.onload = function() {
              window.location.href = "";
            }
            variable.open("GET", "../backend/cerrar_sesion.php");
            variable.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            variable.send();
          }

          function cuenta() {
          //document.getElementById("cuenta").innerHTML = "";
          variable = new XMLHttpRequest();
          variable.onload = function() {
              if(JSON.parse(this.responseText)["id"] > 0) {
                document.getElementById("cuenta").innerHTML =
                '<a class="nav-link dropdown-segundo-nav" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">'+
                '<button class="btn btn-outline-success login-register-color caca"> <img src="./img/user.svg" alt="">'+JSON.parse(this.responseText)["nombre"]+'</button>'+
                '</a>'+
                '<ul class="dropdown-menu dropdown-segundo-nav-despliegue">'+
                '<li><a class="dropdown-item" href="perfil.php">Perfil</a></li>'+
                '<li><p class="dropdown-item" href="" onclick="cerrarSesion()">Cerrar sesion</p></li>'+
                '</ul>';

                document.getElementById("cuenta-Responsive").innerHTML =
                '<a class="nav-link dropdown-segundo-nav" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">'+
                '<button class="btn btn-outline-success login-register-color caca"> <img src="./img/user.svg" alt="">'+JSON.parse(this.responseText)["nombre"]+'</button>'+
                '</a>'+
                '<ul class="dropdown-menu dropdown-segundo-nav-despliegue">'+
                '<li><a class="dropdown-item" href="perfil.php">Perfil</a></li>'+
                '<li><p class="dropdown-item" href="" onclick="cerrarSesion()">Cerrar sesion</p></li>'+
                '</ul>';
              }
              console.log(this.responseText);
              //if(this.responseText == "Logeado correctamente") document.getElementById("formulario").submit();
          }
          variable.open("GET", "../backend/cuenta.php");
          variable.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          var get = document.getElementById.bind(document);
          //cadena = "tipo="+tipo+"&nombre="+get("username").value+"&password="+get("password").value;
          variable.send();
      }
      cuenta();
      function control_adm() {
          //document.getElementById("cuenta").innerHTML = "";
          variable = new XMLHttpRequest();
          variable.onload = function() {
              if(JSON.parse(this.responseText)["nivel"] > 0) {
                document.getElementById('change-href').href = "http://localhost/control_adm.php";
                document.getElementById('change-href').style.display = "block";
              }
              else {
                document.getElementById('change-href').style.display = "none";
              }
              console.log(this.responseText);
          }
          variable.open("GET", "../backend/cuenta.php");
          variable.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          var get = document.getElementById.bind(document);
          //cadena = "tipo="+tipo+"&nombre="+get("username").value+"&password="+get("password").value;
          variable.send();
      }
      control_adm();
      function BorrarCarrito(id) {
        variable = new XMLHttpRequest();
          variable.onload = function() {
              ActualizarDropCarrito();
          }
          variable.open("POST", "../backend/carrito/borrar_articulo.php");
          variable.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          variable.send("id="+id);
      }
      function ActualizarDropCarrito() {
        variable = new XMLHttpRequest();
          variable.onload = function() {
              document.getElementById("carrito-navbar").innerHTML = this.responseText;
              document.getElementById("h5Total").innerHTML = document.getElementById("oculto").innerHTML;
          }
          variable.open("POST", "../backend/carrito/dropCarrito.php");
          variable.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          variable.send();
      }
        </script>
         
  </body>
</html>