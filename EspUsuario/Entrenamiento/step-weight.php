<?php
// paso 1: peso y meta
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Paso 1 – Peso y Meta | OsviladoTomate</title>
  <link rel="stylesheet" href="step-weight.css">
</head>
<body>
  <main class="step-weight">
    <div class="panel">
      <h2>¡Empecemos!</h2>
      <p>Indica tu peso y elige tu objetivo.</p>

      <form id="formStep1" action="entrenamiento.php" method="GET">
        <!-- Peso -->
        <div class="form-group">
          <label for="weight">Peso (kg):</label>
          <input
            type="number"
            id="weight"
            name="weight"
            min="30" max="300"
            placeholder="Ej. 70"
            required
          >
        </div>

        <!-- Meta -->
        <div class="goal-select">
          <h3>Selecciona tu meta</h3>
          <div class="goals-grid">
            <button type="button" class="goal-btn" data-goal="hipertrofia">Hipertrofia</button>
            <button type="button" class="goal-btn" data-goal="perdida-grasa">Pérdida de grasa</button>
            <button type="button" class="goal-btn" data-goal="crossfit">CrossFit</button>
            <button type="button" class="goal-btn" data-goal="calistenia">Calistenia</button>
            <button type="button" class="goal-btn" data-goal="ppl">PPL</button>
            <button type="button" class="goal-btn" data-goal="arnold">Arnold Split</button>
          </div>
        </div>

        <input type="hidden" name="goal" id="goal">
        <div class="form-actions">
          <button type="submit" class="btn-primary" id="nextBtn" disabled>Siguiente</button>
        </div>
      </form>
    </div>
  </main>

  <script src="step-weight.js" defer></script>
</body>
</html>
