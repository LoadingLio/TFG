<?php
session_start();

// Conexión a la base de datos
$conn = mysqli_connect("localhost", "root", "raulemiliogermantfgsuperchachi", "tfg");

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Verificar sesión de usuario
if (isset($_SESSION['correo'])) {
    $correo = $_SESSION['correo'];
    $query = "SELECT id, permiso, nombre FROM Usuarios WHERE correo = '$correo'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $usuario_id = $row['id'];
        $permiso = $row['permiso'];
        $nombre_usuario = $row['nombre'];

        $_SESSION['usuario_id'] = $usuario_id;
        $_SESSION['permiso'] = $permiso;
        $_SESSION['nombre_usuario'] = $nombre_usuario;
    }
}

// Obtener eventos de la agenda
$agenda_query = "SELECT * FROM agenda WHERE usuario_id = '$usuario_id' ORDER BY fecha, hora";
$agenda_result = mysqli_query($conn, $agenda_query);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda - GOD</title>
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>
    <style>
        body {
            background: linear-gradient(to bottom, rgb(0, 0, 0), rgb(20, 20, 20));
            color: white;
            font-family: 'Lexend Zetta', sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: black;
            padding: 15px 40px;
            border-bottom: 2px solid rgba(255, 255, 255, 0.7);
        }

        .navbar .welcome {
            color: white;
            font-size: 15px;
            font-weight: bold;
        }

        .navbar .menu {
            display: flex;
            gap: 25px;
        }

        .navbar .menu a {
            color: white;
            text-decoration: none;
            padding: 12px 18px;
            font-size: 16px;
            font-weight: 600;
            transition: all 0.3s ease;
            border-radius: 8px;
            border: 2px solid transparent;
        }

        .navbar .menu a:hover {
            background-color: black;
            color: white;
            border-color: white;
            box-shadow: 0px 0px 15px white;
        }

        h2, h3 {
            text-shadow: 0 0 5px white, 0 0 10px gray;
        }

        .calendar-container {
            width: 50%;
            margin: 20px auto;
            padding: 20px;
            background: rgba(0, 0, 0, 0.8);
            border-radius: 15px;
            box-shadow: 0px 0px 15px rgba(255, 255, 255, 0.7);
        }

        .form-container {
            background: rgba(0, 0, 0, 0.8);
            padding: 25px;
            width: 50%;
            margin: 20px auto;
            border-radius: 15px;
            box-shadow: 0px 0px 15px rgba(255, 255, 255, 0.7);
        }


        label {
            display: block;
            margin: 10px 0 5px;
            font-size: 18px;
        }

        input, button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: none;
            font-size: 16px;
        }

        input {
            background-color: black;
            color: white;
            border: 2px solid white;
            outline: none;
        }

        input:focus {
            box-shadow: 0px 0px 10px white;
        }

        button {
            background-color: white;
            color: black;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            border: none;
        }

        button:hover {
            background-color: gray;
            color: white;
            box-shadow: 0px 0px 10px white;
        }

        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
            box-shadow: 0px 4px 10px rgba(255, 255, 255, 0.2);
        }

        th, td {
            padding: 10px;
            border: 1px solid white;
        }

        th {
            background-color: rgba(255, 255, 255, 0.1);
        }

        td a {
            color: #f5f5f5;
            text-decoration: none;
            font-weight: bold;
        }

        td a:hover {
            color: darkred;
        }

        .footer {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    padding: 20px;
    background-color: #161616;
}

.footer-column {
    max-width: 300px;
}

h3 {
    border-bottom: 2px solid #444;
    padding-bottom: 5px;
    text-shadow: 0 0 5px white, 0 0 10px black, 0 0 15px gray;
}

ul {
    list-style: none;
    padding: 0;
}

ul li {
    margin: 5px 0;
}

ul li a {
    color: white;
    text-decoration: none;
}

.footer-bottom {
    text-align: center;
    padding: 10px;
    background-color: #000;
}
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                themeSystem: 'dark',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                selectable: true,
                editable: true,
                dateClick: function(info) {
                    document.getElementById('fecha').value = info.dateStr;
                }
            });
            calendar.render();
        });
    </script>
</head>
<body>

    <div class="navbar">
        <div class="welcome">Bienvenido, <?php echo htmlspecialchars($nombre_usuario); ?></div>
        <div class="menu">
            <a href="../espaciousuario.php">Inicio</a>
            <a href="../datos_usuario.php">Datos de Usuario</a>
            <a href="../cerrar-sesion.php">Cerrar Sesión</a>
        </div>
    </div>

    <h2>Mi Agenda</h2>

    <!-- Calendario interactivo -->
    <div class="calendar-container">
        <div id="calendar"></div>
    </div>

    <div class="form-container">
        <form action="guardar_agenda.php" method="POST">
            <label for="fecha">Fecha:</label>
            <input type="date" name="fecha" id="fecha" required>

            <label for="hora">Hora:</label>
            <input type="time" name="hora" step="60" required>

            <label for="actividad">Actividad:</label>
            <input type="text" name="actividad" required>

            <button type="submit">Guardar</button>
        </form>
    </div>

    <h3>Mis Rutinas</h3>
    <table>
        <tr>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Actividad</th>
            <th>Acción</th>
        </tr>
        <?php while ($agenda = mysqli_fetch_assoc($agenda_result)) { ?>
            <tr>
                <td><?php echo $agenda['fecha']; ?></td>
                <td><?php echo date('H:i', strtotime($agenda['hora'])); ?></td>
                <td><?php echo htmlspecialchars($agenda['actividad']); ?></td>
                <td><a href="eliminar_agenda.php?id=<?php echo $agenda['id']; ?>">Eliminar</a></td>
            </tr>
        <?php } ?>
    </table>

    <footer class="footer">
        <div class="footer-column">
            <h3>Contactanos</h3>
            <p>📍 Avenida del Doctor Gadea, 35, Alicante, España</p>
            <p>📞 +34 685 704 827</p>
            <p>✉ GodGymContact@gmail.com</p>
        </div>
        <div class="footer-column">
            <h3>Links rápidos</h3>
            <ul>
                <li><a href="../espaciousuario.php">Inicio</a></li>
                <li><a href="../Agenda/agenda.php">Agenda</a></li>
                <li><a href="../Entrenamiento/entrenamiento.php">Entrenamiento</a></li>
                <li><a href="../Composicion/composicion-corp.php">Composicion Corporal</a></li>
                <li><a href="../Dieta/dieta.php">Dieta</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h3>Links populares</h3>
            <ul>
                <li><a href="../espaciousuario.php">Inicio</a></li>
                <li><a href="../Agenda/agenda.php">Agenda</a></li>
                <li><a href="../Entrenamiento/entrenamiento.php">Entrenamiento</a></li>
                <li><a href="../Composicion/composicion-corp.php">Composicion Corporal</a></li>
                <li><a href="../Dieta/dieta.php">Dieta</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h3>Horario</h3>
            <p>Lunes - Viernes: 7:00 - 22:00 </p>
            <p>Sabado - Domingo: 8:00 - 13:00 </p>
        </div>
    </footer>
    <div class="footer-bottom">
        <p>© GodGym. Todos los derechos reservados. Diseñado por OsVilaDoTomate</p>
    </div>

</body>
</html>
