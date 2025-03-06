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
    <title>Espacio Usuario - GOD</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Zetta:wght@100..900&display=swap" rel="stylesheet">
</head>
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
    padding: 15px 40px;
}
.navbar .welcome {
    color: white;
    font-size: 20px;
    margin-right: auto; /* This makes the welcome text stay on the left */
}
.navbar .menu {
    display: flex;
    align-items: center; /* Align items to the center vertically */
    gap: 10px; /* Reduce the space between menu items */
    margin: 10px;
}
.navbar .menu a {
    color: white;
    padding: 5px; /* Reduce padding for smaller spacing */
    
}

.submenu {
    position: relative;
    margin:10px;
}
.navbar .submenu-content {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background-color: #555;
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
    font-size:5px;
    padding:10px;
}

.navbar .submenu-content a {
    display: block;
    padding: 5px;
    margin-bottom: 5px;
}
.submenu:hover .submenu-content {
    display: block;
}
</style>
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
    <div class="botones-verticales">
        <div class="boton-container">
            <button class="boton">Agenda</button>
        </div>
        <div class="boton-container">
            <button class="boton">Entrenamiento</button>
        </div>
        <div class="boton-container">
            <button class="boton">Composición corporal</button>
        </div>
        <div class="boton-container">
            <button class="boton">Dieta</button>
        </div>
    </div>
</body>
</html>