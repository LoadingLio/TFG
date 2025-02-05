<?php
session_start();

// Conecta a la base de datos
$conn = mysqli_connect("localhost", "root", "raulemiliogermantfgsuperchachi", "tfg");

// Verifica si la conexión fue exitosa
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Verifica si el usuario ha iniciado sesión
if (isset($_SESSION['correo'])) {
    $correo = $_SESSION['correo'];

    // Consulta a la base de datos para obtener el nombre del usuario
    $query = "SELECT nombre FROM usuarios WHERE correo = '$correo'";
    $result = mysqli_query($conn, $query);

    // Verifica si la consulta fue exitosa
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $nombre_usuario = $row['nombre'];

        // Setea la variable de sesión con el nombre del usuario
        $_SESSION['nombre_usuario'] = ucfirst($nombre_usuario);
    }
}

// Cierra la conexión a la base de datos
mysqli_close($conn);

// Verifica si la variable de sesión nombre_usuario está seteada
if (isset($_SESSION['nombre_usuario'])) {
    $usuario = $_SESSION['nombre_usuario'];
} else {
    $usuario = 'Invitado';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tomás Suárez - Jugador Profesional</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background: linear-gradient(to bottom, rgb(0, 0, 0), rgb(0, 0, 0));
            color: white;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            padding: 10px 20px;
        }
        .navbar .welcome {
            color: white;
            font-size: 18px;
            margin-right: auto; /* This makes the welcome text stay on the left */
        }
        .menu {
            display: flex;
            align-items: center; /* Align items to the center vertically */
            gap: 10px; /* Reduce the space between menu items */
        }
        .menu a {
            color: white;
            padding: 8px 12px; /* Reduce padding for smaller spacing */
            text-decoration: none;
            display: block;
        }
        .menu a:hover {
            background-color: #444;
        }
        .submenu {
            position: relative;
        }
        .submenu-content {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #555;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        }
        .submenu:hover .submenu-content {
            display: block;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="welcome">Bienvenido, <?php echo htmlspecialchars($usuario); ?> </div>
        <div class="menu">
            <a href="inicio.php">Inicio</a>
            <a href="servicios.php">Servicios</a>
            <a href="imagenes.php">Imágenes</a>
            <a href="rutinas.php">Rutinas</a>
            <div class="submenu">
                <a href="#">Configuración</a>
                <div class="submenu-content">
                    <a href="datos_usuario.php">Datos de Usuario</a>
                    <a href="cerrar-sesion.php">Cerrar Sesión</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>