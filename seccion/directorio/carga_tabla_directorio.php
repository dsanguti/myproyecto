<?php
session_start();
?>
<?php include_once('../../bd/directorio/conector_BD_directorio.php');

$registros_por_pagina = 4;

$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
$offset = ($pagina - 1) * $registros_por_pagina;

$query = "SELECT * FROM directorio LIMIT $offset, $registros_por_pagina";
$result = $conn->query($query);
?>

<table class="table table-striped table-hover">
    <!-- Las cabeceras de la tabla directorio-->
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