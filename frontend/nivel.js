var ultimoBotonClickeado = "";
document.getElementById("buscador").style.visibility = "hidden";
            document.getElementById("div-insertar").style.display = "none";
            document.getElementById("div-modificar").style.display = "none";
            document.getElementById("div-proveedores").style.display = "none";
            document.getElementById("div-usuarios").style.display = "none";
    function visible(tipo) {
        if (tipo == 'insertar') {
            document.getElementById("div-insertar").style.display = "flex";
            document.getElementById("div-modificar").style.display = "none";
            document.getElementById("div-proveedores").style.display = "none";
            document.getElementById("div-usuarios").style.display = "none";
            document.getElementById("buscador").style.visibility = "hidden";
            document.getElementById("modificar-proveedores").style.display = "none";
            document.getElementById("insertar-proveedores").style.display = "none";
            document.getElementById("alerta-modificar").innerHTML = "";
            document.getElementById("alerta-proveedoresI").innerHTML = "";
            document.getElementById("alerta-proveedoresM").innerHTML = "";
            document.getElementById("alerta-usuarios").innerHTML = "";
        }if (tipo == 'modificar') {
            document.getElementById("buscador").style.visibility = "visible";
            document.getElementById("div-insertar").style.display = "none";
            document.getElementById("div-modificar").style.display = "flex";
            document.getElementById("div-proveedores").style.display = "none";
            document.getElementById("div-usuarios").style.display = "none";
            document.getElementById("modificar-proveedores").style.display = "none";
            document.getElementById("insertar-proveedores").style.display = "none";
            document.getElementById("alerta-insertar").innerHTML = "";
            document.getElementById("alerta-proveedoresI").innerHTML = "";
            document.getElementById("alerta-proveedoresM").innerHTML = "";
            document.getElementById("alerta-usuarios").innerHTML = "";
            tabla("../backend/backend2.0/control_adm_modificar.php");
        }if (tipo == 'proveedores') {
            document.getElementById("div-insertar").style.display = "none";
            document.getElementById("div-modificar").style.display = "none";
            document.getElementById("div-proveedores").style.display = "flex";
            document.getElementById("div-usuarios").style.display = "none";
            document.getElementById("buscador").style.visibility = "hidden";
            document.getElementById("modificar-proveedores").style.display = "none";
            document.getElementById("insertar-proveedores").style.display = "none";
            document.getElementById("alerta-modificar").innerHTML = "";
            document.getElementById("alerta-insertar").innerHTML = "";
            document.getElementById("alerta-usuarios").innerHTML = "";
            document.getElementById("alerta-proveedoresI").innerHTML = "";
            document.getElementById("alerta-proveedoresM").innerHTML = "";
        }if (tipo == 'usuarios') {
            document.getElementById("div-insertar").style.display = "none";
            document.getElementById("div-modificar").style.display = "none";
            document.getElementById("div-proveedores").style.display = "none";
            document.getElementById("div-usuarios").style.display = "flex";
            document.getElementById("buscador").style.visibility = "visible";
            document.getElementById("modificar-proveedores").style.display = "none";
            document.getElementById("insertar-proveedores").style.display = "none";
            document.getElementById("alerta-modificar").innerHTML = "";
            document.getElementById("alerta-proveedoresI").innerHTML = "";
            document.getElementById("alerta-proveedoresM").innerHTML = "";
            document.getElementById("alerta-insertar").innerHTML = "";
            tabla("../backend/backend2.0/control_adm_usuario.php");
        }
        if (tipo == "insertar-proveedores") {
            document.getElementById("div-insertar").style.display = "none";
            document.getElementById("div-modificar").style.display = "none";
            document.getElementById("div-proveedores").style.display = "flex";
            document.getElementById("div-usuarios").style.display = "none";
            document.getElementById("buscador").style.visibility = "hidden";
            document.getElementById("modificar-proveedores").style.display = "none";
            document.getElementById("insertar-proveedores").style.display = "flex";
            document.getElementById("alerta-modificar").innerHTML = "";
            document.getElementById("alerta-insertar").innerHTML = "";
            document.getElementById("alerta-proveedoresM").innerHTML = "";
        }
        if (tipo == "modificar-proveedores") {
            document.getElementById("div-insertar").style.display = "none";
            document.getElementById("div-modificar").style.display = "none";
            document.getElementById("div-proveedores").style.display = "flex";
            document.getElementById("div-usuarios").style.display = "none";
            document.getElementById("buscador").style.visibility = "visible";
            document.getElementById("modificar-proveedores").style.display = "flex";
            document.getElementById("insertar-proveedores").style.display = "none";
            document.getElementById("alerta-modificar").innerHTML = "";
            document.getElementById("alerta-insertar").innerHTML = "";
            document.getElementById("alerta-proveedoresI").innerHTML = "";
            tabla("../backend/backend2.0/control_adm_proveedores.php");
        }
}

function tabla(boton) {
    variable = new XMLHttpRequest();
    variable.onload = function() {
      document.getElementById("tabla").innerHTML = this.responseText;
    }
    variable.open("POST", boton);
    variable.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    variable.send("buscar="+document.getElementById("buscar").value);
    ultimoBotonClickeado = boton;
  }

function tablaBuscar() {
    tabla(ultimoBotonClickeado);
    
}