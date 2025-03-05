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
    $nombre = trim($_POST['nombre'] ?? '');
    $apellido = trim($_POST['apellido'] ?? '');
    $correo = trim($_POST['correo'] ?? '');
    $contraseña = trim($_POST['contraseña'] ?? '');
    $confirmar_contraseña = trim($_POST['confirmar_contraseña'] ?? '');

    // Verificar que todos los campos están llenos
    if (empty($nombre) || empty($apellido) || empty($correo) || empty($contraseña) || empty($confirmar_contraseña)) {
        die("Error: Por favor, complete todos los campos.");
    }

    // Verificar que las contraseñas coinciden
    if ($contraseña !== $confirmar_contraseña) {
        die("Error: Las contraseñas no coinciden.");
    }

    // Cifrar la contraseña con SHA-256
    $hash = hash('sha256', $contraseña);

    // Verificar si el correo ya existe
    $stmt = $conn->prepare("SELECT correo FROM Usuarios WHERE correo = ?");
    $stmt->execute([$correo]);
    if ($stmt->fetch()) {
        die("Error: Este correo ya está registrado.");
    }

    // Insertar usuario en la base de datos
    $stmt = $conn->prepare("INSERT INTO Usuarios (nombre, apellido, correo, contraseña) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$nombre, $apellido, $correo, $hash])) {
        echo "Registro exitoso. Redirigiendo al inicio de sesión...";
        header("Refresh: 2; url=../LogScreen/login.php");
    } else {
        die("Error al registrar el usuario.");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
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
            <div class="register-box">
                <h1>REGISTRO</h1>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="register-form">
                    <input type="text" name="nombre" placeholder="Nombre" required>
                    <input type="text" name="apellido" placeholder="Primer Apellido" required>
                    <input type="email" name="correo" placeholder="Correo electrónico" required>
                    <input type="password" name="contraseña" placeholder="Contraseña" required id="password">
                    <input type="password" name="confirmar_contraseña" placeholder="Confirmar contraseña" required id="confirm-password">
                    <br>
                    <div class="botones">
                        <button type="submit" class="boton animacion">Registrarme ahora</button>
                        <button type="button" class="boton animacion" onclick="location.href='../LogScreen/login.html'">Ya tengo cuenta</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script> 
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('confirm-password');
        const errorMessage = document.getElementById('error-message');
        const registerForm = document.getElementById('register-form');

        registerForm.addEventListener('submit', (e) => {
            if (passwordInput.value !== confirmPasswordInput.value) {
                e.preventDefault();
                errorMessage.textContent = 'Las contraseñas no coinciden.';
                errorMessage.style.display = 'block';
            }
        });
    </script>
</body>
</html>