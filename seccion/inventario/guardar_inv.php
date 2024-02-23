<?php

session_start(); // Inicia la sesión si aún no se ha hecho
include_once('../../bd/panelcontrol/conector_BD_usuarios.php');

if (isset($_POST['guardar_PC'])) {
    $database = new ConectarBD_PC();
    $db = $database->abrir();

    try {
        $stmt2 = $db->prepare("INSERT INTO usuarios (nombre, apellido, usuario, perfil, clave, estado, directorio, inventario)
        VALUES (:nombrePC, :apellidoPC, :usuarioPC, :perfilPC, :clavePC, :estadoPC, :directorioPC, :inventarioPC)");

        // Verifica que las variables POST estén definidas y no son nulas
        $nombrePC = $_POST['nombrePC'] ?? '';
        $apellidoPC = $_POST['apellidoPC'] ?? '';
        $usuarioPC = $_POST['usuarioPC'] ?? '';
        $perfilPC = $_POST['perfilPC'] ?? '';
        $clavePC = $_POST['clavePC'] ?? '';
        $estadoPC = $_POST['estadoPC'] ?? '';
        $directorioPC = $_POST['directorioPC'] ?? '';
        $inventarioPC = $_POST['inventarioPC'] ?? '';


        // Verifica las variables POST (para depuración)
        var_dump($_POST);


        if ($nombrePC && $apellidoPC && $usuarioPC && $perfilPC && $clavePC && $estadoPC && $directorioPC && $inventarioPC) {
            /* ... (repite para las demás variables) */
            // Ejecuta la consulta y verifica si se realizó correctamente
            $success = $stmt2->execute(array(
                ':nombrePC' => $nombrePC,
                ':apellidoPC' => $apellidoPC,
                ':usuarioPC' => $usuarioPC,
                ':perfilPC' => $perfilPC,
                ':clavePC' => $clavePC,
                ':estadoPC' => $estadoPC,
                ':directorioPC' => $directorioPC,
                ':inventarioPC' => $inventarioPC
            ));

            // Verifica el éxito de la ejecución (para depuración)
            var_dump($success);

            $_SESSION['message'] = $success ? 'Usuario agregado' : 'Error al insertar';
        } else {
            $_SESSION['message'] = 'Rellene el formulario correctamente';
        }
    } catch (PDOException $e) {
        // Verifica el mensaje de error (para depuración)
        var_dump($e->getMessage());
        $_SESSION['message'] = 'Error al ejecutar la consulta: ' . $e->getMessage();
    }

    $database->cerrar();
} else {
    $_SESSION['message'] = 'Rellene el formulario';
}

// Redirige al usuario a la página de panel de control
header('location: http://localhost/myproyecto/#/panelcontrol');
exit;