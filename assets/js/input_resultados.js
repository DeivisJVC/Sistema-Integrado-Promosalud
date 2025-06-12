function mostrarNombreArchivo(input) {
  const fileName =
    input.files.length > 0
      ? input.files[0].name
      : "Ningún archivo seleccionado";
  const fileNameDiv = input.parentNode.querySelector(".file-name");
  fileNameDiv.textContent = fileName;
}
