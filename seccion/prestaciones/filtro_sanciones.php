<?php

// Agregar salida de depuración
file_put_contents('debug.log', date('Y-m-d H:i:s') . " - filtro_sanciones.php ejecutado\n", FILE_APPEND);

// Incluir el archivo de conexión a la base de datos
include_once('../../bd/dp_melilla/conector_BD_dp_melilla.php');

// Obtener los valores de los filtros
$estado = $_GET['estado'];
$fechaListado = $_POST['fechaListado'];
$dni = $_POST['dni'];
$nombre = $_POST['nombre'];
// Obtener los otros valores de los filtros

// Construir la consulta SQL base
$sql = "SELECT p.APELLIDOSNOMBRE, p.NIFDNI, p.persona_id, s.*
        FROM personas p
        JOIN sanciones s ON p.persona_id = s.persona_id
        WHERE 1=1"; // 1=1 para facilitar la construcción de la consulta con filtros opcionales

// Aplicar los filtros si tienen valor
if (!empty($estado)) {
    $sql .= " AND s.columna_estado = '$estado'";
}
if (!empty($fechaListado)) {
    $sql .= " AND s.columna_fecha_listado = '$fechaListado'";
}
if (!empty($dni)) {
    $sql .= " AND p.NIFDNI = '$dni'";
}
if (!empty($nombre)) {
    $sql .= " AND p.APELLIDOSNOMBRE = '$nombre'";
}
// Aplicar los otros filtros necesarios

// Ejecutar la consulta
$result = $conn->query($sql);

// Comprobar si hay resultados
if ($result->num_rows > 0) {
    // Imprimir el encabezado de la tabla
    echo "<thead>";
    echo "<tr>";
    echo "<th>Columna1</th>";
    echo "<th>Columna2</th>";
    // Imprimir los encabezados de las otras columnas necesarias
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    // Imprimir los resultados
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        // Imprimir cada columna de la fila
        echo "<td>" . $row['columna1'] . "</td>";
        echo "<td>" . $row['columna2'] . "</td>";
        // Imprimir las otras columnas necesarias
        echo "</tr>";
    }

    echo "</tbody>";
} else {
    // Si no hay resultados, imprimir un mensaje indicando que no se encontraron datos
    echo "<p>No se encontraron resultados.</p>";
}

// Cerrar la conexión a la base de datos
$conn->close();

header('Location: http://localhost/myproyecto/#/inventario/DP');
