<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Breaking Medicine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
  </head>
  <body>
<?php include "navbar.php"; ?>
<?php include "carousel.php"; ?>

      <!--Main PRINCIPAL-->
    <main>
      <div class="album py-5 bg-light">
        <div class="container" id="contenedor-catalogo">
    
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

            <!-- <div class="col">
              <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                <a href=""><img class="bd-placeholder-img card-img-top" width="100%" height="325" src="imgArt/Alfajor.png" alt=""></a>
                <div class="card-body">
                  <p class="titulo-producto"><b>Alfajor</b></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <p class="precio-producto">$30</p>
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">Añadir al carrito</button>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            
            <?php include "../backend/catalogo.php"; ?>
          </div>
        </div>
      </div>
      

    </main>
    <!-- Footer -->
    <?php include "footer.php"; ?>
  </body>
  
</html>
