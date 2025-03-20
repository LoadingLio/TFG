<?php
session_start();

$conn = mysqli_connect("localhost", "root", "raulemiliogermantfgsuperchachi", "tfg");

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

if (isset($_SESSION['usuario_id'])) {
    $usuario_id = $_SESSION['usuario_id'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $actividad = mysqli_real_escape_string($conn, $_POST['actividad']);

    $query = "INSERT INTO agenda (usuario_id, fecha, hora, actividad) VALUES ('$usuario_id', '$fecha', '$hora', '$actividad')";
    
    if (mysqli_query($conn, $query)) {
        header("Location: agenda.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Debes iniciar sesión.";
}

mysqli_close($conn);
?>
