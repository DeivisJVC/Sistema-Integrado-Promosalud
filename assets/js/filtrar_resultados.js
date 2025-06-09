function normalizeText(text) {
  return text
    .toLowerCase()
    .normalize("NFD")
    .replace(/[\u0300-\u036f]/g, "");
}

function clearCheckboxes() {
  document
    .querySelectorAll(".select-patient")
    .forEach((checkbox) => (checkbox.checked = false));
  document.getElementById("checkboxdescargar").checked = false;

  document
    .getElementById("checkboxdescargar")
    .addEventListener("change", function () {
      document
        .querySelectorAll(".select-patient")
        .forEach((checkbox) => (checkbox.checked = this.checked));
    });
}
function filterResultados() {
  const filterName = document.getElementById("filter_name").value.toLowerCase();
  const filterApellido = document
    .getElementById("filter_apellido")
    .value.toLowerCase();
  const filterTipoExamen = document
    .getElementById("filter_tipoexamen")
    .value.toLowerCase();
  const filterId = document.getElementById("filter_id").value.toLowerCase();

  const table = document.getElementById("result_table");
  const rows = table
    .getElementsByTagName("tbody")[0]
    .getElementsByTagName("tr");

  for (let i = 0; i < rows.length; i++) {
    const row = rows[i];
    const cells = row.getElementsByTagName("td");

    const patientName = cells[0]?.textContent.toLowerCase() || "";
    const patientApellido = cells[1]?.textContent.toLowerCase() || "";
    const patientTipoExamen = cells[2]?.textContent.toLowerCase() || "";
    const patientId = cells[3]?.textContent.toLowerCase() || "";

    const nameMatch = patientName.includes(filterName);
    const apellidoMatch = patientApellido.includes(filterApellido);
    const tipoExamenMatch = patientTipoExamen.includes(filterTipoExamen);
    const idMatch = patientId.includes(filterId);

    if (nameMatch && apellidoMatch && tipoExamenMatch && idMatch) {
      row.style.display = "";
    } else {
      row.style.display = "none";
    }
  }
}

function clearFilterResultados() {
  // Función renombrada a 'clearFilterResultados'
  // Limpiar los inputs de filtro
  document.getElementById("filter_name").value = "";
  document.getElementById("filter_apellido").value = "";
  document.getElementById("filter_tipoexamen").value = "";
  document.getElementById("filter_id").value = "";

  // Mostrar todas las filas de la tabla
  const table = document.getElementById("result_table");
  const rows = table
    .getElementsByTagName("tbody")[0]
    .getElementsByTagName("tr");
  for (let i = 0; i < rows.length; i++) {
    rows[i].style.display = ""; // Muestra la fila
  }
}
