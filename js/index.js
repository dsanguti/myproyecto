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

document.addEventListener("keyup", (e) => {
  const iconXdir = document.getElementById("xSearchDir");
  const buscarDirectorio = document.getElementById("buscarDirectorio");

  if (e.value !== "") {
    iconXdir.classList.remove("icon-clear-dir");
  }

  if (buscarDirectorio.value.trim() === "") {
    iconXdir.classList.add("icon-clear-dir");
  }

  if (e.target.matches("#buscarDirectorio")) {
    if (e.key === "Escape") {
      e.target.value = "";
      iconXdir.classList.add("icon-clear-dir");
    }

    document.querySelectorAll(".celda_tabla_directorio").forEach((celda) => {
      celda.textContent
        .toLocaleLowerCase()
        .includes(e.target.value.toLocaleLowerCase())
        ? celda.classList.remove("filtro_directorio")
        : celda.classList.add("filtro_directorio");
    });
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
