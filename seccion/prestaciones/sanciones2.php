<?php
session_start();
?>
<div class="container-fluid p-0">
    <div class="row">
        <div class="col mt-4 mb-4">
            <h2 class="titulo_seccion" style="text-align:center;">Sanciones de prestaciones</h2>
        </div>
    </div>
    <div class="row">
        <div style="padding-left:30px; padding-right:30px;" class="container-fluid">
            <div class="row mb-2 flex-row d-flex justify-content-between">
                <div class="col-6 d-flex">
                    <?php
                    if ($_SESSION["sanciones"] === "editar") {
                    ?>
                        <div class="col d-flex">
                            <a href="#insertarModal" class="btn btn-primary" data-bs-toggle="modal"><i class="bi bi-plus"></i>
                                Nuevo</a>

                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>