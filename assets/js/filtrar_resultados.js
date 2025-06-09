
document.addEventListener("DOMContentLoaded", () => {
  // --- Referencias a elementos del DOM ---
  const resultTableBody = document.querySelector("#result_table tbody");
  const selectedPatientsTbody = document.getElementById("selected-patients");
  const step1Div = document.getElementById("step1");
  const step2Div = document.getElementById("step2");

  // --- Funciones para la Lógica de Selección de Pacientes ---

  // Función para controlar la visibilidad entre el paso 1 y el paso 2
  function showStep2IfPatientsSelected() {
    if (selectedPatientsTbody.children.length > 0) {
      step1Div.style.display = "none";
      step2Div.style.display = "block"; // O 'flex' si tu diseño lo requiere
    } else {
      step1Div.style.display = "block";
      step2Div.style.display = "none";
    }
  }

  // Función para añadir un paciente a la tabla de seleccionados (step2)
  function addPatientToSelectedTable(row) {
    // Extrae los datos de las celdas de la fila de la tabla original
    const nombre = row.cells[0].textContent;
    const apellido = row.cells[1].textContent;
    const tipoDocumento = row.cells[2].textContent; // Columna oculta d-none
    const numeroDocumento = row.cells[3].textContent; // Columna oculta d-none
    const tipoExamen = row.cells[4].textContent;
    const estado = row.cells[5].textContent;

    // Comprueba si el paciente ya está en la tabla de seleccionados
    // Usamos el número de documento como identificador único
    if (
      selectedPatientsTbody.querySelector(
        `tr[data-documento="${numeroDocumento}"]`
      )
    ) {
      // console.log(`Paciente con documento ${numeroDocumento} ya seleccionado.`);
      return; // Evita añadir duplicados
    }

    // Crea una nueva fila para la tabla de pacientes seleccionados (step2)
    const newRow = document.createElement("tr");
    // Asigna el número de documento como un atributo de dato para facilitar la remoción
    newRow.setAttribute("data-documento", numeroDocumento);

    newRow.innerHTML = `
          <td>${nombre}</td>
          <td>${apellido}</td>
          <td>${tipoDocumento}</td>
          <td>${numeroDocumento}</td>
          <td>${tipoExamen}</td>
          <td>${estado}</td>
      `;

    selectedPatientsTbody.appendChild(newRow);
    // Opcional: muestra step2 automáticamente al añadir el primer paciente
    showStep2IfPatientsSelected();
  }

  // Función para remover un paciente de la tabla de seleccionados (step2)
  function removePatientFromSelectedTable(numeroDocumento) {
    const rowToRemove = selectedPatientsTbody.querySelector(
      `tr[data-documento="${numeroDocumento}"]`
    );
    if (rowToRemove) {
      selectedPatientsTbody.removeChild(rowToRemove);
    }
    // Opcional: oculta step2 si no quedan pacientes seleccionados
    showStep2IfPatientsSelected();
  }

  // Event Listener principal para manejar la selección/deselección de pacientes
  // Utiliza delegación de eventos en el tbody de la tabla de resultados
  resultTableBody.addEventListener("change", (event) => {
    // Verifica si el elemento que disparó el evento es un checkbox de selección de paciente
    if (event.target.classList.contains("select-patient-checkbox")) {
      const checkbox = event.target;
      const row = checkbox.closest("tr"); // Obtiene la fila (<tr>) padre del checkbox
      // Obtiene el número de documento de la celda de la fila original
      const numeroDocumento = row.cells[3].textContent;

      if (checkbox.checked) {
        addPatientToSelectedTable(row);
      } else {
        removePatientFromSelectedTable(numeroDocumento);
      }
    }
  });

  // --- Funciones para la Lógica de Filtrado de la Tabla 1 (Tu código) ---

  // Función para filtrar los resultados de la tabla 1
  function filterResultados() {
    const filterName = document
      .getElementById("filter_name")
      .value.toLowerCase();
    const filterApellido = document
      .getElementById("filter_apellido")
      .value.toLowerCase();
    const filterTipoExamen = document
      .getElementById("filter_tipoexamen")
      .value.toLowerCase();
    const table = document.getElementById("result_table");
    const tbody = table.querySelector("tbody");
    const rows = tbody.getElementsByTagName("tr");

    for (let i = 0; i < rows.length; i++) {
      const row = rows[i];
      // Asumiendo el orden de las columnas en tu <thead>
      // Estos índices deben coincidir con la estructura de tu tabla
      const nombreCell = row.cells[0]; // Nombre
      const apellidoCell = row.cells[1]; // Apellido
      // Ojo: Las celdas 2 y 3 están ocultas, por eso Tipo Examen es la 4
      const tipoExamenCell = row.cells[4]; // Tipo Examen

      const nombre = nombreCell ? nombreCell.textContent.toLowerCase() : "";
      const apellido = apellidoCell
        ? apellidoCell.textContent.toLowerCase()
        : "";
      const tipoExamen = tipoExamenCell
        ? tipoExamenCell.textContent.toLowerCase()
        : "";

      // Lógica de filtrado: una fila se muestra si todas las condiciones coinciden
      const nameMatch = nombre.includes(filterName);
      const apellidoMatch = apellido.includes(filterApellido);
      const tipoExamenMatch = tipoExamen.includes(filterTipoExamen);

      if (nameMatch && apellidoMatch && tipoExamenMatch) {
        row.style.display = ""; // Muestra la fila
      } else {
        row.style.display = "none"; // Oculta la fila
      }
    }
  }

  // Función para limpiar los filtros y mostrar todas las filas
  function clearFilterResultados() {
    document.getElementById("filter_name").value = "";
    document.getElementById("filter_apellido").value = "";
    document.getElementById("filter_tipoexamen").value = "";

    const table = document.getElementById("result_table");
    const tbody = table.querySelector("tbody");
    const rows = tbody.getElementsByTagName("tr");

    for (let i = 0; i < rows.length; i++) {
      rows[i].style.display = ""; // Muestra todas las filas
    }
  }

  // --- Asignación de Event Listeners para Filtrado ---
  document
    .getElementById("filter_name")
    .addEventListener("keyup", filterResultados);
  document
    .getElementById("filter_apellido")
    .addEventListener("keyup", filterResultados);
  document
    .getElementById("filter_tipoexamen")
    .addEventListener("keyup", filterResultados);

  // Si los botones "Filtrar" y "Limpiar" tienen `onclick` en el HTML,
  // asegúrate de que estas funciones sean accesibles globalmente.
  // Aunque es mejor asignar eventos con addEventListener si es posible.
  // Si tus botones ya tienen onclick="filterResultados()" etc., no es necesario
  // añadir estas líneas, a menos que quieras que funcionen al ser importadas como módulo.
  window.filterResultados = filterResultados;
  window.clearFilterResultados = clearFilterResultados;

  // --- Inicialización al cargar la página ---
  // Asegurarse de que step2 esté oculto al inicio
  step2Div.style.display = "none";
});
