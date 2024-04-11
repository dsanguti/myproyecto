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
    Carga_LoaderSanciones();
    Carga_Sanciones();
  }
};
