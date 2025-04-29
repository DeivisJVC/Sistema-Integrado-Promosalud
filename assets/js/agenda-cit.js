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

    day.addEventListener("click", () => {
      selectDay(i, month, year);
    });

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

function selectDay(day, month, year) {
  selectedDay = day;
  document.getElementById("selectedDay").textContent = day;
  console.log(`Día seleccionado: ${day}/${month + 1}/${year}`);
}

// Obtener los datos seleccionados;
function Elegir_cita() {
  const selectedYear = document.getElementById("selectedyear").textContent;
  const selectedMonth = document.getElementById("selectedmonth").textContent;
  const selectedDayText = document.getElementById("selectedDay").textContent;
  const selectedTimeText = document.getElementById("selectedTime").textContent;
  const userName = document.getElementById("userName").textContent.trim(); // Obtén el nombre del usuario

  let isValid = true;
  let errorMessage = "";

  // Validar selección de día
  if (!selectedDayText || selectedDayText === "dia") {
    errorMessage += "Debe seleccionar un día";
    isValid = false;
  }

  // Validar selección de hora
  if (!selectedTimeText || selectedTimeText === "Hora") {
    errorMessage += " y una hora.";
    isValid = false;
  }

  // Si no es válido, mostrar el modal de error
  if (!isValid) {
    const errorModalBody = document.getElementById("errorModalBody");
    errorModalBody.innerHTML = errorMessage;

    const errorModal = new bootstrap.Modal(
      document.getElementById("errorModal")
    );
    errorModal.show();
    return;
  }

  // Mostrar en modal de confirmación
  document.getElementById("modalConfirmYear").textContent = selectedYear;
  document.getElementById("modalConfirmMonth").textContent = selectedMonth;
  document.getElementById("modalConfirmDay").textContent = selectedDayText;
  document.getElementById("modalConfirmTime").textContent = selectedTimeText;
  document.getElementById("modaluserName").textContent = userName; // Asigna el nombre al modal

  const confirmationModal = new bootstrap.Modal(
    document.getElementById("confirmationModal")
  );
  confirmationModal.show();
}

// Agregar los event listeners a los botones de tiempo
document.querySelectorAll(".time-btn").forEach((button) => {
  button.addEventListener("click", (e) => {
    selectedTime = e.target.textContent;
    document.getElementById("selectedTime").textContent = selectedTime;
    console.log("Hora seleccionada:", selectedTime);
  });
});

document.getElementById("prevMonth").addEventListener("click", () => {
  currentDate.setMonth(currentDate.getMonth() - 1);
  renderCalendar();
});

document.getElementById("nextMonth").addEventListener("click", () => {
  currentDate.setMonth(currentDate.getMonth() + 1);
  renderCalendar();
});

console.log("Hora seleccionada para el modal:", selectedTime);
// Llamar a la función para renderizar el calendario
renderCalendar();
