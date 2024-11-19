function normalizeText(text) {
  return text
    .toLowerCase()
    .normalize("NFD")
    .replace(/[\u0300-\u036f]/g, "");
}

function filterAgenda() {
  const filterDate = document.getElementById("filter_date").value;
  const filterName = normalizeText(
    document.getElementById("filter_name").value
  );
  const filterDoctor = normalizeText(
    document.getElementById("filter_doctor").value
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
    const tdDoctor = tr[i].getElementsByTagName("td")[3];
    const tdType_document = tr[i].getElementsByTagName("td")[4];
    const tdId = tr[i].getElementsByTagName("td")[5];

    if (tdDate && tdName && tdDoctor && tdId) {
      const dateValue = tdDate.textContent || tdDate.innerText;
      const nameValue = normalizeText(tdName.textContent || tdName.innerText);
      const doctorValue = normalizeText(
        tdDoctor.textContent || tdDoctor.innerText
      );
      const filterType_documentValue = normalizeText(
        tdType_document.textContent || tdType_document.innerText
      );
      const idValue = normalizeText(tdId.textContent || tdId.innerText);

      if (
        (filterDate === "" || dateValue.indexOf(filterDate) > -1) &&
        (filterName === "" || nameValue.indexOf(filterName) > -1) &&
        (filterDoctor === "" || doctorValue.indexOf(filterDoctor) > -1) &&
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
  document.getElementById("filter_doctor").value = "";
  document.getElementById("documentType").value = "";
  document.getElementById("filter_id").value = "";
  filterAgenda();
}

window.onload = filterAgenda;
