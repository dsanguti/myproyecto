<?php
session_start();
?>

<?php include_once('../../bd/directorio/conector_BD_directorio.php');

$registros_por_pagina = 4;

$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

$result = $conn->query("SELECT COUNT(*) as total FROM directorio");
$row = $result->fetch_assoc();
$total_registros = $row['total'];
$total_paginas = ceil($total_registros / $registros_por_pagina);

// Construir los enlaces de paginación
$pagination = '';

if ($total_paginas > 1) {
    $pagination .= '<li class="page-item ' . ($pagina <= 1 ? 'disabled' : '') . '">';
    $pagination .= '<a class="page-link" href="#" data-page="' . ($pagina - 1) . '" aria-label="Anterior">';
    $pagination .= '<span aria-hidden="true">&laquo; Anterior</span>';
    $pagination .= '</a>';
    $pagination .= '</li>';

    for ($i = 1; $i <= $total_paginas; $i++) {
        $active = ($i == $pagina) ? 'active' : '';
        $pagination .= '<li class="page-item ' . $active . '"><a class="page-link" href="#" data-page="' . $i . '">' . $i . '</a></li>';
    }

    $pagination .= '<li class="page-item' . ($pagina >= $total_paginas ? 'disabled' : '') . '">';
    $pagination .= '<a class="page-link" href="#" data-page="' . ($pagina + 1) . '" aria-label="Siguiente">';
    $pagination .= '<span aria-hidden="true">Siguiente &raquo;</span>';
    $pagination .= '</a>';
    $pagination .= '</li>';
}

echo $pagination;
