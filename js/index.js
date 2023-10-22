window.addEventListener("hashchange", () => {
  Router();
});

document.addEventListener("DOMContentLoaded", () => {
  let miUrl = window.location.href;

  if (miUrl === "http://localhost/theproject/#/directorio") {
    Carga_Directorio();
  } else if (miUrl === "http://localhost/theproject/#/inventario") {
    Carga_Inventario();
  }
});
