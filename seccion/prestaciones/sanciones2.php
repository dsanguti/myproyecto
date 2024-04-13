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
                            <!-- Cabeceras de la tabla -->
                            <div class='table-responsive table-fixed'>
                                <table class='table table-striped table-hover' id='tabla_sanciones'>
                                    <thead style='position: sticky;top:0; font-size:14px;'>
                                        <tr>
                                            <th style='display:none;' scope='col'>id</th>
                                            <th style='background-color:#0f6ba5;color: #fff;text-align:center;'
                                                scope='col'>
                                                <label for='estadoSancionesFilter'>Estado</label><br>
                                                <select style='font-size:14px;' name='estadoSancionesFilter'
                                                    id='estadoSancionesFilter' class='form-select'>
                                                    <option selected></option>
                                                    <option>RESUELTO</option>
                                                    <option>PENDIENTE</option>
                                                </select>
                                            </th>
                                            <th style='background-color:#0f6ba5;color: #fff;text-align:center;'
                                                scope='col'>
                                                <label for='fechaListadoSancionesFilter'>F.Listado</label><br>
                                                <input style='width:147px; font-size: 14px;' type='date'
                                                    name='fechaListadoSancionesFilter' class='form-select'
                                                    id='fechaListadoSancionesFilter'>
                                            </th>
                                            <th style='background-color:#0f6ba5;color: #fff;text-align:center;'
                                                scope='col'>
                                                <label for='dniFilter'>DNI/NIE</label><br>
                                                <input style='font-size:14px;' type='search' class='form-control'
                                                    id='dniFilter' aria-label='Search'>
                                            </th>
                                            <th style='background-color:#0f6ba5;color: #fff;text-align:center;'
                                                scope='col'>
                                                <label for='nombreFilter'>Nombre</label><br>
                                                <input style='font-size:14px;' type='text' class='form-control'
                                                    id='nombreFilter'>
                                            </th>
                                            <th style='background-color:#0f6ba5;color: #fff;text-align:center;'
                                                scope='col'>
                                                <label for='infraccionesSancionesFilter'>Infr.</label><br>
                                                <select style='font-size:14px;width:65px;'
                                                    name='infracconesSancionesFilter' id='infracconesSancionesFilter'
                                                    class='form-select'>
                                                    <option selected></option>
                                                    <option>1ª</option>
                                                    <option>2ª</option>
                                                    <option>3ª</option>
                                                </select>
                                            </th>
                                            <th style='background-color:#0f6ba5;color: #fff;text-align:center;'
                                                scope='col'>
                                                <label for='tipoSancionFilter'>T.Sanc.</label><br>
                                                <select style='font-size:14px;' name='tipoSancionFilter'
                                                    id='tipoSancionFilter' class='form-select'>
                                                    <option selected></option>
                                                    <option>LEVE</option>
                                                    <option>GRAVE</option>
                                                    <option>MUY GRAVE</option>
                                                </select>
                                            </th>
                                            <th style='background-color:#0f6ba5;color: #fff;text-align:center;'
                                                scope='col'>
                                                <label for='fechaBajaFilter'>F. Baja Sanción</label><br>
                                                <input style='width:147px; font-size: 14px;' type='date'
                                                    name='fechaBajaSancionFilter' class='form-select'
                                                    id='fechaBajaSancionFilter'>
                                            </th>
                                            <th style='background-color:#0f6ba5;color: #fff;text-align:center;'
                                                scope='col'>
                                                <label for='fechaARBajaFilter'>F. AR Baja</label><br>
                                                <input style='width:147px; font-size: 14px;' type='date'
                                                    name='fechaBajaFilter' class='form-select' id='fechaBajaFilter'>
                                            </th>
                                            <th style='background-color:#0f6ba5;color: #fff;text-align:center;'
                                                scope='col'>
                                                <label for='fechaFinAlegacionesFilter'>F. Fin Plazo Aleg.</label><br>
                                                <input style='width:147px; font-size: 14px;' type='date'
                                                    name='fechaARBajaFilter' class='form-select' id='fechaARBajaFilter'>
                                            </th>
                                            <th style='background-color:#0f6ba5;color: #fff;text-align:center;'
                                                scope='col'>
                                                <label for='naComunicacionFilter'>NA Comunicación</label><br>
                                                <input style='font-size:14px;' type='text' class='form-control'
                                                    id='naComunicacionFilter'>
                                            </th>
                                            <th style='background-color:#0f6ba5;color: #fff;text-align:center;'
                                                scope='col'>
                                                <label for='sePuedeResolverFilter'>Se puede Resolver</label><br>
                                                <input style='width:147px; font-size: 14px;' type='date'
                                                    name='sePuedeResolverFilter' class='form-select'
                                                    id='sePuedeResolverFilter'>
                                            </th>
                                            <th style='background-color:#0f6ba5;color: #fff;text-align:center;'
                                                scope='col'>
                                                <label for='estimadaFilter'>Estimada</label><br>
                                                <select style='font-size:14px;width:65px;' name='estimadaFilter'
                                                    id='estimadaFilter' class='form-select'>
                                                    <option selected></option>
                                                    <option>SI</option>
                                                    <option>NO</option>
                                                </select>
                                            </th>
                                            <th style='background-color:#0f6ba5;color: #fff;text-align:center;'
                                                scope='col'>
                                                <label for='controlNominaFilter'>C.Nom</label><br>
                                                <select style='font-size:14px;width:65px;' name='controlNominaFilter'
                                                    id='controlNominaFilter' class='form-select'>
                                                    <option selected></option>
                                                    <option>LISTO</option>
                                                    <option>POR VER</option>
                                                </select>
                                            </th>
                                            <th style='background-color:#0f6ba5;color: #fff;text-align:center;'
                                                scope='col'>
                                                <label for='motivoFilter'>Motivo</label><br>
                                                <select style='font-size:14px;' name='motivoFilter' id='motivoFilter'
                                                    class='form-select'>
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
                                            <?php if ($_SESSION["sanciones"] === "editar") : ?>
                                            <th style='background-color:#0f6ba5;color: #fff;text-align:center;color:orange;'
                                                scope='col'>Edit</th>
                                            <th style='background-color:#0f6ba5;color: #fff;text-align:center;color:red;'
                                                scope='col'>Del</th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Cuerpo de la tabla -->
                                        <?php
                                        // Consulta para obtener los registros de sanciones
                                        $sql = "SELECT p.APELLIDOSNOMBRE, p.NIFDNI, p.persona_id, s.*
                                                FROM personas p
                                                JOIN sanciones s ON p.persona_id = s.persona_id";
                                        // Ejecutar la consulta
                                        $result = $conn->query($sql);
                                        // Mostrar los resultados en el cuerpo de la tabla
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
                                        ?>
                                    </tbody>
                                </table>
                            </div>
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

<script>
console.log("hola me lees???")
// Función para ejecutar la búsqueda por estado
function executeSearchByState() {
    const estadoFilter = document.getElementById("estadoSancionesFilter");

    if (estadoFilter) {
        const filtroEstado = estadoFilter.value;

        document
            .querySelectorAll(".celda_tabla_sanciones td:nth-child(2)")
            .forEach((celda) => {
                const fila = celda.parentNode;

                if (filtroEstado === "") {
                    fila.classList.remove("filtro_directorio");
                } else {
                    const estado = celda.textContent.trim();
                    if (estado !== filtroEstado) {
                        fila.classList.add("filtro_directorio");
                    } else {
                        fila.classList.remove("filtro_directorio");
                    }
                }
            });
    } else {
        console.error(
            "El campo de filtro de estado no se encontró en el documento."
        );
    }
}
// Esperar a que la página web esté completamente cargada antes de ejecutar el código
window.addEventListener("load", function() {
    console.log("Página web completamente cargada");

    // Función para ejecutar la búsqueda por estado
    function executeSearchByState() {
        const estadoFilter = document.getElementById("estadoSancionesFilter");

        if (estadoFilter) {
            const filtroEstado = estadoFilter.value;

            document
                .querySelectorAll(".celda_tabla_sanciones td:nth-child(2)")
                .forEach((celda) => {
                    const fila = celda.parentNode;

                    if (filtroEstado === "") {
                        fila.classList.remove("filtro_directorio");
                    } else {
                        const estado = celda.textContent.trim();
                        if (estado !== filtroEstado) {
                            fila.classList.add("filtro_directorio");
                        } else {
                            fila.classList.remove("filtro_directorio");
                        }
                    }
                });
        } else {
            console.error(
                "El campo de filtro de estado no se encontró en el documento."
            );
        }
    }

    // Esperar un breve período de tiempo antes de intentar obtener el elemento
    setTimeout(function() {
        const estadoFilter = document.getElementById("estadoSancionesFilter");
        console.log("Elemento estadoFilter:", estadoFilter);
        if (estadoFilter) {
            console.log("El campo de filtro de estado se encontró en el documento.");
            estadoFilter.addEventListener("change", executeSearchByState);
        } else {
            console.error(
                "El campo de filtro de estado no se encontró en el documento."
            );
        }

        // Ejecutar la búsqueda inicial por estado
        executeSearchByState();
    }, 100); // Esperar 100 milisegundos
});
</script>