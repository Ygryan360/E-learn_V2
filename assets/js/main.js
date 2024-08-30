function refreshpage() {
  location.reload();
}

// setInterval(refreshpage, 5000);
let goToTopBtn = document.getElementById("scrollToTop");
window.onscroll =  () =>{
  if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
    goToTopBtn.style.display = "block";
  } else {
    goToTopBtn.style.display = "none";
  }
}
  function scrollToTop() {
  window.scrollTo({ top: 0, behavior: "smooth" });
}
