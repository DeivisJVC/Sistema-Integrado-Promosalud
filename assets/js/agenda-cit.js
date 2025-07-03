const monthNames = [
  "Enero",
  "Febrero",
  "Marzo",
  "Abril",
  "Mayo",
  "Junio",
  "Julio",
  "Agosto",
  "Septiembre",
  "Octubre",
  "Noviembre",
  "Diciembre",
];

let currentDate = new Date(); // Fecha actual
let selectedDay = null;
let selectedTime = null;
let diasInhabilitados = []; // ← Aquí guardaremos las fechas bloqueadas

function renderCalendar() {
  const daysContainer = document.getElementById("calendarDays");
  const currentMonthText = document.getElementById("currentMonth");
  const selectedDate = document.getElementById("selectedmonth");
  const selectedyear = document.getElementById("selectedyear");
  const modalConfirmMonth = document.getElementById("modalConfirmMonth");
  const modalConfirmYear = document.getElementById("modalConfirmYear");
  daysContainer.innerHTML = "";

  const month = currentDate.getMonth();
  const year = currentDate.getFullYear();
  currentMonthText.textContent = `${monthNames[month]} ${year}`;
  selectedDate.textContent = `${monthNames[month]}`;
  selectedyear.textContent = `${year}`;
  modalConfirmMonth.textContent = `${monthNames[month]}`;
  modalConfirmYear.textContent = `${year}`;

  const firstDay = new Date(year, month, 1).getDay();
  const daysInMonth = new Date(year, month + 1, 0).getDate();
  const prevDays = firstDay === 0 ? 6 : firstDay - 1;

  let row = document.createElement("div");
  row.className = "row";
  const lastDayPrevMonth = new Date(year, month, 0).getDate();
  for (let i = prevDays; i > 0; i--) {
    const day = document.createElement("div");
    day.className = "col day day-empty text-muted";
    day.textContent = lastDayPrevMonth - i + 1;
    row.appendChild(day);
  }

  for (let i = 1; i <= daysInMonth; i++) {
    const day = document.createElement("div");
    day.className = "col day";
    day.textContent = i;
    day.style.cursor = "pointer";

    const fecha = `${year}-${(month + 1).toString().padStart(2, "0")}-${i
      .toString()
      .padStart(2, "0")}`;
    if (diasInhabilitados.includes(fecha)) {
      day.classList.add("disabled-day");
      day.style.pointerEvents = "none";
      day.style.opacity = "0.5";
    } else {
      day.addEventListener("click", () => {
        selectDay(i, month, year);
      });
    }

    row.appendChild(day);

    if (row.children.length === 7) {
      daysContainer.appendChild(row);
      row = document.createElement("div");
      row.className = "row";
    }
  }

  const nextDays = 7 - (row.children.length % 7);
  for (let i = 1; i <= nextDays; i++) {
    const day = document.createElement("div");
    day.className = "col day day-empty text-muted";
    day.textContent = i;
    row.appendChild(day);
  }

  if (row.children.length > 0) {
    daysContainer.appendChild(row);
  }
}

function obtenerDiasInhabilitados() {
  return fetch("/php/get_fechas_ocupadas.php")
    .then((res) => res.json())
    .then((data) => {
      diasInhabilitados = data; // Ej: ["2025-06-19", "2025-06-22"]
    });
}

function to24HourFormat(timeStr) {
  const match = timeStr.match(/^(\d{1,2}):(\d{2})\s*(AM|PM)$/i);
  if (!match) return null;
  let hour = parseInt(match[1], 10);
  const minute = match[2];
  const ampm = match[3].toUpperCase();
  if (ampm === "PM" && hour !== 12) hour += 12;
  if (ampm === "AM" && hour === 12) hour = 0;
  return `${hour.toString().padStart(2, "0")}:${minute}`;
}

function cargarHorasOcupadas(fechaSeleccionada) {
  fetch("/php/get_horas_ocupadas.php?fecha=" + fechaSeleccionada)
    .then((response) => response.json())
    .then((horasOcupadas) => {
      document.querySelectorAll(".time-btn").forEach((btn) => {
        let horaBtn = btn.textContent.trim();
        let hora24 = to24HourFormat(horaBtn);
        btn.classList.remove("btn-success");
        if (horasOcupadas.includes(hora24)) {
          btn.disabled = true;
          btn.classList.add("btn-secondary");
          btn.classList.remove("btn-primary");
        } else {
          btn.disabled = false;
          btn.classList.add("btn-primary");
          btn.classList.remove("btn-secondary");
        }
      });
    })
    .catch((error) => {
      console.error("Error al cargar horas ocupadas:", error);
    });
}

function selectDay(day, month, year) {
  selectedDay = day;
  document.getElementById("selectedDay").textContent = day;
  selectedTime = null;
  document.getElementById("selectedTime").textContent = "Hora";
  document
    .querySelectorAll(".time-btn")
    .forEach((btn) => btn.classList.remove("btn-success"));

  let mes = (month + 1).toString().padStart(2, "0");
  let dia = day.toString().padStart(2, "0");
  let fechaSeleccionada = `${year}-${mes}-${dia}`;
  cargarHorasOcupadas(fechaSeleccionada);
}

function Elegir_cita() {
  const selectedYear = document.getElementById("selectedyear").textContent;
  const selectedMonth = document.getElementById("selectedmonth").textContent;
  const selectedDayText = document.getElementById("selectedDay").textContent;
  const selectedTimeText = document.getElementById("selectedTime").textContent;
  const userName = document.getElementById("userName").textContent.trim();

  let isValid = true;
  let errorMessage = "";

  if (!selectedDayText || selectedDayText === "dia") {
    errorMessage += "Debe seleccionar un día";
    isValid = false;
  }

  if (!selectedTimeText || selectedTimeText === "Hora") {
    errorMessage += " y una hora.";
    isValid = false;
  }

  if (!isValid) {
    const errorModalBody = document.getElementById("errorModalBody");
    errorModalBody.innerHTML = errorMessage;
    const errorModal = new bootstrap.Modal(
      document.getElementById("errorModal")
    );
    errorModal.show();
    return;
  }

  document.getElementById("modalConfirmYear").textContent = selectedYear;
  document.getElementById("modalConfirmMonth").textContent = selectedMonth;
  document.getElementById("modalConfirmDay").textContent = selectedDayText;
  document.getElementById("modalConfirmTime").textContent = selectedTimeText;
  document.getElementById("modaluserName").textContent = userName;

  const confirmationModal = new bootstrap.Modal(
    document.getElementById("confirmationModal")
  );
  confirmationModal.show();
}

document.querySelectorAll(".time-btn").forEach((button) => {
  button.addEventListener("click", (e) => {
    if (button.disabled) return;
    selectedTime = e.target.textContent;
    document.getElementById("selectedTime").textContent = selectedTime;
    document
      .querySelectorAll(".time-btn")
      .forEach((btn) => btn.classList.remove("btn-success"));
    button.classList.add("btn-success");
    console.log("Hora seleccionada:", selectedTime);
  });
});

document.getElementById("prevMonth").addEventListener("click", () => {
  currentDate.setMonth(currentDate.getMonth() - 1);
  obtenerDiasInhabilitados().then(renderCalendar);
});

document.getElementById("nextMonth").addEventListener("click", () => {
  currentDate.setMonth(currentDate.getMonth() + 1);
  obtenerDiasInhabilitados().then(renderCalendar);
});

// Cargar días inhabilitados al iniciar
obtenerDiasInhabilitados().then(renderCalendar);
