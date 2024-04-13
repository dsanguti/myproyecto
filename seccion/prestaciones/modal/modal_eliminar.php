<div class="container-lg">
    <div class="row">
        <div class="col">

            <!-- Modal -->
            <div class="modal fade" id="modal-del-directorio<?php echo $row['id']; ?>" tabindex="-1"
                aria-labelledby="modal-del-directorio" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-header-delete">
                            <h5 class="modal-title" id="exampleModalLabel">Eliminar Persona del Directorio</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p> ¿Estas seguro que deseas eliminar a la siguiente persona del directorio?</p>
                            <h4><?php echo $row['nombre'] . " " . $row['apellidos']; ?></h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <a class="btn btn-danger"
                                href="/myproyecto/seccion/directorio/eliminar_directorio.php?id=<?php echo $row['id']; ?>"
                                name="eliminar_directorio" role="button"><i class="bi bi-trash"></i> Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>