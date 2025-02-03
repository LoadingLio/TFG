<?php
// Inicializar la sesión
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
        $_SESSION['nombre'] = $row['nombre'];
        $_SESSION['apellido'] = $row['apellido'];
        

        // Redirige al usuario a espaciousuario.php
        header('Location: ../EspUsuario/espaciousuario.php');
        exit;
    } else {
        // Mostrar mensaje de error
        echo "<script>alert('Credenciales incorrectas');</script>";
        exit;
    }
}

// Cerrar la conexión
$conn = null;
?>