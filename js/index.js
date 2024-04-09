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

let executeCodeSanciones = true; // Variable para controlar si se ejecuta el código

// Función para ejecutar el código
function executeSearchCode() {
  const EstadoSanciones = document.getElementById("estadoSancionesFilter");

  if (buscarDirectorio.value.trim() === "") {
    iconXdir.classList.add("icon-clear-dir");
  } else {
    iconXdir.classList.remove("icon-clear-dir");
  }

  if (EstadoSanciones.value !== "") {
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
  if (executeCodeSanciones) {
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
