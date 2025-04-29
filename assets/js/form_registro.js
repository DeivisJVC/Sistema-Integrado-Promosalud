function seleccionarTipo() {
  const tipoSelect = document.getElementById("tipoUsuario");
  const tipo = tipoSelect.value;
  if (tipo) {
    // Oculta el contenedor del selector para que no se pueda cambiar
    document.getElementById("tipoContainer").style.display = "none";
    // Oculta formularios y reinicia pasos
    document.querySelectorAll(".formulario").forEach((form) => {
      form.style.display = "none";
      const steps = form.querySelectorAll(".step");
      steps.forEach((step, index) => {
        step.classList.remove("active");
        if (index === 0) step.classList.add("active");
      });
    });
    // Muestra el formulario seleccionado
    document.getElementById(
      "form" + tipo.charAt(0).toUpperCase() + tipo.slice(1)
    ).style.display = "block";
  }
}

function nextStep(button) {
  const currentStep = button.closest(".step");
  const nextStep = currentStep.nextElementSibling;
  if (nextStep && nextStep.classList.contains("step")) {
    currentStep.classList.remove("active");
    nextStep.classList.add("active");
  }
}

function prevStep(button) {
  const currentStep = button.closest(".step");
  const prevStep = currentStep.previousElementSibling;
  if (prevStep && prevStep.classList.contains("step")) {
    currentStep.classList.remove("active");
    prevStep.classList.add("active");
  }
}
