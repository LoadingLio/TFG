<?php
session_start();

// Verificar si la sesión está iniciada con el correo admin@admin.com
if (!isset($_SESSION['permiso']) || $_SESSION['permiso'] != 'administrador') {
    header('Location: ../index.html');
    exit;
}

// Conectar a la base de datos
$conn = mysqli_connect('localhost', 'root', 'raulemiliogermantfgsuperchachi', 'tfg');
if (!$conn) {
    die('Error de conexión: ' . mysqli_connect_error());
}

// Crear el menú
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Zetta:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="navbar">
        <div class="welcome">Bienvenido, <?php echo htmlspecialchars($_SESSION['correo']); ?> </div>
        <div class="menu">
            <a href="#">Permisos</a>
            <a href="../EspUsuario/espaciousuario.php">Inicio</a>
            <div class="submenu">
                <a href="#">Configuración</a>
                <div class="submenu-content">
                    <a href="datos_usuario.php">Datos de Usuario</a>
                    <a href="../EspUsuario/cerrar-sesion.php">Cerrar Sesión</a>
                </div>
            </div>
        </div>
    </div>

    <?php
// Verificar si se ha enviado el formulario
if (isset($_POST['cambiar_permiso'])) {
    $correo = $_POST['correo'];
    $permiso = $_POST['permiso'];

    // Verificar si el correo existe en la base de datos
    $query = "SELECT * FROM Usuarios WHERE correo = '$correo'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        // Actualizar el permiso del usuario en la base de datos
        $query = "UPDATE Usuarios SET permiso = '$permiso' WHERE correo = '$correo'";
        if (mysqli_query($conn, $query)) {
            $mensaje = '<div style="color: green; font-size: 12px; font-family: Arial; margin-top: 5px;">Permiso actualizado con éxito.</div>';
        } else {
            $mensaje = '<div style="color: red; font-size: 12px; font-family: Arial; margin-top: 5px;">Error al actualizar el permiso.</div>';
        }
    } else {
        $mensaje = '<div style="color: red; font-size: 12px; font-family: Arial; margin-top: 5px;">El correo no existe en la base de datos.</div>';
    }
}
?>
    <div class="container">
    <h1>Cambiar permisos de usuario</h1>
    <form action="" method="post">
        <label for="correo">Correo del usuario:</label>
        <input type="email" id="correo" name="correo" required>
        <br>
        <label for="permiso">Permiso:</label>
        <select id="permiso" name="permiso">
            <option value="administrador">Administrador</option>
            <option value="usuario">Usuario</option>
            <option value="entrenador">Entrenador</option>
        </select>
        <br>
        <div class="boton-mensaje">
            <button type="submit" name="cambiar_permiso">Cambiar permiso</button>
            <?php if (isset($mensaje)) { echo $mensaje; } ?>
        </div>
    </form>
</div>

    <?php
    // Cerrar la conexión a la base de datos
    mysqli_close($conn);
    ?>
</body>
</html>