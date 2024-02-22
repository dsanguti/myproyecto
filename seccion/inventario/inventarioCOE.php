<?php
session_start();
?>
<div class="container">
    <div style="margin:0px; padding:0px;" class="row">
        <!-- Contenido de la fila adicional al principio -->
        <div class="col-md-12 titulo_seccion" style="padding-top:22px;padding-bottom:40px; text-align: center;">
            <h2>Inventario del COE</h2>
        </div>

    </div>
    <div class="row">
        <div class="container">
            <div class="row mb-2 flex-row d-flex justify-content-between">
                <div class="col-6 d-flex">
                    <?php
                    if ($_SESSION["inventario"] === "editar") {
                    ?>
                        <div class="col d-flex">
                            <a href="#insertarModal" class="btn btn-primary" data-bs-toggle="modal"><i class="bi bi-plus"></i>
                                Nuevo</a>

                        </div>
                    <?php
                    }
                    ?>

                </div>

                <div class="col-6 d-flex justify-content-end">
                    <form class="d-flex flex-row" role="search">
                        <div class="input-container-search">
                            <input style="max-width:450px;" class="form-control me-2 input-dir-search" type="search" placeholder="Buscar en inventario COE" id="buscarDirectorio" aria-label="Search">
                            <i id="xSearchDir" class="bi bi-x-circle clear-search-dir icon-clear-dir" style="padding-right: 7px;" onclick="CerrarIconDirBuscar()"></i>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="container">

            <div class="row">
                <div class="col">
                    <!-- Se realiza la conexión con la basde de datos inventario -->

                    <div id="tabla_inventario_COE">

                        <?php include_once('../../bd/inventario/conector_BD_inventario.php');

                        //Obtener el número total de registros 
                        $result = $conn->query("SELECT * FROM inventario where centro='COE'");


                        ?>

                        <div class="table-responsive table-fixed">
                            <table class="table table-striped table-hover" id="table-directorio">
                                <!-- Las cabeceras de la tabla directorio-->
                                <thead style="position: sticky;top:0;">
                                    <tr>
                                        <th style="display:none;" scope="col">id</th>
                                        <th style="background-color:#0f6ba5;color: #fff;text-align:center;" scope="col">
                                            Cod. Elemento</th>
                                        <th style="background-color:#0f6ba5;color: #fff;text-align:center;" scope="col">
                                            Modelo</th>
                                        <th style="background-color:#0f6ba5;color: #fff;text-align:center;" scope="col">
                                            Nº Serie</th>
                                        <th style="background-color:#0f6ba5;color: #fff;text-align:center;" scope="col">
                                            IP</th>
                                        <th style="background-color:#0f6ba5;color: #fff;text-align:center;" scope="col">
                                            Situación</th>
                                        <th style="background-color:#0f6ba5;color: #fff;text-align:center;" scope="col">
                                            Estado</th>
                                        <th style="background-color:#0f6ba5;color: #fff;text-align:center;" scope="col">
                                            F.Inicio Mto.</th>
                                        <th style="background-color:#0f6ba5;color: #fff;text-align:center;" scope="col">
                                            F.Fin Mto.</th>
                                        <th style="background-color:#0f6ba5;color: #fff;text-align:center;" scope="col">
                                            Proveedor</th>

                                        <?php
                                        if ($_SESSION["inventario"] === "editar") {
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
                                            <td style='text-align:center;'><?php echo $row['cod_elemento'] ?>
                                            </td>
                                            <td style='text-align:center;'><?php echo $row['modelo'] ?>
                                            </td>
                                            <td style='text-align:center;'>
                                                <?php echo $row['n_serie'] ?></td>
                                            <td style='text-align:center;'><?php echo $row['ip'] ?>
                                            </td>
                                            <td style='text-align:center;'><?php echo $row['situacion'] ?>
                                            </td>
                                            <td style='text-align:center;'>
                                                <?php echo $row['estado'] ?></td>
                                            <td style='text-align:center;'><?php echo $row['f_inicio_mto'] ?>
                                            </td>
                                            <td style='text-align:center;'><?php echo $row['f_fin_mto'] ?>
                                            </td>
                                            <td style='text-align:center;'><?php echo $row['proveedor'] ?>
                                            </td>
                                            <?php

                                            if ($_SESSION["inventario"] === "editar") {
                                            ?>
                                                <td style='text-align:center;'> <button id='btn-edit-inventario' class='edit-table' data-bs-toggle='modal' data-bs-target='#modal-edit-inventario<?php echo $row['id']; ?>'>
                                                        <i class='bi bi-pencil-square'></i></button>
                                                <td style='text-align:center;'> <button id='btn-del-inventario' class='del-table' data-bs-toggle='modal' data-bs-target='#modal-del-inventario<?php echo $row['id']; ?>'><i class='bi bi-trash'></i></button>
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