<?php

session_start();

if (empty($_SESSION["id"])) {

    header("location: http://localhost/myproyecto/login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyProyecto</title>
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/mystyle.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Protest+Riot&display=swap');
    </style>

</head>

<body>