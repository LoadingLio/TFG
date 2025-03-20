<?php
session_start();

$conn = mysqli_connect("localhost", "root", "raulemiliogermantfgsuperchachi", "tfg");

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

if (isset($_GET['id']) && isset($_SESSION['usuario_id'])) {
    $id = $_GET['id'];
    $usuario_id = $_SESSION['usuario_id'];

    // Aseguramos que el usuario solo pueda eliminar sus propias rutinas
    $query = "DELETE FROM agenda WHERE id = '$id' AND usuario_id = '$usuario_id'";

    if (mysqli_query($conn, $query)) {
        header("Location: agenda.php");
    } else {
        echo "Error al eliminar: " . mysqli_error($conn);
    }
} else {
    echo "Acceso no autorizado.";
}

mysqli_close($conn);
?>
