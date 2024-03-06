<div class="container-lg">
    <div class="row">
        <div class="col">

            <!-- Modal -->
            <div class="modal fade" id="modal-del-inventario<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="modal-del-inv" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-header-delete">
                            <h5 class="modal-title" id="exampleModalLabel">Eliminar Elemento Inventario COE</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="centro_INV" class="form-control" value="<?php echo $row['centro']; ?>" id="del-inv" readonly aria-label="centro_INV">
                            <p> ¿Estas seguro que deseas eliminar el siguiente elemento?</p>
                            <h4><?php echo "Elemento con cód. " . $row['cod_elemento'] . " modelo: " . $row['modelo']; ?>
                            </h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <a class="btn btn-danger" href="/myproyecto/seccion/inventario/eliminar_inv.php?id=<?php echo $row['id']; ?>" name="eliminar_INV" role="button"><i class="bi bi-trash"></i> Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>