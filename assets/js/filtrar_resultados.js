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
    const nombre = row.cells[0].textContent;
    const apellido = row.cells[1].textContent;
    const tipoDocumento = row.cells[2].textContent;
    const numeroDocumento = row.cells[3].textContent;
    const tipoExamen = row.cells[4].textContent;
    const estado = row.cells[5].textContent;

    if (
      selectedPatientsTbody.querySelector(
        `tr[data-documento="${numeroDocumento}"]`
      )
    ) {
      return; // Evita añadir duplicados
    }

    const newRow = document.createElement("tr");
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
    showStep2IfPatientsSelected();
  }

  // --- Selección única de paciente ---
  resultTableBody.addEventListener("change", (event) => {
    if (event.target.classList.contains("select-patient-checkbox")) {
      const checkbox = event.target;
      const row = checkbox.closest("tr");
      const numeroDocumento = row.cells[3].textContent;

      if (checkbox.checked) {
        // Verifica si ya hay otro seleccionado
        const checkedBoxes = resultTableBody.querySelectorAll(
          ".select-patient-checkbox:checked"
        );
        if (checkedBoxes.length > 1) {
          checkbox.checked = false;
          const alertDiv = document.createElement("div");
          alertDiv.className = "alert alert-danger alert-dismissible fade show";
          alertDiv.role = "alert";
          alertDiv.innerHTML = `
          Solo se puede seleccionar un paciente a la vez.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        `;

          // Inserta el alert en el contenedor superior
          const alertContainer = document.getElementById("alert-container");
          alertContainer.appendChild(alertDiv);

          setTimeout(() => {
            alertDiv.remove();
          }, 2500);
          return;
        }
        addPatientToSelectedTable(row);
      } else {
        removePatientFromSelectedTable(numeroDocumento);
      }
    }
  });



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
      const nombreCell = row.cells[0];
      const apellidoCell = row.cells[1];
      const tipoExamenCell = row.cells[4];

      const nombre = nombreCell ? nombreCell.textContent.toLowerCase() : "";
      const apellido = apellidoCell
        ? apellidoCell.textContent.toLowerCase()
        : "";
      const tipoExamen = tipoExamenCell
        ? tipoExamenCell.textContent.toLowerCase()
        : "";

      const nameMatch = nombre.includes(filterName);
      const apellidoMatch = apellido.includes(filterApellido);
      const tipoExamenMatch = tipoExamen.includes(filterTipoExamen);

      if (nameMatch && apellidoMatch && tipoExamenMatch) {
        row.style.display = "";
      } else {
        row.style.display = "none";
      }
    }
  }

  function clearFilterResultados() {
    document.getElementById("filter_name").value = "";
    document.getElementById("filter_apellido").value = "";
    document.getElementById("filter_tipoexamen").value = "";

    const table = document.getElementById("result_table");
    const tbody = table.querySelector("tbody");
    const rows = tbody.getElementsByTagName("tr");

    for (let i = 0; i < rows.length; i++) {
      rows[i].style.display = "";
      // Desmarca el checkbox de cada fila si existe
      const checkbox = rows[i].querySelector(".select-patient-checkbox");
      if (checkbox) checkbox.checked = false;
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

  // Hace accesibles las funciones para los botones con onclick
  window.filterResultados = filterResultados;
  window.clearFilterResultados = clearFilterResultados;

  // --- Inicialización al cargar la página ---
  step2Div.style.display = "none";
});
