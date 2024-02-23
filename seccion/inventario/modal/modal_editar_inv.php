<div class="container-xl">
    <div class="row">
        <div class="col">

            <!-- Modal -->
            <div class="modal fade modal-lg" id="modal-edit-inventario<?php echo $row['id']; ?>" tabindex="-1"
                aria-labelledby="modal-edit-PC" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-header-edit">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Inventario COE</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form action="seccion/panelcontrol/edit_pc.php?id=<?php echo $row['id']; ?>" method="post"
                                id="form-editar-PC">
                                <div class="row justify-content-center g-3">
                                    <div class="row justify-content-center g-3">
                                        <div class="col-9 col-sm-5 mb-3">

                                            <label for="nombrePC" class="form-label">Nombre</label>
                                            <input style="text-align: center;" type="text" class="form-control"
                                                name="nombrePC" value="<?php echo $row['nombre']; ?>" required>
                                        </div>
                                        <div class="col-9 col-sm-5 mb-3">

                                            <input type="hidden" name="id_PC" class="form-control"
                                                value="<?php echo $row['id']; ?>" id="editPC-id" readonly
                                                aria-label="id_PC">
                                            <label for="apellidoPC" class="form-label">Apellido</label>
                                            <input style="text-align: center;" type="text" class="form-control"
                                                name="apellidoPC" value="<?php echo $row['apellido']; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center g-3">
                                    <div class="row justify-content-center g-3">
                                        <div class="col-9 col-sm-5 mb-3">
                                            <label for="usuarioPC" class="form-label">Usuario</label>
                                            <input style="text-align: center;" type="text" class="form-control"
                                                name="usuarioPC" value="<?php echo $row['usuario']; ?>" required>
                                        </div>
                                        <div class="col-9 col-sm-5 mb-3 mb-3">
                                            <label for="oficina_directorio" class="form-label">Perfil</label>
                                            <input style="text-align: center;" type="text" class="form-control"
                                                name="perfilPC" id="edit-perfilPC" aria-describedby="perfilPC"
                                                value="<?php echo $row['perfil']; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center g-3">
                                    <div class="row justify-content-center g-3">
                                        <div class="col-9 col-sm-5 mb-3 mb-3">
                                            <label for="clavePC" class="form-label">Clave</label>
                                            <input style="text-align: center;" type="text" class="form-control"
                                                name="clavePC" id="edit-clavePC" aria-describedby="clavePC"
                                                value="<?php echo $row['clave']; ?>" required>
                                        </div>
                                        <div class="col-9 col-sm-5 mb-3">
                                            <label for="estadoPC" class="form-label">Estado</label>
                                            <select name="estadoPC" id="edit-estadoPC" class="form-select" required>
                                                <option><?php echo $row['estado']; ?></option>
                                                <option>activo</option>
                                                <option>inactivo</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center g-3">
                                    <div class="row justify-content-center g-3">
                                        <div class="col-9 col-sm-5 mb-3">
                                            <label for="directorioPC" class="form-label">Directorio</label>
                                            <select name="directorioPC" id="edit-directorioPC" class="form-select"
                                                required>
                                                <option><?php echo $row['directorio']; ?></option>
                                                <option>editar</option>
                                                <option>consulta</option>
                                            </select>
                                        </div>
                                        <div class="col-9 col-sm-5 mb-3">
                                            <label for="inventarioPC" class="form-label">Inventario</label>
                                            <select name="inventarioPC" id="edit-inventarioPC" class="form-select"
                                                required>
                                                <option><?php echo $row['inventario']; ?></option>
                                                <option>editar</option>
                                                <option>consulta</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success"
                                        data-bs-dismiss="modal">Cerrar</button>
                                    <!-- <button type="button" name="edit" id="btn-edit-guardar"
                                            onclick="Carga_Directorio()" class="btn btn-primary">-->
                                    <button type="submit" name="edit_PC" id="btn-edit-guardar" class="btn btn-success">
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
</div>