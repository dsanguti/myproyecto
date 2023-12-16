<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "directorio";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

class ConectarBD
{
    private $server = "mysql: host=localhost; dbname=directorio";
    private $user = "root";
    private $pass = "";
    private $opciones = array(pdo::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
    protected $conn;

    public function abrir()
    {
        try {
            $this->conn = new PDO($this->server, $this->user, $this->pass, $this->opciones);
            return $this->conn;
        } catch (PDOException $e) {
            echo "Error al conectarse:" . $e->getMessage();
        }
    }

    public function cerrar()
    {
        $this->conn = null;
    }
}
