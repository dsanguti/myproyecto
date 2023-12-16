<?php
session_start();
?>
<div class="container">
    <div class="row">
        <div class="col mt-4">
            <h2 style="text-align:center;">Directorio</h2>
        </div>
    </div>
    <div class="row">
        <div class="container">
            <div class="row mb-2 flex-row d-flex justify-content-between">
                <?php
                if ($_SESSION["directorio"] === "editar") {
                ?>
                <div class="col mt-4">
                    <a href="#insertarModal" class="btn btn-primary" data-bs-toggle="modal"><i class="bi bi-plus"></i>
                        Nuevo</a>
                </div>
                <?php
                }
                ?>


                <div class="col mt-4 d-flex justify-content-end">
                    <form role="search">
                        <input style="max-width:450px;" class="form-control me-2" type="search"
                            placeholder="Buscar en directorio" id="buscarDirectorio" aria-label="Search">

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="container">

            <div class="row">
                <div class="col">
                    <!-- Se realiza la conexión con la basde de datos Directorio -->
                    <?php include_once('../../bd/directorio/conector_BD_directorio.php');



                    //Obtener el número total de registros y calcular el número total de páginas,cálculos para la paginación de la tabla directorio
                    $result = $conn->query("SELECT COUNT(*) as total FROM directorio");
                    $row = $result->fetch_assoc();
                    $total_registros = $row['total'];
                    $registros_por_pagina = 2;
                    $total_paginas = ceil($total_registros / $registros_por_pagina);


                    //Obtener número de página actual
                    $pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
                    $pagina_actual = ($pagina_actual > 0 && $pagina_actual <= $total_paginas) ? $pagina_actual : 1;
                    $offset = ($pagina_actual - 1) * $registros_por_pagina;


                    //Consulta SQL con limitación de resultados según la página actual
                    $query = "SELECT * FROM directorio LIMIT $offset, $registros_por_pagina";
                    $result = $conn->query($query);

                    ?>

                    <!--Dónde se cargará los datos del directorio-->
                    <table class="table table-striped table-hover" id="tabla-directorio"></table>

                    <!--Se cargará la Paginación de la tabla directorio-->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination" id="pagination-directorio"></ul>
                    </nav>
                </div>
                <!-- El modal de editar-->
                <?php
                include("../directorio/modal/modal_editar.php");
                ?>

                <!-- El modal de Eliminar-->
                <?php
                include("../directorio/modal/modal_eliminar.php");
                ?>

                <!-- El modal para insertar un nuevo contacto en el Directorio-->
                <?php include("../directorio/modal/modal_insertar.php"); ?>

            </div>


        </div>


    </div>


    <!--<td style='text-align:center;'>   <button class='edit-table' data-bs-toggle='modal' data-bs-target='#modal-edit-directorio'> <i class='bi bi-pencil-square'></i></button>
                            <td style='text-align:center;'>   <button class='del-table' data-bs-toggle='modal' data-bs-target='#modal-del-directorio'><i class='bi bi-trash'></i></button>-->




</div>
</div>