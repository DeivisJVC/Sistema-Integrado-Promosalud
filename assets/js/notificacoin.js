document.addEventListener("DOMContentLoaded", () => {
  const botonesCerrar = document.querySelectorAll(".cerrar-notificacion");
  const contador = document.getElementById("contadorNotificaciones");

  botonesCerrar.forEach((boton) => {
    boton.addEventListener("click", () => {
      const id = boton.dataset.id;
      const item = boton.closest(".notification-item");

      // Eliminar visualmente
      item.remove();

      // Enviar a PHP para marcar como leída
      fetch("/php/marcar_cita_leida.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `id=${encodeURIComponent(id)}`,
      });

      // Actualizar contador
      let count = parseInt(contador.textContent);
      count = isNaN(count) ? 0 : count - 1;

      if (count <= 0) {
        contador.remove();
      } else {
        contador.textContent = count;
      }
    });
  });
});
