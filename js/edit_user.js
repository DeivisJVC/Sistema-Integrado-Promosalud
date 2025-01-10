document.addEventListener("DOMContentLoaded", function () {
  const menuBtn = document.getElementById("menuBtn");
  const closeBtn = document.getElementById("closeBtn");
  const profileMenu = document.getElementById("profileMenu");
  const overlay = document.getElementById("overlay");

  if (menuBtn && closeBtn && profileMenu && overlay) {
    menuBtn.addEventListener("click", () => {
      profileMenu.classList.add("open");
      overlay.classList.add("show");
    });

    closeBtn.addEventListener("click", () => {
      profileMenu.classList.remove("open");
      overlay.classList.remove("show");
    });

    overlay.addEventListener("click", () => {
      profileMenu.classList.remove("open");
      overlay.classList.remove("show");
    });
  }
});
