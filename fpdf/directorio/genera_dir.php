<?php
require('../fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image('../../img/fondo_login.jpg', 10, 8, 33);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(30, 10, 'Directorio SEPE Melillla', 0, 1, 'C');
        // Salto de línea
        $this->Ln(20);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}




//Se incluye la conexión a la base de datos directorio
include_once('../../bd/directorio/conector_BD_directorio.php');


// Consulta SQL para obtener datos de la tabla
$sql = "SELECT * FROM directorio";
$result = $conn->query($sql);

// Crear un nuevo objeto PDF
$pdf = new PDF('L', 'mm', 'A4');
$pdf->AddPage();

// Configurar la cabecera de la tabla
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(58, 10, mb_convert_encoding('Puesto', 'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
$pdf->Cell(30, 10, mb_convert_encoding('Nombre', 'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
$pdf->Cell(40, 10, mb_convert_encoding('Apellidos', 'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
$pdf->Cell(28, 10, mb_convert_encoding('Oficina', 'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
$pdf->Cell(25, 10, mb_convert_encoding('Teléfono', 'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
$pdf->Cell(25, 10, mb_convert_encoding('Extensión', 'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
$pdf->Cell(55, 10, mb_convert_encoding('Correo', 'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
$pdf->Ln(); // Salto de línea

// Mostrar los datos de la tabla en el PDF
$pdf->SetFont('Arial', '', 10);
while ($row = $result->fetch_assoc()) {
    $pdf->Cell(58, 10, mb_convert_encoding($row['puesto'], 'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
    $pdf->Cell(30, 10, mb_convert_encoding($row['nombre'], 'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
    $pdf->Cell(40, 10, mb_convert_encoding($row['apellidos'], 'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
    $pdf->Cell(28, 10, mb_convert_encoding($row['oficina'], 'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
    $pdf->Cell(25, 10, mb_convert_encoding($row['telefono'], 'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
    $pdf->Cell(25, 10, mb_convert_encoding($row['extension'], 'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
    $pdf->Cell(55, 10, mb_convert_encoding($row['correo'], 'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
    $pdf->Ln(); // Salto de línea
}


// Salida del PDF
$pdf->Output();
$conn->close();