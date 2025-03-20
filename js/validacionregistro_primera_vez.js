document.addEventListener("DOMContentLoaded", function () {
  const steps = document.querySelectorAll(".step");
  let currentStep = 0;

  function showStep(step) {
    steps.forEach((s, index) => {
      s.classList.toggle("active", index === step);
    });
  }

  window.nextStep = function () {
    if (currentStep < steps.length - 1) {
      currentStep++;
      showStep(currentStep);
    }
  };

  window.prevStep = function () {
    if (currentStep > 0) {
      currentStep--;
      showStep(currentStep);
    }
  };

  showStep(currentStep);
});
