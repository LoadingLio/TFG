<?php
// Inicializar la sesión
session_start();
// Configuración de la base de datos
$servername = "database-1.cba00ygu8qru.eu-north-1.rds.amazonaws.com";
$username = "admin";
$password = "Raul24h3rm4n0!";
$dbname = "TFG";

// Conectar a la base de datos con PDO
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit;
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extraer valores del formulario
    $correo = trim($_POST['correo'] ?? '');
    $contraseña = trim($_POST['contraseña'] ?? '');

    // Verificar que los campos no estén vacíos
    if (empty($correo) || empty($contraseña)) {
        echo "Por favor, complete todos los campos.";
        exit;
    }

    // Encriptar la contraseña
    $contraseña_encriptada = password_hash($contraseña, PASSWORD_DEFAULT);

    // Preparar la consulta SQL
    $stmt = $conn->prepare("SELECT * FROM Usuarios WHERE correo = ?");
    $stmt->execute(array($correo));
    $row = $stmt->fetch();

    // Verificar si la contraseña es correcta
    if (password_verify($contraseña, $row['contraseña'])) {
        // Iniciar la sesión
        $_SESSION['correo'] = $correo;
        header("Location: login_exitoso.html");
        exit;
    } else {
        echo "Credenciales incorrectas.";
        exit;
    }
}

// Cerrar la conexión
$conn = null;
?>