<?php

if (!empty($_POST["btnlogin"])) {
    if (!empty($_POST["usuario-login"]) and !empty($_POST["pass-login"])) {
        $usuario = $_POST["usuario-login"];
        $pass = $_POST["pass-login"];

        //Se realiza la conexión con la basde de datos Directorio -->
        include_once('./bd/usuarios/conector_BD_usuarios.php');
        $sql = $conexionUsuario->query(" SELECT * FROM usuarios WHERE usuario='$usuario'AND clave='$pass' ");
        if ($datos = $sql->fetch_object()) {
            header("location: http://localhost/myproyecto/");
        } else {
            echo "<div class='alert alert-danger login-alert'>Usuario y/o contraseña incorrectos</div>";
        }
    }
}
