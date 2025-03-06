<?php
session_start();

// Configuración de la base de datos
$servername = "127.0.0.1";
$username = "root";
$password = "raulemiliogermantfgsuperchachi";
$dbname = "tfg";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = trim($_POST['correo'] ?? '');
    $contraseña = trim($_POST['contraseña'] ?? '');

    // Cifrar la contraseña con SHA-256
    $hash = hash('sha256', $contraseña);

    // Buscar usuario en la base de datos
    $stmt = $conn->prepare("SELECT * FROM Usuarios WHERE correo = ?");
    $stmt->execute([$correo]);
    $usuario = $stmt->fetch();

    // Verificar si la contraseña es correcta
    if ($usuario && $usuario['contraseña'] == $hash) {
        $_SESSION['correo'] = $usuario['correo'];
        $_SESSION['nombre'] = $usuario['nombre'];
        $_SESSION['apellido'] = $usuario['apellido'];

        echo "Inicio de sesión exitoso. Redirigiendo...";
        header("Refresh: 2; url=../EspUsuario/espaciousuario.php");
        exit;
    } else {
        die("Credenciales incorrectas.");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Zetta:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="top-bar">
            <div class="logo">
                <a href="../index.html">
                    <img alt="GOD" src="../Sources/god.png"/>
                </a>
            </div>
        </div>
        <div class="overlay">
            <div class="login-box">
                <h1>INICIE SESIÓN</h1>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">                            
                    <input type="email" name="correo" placeholder="Correo electrónico" required>
                    <input type="password" name="contraseña" placeholder="Contraseña" required>
                <label><input type="checkbox"/> Recordar Datos</label>
                <div class="botones">
                    <a href="../RegScreen/register.php" style="text-decoration: none;" class="no_cue ani_no_cue">No tengo cuenta</a> 
                    <button type="submit" class="ini_ses ani_ini_ses">Iniciar Sesión</button>                        </div>
                    <div class="error-message"></div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>