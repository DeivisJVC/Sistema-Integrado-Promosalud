// Validar el rol con JavaScript
if (rol === "administrador") {
  document.getElementById("main-content-administrador").classList.remove("d-none");
} else if (rol === "paciente") {
  document.getElementById("main-content-paciente").classList.remove("d-none");
} else if (rol === "empresa") {
  document.getElementById("main-content-empresa").classList.remove("d-none");
}
else {
  console.log("Rol no reconocido.");
}