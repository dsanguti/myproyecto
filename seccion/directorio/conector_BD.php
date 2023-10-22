<?php

//Se realiza la conexión a la Base de datos


$user = "root";
$pass = "";



try {

    $pdo = new PDO('mysql:host=localhost;dbname=directorio', $user, $pass);
    //echo "Conexión Realizada";
    $pdo->exec("SET CHARACTER SET utf8");
} catch (PDOException $error) {
    echo "No se pudo conectar" . $error->getMessage();
}
