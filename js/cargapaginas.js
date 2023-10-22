// PÁGINA DONDE SE IRÁN CARGANDO EN EL DIV CON ID MAIN DE LA PAG PRINCIPAL.PHP TODAS LAS SECCIONES DE ESTE PROYECTO

// Se carga del contenido de la sección Inicio (pagina principal del proyecto)

function Carga_Inicio() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("main").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "/theproject/inicio.html", true);
  xhttp.send();
}

// // Se carga la sección del Directorio

// function Carga_Directorio(){
//   var xhttp = new XMLHttpRequest();
//   xhttp.onreadystatechange = function() {
//     if (this.readyState == 4 && this.status == 200) {
//       document.getElementById("main").innerHTML =
//       this.responseText;
//     }
//   };
//   xhttp.open("GET", "seccion/directorio/directorio.php", true);
//   xhttp.send();

// }

// Se carga la sección del Directorio teniendo en cuenta la carga posterior de modal
function Carga_Directorio() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("main").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "/theproject/seccion/directorio/directorio.php", true);
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
  xhttp.open("GET", "/theproject/seccion/inventario/inventario.php", true);
  xhttp.send();
}

// Carga con retraso de Directorio

function Carga_DirectorioR() {
  setTimeout(Carga_Directorio, 3000);
}

// Se carga la sección de demandas

function Carga_Demandas() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("main").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "seccion/demandas/demandas.html", true);
  xhttp.send();
}

// Se carga la sección de sanciones

function Carga_Sanciones() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("main").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "seccion/sanciones/sanciones.html", true);
  xhttp.send();
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
