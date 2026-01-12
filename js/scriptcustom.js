/*
document.addEventListener("DOMContentLoaded", () => {

  const titles = document.querySelectorAll('.section-title');

  // 1) Découpe chaque titre en mots
  titles.forEach(title => {
    const words = title.textContent.trim().split(" ");
    title.textContent = "";

    words.forEach((word, index) => {
      const span = document.createElement("span");
      span.textContent = word + " ";
      span.style.transitionDelay = (index * 0.12) + "s"; // effet cascade mot par mot
      title.appendChild(span);
    });
  });

  // 2) Observer pour déclencher l’animation
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const spans = entry.target.querySelectorAll("span");
        spans.forEach(span => span.classList.add("visible"));
        observer.unobserve(entry.target);
      }
    });
  }, {
    threshold: 0.2
  });

  titles.forEach(title => observer.observe(title));

});*/
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
      span.style.transitionDelay = (i * 0.15) + "s";
      wrapper.appendChild(span);

      wrapper.appendChild(document.createTextNode(" "));
    });
  });

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.querySelectorAll(".words span").forEach(span => {
          span.classList.add("visible");
        });
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



