<?php
require('../fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Configurar el margen izquierdo
        $this->SetLeftMargin(30);

        // Logo
        $this->Image('../../img/fondo_login.jpg', 15, 8, 33);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 20);

        // Color al título
        $this->SetTextColor(15, 107, 165);
        // Movernos a la derecha
        $this->Cell(100);
        // Título
        $this->Cell(30, 10, 'Directorio SEPE Melilla', 0, 1, 'C');
        // Salto de línea
        $this->Ln(15);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);

        $this->SetX(15);

        // Arial italic 12
        $this->SetFont('Arial', 'I', 12);

        // Alias para el número total de páginas
        $this->AliasNbPages();

        // Número de página actual
        $pageNumber = $this->PageNo();

        // Texto del pie de página con número de página
        $text = 'Página ' . $pageNumber . '/{nb}';

        // Aplicar mb_convert_encoding si es necesario
        $text = mb_convert_encoding($text, 'ISO-8859-1', 'UTF-8');

        // Agregar el texto al pie de página

        $this->Cell(0, 10, $text, 0, 0, 'C');
    }
}

// Crear un nuevo objeto PDF
$pdf = new PDF('L', 'mm', 'A4');
$pdf->AddPage();

// directorio de  Dirección Provincial
$pdf->SetFont('Arial', 'B', 16);
$text_DP = mb_convert_encoding('Dirección Provincial', 'ISO-8859-1', 'UTF-8');
$pdf->SetX(15);
$pdf->SetTextColor(15, 107, 165);
$pdf->Cell(30, 10, $text_DP, 0, 1);

//Se incluye la conexión a la base de datos directorio
include_once('../../bd/directorio/conector_BD_directorio.php');


// Consulta SQL para obtener datos de D.P. de la tabla
$sql = "SELECT * FROM directorio where oficina='D.P.'";
$result = $conn->query($sql);



// Configurar la cabecera de la tabla
$pdf->SetFont('Arial', 'B', 14);

// Configurar el color de fondo de la primera fila con letras blancas
$pdf->SetFillColor(15, 107, 165);
$pdf->SetTextColor(255, 255, 255);

$pdf->SetX(15);
$pdf->Cell(65, 9, mb_convert_encoding('Puesto', 'ISO-8859-1', 'UTF-8'), 1, 0, 'C', true);
$pdf->Cell(40, 9, mb_convert_encoding('Nombre', 'ISO-8859-1', 'UTF-8'), 1, 0, 'C', true);
$pdf->Cell(45, 9, mb_convert_encoding('Apellidos', 'ISO-8859-1', 'UTF-8'), 1, 0, 'C', true);
$pdf->Cell(30, 9, mb_convert_encoding('Teléfono', 'ISO-8859-1', 'UTF-8'), 1, 0, 'C', true);
$pdf->Cell(25, 9, mb_convert_encoding('Extensión', 'ISO-8859-1', 'UTF-8'), 1, 0, 'C', true);
$pdf->Cell(65, 9, mb_convert_encoding('Correo', 'ISO-8859-1', 'UTF-8'), 1, 0, 'C', true);
$pdf->Ln(); // Salto de línea



// Inicializar contador de filas
$counter = 0;

// Mostrar los datos de la tabla en el PDF
$pdf->SetFont('Arial', '', 11);
while ($row = $result->fetch_assoc()) {

    $counter++;

    // Comprobar si es necesario agregar una nueva página
    if ($counter % 16 == 0) {
        $pdf->AddPage(); // Agregar una nueva página
        $pdf->SetFont('Arial', '', 11); // Restablecer la fuente
    }

    $pdf->SetX(15);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(65, 8, mb_convert_encoding($row['puesto'], 'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
    $pdf->Cell(40, 8, mb_convert_encoding($row['nombre'], 'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
    $pdf->Cell(45, 8, mb_convert_encoding($row['apellidos'], 'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
    $pdf->Cell(30, 8, mb_convert_encoding($row['telefono'], 'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
    $pdf->Cell(25, 8, mb_convert_encoding($row['extension'], 'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
    $pdf->Cell(65, 8, mb_convert_encoding($row['correo'], 'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
    $pdf->Ln(); // Salto de línea

}

// directorio de Oficina Prestaciones
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$text_DP = mb_convert_encoding('Oficina de Prestaciones', 'ISO-8859-1', 'UTF-8');
$pdf->SetX(15);
$pdf->SetTextColor(15, 107, 165);
$pdf->Cell(30, 10, $text_DP, 0, 1);


// Consulta SQL para obtener datos de D.P. de la tabla
$sql = "SELECT * FROM directorio where oficina='prestaciones'";
$result = $conn->query($sql);

// Configurar la cabecera de la tabla
$pdf->SetFont('Arial', 'B', 14);

// Configurar el color de fondo de la primera fila con letras blancas
$pdf->SetFillColor(15, 107, 165);
$pdf->SetTextColor(255, 255, 255);

$pdf->SetX(15);
$pdf->Cell(65, 9, mb_convert_encoding('Puesto', 'ISO-8859-1', 'UTF-8'), 1, 0, 'C', true);
$pdf->Cell(40, 9, mb_convert_encoding('Nombre', 'ISO-8859-1', 'UTF-8'), 1, 0, 'C', true);
$pdf->Cell(45, 9, mb_convert_encoding('Apellidos', 'ISO-8859-1', 'UTF-8'), 1, 0, 'C', true);
$pdf->Cell(30, 9, mb_convert_encoding('Teléfono', 'ISO-8859-1', 'UTF-8'), 1, 0, 'C', true);
$pdf->Cell(25, 9, mb_convert_encoding('Extensión', 'ISO-8859-1', 'UTF-8'), 1, 0, 'C', true);
$pdf->Cell(65, 9, mb_convert_encoding('Correo', 'ISO-8859-1', 'UTF-8'), 1, 0, 'C', true);
$pdf->Ln(); // Salto de línea


// Inicializar contador de filas
$counter = 0;

// Mostrar los datos de la tabla en el PDF
$pdf->SetFont('Arial', '', 11);
while ($row = $result->fetch_assoc()) {

    $counter++;

    // Comprobar si es necesario agregar una nueva página
    if ($counter % 16 == 0) {
        $pdf->AddPage(); // Agregar una nueva página
        $pdf->SetFont('Arial', '', 11); // Restablecer la fuente
    }

    $pdf->SetX(15);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(65, 8, mb_convert_encoding($row['puesto'], 'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
    $pdf->Cell(40, 8, mb_convert_encoding($row['nombre'], 'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
    $pdf->Cell(45, 8, mb_convert_encoding($row['apellidos'], 'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
    $pdf->Cell(30, 8, mb_convert_encoding($row['telefono'], 'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
    $pdf->Cell(25, 8, mb_convert_encoding($row['extension'], 'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
    $pdf->Cell(65, 8, mb_convert_encoding($row['correo'], 'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
    $pdf->Ln(); // Salto de línea

}



// directorio de Oficina Empleo
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$text_DP = mb_convert_encoding('Oficina de Empleo', 'ISO-8859-1', 'UTF-8');
$pdf->SetX(15);
$pdf->SetTextColor(15, 107, 165);
$pdf->Cell(30, 10, $text_DP, 0, 1);


// Consulta SQL para obtener datos de D.P. de la tabla
$sql = "SELECT * FROM directorio where oficina='empleo'";
$result = $conn->query($sql);

// Configurar la cabecera de la tabla
$pdf->SetFont('Arial', 'B', 14);

// Configurar el color de fondo de la primera fila con letras blancas
$pdf->SetFillColor(15, 107, 165);
$pdf->SetTextColor(255, 255, 255);

$pdf->SetX(15);
$pdf->Cell(65, 9, mb_convert_encoding('Puesto', 'ISO-8859-1', 'UTF-8'), 1, 0, 'C', true);
$pdf->Cell(40, 9, mb_convert_encoding('Nombre', 'ISO-8859-1', 'UTF-8'), 1, 0, 'C', true);
$pdf->Cell(45, 9, mb_convert_encoding('Apellidos', 'ISO-8859-1', 'UTF-8'), 1, 0, 'C', true);
$pdf->Cell(30, 9, mb_convert_encoding('Teléfono', 'ISO-8859-1', 'UTF-8'), 1, 0, 'C', true);
$pdf->Cell(25, 9, mb_convert_encoding('Extensión', 'ISO-8859-1', 'UTF-8'), 1, 0, 'C', true);
$pdf->Cell(65, 9, mb_convert_encoding('Correo', 'ISO-8859-1', 'UTF-8'), 1, 0, 'C', true);
$pdf->Ln(); // Salto de línea


// Inicializar contador de filas
$counter = 0;

// Mostrar los datos de la tabla en el PDF
$pdf->SetFont('Arial', '', 11);
while ($row = $result->fetch_assoc()) {

    $counter++;

    // Comprobar si es necesario agregar una nueva página
    if ($counter % 16 == 0) {
        $pdf->AddPage(); // Agregar una nueva página
        $pdf->SetFont('Arial', '', 11); // Restablecer la fuente
    }

    $pdf->SetX(15);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(65, 8, mb_convert_encoding($row['puesto'], 'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
    $pdf->Cell(40, 8, mb_convert_encoding($row['nombre'], 'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
    $pdf->Cell(45, 8, mb_convert_encoding($row['apellidos'], 'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
    $pdf->Cell(30, 8, mb_convert_encoding($row['telefono'], 'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
    $pdf->Cell(25, 8, mb_convert_encoding($row['extension'], 'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
    $pdf->Cell(65, 8, mb_convert_encoding($row['correo'], 'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
    $pdf->Ln(); // Salto de línea

}

// directorio del COE
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$text_DP = mb_convert_encoding('COE', 'ISO-8859-1', 'UTF-8');
$pdf->SetX(15);
$pdf->SetTextColor(15, 107, 165);
$pdf->Cell(30, 10, $text_DP, 0, 1);


// Consulta SQL para obtener datos de D.P. de la tabla
$sql = "SELECT * FROM directorio where oficina='COE'";
$result = $conn->query($sql);

// Configurar la cabecera de la tabla
$pdf->SetFont('Arial', 'B', 14);

// Configurar el color de fondo de la primera fila con letras blancas
$pdf->SetFillColor(15, 107, 165);
$pdf->SetTextColor(255, 255, 255);

$pdf->SetX(15);
$pdf->Cell(65, 9, mb_convert_encoding('Puesto', 'ISO-8859-1', 'UTF-8'), 1, 0, 'C', true);
$pdf->Cell(40, 9, mb_convert_encoding('Nombre', 'ISO-8859-1', 'UTF-8'), 1, 0, 'C', true);
$pdf->Cell(45, 9, mb_convert_encoding('Apellidos', 'ISO-8859-1', 'UTF-8'), 1, 0, 'C', true);
$pdf->Cell(30, 9, mb_convert_encoding('Teléfono', 'ISO-8859-1', 'UTF-8'), 1, 0, 'C', true);
$pdf->Cell(25, 9, mb_convert_encoding('Extensión', 'ISO-8859-1', 'UTF-8'), 1, 0, 'C', true);
$pdf->Cell(65, 9, mb_convert_encoding('Correo', 'ISO-8859-1', 'UTF-8'), 1, 0, 'C', true);
$pdf->Ln(); // Salto de línea


// Inicializar contador de filas
$counter = 0;

// Mostrar los datos de la tabla en el PDF
$pdf->SetFont('Arial', '', 11);
while ($row = $result->fetch_assoc()) {

    $counter++;

    // Comprobar si es necesario agregar una nueva página
    if ($counter % 16 == 0) {
        $pdf->AddPage(); // Agregar una nueva página
        $pdf->SetFont('Arial', '', 11); // Restablecer la fuente
    }

    $pdf->SetX(15);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(65, 8, mb_convert_encoding($row['puesto'], 'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
    $pdf->Cell(40, 8, mb_convert_encoding($row['nombre'], 'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
    $pdf->Cell(45, 8, mb_convert_encoding($row['apellidos'], 'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
    $pdf->Cell(30, 8, mb_convert_encoding($row['telefono'], 'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
    $pdf->Cell(25, 8, mb_convert_encoding($row['extension'], 'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
    $pdf->Cell(65, 8, mb_convert_encoding($row['correo'], 'ISO-8859-1', 'UTF-8'), 1, 0, 'C');
    $pdf->Ln(); // Salto de línea

}




// Salida del PDF
$pdf->Output();
$conn->close();