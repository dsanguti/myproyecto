<?php
require('../fpdf.php');

//Se incluye la conexión a la base de datos directorio
include_once('../../bd/directorio/conector_BD_directorio.php');


// Consulta SQL para obtener datos de la tabla
$sql = "SELECT * FROM directorio";
$result = $conn->query($sql);

// Crear un nuevo objeto FPDF
$pdf = new FPDF();
$pdf->AddPage();

// Configurar la cabecera de la tabla
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(40, 10, 'Puesto', 1);
$pdf->Cell(60, 10, 'Nombre', 1);
$pdf->Cell(40, 10, 'Apellidos', 1);
$pdf->Cell(40, 10, 'Oficina', 1);
$pdf->Cell(40, 10, 'Teléfono', 1);
$pdf->Cell(40, 10, 'Extensión', 1);
$pdf->Cell(40, 10, 'Correo', 1);
$pdf->Ln(); // Salto de línea

// Mostrar los datos de la tabla en el PDF
$pdf->SetFont('Arial', '', 12);
while ($row = $result->fetch_assoc()) {
    $pdf->Cell(40, 10, $row['puesto'], 1);
    $pdf->Cell(60, 10, $row['nombre'], 1);
    $pdf->Cell(40, 10, $row['apellidos'], 1);
    $pdf->Cell(40, 10, $row['oficina'], 1);
    $pdf->Cell(40, 10, $row['telefono'], 1);
    $pdf->Cell(40, 10, $row['extension'], 1);
    $pdf->Cell(40, 10, $row['correo'], 1);
    $pdf->Ln(); // Salto de línea
}

// Salida del PDF
$pdf->Output();
$conn->close();