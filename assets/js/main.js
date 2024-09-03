function refreshpage() {
  location.reload();
}

function gotToLecturePage () {
  let lectureBtn = document.getElementById("lectureBtn");
  lectureBtn.addEventListener("click", () => {
    document.location = "/course.html";
  });
}

// setInterval(refreshpage, 5000);
let goToTopBtn = document.getElementById("scrollToTop");
window.onscroll = () => {
  if (
    document.body.scrollTop > 500 ||
    document.documentElement.scrollTop > 500
  ) {
    goToTopBtn.style.display = "block";
  } else {
    goToTopBtn.style.display = "none";
  }
};
function scrollToTop() {
  window.scrollTo({ top: 0, behavior: "smooth" });
}


/**
 * Animations
 */
document.addEventListener("DOMContentLoaded", function () {
  const fadeIns = document.querySelectorAll(".fade-in");
  console.log(fadeIns);
  

  // Vérifie que l'observateur fonctionne bien
  if ("IntersectionObserver" in window) {
    const observer = new IntersectionObserver(
      (entries, observer) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add("fade-in-visible");
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.1 }
    ); // Se déclenche quand 10% de l'élément est visible

    fadeIns.forEach((fadeIn) => {
      observer.observe(fadeIn);
    });
  } else {
    // Fallback si IntersectionObserver n'est pas supporté
    fadeIns.forEach((fadeIn) => {
      fadeIn.classList.remove("fade-in")
      fadeIn.classList.add("fade-in-visible");
    });
  }
});

document.addEventListener("DOMContentLoaded", function () {
  const elements = document.querySelectorAll(".fade-in-up");

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("show");
        }
      });
    },
    { threshold: 0.1 }
  );

  elements.forEach((el) => {
    observer.observe(el);
  });
});
