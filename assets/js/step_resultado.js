document.addEventListener("DOMContentLoaded", () => {
  // --- Referencias a elementos del DOM ---
  const resultTableBody = document.querySelector("#result_table tbody");
  const selectedPatientsTbody = document.getElementById("selected-patients");
  const step1Div = document.getElementById("step1");
  const step2Div = document.getElementById("step2");

  // Función para mostrar el menú correcto según el tipo de examen
  

  // Función para añadir un paciente a la tabla de seleccionados (step2)
  function addPatientToSelectedTable(row) {
    const nombre = row.cells[0].textContent;
    const apellido = row.cells[1].textContent;
    const tipoDocumento = row.cells[2].textContent;
    const numeroDocumento = row.cells[3].textContent;
    const tipoExamen = row.cells[4].textContent.trim().toLowerCase();
    const estado = row.cells[5].textContent;

    const mensaje = selectedPatientsTbody.querySelector(".text-center");
    if (mensaje) {
      mensaje.parentElement.remove();
    }

    const newRow = document.createElement("tr");
    newRow.setAttribute("data-documento", numeroDocumento);
    newRow.setAttribute("data-tipo-examen", tipoExamen);
    newRow.innerHTML = `
          <td class="fs-5">${nombre}</td>
          <td class="fs-5">${apellido}</td>
          <td class="fs-5">${tipoDocumento}</td>
          <td class="fs-5">${numeroDocumento}</td>
          <td class="fs-5" id="tipo_examen">${tipoExamen}</td>
          <td class="fs-5">${estado}</td>
      `;

    selectedPatientsTbody.appendChild(newRow);
    mostrarMenuExamen(tipoExamen);
  }

  // Función para remover un paciente de la tabla de seleccionados (step2)
  function removePatientFromSelectedTable(numeroDocumento) {
    const rowToRemove = selectedPatientsTbody.querySelector(
      `tr[data-documento="${numeroDocumento}"]`
    );
    if (rowToRemove) {
      selectedPatientsTbody.removeChild(rowToRemove);
    }
    // Si ya no hay pacientes seleccionados, oculta todos los menús
    if (selectedPatientsTbody.children.length === 0) {
      document.getElementById("examenes_ingreso").classList.add("d-none");
      document.getElementById("examenes_periodicos").classList.add("d-none");
      document.getElementById("examenes_retiro").classList.add("d-none");
    }
  }

  // Event Listener principal para manejar la selección/deselección de pacientes
  resultTableBody.addEventListener("change", (event) => {
    if (event.target.classList.contains("select-patient-checkbox")) {
      const checkbox = event.target;
      const row = checkbox.closest("tr");
      const numeroDocumento = row.cells[3].textContent;

      // Si se selecciona un paciente, desmarcar todos los demás
      if (checkbox.checked) {
        document.querySelectorAll(".select-patient-checkbox").forEach((cb) => {
          if (cb !== checkbox) cb.checked = false;
        });
        // Limpiar la tabla de seleccionados antes de agregar uno nuevo
        selectedPatientsTbody.innerHTML = "";
        addPatientToSelectedTable(row);
      } else {
        removePatientFromSelectedTable(numeroDocumento);
        // Si no hay seleccionados, muestra el mensaje vacío
        if (selectedPatientsTbody.children.length === 0) {
          selectedPatientsTbody.innerHTML =
            '<tr><td colspan="6" class="text-center">No hay pacientes seleccionados.</td></tr>';
        }
      }
    }
  });

  // --- FUNCION showStep (Anteriormente toggleStepVisibility) ---
  // Esta función se llama desde los botones onclick en tu HTML
  window.showStep = function (stepToShow) {
    // Hacemos la función global
    const prevStepButton = document.getElementById("prev-step");
    const nextStepButton = document.getElementById("next-step");
    const stepTitle = document.getElementById("step-title");

    if (stepToShow === 1) {
      step1Div.style.display = "";
      step2Div.style.display = "none";
      prevStepButton.style.display = "none"; // Oculta el botón Anterior
      nextStepButton.style.display = ""; // Muestra el botón Siguiente
      stepTitle.innerText = "Publicacion de resultados";

      selectedPatientsTbody.innerHTML =
        '<tr><td colspan="6" class="text-center">No hay pacientes seleccionados.</td></tr>';

      document
        .querySelectorAll(".select-patient-checkbox")
        .forEach((cb) => (cb.checked = false)); //limpiar checkboxes para que no se marquen los pacientes seleccionados en el paso 1

      // Oculta todos los menús de exámenes
      document.getElementById("examenes_ingreso").classList.add("d-none");
      document.getElementById("examenes_periodicos").classList.add("d-none");
      document.getElementById("examenes_retiro").classList.add("d-none");
    } else if (stepToShow === 2) {
      const selectpacient = selectedPatientsTbody.querySelector("tr");
      if (selectpacient) {
        if (selectedPatientsTbody.children.length === 0) {
          return; // Detiene la función y no cambia de paso
        }

        step1Div.style.display = "none";
        step2Div.style.display = "";
        prevStepButton.style.display = ""; // Muestra el botón Anterior
        nextStepButton.style.display = "none"; // Oculta el botón Siguiente
        stepTitle.innerText = "Resultados seleccionados";
      }
    } else {
      console.error("Paso no reconocido:", stepToShow);
    }
  };

  // --- Funciones para la Lógica de Filtrado de la Tabla 1 ---
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
    console.log("Limpiando filtros...");
    document.getElementById("filter_name").value = "";
    document.getElementById("filter_apellido").value = "";
    document.getElementById("filter_tipoexamen").value = "";

    // Desmarca todos los checkboxes de la tabla de resultados
    document
      .querySelectorAll(".select-patient-checkbox")
      .forEach((cb) => (cb.checked = false));

    // Muestra todas las filas de la tabla
    document.querySelectorAll("#result_table tbody tr").forEach((row) => {
      row.style.display = "";
    });

    // (Opcional) Limpia la tabla de seleccionados
    if (typeof selectedPatientsTbody !== "undefined") {
      selectedPatientsTbody.innerHTML =
        '<tr><td colspan="6" class="text-center">No hay pacientes seleccionados.</td></tr>';
    }

    // Oculta todos los menús de exámenes
    document.getElementById("examenes_ingreso").classList.add("d-none");
    document.getElementById("examenes_periodicos").classList.add("d-none");
    document.getElementById("examenes_retiro").classList.add("d-none");
  }

  function mostrarMenuExamen(tipoExamen) {
    //oculta menu de examenes
    document.getElementById("examenes_ingreso").classList.add("d-none");
    document.getElementById("examenes_periodicos").classList.add("d-none");
    document.getElementById("examenes_retiro").classList.add("d-none");
    //titulos de examenes.
    document.getElementById("title_examenes_ingreso").classList.add("d-none");
    document
      .getElementById("title_examenes_periodicos")
      .classList.add("d-none");
    document.getElementById("title_examenes_retiro").classList.add("d-none");

    // Muestra el correspondiente
    if (tipoExamen === "ingreso") {
      document.getElementById("examenes_ingreso").classList.remove("d-none");
      document
        .getElementById("title_examenes_ingreso")
        .classList.remove("d-none");
    } else if (tipoExamen === "periodicos") {
      document.getElementById("examenes_periodicos").classList.remove("d-none");
      document
        .getElementById("title_examenes_periodicos")
        .classList.remove("d-none");
    } else if (tipoExamen === "retiro") {
      document.getElementById("examenes_retiro").classList.remove("d-none");
      document
        .getElementById("title_examenes_retiro")
        .classList.remove("d-none");
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

  window.filterResultados = filterResultados;
  window.clearFilterResultados = clearFilterResultados;

  window.showStep(1);
});
