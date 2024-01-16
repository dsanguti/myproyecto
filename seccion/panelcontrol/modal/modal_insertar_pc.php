<div class="container-xl">
    <div class="row">
        <div class="col">

            <!-- Modal -->
            <div class="modal fade modal-lg" id="insertarModal_PC" tabindex="-1" aria-labelledby="insertarModal_PC
            " aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header modal-header-add">
                            <h5 class="modal-title" id="exampleModalLabel"> <i class="bi bi-person-add"></i>
                                Agregar Usuario</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="seccion/panelcontrol/guardar_pc.php" method="post" id="insertar-PC">
                                <div class="row justify-content-center g-3">
                                    <div class="row justify-content-center g-3">
                                        <div class="col-9 col-sm-5 mb-3">
                                            <label for="nombrePC" class="form-label">Nombre</label>
                                            <input style="text-align: center;" type="text" class="form-control"
                                                name="nombrePC" required>
                                        </div>
                                        <div class="col-9 col-sm-5 mb-3">

                                            <input type="text" style="display:none;" name="id" class="form-control"
                                                id="edit-id" readonly aria-label="Nombre_directorio">
                                            <label for="apellidoPC" class="form-label">Apellido</label>
                                            <input type="text" class="form-control" name="apellidoPC"
                                                id="insert-apellidoPC" aria-label="apellidoPC" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center g-3">
                                    <div class="row justify-content-center g-3">
                                        <div class="col-9 col-sm-5 mb-3 mb-3">
                                            <label for="usuarioPC" class="form-label">Usuario</label>
                                            <input type="text" class="form-control" name="usuarioPC"
                                                id="insert-usuarioPC" aria-label="usuarioPC" required>
                                        </div>
                                        <div class="col-9 col-sm-5 mb-3">
                                            <label for="perfilPC" class="form-label">Perfil</label>
                                            <input type="text" class="form-control" name="perfilPC" id="insert-perfilPC"
                                                aria-label="perfilPC" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center g-3">
                                    <div class="row justify-content-center g-3">
                                        <div class="col-9 col-sm-5 mb-3 mb-3">
                                            <label for="clavePC" class="form-label">Clave</label>
                                            <input type="text" class="form-control" name="clavePC" id="insert-clavePC"
                                                aria-label="clavePC" required>
                                        </div>
                                        <div class="col-9 col-sm-5 mb-3 mb-3">
                                            <label for="estadoPC" class="form-label">Estado</label>
                                            <select name="estadoPC" id="insert-estadoPC" class="form-select" required>
                                                <option selected>Seleccionar...</option>
                                                <option>activo</option>
                                                <option>inactivo</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center g-3">
                                    <div class="row justify-content-center g-3">
                                        <div class="col-9 col-sm-5 mb-3 mb-3">
                                            <label for="directorioPC" class="form-label">Directorio</label>
                                            <select name="directorioPC" id="insert-directorioPC" class="form-select"
                                                required>
                                                <option selected>Seleccionar...</option>
                                                <option>editar</option>
                                                <option>consulta</option>
                                            </select>
                                        </div>
                                        <div class="col-9 col-sm-5 mb-3 mb-3">
                                            <label for="inventarioPC" class="form-label">Inventario</label>
                                            <select name="inventarioPC" id="insert-inventarioPC" class="form-select"
                                                required>
                                                <option selected>Seleccionar...</option>
                                                <option>editar</option>
                                                <option>consulta</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" name="guardar_PC" id="btn-guardar_PC" class="btn btn-primary">
                                        <i class="bi bi-floppy"></i> Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>