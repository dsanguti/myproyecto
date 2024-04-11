<?php session_start(); ?>
<div class="container-fluid p-0">
    <div class="row">
        <div class="col mt-4 mb-4">
            <h2 class="titulo_seccion" style="text-align:center;">Sanciones de prestaciones</h2>
        </div>
    </div>
    <div class="row">
        <div class="row">
            <div style="padding-left:15px; padding-right:10px;" class="container-fluid">
                <div class="row">
                    <div class="col">
                        <!-- Se realiza la conexión con la base de datos Directorio -->
                        <?php include_once('../../bd/dp_melilla/conector_BD_dp_melilla.php'); ?>
                        <div id="tabla_directorio">
                            <?php
                            // Consulta para obtener el total de registros
                            $totalRegistrosQuery = $conn->query("SELECT COUNT(*) AS totalRegistros FROM personas");
                            $totalRegistros = $totalRegistrosQuery->fetch_assoc()['totalRegistros'];

                            // Definir el tamaño de bloque
                            $tamanoBloque = 500;

                            // Calcular el número de bloques necesarios
                            $numBloques = ceil($totalRegistros / $tamanoBloque);

                            // Mostrar las cabeceras de la tabla
                            echo "<div class='table-responsive table-fixed'>";
                            echo "<table class='table table-striped table-hover' id='tabla_sanciones'>";
                            echo "<thead style='position: sticky;top:0; font-size:14px;'>";
                            echo "<tr>";
                            echo "<th style='display:none;' scope='col'>id</th>";
                            echo "<th style='background-color:#0f6ba5;color: #fff;text-align:center;' scope='col'>";
                            echo "<label for='estadoSancionesFilter'>Estado</label><br>";
                            echo "<select style='font-size:14px;' name='estadoSancionesFilter' id='estadoSancionesFilter' class='form-select'>";
                            echo "<option selected></option>";
                            echo "<option>RESUELTO</option>";
                            echo "<option>PENDIENTE</option>";
                            echo "</select>";
                            echo "</th>";
                            echo "<th style='background-color:#0f6ba5;color: #fff;text-align:center;' scope='col'>";
                            echo "<label for='fechaListadoSancionesFilter'>F.Listado</label><br>";
                            echo "<input style='width:147px; font-size: 14px;' type='date' name='fechaListadoSancionesFilter' class='form-select' id='fechaListadoSancionesFilter'>";
                            echo "</th>";
                            echo "<th style='background-color:#0f6ba5;color: #fff;text-align:center;' scope='col'>";
                            echo "<label for='dniFilter'>DNI/NIE</label><br>";
                            echo "<input style='font-size:14px;' type='search' class='form-control' id='dniFilter' aria-label='Search'>";
                            echo "</th>";
                            echo "<th style='background-color:#0f6ba5;color: #fff;text-align:center;' scope='col'>";
                            echo "<label for='nombreFilter'>Nombre</label><br>";
                            echo "<input style='font-size:14px;' type='text' class='form-control' id='nombreFilter'>";
                            echo "</th>";
                            echo "<th style='background-color:#0f6ba5;color: #fff;text-align:center;' scope='col'>";
                            echo "<label for='infraccionesSancionesFilter'>Infr.</label><br>";
                            echo "<select style='font-size:14px;width:65px;' name='infracconesSancionesFilter' id='infracconesSancionesFilter' class='form-select'>";
                            echo "<option selected></option>";
                            echo "<option>1ª</option>";
                            echo "<option>2ª</option>";
                            echo "<option>3ª</option>";
                            echo "</select>";
                            echo "</th>";
                            echo "<th style='background-color:#0f6ba5;color: #fff;text-align:center;' scope='col'>";
                            echo "<label for='tipoSancionFilter'>T.Sanc.</label><br>";
                            echo "<select style='font-size:14px;' name='tipoSancionFilter' id='tipoSancionFilter' class='form-select'>";
                            echo "<option selected></option>";
                            echo "<option>LEVE</option>";
                            echo "<option>GRAVE</option>";
                            echo "<option>MUY GRAVE</option>";
                            echo "</select>";
                            echo "</th>";
                            echo "<th style='background-color:#0f6ba5;color: #fff;text-align:center;' scope='col'>";
                            echo "<label for='fechaBajaFilter'>F. Baja Sanción</label><br>";
                            echo "<input style='width:147px; font-size: 14px;' type='date' name='fechaBajaSancionFilter' class='form-select' id='fechaBajaSancionFilter'>";
                            echo "</th>";
                            echo "<th style='background-color:#0f6ba5;color: #fff;text-align:center;' scope='col'>";
                            echo "<label for='fechaARBajaFilter'>F. AR Baja</label><br>";
                            echo "<input style='width:147px; font-size: 14px;' type='date' name='fechaBajaFilter' class='form-select' id='fechaBajaFilter'>";
                            echo "</th>";
                            echo "<th style='background-color:#0f6ba5;color: #fff;text-align:center;' scope='col'>";
                            echo "<label for='fechaFinAlegacionesFilter'>F. Fin Plazo Aleg.</label><br>";
                            echo "<input style='width:147px; font-size: 14px;' type='date' name='fechaARBajaFilter' class='form-select' id='fechaARBajaFilter'>";
                            echo "</th>";
                            echo "<th style='background-color:#0f6ba5;color: #fff;text-align:center;' scope='col'>";
                            echo "<label for='naComunicacionFilter'>NA Comunicación</label><br>";
                            echo "<input style='font-size:14px;' type='text' class='form-control' id='naComunicacionFilter'>";
                            echo "</th>";
                            echo "<th style='background-color:#0f6ba5;color: #fff;text-align:center;' scope='col'>";
                            echo "<label for='sePuedeResolverFilter'>Se puede Resolver</label><br>";
                            echo "<input style='width:147px; font-size: 14px;' type='date' name='sePuedeResolverFilter' class='form-select' id='sePuedeResolverFilter'>";
                            echo "</th>";
                            echo "<th style='background-color:#0f6ba5;color: #fff;text-align:center;' scope='col'>";
                            echo "<label for='estimadaFilter'>Estimada</label><br>";
                            echo "<select style='font-size:14px;width:65px;' name='estimadaFilter' id='estimadaFilter' class='form-select'>";
                            echo "<option selected></option>";
                            echo "<option>SI</option>";
                            echo "<option>NO</option>";
                            echo "</select>";
                            echo "</th>";
                            echo "<th style='background-color:#0f6ba5;color: #fff;text-align:center;' scope='col'>";
                            echo "<label for='controlNominaFilter'>C.Nom</label><br>";
                            echo "<select style='font-size:14px;width:65px;' name='controlNominaFilter' id='controlNominaFilter' class='form-select'>";
                            echo "<option selected></option>";
                            echo "<option>LISTO</option>";
                            echo "<option>POR VER</option>";
                            echo "</select>";
                            echo "</th>";
                            echo "<th style='background-color:#0f6ba5;color: #fff;text-align:center;' scope='col'>";
                            echo "<label for='motivoFilter'>Motivo</label><br>";
                            echo "<select style='font-size:14px;' name='motivoFilter' id='motivoFilter' class='form-select'>";
                            echo "<option selected></option>";
                            echo "<option>NO COMPARENCIA A REQUERIMIENTO DEL SEPE.</option>";
                            echo "<option>INCUMPLIMIENTO DE COMPROMISO ACTIVIDAD</option>";
                            echo "<option>INCUMPLIMIENTO DE COMPROMISO ACTIVIDAD RAI / PAE</option>";
                            echo "<option>NO RENOVACIÓN DEMANDA DE EMPLEO</option>";
                            echo "<option>RECHAZO DE OFERTA DE COLOCACIÓN ADECUADA</option>";
                            echo "<option>NEGATIVA ACCIONES DE FORMACIÓN/RECONV. PROF.</option>";
                            echo "<option>DEJAR DE REUNIR LOS REQUISITOS GENERANDO COBIN</option>";
                            echo "<option>EXTINCIÓN POR INFRACCIÓN MUY GRAVE</option>";
                            echo "<option>EXCLUSIÓN DEL DERECHO POR UN PERIODO DE 12 M.</option>";
                            echo "<option>NO COMUNICAR CAMBIO DE DOMICILIO</option>";
                            echo "<option>REVOCACIÓN</option>";
                            echo "<option>NO COMUNICAR CAMBIO DE DOMICILIO</option>";
                            echo "<option>REVOCACIÓN RESPONSABILIDAD EMPRESARIAL</option>";
                            echo "</select>";
                            echo "</th>";

                            if ($_SESSION["sanciones"] === "editar") {
                                echo "<th style='background-color:#0f6ba5;color: #fff;text-align:center;color:orange;' scope='col'>Edit</th>";
                                echo "<th style='background-color:#0f6ba5;color: #fff;text-align:center;color:red;' scope='col'>Del</th>";
                            }

                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            // Iterar sobre los bloques y cargarlos en la tabla
                            for ($i = 0; $i < $numBloques; $i++) {
                                // Calcular el inicio del bloque actual
                                $inicioBloque = $i * $tamanoBloque;

                                // Consulta para obtener los registros del bloque actual
                                $sql = "SELECT p.APELLIDOSNOMBRE, p.NIFDNI, p.persona_id, s.*
                                        FROM personas p
                                        JOIN sanciones s ON p.persona_id = s.persona_id
                                        LIMIT $inicioBloque, $tamanoBloque";

                                // Ejecutar la consulta
                                $result = $conn->query($sql);

                                // Mostrar los resultados en la tabla
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr class='body_tabla_sanciones celda_tabla_sanciones'>";
                                    // Aquí mostrarías cada fila en la tabla HTML
                                    echo "<td style='display:none;'>" . $row['sancion_id'] . "</td>";
                                    echo "<td style='display:none;'>" . $row['persona_id'] . "</td>";
                                    echo "<td style='text-align:center; font-size: 14px;'>" . $row['ts_idEstado'] . "</td>";
                                    echo "<td style='text-align:center;font-size: 14px;'>" . date('d/m/y', strtotime($row['ts_fecha_real_baja'])) . "</td>";
                                    echo "<td style='text-align:center;font-size: 14px;'>" . $row['NIFDNI'] . "</td>";
                                    echo "<td style='text-align:center;font-size: 14px;'>" . $row['APELLIDOSNOMBRE'] . "</td>";
                                    echo "<td style='text-align:center;font-size: 14px;'>" . $row['ts_varias_infracciones'] . "</td>";
                                    echo "<td style='text-align:center;font-size: 14px;'>" . $row['ts_tipo_sancion'] . "</td>";
                                    echo "<td style='text-align:center;font-size: 14px;'>" . date('d/m/y', strtotime($row['ts_fecha_listado'])) . "</td>";
                                    echo "<td style='text-align:center;font-size: 14px;'>" . date('d/m/y', strtotime($row['ts_ar_baja'])) . "</td>";
                                    echo "<td style='text-align:center;font-size: 14px;'>" . date('d/m/y', strtotime($row['ts_fin_plazo_alegar'])) . "</td>";
                                    echo "<td style='text-align:center;font-size: 14px;'>" . $row['ts_na_comunicacion'] . "</td>";
                                    echo "<td style='text-align:center;font-size: 14px;'>" . date('d/m/y', strtotime($row['ts_se_puede_resolver'])) . "</td>";
                                    echo "<td style='text-align:center;font-size: 14px;'>" . $row['ts_estimada'] . "</td>";
                                    echo "<td style='text-align:center;font-size: 14px;'>" . $row['ts_control_nomina'] . "</td>";
                                    echo "<td style='text-align:center;font-size: 14px;'>" . $row['ts_motivo'] . "</td>";

                                    if ($_SESSION["sanciones"] === "editar") {
                                        echo "<td style='text-align:center;'> <button id='btn-edit-directorio' class='edit-table' data-bs-toggle='modal' data-bs-target='#modal-edit-directorio" . $row['id'] . "'><i class='bi bi-pencil-square'></i></button>";
                                        echo "<td style='text-align:center;'> <button id='btn-del-directorio' class='del-table' data-bs-toggle='modal' data-bs-target='#modal-del-directorio" . $row['id'] . "'><i class='bi bi-trash'></i></button>";
                                    }
                                    echo "</tr>";
                                }
                            }
                            // Cerrar etiquetas de tabla y div
                            echo "</tbody>";
                            echo "</table>";
                            echo "</div>";
                            ?>
                        </div>
                    </div>
                    <!-- El modal de editar-->
                    <?php include("../directorio/modal/modal_editar.php"); ?>

                    <!-- El modal de Eliminar-->
                    <?php include("../directorio/modal/modal_eliminar.php"); ?>

                    <!-- El modal para insertar un nuevo contacto en el Directorio-->
                    <?php include("../directorio/modal/modal_insertar.php"); ?>
                </div>
            </div>
        </div>
    </div>
</div>