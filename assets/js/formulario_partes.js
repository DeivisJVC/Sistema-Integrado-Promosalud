let currentStep = 0;

function showStep(step) {
  const steps = document.querySelectorAll(".step");
  steps.forEach((el, index) => {
    el.classList.toggle("active", index === step);
  });
}

function nextStep() {
  if (currentStep === 0) {
    const fileInput = document.getElementById("orderFile");
    if (!fileInput.files || fileInput.files.length === 0) {
      fileInput.classList.add("is-invalid");
      return; // no avanza al siguiente paso
    } else {
      fileInput.classList.remove("is-invalid");
    }
  }

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
