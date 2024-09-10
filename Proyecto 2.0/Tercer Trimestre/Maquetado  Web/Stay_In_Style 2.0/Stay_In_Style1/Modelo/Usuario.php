<?php
class Usuario
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Método para obtener todos los usuarios
    public function obtenerUsuarios()
    {
        $query = "SELECT * FROM usuarios";
        $stmt = $this->db->query($query); // Ejecuta la consulta
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtiene todos los resultados como un array asociativo
    }

    // Método para crear un usuario
    public function crearUsuario($nombre, $email, $password, $estado)
    {
        $query = "INSERT INTO usuarios (nombre, email, password, estado) VALUES (:nombre, :email, :password, :estado)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':estado', $estado);
        return $stmt->execute();
    }

    // Método para actualizar un usuario
    public function actualizarUsuario($id, $nombre, $email, $password, $estado)
    {
        $query = "UPDATE usuarios SET nombre = :nombre, email = :email, password = :password, estado = :estado WHERE ID_usuario = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':estado', $estado);
        return $stmt->execute();
    }

    // Método para deshabilitar un usuario
    public function deshabilitarUsuario($id)
    {
        $query = "UPDATE usuarios SET estado = 0 WHERE ID_usuario = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Método para habilitar un usuario
    public function habilitarUsuario($id)
    {
        $query = "UPDATE usuarios SET estado = 1 WHERE ID_usuario = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Método para editar un usuario
    public function editarUsuario($id, $nombre, $email, $estado)
    {
        $query = "UPDATE usuarios SET nombre = :nombre, email = :email, estado = :estado WHERE ID_usuario = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':estado', $estado);
        return $stmt->execute();
    }

    // Método para obtener un usuario específico
    public function obtenerUsuarioPorId($id)
    {
        $query = "SELECT * FROM usuarios WHERE ID_usuario = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // Obtiene un único resultado como un array asociativo
    }
}
