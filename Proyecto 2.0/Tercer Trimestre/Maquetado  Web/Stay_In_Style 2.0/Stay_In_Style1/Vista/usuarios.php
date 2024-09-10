<?php
require_once '../Controlador/UsuarioController.php';

// Crear instancia del controlador
$controller = new UsuarioController();

// Procesar el formulario de creación de usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion'])) {
    if ($_POST['accion'] === 'crear') {
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Crear el usuario
        $controller->crearUsuario($nombre, $email, $password);
    } elseif ($_POST['accion'] === 'editar') {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $estado = $_POST['estado'];

        // Editar el usuario
        $controller->editarUsuario($id, $nombre, $email, $estado);
    }

    // Redirigir para evitar reenvío de formulario
    header('Location: usuarios.php');
    exit();
}

// Procesar solicitud de deshabilitar usuario
if (isset($_GET['deshabilitar'])) {
    $id = $_GET['deshabilitar'];
    $controller->deshabilitarUsuario($id);

    // Redirigir para evitar reenvío de formulario
    header('Location: usuarios.php');
    exit();
}

// Listar usuarios
$usuarios = $controller->listarUsuarios();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios - Stay in Style</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
            font-size: 2.5rem;
            font-weight: bold;
        }

        table {
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        table th {
            background-color: #343a40;
            color: #fff;
            font-size: 1.1rem;
        }

        table td {
            font-size: 1rem;
            padding: 15px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            font-size: 1rem;
        }

        .btn-warning {
            background-color: #ffc107;
            border: none;
            font-size: 1rem;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
            font-size: 1rem;
        }

        .btn {
            margin: 5px;
            font-weight: bold;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .crear-usuario {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        .form-container {
            margin-top: 30px;
        }

        /*  Footer */
        footer {
            background-color: #000;
            color: #fff;
            padding: 20px 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            text-align: left;
        }

        .footer-section {
            flex: 1;
            min-width: 200px;
            margin: 10px;
        }

        .footer-section h3 {
            border-bottom: 2px solid #fff;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }

        .footer-section ul {
            list-style: none;
            padding: 0;
        }

        .footer-section ul li {
            margin: 5px 0;
        }

        .footer-section ul li a {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-section ul li a:hover {
            color: #007bff;
        }

        .social-media {
            display: flex;
            gap: 10px;
        }

        .social-media li {
            list-style: none;
        }

        .social-media li a img {
            width: 35px;
            height: 35px;
        }

        .footer-bottom {
            text-align: center;
            margin-top: 20px;
            width: 100%;
        }

        main {
            padding: 2rem;
        }

        /* Header */
        header {
            background-color: #000000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px;
            margin: 0px;
            text-align: center;
        }

        /* Logo */
        .logo {
            color: white;
            text-decoration: none;
            font-size: 40px;
        }

        /* Lista */
        nav {
            padding: 30px;
            margin: 0px;
        }

        nav ul {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        nav ul li {
            margin: 0 5px;
            position: relative;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            padding: 10px 30px;
            transition: all 0.3s ease-in-out;
            font-size: 20px;
        }

        nav ul li a:hover {
            background-color: #605f5f;
            border-radius: 5px;
        }

        nav ul li ul {
            display: none;
            position: absolute;
            top: 148%;
            left: 10%;
            list-style: none;
            padding: 15px;
            margin: 0;
            background-color: #333;
            /* Fondo del menú desplegable */
        }

        nav ul li:hover ul {
            display: block;
            color: red;
        }

        nav ul li ul li {
            display: block;
        }

        nav ul li ul li a {
            padding: 8px 15px;
            /* Ajusta el padding para hacer el hover más pequeño */
            font-size: 18px;
            margin: 5px 0;
            /* Añade espacio entre las opciones */
        }

        /* Vitrina */
        .vitrina {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
    </style>
</head>

<body style="background-color:#E5E1DA ;">
    <!-- Header -->
    <header>
        <a class="logo" href="../index.html">Stay in Style</a>
        <nav>
            <ul>
                <li><a href="../index.html">Inicio</a></li>
                <li><a href="../gestion_stock.html">Menu administrador</a></li>
            </ul>
        </nav>
    </header>


    <div class="container">
        <h1>Gestión de Usuarios</h1>

        <!-- Formulario para crear un nuevo usuario -->
        <div class="form-container">
            <h2>Crear Usuario</h2>
            <form action="usuarios.php" method="post">
                <input type="hidden" name="accion" value="crear">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Crear Usuario</button>
            </form>
        </div>

        <!-- Tabla de usuarios -->
        <table class="table table-hover table-bordered mt-5">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($usuario['ID_usuario']); ?></td>
                        <td><?php echo htmlspecialchars($usuario['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($usuario['email']); ?></td>
                        <td><?php echo $usuario['estado'] == 1 ? 'Activo' : 'Inactivo'; ?></td>
                        <td>
                            <!-- Botón para abrir el modal de editar -->
                            <button class="btn btn-warning" data-toggle="modal" data-target="#editarModal<?php echo $usuario['ID_usuario']; ?>">Editar</button>

                            <!-- Modal para editar usuario -->
                            <div class="modal fade" id="editarModal<?php echo $usuario['ID_usuario']; ?>" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel<?php echo $usuario['ID_usuario']; ?>" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editarModalLabel<?php echo $usuario['ID_usuario']; ?>">Editar Usuario</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="usuarios.php" method="post">
                                                <input type="hidden" name="accion" value="editar">
                                                <input type="hidden" name="id" value="<?php echo $usuario['ID_usuario']; ?>">
                                                <div class="form-group">
                                                    <label for="nombre">Nombre</label>
                                                    <input type="text" class="form-control" name="nombre" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="estado">Estado</label>
                                                    <select class="form-control" name="estado">
                                                        <option value="1" <?php if ($usuario['estado'] == 1) echo 'selected'; ?>>Activo</option>
                                                        <option value="0" <?php if ($usuario['estado'] == 0) echo 'selected'; ?>>Inactivo</option>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Botón para deshabilitar usuario -->
                            <button class="btn btn-danger" data-toggle="modal" data-target="#deshabilitarModal<?php echo $usuario['ID_usuario']; ?>">Deshabilitar</button>

                            <!-- Modal para deshabilitar usuario -->
                            <div class="modal fade" id="deshabilitarModal<?php echo $usuario['ID_usuario']; ?>" tabindex="-1" role="dialog" aria-labelledby="deshabilitarModalLabel<?php echo $usuario['ID_usuario']; ?>" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deshabilitarModalLabel<?php echo $usuario['ID_usuario']; ?>">Deshabilitar Usuario</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>¿Estás seguro de que deseas deshabilitar al usuario <strong><?php echo htmlspecialchars($usuario['nombre']); ?></strong>?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="usuarios.php" method="get">
                                                <input type="hidden" name="deshabilitar" value="<?php echo $usuario['ID_usuario']; ?>">
                                                <button type="submit" class="btn btn-danger">Deshabilitar</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- Footer -->
    <footer>

        <div class="footer-bottom">
            <p>&copy; 2024 Stay in Style</p>
        </div>
    </footer>
</body>

</html>