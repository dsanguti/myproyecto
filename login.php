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
    <div class="login">
        <div class="login-screen">
            <div class="tittle-login">
                <h1>Login</h1>
            </div>

            <form class="login-form">
                <div class="control-group">
                    <i class="bi bi-person icon-login"></i>
                    <input type="text" class="login-field" placeholder="Introduzca Usuario" id="login-name" required>

                    <label class="login-field-icon fui-user" for="login-name"></label>
                </div>

                <div class="control-group">
                    <i class="bi bi-key icon-login"></i>
                    <input type="password" class="login-field" value="" placeholder="Introduzca clave" id="login-pass"
                        required>
                    <label class="login-field-icon fui-lock" for="login-pass"></label>
                </div>

                <button class="btn btn-primary" type="submit">Entrar</button>
            </form>
        </div>
    </div>
</body>

</html>