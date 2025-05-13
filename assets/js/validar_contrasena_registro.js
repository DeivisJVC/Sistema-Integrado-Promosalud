document.addEventListener("DOMContentLoaded", function () {
  const password = document.getElementById("password");
  const confirmPassword = document.getElementById("contraseña_confirmacion");
  const form = document.querySelector("form");

  // Validar contraseñas en tiempo real
  confirmPassword.addEventListener("input", function () {
    if (password.value !== confirmPassword.value) {
      confirmPassword.setCustomValidity("Las contraseñas no coinciden.");
      confirmPassword.classList.add("is-invalid");
      confirmPassword.classList.remove("is-valid");
    } else {
      confirmPassword.setCustomValidity("");
      confirmPassword.classList.add("is-valid");
      confirmPassword.classList.remove("is-invalid");
    }
  });

  // Validar contraseñas al enviar el formulario
  form.addEventListener("submit", function (event) {
    if (password.value !== confirmPassword.value) {
      event.preventDefault(); // Evitar el envío del formulario
      confirmPassword.setCustomValidity("Las contraseñas no coinciden.");
      confirmPassword.reportValidity(); // Mostrar el mensaje de error
    }
  });
});
