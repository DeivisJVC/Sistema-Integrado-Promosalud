// Validar el rol con JavaScript
if (rol === "administrador") {
  console.log("El usuario tiene rol de administrador.");
} else if (rol === "paciente") {
  document.getElementById("consultar_cita").classList.add("d-none");
} else if (rol === "empresa") {
  document.getElementById("consultar_cita").classList.add("d-none");
}
else {
  console.log("Rol no reconocido.");
}