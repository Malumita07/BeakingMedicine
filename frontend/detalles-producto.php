<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Descripcion</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
      <link rel="stylesheet" href="main.css">
 
  
  </head>
  <?php include "navbar.php"; ?>
  <body>

  <div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="images p-3">
                            <div class="text-center p-4"> <img src="https://images7.memedroid.com/images/UPLOADED406/623a788ac2f33.jpeg" class="w-100 d-flex flex-column" /> </div>
                            
                            <div class="thumbnail text-center"> <h6><b>Stock:</b> aca el stock</h6> </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center"> <i class="fa fa-long-arrow-left"></i>  <h6 class="mb-0"><a href="main.php" class="text-body"><i
                                    class="fas fa-long-arrow-alt-left me-2"></i>Volver</a></h6> </div> <i class="fa fa-shopping-cart text-muted"></i>
                           <hr>
                                </div>
                            <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand">Producto</span>
                                <h4 class="text-uppercase">Nombre del producto</h4>
                                <div class="price d-flex flex-row align-items-center"> <span class="act-price"><b>$Cuanto vale</b></span>
                                    
                                </div>
                            </div>
                            <hr>
                            <p class="about"><b>Descripcion aca</b> Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse nisi vel amet repudiandae perferendis quod, quo officia est repellat consequuntur minus error vero eveniet nostrum cum sint! Officiis, animi assumenda?</p>
                           <hr>
                            <div class="cart mt-4 align-items-center">  <button type="button" class="btn boton-agregar-al-carrito w-100" >Añadir al carrito</button> <i class="fa fa-heart text-muted"></i> <i class="fa fa-share-alt text-muted"></i> </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
  </body>