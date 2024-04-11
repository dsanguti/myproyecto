// PÁGINA DONDE SE IRÁN CARGANDO EN EL DIV CON ID MAIN DE LA PAG PRINCIPAL.PHP TODAS LAS SECCIONES DE ESTE PROYECTO

// Se carga del contenido de la sección Inicio (pagina principal del proyecto)

function Carga_Inicio() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("main").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "/myproyecto/inicio.html", true);
  xhttp.send();
}

// Se carga la sección del Directorio teniendo en cuenta la carga posterior de modal
function Carga_Directorio() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("main").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "/myproyecto/seccion/directorio/directorio.php", true);
  xhttp.send();
}

// Se carga la sección del Panel de Control
function Carga_Panel_Control() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("main").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "/myproyecto/seccion/panelcontrol/panelcontrol.php", true);
  xhttp.send();
}

// Se carga la sección de Inventario

function Carga_Inventario() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("main").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "/myproyecto/seccion/inventario/inventario.php", true);
  xhttp.send();
}

// Se carga dentro de inventario la sección de UCI

function Carga_InventarioUCI() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("mainInventario").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "/myproyecto/seccion/inventario/inventarioUCI.php", true);
  xhttp.send();
}

// Se carga dentro de inventario la sección de DP

function Carga_InventarioDP() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("mainInventario").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "/myproyecto/seccion/inventario/inventarioDP.php", true);
  xhttp.send();
}

// Se carga dentro de inventario la sección de OE

function Carga_InventarioOE() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("mainInventario").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "/myproyecto/seccion/inventario/inventarioOE.php", true);
  xhttp.send();
}

// Se carga dentro de inventario la sección de COE

function Carga_InventarioCOE() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("mainInventario").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "/myproyecto/seccion/inventario/inventarioCOE.php", true);
  xhttp.send();
}

// Se carga la sección de sanciones de prestaciones

// function Carga_Sanciones() {
//   var xhttp = new XMLHttpRequest();
//   xhttp.onreadystatechange = function () {
//     if (this.readyState == 4 && this.status == 200) {
//       document.getElementById("main").innerHTML = this.responseText;
//     }
//   };
//   xhttp.open("GET", "../myproyecto/seccion/prestaciones/sanciones2.php", true);
//   xhttp.send();
// }

function Carga_Sanciones() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      // Dividir la respuesta en partes más pequeñas
      let partes = this.responseText.split("<!-- SPLIT -->");

      // Mostrar progresivamente las partes
      mostrarPartes(partes, 0);
    }
  };
  xhttp.open("GET", "../myproyecto/seccion/prestaciones/sanciones2.php", true);
  xhttp.send();
}

function mostrarPartes(partes, indice) {
  // Crear un fragmento de documento para almacenar las partes del contenido
  var fragmento = document.createDocumentFragment();

  // Agregar todas las partes al fragmento
  for (var i = indice; i < partes.length; i++) {
    var div = document.createElement("div");
    div.innerHTML = partes[i];
    fragmento.appendChild(div);
  }

  // Agregar el fragmento al contenido principal
  document.getElementById("main").appendChild(fragmento);
}

// Se carga la sección de planes

function Carga_Planes() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("main").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "seccion/planes/planes.html", true);
  xhttp.send();
}

function cerrarModal() {
  var myModalEl = new bootstrap.Modal(
    document.getElementsByClassName("edit-modal")
  );
  var modal = bootstrap.Modal.getInstance(myModalEl);
  modal.hide();
}

function envioDatosEditarDirectorio() {
  var formEditar = document.getElementById("form-editar-directorio");

  formEditar.addEventListener("submit", function (e) {
    e.preventDefault();
    var datos = new FormData(formEditar);

    fetch("../seccion/directorio/edit.php", {
      method: "POST",
      body: datos,
    });
  });
}
