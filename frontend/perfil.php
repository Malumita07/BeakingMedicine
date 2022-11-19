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
    <title>Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
</head>
<body>
<?php include "navbar.php"; ?>
<div class="container-fluid">
          <div class="caja-foto-perfil container-fluid">
    <div class="row">
      <div class="text-center container-fluid">
       
        <h3>Datos</h3>
        
        <div class="row mt-2 caja-form-perfil container-fluid">
          <form action="" method="post" enctype="multipart/form-data" id="perfil-form">
                    <div class="col-md-6"><label class="labels"><b>Calle</b></label><input type="text" class="form-control" placeholder="" value="" name="calle-p" id="calle-p"></div>
                    <div class="col-md-6"><label class="labels"><b>Numero</b></label><input type="text" class="form-control" value="" name="numero-p" placeholder="" id="numero-p"></div>
                    <div class="col-md-12"><label class="labels"><b>Esquina</b></label><input type="text" class="form-control" name="esquina-p" placeholder="" value="" id="esquina-p"></div>      
                   

                  </form>

                  <button class="btn btn-primary profile-button" onclick="perfil(<?php echo $_SESSION['id_user']; ?>)">Enviar</button>
                  </div>

                  
      </div></hr>
     

            </div>
        </div>
      
              <hr>
              </div>                    
              <?php include "footer.php"; ?>

              <script>
                function perfil(id){
                  let formData = new FormData(document.getElementById("perfil-form"));
                  variable = new XMLHttpRequest();
                  variable.onload = function() {
                    console.log(this.responseText);
                  }
                  variable.open("POST", "../backend/perfilback.php");
                  formData.append("id", id);
                  variable.send(formData);
                }
              </script>
</body>