let currentStep = 0;

function showStep(step) {
  const steps = document.querySelectorAll(".step");
  steps.forEach((el, index) => {
    el.classList.toggle("active", index === step);
  });
}

function nextStep() {
  const steps = document.querySelectorAll(".step");

  if (currentStep === 0) {
    const examenSelect = document.getElementById("input_examen");
    if (!examenSelect || examenSelect.value === "") {
      examenSelect.classList.add("is-invalid");
      return; // No avanza al siguiente paso
    }
    examenSelect.classList.remove("is-invalid");
  }

  // Validación específica para el paso 2 (adjuntar archivo)
  if (currentStep === 1) {
    const fileInput = document.getElementById("orderFile");
    if (!fileInput || !fileInput.files || fileInput.files.length === 0) {
      fileInput.classList.add("is-invalid");
      return; // No avanza al siguiente paso
    } else {
      fileInput.classList.remove("is-invalid");
    }
  }

  // Avanzar al siguiente paso si no es el último
  if (currentStep < steps.length - 1) {
    currentStep++;
    showStep(currentStep);
  }
}

function prevStep() {
  const steps = document.querySelectorAll(".step");

  // Retroceder al paso anterior si no es el primero
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
  //document.getElementById("selectedDate").innerText = dateText;
}
// Ejemplo de función para seleccionar una hora
function selectTime(time) {
  document.getElementById("selectedTime").innerText = time;
}
