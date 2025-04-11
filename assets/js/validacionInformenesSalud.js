//validacion de formulario
(function () {
  "use strict";
  var form = document.getElementById("dateForm");

  form.addEventListener(
    "submit",
    function (event) {
      if (form.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
      }

      var empresa = document.getElementById("empresa");
      if (empresa.value === "seleccion") {
        empresa.setCustomValidity("Seleccione una empresa válida");
      } else {
        empresa.setCustomValidity("");
      }

      form.classList.add("was-validated");
    },
    false
  );

  document.getElementById("empresa").addEventListener("change", function () {
    if (this.value === "seleccion") {
      this.setCustomValidity("Seleccione una empresa válida");
    } else {
      this.setCustomValidity("");
    }

    this.classList.add("is-valid");
    this.classList.remove("is-invalid");
  });
})();

document.addEventListener("DOMContentLoaded", function () {
  const forms = document.querySelectorAll(".needs-validation");
  Array.from(forms).forEach(function (form) {
    form.addEventListener(
      "submit",
      function (event) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add("was-validated");
      },
      false
    );
  });
});

//validacion de campo
document.addEventListener("DOMContentLoaded", function () {
  const input = document.getElementById("inputInvalido");

  // Marcar el campo como no válido después de 2 segundos
  setTimeout(() => {
    input.classList.add("is-invalid");
  }, 2000);

  // Validar y quitar la clase "is-invalid" cuando se escribe algo
  input.addEventListener("input", function () {
    if (this.value.trim() !== "") {
      this.classList.remove("is-invalid");
      this.classList.add("is-valid"); // Opcional: marcar como válido
    } else {
      this.classList.add("is-invalid");
      this.classList.remove("is-valid");
    }
  });
});

function filterpacient() {}
