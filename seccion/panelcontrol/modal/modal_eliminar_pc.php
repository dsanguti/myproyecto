<div class="container-lg">
    <div class="row">
        <div class="col">

            <!-- Modal -->
            <div class="modal fade" id="modal-del-pc<?php echo $row['id']; ?>" tabindex="-1"
                aria-labelledby="modal-del-pc" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-header-delete">
                            <h5 class="modal-title" id="exampleModalLabel">Eliminar Persona del Directorio</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p> ¿Estas seguro que deseas eliminar al siguiente usuario?</p>
                            <h4><?php echo $row['nombre'] . " " . $row['apellido'] . " con usuario " . $row['usuario']; ?>
                            </h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <a class="btn btn-danger"
                                href="/myproyecto/seccion/panelcontrol/eliminar_pc.php?id=<?php echo $row['id']; ?>"
                                name="eliminar_PC" role="button"><i class="bi bi-trash"></i> Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>