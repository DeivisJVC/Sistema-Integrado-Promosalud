// Mostrar el modal si el parámetro "success" está en la URL
const urlParams = new URLSearchParams(window.location.search);
if (urlParams.get("success") === "1") {
  const successModal = new bootstrap.Modal(
    document.getElementById("successModal")
  );
  successModal.show();
}
