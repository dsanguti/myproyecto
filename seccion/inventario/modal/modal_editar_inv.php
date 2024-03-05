<div class="container-xl">
    <div class="row">
        <div class="col">

            <!-- Modal -->
            <div class="modal fade modal-lg" id="modal-edit-inventario<?php echo $row['id']; ?>" tabindex="-1"
                aria-labelledby="modal-edit-INV" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-header-edit">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Inventario COE</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form action="seccion/inventario/edit_inv.php?id=<?php echo $row['id']; ?>" method="post"
                                id="form-editar-INV">
                                <div class="row justify-content-center g-3">
                                    <div class="row justify-content-center g-3">
                                        <div class="col-9 col-sm-5 mb-3">

                                            <label for="cod_elmento" class="form-label">Cod.Elmento</label>
                                            <input style="text-align: center;" type="text" class="form-control"
                                                name="cod_elemento" value="<?php echo $row['cod_elemento']; ?>"
                                                required>
                                        </div>
                                        <div class="col-9 col-sm-5 mb-3">

                                            <input type="hidden" name="id_INV" class="form-control"
                                                value="<?php echo $row['id']; ?>" id="editINV-id" readonly
                                                aria-label="id_INV">
                                            <label for="modelo" class="form-label">Modelo</label>
                                            <input style="text-align: center;" type="text" class="form-control"
                                                name="modelo" value="<?php echo $row['modelo']; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center g-3">
                                    <div class="row justify-content-center g-3">
                                        <div class="col-9 col-sm-5 mb-3">
                                            <label for="n_serie" class="form-label">Nº Serie</label>
                                            <input style="text-align: center;" type="text" class="form-control"
                                                name="n_serie" value="<?php echo $row['n_serie']; ?>" required>
                                        </div>
                                        <div class="col-9 col-sm-5 mb-3 mb-3">
                                            <label for="ip" class="form-label">IP</label>
                                            <input style="text-align: center;" type="text" class="form-control"
                                                name="ip" id="edit_ip_INV" aria-describedby="ip"
                                                value="<?php echo $row['ip']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center g-3">
                                    <div class="row justify-content-center g-3">
                                        <div class="col-9 col-sm-5 mb-3 mb-3">
                                            <label for="proveedor_INV" class="form-label">Proveedor</label>
                                            <input style="text-align: center;" type="text" class="form-control"
                                                name="proveedor_INV" id="edit-proveedor_INV"
                                                aria-describedby="proveedor_INV"
                                                value="<?php echo $row['proveedor']; ?>" required>
                                        </div>
                                        <div class="col-9 col-sm-5 mb-3">
                                            <label for="situacion_INV" class="form-label">Situación</label>
                                            <select name="situacion_INV" id="edit-situacionINV" class="form-select"
                                                required>
                                                <option><?php echo $row['situacion']; ?></option>
                                                <option>Adquirido</option>
                                                <option>Alquilado</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center g-3">
                                    <div class="row justify-content-center g-3">
                                        <div class="col-9 col-sm-5 mb-3">
                                            <label for="estadoINV" class="form-label">Estado</label>
                                            <select name="estadoINV" id="edit-estadoINV" class="form-select" required>
                                                <option><?php echo $row['estado']; ?></option>
                                                <option>Garantía</option>
                                                <option>Fuera de Mantenimiento</option>
                                                <option>Mantenimiento</option>
                                            </select>
                                        </div>
                                        <div class="col-9 col-sm-5 mb-3">
                                            <label for="centroINV" class="form-label">Centro</label>
                                            <select name="centroINV" id="edit-centroINV" class="form-select" required>
                                                <option><?php echo $row['centro']; ?></option>
                                                <option>DP</option>
                                                <option>OE</option>
                                                <option>COE</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center g-3">
                                    <div class="row justify-content-center g-3">
                                        <div class="col-9 col-sm-5 mb-3">
                                            <label for="f_inicio_mto_INV" class="form-label">F. Inicio Mto</label>
                                            <?php
                                            // Formatear la fecha de inicio al formato esperado por el input date
                                            $fecha_inicio = date('Y-m-d', strtotime($row['f_inicio_mto']));
                                            ?>
                                            <input type="date" name="f_inicio_mto_INV" id="edit-f_inicio_mto_INV"
                                                class="form-select" value="<?php echo $fecha_inicio; ?>" required>
                                        </div>

                                        <div class="col-9 col-sm-5 mb-3">
                                            <label for="f_fin_mto_INV" class="form-label">F. Fin Mto</label>
                                            <?php
                                            // Formatear la fecha de fin al formato esperado por el input date
                                            $fecha_fin = date('Y-m-d', strtotime($row['f_fin_mto']));
                                            ?>
                                            <input type="date" name="f_fin_mto_INV" id="edit-f_fin_mto_INV"
                                                class="form-select" value="<?php echo $fecha_fin; ?>" required>
                                        </div>


                                    </div>
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success"
                                        data-bs-dismiss="modal">Cerrar</button>
                                    <!-- <button type="button" name="edit" id="btn-edit-guardar"
                                            onclick="Carga_Directorio()" class="btn btn-primary">-->
                                    <button type="submit" name="edit_INV" id="btn-edit-guardar" class="btn btn-success">
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