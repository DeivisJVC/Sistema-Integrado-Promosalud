let currentStep = 0;

function showStep(step) {
  const steps = document.querySelectorAll(".step");
  steps.forEach((el, index) => {
    el.classList.toggle("active", index === step);
  });
}

function nextStep() {
  if (currentStep < 2) {
    currentStep++;
    showStep(currentStep);
  }
}

function prevStep() {
  if (currentStep > 0) {
    currentStep--;
    showStep(currentStep);
  }
}

function submitForm() {
  document.getElementById("multiStepForm").classList.toggle("d-none");
  document.getElementById("formCompleted").classList.toggle("d-none");
}

document.addEventListener("DOMContentLoaded", () => {
  showStep(currentStep);
});

function selectDay(day, dateText) {
  document.getElementById("selectedDay").innerText = day;
  document.getElementById("selectedDate").innerText = dateText;
}

// Ejemplo de función para seleccionar una hora
function selectTime(time) {
  document.getElementById("selectedTime").innerText = time;
}
