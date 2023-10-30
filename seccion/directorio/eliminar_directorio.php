<?php

session_start();

include_once('../../bd/directorio/conector_BD_directorio.php');
if (isset($_GET['id'])) {
    $database = new ConectarBD();
    $db = $database->abrir();
    try {

        $sql = "DELETE FROM directorio WHERE id = '" . $_GET['id'] . "'";

        $_SESSION['message'] = ($db->exec($sql)) ? 'Persona eliminada correctamente' : 'No se pudo eliminar la persona';
    } catch (PDOException $e) {
        $_SESSION['message'] = $e->getMessage();
    }
    $database->cerrar();
} else {
    $_SESSION['message'] = 'Oops..! Seleccione la persona a eliminar';
}


header('location: http://localhost/myproyecto/#/directorio');
