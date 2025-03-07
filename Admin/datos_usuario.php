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
    <title>Datos de Usuario</title>
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
                    <a href="permisos.php">Permisos</a>
                    <a href="datos_usuario.php">Datos de Usuario</a>
                    <a href="../EspUsuario/cerrar-sesion.php">Cerrar Sesión</a>
            </div>
        </div>
    </div>
    <div class="container">
        <h1>Datos de Usuario</h1>
        <form action="" method="post">
            <label for="usuario">Seleccione un usuario:</label>
            <select id="usuario" name="usuario">
                <?php
                // Conectar a la base de datos
                $conn = mysqli_connect("localhost", "root", "raulemiliogermantfgsuperchachi", "tfg");

                // Verificar si la conexión fue exitosa
                if (!$conn) {
                    die("Error de conexión: " . mysqli_connect_error());
                }

                // Consulta a la base de datos para obtener los usuarios
                $query = "SELECT correo FROM Usuarios";
                $result = mysqli_query($conn, $query);

                // Verificar si la consulta fue exitosa
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['correo'] . '">' . $row['correo'] . '</option>';
                    }
                }

                // Cierra la conexión a la base de datos
                mysqli_close($conn);
                ?>
            </select>
            <br>
            <button type="submit" name="ver_datos">Ver datos</button>
        </form>
        <?php
        // Verificar si se ha enviado el formulario
        if (isset($_POST['ver_datos'])) {
            $usuario = $_POST['usuario'];

            // Conectar a la base de datos
            $conn = mysqli_connect("localhost", "root", "raulemiliogermantfgsuperchachi", "tfg");

            // Verificar si la conexión fue exitosa
            if (!$conn) {
                die("Error de conexión: " . mysqli_connect_error());
            }

            // Consulta a la base de datos para obtener los datos del usuario
            $query = "SELECT id_usuario, nombre, apellido, correo, permiso FROM Usuarios WHERE correo = '$usuario'";
            $result = mysqli_query($conn, $query);

            // Verificar si la consulta fue exitosa
            if ($result) {
                $row = mysqli_fetch_assoc($result);
                echo '<h2>Datos del usuario:</h2>';
                echo '<p>ID: ' . $row['id_usuario'] . '</p>';
                echo '<p>Nombre: ' . $row['nombre'] . '</p>';
                echo '<p>Apellido: ' . $row['apellido'] . '</p>';
                echo '<p>Correo: ' . $row['correo'] . '</p>';
                echo '<p>Permiso: ' . $row['permiso'] . '</p>';
            }

            // Cierra la conexión a la base de datos
            mysqli_close($conn);
        }
        ?>
    </div>
</body>
</html>