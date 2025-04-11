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

// Obtener los datos seleccionados;
function Elegir_cita() {
  // Suponiendo que ya tienes estas variables con los valores seleccionados
  const selectedYear = document.getElementById("selectedyear").innerText;
  const selectedMonth = document.getElementById("selectedmonth").innerText;
  const selectedDay = document.getElementById("selectedDay").innerText;
  const selectedTime = document.getElementById("selectedTime").innerText;
  const userName = document.getElementById("userName").innerText;

  // Actualizar los valores en el modal
  document.getElementById("modalConfirmYear").innerText = selectedYear;
  document.getElementById("modalConfirmMonth").innerText = selectedMonth;
  document.getElementById("modalConfirmDay").innerText = selectedDay;
  document.getElementById("modalConfirmTime").innerText = selectedTime;
  document.getElementById("modaluserName").innerText = userName;

  // Aquí puedes abrir el modal si no lo haces automáticamente con Bootstrap
  const confirmationModal = new bootstrap.Modal(
    document.getElementById("confirmationModal")
  );
  confirmationModal.show();
}

// Agregar los event listeners a los botones de tiempo
document.querySelectorAll(".btn-primary").forEach((button) => {
  button.addEventListener("click", (e) => {
    selectTime(e.target.textContent);
  });
});

document.getElementById("prevMonth").addEventListener("click", () => {
  currentDate.setMonth(currentDate.getMonth() - 1);
  renderCalendar();
});

// Agregar los event listeners a los botones de tiempo
document.querySelectorAll(".btn-primary").forEach((button) => {
  button.addEventListener("click", (e) => {
    selectTime(e.target.textContent);
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

// Llamar a la función para renderizar el calendario
renderCalendar();
