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
    Carga_LoaderSanciones();
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

// Función para ejecutar la búsqueda por DNI/NIE

function executeSearchCodeSanciones() {
  const buscarDniSanciones = document.getElementById("dniFilter");

  if (buscarDniSanciones) {
    const filtroDni = buscarDniSanciones.value.trim().toLowerCase();

    document
      .querySelectorAll(".celda_tabla_sanciones td:nth-child(5)")
      .forEach((celda) => {
        const dni = celda.textContent.trim().toLowerCase();
        const fila = celda.parentNode;

        // Eliminar cualquier filtro previo
        fila.classList.remove("filtro_directorio");

        // Aplicar nuevo filtro
        if (filtroDni && dni.includes(filtroDni)) {
          fila.classList.remove("filtro_directorio");
        } else {
          fila.classList.add("filtro_directorio");
        }
      });
  } else {
    console.error(
      "El campo de búsqueda de DNI/NIE no se encontró en el documento."
    );
  }

  // Si el campo de búsqueda está vacío, mostrar todas las filas
  if (!buscarDniSanciones.value) {
    document.querySelectorAll(".celda_tabla_sanciones").forEach((fila) => {
      fila.classList.remove("filtro_directorio");
    });
  }
}

// Función para ejecutar la búsqueda por nombre

function executeSearchByName() {
  const buscarNombre = document.getElementById("nombreFilter");

  if (buscarNombre) {
    const filtroNombre = buscarNombre.value.trim().toLowerCase();

    document
      .querySelectorAll(".celda_tabla_sanciones td:nth-child(6)")
      .forEach((celda) => {
        const nombre = celda.textContent.trim().toLowerCase();
        const fila = celda.parentNode;

        // Eliminar cualquier filtro previo
        fila.classList.remove("filtro_directorio");

        // Aplicar nuevo filtro
        if (filtroNombre && nombre.includes(filtroNombre)) {
          fila.classList.remove("filtro_directorio");
        } else {
          fila.classList.add("filtro_directorio");
        }
      });
  } else {
    console.error(
      "El campo de búsqueda de nombre no se encontró en el documento."
    );
  }

  // Si el campo de búsqueda está vacío, mostrar todas las filas
  if (!buscarNombre.value) {
    document.querySelectorAll(".celda_tabla_sanciones").forEach((fila) => {
      fila.classList.remove("filtro_directorio");
    });
  }
}

// Adjuntar evento keyup al campo de búsqueda DNI/NIE
document.addEventListener("keyup", (e) => {
  if (e.target.matches("#dniFilter")) {
    executeSearchCodeSanciones(); // Llama a la función para filtrar por DNI/NIE
  }
});

// Adjuntar evento keyup al campo de búsqueda nombreFilter
document.addEventListener("keyup", (e) => {
  if (e.target.matches("#nombreFilter")) {
    executeSearchByName(); // Llama a la función para filtrar por nombre
  }
});

// Esperar a que el DOM esté completamente cargado antes de ejecutar el código
//funciones para filtrado multiple en sanciones

console.log("hola me lees???");
// Función para ejecutar la búsqueda por estado
function executeSearchByState() {
  const estadoFilter = document.getElementById("estadoSancionesFilter");

  if (estadoFilter) {
    const filtroEstado = estadoFilter.value;

    document
      .querySelectorAll(".celda_tabla_sanciones td:nth-child(2)")
      .forEach((celda) => {
        const fila = celda.parentNode;

        if (filtroEstado === "") {
          fila.classList.remove("filtro_directorio");
        } else {
          const estado = celda.textContent.trim();
          if (estado !== filtroEstado) {
            fila.classList.add("filtro_directorio");
          } else {
            fila.classList.remove("filtro_directorio");
          }
        }
      });
  } else {
    console.error(
      "El campo de filtro de estado no se encontró en el documento."
    );
  }
}
// Esperar a que la página web esté completamente cargada antes de ejecutar el código
window.addEventListener("load", function () {
  console.log("Página web completamente cargada");

  // Función para ejecutar la búsqueda por estado
  function executeSearchByState() {
    const estadoFilter = document.getElementById("estadoSancionesFilter");

    if (estadoFilter) {
      const filtroEstado = estadoFilter.value;

      document
        .querySelectorAll(".celda_tabla_sanciones td:nth-child(2)")
        .forEach((celda) => {
          const fila = celda.parentNode;

          if (filtroEstado === "") {
            fila.classList.remove("filtro_directorio");
          } else {
            const estado = celda.textContent.trim();
            if (estado !== filtroEstado) {
              fila.classList.add("filtro_directorio");
            } else {
              fila.classList.remove("filtro_directorio");
            }
          }
        });
    } else {
      console.error(
        "El campo de filtro de estado no se encontró en el documento."
      );
    }
  }

  // Esperar un breve período de tiempo antes de intentar obtener el elemento
  setTimeout(function () {
    const estadoFilter = document.getElementById("estadoSancionesFilter");
    console.log("Elemento estadoFilter:", estadoFilter);
    if (estadoFilter) {
      console.log("El campo de filtro de estado se encontró en el documento.");
      estadoFilter.addEventListener("change", executeSearchByState);
    } else {
      console.error(
        "El campo de filtro de estado no se encontró en el documento."
      );
    }

    // Ejecutar la búsqueda inicial por estado
    executeSearchByState();
  }, 100); // Esperar 100 milisegundos
});
