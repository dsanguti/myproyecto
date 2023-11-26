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


                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="display:none;" scope="col">id</th>
                                <th style="text-align:center;" scope="col">Puesto</th>
                                <th style="text-align:center;" scope="col">Nombre</th>
                                <th style="text-align:center;" scope="col">Apellidos</th>
                                <th style="text-align:center;" scope="col">Oficina</th>
                                <th style="text-align:center;" scope="col">Teléfono</th>
                                <th style="text-align:center;" scope="col">Extensión</th>
                                <th style="text-align:center;" scope="col">Correo</th>

                                <?php
                                if ($_SESSION["directorio"] === "editar") {
                                ?>
                                <th style="text-align:center;color:orange;" scope="col">Edit</th>
                                <th style="text-align:center;color:red;" scope="col">Del</th>
                                <?php
                                }
                                ?>



                            </tr>
                        </thead>
                        <tbody>
                            <!-- Se realiza la conexión con la basde de datos Directorio -->
                            <?php include_once('../../bd/directorio/conector_BD_directorio.php');

                            try {

                                //Llama a todas las personas del directorio
                                $sql = 'SELECT * FROM directorio';
                                $sentencia = $pdo->prepare($sql);
                                $sentencia->execute();

                                $resultado = $sentencia->fetchAll();

                                //Para la paginación
                                $pers_x_pagina = 2;
                                $sql_total_rows = $sentencia->rowCount();
                                $paginas = $sql_total_rows / $pers_x_pagina;
                                $paginas = ceil($paginas);

                                //Obtener número de página actual
                                $pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
                                $pagina_actual = ($pagina_actual > 0 && $pagina_actual <= $paginas) ? $pagina_actual : 1;
                                $offset = ($pagina_actual - 1) * $pers_x_pagina;

                                //Consulta SQL con limitación de resultados según la página actual
                                //$sql2 = "SELECT * FROM directorio LIMIT $offset, $pers_x_pagina";

                                $sql2 = "SELECT * FROM directorio LIMIT :offset, :pers_x_pagina";
                                $sql_personas = $pdo->prepare($sql2);
                                $sql_personas->bindParam(':offset', $offset, PDO::PARAM_INT);
                                $sql_personas->bindParam(':pers_x_pagina', $pers_x_pagina, PDO::PARAM_INT);
                                $sql_personas->execute();
                                $sql_personas = $sql_personas->fetchAll();

                                //Para poner cada campo en su fila desde BD
                                foreach ($sql_personas as $row) {
                            ?>
                            <tr class="celda_tabla_directorio">

                                <td style='display:none;'><?php echo $row['id'] ?></td>
                                <td style='text-align:center;'><?php echo $row['puesto'] ?>
                                </td>
                                <td style='text-align:center;'><?php echo $row['nombre'] ?>
                                </td>
                                <td style='text-align:center;'>
                                    <?php echo $row['apellidos'] ?></td>
                                <td style='text-align:center;'><?php echo $row['oficina'] ?>
                                </td>
                                <td style='text-align:center;'><?php echo $row['telefono'] ?>
                                </td>
                                <td style='text-align:center;'>
                                    <?php echo $row['extension'] ?></td>
                                <td style='text-align:center;'><?php echo $row['correo'] ?>
                                </td>
                                <?php

                                        if ($_SESSION["directorio"] === "editar") {
                                        ?>
                                <td style='text-align:center;'> <button id='btn-edit-directorio' class='edit-table'
                                        data-bs-toggle='modal'
                                        data-bs-target='#modal-edit-directorio<?php echo $row['id']; ?>'>
                                        <i class='bi bi-pencil-square'></i></button>
                                <td style='text-align:center;'> <button id='btn-del-directorio' class='del-table'
                                        data-bs-toggle='modal'
                                        data-bs-target='#modal-del-directorio<?php echo $row['id']; ?>'><i
                                            class='bi bi-trash'></i></button>
                                    <!-- El modal de editar-->
                                    <?php include("./modal/modal_editar.php"); ?>

                                    <!-- El modal de Eliminar-->
                                    <?php include("./modal/modal_eliminar.php");
                                                ?>

                                    <?php
                                        }
                                            ?>

                            </tr>

                            <?php
                                }
                            } catch (PDOException $e) {
                                echo 'Error con la conexión: ' . $e->getMessage();
                            }

                            ?>

                        </tbody>

                    </table>

                    <!--PAGINACIÓN DE LA TABLA-->
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li class="page-item <?php echo $pagina_actual <= 1 ? 'disabled' : '' ?>">
                                <a class="page-link"
                                    href="#/directorio?pagina=<?php echo $pagina_actual . "-" . 1 ?>">Anterior</a>
                            </li>

                            <?php for ($i = 0; $i < $paginas; $i++) : ?>
                            <li class="page-item <?php echo $pagina_actual == $i + 1 ? 'active' : '' ?>">
                                <a class="page-link"
                                    href="#/directorio?pagina=<?php echo $i + 1 ?>"><?php echo $i + 1 ?></a>
                            </li>
                            <?php endfor ?>

                            <li class="page-item <?php echo $pagina_actual >= $paginas ? 'disabled' : '' ?>">
                                <a class="page-link"
                                    href="#/directorio?pagina=<?php echo $pagina_actual + 1 ?>">Siguiente</a>
                            </li>
                        </ul>


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