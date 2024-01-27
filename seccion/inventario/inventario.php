<div class="container-fluid p-0">
    <div style="margin:0px; padding:0px;" class="row w-100">
        <!-- Contenido de la fila adicional al principio -->
        <div class="col-md-12" style=" padding-top:10px; text-align: center;">
            <h2>Inventario</h2>

        </div>
    </div>
    <div style="margin:0px; padding:0px;height:780px" class="row w-100">
        <!-- Columna 1: Ocupa el 15% del ancho total -->
        <div class="col-md-2 h-100 d-flex flex-column justify-content-center align-items-center colum1Inventario">
            <!-- Contenido de la primera columna -->
            <!-- Navbar Vertical -->
            <nav style="margin:0px; padding:0px;" class="navbar navbar-expand navbar-light navbarInventario">
                <!-- Contenido del Navbar -->
                <ul
                    class="navbar-nav flex-column justify-content-center align-items-center myUlInventario myUlEtiquetas">
                    <li style="border-top-right-radius: 10px;border-top-left-radius: 10px;"
                        class="nav-item liInventario">
                        <a class="nav-link" href="#/inventario/UCI">UCI</a>
                    </li>
                    <li class="nav-item liInventario">
                        <a class="nav-link" href="#/inventario/DP">DP</a>
                    </li>
                    <li class="nav-item liInventario">
                        <a class="nav-link" href="#/inventario/OE">OE</a>
                    </li>
                    <li style="border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;"
                        class="nav-item liInventario">
                        <a class="nav-link" href="#/inventario/COE">COE</a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Columna 2: Ocupa el 85% del ancho total -->
        <div class="col-md-10 colum2Inventario" style="background-color: #e0e0e0;">
            <!-- Contenido de la segunda columna -->
            <div id="mainInventario"></div>
        </div>
    </div>
</div>