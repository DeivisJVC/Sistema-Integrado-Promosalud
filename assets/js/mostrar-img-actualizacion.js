document.getElementById("img").addEventListener("change", function (e) {
  const [file] = this.files;
  if (file) {
    const preview = document.querySelector("img.rounded-circle");
    preview.src = URL.createObjectURL(file);
  }
});
