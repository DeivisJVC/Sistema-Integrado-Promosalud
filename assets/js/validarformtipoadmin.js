const selectdiv = document.getElementById("container-especialidad");
const optionMedico = document.getElementById("medico");
const inputEspecialidad = document.getElementById("especialidad");

optionMedico.addEventListener('change', function () {
  if (this.value = "medico") {
    inputEspecialidad.setAttribute("required", "required");
    selectdiv.classList.remove("d-none");
  } else {
    inputEspecialidad.removeAttribute('required')
    inputEspecialidad.value = '';
  }
});
  

