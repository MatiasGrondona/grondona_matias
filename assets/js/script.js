//JS del Carrusel
var swiper = new Swiper(".slide-container", {
  slidesPerView: 1,
  spaceBetween: 20,
  centeredSlides: false,
  slidesPerGroupSkip: 1,
  grabCursor: true,
  fade: true,
  centerSlide: "true",
  keyboard: {
    enabled: false,
  },
  breakpoints: {
    0:{
      slidesPerView: 1,
    },
    520:{
      slidesPerView: 2,
    },
    768: {
      slidesPerView: 3,
    },
    1000:{
      slidesPerView: 4,
    }
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});

  