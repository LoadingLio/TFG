<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tomás Suárez - Jugador Profesional</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background: linear-gradient(to bottom,rgb(0, 0, 0),rgb(0, 0, 0));
            color: white;
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        header {
            padding: 20px;
        }
        .social-icons img {
            width: 30px;
            margin: 5px;
        }
        .clips-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }
        .clip {
            border: 2px solid orange;
            padding: 10px;
            border-radius: 10px;
            background: rgba(0, 0, 0, 0.5);
        }
        .clip img {
            width: 200px;
            border-radius: 5px;
        }
        .cerrar-sesion {
    position: absolute;
    top: 20px;
    right: 20px;
    font-size: 16px;
    color: #fff;
    text-decoration: none;
}

.cerrar-sesion a:hover {
    color: #ccc;
}
    </style>
</head>
<body>
    <header>
    <?php if (isset($_SESSION['nombre']) && isset($_SESSION['apellido'])) { ?>
        <h1><?php echo $_SESSION['nombre'] . ' ' . $_SESSION['apellido']; ?></h1>
    <?php } else { ?>
        <h1>Usuario no autenticado</h1>
    <?php } ?>
    <p>Jugador profesional del equipo TREXX</p>        
        <div class="social-icons">
            <a href="#"><img src="discord.png" alt="Discord"></a>
            <a href="#"><img src="twitter.png" alt="Twitter"></a>
            <a href="#"><img src="twitch.png" alt="Twitch"></a>
            <a href="#"><img src="youtube.png" alt="YouTube"></a>
        </div>
        <div class="cerrar-sesion">
            <a href="cerrar-sesion.php">Cerrar sesión</a>
        </div>
    </header>
    <section class="clips">
    <h2>LOS MEJORES CLIPS DE <?php echo $_SESSION['nombre']; ?></h2>        
        <div class="clips-container">
            <div class="clip">
                <img src="clip1.jpg" alt="Camino a la liga">
                <p>Camino a la liga (temporada 4)</p>
            </div>
            <div class="clip">
                <img src="clip2.jpg" alt="Transmisión nocturna">
                <p>Transmisión nocturna de campeonato (temporada 4)</p>
            </div>
            <div class="clip">
                <img src="clip3.jpg" alt="Diversión con amigos">
                <p>Diversión con amigos: noche de gaming</p>
            </div>
        </div>
    </section>
</body>
</html>
