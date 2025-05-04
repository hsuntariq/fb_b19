const cross = document.querySelector(".cross");
let card = document.querySelector(".user-card");
let eye = document.querySelector(".eye");
let pass = document.querySelector(".pass");
let add_account = document.querySelector(".add-account");
let login_underlay = document.querySelector(".login-underlay");
let login_overlay = document.querySelector(".login-overlay");
let close = document.querySelector(".close-login");
let close_btn = document.querySelector(".invalid");
let invalid_popup = document.querySelector(".notification-popup");
let post_succ_btn = document.querySelector('.post-succ-btn')


cross.addEventListener("click", () => {
  card.style.display = "none";
});

eye.addEventListener("click", () => {
  eye.classList.toggle("bi-eye-slash");
  eye.classList.toggle("bi-eye");

  eye.classList.contains("bi-eye-slash")
    ? (pass.type = "password")
    : (pass.type = "text");
});

// add account

add_account.addEventListener("click", () => {
  login_underlay.style.transform = "translateX(0)";
  setTimeout(() => {
    login_overlay.style.transform = "translateY(0)";
  }, 450);
});
close.addEventListener("click", () => {
  login_overlay.style.transform = "translateY(-100%)";
  setTimeout(() => {
    login_underlay.style.transform = "translateX(100%)";
  }, 450);
});

close_btn.addEventListener("click", () => {
  invalid_popup.style.transform = "translateX(150%)";
});

post_succ_btn.addEventListener("click", () => {
  invalid_popup.style.transform = "translateX(150%)";

})