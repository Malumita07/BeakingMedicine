<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["carrito"])) $_SESSION["carrito"] = []; ?>
<!doctype html>
<html lang="es" id="html">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Breaking Medicine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <style>
        .demo-container {
            width: 100%;
            max-width: 100%;
            margin: auto;
        }

        .input-tarjeta {
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

<body id="body">
    <?php include "navbar.php"; ?>
    <main>
        <div class="carrito-caja-principal">
            <div class="carrito-caja-hija">
                <section class="h-100 h-custom" style="background-color: #d2c9ff;">
                    <div class="container py-5 h-100">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col-12">
                                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                                    <div class="card-body p-0">
                                        <div class="row g-0">
                                            <div class="col-lg-8">
                                                <div class="p-5" id="div-articulo">

                                                    <div class="d-flex justify-content-between align-items-center mb-5">
                                                        <h1 class="fw-bold mb-0 text-black">Breaking Medicine</h1>
                                                        <h6 class="mb-0 text-muted" id="count-carrito"><?php echo count($_SESSION["carrito"]); ?></h6>
                                                    </div>
                                                    <hr class="my-4">
                                                    <div id="contenido-carrito">
                                                        <?php include '../backend/carrito/carrito.php'; ?>
                                                    </div>
                                                    <hr class="my-4">
                                                    <div class="pt-3">
                                                        <h6 class="mb-0">
                                                            <a href="main.php" class="text-body">
                                                                <i class="fas fa-long-arrow-alt-left me-2">Volver</i>
                                                            </a>
                                                        </h6>
                                                    </div>

                                                </div>
                                                <div class="p-5" id="div-metodo">
                                                    <?php include "metodopago.php" ?>

                                                </div>
                                            </div>
                                            <div class="col-lg-4 bg-grey">
                                                <div class="p-5">
                                                    <h3 class="fw-bold mb-5 mt-2 pt-1">Resumen</h3>
                                                    <hr class="my-4">

                                                    <div id="resumen-carrito">
                                                        <?php include_once '../backend/carrito/resumenCar.php'; ?>

                                                    </div>





                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <?php include "footer.php"; ?>
    <script src="http://localhost/dist/card.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function spanCantidad(param, id) {
            span = document.querySelector('span[id=form' + id + ']');
            span1 = document.querySelector('span[id=formRes' + id + ']');
            if (param == "menos") {
                if (span.innerHTML > 1) {
                    span.innerHTML = parseInt(span.innerHTML) - 1
                    span1.innerHTML = parseInt(span1.innerHTML) - 1
                }
            } else if (param == "mas") {
                if (span.innerHTML < 20) {
                    span.innerHTML = parseInt(span.innerHTML) + 1
                    span1.innerHTML = parseInt(span1.innerHTML) + 1
                }
            }
            variable = new XMLHttpRequest();
            variable.onload = function() {
                console.log(this.responseText);
                ActualizarPrecio(id);
            }
            variable.open("POST", "../backend/carrito/mini_carrito.php");
            variable.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            variable.send("id=" + id + "&cantidad=" + document.getElementById("form" + id).innerHTML);
        }

        function ActualizarPrecio(id) {
            variable = new XMLHttpRequest();
            variable.onload = function() {
                var tot = JSON.parse(this.responseText);
                document.getElementById("resumen" + id).innerHTML = tot["precio"];
                document.getElementById("Dresumen" + id).innerHTML = tot["precio"];
                document.getElementById("h5Total").innerHTML = tot["total"];
                document.getElementById("carritoTotal").innerHTML = tot["total"];
                document.getElementById("mostrarprecio-div1").innerHTML = tot["total"];

            }
            variable.open("POST", "../backend/carrito/actualizar_precio.php");
            variable.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            variable.send("id=" + id);
        }

        function BorrarCarrito(id) {
            variable = new XMLHttpRequest();
            variable.onload = function() {
                ActualizarCarrito();
                ActualizarResumenCarrito();
                ActualizarDropCarrito();
                document.getElementById("count-carrito").innerHTML = this.responseText;
            }
            variable.open("POST", "../backend/carrito/borrar_articulo.php");
            variable.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            variable.send("id=" + id);
        }

        function ActualizarCarrito() {
            variable = new XMLHttpRequest();
            variable.onload = function() {
                document.getElementById("contenido-carrito").innerHTML = this.responseText;

            }
            variable.open("POST", "../backend/carrito/carrito.php");
            variable.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            variable.send();
        }

        function ActualizarResumenCarrito() {
            variable = new XMLHttpRequest();
            variable.onload = function() {
                document.getElementById("resumen-carrito").innerHTML = this.responseText;

            }
            variable.open("POST", "../backend/carrito/resumenCar.php");
            variable.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            variable.send();
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
        document.getElementById("div-metodo").style.display = "none";

        function finalizarCompra() {
            document.getElementById("div-articulo").style.display = "none";
            document.getElementById("div-metodo").style.display = "flex";
        }

        function volverCompra() {
            document.getElementById("div-articulo").style.display = "block";
            document.getElementById("div-metodo").style.display = "none";
        }

        function noSeVaya(e) {
            e.preventDefault();
        }

        document.getElementById("mostrarprecio-div1").innerHTML = <?php echo $total ?>;
    </script>
</body>

</html>