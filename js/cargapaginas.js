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

// Se carga la paginación de la tabla directorio
document.addEventListener("DOMContentLoaded", function () {
  // Inicializar la página al cargar
  cargarTabla(1);

  const paginationElement = document.getElementById("pagination-directorio");
  if (paginationElement) {
    // Manejar el clic en los botones de paginación
    document
      .getElementById("pagination-directorio")
      .addEventListener("click", function (event) {
        event.preventDefault();
        if (event.target.tagName === "a") {
          const pagina = event.target.dataset.page;
          cargarTabla(pagina);
        }
      });
  } else {
    console.error("no existe el elmento");
  }
});

function cargarTabla(pagina) {
  const tablaContainer = document.getElementById("tabla_directorio");

  // Realizar una solicitud AJAX
  const xhr = new XMLHttpRequest();
  xhr.open(
    "GET",
    "/myproyecto/seccion/directorio/carga_tabla_directorio.php?pagina=" +
      pagina,
    true
  );

  xhr.onload = function () {
    if (xhr.status == 200) {
      // Actualizar el contenido de la tabla y la paginación
      tablaContainer.innerHTML = xhr.responseText;

      actualizarPaginacion(pagina);
    }
  };

  xhr.send();
}

function actualizarPaginacion(paginaActual) {
  const paginationContainer = document.getElementById("pagination-directorio");

  // Realizar una solicitud AJAX para obtener la paginación actualizada
  const xhr = new XMLHttpRequest();
  xhr.open(
    "GET",
    "/myproyecto/seccion/directorio/paginacion_tabla_directorio.php?pagina=" +
      paginaActual,
    true
  );

  xhr.onload = function () {
    if (xhr.status == 200) {
      // Actualizar el contenido de la paginación
      paginationContainer.innerHTML = xhr.responseText;
    }
  };

  xhr.send();
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
