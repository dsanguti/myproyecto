<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

include_once('../../bd/panelcontrol/conector_BD_usuarios.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $database = new ConectarBD_PC();
    $db = $database->abrir();

    try {
        $id = $_GET['id'];

        $stmt = $db->prepare("DELETE FROM usuarios WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $_SESSION['message'] = ($stmt->rowCount() > 0) ? 'Persona eliminada correctamente' : 'No se pudo eliminar al usuario';
    } catch (PDOException $e) {
        $_SESSION['message'] = 'Error en la base de datos: ' . $e->getMessage();
    }

    $database->cerrar();
} else {
    $_SESSION['message'] = 'Oops..! Seleccione al usuario a eliminar';
}

header('location: http://localhost/myproyecto/#/panelcontrol');
