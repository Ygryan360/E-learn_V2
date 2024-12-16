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


/**
 * Cette fonction affiche la popup pour partager son score.
 */
function afficherPopup() {
  let popupBackground = document.querySelector(".popupBackground");
  // La popup est masquée par défaut (display:none), ajouter la classe "active"
  // va changer son display et la rendre visible.
  popupBackground.classList.add("active");
}

/**
 * Cette fonction cache la popup pour partager son score.
 */
function cacherPopup() {
  let popupBackground = document.querySelector(".popupBackground");
  // La popup est masquée par défaut (display:none), supprimer la classe "active"
  // va rétablir cet affichage par défaut.
  popupBackground.classList.remove("active");
}

/**
 * Cette fonction initialise les écouteurs d'événements qui concernent
 * l'affichage de la popup.
 */
function initAddEventListenerPopup() {
  // On écoute le click sur le bouton "partager"
  btnPartage = document.querySelector(".zonePartage button");
  let popupBackground = document.querySelector(".popupBackground");
  btnPartage.addEventListener("click", () => {
    // Quand on a cliqué sur le bouton partagé, on affiche la popup
    afficherPopup();
  });

  // On écoute le click sur la div "popupBackground"
  popupBackground.addEventListener("click", (event) => {
    // Si on a cliqué précisément sur la popupBackground
    // (et pas un autre élément qui se trouve dedant)
    if (event.target === popupBackground) {
      // Alors on cache la popup
      cacherPopup();
    }
  });
}