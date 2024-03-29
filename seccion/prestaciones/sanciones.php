<?php
session_start();
?>
<div class="container-fluid p-0">
    <div class="row">
        <div class="col mt-4 mb-4">
            <h2 class="titulo_seccion" style="text-align:center;">Sanciones de prestaciones</h2>
        </div>
    </div>
    <div class="row">
        <div style="padding-left:30px; padding-right:30px;" class="container-fluid">
            <div class="row mb-2 flex-row d-flex justify-content-between">
                <div class="col-6 d-flex">
                    <?php
                    if ($_SESSION["sanciones"] === "editar") {
                    ?>
                        <div class="col d-flex">
                            <a href="#insertarModal" class="btn btn-primary" data-bs-toggle="modal"><i class="bi bi-plus"></i>
                                Nuevo</a>

                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div style="padding-left:30px; padding-right:30px;" class="container-fluid">

            <div class="row">
                <div class="col">
                    <!-- Se realiza la conexión con la basde de datos Directorio -->
                    <?php include_once('../../bd/dp_melilla/conector_BD_dp_melilla.php'); ?>


                    <div id="tabla_directorio">

                        <?php include_once('../../bd/dp_melilla/conector_BD_dp_melilla.php');

                        //Obtener el número total de registros 
                        $result = $conn->query("SELECT * FROM sanciones");


                        ?>

                        <div class="table-responsive table-fixed">
                            <table class="table table-striped table-hover" id="table-directorio">
                                <!-- Las cabeceras de la tabla directorio-->
                                <thead style="position: sticky;top:0;">
                                    <tr>
                                        <th style="display:none;" scope="col">id</th>
                                        <th style="background-color:#0f6ba5;color: #fff;text-align:center;" scope="col">
                                            Estado</th>
                                        <th style="background-color:#0f6ba5;color: #fff;text-align:center;" scope="col">
                                            F.Listado</th>
                                        <th style="background-color:#0f6ba5;color: #fff;text-align:center;" scope="col">
                                            DNI/NIE</th>
                                        <th style="background-color:#0f6ba5;color: #fff;text-align:center;" scope="col">
                                            Apellidos y Nombre</th>
                                        <th style="background-color:#0f6ba5;color: #fff;text-align:center;" scope="col">
                                            Infr.Varias</th>
                                        <th style="background-color:#0f6ba5;color: #fff;text-align:center;" scope="col">
                                            Tipo Sanción</th>
                                        <th style="background-color:#0f6ba5;color: #fff;text-align:center;" scope="col">
                                            F. Baja Sanción</th>
                                        <th style="background-color:#0f6ba5;color: #fff;text-align:center;" scope="col">
                                            F. AR Baja</th>ç
                                        <th style="background-color:#0f6ba5;color: #fff;text-align:center;" scope="col">
                                            F. Fin Plazo Aleg.</th>
                                        <th style="background-color:#0f6ba5;color: #fff;text-align:center;" scope="col">
                                            NA Comunicación</th>
                                        <th style="background-color:#0f6ba5;color: #fff;text-align:center;" scope="col">
                                            Se puede Resolver</th>
                                        <th style="background-color:#0f6ba5;color: #fff;text-align:center;" scope="col">
                                            Estimada</th>
                                        <th style="background-color:#0f6ba5;color: #fff;text-align:center;" scope="col">
                                            Control Nómina</th>
                                        <th style="background-color:#0f6ba5;color: #fff;text-align:center;" scope="col">
                                            Motivo</th>


                                        <?php
                                        if ($_SESSION["directorio"] === "editar") {
                                        ?>
                                            <th style="background-color:#0f6ba5;color: #fff;text-align:center;color:orange;" scope="col">Edit</th>
                                            <th style="background-color:#0f6ba5;color: #fff;text-align:center;color:red;" scope="col">Del</th>
                                        <?php
                                        }
                                        ?>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $result->fetch_assoc()) : ?>
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
                                                <td style='text-align:center;'> <button id='btn-edit-directorio' class='edit-table' data-bs-toggle='modal' data-bs-target='#modal-edit-directorio<?php echo $row['id']; ?>'>
                                                        <i class='bi bi-pencil-square'></i></button>
                                                <td style='text-align:center;'> <button id='btn-del-directorio' class='del-table' data-bs-toggle='modal' data-bs-target='#modal-del-directorio<?php echo $row['id']; ?>'><i class='bi bi-trash'></i></button>
                                                    <!-- El modal de editar-->
                                                    <?php include("./modal/modal_editar.php"); ?>

                                                    <!-- El modal de Eliminar-->
                                                    <?php include("./modal/modal_eliminar.php");
                                                    ?>

                                                <?php
                                            }
                                                ?>

                                        </tr>

                                    <?php endwhile; ?>

                                </tbody>
                            </table>
                        </div>

                    </div>

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
    <div class="row">
        <div class="col mt-3">

            <a href="http://localhost/myproyecto/fpdf/directorio/genera_dir.php" class="col mytooltip" target=”_blank” role="button" data-tooltip="Genera un PDF del Directorio"> <i id="icon-pdf-dir" class="bi bi-file-earmark-pdf-fill"></i></a>




        </div>
    </div>

</div>
</div>