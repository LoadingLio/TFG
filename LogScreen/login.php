<?php
// Inicializar la sesión
session_start();

// Configuración de la base de datos
$servername = "database-1.cba00ygu8qru.eu-north-1.rds.amazonaws.com";
$username = "admin";
$password = "Raul24h3rm4n0!";
$dbname = "TFG"; // Asegúrate de que este sea el nombre correcto de la base de datos

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
    // Validar los datos
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        $email = trim($_POST["email"]);
        $pass = trim($_POST["password"]);

        // Verificar que los campos no estén vacíos
        if (empty($email) || empty($pass)) {
            echo "Por favor, complete todos los campos.";
            exit;
        }

        // Preparar la consulta SQL
        $stmt = $conn->prepare("SELECT * FROM Usuarios WHERE correo = :email AND contraseña = :password");
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $pass);

        // Ejecutar la consulta SQL
        try {
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                // Iniciar la sesión
                $_SESSION['email'] = $email;
                header("Location: login_exitoso.html");
                exit;
            } else {
                echo "Credenciales incorrectas.";
                exit;
            }
        } catch (PDOException $e) {
            echo "Error de consulta: " . $e->getMessage();
            exit;
        }
    } else {
        echo "Por favor, complete todos los campos.";
        exit;
    }
}

// Cerrar la conexión
$conn = null;
?>