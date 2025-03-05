<?php
// Definir contraseña a probar
$contraseña_prueba = "admin";

// Generar un nuevo hash
$nuevo_hash = password_hash($contraseña_prueba, PASSWORD_BCRYPT);
echo "🔹 Nuevo hash generado: " . $nuevo_hash . "<br><br>";

// Hash almacenado en la base de datos (cambia esto por el tuyo)
$hash_guardado = '$2y$10$sMxyZHuqMwbSd14lEJLmtu5Pt8rPkpeSnKBL/WI9HJm';

// Verificar si coincide
if (password_verify($contraseña_prueba, $hash_guardado)) {
    echo "✅ La contraseña es correcta.";
} else {
    echo "❌ La contraseña es incorrecta.";
}
?>
