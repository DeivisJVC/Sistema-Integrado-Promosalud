function showStep(step) {
  if (step === 1) {
    document.getElementById("step1").style.display = "";
    document.getElementById("step2").style.display = "none";
    document.getElementById("prev-step").style.display = "none";
    document.getElementById("next-step").style.display = "";
    document.getElementById("step-title").innerText =
      "Publicacion de resultados";
  } else {
    // Llenar la tabla de seleccionados
    const selected = [];
    document
      .querySelectorAll("#patient_table tbody tr")
      .forEach(function (row) {
        const checkbox = row.querySelector('input[type="checkbox"]');
        if (checkbox && checkbox.checked) {
          const cells = row.querySelectorAll("td");
          selected.push({
            nombre: cells[0].innerText,
            apellido: cells[1].innerText,
            tipo: cells[2].innerText,
            numero: cells[3].innerText,
            examen: cells[4].innerText,
            estado: cells[5].innerText,
          });
        }
      });
    const tbody = document.getElementById("selected-patients");
    tbody.innerHTML = "";
    if (selected.length === 0) {
      tbody.innerHTML =
        '<tr><td colspan="4" class="text-center">No hay pacientes seleccionados.</td></tr>';
    } else {
      selected.forEach(function (p) {
        const tr = document.createElement("tr");
        tr.innerHTML = `<td>${p.nombre}</td>
                <td>${p.apellido}</td>
                <td>${p.tipo}</td>
                <td>${p.numero}</td>
                <td>${p.examen}</td>
                <td>${p.estado}</td>`;
        tbody.appendChild(tr);
      });
    }
    document.getElementById("step1").style.display = "none";
    document.getElementById("step2").style.display = "";
    document.getElementById("prev-step").style.display = "";
    document.getElementById("next-step").style.display = "none";
    document.getElementById("step-title").innerText =
      "Resultados seleccionados";
  }
}

function removeSelectedRow(btn) {
  // Opcional: puedes desmarcar el checkbox correspondiente en la tabla 1 si lo deseas
  const row = btn.closest("tr");
  const nombre = row.children[0].innerText;
  const apellido = row.children[1].innerText;
  const tipo = row.children[2].innerText;
  // Buscar y desmarcar en la tabla 1
  document.querySelectorAll("#patient_table tbody tr").forEach(function (r) {
    if (
      r.children[0].innerText === nombre &&
      r.children[1].innerText === apellido &&
      r.children[2].innerText === tipo
    ) {
      const checkbox = r.querySelector('input[type="checkbox"]');
      if (checkbox) checkbox.checked = false;
    }
  });
  row.remove();
  // Si ya no hay filas, mostrar mensaje
  if (document.querySelectorAll("#selected-patients tr").length === 0) {
    document.getElementById("selected-patients").innerHTML =
      '<tr><td colspan="4" class="text-center">No hay pacientes seleccionados.</td></tr>';
  }
}
