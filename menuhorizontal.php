<!-- MENÚ HORIZONTAL PPAL-->
<div class="container-fluid">
    <div class="row px-0">
        <div class="col px-0">
            <nav style="box-shadow: 0px 10px 5px -1px rgba(96,111,212,0.38);"
                class="navbar navbar navbar-dark bg-primary navbar-expand-lg ">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#/">DSG</a>
                    <?php
                    $miSesion = $_SESSION["perfil"];
                    if ($miSesion === "admin") {
                        echo "<a class='navbar-brand' style='color:#E29930;' href='#/panelcontrol'>Panel Control</a>";
                    }
                    ?>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse flex-row-reverse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown mx-2">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Oficina
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">opcion1</a></li>
                            </li>
                        </ul>
                        </li>
                        <li class="nav-item dropdown mx-2">
                            <a class="nav-link dropdown-toggle" data-bs-auto-close="outside" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Dir.Provincial
                            </a>
                            <ul class="dropdown-menu">
                                <li class="dropend">
                                    <a class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"
                                        href="#/prestaciones">Prestaciones</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#/prestaciones/sanciones" class="dropdown-item">Sanciones</a></li>
                                        <li><a href="#/prestaciones/recl.previas" class="dropdown-item">Recl.Previas</a>
                                        </li>
                                        <li><a href="#/prestaciones/demandas" class="dropdown-item">Demandas</a></li>
                                    </ul>
                                </li>
                                <li class="dropend">
                                    <a class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"
                                        href="#/formacion">Formación</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#/formacion/becas" class="dropdown-item">Becas</a></li>

                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link Link" id="directorioSeccion" href="#/directorio">Directorio</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link Link" id="inventarioSeccion" href="#/inventario">Inventario</a>
                        </li>
                        <li class="nav-item dropdown mx-2">
                            <a style="color:#E29930;" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <?php
                                echo $_SESSION["nombre"] . " " . $_SESSION["apellido"];
                                ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="./controlador/controlador-cerrar-sesion.php">Cerrar
                                        Sesión</a>
                                </li>
                            </ul>
                        </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>