<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <style>
         input[type='file'] {
                    display: none;
                }

                .custom-file-upload {
                    border: 1px solid #ccc;
                    display: inline-block;
                    padding: 6px 12px;
                    cursor: pointer;
                }
        form {
            width: 80%;
        }
        form label {
            width: auto !important;
        }
        form div {
            justify-content: space-between !important;
        }
        .caja-botones1 {
            height: 100% !important;
            display: flex !important;
            
        }
        .caja-botones2 {
            margin-right: 0px !important;
            margin-left: 0px !important;
            padding-right: 0px !important;
            padding-left: 0px !important;
            width: 100% !important;
        }
        .btn-adm {
            margin: 0 !important;
            margin-top: 12px !important;
        }
        .caja-botones3 {
            justify-content: space-evenly !important;
            height: 100% !important;
            width: 100% !important;
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
        }
    </style>
</head>
<body>
    <?php include "navbar.php";?>

        <?php 
            if ($_SESSION["admin"] == null) {
                
                die();
            }
        ?>
        <div class="titulo-adm">
            <h1 class="text-white">Administracion</h1>
        </div>
        
        <div class="me-auto mb-2 mb-lg-0 container-fluid bg-white caja-adm-principal scrollbar">
            <div class="caja-botones caja-botones2 container-fluid">
                <div class="caja-botones3">
                <div class="caja-botones1">
                    <button class="btn-adm no-entra"  onclick="visible('insertar')">Insertar</button> 
                </div>
                <div class="caja-botones1">
                    <button class="btn-adm no-entra" name="modificar" id="modificar" onclick="visible('modificar')">Modificar</button> 
                </div>
                <div class="caja-botones1">
                    <button class="btn-adm no-entra" name="proveedores" id="proveedores" onclick="visible('proveedores')">Proveedores</button> 
                </div>
                <div class="caja-botones1">
                    <button class="btn-adm no-entra" name="usuario" id="usuario" onclick="visible('usuarios')">Usuarios</button> 
                </div>
                </div>
            </div>
                <div class="linea"></div>
                <!-- INSERTAR -->
            <div id="div-insertar" class="main-adm container-fluid adm-caja-madre">
                <div class="contenedor-adm">
                <form action="" method="post" enctype="multipart/form-data" id="insertar-form">
                    <div>
                    <label for="lista-Proveedores">Proveedor</label>
                        <select name="lista-Proveedores" id="lista-Proveedores" >
                        </select>
                    </div>
                    <hr>
                    <div>
                        <label for="insertar-nombre">Nombre</label>
                        <input type="text" id="insertar-nombre" name="insertar-nombre">
                    </div>
                    <hr>
                    <div>
                        <label for="insertar-descripcion" class="descripcion-adm">Descripción</label>
                        <input type="text" id="insertar-descripcion" name="insertar-descripcion">
                    </div>
                    <hr>
                    <div class="img-adm d-flex justify-content-center" style="left: auto;">
                        <label for="insertar-img" class="custom-file-upload" style="width: 100% !important;">
                        <input type="file"  id="insertar-img"  name="modificar-img">
                        Seleccionar Imagen
                        </label>
                    </div>
                    <hr>
                    <div>
                        <label for="insertar-precio">Precio</label>
                        <input type="text" id="insertar-precio" name="insertar-precio">
                    </div>
                    <hr>
                    <div>
                        <label for="insertar-stock">Stock</label>
                        <input type="text" id="insertar-stock" name="insertar-stock">
                    </div>
                    <hr>
                    <div>
                        <label for="">Categoria</label>
                        <div style="display: flex; flex-direction:column">
                            <select name="insertar-categoria" id="insertar-categoria">
                            </select>
                            <select name="insertar-subcategoria" id="insertar-subcategoria">
                            </select>
                            <select name="insertar-minicategoria" id="insertar-minicategoria">
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="insertar-estado">Estado</label>
                        <select name="insertar-estado" id="insertar-estado">
                            <option value="1">Alta</option>
                            <option value="0">Baja</option>
                        </select>
                    </div>
                    <div>
                        <label for="checkBox">Medicamento</label>
                      
                        <input type="checkbox" name="checkBox" id="checkBox" onclick="MedicamentoCheckBox()" class="medicamento-checkbox">
                        
                    </div>
                    <div id="medicamentoCheckEsp" class="medicamentoCheck" style="display: none;">
                        <label for="especificaciones" class="especificion-adm">Especificaciones</label>
                        <input type="text" name="especificaciones" id="especificaciones">
                    </div>
                    <div id="medicamentoCheckRec" class="medicamentoCheck" style="display: none;">
                        <label for="receta">Receta</label>
                        <select name="receta" id="receta">
                            <option value="1">Tiene</option>
                            <option value="0">No tiene</option>
                        </select>
                    </div>
                </form>
                <button id="enviar-insertar" class="btn-adm btn-submit-adm" onclick="insertar()">Enviar</button>
                <div id="alerta-insertar"></div>
            </div>
            </div>
            <!-- MODIFICAR -->
            <div id="div-modificar" class="main-adm container-fluid adm-modificar" >
                <form action="" method="post" enctype="multipart/form-data" id="modificar-form">
                    <div>
                        <label for="modificar-id">Id</label>
                        <input type="text" id="modificar-id" name="modificar-id">
                    </div>
                    <hr>
                    <div>
                        <label for="modificar-nombre">Nombre</label>
                        <input type="text" id="modificar-nombre" name="modificar-nombre">
                    </div>
                    <hr>
                    <div>
                        <label for="modificar-descripcion" class="descripcion-adm">Descripción</label>
                        <input type="text" id="modificar-descripcion" name="modificar-descripcion">
                    </div>
                    <hr>
                    <div class="img-adm d-flex justify-content-center" style="left: auto;">
                        <label for="modificar-img" class="custom-file-upload" style="width: 100% !important;">
                            <input type="file"  id="modificar-img" name="modificar-img">
                            <span >Seleccionar Imagen</span>
                        </label>
                    </div>
                    <hr>
                    <div>
                        <label for="modificar-precio">Precio</label>
                        <input type="text" id="modificar-precio" name="modificar-precio">
                    </div>
                    <hr>
                    <div>
                        <label for="modificar-stock">Stock</label>
                        <input type="text" id="modificar-stock" name="modificar-stock">
                    </div>
                    <hr>
                    <div>
                        <label for="modificar-estado">Estado</label>
                        <select name="modificar-estado" id="modificar-estado">
                            <option value="1">Alta</option>
                            <option value="0">Baja</option>
                        </select>
                    </div>
                </form>
                <button id="enviar-modificar" class="btn-adm btn-submit-adm enviar-modificar" onclick="modificar()">Enviar</button>
                <div id="alerta-modificar"></div>
            </div>
            <!-- PROVEEDORES -->
            <div id="div-proveedores" class="main-adm container-fluid">
                    <div style="display: flex !important; justify-content: space-evenly;">
                        <button id="btninsertar-proveedores" class="btn-adm btn-submit-adm" onclick="visible('insertar-proveedores')">Insertar</button>
                        <button id="btnmodificar-proveedores" class="btn-adm btn-submit-adm" onclick="visible('modificar-proveedores')">Modificar</button>
                    </div>
                    
                <div id="insertar-proveedores" class="main-adm container-fluid adm-provedoores">
                <form action="" method="post" enctype="multipart/form-data" id="insertarPro-form">
                    <div class="div-contra-boton-adm adm-provedoores">
                        <label for="proveedores-nombre">Nombre</label>
                        <input type="text" id="proveedores-nombre" name="proveedores-nombre">
                    </div>
                    <hr>
                    <div class="div-contra-boton-adm adm-provedoores">
                        <label for="proveedores-telefono">Telefono</label>
                        <input type="text" id="proveedores-telefono" name="proveedores-telefono">
                    </div>
                    <hr>
                    <div class="div-contra-boton-adm adm-provedoores">
                        <label for="proveedores-calle">Calle</label>
                        <input type="text" id="proveedores-calle" name="proveedores-calle">
                    </div>
                    <hr>
                    <div class="div-contra-boton-adm adm-provedoores">
                        <label for="proveedores-numero">Número</label>
                        <input type="text" id="proveedores-numero" name="proveedores-numero">
                    </div>
                    <hr>
                    <div class="div-contra-boton-adm adm-provedoores">
                        <label for="proveedores-esquina">Esquina</label>
                        <input type="text" id="proveedores-esquina" name="proveedores-esquina">
                    </div>
                    </form>
                    <button id="enviar-proveedoresI" class="btn-adm btn-submit-adm" onclick="proveedor('insertar')">Enviar</button>
                    <div id="alerta-proveedoresI"></div>
                </div>
                    
                <div id="modificar-proveedores" class="main-adm container-fluid adm-provedoores">
                    <form action="" method="post" enctype="multipart/form-data" id="modificarPro-form">
                        <div class="div-contra-boton-adm adm-provedoores">

                            <label for="proveedores-idM">Id</label>
                            <input type="text" id="proveedores-idM" name="proveedores-idM">
                        </div>
                        <div class="div-contra-boton-adm adm-provedoores">

                            <label for="proveedores-nombreM no-entra moverlo-a-la-izquierda">Nombre</label>
                            <input type="text" id="proveedores-nombreM" name="proveedores-nombreM">
                        </div>
                        <hr>
                        <div class="div-contra-boton-adm adm-provedoores">

                            <label for="proveedores-telefonoM">Telefono</label>
                            <input type="text" id="proveedores-telefonoM" name="proveedores-telefonoM">
                        </div>
                        <hr>
                        <div class="div-contra-boton-adm adm-provedoores">

                            <label for="proveedores-calleM">Calle</label>
                            <input type="text" id="proveedores-calleM" name="proveedores-calleM">
                        </div>
                        <hr>
                        <div class="div-contra-boton-adm adm-provedoores">

                            <label for="proveedores-numeroM">Número</label>
                            <input type="text" id="proveedores-numeroM" name="proveedores-numeroM">
                        </div>
                        <hr>
                        <div class="div-contra-boton-adm adm-provedoores">

                            <label for="proveedores-esquinaM">Esquina</label>
                            <input type="text" id="proveedores-esquinaM" name="proveedores-esquinaM">
                        </div>
                        <hr>
                        <div class="div-contra-boton-adm adm-provedoores">

                            <label for="proveedores-estadoM">Estado</label>
                            <select name="proveedores-estadoM" id="proveedores-estadoM" name="proveedores-estadoM">
                                <option value="1">Alta</option>
                                <option value="0">Baja</option>
                            </select>
                        </div>
                    </form>
                    <button id="enviar-proveedoresM" class="btn-adm btn-submit-adm" onclick="proveedor('modificar')">Enviar</button>
                    <div id="alerta-proveedoresM"></div>
                </div>
            </div>
            <!-- USUARIOS -->
            <div id="div-usuarios" class="main-adm container-fluid adm-caja-madre" >
                <div>
                    
                        <form action="" method="post" enctype="multipart/form-data" id="usuarios-form">
                            <div class="div-contra-boton-adm adm-provedoores">
                                <label for="id" class="div-contra-boton-adm adm-provedoores">Id</label>
                                <input type="text" name="usuarios-id" id="usuarios-id">
                            </div>
                            <div class="div-contra-boton-adm adm-provedoores">
                                <label for="estado" class="div-contra-boton-adm adm-provedoores">Estado</label>
                                <select name="usuarios-estado" id="usuarios-estado">
                                    <option value="1">Alta</option>
                                    <option value="0">Baja</option>
                                </select>
                            </div>
                        </form>
                </div>
                <div>
                    <button type="b" id="enviar-usuarios" class="btn-adm btn-submit-adm enviar-modificar " onclick="usuarios()">Enviar</button>
                    <div id="alerta-usuarios"></div>
                </div>
            </div>
            
        </div>

        <div class="buscador-adm" id="buscador">
            <div class="caja-de-abajo">
            <input type="text" name="buscar" id="buscar">
            <button class="btn-buscar" id="btn-buscar" onclick="tablaBuscar()">Buscar</button>
            </div>
            <div id="tabla" style="width: 80%;" class="scrollbar"></div>
            
        </div>
        <script src="nivel.js"></script>
        <script>
            function MedicamentoCheckBox(){
                    if (document.getElementById('checkBox').checked) {
                        document.getElementById('medicamentoCheckEsp').style.display = "flex";
                        document.getElementById('medicamentoCheckRec').style.display = "flex";
                    }else {
                        document.getElementById('medicamentoCheckEsp').style.display = "none";
                        document.getElementById('medicamentoCheckRec').style.display = "none";
                    }
            }

            function listaProveedores(params) {
                variable = new XMLHttpRequest();
                variable.onload = function() {
                    document.getElementById("lista-Proveedores").innerHTML = this.responseText;
                }
                variable.open("POST", "../backend/control_adm_principal.php");
                variable.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                var get = document.getElementById.bind(document);
                variable.send('listaProveedores'); 
            }
            listaProveedores();

            function insertar() {
                variable = new XMLHttpRequest();
                variable.onload = function() {
                    document.getElementById('alerta-insertar').innerHTML = this.responseText;
                    document.getElementById('insertar-nombre').value = "";
                    document.getElementById('insertar-descripcion').value = "";
                    document.getElementById('insertar-img').value = "";
                    document.getElementById('insertar-precio').value = "";
                    document.getElementById('insertar-stock').value = "";
                    document.getElementById('especificaciones').value = "";
                    document.getElementById('checkBox').checked = false;
                }
                variable.open("POST", "../backend/control_adm_principal.php");
                //variable.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                var get = document.getElementById.bind(document);
                let formData = new FormData(document.getElementById("insertar-form"));
                formData.append("insertar-img[]",document.getElementById("insertar-img").files[0]);
                formData.append("enviar-insertar", "");
                if (document.getElementById('checkBox').checked) {
                    formData.append("checkBox", "");
                    formData.append("especificaciones", document.getElementById("especificaciones").value);
                    formData.append("receta", document.getElementById("receta").value);
                }
                variable.send(formData);
            }

            function modificar() {
                variable = new XMLHttpRequest();
                variable.onload = function() {
                    document.getElementById('alerta-modificar').innerHTML = this.responseText;
                    document.getElementById('modificar-id').value = "";
                    document.getElementById('modificar-nombre').value = "";
                    document.getElementById('modificar-descripcion').value = "";
                    document.getElementById('modificar-img').value = "";
                    document.getElementById('modificar-precio').value = "";
                    document.getElementById('modificar-stock').value = "";
                }
                variable.open("POST", "../backend/control_adm_principal.php");
                //variable.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                var get = document.getElementById.bind(document);
                let formData = new FormData(document.getElementById("modificar-form"));
                formData.append("modificar-img[]",document.getElementById("modificar-img").files[0]);
                formData.append("enviar-modificar", "");
                variable.send(formData);
            }

            function proveedor(boton) {
                variable = new XMLHttpRequest();
                variable.onload = function() {
                    if (boton == 'insertar') {
                        document.getElementById('alerta-proveedoresI').innerHTML = this.responseText;
                        document.getElementById('proveedores-nombre').value = "";
                        document.getElementById('proveedores-telefono').value = "";
                        document.getElementById('proveedores-calle').value = "";
                        document.getElementById('proveedores-numero').value = "";
                        document.getElementById('proveedores-esquina').value = "";
                        // modificar
                        document.getElementById('proveedores-nombreM').value = "";
                        document.getElementById('proveedores-telefonoM').value = "";
                        document.getElementById('proveedores-calleM').value = "";
                        document.getElementById('proveedores-numeroM').value = "";
                        document.getElementById('proveedores-esquinaM').value = "";
                        document.getElementById('proveedores-idM').value = "";
                    }if (boton == 'modificar') {
                        document.getElementById('alerta-proveedoresM').innerHTML = this.responseText;
                        document.getElementById('proveedores-nombreM').value = "";
                        document.getElementById('proveedores-telefonoM').value = "";
                        document.getElementById('proveedores-calleM').value = "";
                        document.getElementById('proveedores-numeroM').value = "";
                        document.getElementById('proveedores-esquinaM').value = "";
                        document.getElementById('proveedores-idM').value = "";
                        // insertar
                        document.getElementById('proveedores-nombre').value = "";
                        document.getElementById('proveedores-telefono').value = "";
                        document.getElementById('proveedores-calle').value = "";
                        document.getElementById('proveedores-numero').value = "";
                        document.getElementById('proveedores-esquina').value = "";
                    }
                }
                variable.open("POST", "../backend/control_adm_principal.php");
                //variable.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                
                
                if (boton == 'insertar') {
                    let formData = new FormData(document.getElementById("insertarPro-form"));
                    formData.append("proveedores", "");
                    formData.append("insertar-proveedores", "");
                    formData.append("enviar-proveedoresI", "");
                    variable.send(formData);
                }else if (boton == 'modificar'){
                    let formData = new FormData(document.getElementById("modificarPro-form"));
                    formData.append("proveedores", "");
                    formData.append("modificar-proveedores", "");
                    formData.append("enviar-proveedoresM", "");
                    variable.send(formData);
                }
                
            }
            function usuarios(params) {
                variable = new XMLHttpRequest();
                variable.onload = function() {
                    document.getElementById('alerta-usuarios').innerHTML = this.responseText;
                    document.getElementById('usuarios-id').value = "";
                    //document.getElementById('usuarios-estado').value = "";
                }
                variable.open("POST", "../backend/control_adm_principal.php");
                //variable.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                let formData = new FormData(document.getElementById("usuarios-form"));
                formData.append("enviar-usuarios", "");
                variable.send(formData);
            }
            
            function categorias(nivel) {
                variable = new XMLHttpRequest();
                variable.onload = function() {
                    // document.getElementById('alerta-usuarios').innerHTML = this.responseText;
                    // document.getElementById('usuarios-id').value = "";
                    if(nivel == "categorias") {
                        document.getElementById("insertar-categoria").innerHTML = this.responseText;
                    }
                    else if(nivel == "subcategorias") {
                        document.getElementById("insertar-subcategoria").innerHTML = this.responseText;
                        document.getElementById("insertar-minicategoria").innerHTML = "";
                    }
                    else if(nivel == "minicategorias") {
                        document.getElementById("insertar-minicategoria").innerHTML = this.responseText;
                    }
                    
                    console.log(this.responseText);
                }
                variable.open("POST", "../backend/categorias.php");
                let formData = new FormData(document.getElementById("insertar-form"));
                formData.append(nivel, "");
                formData.append("id_categoria", document.getElementById("insertar-categoria").value)
                formData.append("id_subcategoria", document.getElementById("insertar-subcategoria").value)
                console.log(document.getElementById("insertar-subcategoria").value);
                variable.send(formData);
            }
            var categoria_insertar = document.getElementById("insertar-categoria");
            categoria_insertar.onchange = function() {
                categorias("subcategorias");
            }
            document.getElementById("insertar-subcategoria").onchange = function() {categorias("minicategorias");}
            categorias("categorias");
            categorias("subcategorias");
            categorias("minicategorias");
        </script>
        
    </body>
    
</html>