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
        <div style="padding-left:15px; padding-right:10px;" class="container-fluid">
            <div class="row mb-2 flex-row d-flex justify-content-between">
                <div class="col-6 d-flex">
                    <?php
                    if ($_SESSION["sanciones"] === "editar") {
                    ?>
                    <div class="col d-flex">
                        <a href="#insertarModal" class="btn btn-primary" data-bs-toggle="modal"><i
                                class="bi bi-plus"></i>
                            Nuevo</a>

                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div style="padding-left:15px; padding-right:10px;" class="container-fluid">

                <div class="row">
                    <div class="col">
                        <!-- Se realiza la conexión con la basde de datos Directorio -->
                        <?php include_once('../../bd/dp_melilla/conector_BD_dp_melilla.php'); ?>


                        <div id="tabla_directorio">

                            <?php include_once('../../bd/dp_melilla/conector_BD_dp_melilla.php');

                            //consulta a base de datos. Obtener las sanciones de las personas de dp_melilla
                            $result = $conn->query("SELECT p.APELLIDOSNOMBRE, p.NIFDNI,p.persona_id, s.*
                            FROM personas p
                            JOIN sanciones s ON p.persona_id = s.persona_id;");



                            ?>

                            <div class="table-responsive table-fixed">
                                <table class="table table-striped table-hover" id="table-directorio">
                                    <!-- Las cabeceras de la tabla directorio-->
                                    <thead style="position: sticky;top:0; font-size:14px;">
                                        <tr>
                                            <th style="display:none;" scope="col">id</th>
                                            <th style="background-color:#0f6ba5;color: #fff;text-align:center;"
                                                scope="col">
                                                <label for="estadoSancionesFilter">Estado</label><br>
                                                <select style="font-size:14px;" name="estadoSancionesFilter"
                                                    id="estadoSancionesFilter" class="form-select">
                                                    <option selected></option>
                                                    <option>RESUELTO</option>
                                                    <option>PENDIENTE</option>
                                                </select>

                                            </th>
                                            <th style="background-color:#0f6ba5;color: #fff;text-align:center;"
                                                scope="col">
                                                <label for="fechaListadoSancionesFilter">F.Listado</label><br>
                                                <input style="width:147px; font-size: 14px;" type="date"
                                                    name="fechaListadoSancionesFilter" class="form-select"
                                                    id="fechaListadoSancionesFilter">
                                            </th>
                                            <th style="background-color:#0f6ba5;color: #fff;text-align:center;"
                                                scope="col">
                                                <label for="dniFilter">DNI/NIE</label><br>
                                                <input style="font-size:14px;" type="text" class="form-control"
                                                    id="dniFilter">
                                            </th>
                                            <th style="background-color:#0f6ba5;color: #fff;text-align:center;"
                                                scope="col">
                                                <label for="nombreFilter">Nombre</label><br>
                                                <input style="font-size:14px;" type="text" class="form-control"
                                                    id="nombreFilter">
                                            </th>
                                            <th style="background-color:#0f6ba5;color: #fff;text-align:center;"
                                                scope="col">
                                                <label for="infraccionesSancionesFilter">Infr.</label><br>
                                                <select style="font-size:14px;width:65px;"
                                                    name="infracconesSancionesFilter" id="infracconesSancionesFilter"
                                                    class="form-select">
                                                    <option selected></option>
                                                    <option>1ª</option>
                                                    <option>2ª</option>
                                                    <option>3ª</option>
                                                </select>
                                            </th>
                                            <th style="background-color:#0f6ba5;color: #fff;text-align:center;"
                                                scope="col">
                                                <label for="tipoSancionFilter">T.Sanc.</label><br>
                                                <select style="font-size:14px;" name="tipoSancionFilter"
                                                    id="tipoSancionFilter" class="form-select">
                                                    <option selected></option>
                                                    <option>LEVE</option>
                                                    <option>GRAVE</option>
                                                    <option>MUY GRAVE</option>
                                                </select>
                                            </th>
                                            <th style="background-color:#0f6ba5;color: #fff;text-align:center;"
                                                scope="col">
                                                <label for="fechaBajaFilter">F. Baja Sanción</label><br>
                                                <input style="width:147px; font-size: 14px;" type="date"
                                                    name="fechaBajaSancionFilter" class="form-select"
                                                    id="fechaBajaSancionFilter">
                                            </th>
                                            <th style="background-color:#0f6ba5;color: #fff;text-align:center;"
                                                scope="col">
                                                <label for="fechaARBajaFilter">F. AR Baja</label><br>
                                                <input style="width:147px; font-size: 14px;" type="date"
                                                    name="fechaBajaFilter" class="form-select" id="fechaBajaFilter">
                                            </th>
                                            <th style="background-color:#0f6ba5;color: #fff;text-align:center;"
                                                scope="col">
                                                <label for="fechaFinAlegacionesFilter">F. Fin Plazo Aleg.</label><br>
                                                <input style="width:147px; font-size: 14px;" type="date"
                                                    name="fechaARBajaFilter" class="form-select" id="fechaARBajaFilter">
                                            </th>
                                            <th style="background-color:#0f6ba5;color: #fff;text-align:center;"
                                                scope="col">
                                                <label for="naComunicacionFilter">NA Comunicación</label><br>
                                                <input style="font-size:14px;" type="text" class="form-control"
                                                    id="naComunicacionFilter">
                                            </th>
                                            <th style="background-color:#0f6ba5;color: #fff;text-align:center;"
                                                scope="col">
                                                <label for="sePuedeResolverFilter">Se puede Resolver</label><br>
                                                <input style="width:147px; font-size: 14px;" type="date"
                                                    name="sePuedeResolverFilter" class="form-select"
                                                    id="sePuedeResolverFilter">
                                            </th>
                                            <th style="background-color:#0f6ba5;color: #fff;text-align:center;"
                                                scope="col">
                                                <label for="estimadaFilter">Estimada</label><br>
                                                <select style="font-size:14px;width:65px;" name="estimadaFilter"
                                                    id="estimadaFilter" class="form-select">
                                                    <option selected></option>
                                                    <option>SI</option>
                                                    <option>NO</option>
                                                </select>
                                            </th>
                                            <th style="background-color:#0f6ba5;color: #fff;text-align:center;"
                                                scope="col">
                                                <label for="controlNominaFilter">C.Nom</label><br>
                                                <select style="font-size:14px;width:65px;" name="controlNominaFilter"
                                                    id="controlNominaFilter" class="form-select">
                                                    <option selected></option>
                                                    <option>LISTO</option>
                                                    <option>POR VER</option>
                                                </select>
                                            </th>
                                            <th style="background-color:#0f6ba5;color: #fff;text-align:center;"
                                                scope="col">
                                                <label for="motivoFilter">Motivo</label><br>
                                                <select style="font-size:14px;" name="motivoFilter" id="motivoFilter"
                                                    class="form-select">
                                                    <option selected></option>
                                                    <option>NO COMPARENCIA A REQUERIMIENTO DEL SEPE.</option>
                                                    <option>INCUMPLIMIENTO DE COMPROMISO ACTIVIDAD</option>
                                                    <option>INCUMPLIMIENTO DE COMPROMISO ACTIVIDAD RAI / PAE</option>
                                                    <option>NO RENOVACIÓN DEMANDA DE EMPLEO</option>
                                                    <option>RECHAZO DE OFERTA DE COLOCACIÓN ADECUADA</option>
                                                    <option>NEGATIVA ACCIONES DE FORMACIÓN/RECONV. PROF.</option>
                                                    <option>DEJAR DE REUNIR LOS REQUISITOS GENERANDO COBIN</option>
                                                    <option>EXTINCIÓN POR INFRACCIÓN MUY GRAVE</option>
                                                    <option>EXCLUSIÓN DEL DERECHO POR UN PERIODO DE 12 M.</option>
                                                    <option>NO COMUNICAR CAMBIO DE DOMICILIO</option>
                                                    <option>REVOCACIÓN</option>
                                                    <option>NO COMUNICAR CAMBIO DE DOMICILIO</option>
                                                    <option>REVOCACIÓN RESPONSABILIDAD EMPRESARIAL</option>
                                                </select>
                                            </th>


                                            <?php
                                            if ($_SESSION["sanciones"] === "editar") {
                                            ?>
                                            <th style="background-color:#0f6ba5;color: #fff;text-align:center;color:orange;"
                                                scope="col">Edit</th>
                                            <th style="background-color:#0f6ba5;color: #fff;text-align:center;color:red;"
                                                scope="col">Del</th>
                                            <?php
                                            }
                                            ?>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = $result->fetch_assoc()) : ?>
                                        <tr class="celda_tabla_directorio">


                                            <td style='display:none;'><?php echo $row['sancion_id'] ?></td>
                                            <td style='display:none;'><?php echo $row['persona_id'] ?>
                                            </td>
                                            <td style='text-align:center; font-size: 14px;'>
                                                <?php echo $row['ts_idEstado'] ?>
                                            </td>
                                            <td style='text-align:center;font-size: 14px;'>
                                                <?php echo date('d/m/y', strtotime($row['ts_fecha_real_baja'])); ?></td>
                                            <td style='text-align:center;font-size: 14px;'><?php echo $row['NIFDNI'] ?>
                                            </td>
                                            <td style='text-align:center;font-size: 14px;'>
                                                <?php echo $row['APELLIDOSNOMBRE'] ?>
                                            </td>
                                            <td style='text-align:center;font-size: 14px;'>
                                                <?php echo $row['ts_varias_infracciones'] ?></td>
                                            <td style='text-align:center;font-size: 14px;'>
                                                <?php echo $row['ts_tipo_sancion'] ?>
                                            </td>
                                            <td style='text-align:center;font-size: 14px;'>
                                                <?php echo date('d/m/y', strtotime($row['ts_fecha_listado'])) ?>
                                            </td>
                                            <td style='text-align:center;font-size: 14px;'>
                                                <?php echo date('d/m/y', strtotime($row['ts_ar_baja'])) ?>
                                            </td>
                                            <td style='text-align:center;font-size: 14px;'>
                                                <?php echo date('d/m/y', strtotime($row['ts_fin_plazo_alegar'])) ?>
                                            </td>
                                            <td style='text-align:center;font-size: 14px;'>
                                                <?php echo $row['ts_na_comunicacion'] ?>
                                            </td>
                                            <td style='text-align:center;font-size: 14px;'>
                                                <?php echo date('d/m/y', strtotime($row['ts_se_puede_resolver'])) ?>
                                            </td>
                                            <td style='text-align:center;font-size: 14px;'>
                                                <?php echo $row['ts_estimada'] ?>
                                            </td>
                                            <td style='text-align:center;font-size: 14px;'>
                                                <?php echo $row['ts_control_nomina'] ?>
                                            </td>
                                            <td style='text-align:center;font-size: 14px;'>
                                                <?php echo $row['ts_motivo'] ?>
                                            </td>
                                            <?php

                                                if ($_SESSION["sanciones"] === "editar") {
                                                ?>
                                            <td style='text-align:center;'> <button id='btn-edit-directorio'
                                                    class='edit-table' data-bs-toggle='modal'
                                                    data-bs-target='#modal-edit-directorio<?php echo $row['id']; ?>'>
                                                    <i class='bi bi-pencil-square'></i></button>
                                            <td style='text-align:center;'> <button id='btn-del-directorio'
                                                    class='del-table' data-bs-toggle='modal'
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
    </div>