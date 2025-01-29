<?php
// Iniciar sesión
session_start();

// Conectar a la base de datos
$servername = "database-1.cba00ygu8qru.eu-north-1.rds.amazonaws.com";
$username = "admin";
$password = "Raul24h3rm4n0!";
$dbname = "database-1";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $correo = trim($_POST['correo']);
    $contraseña = $_POST['contraseña'];
    $confirmar_contraseña = $_POST['confirmar_contraseña'];

    // Verificar que las contraseñas coincidan
    if ($contraseña !== $confirmar_contraseña) {
        echo "Error: Las contraseñas no coinciden.";
        exit;
    }

    // Encriptar la contraseña
    $contraseña_encriptada = password_hash($contraseña, PASSWORD_DEFAULT);

    // Verificar si el correo ya está registrado
    $sql = "SELECT correo FROM usuarios WHERE correo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "Error: Este correo ya está registrado.";
        exit;
    }

    $stmt->close();

    // Insertar datos en la base de datos
    $sql = "INSERT INTO usuarios (nombre, apellido, correo, contraseña) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nombre, $apellido, $correo, $contraseña_encriptada);

    if ($stmt->execute()) {
        echo "Registro exitoso. Redirigiendo...";
        header("Refresh: 2; URL=login.html");
    } else {
        echo "Error al registrar: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>