tipo_examen = document.getElementById("tipo_examen").value;
if (tipo_examen === "periodicos") {
  console.log("Tipo de examen: Periódicos");
} else if (tipo_examen === "retiro") {
  console.log("Tipo de examen: retiro");
} else if (tipo_examen === "ingreso") {
  console.log("Tipo de examen: ingreso");
} else {
  console.log("Tipo de examen no reconocido: " + tipo_examen);
}

