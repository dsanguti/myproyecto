<?php
session_start();
?>
<div class="container">
    <div class="row">
        <div class="col mt-4 mb-4">
            <h2 class="titulo_seccion" style="text-align:center;">Panel de Control</h2>
        </div>
    </div>
    <div class="row">
        <div class="container">
            <div class="row mb-2 flex-row d-flex justify-content-between">
                <div class="col-6 d-flex">


                    <div class="col d-flex">
                        <a href="#insertarModal_PC" class="btn btn-primary" data-bs-toggle="modal"><i
                                class="bi bi-plus"></i>
                            Nuevo</a>

                    </div>


                </div>

                <div class="col-6 d-flex justify-content-end">
                    <form class="d-flex flex-row" role="search">
                        <div class="input-container-search">
                            <input style="max-width:450px;" class="form-control me-2 input-dir-search" type="search"
                                placeholder="Buscar en panel control" id="buscarDirectorio" aria-label="Search">
                            <i id="xSearchDir" class="bi bi-x-circle clear-search-dir icon-clear-dir"
                                style="padding-right: 7px;" onclick="CerrarIconDirBuscar()"></i>
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
                    <!-- Se realiza la conexión con la basde de datos Directorio -->
                    <?php include_once('../../bd/panelcontrol/conector_BD_usuarios.php'); ?>


                    <div id="tabla_panel_control">

                        <?php

                        //Obtener el número total de registros 
                        $result = $conn->query("SELECT * FROM usuarios");


                        ?>

                        <div class="table-responsive table-fixed">
                            <table class="table table-striped table-hover" id="table-directorio">
                                <!-- Las cabeceras de la tabla directorio-->
                                <thead style="position: sticky;top:0;">
                                    <tr>
                                        <th style="display:none;" scope="col">id</th>
                                        <th style="background-color:#0f6ba5;color: #fff;text-align:center;" scope="col">
                                            Nombre</th>
                                        <th style="background-color:#0f6ba5;color: #fff;text-align:center;" scope="col">
                                            Apellido</th>
                                        <th style="background-color:#0f6ba5;color: #fff;text-align:center;" scope="col">
                                            Usuario</th>
                                        <th style="background-color:#0f6ba5;color: #fff;text-align:center;" scope="col">
                                            Clave</th>
                                        <th style="background-color:#0f6ba5;color: #fff;text-align:center;" scope="col">
                                            Perfil</th>
                                        <th style="background-color:#0f6ba5;color: #fff;text-align:center;" scope="col">
                                            Directorio</th>
                                        <th style="background-color:#0f6ba5;color: #fff;text-align:center;" scope="col">
                                            Inventario</th>
                                        <th style="background-color:#0f6ba5;color: #fff;text-align:center;" scope="col">
                                            Estado</th>
                                        <th style="background-color:#0f6ba5;color: #fff;text-align:center;color:orange;"
                                            scope="col">Edit</th>
                                        <th style="background-color:#0f6ba5;color: #fff;text-align:center;color:red;"
                                            scope="col">Del</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $result->fetch_assoc()) : ?>
                                    <tr class="celda_tabla_directorio">

                                        <td style='display:none;'><?php echo $row['id'] ?></td>
                                        <td style='text-align:center;'><?php echo $row['nombre'] ?>
                                        </td>
                                        <td style='text-align:center;'><?php echo $row['apellido'] ?>
                                        </td>
                                        <td style='text-align:center;'>
                                            <?php echo $row['usuario'] ?></td>
                                        <td style='text-align:center;'><?php echo $row['clave'] ?>
                                        </td>
                                        <td style='text-align:center;'><?php echo $row['perfil'] ?>
                                        </td>
                                        <td style='text-align:center;'>
                                            <?php echo $row['directorio'] ?></td>
                                        <td style='text-align:center;'><?php echo $row['inventario'] ?>
                                        </td>
                                        <td style='text-align:center;'><?php echo $row['estado'] ?>
                                        </td>

                                        <td style='text-align:center;'> <button id='btn-edit-PC' class='edit-table'
                                                data-bs-toggle='modal'
                                                data-bs-target='#modal-edit-PC<?php echo $row['id']; ?>'>
                                                <i class='bi bi-pencil-square'></i></button>
                                        <td style='text-align:center;'> <button id='btn-del-pc' class='del-table'
                                                data-bs-toggle='modal'
                                                data-bs-target='#modal-del-pc<?php echo $row['id']; ?>'><i
                                                    class='bi bi-trash'></i></button>
                                            <!-- El modal de editar-->
                                            <?php include("./modal/modal_editar_pc.php"); ?>

                                            <!-- El modal de Eliminar-->
                                            <?php include("./modal/modal_eliminar_pc.php");
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

                <!-- El modal para insertar un nuevo Usuario-->
                <?php include("../panelcontrol/modal/modal_insertar_pc.php"); ?>

            </div>


        </div>


    </div>


</div>
</div>