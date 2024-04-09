//Ejecutar Rotuer cada vez que cambie url

window.addEventListener("hashchange", () => {
  Router();
});

// Una vez Cargado contenido comprueba url donde se encuentra y carga contenido sección
document.addEventListener("DOMContentLoaded", () => {
  let miUrl = window.location.href;

  if (miUrl === "http://localhost/myproyecto/#/directorio") {
    Carga_Directorio();
  } else if (miUrl === "http://localhost/myproyecto/#/inventario") {
    Carga_Inventario();
  } else if (miUrl === "http://localhost/myproyecto/#/") {
    Carga_Inicio();
  } else if (miUrl === "http://localhost/myproyecto/#/panelcontrol") {
    Carga_Panel_Control();
  } else if (miUrl === "http://localhost/myproyecto/#/inventario") {
    Carga_Inventario();
  } else if (miUrl === "http://localhost/myproyecto/#/inventario/COE") {
    Carga_Inventario();
    Carga_InventarioCOE();
  } else if (miUrl === "http://localhost/myproyecto/#/inventario/OE") {
    Carga_Inventario();
    Carga_InventarioOE();
  } else if (miUrl === "http://localhost/myproyecto/#/inventario/DP") {
    Carga_Inventario();
    Carga_InventarioDP();
  } else if (miUrl === "http://localhost/myproyecto/#/prestaciones/sanciones") {
    Carga_Sanciones();
  }
});

// Función Buscar en el directorio

let executeCode = true; // Variable para controlar si se ejecuta el código

// Función para ejecutar el código
function executeSearchCode() {
  const iconXdir = document.getElementById("xSearchDir");
  const buscarDirectorio = document.getElementById("buscarDirectorio");

  if (buscarDirectorio.value.trim() === "") {
    iconXdir.classList.add("icon-clear-dir");
  } else {
    iconXdir.classList.remove("icon-clear-dir");
  }

  if (buscarDirectorio.value !== "") {
    document.querySelectorAll(".celda_tabla_directorio").forEach((celda) => {
      celda.textContent
        .toLocaleLowerCase()
        .includes(buscarDirectorio.value.toLocaleLowerCase())
        ? celda.classList.remove("filtro_directorio")
        : celda.classList.add("filtro_directorio");
    });
  }
}

// Evento keyup solo cuando executeCode sea true
document.addEventListener("keyup", (e) => {
  if (executeCode) {
    if (e.target.matches("#buscarDirectorio")) {
      if (e.key === "Escape") {
        e.target.value = "";
        executeSearchCode(); // Llama a la función para limpiar y filtrar
      } else {
        executeSearchCode(); // Llama a la función para filtrar
      }
    }
  }
});

//Cerrar iconX BuscarDirectorio

function CerrarIconDirBuscar() {
  const iconXdir = document.getElementById("xSearchDir");
  const buscarDirectorio = document.getElementById("buscarDirectorio");

  iconXdir.classList.add("icon-clear-dir");
  buscarDirectorio.value = "";
  document.querySelectorAll(".celda_tabla_directorio").forEach((celda) => {
    celda.textContent
      .toLocaleLowerCase()
      .includes(buscarDirectorio.value.toLocaleLowerCase())
      ? celda.classList.remove("filtro_directorio")
      : celda.classList.add("filtro_directorio");
  });
}

//Función para los filtros de la Sanciones

document.addEventListener("DOMContentLoaded", function () {
  // Obtener referencias a los elementos de filtro
  var selects = document.querySelectorAll("select");
  var inputs = document.querySelectorAll("input");

  // Asignar un evento change a cada elemento de filtro
  selects.forEach(function (select) {
    select.addEventListener("change", filterData);
  });
  inputs.forEach(function (input) {
    input.addEventListener("change", filterData);
  });

  function filterData() {
    var estado = document.getElementById("estadoSancionesFilter").value;
    var fechaListado = document.getElementById(
      "fechaListadoSancionesFilter"
    ).value;
    var dni = document.getElementById("dniFilter").value;
    var nombre = document.getElementById("nombreFilter").value;
    var infracciones = document.getElementById(
      "infracconesSancionesFilter"
    ).value;
    var tipoSancion = document.getElementById("tipoSancionFilter").value;
    var fechaBajaSancion = document.getElementById(
      "fechaBajaSancionFilter"
    ).value;
    var fechaARBaja = document.getElementById("fechaARBajaFilter").value;
    var fechaFinAlegaciones = document.getElementById(
      "fechaFinAlegacionesFilter"
    ).value;
    var naComunicacion = document.getElementById("naComunicacionFilter").value;
    var sePuedeResolver = document.getElementById(
      "sePuedeResolverFilter"
    ).value;
    var estimada = document.getElementById("estimadaFilter").value;
    var controlNomina = document.getElementById("controlNominaFilter").value;
    var motivo = document.getElementById("motivoFilter").value;

    // Crear el objeto XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Configurar la solicitud
    xhr.open("POST", "/seccion/prestaciones/filtro_sanciones.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Manejar la respuesta
    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          document.getElementById("body_tabla_sanciones").innerHTML =
            xhr.responseText;
        } else {
          console.error("Error en la solicitud.");
        }
      }
    };

    // Enviar la solicitud con los datos de filtro
    xhr.send(
      "estado=" +
        estado +
        "&fechaListado=" +
        fechaListado +
        "&dni=" +
        dni +
        "&nombre=" +
        nombre +
        "&infracciones=" +
        infracciones +
        "&tipoSancion=" +
        tipoSancion +
        "&fechaBajaSancion=" +
        fechaBajaSancion +
        "&fechaARBaja=" +
        fechaARBaja +
        "&fechaFinAlegaciones=" +
        fechaFinAlegaciones +
        "&naComunicacion=" +
        naComunicacion +
        "&sePuedeResolver=" +
        sePuedeResolver +
        "&estimada=" +
        estimada +
        "&controlNomina=" +
        controlNomina +
        "&motivo=" +
        motivo
    );
  }
});
