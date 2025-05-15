function combineDateTime() {
  const yearElement = document.getElementById("selectedyear");
  const monthElement = document.getElementById("selectedmonth");
  const dayElement = document.getElementById("selectedDay");
  const timeElement = document.getElementById("selectedTime");
  const fechaCitaInput = document.getElementById("fecha_cita");

  if (
    !yearElement ||
    !monthElement ||
    !dayElement ||
    !timeElement ||
    !fechaCitaInput
  ) {
    alert("Faltan datos para la fecha y hora.");
    return false;
  }

  const year = yearElement.textContent.trim();
  const monthName = monthElement.textContent.trim().toLowerCase();
  const day = dayElement.textContent.trim().padStart(2, "0");
  let time = timeElement.textContent.trim();

  // Convierte el nombre del mes a número (01-12)
  const meses = [
    "enero",
    "febrero",
    "marzo",
    "abril",
    "mayo",
    "junio",
    "julio",
    "agosto",
    "septiembre",
    "octubre",
    "noviembre",
    "diciembre",
  ];
  let month = meses.indexOf(monthName) + 1;
  month = month > 0 ? (month < 10 ? "0" + month : "" + month) : null;

  // Convierte la hora a formato 24 horas
  function to24HourFormat(timeStr) {
    const match = timeStr.match(/^(\d{1,2}):(\d{2})\s*(AM|PM)$/i);
    if (!match) return null;
    let hour = parseInt(match[1], 10);
    const minute = match[2];
    const ampm = match[3].toUpperCase();
    if (ampm === "PM" && hour !== 12) hour += 12;
    if (ampm === "AM" && hour === 12) hour = 0;
    return `${hour.toString().padStart(2, "0")}:${minute}:00`;
  }

  const time24 = to24HourFormat(time);

  if (!year || !month || !day || !time24) {
    alert("Por favor selecciona año, mes, día y hora válidos.");
    return false;
  }

  const fechaCita = `${year}-${month}-${day} ${time24}`;
  fechaCitaInput.value = fechaCita;

  // Para depuración
  console.log("Fecha generada por combineDateTime:", fechaCita);

  return true;
}
