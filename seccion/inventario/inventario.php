<?php
session_start();
?>

<div class="container-fluid p-0">

    <div style="margin:0px; padding:0px;" class="row">
        <!-- Columna 1: Ocupa el 15% del ancho total -->
        <div class="col colum1Inventario">
            <!-- Contenido de la primera columna -->
            <!-- Navbar Vertical -->
            <nav style="margin:0px; padding:0px;" class="navbar navbar-light navbarInventario">
                <!-- Contenido del Navbar -->
                <ul class="navbar-nav myUlInventario myUlEtiquetas">
                    <li id="PrimerLiNavbarInventario" class="nav-item liInventario">
                        <a class="nav-link" href="#/inventario/DP">DP</a>
                    </li>
                    <li class="nav-item liInventario">
                        <a class="nav-link" href="#/inventario/OE">OE</a>
                    </li>
                    <li style="border-bottom:0px solid" id="UltimoLiNavbarInventario" class="nav-item liInventario">
                        <a class="nav-link" href="#/inventario/COE">COE</a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Columna 2: Ocupa el 85% del ancho total -->
        <div style="margin:auto;" class="col-md-11 colum2Inventario">

            <!-- Contenido de la segunda columna -->
            <div class="container-fluid" id="mainInventario">
                <div style="margin:0px; padding:0px;" class="row">
                    <!-- Contenido de la fila adicional al principio -->
                    <div class="col-md-12 titulo_seccion" style="padding-top:18px; text-align: center;">
                        <h2>Inventario</h2>
                    </div>
                    <div class="col-md-12 " style=" text-align: center;">
                        <h2 class="subtitulo_seccion">seleccione la oficina...</h2>
                    </div>
                </div>
                <div id="container_img_inventario">
                    <img id="img_inventario" src="http://localhost/myproyecto/img/inventario.jpg" alt="Sección inventario">
                </div>
            </div>
        </div>
    </div>
</div>