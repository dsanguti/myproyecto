<?php
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


//Se realiza la conexión a la Base de datos


// $user = "root";
// $pass = "";



// try {

//     $pdo = new PDO('mysql:host=localhost;dbname=directorio', $user, $pass);
//     //echo "Conexión Realizada";
//     $pdo->exec("SET CHARACTER SET utf8");
// } catch (PDOException $error) {
//     echo "No se pudo conectar" . $error->getMessage();
// }