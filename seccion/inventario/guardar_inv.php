<?php

session_start(); // Inicia la sesión si aún no se ha hecho
include_once('../../bd/inventario/conector_BD_inventario.php');

if (isset($_POST['guardar_INV'])) {
    $database = new ConectarBD_INV();
    $db = $database->abrir();

    try {
        $stmt2 = $db->prepare("INSERT INTO inventario (cod_elemento, modelo, n_serie, ip, proveedor, situacion, estado, centro, f_inicio_mto, f_fin_mto)
        VALUES (:cod_elemento, :modelo, :n_serie, :ip, :proveedor, :situacion, :estado, :centro, :f_inicio_mto, :f_fin_mto)");

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

        if ($cod_elementoINV && $modeloINV && $n_serieINV && $ipINV && $proveedorINV && $situacionINV && $estadoINV && $centroINV && $f_inicio_mtoINV && $f_fin_mtoINV) {
            $success = $stmt2->execute(array(
                ':cod_elemento' => $cod_elementoINV,
                ':modelo' => $modeloINV,
                ':n_serie' => $n_serieINV,
                ':ip' => $ipINV,
                ':proveedor' => $proveedorINV,
                ':situacion' => $situacionINV,
                ':estado' => $estadoINV,
                ':centro' => $centroINV,
                ':f_inicio_mto' => $f_inicio_mtoINV,
                ':f_fin_mto' => $f_fin_mtoINV
            ));

            $_SESSION['message'] = $success ? 'Elemento agregado' : 'Error al insertar';
        } else {
            $_SESSION['message'] = 'Rellene el formulario correctamente';
        }
    } catch (PDOException $e) {
        $_SESSION['message'] = 'Error al ejecutar la consulta: ' . $e->getMessage();
    }

    $database->cerrar();
} else {
    $_SESSION['message'] = 'Rellene el formulario';
}
// Tu código para procesar el formulario y realizar la inserción en la base de datos aquí...

// Redirección basada en el valor de 'centro_INV'
if ($_POST['centroINV'] == "COE") {
    header('Location: http://localhost/myproyecto/#/inventario/COE');
    exit(); // Es una buena práctica incluir exit() después de una redirección para asegurarte de que el script se detenga aquí.
} elseif ($_POST['centroINV'] == "OE") {
    header('Location: http://localhost/myproyecto/#/inventario/OE');
    exit();
} else {
    header('Location: http://localhost/myproyecto/#/inventario/DP');
    exit();
}
