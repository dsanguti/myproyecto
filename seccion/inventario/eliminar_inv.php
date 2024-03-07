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

// Recuperar el valor de 'centroINV' de $_GET en lugar de $_POST
if (isset($_GET['centroINV'])) {
    $centroINV = $_GET['centroINV'];
    if ($centroINV == "COE") {
        header('Location: http://localhost/myproyecto/#/inventario/COE');
        exit();
    } elseif ($centroINV == "OE") {
        header('Location: http://localhost/myproyecto/#/inventario/OE');
        exit();
    } else {
        header('Location: http://localhost/myproyecto/#/inventario/DP');
        exit();
    }
} else {
    $_SESSION['message'] = 'Oops..! Ha ocurrido un error al redirigir';
    // Aquí puedes agregar una redirección a una página de error o manejar la situación de alguna otra manera.
}
