<?php
session_start();
if (!empty($_POST["btnlogin"])) {
    if (!empty($_POST["usuario-login"]) and !empty($_POST["pass-login"])) {
        $usuario = $_POST["usuario-login"];
        $pass = $_POST["pass-login"];

        //Se realiza la conexión con la basde de datos panelcontrol -->
        include_once('./bd/panelcontrol/conector_BD_panelcontrol.php');
        $sql = $conexionUsuario->query(" SELECT * FROM usuarios WHERE usuario='$usuario'AND clave='$pass' ");
        if ($datos = $sql->fetch_object()) {
            $_SESSION["id"] = $datos->id;
            $_SESSION["usuario"] = $datos->usuario;
            $_SESSION["nombre"] = $datos->nombre;
            $_SESSION["apellido"] = $datos->apellido;
            $_SESSION["perfil"] = $datos->perfil;
            $_SESSION["directorio"] = $datos->directorio;
            $_SESSION["sanciones"] = $datos->sanciones;


            header("location: http://localhost/myproyecto/");
        } else {
            echo "<div class='alert alert-danger login-alert'>Usuario y/o contraseña incorrectos</div>";
        }
    }
}
