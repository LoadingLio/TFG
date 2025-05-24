<?php
// entrenamiento.php
$weight = $_GET['weight'] ?? null;
$goal   = $_GET['goal']   ?? null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Entrenamiento | OsviladoTomate</title>
  <link rel="stylesheet" href="entrenamiento.css">
</head>
<body>
  <main id="entrenamiento" class="training">
    <div class="container">

      <?php if ($weight && $goal): ?>
      <div class="panel summary">
        <p>Peso actual: <strong><?= htmlspecialchars($weight) ?> kg</strong></p>
        <p>Objetivo: <strong><?= ucwords(str_replace('-', ' ', htmlspecialchars($goal))) ?></strong></p>
      </div>
      <?php endif; ?>

      <div class="panel">
        <h3>Elige género</h3>
        <div class="gender-select">
          <button class="gender-btn active" data-gender="hombre">Hombre</button>
          <button class="gender-btn"        data-gender="mujer">Mujer</button>
        </div>
      </div>

      <div class="panel">
        <h3>Elige nivel</h3>
        <div class="difficulty-select">
          <button class="difficulty-btn active" data-level="beginner">Principiante</button>
          <button class="difficulty-btn"        data-level="advanced">Avanzado</button>
        </div>
      </div>

      <div class="panel routine-types"></div>
      <div class="panel routine-details"></div>

    </div>
  </main>

  <script>
    const initialGoal   = <?= json_encode($goal) ?>;
    const initialWeight = <?= json_encode($weight) ?>;
  </script>
  <script src="routines.js" defer></script>
</body>
</html>
