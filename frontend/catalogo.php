<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Catalogo.php</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link rel="stylesheet" href="main.css">
</head>

<?php include "navbar.php"; ?>

<body style="background-color: white" class="body-farmacia-catalogo">
<hr style="border-color: white;">
<hr style="border-color: white;">

  <div class="container">

    <div class="row">
      <!-- Responsive -->
      
      

      <!-- Responsive -->

      <div class="col-lg-3 col-md-4">
        <form id="filters" method="get" action="/techno">
          <input type="hidden" name="q" value="">

          <div id="side-filters">

            <div class="filter_wrapper card p-3 mb-3">
              <h3><b>Categorías</b></h3>
              <ul class="list-unstyled ps-0">
                <li class="mb-1">
                  <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">

                  </button>
                  <div class="collapse show" id="home-collapse">
                    <ul id="lista-categorias" class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                      
                    </ul>
                  </div>
                </li>
            </div>


  
            <div id="price-filter" class="filter_wrapper mb-3" data-url="price">
              <h5><b>Precio ($)</b></h5>
              <div class="form-row align-items-center">
                <div class="col-6">
                  <div class="col-6">
                    <label class="mb-0" for="min">Desde</label>
                  </div>
                  <input class="form-control" type="text" name="numeroenvio2" id="precio-minimo" maxlength="5" size="30" onkeyup="es_vacio()" />
                </div>
                <div class="col-6">
                  <div class="col-6">
                    <label class="mb-0" for="max">Hasta</label>
                  </div>
                  <input class="form-control" type="text" name="numeroenvio" id="precio-maximo" maxlength="5" size="30" onkeyup="es_vacio()" />
                </div>
                <div class="col-12 mt-2">
                  <input disabled="true" class="btn btn-primary btn-blocks" type="button" id="btn-rango-precio" name="campovacio" value="Buscar" onclick="RangoPrecio();" />

                </div>
                <script language="javascript" type="text/javascript">
                  function es_vacio() {
                    if (document.getElementById('precio-maximo').value == "" || document.getElementById('precio-minimo').value == "") {
                      document.getElementById('btn-rango-precio').disabled = true;
                      document.getElementById('camporelleno').disabled = true;
                    }else {
                      document.getElementById('btn-rango-precio').disabled = false;
                      document.getElementById('camporelleno').disabled = false;
                    }
                  }
                </script>
              </div>

            </div>





            <div class="d-block d-md-none">

              <div class="form-group row">
                <div class="col-12">
                  <h5>Filtrar por</h5>
                </div>
                <div class="col-sm-12 col-md-8">
                  <div class="field-group select">
                    <select class="form-control">

                      <option selected="selected">
                        Position
                      </option>

                      <option>
                        Nombre: A to Z
                      </option>

                      <option>
                        Nombre: Z to A
                      </option>

                      <option>
                        Precio: Bajo a alto
                      </option>

                      <option>
                        Precio: Alto a bajo
                      </option>

                      <option>
                        Fecha: Recientemente agregado
                      </option>

                    </select>
                  </div>
                </div>
              </div>

            </div>


          </div>
        </form>

      </div>

      <div class="col-lg-9 col-md-8">

        <div class="row justify-content-between mb-4">
          <div class="col-md-5 product-qty d-none d-md-block">
            <strong>Articulos: </strong>
          </div>

          <div class="col-lg-6 col-md-6 d-none d-md-block">
            <div class="form-group row">
              <label class="col-sm-12 col-md-4 col-form-label col-form-label-sm text-md-right">Ordenar por</label>
              <div class="col-sm-12 col-md-8">
                <div class="field-group select">
                  <select class="form-control" onchange="window.location.href = this.value">

                    <option selected="selected">Recientes</option>
                    <option>Menor precio</option>
                    <option>Mayor precio</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row mb-md-5 mb-4 mx-n2">
          <!-- <div class="col-lg-3 col-6 product-block mb-4 px-2"> -->
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php
              include "../backend/catalogo.php";
            ?>
            <div class="col-12">

            </div>
          </div>
        </div>
      </div>


    </div>
  </div>
    
    <script>
        function getCategorias() {
          atras = false;
          variable = new XMLHttpRequest();
            variable.onload = function() {
              document.getElementById("lista-categorias").innerHTML = "";
              categorias = JSON.parse(this.responseText);
              for (let index = 0; index < categorias.length; index++) {
                document.getElementById("lista-categorias").innerHTML += '<li onclick="CambiarCategoria(\''+categorias[index]["Nombre"]+'\')" class="mt-2 caja-productos-cat"><a href="" class="link-dark rounded text-decoration-none productos-cat">'+categorias[index]["Nombre"]+'</a></li>';
                console.log(categorias);
              }
              document.getElementById("lista-categorias").innerHTML += '<li class="linea"></li><li onclick="CambiarCategoria(\'Atras\')" class="mt-2 caja-productos-cat"><a href="" class="link-dark rounded text-decoration-none productos-cat"><b>Atras</b></a></li>'
              atras = true;
            }
            if(atras) document.getElementById("lista-categorias").innerHTML += '<li class="linea"></li><li onclick="CambiarCategoria(\'Atras\')" class="mt-2 caja-productos-cat"><a href="" class="link-dark rounded text-decoration-none productos-cat"><b>Atras</b></a></li>';

            params = new URLSearchParams(window.location.search);

            variable.open("GET", "../backend/catalogo-farmacia.php?cat="+(params.has("cat") ? params.get("cat"): -1)+"&subcat="+(params.has("subcat") ? params.get("subcat"): -1)+"&minicat="+(params.has("minicat") ? params.get("minicat"): -1)+"");
            variable.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            variable.send();
        }
        function CambiarCategoria(categoria) {
          variable = new XMLHttpRequest();
          variable.onload = function() {
            params = new URLSearchParams(window.location.search);
            
            if (categoria == "Atras") {
              if(params.has("minicat")) params.delete("minicat");
              else if(params.has("subcat")) params.delete("subcat");
              else if(params.has("cat")) params.delete("cat");
            }
            else {
              if(params.has("minicat")) ;
              else if(params.has("subcat")) params.append("minicat", categoria);
              else if(params.has("cat")) params.append("subcat", categoria);
              else params.append("cat", categoria);
            }
            

            window.location = "catalogo.php?"+params.toString();
            // if(params.has("minicat")) ;
            // else if(params.has("subcat")) window.location += "&minicat="+categoria;
            // else if(params.has("cat")) window.location += "&subcat="+categoria;
            // else window.location = "catalogo.php?cat="+categoria;
          }
          variable.open("POST", "../backend/carrito/catalogo-farmacia.php");
          variable.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          variable.send();
        }
        function RangoPrecio() {
          max = document.getElementById("precio-maximo").value;
          min = document.getElementById("precio-minimo").value;

          params = new URLSearchParams(window.location.search);
          params.set("min", min);
          params.set("max", max);

          window.location = "catalogo.php?"+params.toString();
        }

        getCategorias();
    </script>

<?php include "footer.php"; ?>
</body>
</html>