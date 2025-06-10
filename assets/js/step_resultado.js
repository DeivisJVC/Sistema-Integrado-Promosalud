document.addEventListener("DOMContentLoaded", () => {
  // --- Referencias a elementos del DOM ---
  const resultTableBody = document.querySelector("#result_table tbody");
  const selectedPatientsTbody = document.getElementById("selected-patients");
  const step1Div = document.getElementById("step1");
  const step2Div = document.getElementById("step2");


  // Función para añadir un paciente a la tabla de seleccionados (step2)
  function addPatientToSelectedTable(row) {
    const nombre = row.cells[0].textContent;
    const apellido = row.cells[1].textContent;
    const tipoDocumento = row.cells[2].textContent;
    const numeroDocumento = row.cells[3].textContent;
    const tipoExamen = row.cells[4].textContent;
    const estado = row.cells[5].textContent;

    const mensaje = selectedPatientsTbody.querySelector(".text-center");
    if (mensaje) {
      mensaje.parentElement.remove();
    }

    if (
      selectedPatientsTbody.querySelector(
        `tr[data-documento="${numeroDocumento}"]`
      )
    ) {
      return;
    }

    const newRow = document.createElement("tr");
    newRow.setAttribute("data-documento", numeroDocumento);
    newRow.setAttribute("data-tipo-examen", tipoExamen);
    newRow.innerHTML = `
          <td>${nombre}</td>
          <td>${apellido}</td>
          <td>${tipoDocumento}</td>
          <td>${numeroDocumento}</td>
          <td id="tipo_examen">${tipoExamen}</td>
          <td>${estado}</td>
      `;
    selectedPatientsTbody.appendChild(newRow);
  }

  // Función para remover un paciente de la tabla de seleccionados (step2)
  function removePatientFromSelectedTable(numeroDocumento) {
    const rowToRemove = selectedPatientsTbody.querySelector(
      `tr[data-documento="${numeroDocumento}"]`
    );
    if (rowToRemove) {
      selectedPatientsTbody.removeChild(rowToRemove);
    }
  }

  // Event Listener principal para manejar la selección/deselección de pacientes
  resultTableBody.addEventListener("change", (event) => {
    if (event.target.classList.contains("select-patient-checkbox")) {
      const checkbox = event.target;
      const row = checkbox.closest("tr");
      const numeroDocumento = row.cells[3].textContent;

      if (checkbox.checked) {
        addPatientToSelectedTable(row);
      } else {
        removePatientFromSelectedTable(numeroDocumento);
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
      
      document.querySelectorAll(".select-patient-checkbox").forEach(cb => cb.checked = false);//limpiar checkboxes para que no se marquen los pacientes seleccionados en el paso 1
      

    } else if (stepToShow === 2) {
      const selectpacient = selectedPatientsTbody.querySelector("tr");
      if (selectpacient) {
        const tipoExamen = selectpacient.getAttribute("data-tipo-examen");
        console.log("tipo de exmamen:", tipoExamen);
        //pon un continue para que siga el codigo normalmente
        if (selectedPatientsTbody.children.length === 0) {
          return; // Detiene la función y no cambia de paso
        }

        step1Div.style.display = "none";
        step2Div.style.display = "";
        prevStepButton.style.display = ""; // Muestra el botón Anterior
        nextStepButton.style.display = "none"; // Oculta el botón Siguiente
        stepTitle.innerText = "Resultados seleccionados";

        // Asegurarse de que el mensaje "No hay pacientes seleccionados"
        // no aparezca si sí hay pacientes, o si es la única fila
        if (selectedPatientsTbody.children.length === 0) {
          // Este caso solo debería ocurrir si no hay pacientes y la verificación anterior falla
          selectedPatientsTbody.innerHTML =
            '<tr><td colspan="6" class="text-center">No hay pacientes seleccionados.</td></tr>';
        }
      }
    }else {
      console.error("Paso no reconocido:", stepToShow);
    }
  };

  // --- Funciones para la Lógica de Filtrado de la Tabla 1 ---
  // (Mantén tus funciones filterResultados y clearFilterResultados aquí)
  function filterResultados() {
    //filtrado proximo...
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
