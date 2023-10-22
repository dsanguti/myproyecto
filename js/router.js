const Router = () => {
  let { hash } = location;
  console.log(hash);

  if (hash == "" || hash == "#/") {
    Carga_Inicio();
  } else if (hash == "#/directorio" || hash == "#/directorios") {
    Carga_Directorio();
  } else if (hash == "#/inventario") {
    Carga_Inventario();
  }
};
