function combineDateTime() {
  const yearElement = document.getElementById("selectedyear");
  const monthElement = document.getElementById("selectedmonth");
  const dayElement = document.getElementById("selectedDay");
  const timeElement = document.getElementById("selectedTime");

  if (!yearElement || !monthElement || !dayElement || !timeElement) {
    console.error(
      "No se encontraron todos los elementos necesarios para generar la fecha."
    );
    return;
  }

  const year = yearElement.textContent;
  const month = monthElement.textContent;
  const day = dayElement.textContent;
  const time = timeElement.textContent;

  const fechaCita = `${year}-${month}-${day} ${time}`;
  document.getElementById("fecha_cita").value = fechaCita;

  console.log("Fecha generada:", fechaCita);
}
