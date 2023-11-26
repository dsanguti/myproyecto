<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=directorio", "root", "");
} catch (PDOException $e) {
    print $e->getMessage() . "";
    die();
}
