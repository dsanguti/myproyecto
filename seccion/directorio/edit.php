<?php

session_start();

include_once('../../bd/directorio/conector_BD_directorio.php');
if (isset($_POST['edit'])) {
    $database = new ConectarBD();
    $db = $database->abrir();
    try {

        $id = $_GET['id'];
        $puestoD = $_POST['puestoDirectorio'];
        $nombreD = $_POST['nombreDirectorio'];
        $apellidosD = $_POST['apellidos_directorio'];
        $correoD = $_POST['correo_directorio'];
        $oficinaD = $_POST['oficina_directorio'];
        $telefonoD = $_POST['telefono_directorio'];
        $extensionD = $_POST['extension_directorio'];

        $sql = "UPDATE directorio SET 
            puesto = '$puestoD', nombre = '$nombreD', apellidos = '$apellidosD', correo = '$correoD', oficina = '$oficinaD', telefono = '$telefonoD', extension = '$extensionD' 
            WHERE id = '$id'";

        $_SESSION['message'] = ($db->exec($sql)) ? 'Datos actualizados correctamente' : 'No se pudo actualizar los datos';
    } catch (PDOException $e) {
        $_SESSION['message'] = $e->getMessage();
    }
    $database->cerrar();
} else {
    $_SESSION['message'] = 'Oops..! Rellene el formulario';
}


header('location: http://localhost/myproyecto/#/directorio');
