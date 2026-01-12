document.addEventListener('DOMContentLoaded', function () {
  new Swiper('.mySwiper', {
    effect: 'slide',
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: 'auto',
    coverflowEffect: {
      rotate: 0,
      stretch: -30,
      depth: 0,
      modifier: 1,
      slideShadows: false,
    },
  });
});