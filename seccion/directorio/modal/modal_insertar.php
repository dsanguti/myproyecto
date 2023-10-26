<div class="container-xl">
    <div class="row">
        <div class="col">

            <!-- Modal -->
            <div class="modal fade modal-lg" id="insertarModal" tabindex="-1" aria-labelledby="insertarModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> <i class="bi bi-person-add"></i> Agregar
                                Persona al Directorio</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="seccion/directorio/guardar_directorio.php" method="post" id="insertar-directorio">
                                <div class="row justify-content-center g-3">
                                    <div class="row justify-content-center g-3">
                                        <div class="col-9 col-sm-5 mb-3">
                                            <label for="puestoDirectorio" class="form-label">Puesto</label>
                                            <input style="text-align: center;" type="text" class="form-control" name="puestoDirectorio">
                                        </div>
                                    </div>
                                    <div class="col-9 col-sm-5 mb-3">

                                        <input type="text" style="display:none;" name="id" class="form-control" id="edit-id" readonly aria-label="Nombre_directorio">
                                        <label for="nombre_directorio" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" name="nombre_directorio" id="insert-nombre_directorio" aria-label="Nombre_directorio">
                                    </div>
                                    <div class="col-9 col-sm-5 mb-3">
                                        <label for="apellidos_directorio" class="form-label">Apellidos</label>
                                        <input type="text" class="form-control" name="apellidos_directorio" id="insert-apellidos_directorio" aria-label="apellidos_directorio">
                                    </div>
                                </div>
                                <div class="row justify-content-center g-3">
                                    <div class="col-9 col-sm-5 mb-3 mb-3">
                                        <label for="correo_directorio" class="form-label">Correo</label>
                                        <input type="email" class="form-control" name="correo_directorio" id="insert-correo_directorio" aria-describedby="correo_directorio">
                                    </div>
                                    <div class="col-9 col-sm-5 mb-3 mb-3">
                                        <label for="oficina_directorio" class="form-label">Oficina</label>
                                        <select name="oficina_directorio" id="insert-oficina_directorio" class="form-select">
                                            <option selected>Seleccionar...</option>
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
                                        <input type="tel" name="telefono_directorio" class="form-control" id="insert-telefono_directorio" aria-label="telefono_directorio">
                                    </div>
                                    <div class="col-9 col-sm-5 mb-3">
                                        <label for="extension_directorio" class="form-label">Extensión</label>
                                        <input type="text" name="extension_directorio" class="form-control" id="insert-extension_directorio" aria-label="extension_directorio">
                                    </div>
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" name="guardar_directorio" id="btn-guardar" class="btn btn-primary"> <i class="bi bi-floppy"></i> Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>