<?php

session_start(); // Inicia la sesión si aún no se ha hecho
include_once('../../bd/inventario/conector_BD_inventario.php');

if (isset($_POST['edit_INV'])) {
    $database = new ConectarBD_INV();
    $db = $database->abrir();

    try {

        $id = $_GET['id'];
        $cod_elemento = $_POST['cod_elemento'];
        $modelo = $_POST['modelo'];
        $n_serie = $_POST['n_serie'];
        $ip_INV = $_POST['ip'];
        $situacion = $_POST['situacion_INV'];
        $estado = $_POST['estadoINV'];
        $f_inicio_mto = $_POST['f_inicio_mto_INV'];
        $f_fin_mto = $_POST['f_fin_mto_INV'];
        $proveedor = $_POST['proveedor_INV'];
        $centro = $_POST['centroINV'];


        $sql = "UPDATE inventario SET 
            cod_elemento = '$cod_elemento', modelo = '$modelo', n_serie = '$n_serie', ip = '$ip_INV', situacion = '$situacion', estado = '$estado', f_inicio_mto = '$f_inicio_mto', f_fin_mto = '$f_fin_mto', proveedor ='$proveedor', centro = '$centro' 
            WHERE id = '$id'";

        $_SESSION['message'] = ($db->exec($sql)) ? 'Datos actualizados correctamente' : 'No se pudo actualizar los datos';
    } catch (PDOException $e) {
        $_SESSION['message'] = $e->getMessage();
    }
    $database->cerrar();
} else {
    $_SESSION['message'] = 'Oops..! Rellene el formulario';
}


if ($_POST['centro_INV'] == "COE") {
    header('Location: http://localhost/myproyecto/#/inventario/COE');
} elseif ($_POST['centro_INV'] == "OE") {
    header('Location: http://localhost/myproyecto/#/inventario/OE');
} else {
    header('Location: http://localhost/myproyecto/#/inventario/DP');
}
