<?php
require('fpdf/fpdf.phpf');

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "directorio";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

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
    $pdf->Cell(40, 10, $row['Puesto'], 1);
    $pdf->Cell(60, 10, $row['Nombre'], 1);
    $pdf->Cell(40, 10, $row['Apellidos'], 1);
    $pdf->Cell(40, 10, $row['Oficina'], 1);
    $pdf->Cell(40, 10, $row['Teléfono'], 1);
    $pdf->Cell(40, 10, $row['Extensión'], 1);
    $pdf->Cell(40, 10, $row['Correo'], 1);
    $pdf->Ln(); // Salto de línea
}

// Salida del PDF
$pdf->Output();
$conn->close();
