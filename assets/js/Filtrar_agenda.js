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

function filterAgenda() {
  const filterDate = document.getElementById("filter_date").value;
  const filterName = normalizeText(
    document.getElementById("filter_name").value
  );
  const filterTipoExamen = normalizeText(
    document.getElementById("filter_tipoexamen").value
  );
  const filterType_document = normalizeText(
    document.getElementById("documentType").value
  );
  const filterId = normalizeText(document.getElementById("filter_id").value);
  const table = document.getElementById("patient_table");
  const tr = table.getElementsByTagName("tr");

  for (let i = 1; i < tr.length; i++) {
    const tdDate = tr[i].getElementsByTagName("td")[0];
    const tdName = tr[i].getElementsByTagName("td")[2];
    const tdTipoExamen = tr[i].getElementsByTagName("td")[3];
    const tdType_document = tr[i].getElementsByTagName("td")[4];
    const tdId = tr[i].getElementsByTagName("td")[5];

    if (tdDate && tdName && tdTipoExamen && tdId) {
      const dateValue = tdDate.textContent || tdDate.innerText;
      const nameValue = normalizeText(tdName.textContent || tdName.innerText);
      const TipoExamenValue = normalizeText(
        tdTipoExamen.textContent || tdTipoExamen.innerText
      );
      const filterType_documentValue = normalizeText(
        tdType_document.textContent || tdType_document.innerText
      );
      const idValue = normalizeText(tdId.textContent || tdId.innerText);

      if (
        (filterDate === "" || dateValue.indexOf(filterDate) > -1) &&
        (filterName === "" || nameValue.indexOf(filterName) > -1) &&
        (filterTipoExamen === "" || TipoExamenValue.indexOf(filterTipoExamen) > -1) &&
        (filterType_document === "" ||
          filterType_documentValue.indexOf(filterType_document) > -1) &&
        (filterId === "" || idValue.indexOf(filterId) > -1)
      ) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

function clearFilterAgenda() {
  document.getElementById("filter_date").value = "";
  document.getElementById("filter_name").value = "";
  document.getElementById("filter_tipoexamen").value = "";
  document.getElementById("documentType").value = "";
  document.getElementById("filter_id").value = "";
  filterAgenda();
  clearCheckboxes();
}
