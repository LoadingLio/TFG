<?php
session_start();

// Conectar a la base de datos
$conn = mysqli_connect("localhost", "root", "raulemiliogermantfgsuperchachi", "tfg");

// Verificar si la conexión fue exitosa
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION['correo'])) {
    $correo = $_SESSION['correo'];

    // Consulta a la base de datos para obtener el permiso del usuario
    $query = "SELECT permiso FROM Usuarios WHERE correo = '$correo'";
    $result = mysqli_query($conn, $query);

    // Verificar si la consulta fue exitosa
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $permiso = $row['permiso'];

        // Setea la variable de sesión con el permiso del usuario
        $_SESSION['permiso'] = $permiso;
    }
}

// Cierra la conexión a la base de datos
mysqli_close($conn);

// Verificar si la variable de sesión permiso está seteada
if (isset($_SESSION['permiso'])) {
    $permiso = $_SESSION['permiso'];
} else {
    $permiso = '';
}
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
        <div class="welcome">Bienvenido, <?php echo htmlspecialchars($_SESSION['nombre_usuario']); ?> </div>
        <div class="menu">
            <a href="../EspUsuario/espaciousuario.php">Inicio</a>
            <a href="#">Permisos</a>
            <a href="datos_usuario.php">Datos de Usuario</a>
            <a href="../EspUsuario/cerrar-sesion.php">Cerrar Sesión</a>
        </div>
    </div>

    <div class="container">
        <h1>Cambiar permisos de usuario</h1>
        <form action="" method="post">
            <label for="correo">Seleccione un usuario:</label>
            <select id="correo" name="correo">
                <?php
                $conn = mysqli_connect("localhost", "root", "raulemiliogermantfgsuperchachi", "tfg");
                $query = "SELECT correo FROM Usuarios";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . $row['correo'] . '">' . $row['correo'] . '</option>';
                }
                mysqli_close($conn);
                ?>
            </select>
            <br>
            <label for="permiso">Permiso:</label>
            <select id="permiso" name="permiso">
                <option value="administrador">Administrador</option>
                <option value="usuario">Usuario</option>
                <option value="entrenador">Entrenador</option>
            </select>
            <br>
            <button type="submit" name="cambiar_permiso">Cambiar permiso</button>
        </form>
        <?php
        // Verificar si se ha enviado el formulario
        if (isset($_POST['cambiar_permiso'])) {
            $correo = $_POST['correo'];
            $permiso = $_POST['permiso'];

            // Verificar si el correo existe en la base de datos
            $conn = mysqli_connect("localhost", "root", "raulemiliogermantfgsuperchachi", "tfg");
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
            mysqli_close($conn);
        }
        ?>
        <?php if (isset($mensaje)) { echo $mensaje; } ?>
    </div>
</body>
</html>