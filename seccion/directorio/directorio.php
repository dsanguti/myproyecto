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
                            $database = new ConectarBD();
                            $db = $database->abrir();
                            try {
                                $sql = 'SELECT * FROM directorio';

                                //Para la paginación
                                $pers_x_pagina = 3;
                                $sql_total_rows = $db->prepare($sql);
                                $sql_total_rows->execute();
                                $sql_count_rows = $sql_total_rows->rowCount();
                                echo $sql_count_rows;
                                $total_pers_directorio = $db->query($sql);

                                //Para poner cada campo en su fila desde BD
                                foreach ($db->query($sql) as $row) {
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
                            $database->cerrar();
                            ?>
                        </tbody>

                    </table>

                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">
                            <li class="page-item"><a class="page-link" href="#">Anterior</a></li>

                            <li class="page-item"><a class="page-link" href="#">1</a></li>


                            <li class="page-item"><a class="page-link" href="#">Siguiente</a></li>
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