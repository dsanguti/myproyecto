<?php
include_once('../../bd/directorio/conector_BD_directorio.php');
if (isset($_POST['guardar_directorio'])) {
    $database = new ConectarBD();
    $db = $database->abrir();
    try {
        $stmt = $db->prepare("INSERT INTO directorio (puesto,  nombre, apellidos, oficina, telefono, extension, correo)
        VALUES (:puestoDirectorio, :nombre_directorio, :apellidos_directorio, :oficina_directorio, :telefono_directorio, :extension_directorio, :correo_directorio)");

        $_SESSION['message'] = ($stmt->execute(array(
            ':puestoDirectorio' => $_POST['puestoDirectorio'],
            ':nombre_directorio' => $_POST['nombre_directorio'], ':apellidos_directorio' => $_POST['apellidos_directorio'], ':oficina_directorio' => $_POST['oficina_directorio'],
            ':telefono_directorio' => $_POST['telefono_directorio'], ':extension_directorio' => $_POST['extension_directorio'], ':correo_directorio' => $_POST['correo_directorio']
        )))
            ? 'Contacto agregado' : 'error al insertar';
    } catch (PDOException $e) {
        $_SESSION['message'] = $e->getMessage();
    }
    $database->cerrar();
} else {
    $_SESSION['message'] = 'Rellene el formulario';
}
header('location: http://localhost/myproyecto/#/directorio');