function marcarComoLeida(idCita, boton) {
  fetch(`/php/marcador_cita_leida.php?id=${idCita}`)
    .then((response) => response.text())
    .then(() => {
      // Elimina la notificación visualmente
      boton.parentElement.remove();

      // Actualiza el contador
      const contador = document.getElementById("contadorNotificaciones");
      if (contador) {
        let num = parseInt(contador.textContent);
        if (!isNaN(num) && num > 0) {
          num--;
          if (num === 0) {
            contador.remove();
          } else {
            contador.textContent = num;
          }
        }
      }
    });
}
