<div class="container-xl">
    <div class="row">
        <div class="col">

            <!-- Modal -->
            <div class="modal fade modal-lg" id="modal-edit-directorio" tabindex="-1" aria-labelledby="modal-edit-directorio" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Persona</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="seccion/directorio/edit.php?id=<?php echo $row['id']; ?>" method="post" id="form-editar-directorio">

                                <div class="row justify-content-center g-3">
                                    <div class="col-9 col-sm-5 mb-3">

                                        <label for="puestoDirectorio" class="form-label">Puesto</label>
                                        <input style="text-align: center;" type="text" class="form-control" name="puestoDirectorio" value="<?php echo $row['puesto']; ?>">
                                    </div>
                                </div>
                                <div class="row justify-content-center g-3">
                                    <div class="col-9 col-sm-5 mb-3">

                                        <input type="hidden" name="id_directorio" class="form-control" value="<?php echo $row['id']; ?>" id="edit-id" readonly aria-label="id_directorio">
                                        <label for="nombreDirectorio" class="form-label">Nombre</label>
                                        <input style="text-align: center;" type="text" class="form-control" name="nombreDirectorio" value="<?php echo $row['nombre']; ?>">
                                    </div>
                                    <div class="col-9 col-sm-5 mb-3">
                                        <label for="apellidos_directorio" class="form-label">Apellidos</label>
                                        <input style="text-align: center;" type="text" class="form-control" name="apellidos_directorio" value="<?php echo $row['apellidos']; ?>">
                                    </div>
                                    <div class="row justify-content-center g-3">
                                        <div class="col-9 col-sm-5 mb-3 mb-3">
                                            <label for="correo_directorio" class="form-label">Correo</label>
                                            <input style="text-align: center;" type="email" class="form-control" name="correo_directorio" id="edit-correo_directorio" aria-describedby="correo_directorio" value="<?php echo $row['correo']; ?>">
                                        </div>
                                        <div class="col-9 col-sm-5 mb-3 mb-3">
                                            <label for="oficina_directorio" class="form-label">Oficina</label>
                                            <select name="oficina_directorio" id="edit-oficina_directorio" class="form-select">
                                                <option><?php echo $row['oficina']; ?></option>
                                                <option>Empleo</option>
                                                <option>Prestaciones</option>
                                                <option>D.P.</option>
                                                <option>COE</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center g-3">
                                        <div class="col-9 col-sm-5 mb-3">
                                            <label for="telefono_directorio" class="form-label">Teléfono</label>
                                            <input style="text-align: center;" type="text" name="telefono_directorio" class="form-control" id="edit-telefono_directorio" aria-label="telefono_directorio" value="<?php echo $row['telefono']; ?>">
                                        </div>
                                        <div class="col-9 col-sm-5 mb-3">
                                            <label for="extension_directorio" class="form-label">Extensión</label>
                                            <input style="text-align: center;" type="text" name="extension_directorio" class="form-control" id="edit-extension_directorio" aria-label="extension_directorio" value="<?php echo $row['extension']; ?>">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <!-- <button type="button" name="edit" id="btn-edit-guardar"
                                            onclick="Carga_Directorio()" class="btn btn-primary">-->
                                        <button type="submit" name="edit" id="btn-edit-guardar" class="btn btn-primary">
                                            <i class="bi bi-pencil-square"></i> Actualizar</button>
                                    </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>