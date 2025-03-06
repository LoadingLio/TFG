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
    <style>
        .boton {
            background-color: transparent; /* Make the button background transparent */
            color: white; /* Text color */
            border: 2px solid white; /* White border */
            padding: 10px 20px; /* Padding for the button */
            font-size: 16px; /* Font size */
            cursor: pointer; /* Pointer cursor on hover */
            transition: all 0.3s ease; /* Smooth transition for hover effect */
            text-shadow: 0 0 5px white, 0 0 10px white, 0 0 15px white; /* Neon text effect */
            box-shadow: 0 0 5px white, 0 0 10px white, 0 0 15px white; /* Neon glow effect */
        }

        .boton:hover {
            background-color: rgb(209, 209, 209); /* Light background on hover */
            box-shadow: 0 0 20px white, 0 0 30px; /* Enhanced glow on hover */
        }
    </style>

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
.footer {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            padding: 20px;
            background-color: #111;
        }
        .footer-column {
            max-width: 300px;
        }
        h3 {
            border-bottom: 2px solid #444;
            padding-bottom: 5px;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        ul li {
            margin: 5px 0;
        }
        ul li a {
            color: white;
            text-decoration: none;
        }
        .footer-bottom {
            text-align: center;
            padding: 10px;
            background-color: #000;
        }
</style>
<body>
    <div class="navbar">
        <div class="welcome">Bienvenido, <?php echo htmlspecialchars($nombre_usuario); ?> </div>
        <div class="menu">
            <?php if ($permiso == 'administrador') { ?>
                <a href="../Admin/admin.php">Admin</a>
            <?php } ?>
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
                <li><a href="inicio.php">Inicio</a>
                <li><a href="servicios.php">Servicios</a>
                <li><a href="imagenes.php">Imágenes</a>
                <li><a href="rutinas.php">Rutinas</a>
            </ul>
        </div>
        <div class="footer-column">
            <h3>Links populares</h3>
            <ul>
                <li><a href="inicio.php">Inicio</a>
                <li><a href="servicios.php">Servicios</a>
                <li><a href="imagenes.php">Imágenes</a>
                <li><a href="rutinas.php">Rutinas</a>
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
