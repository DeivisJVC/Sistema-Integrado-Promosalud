document
  .getElementById("contraseña_confirmacion")
  .addEventListener("input", function () {
    const password = document.getElementById("password").value;
    const confirmPassword = this.value;
    const feedback = this.nextElementSibling;

    if (password !== confirmPassword) {
      feedback.textContent = "Las contraseñas no coinciden.";
      feedback.style.color = "red";
    } else {
      feedback.textContent = "Excelente!";
      feedback.style.color = "green";
    }
  });
