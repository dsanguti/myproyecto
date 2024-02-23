<?php

session_start(); // Inicia la sesión si aún no se ha hecho
include_once('../../bd/panelcontrol/conector_BD_usuarios.php');

if (isset($_POST['edit_PC'])) {
    $database = new ConectarBD_PC();
    $db = $database->abrir();

    try {

        $id = $_GET['id'];
        $nombrePC = $_POST['nombrePC'];
        $apellidoPC = $_POST['apellidoPC'];
        $usuarioPC = $_POST['usuarioPC'];
        $perfilPC = $_POST['perfilPC'];
        $clavePC = $_POST['clavePC'];
        $estadoPC = $_POST['estadoPC'];
        $directorioPC = $_POST['directorioPC'];
        $inventarioPC = $_POST['inventarioPC'];

        $sql = "UPDATE usuarios SET 
            nombre = '$nombrePC', apellido = '$apellidoPC', usuario = '$usuarioPC', perfil = '$perfilPC', clave = '$clavePC', estado = '$estadoPC', directorio = '$directorioPC', inventario = '$inventarioPC' 
            WHERE id = '$id'";

        $_SESSION['message'] = ($db->exec($sql)) ? 'Datos actualizados correctamente' : 'No se pudo actualizar los datos';
    } catch (PDOException $e) {
        $_SESSION['message'] = $e->getMessage();
    }
    $database->cerrar();
} else {
    $_SESSION['message'] = 'Oops..! Rellene el formulario';
}


header('location: http://localhost/myproyecto/#/panelcontrol');
