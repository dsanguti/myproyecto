<?php
// filtro_sanciones.php

// Realiza la conexión con la base de datos Directorio
include_once('../../bd/dp_melilla/conector_BD_dp_melilla.php');

// Recibe los valores filtrados por POST
$estado = $_POST['estado'];
$fechaListado = $_POST['fechaListado'];
$dni = $_POST['dni'];
$nombre = $_POST['nombre'];
// Añade más variables según sea necesario para los demás campos de filtrado

// Construye la consulta SQL basada en los valores recibidos
$sql = "SELECT p.APELLIDOSNOMBRE, p.NIFDNI, p.persona_id, s.*
        FROM personas p
        JOIN sanciones s ON p.persona_id = s.persona_id
        WHERE 1=1"; // Condición base

// Añade condiciones a la consulta según los valores recibidos
if (!empty($estado)) {
    $sql .= " AND ts_idEstado = '$estado'";
}
if (!empty($fechaListado)) {
    $sql .= " AND ts_fecha_listado = '$fechaListado'";
}
// Añade más condiciones según sea necesario para los demás campos de filtrado

// Ejecuta la consulta
$result = $conn->query($sql);

// Prepara un array para almacenar los resultados
$filteredData = array();

// Recorre los resultados y los almacena en el array
while ($row = $result->fetch_assoc()) {
    $filteredData[] = $row;
}

// Devuelve los datos en formato JSON
echo json_encode($filteredData);
