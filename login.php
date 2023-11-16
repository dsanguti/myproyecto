<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyProyecto</title>
    <link rel="stylesheet" href="./css/mystyle.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


</head>

<body>
    <div class="container-fluid fondo-login">
        <div class="login">
            <div class="login-screen">
                <div class="tittle-login">
                    <h1>Login</h1>
                </div>

                <form class="login-form" method="post" action="">
                    <div class="control-group-login">
                        <i class="bi bi-person icon-login"></i>
                        <input type="text" name="usuario-login" class="login-field" placeholder="Introduzca Usuario" id="login-name" required>

                        <label class="login-field-icon fui-user" for="login-name"></label>
                    </div>

                    <div class="control-group-login">
                        <i class="bi bi-key icon-login"></i>
                        <input type="password" name="pass-login" class="login-field" placeholder="Introduzca clave" id="login-pass" required>
                        <label class="login-field-icon fui-lock" for="login-pass"></label>
                    </div>
                    <?php
                    include "./controlador/controlador-login.php";
                    ?>
                    <input name="btnlogin" class="btn-login btn-primary" type="submit" value="Enviar"></input>
                </form>
            </div>
        </div>
    </div>

</body>

</html>