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
  } else if (miUrl === "http://http://localhost/myproyecto/#/") {
    Carga_Inicio();
  }
});

// Función Buscar en el directorio

document.addEventListener("keyup", (e) => {
  if (e.target.matches("#buscarDirectorio")) {
    if (e.key === "Escape") e.target.value = "";

    document.querySelectorAll(".celda_tabla_directorio").forEach((celda) => {
      celda.textContent
        .toLocaleLowerCase()
        .includes(e.target.value.toLocaleLowerCase())
        ? celda.classList.remove("filtro_directorio")
        : celda.classList.add("filtro_directorio");
    });
  }
});
