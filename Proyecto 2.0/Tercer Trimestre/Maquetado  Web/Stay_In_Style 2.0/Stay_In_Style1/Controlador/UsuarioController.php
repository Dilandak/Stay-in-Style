<?php
require_once '../Modelo/Conexion.php'; // Ruta relativa desde Controlador a Modelo
require_once '../Modelo/Usuario.php';  // Ruta relativa desde Controlador a Modelo

class UsuarioController
{
    private $modelo;

    public function __construct()
    {
        $conexion = new Conexion();
        $this->modelo = new Usuario($conexion->conectar());
    }

    // Método para listar todos los usuarios
    public function listarUsuarios()
    {
        return $this->modelo->obtenerUsuarios();
    }

    // Método para crear un usuario
    public function crearUsuario($nombre, $email, $password)
    {
        $estado = 1; // Activo por defecto
        return $this->modelo->crearUsuario($nombre, $email, $password, $estado);
    }

    // Método para actualizar un usuario
    public function actualizarUsuario($id, $nombre, $email, $password, $estado)
    {
        return $this->modelo->actualizarUsuario($id, $nombre, $email, $password, $estado);
    }

    // Método para deshabilitar un usuario
    public function deshabilitarUsuario($id)
    {
        return $this->modelo->deshabilitarUsuario($id);
    }

    // Método para habilitar un usuario
    public function habilitarUsuario($id)
    {
        return $this->modelo->habilitarUsuario($id);
    }

    // Método para editar un usuario
    public function editarUsuario($id, $nombre, $email, $estado)
    {
        return $this->modelo->editarUsuario($id, $nombre, $email, $estado);
    }

    // Método para obtener un usuario específico
    public function obtenerUsuario($id)
    {
        return $this->modelo->obtenerUsuarioPorId($id);
    }
}
