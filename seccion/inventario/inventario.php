<div class="container-fluid vh-100">
    <div class="row h-10">
        <!-- Contenido de la fila adicional al principio -->
        <div class="col-md-12" style=" padding-top:10px; text-align: center; background-color: cadetblue;">
            <h2>Inventario</h2>

        </div>
    </div>
    <div class="row h-100">
        <!-- Columna 1: Ocupa el 15% del ancho total -->
        <div class="col-md-2 bg-light d-flex flex-column justify-content-center align-items-center colum1Inventario">
            <!-- Contenido de la primera columna -->
            <!-- Navbar Vertical -->
            <nav class="navbar navbar-expand navbar-light navbarInventario" style="background-color:#3498db;transition: background-color 0.3s ease;">
                <!-- Contenido del Navbar -->
                <ul class="navbar-nav flex-column justify-content-center align-items-center myUlInventario myUlEtiquetas">
                    <li class="nav-item liInventario">
                        <a class="nav-link" href="#/inventario/UCI">UCI</a>
                    </li>
                    <li class="nav-item liInventario">
                        <a class="nav-link" href="#/inventario/DP">DP</a>
                    </li>
                    <li class="nav-item liInventario">
                        <a class="nav-link" href="#/inventario/OE">OE</a>
                    </li>
                    <li class="nav-item liInventario">
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