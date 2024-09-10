<?php

class Conexion {
    private $host = "localhost";  // Cambia si tu base de datos está en otro servidor
    private $dbname = "stay_in_style";  // Nombre de la base de datos
    private $username = "root";  // Cambia si tu usuario es diferente
    private $password = "";  // Cambia si tu contraseña es diferente
    private $conexion;

    public function __construct() {
        try {
            $this->conexion = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
            // Establecer el modo de error de PDO a excepción
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        }
    }

    public function conectar() {
        return $this->conexion;
    }

    // Método para cerrar la conexión (opcional)
    public function cerrarConexion() {
        $this->conexion = null;
    }
}
