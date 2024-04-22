// Una vez Cargado contenido comprueba url donde se encuentra y carga contenido sección
document.addEventListener("DOMContentLoaded", () => {
  //Ejecutar Rotuer cada vez que cambie url
  window.addEventListener("hashchange", () => {
    Router();
  });
  const Router = () => {
    let { hash } = location;
    console.log(hash);

    if (hash == "" || hash == "#/") {
      Carga_Inicio();
    } else if (hash == "#/directorio" || hash == "#/directorios") {
      Carga_Directorio();
    } else if (hash == "#/inventario") {
      Carga_Inventario();
    } else if (hash == "#/panelcontrol") {
      Carga_Panel_Control();
    } else if (hash == "#/inventario/UCI") {
      Carga_InventarioUCI();
    } else if (hash == "#/inventario/DP") {
      Carga_InventarioDP();
    } else if (hash == "#/inventario/OE") {
      Carga_InventarioOE();
    } else if (hash == "#/inventario/COE") {
      Carga_InventarioCOE();
    } else if (hash == "#/prestaciones/sanciones") {
      Carga_Sanciones();
    }
  };
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

  // Función Buscar en el directorio

  let executeCode = true; // Variable para controlar si se ejecuta el código

  document.querySelectorAll(".celda_tabla_directorio").forEach((fila) => {
    const celdas = fila.querySelectorAll("td");
    console.log(celdas[4].textContent); // Asumiendo que la oficina es la quinta columna
  });

  function executeSearchCode() {
    const iconXdir = document.getElementById("xSearchDir");
    const buscarDirectorio = document.getElementById("buscarDirectorio");
    const busqueda = buscarDirectorio.value.trim().toLocaleLowerCase();

    console.log(iconXdir, buscarDirectorio);

    // Manejo de la visibilidad del ícono de limpieza
    iconXdir.classList.toggle("icon-clear-dir", busqueda === "");

    // Aplicar o quitar filtros a las filas basado en la búsqueda
    document.querySelectorAll(".celda_tabla_directorio").forEach((fila) => {
      const celdas = fila.querySelectorAll("td");
      const coincide = Array.from(celdas).some((celda) =>
        celda.textContent.toLocaleLowerCase().includes(busqueda)
      );
      console.log(coincide); // Verificar si alguna celda coincide
      fila.classList.toggle("filtro_directorio", !coincide);
    });
  }

  // Evento keyup solo cuando executeCode sea true
  document.addEventListener("keyup", (e) => {
    if (executeCode) {
      if (e.target.matches("#buscarDirectorio")) {
        console.log("Evento keyup detectado");
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
  document.addEventListener("DOMContentLoaded", () => {
    // Agregar el evento click al icono de búsqueda
    const iconXdir = document.getElementById("xSearchDir");
    console.log(iconXdir); // Verificar si el elemento existe
    if (iconXdir) {
      iconXdir.addEventListener("click", () => {
        console.log("Se hizo clic en el icono de búsqueda");
        CerrarIconDirBuscar();
      });
    }
  });

  function CerrarIconDirBuscar() {
    console.log("Función CerrarIconDirBuscar() llamada"); // Verificar si la función se está llamando
    const iconXdir = document.getElementById("xSearchDir");
    const buscarDirectorio = document.getElementById("buscarDirectorio");

    console.log("iconXdir:", iconXdir);
    console.log("buscarDirectorio:", buscarDirectorio);

    if (iconXdir) {
      iconXdir.classList.add("icon-clear-dir");
    }
    if (buscarDirectorio) {
      buscarDirectorio.value = "";
    }
    document.querySelectorAll(".celda_tabla_directorio").forEach((celda) => {
      console.log("Contenido de celda:", celda.textContent);
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

  // Función para ejecutar la búsqueda por nombre en Sanciones

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
    xhttp.open(
      "GET",
      "/myproyecto/seccion/panelcontrol/panelcontrol.php",
      true
    );
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

  function Carga_Sanciones() {
    Carga_LoaderSanciones();
    // Mostrar el loader antes de hacer la solicitud
    var loader = document.getElementById("loaderSanciones");
    if (loader) {
      loader.style.display = "block"; // Cambiado de "grid" a "block"
    }

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        // Limpiar el contenido actual del elemento main
        document.getElementById("main").innerHTML = this.responseText;

        // Ocultar el loader después de cargar las sanciones
        if (loader) {
          loader.style.display = "none";
        }
      }
    };
    xhttp.open("GET", "/myproyecto/seccion/prestaciones/sanciones2.php", true);
    xhttp.send();
  }

  function Carga_LoaderSanciones() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        // Limpiar el contenido actual del elemento main
        document.getElementById("main").innerHTML = this.responseText;
      }
    };
    xhttp.open(
      "GET",
      "/myproyecto/seccion/prestaciones/loader_sanciones.php",
      true
    );
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
});
