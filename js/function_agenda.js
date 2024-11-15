//buscar como filtrar por fecha, hora, doctor, etc

function filterAgenda() {
  let date = document.getElementById("date").value;
  let time = document.getElementById("time").value;
  let doctor = document.getElementById("doctor").value;
  let table = document.getElementById("agenda");
  let rows = table.getElementsByTagName("tr");
  for (let i = 0; i < rows.length; i++) {
    let row = rows[i];
    let cells = row.getElementsByTagName("td");
    let dateCell = cells[0];
    let timeCell = cells[1];
    let doctorCell = cells[2];
    if (
      dateCell.textContent.includes(date) &&
      timeCell.textContent.includes(time) &&
      doctorCell.textContent.includes(doctor)
    ) {
      row.style.display = "";
    } else {
      row.style.display = "none";
    }
  }
}

function clearFilterAgenda() {
  document.getElementById("date").value = "";
  document.getElementById("time").value = "";
  document.getElementById("doctor").value = "";
  let table = document.getElementById("agenda");
  let rows = table.getElementsByTagName("tr");
  for (let i = 0; i < rows.length; i++) {
    let row = rows[i];
    row.style.display = "";
  }
}
function downloadAgenda() {
  //implementar con la base de datos
}
