<?php
// Configuración de la conexión
$servername = "localhost";  // Usualmente "localhost" para servidores locales
$username = "root";         // Usuario de la base de datos
$password = "";             // Contraseña del usuario de la base de datos (usualmente vacía en XAMPP)
$dbname = "stay_in_style";    // Nombre de la base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$nombre = $conn->real_escape_string($_POST['nombre']);
$email = $conn->real_escape_string($_POST['email']);
$password = $_POST['password'];
$direccion = $conn->real_escape_string($_POST['direccion']);
$num_cel = $conn->real_escape_string($_POST['num_cel']);

// Hash de la contraseña
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Preparar la consulta SQL
$sql = "INSERT INTO usuarios (nombre, email, password, direccion, num_cel) VALUES (?, ?, ?, ?, ?)";

// Preparar la sentencia
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Error preparando la consulta: " . $conn->error);
}

// Vincular parámetros
$stmt->bind_param("sssss", $nombre, $email, $hashed_password, $direccion, $num_cel);

// Ejecutar la consulta y verificar si se insertó correctamente
if ($stmt->execute()) {
    echo "Registro guardado con éxito";
} else {
    echo "Error: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
