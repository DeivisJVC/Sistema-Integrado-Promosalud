// b) Permitir seleccionar solo un checkbox de cita a la vez
document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll(".select-patient").forEach((cb) => {
    cb.addEventListener("change", function () {
      document.querySelectorAll(".select-patient").forEach((other) => {
        if (other !== this) other.checked = false;
      });
    });
  });

  // c) Capturar el id y mostrar el modal solo si hay selección
  const cancelBtn = document.querySelector(
    'button.btn-danger[data-bs-target="#cancelacionModal"]'
  );
  let selectedCitaId = null;
  if (cancelBtn) {
    cancelBtn.addEventListener("click", function (e) {
      const checked = document.querySelector(".select-patient:checked");
      if (!checked) {
        e.stopPropagation();
        e.preventDefault();
        alert("Selecciona una cita para cancelar.");
        return false;
      }
      selectedCitaId = checked.value;
    });
  }

  // d) Enviar AJAX al aceptar en el modal
  const aceptarBtn = document.querySelector(
    '#cancelacionModal .btn-danger[data-bs-dismiss="modal"]'
  );
  if (aceptarBtn) {
    aceptarBtn.addEventListener("click", function () {
      if (!selectedCitaId) return;
      fetch("/php/eliminar_cita.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ id: selectedCitaId }),
      })
        .then((res) => res.json())
        .then((data) => {
          if (data.success) {
            // Quitar la fila de la tabla
            document
              .querySelector(".select-patient:checked")
              .closest("tr")
              .remove();
          } else {
            alert("Error al cancelar la cita");
          }
        });
    });
  }
});
