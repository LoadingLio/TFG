// step-weight.js
document.addEventListener('DOMContentLoaded', () => {
  const goalBtns = document.querySelectorAll('.goal-btn');
  const hiddenGoal = document.getElementById('goal');
  const nextBtn = document.getElementById('nextBtn');
  let selectedGoal = null;

  goalBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      // Limpiar anteriores
      goalBtns.forEach(b => b.classList.remove('active'));
      // Marcar este botón
      btn.classList.add('active');
      selectedGoal = btn.dataset.goal;
      hiddenGoal.value = selectedGoal;
      // Habilitar botón Siguiente si peso y meta están definidos
      checkFormReady();
    });
  });

  // También habilitar Siguiente cuando el campo peso cambie
  const weightInput = document.getElementById('weight');
  weightInput.addEventListener('input', checkFormReady);

  function checkFormReady() {
    if (weightInput.value.trim() !== '' && selectedGoal) {
      nextBtn.disabled = false;
    } else {
      nextBtn.disabled = true;
    }
  }
});
