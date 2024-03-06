<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

include_once('../../bd/inventario/conector_BD_inventario.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $database = new ConectarBD_INV();
    $db = $database->abrir();

    try {
        $id = $_GET['id'];

        $stmt = $db->prepare("DELETE FROM inventario WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $_SESSION['message'] = ($stmt->rowCount() > 0) ? 'Elemento eliminado correctamente' : 'No se pudo eliminar el elemento del inventario';
    } catch (PDOException $e) {
        $_SESSION['message'] = 'Error en la base de datos: ' . $e->getMessage();
    }

    $database->cerrar();
} else {
    $_SESSION['message'] = 'Oops..! Seleccione al usuario a eliminar';
}

if ($_POST['centro_INV'] == "COE") {
    header('Location: http://localhost/myproyecto/#/inventario/COE');
} elseif ($_POST['centro_INV'] == "OE") {
    header('Location: http://localhost/myproyecto/#/inventario/OE');
} else {
    header('Location: http://localhost/myproyecto/#/inventario/DP');
}
