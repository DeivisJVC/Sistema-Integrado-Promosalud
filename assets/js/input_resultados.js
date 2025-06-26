function mostrarNombreArchivo(input) {
  const fileName =
    input.files.length > 0
      ? input.files[0].name
      : "Ningún archivo seleccionado";
  const fileNameDiv = input.parentNode.querySelector(".file-name");
  fileNameDiv.textContent = fileName;
}


document.addEventListener("click", function (e) {
  if (
    e.target.matches(".btn-link[title='Eliminar archivo']") ||
    (e.target.closest("button.btn-link[title='Eliminar archivo']") && e.target.tagName === "IMG")
  ) {
    // Encuentra el botón y el contenedor
    const btn = e.target.closest("button");
    const wrapper = btn.closest(".upload-wrapper");
    const input = wrapper.querySelector("input[type='file']");
    const fileNameDiv = wrapper.querySelector(".file-name");

    // Limpia el input y el nombre mostrado
    input.value = "";
    fileNameDiv.textContent = "Ningún archivo seleccionado";
  }
});