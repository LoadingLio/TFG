<?php
// Iniciar sesión
session_start();

// Configuración de la base de datos
$servername = "127.0.0.1";
$username = "root";
$password = "raulemiliogermantfgsuperchachi";
$dbname = "tfg";

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
    $nombre = trim($_POST['nombre'] ?? '');
    $apellido = trim($_POST['apellido'] ?? '');
    $correo = trim($_POST['correo'] ?? '');
    $contraseña = $_POST['contraseña'] ?? '';
    $confirmar_contraseña = $_POST['confirmar_contraseña'] ?? '';

    // Verificar que las contraseñas coincidan
    if ($contraseña !== $confirmar_contraseña) {
        echo "Error: Las contraseñas no coinciden.";
        exit;
    }

    // Encriptar la contraseña
    $contraseña_encriptada = password_hash($contraseña, PASSWORD_DEFAULT);

    // Verificar si el correo ya está registrado
    $stmt = $conn->prepare("SELECT correo FROM Usuarios WHERE correo = ?");
    $stmt->execute(array($correo));
    $row = $stmt->fetch();

    if ($row) {
        echo "Error: Este correo ya está registrado.";
        exit;
    }

    // Insertar datos en la base de datos
    $stmt = $conn->prepare("INSERT INTO Usuarios (nombre, apellido, correo, contraseña) VALUES (?, ?, ?, ?)");
    $stmt->execute(array($nombre, $apellido, $correo, $contraseña_encriptada));

    if ($stmt->rowCount() > 0) {
        echo "Registro exitoso!";
        exit;
    } else {
        $errorInfo = $conn->errorInfo();
        echo "Error al registrar: " . $errorInfo[2];
    }
}

// Cerrar la conexión
$conn = null;
?>