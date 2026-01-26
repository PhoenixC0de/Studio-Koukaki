
document.addEventListener("DOMContentLoaded", () => {

  const titles = document.querySelectorAll('.section-title');

  titles.forEach(title => {
    const words = title.textContent.split(" ");
    title.textContent = "";

    const wrapper = document.createElement("span");
    wrapper.className = "words";
    title.appendChild(wrapper);

    words.forEach((word, i) => {
      const span = document.createElement("span");
      span.textContent = word;
      span.style.transitionDelay = (i * 0.25) + "s";
      wrapper.appendChild(span);

      wrapper.appendChild(document.createTextNode(" "));
    });
  });

  const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    const spans = entry.target.querySelectorAll(".words span");

    if (entry.isIntersecting) {
      // Apparition
      spans.forEach(span => span.classList.add("visible"));
    }
    else {
      // Disparition → reset
      spans.forEach(span => span.classList.remove("visible"));
    }
  });
});


  titles.forEach(title => observer.observe(title));

});
//paralaxe du hero header 
window.addEventListener("scroll", () => {
  const scrollY = window.scrollY;

  const logo = document.querySelector(".banner-logo");
  if (logo) {
    // On récupère le transform généré par l’animation CSS
    const floatTransform = window.getComputedStyle(logo).transform;

    // On ajoute le translateY du parallaxe
    logo.style.transform = `${floatTransform} translateY(${scrollY * 0.4}px)`;
  }

  const video = document.querySelector(".video-bg");
  if (video) {
    video.style.transform = `translateY(${scrollY * 0.5}px)`;
  }
});

//animation des nuages 

const gros = document.getElementById("gros-nuage");
const petit = document.getElementById("petit-nuage");

function animateCloud(cloud, factor = 1) {
    const rect = cloud.getBoundingClientRect();
    const windowHeight = window.innerHeight;

    // Si le nuage n'est pas visible - pas d'animation
    if (rect.top > windowHeight || rect.bottom < 0) return;

    // Progression dans la fenêtre
    const progress = 1 - rect.top / windowHeight;

    // Mouvement : 0px (haut) -> -300px (bas)
    const translate = progress * -300 * factor;

    cloud.style.transform = `translateX(${translate}px)`;
}

window.addEventListener("scroll", () => {
    animateCloud(gros, 1.9);     // Gros nuage
    animateCloud(petit, 0.9);  // Petit nuage (parallax)
});




// Sélectionne le bouton du menu burger et l'élément de navigation dans le DOM.
const body = document.querySelector(".menu-ouvert");
const burgerButton = document.querySelector(".nav-toggler");

burgerButton.addEventListener("click", function () {
    const isOpen = body.classList.toggle("open");

    // Animation du bouton (croix)
    burgerButton.classList.toggle("active", isOpen);

    // Accessibilité
    burgerButton.setAttribute("aria-expanded", isOpen);
    burgerButton.setAttribute("aria-label", isOpen ? "Fermer le menu" : "Ouvrir le menu");
});
// Fermer le menu quand on clique sur un lien
document.querySelectorAll(".menu-list a").forEach(link => {
    link.addEventListener("click", () => {
        body.classList.remove("open");
        burgerButton.classList.remove("active");
        burgerButton.setAttribute("aria-expanded", "false");
        burgerButton.setAttribute("aria-label", "Ouvrir le menu");
    });
});


