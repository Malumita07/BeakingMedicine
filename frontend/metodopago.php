<?php 
if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
//     include_once $_SERVER["DOCUMENT_ROOT"]."/Prueba/breaking-medicine-Proyecto/backend/conexion.php";
//     $bd = new Conexion();
//     $bd->Conectar();
//     if (count($_SESSION["carrito"]) == 0) {

//       // $_SESSION["carrito"] = [];
//       echo "<div><p>No ha agregado articulos al carrito</p></div>";

//   }if (count($_SESSION["carrito"]) > 0){
  
//   foreach ($_SESSION["carrito"] as $id => $cantidad) {
//       $query = "SELECT * FROM articulos where Cod_Art = ".$id;
//       $consulta = $bd->Consulta($query)->fetch_assoc();
//   }
// }
    ?>
<!DOCTYPE html>
<html>

<head>
    <title>Card &ndash; the better way to collect credit cards</title>
    <meta name="viewport" content="initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <style>   
  *,
  *::before,
  *::after {
    box-sizing: border-box;
  }
  
  .body {
    font-family: "Montserrat", "Segoe UI", Tahoma, "Geneva", Verdana, sans-serif;
    margin: 0;
    display: grid;
    place-items: center;
    min-height: 100vh;
  }
  /* Global Stylings */
  label {
    display: block;
    margin-bottom: 0.5rem;
  }
  
  .input-tarjeta {
    display: block;
    padding: 0.75rem;
    border: 1px solid #ccc;
    border-radius: 0.25rem;
  }
  
  .width-50 {
    width: 50%;
  }
  
  .ml-auto {
    margin-left: auto;
  }
  
  .text-center {
    text-align: center;
  }
  
  /* Progressbar */
  .progressbar {
    position: relative;
    display: flex;
    justify-content: space-between;
    counter-reset: step;
    margin: 2rem 0 4rem;
  }
  
  .progressbar::before,
  .progress {
    content: "";
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    height: 4px;
    width: 100%;
    background-color: #dcdcdc;
  }
  
  .progress {
    background-color: rgb(34, 96, 158) !important;
    width: 0%;
    transition: 0.4s;
    height: 4px !important;
  }
  
  .progress-step {
    width: 2.1875rem;
    height: 2.1875rem;
    background-color: #dcdcdc;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 0;
  }
  
  .progress-step::before {
    counter-increment: step;
  }
  
  .progress-step::after {
    content: attr(data-title);
    position: absolute;
    top: calc(100% + 0.5rem);
    font-size: 0.85rem;
    color: #666;
  }
  
  .progress-step-active {
    background-color: rgb(34, 96, 158);
    color: #f3f3f3;
  }
  
  /* Form */
  .form {
    /* width: clamp(320px, 30%, 430px); */
    margin: 0 auto;
    border: 1px solid #ccc;
    border-radius: 0.35rem;
    padding: 1.5rem;
  }
  
  .form-step {
    display: none;
    transform-origin: top;
    animation: animate 0.5s;
  }
  
  .form-step-active {
    display: block;
  }
  
  .input-group {
    margin: 2rem 0;
  }
  
  @keyframes animate {
    from {
      transform: scale(1, 0);
      opacity: 0;
    }
    to {
      transform: scale(1, 1);
      opacity: 1;
    }
  }
  
  /* Button */
  .btns-group {
    display: grid;
     grid-template-columns: repeat(2, 1fr);
    gap: 1.5rem; 
  }
  
  .btn1 {
    padding: 0.75rem !important;
    display: block;
    text-decoration: none !important;
    text-align: center !important;
    border-radius: 0.25rem !important;
    cursor: pointer !important;
    transition: 0.3s !important;
  }
  .btn-next{
    background-color: #212529 !important;
        color: #f3f3f3 !important; 
        width: 100% !important;
  }
  .btn-prev{
    background-color: #212529 !important;
    color: #f3f3f3 !important; 
    width: 100% !important;
  }
  .btn-prev1{
    background-color: #212529 !important;
    color: #f3f3f3 !important; 
    width: 100% !important;
  }
  .btn-submit{
    background-color: #212529 !important;
    color: #f3f3f3 !important; 
    width: 100% !important;

  }



.r-compra{
border: 1px solid #ccc;
  overflow: auto; 
  max-width: 400px;   
  max-height: 450px;
  color:#212529;
  text-align:center; 
  font-size:22px; 
  border-radius:10px;
}



.r-compra {
  border: 1px solid #aaa;
  width:100%;
  max-width: 400px;
  background: #f1f2f3;
  overflow:auto;
  box-sizing: border-box;
  padding:0 1rem;
}


.pasos{
  border: 1px solid #aaa;
  border-radius:10px;

}

/* Estilos para motores Webkit y blink (Chrome, Safari, Opera... )*/

.r-compra::-webkit-scrollbar {
  -webkit-appearance: none;
}

.r-compra::-webkit-scrollbar:vertical {
  width:10px;
}

.r-compra::-webkit-scrollbar-button:increment,.r-compra::-webkit-scrollbar-button {
  display: none;
} 

.r-compra::-webkit-scrollbar:horizontal {
  height: 10px;
}

.r-compra::-webkit-scrollbar-thumb {
  background-color: #797979;
  border-radius: 20px;
  border: 2px solid #f1f2f3;
}

.r-compra::-webkit-scrollbar-track {
  border-radius: 10px;  
}




/* Estilos para motores Webkit y blink (Chrome, Safari, Opera... )*/

.body::-webkit-scrollbar {
  -webkit-appearance: none;
}

.body::-webkit-scrollbar:vertical {
  width:10px;
}

.body::-webkit-scrollbar-button:increment,.body::-webkit-scrollbar-button {
  display: none;
} 

.body::-webkit-scrollbar:horizontal {
  height: 10px;
}

.body::-webkit-scrollbar-thumb {
  background-color: #797979;
  border-radius: 20px;
  border: 2px solid #f1f2f3;
}

.map-responsive{
overflow:hidden;
padding-bottom:56.25%;
position:relative;
height:0;

}

.map-responsive iframe{
left:0;
top:0;
height:100%;
width:100%;
position:absolute;

}
.demo-container {
            width: 100%;
            max-width: 100%;
            margin:  auto;
        }

        .input-tarjeta{
        display: inline;
        margin: 2px;
        }
        @media (min-width: 576px) {
          .col-sm-1 {
            width: 100% !important;
          }
        }
        @media (max-width: 480px) {
          .jp-card-lower {
            width: 80% !important;
            left: 10% !important;
          }
        }
        @media (max-width: 393px) {
          .jp-card-number {
            font-size: 20px !important;
          }
          .jp-card-name {
            font-size: 18px !important;
          }
        }
        @media (max-width: 346px) {
          .jp-card-number {
            font-size: 18px !important;
          }
        }
    </style>


  </head>
  <body class="body">
    <!-- <div class="form">
      <h1 class="text-center">Finalizar Compra</h1> -->
      <!-- Progress bar -->
      <!-- <div class="progressbar">
        <div class="progress" id="progress"></div>
        
        <div
          class="progress-step progress-step-active"
          data-title="Envio o Retiro"
        ></div>
        <div class="progress-step" data-title="Metodo de pago"></div>
        <div class="progress-step" data-title="Resumen"></div>
      </div> -->

      <!-- Steps -->
      <!-- <div class="form-step form-step-active">
        <div class="button-group">
          <input type="radio" name="envio-retiro" id="envio"/><label for="envio-retiro">Envio</label>
          <input type="radio" name="envio-retiro" id="retiro"/><label for="envio-retiro">Retiro</label>
        </div>
        <div class="input-group">
          <div class="mt-4 mb-4">
            <h6 class="text-uppercase"><b>DIRECCIÓN DE ENVIO
            </b></h6>
            <div class="row mt-3">
              <div class="col-md-6">
                <div class="inputbox mt-3 mr-2"> <input type="text" name="name" class="form-control" required="required"> <span>Calle</span> </div>
              </div>
              <div class="col-md-6">
                <div class="inputbox mt-3 mr-2"> <input type="text" name="name" class="form-control" required="required"> <span>Ciudad</span> </div>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-md-6">
                <div class="inputbox mt-3 mr-2"> <input type="text" name="name" class="form-control" required="required"> <span>Zona</span> </div>
              </div>
              <div class="col-md-6">
                <div class="inputbox mt-3 mr-2"> <input type="text" name="name" class="form-control" required="required"> <span>Zip</span> </div>
              </div>
            </div>
          </div>
        </div>
        <div class="">
          <a href="#" class="btn btn-next width-50 ml-auto">Siguiente</a>
        </div>
      </div> -->
      <!-- <div class="form-step">
        <div class="demo-container">
          <div class="card-wrapper"></div>

          <div class="form-container active">
            <form action="" method="post">
              <input placeholder="Card number" type="tel" name="number">
              <input placeholder="Full name" type="text" name="name">
              <input placeholder="MM/YY" type="tel" name="expiry">
              <input placeholder="CVC" type="number" name="cvc">
            </form>
          </div>
        </div>
        <div class="btns-group">
          <a href="#" class="btn btn-prev">Anterior</a>
          <a href="#" class="btn btn-next" onclick="metodoDePago()">Siguiente</a>
        </div>
      </div> -->
      <!-- <div class="form-step">
        <div class="input-group">
          <label for="password">Password</label>
          <input type="password" name="password" id="password" />
        </div>
        <div class="input-group">
          <label for="confirmPassword">Confirm Password</label>
          <input
            type="password"
            name="confirmPassword"
            id="confirmPassword"
          />
        </div>
        <div class="btns-group">
          <a href="#" class="btn btn-prev">Anterior</a>
          <button class="btn" >Finalizar Compra</button>
        </div>
      </div> -->
<!-- </div> -->
    

<div class="container ">
  <div class="text-center">
    <h1>
      Resumen de la compra <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
     
      </svg>
    </h1>
  </div>




  <div class="row">
    <div class="col-sm-1 col-md-6">
      <div class="form">

<!-- Progress bar -->
        <div class="progressbar ">
          <div class="progress" id="progress"></div>

          <div class="progress-step progress-step-active" data-title="Envio"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
            <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/></svg>
          </div>
          <div class="progress-step" data-title="Pago"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card-2-back-fill" viewBox="0 0 16 16">
            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5H0V4zm11.5 1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2zM0 11v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1H0z"/></svg>
          </div>
          <div class="progress-step" data-title="Compra"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/></svg>
          </div>
        </div>

<!-- paso Envio -->
        <div class="form-step form-step-active">
          <ul class="nav nav-pills mb-3"  id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active bg-dark" style="margin: 5px;" id="pills-envio-tab" data-bs-toggle="pill" data-bs-target="#pills-envio" 
                type="button" role="tab" aria-controls="pills-envio" aria-selected="true">Envio
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link bg-dark" style="margin: 5px;" id="pills-retiro-tab" data-bs-toggle="pill" data-bs-target="#pills-retiro"
              type="button" role="tab" aria-controls="pills-retiro" aria-selected="true">Retiro
              </button>
            </li>
          </ul>

  <!-- Fin de paso Envio -->
<!-- Envio y Retiro -->
          <div class="tab-content " id="pills-tabContent">
<!-- Envio -->
            <div class="tab-pane fade show active" id="pills-envio" role="tabpanel"
              aria-labelledby="pills-envio-tab" tabindex="0">
              <h5> 1. Dirección de entrega </h5>
              <hr>
              <div class="mt-4 mb-4">
                <form action="" method="post" enctype="multipart/form-data" id="direccion-form">
                  <div class="row mt-3">
                    <div class="col-md-6">
                      <div class="inputbox mt-3 mr-2"> <input type="text" name="calle" id="calle" class="form-control" required="required"> <span>Calle</span> </div>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-md-6">
                      <div class="inputbox mt-3 mr-2"> <input type="text" name="calleAdy" id="calleAdy" class="form-control" required="required"> <span>Calle adyacente</span> </div>
                    </div>
                    <div class="col-md-6">
                      <div class="inputbox mt-3 mr-2"> <input type="text" name="numeroDom" id="numeroDom" class="form-control" required="required"> <span>Número de domicilio</span> </div>
                    </div>
                  </div>
                </form>
              </div>
              <?php
                // if(isset($_SESSION['CLIENTE'])){
                //   echo "<i class='bi bi-house-fill'></i> <input style='padding: 0px; display: inline; width: 50%;'  placeholder='".$_SESSION['CLIENTE'] -> getNombreCalle()."  ".$_SESSION['CLIENTE'] -> getNumeroCasa()."'>";
                // }else{
                //   echo "<i class='bi bi-house-fill'></i> <input style='padding: 0px; display: inline; width: 50%;'  placeholder='Direccion'>";
                // }
              ?>
              <br>
              <br>
              <div class="btns-group">
                <a href="#" id="direccion1" class="btn1 btn-prev1" onclick="volverCompra()">Volver al Carrito</a>
                <a href="#" id="direccion" class="btn1 btn-next width-50 ml-auto" onclick="noSeVaya(event);finalizarCompraV('direccion')">Siguiente</a>
              </div>
            </div>
<!-- Retiro  -->
            <div class="tab-pane fade " id="pills-retiro" role="tabpanel" aria-labelledby="pills-retiro-tab"
              tabindex="0">
              <h5> Horarios: 08:00 - 22:00 Lunes a Sabados </h5>
              <div class="text-center map-responsive">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3331.6384970820086!2d-56.52440176272497!3d-33.380502680794!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95a6ea85f77ca505%3A0x994e96a4d53e7c5b!2sBrig.%20Gral.%20Manuel%20Oribe%2C%2097000%20Durazno%2C%20Departamento%20de%20Durazno!5e0!3m2!1ses-419!2suy!4v1668312502608!5m2!1ses-419!2suy" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
              <br>
              <?php
                // echo " <h5> Persona que retira: </h5> ";
                // if(isset($_SESSION['CLIENTE'])){
                //   echo "<i class='bi bi-person-bounding-box'> </i> <input style='padding: 0px; display: inline; width: 50%;' id='nombreCambiar' placeholder='".$_SESSION['CLIENTE'] -> getNombre()."'>";
                // }else{
                //   echo "<i class='bi bi-person-bounding-box'> </i> <input style='padding: 0px; display: inline; width: 50%;' placeholder='NombrePersona'>";
                // }
              ?>
              <hr>
              <div class="btns-group">
                <a href="#" id="retiro1" class="btn1 btn-prev1" onclick="volverCompra()">Volver al Carrito</a>
                <a href="#" id="retiro" class="btn1 btn-next width-50 ml-auto" onclick="noSeVaya(event);finalizarCompraV('retiro')">Siguiente</a>
              </div>
            </div>
          </div>
<!-- fin Envio y Retiro-->
        </div>

        <div class="form-step">
          <div class="input-group">
            <div class="accordion accordion-flush" id="accordionFlushExample" style="width: 100%;">
              <div class="form-check">
                <input class="form-check-input" type="radio" value="0" name="efectivo-tarjeta" id="flexRadioDefault1" data-bs-target="#efectivo1" aria-expanded="false" aria-controls="efectivo1" data-bs-toggle="collapse" checked>
                <label class="form-check-label" for="flexRadioDefault1">Efectivo
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" value="1" name="efectivo-tarjeta" id="flexRadioDefault2" data-bs-toggle="collapse" data-bs-target="#tarjeta2" aria-expanded="false" aria-controls="tarjeta2" >
                <label class="form-check-label" for="flexRadioDefault2">Tarjeta de credito</label>
              </div>
              <div id="efectivo1" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                  <p> </p>
                  <div class="btns-group" >
            <a href="#" class="btn1 btn-prev" onclick="noSeVaya(event)">Volver</a>
            <a href="#" id="efectivo" class="btn1 btn-next" onclick="noSeVaya(event);finalizarCompraV('efectivo')">Siguiente</a>
          </div>
                </div>
                
          </div>
              <div id="tarjeta2" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body" >
                  <hr>
                  <div class="demo-container">
                    <div class="card-wrapper" ></div>
                    <br>
                    <div class="form-container active">
                      <form action="" method="post" class="formTarjeta" enctype="multipart/form-data" id="tarjeta-form">
                        <input class="input-tarjeta" style="width: 99%;" id="numeroTar" placeholder="Numero de tarjeta" type="tel" name="number" minlength="17" required>
                        <input class="input-tarjeta" style="width: 99%;" id="nombreTar" pattern="[A-Za-z]+"  placeholder="Nombre titular" type="text" required maxlength="20" name="name">
                        <input class="input-tarjeta" style="width: 57%;" id="venciTar" type="month" min='<?php echo date("Y")."-".date("m") ?>' max="<?php echo (date("Y")+6)."-12" ?>" name="expiry" requiredvalue="">
                        <input class="input-tarjeta" style="width: 40%;" id="ccvTar" placeholder="CVC" required type="number" name="cvc">
                      </form>
                    </div>
                  </div>
                </div>
                <div class="btns-group" >
            <a href="#" class="btn1 btn-prev" onclick="noSeVaya(event)">Volver</a>
            <a href="#" id="tarjeta" class="btn1 btn-next" onclick="noSeVaya(event);finalizarCompraV('tarjeta')">Siguiente</a>
          </div>
              </div>
            </div>
          </div>
          
        </div>
        <div class="form-step">
          <div class="text-center" id="datos-compra">
            <?php 
            include "../backend/carrito/datos-compra.php";
            ?> 
          </div>
          <!-- <div style="display:none;" id="sessiongetusuario">
            <?php
              // echo $_SESSION['CLIENTE'] -> getIDPersona();
            ?>
          </div> -->
          <div class="btns-group" >
            <a href="#" class="btn1 btn-prev" onclick="noSeVaya(event)">Volver</a>
            <button class="btn1 btn-submit"  id="finalizarCompra" onclick="finalizarCompraV('Final')" name="confirmarCompra"> Finalizar compra</button>
          </div>
        </div>     
        <br>
        <br>
      </div>
    </div>
    
    <br>
  </div>
</div>
  <script src="http://localhost/dist/card.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
<script>

const prevBtns = document.querySelectorAll(".btn-prev");
const nextBtns = document.querySelectorAll(".btn-next");
const progress = document.getElementById("progress");
const formSteps = document.querySelectorAll(".form-step");
const progressSteps = document.querySelectorAll(".progress-step");
var retiro = 0;
var efectivo = 0;
var tarjeta = 0;
let formStepsNum = 0;

nextBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    var truee = false;
    var calle = document.getElementById("calle").value;
    var calleAdy = document.getElementById("calleAdy").value;
    var numeroDom = document.getElementById("numeroDom").value;
    var numeroTar = document.getElementById("numeroTar").value;
    var nombreTar = document.getElementById("nombreTar").value;
    var venciTar = document.getElementById("venciTar").value;
    var ccvTar = document.getElementById("ccvTar").value;
    
    console.log(btn.id);
    if (btn.id == "direccion") {
      
      if (calle != "" && calleAdy != "" && numeroDom != ""){
        truee = true;
        var calleV = calle;
        var calleAdyV = calleAdy;
        var numeroDomV = numeroDom;
      }
    }else if (btn.id == "retiro"){
      truee = true;
      retiro = 1;
    }else if (btn.id == "efectivo"){
      truee = true;
      efectivo = 1;
    }else if (btn.id == "tarjeta"){
      if (numeroTar != "" && nombreTar != "" && venciTar != "" && ccvTar != "") {
        truee = true;
        var numeroTarV = numeroTar;
        var nombreTarV = nombreTar;
        var venciTarV = venciTar;
        var ccvTarV = ccvTar;
        tarjeta = 1;
      }
      
    }
    if (truee == true) {
      formStepsNum++;
    updateFormSteps();
    updateProgressbar();}
  });
  variable = new XMLHttpRequest();
  

          variable.onload = function() {
            console.log(this.responseText);
            
          }
          variable.open("POST", "../backend/carrito/metodo-pago.php");
          variable.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          if (retiro == 1) {
            var retiroV = "retiro";
            if (efectivo == 1){
              var efectivoV = "efectivo";
              variable.send("retiro="+retiroV+"&efectivo="+efectivoV);
            }
            else if (tarjeta == 1) {
              variable.send("retiro="+retiroV+"&efectivo="+efectivoV+"numeroTar="+numeroTarV+"");
            }
            
          }else{
            variable.send();
          }
          
});

prevBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    formStepsNum--;
    updateFormSteps();
    updateProgressbar();
  });
});

function updateFormSteps() {
  formSteps.forEach((formStep) => {
    formStep.classList.contains("form-step-active") &&
      formStep.classList.remove("form-step-active");
  });

  formSteps[formStepsNum].classList.add("form-step-active");
}

function updateProgressbar() {
  progressSteps.forEach((progressStep, idx) => {
    if (idx < formStepsNum + 1) {
      progressStep.classList.add("progress-step-active");
    } else {
      progressStep.classList.remove("progress-step-active");
    }
  });

  const progressActive = document.querySelectorAll(".progress-step-active");

  progress.style.width =
    ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
}


        var c = new Card({
            form: document.querySelector('.formTarjeta'),
            container: '.card-wrapper',

            formSelectors: {
        numberInput: 'input[name="number"]',
        expiryInput: 'input[name="expiry"]',
        cvcInput: 'input[name="cvc"]',
        nameInput: 'input[name="name"]'
    },
    formatting: true, // optional - default true

    // Strings for translation - optional
    messages: {
        validDate: 'valid\ndate', // optional - default 'valid\nthru'
        monthYear: 'mm/yyyy', // optional - default 'month/year'
    },

    // Default placeholders for rendered fields - optional
    placeholders: {
        number: '•••• •••• •••• ••••',
        name: 'Full Name',
        expiry: '••/••',
        cvc: '•••'
    },

    masks: {
        cardNumber: '•' // optional - mask card number
    },
        });
        // IMPORTANTEEEEEEEEEEEEEEE ---------------------------------------------------------------------------------------------
//document.getElementsByClassName("jp-card-identified")[0].ownerDocument.activeElement.classList[2];
// console.log(document.getElementsByClassName("jp-card-identified"))
// document.getElementById("tarjeta2").style.display = "block";
// document.getElementsByName("number")[0].minlength = document.getElementsByName("number")[0].attributes.selectionEnd;
</script>
</body>
</html>