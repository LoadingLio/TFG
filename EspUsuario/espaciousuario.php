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

    // Consulta a la base de datos para obtener el permiso y el nombre del usuario
    $query = "SELECT permiso, nombre FROM Usuarios WHERE correo = '$correo'";
    $result = mysqli_query($conn, $query);

    // Verifica si la consulta fue exitosa
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $permiso = $row['permiso'];
        $nombre_usuario = $row['nombre'];

        // Setea las variables de sesión con el permiso y el nombre del usuario
        $_SESSION['permiso'] = $permiso;
        $_SESSION['nombre_usuario'] = $nombre_usuario;
    }
}

// Cierra la conexión a la base de datos
mysqli_close($conn);

// Verifica si la variable de sesión permiso está seteada
if (isset($_SESSION['permiso'])) {
    $permiso = $_SESSION['permiso'];
} else {
    $permiso = '';
}

// Verifica si la variable de sesión nombre_usuario está seteada
if (isset($_SESSION['nombre_usuario'])) {
    $nombre_usuario = $_SESSION['nombre_usuario'];
} else {
    $nombre_usuario = '';
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
<body>
    <div class="navbar">
        <div class="welcome">Bienvenido, <?php echo htmlspecialchars($nombre_usuario); ?> </div>
        <div class="menu">
            <a href="espaciousuario.php">Inicio</a>

            <?php if ($permiso == 'administrador') { ?>
                <a href="../Admin/permisos.php">Permisos</a>
                <a href="../Admin/datos_usuario.php">Datos de Usuario</a>
            <?php } ?>

            <?php if ($permiso == 'usuario') { ?>
            <a href="servicios.php">Servicios</a>
            <a href="imagenes.php">Imágenes</a>
            <a href="rutinas.php">Rutinas</a>
            <div class="submenu">
                <a href="#">Configuración</a>
                <div class="submenu-content">
                    <a href="datos_usuario.php">Datos de Usuario</a>
                    <?php } ?>
                    <a href="cerrar-sesion.php">Cerrar Sesión</a>
                </div>
            </div>
        </div>
    </div>
    <div class="botones-verticales">
    <div class="boton-container-agenda">
  <button class="boton">Agenda</button>
</div>

<div class="boton-container-entrenamiento">
  <button class="boton">Entrenamiento</button>
</div>

<div class="boton-container-composicion-corporal">
  <button class="boton">Composición corporal</button>
</div>

<div class="boton-container-dieta">
  <button class="boton">Dieta</button>
</div>
    </div>
    <footer class="footer">
        <div class="footer-column">
            <h3>Contactanos</h3>
            <p>📍 Avenida del Doctor Gadea, 35, Alicante, España</p>
            <p>📞 +34 685 704 827</p>
            <p>✉ GodGymContact@gmail.com</p>
        </div>
        <div class="footer-column">
            <h3>Links rápidos</h3>
            <ul>
                <li><a href="inicio.php">Inicio</a></li>
                <li><a href="servicios.php">Servicios</a></li>
                <li><a href="imagenes.php">Imágenes</a></li>
                <li><a href="rutinas.php">Rutinas</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h3>Links populares</h3>
            <ul>
                <li><a href="inicio.php">Inicio</a></li>
                <li><a href="servicios.php">Servicios</a></li>
                <li><a href="imagenes.php">Imágenes</a></li>
                <li><a href="rutinas.php">Rutinas</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h3>Horario</h3>
            <p>Lunes - Viernes: 7:00 - 22:00 </p>
            <p>Sabado - Domingo: 8:00 - 13:00 </p>
        </div>
    </footer>
    <div class="footer-bottom">
        <p>© GodGym. Todos los derechos reservados. Diseñado por OsVilaDoTomate</p>
    </div>
</body>
</html>
