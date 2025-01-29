<?php
# nombre del sercvidor AWS y usuario y contraseña 
session_start();
$servername = "database-1.cba00ygu8qru.eu-north-1.rds.amazonaws.com";
$username = "admin";
$password = "Raul24h3rm4n0!";
$dbname = "database-1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    header("Location: conexion_invalida.html");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $pass);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['email'] = $email;
        header("Location: login_exitoso.html");
    } else {
        header("Location: credenciales_incorrectas.html");
    }

    $stmt->close();
}

$conn->close();
?>