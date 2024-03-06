<?php

session_start(); // Inicia la sesión si aún no se ha hecho
include_once('../../bd/inventario/conector_BD_inventario.php');

if (isset($_POST['guardar_INV'])) {
    $database = new ConectarBD_INV();
    $db = $database->abrir();

    try {
        $stmt2 = $db->prepare("INSERT INTO inventario (cod_elemento, modelo, n_serie, ip, situacion, estado, centro, f_inicio_mto, f_fin_mto)
        VALUES (:cod_elemento, :modelo, :n_serie, :ip, :proveedor_INV, :situacion_INV, :estadoINV, :centroINV, :f_inicio_mto_INV, :f_fin_mto_INV)");

        // Verifica que las variables POST estén definidas y no son nulas
        $cod_elementoINV = $_POST['cod_elemento'] ?? '';
        $modeloINV = $_POST['modelo'] ?? '';
        $n_serieINV = $_POST['n_serie'] ?? '';
        $ipINV = $_POST['ip'] ?? '';
        $proveedorINV = $_POST['proveedor_INV'] ?? '';
        $situacionINV = $_POST['situacion_INV'] ?? '';
        $estadoINV = $_POST['estadoINV'] ?? '';
        $centroINV = $_POST['centroINV'] ?? '';
        $f_inicio_mtoINV = $_POST['f_inicio_mto_INV'] ?? '';
        $f_fin_mtoINV = $_POST['f_fin_mto_INV'] ?? '';



        // Verifica las variables POST (para depuración)
        var_dump($_POST);


        if ($cod_elementoINV && $modeloINV && $n_serieINV && $ipINV && $proveedorINV && $situacionINV && $estadoINV && $centroINV && $f_inicio_mtoINV && $f_fin_mtoINV) {
            /* ... (repite para las demás variables) */
            // Ejecuta la consulta y verifica si se realizó correctamente
            $success = $stmt2->execute(array(
                ':cod_elmento' => $cod_elementoINV,
                ':modelo' => $modeloINV,
                ':n_serie' => $n_serieINV,
                ':ip' => $ipINV,
                ':proveedor_INV' => $proveedorINV,
                ':situacion_INV' => $situacionINV,
                ':estadoINV' => $estadoINV,
                ':centroINV' => $centroINV,
                ':f_inicio_mto_INV' => $f_inicio_mtoINV,
                ':f_fin_mto_INV' => $f_fin_mtoINV
            ));

            // Verifica el éxito de la ejecución (para depuración)
            var_dump($success);

            $_SESSION['message'] = $success ? 'elemento agregado' : 'Error al insertar';
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

// Redirige al usuario a la página de INVENTARIO subseccion correspondiente
if ($_POST['centro_INV'] == "COE") {
    header('Location: http://localhost/myproyecto/#/inventario/COE');
} elseif ($_POST['centro_INV'] == "OE") {
    header('Location: http://localhost/myproyecto/#/inventario/OE');
} else {
    header('Location: http://localhost/myproyecto/#/inventario/DP');
}
exit;
