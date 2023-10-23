window.addEventListener("hashchange", () => {
  Router();
});

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
