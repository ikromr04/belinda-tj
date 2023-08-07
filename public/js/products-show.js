import './accordion.js';

const halfGlide = document.querySelector('[data-type="carousel-half"]');
if (halfGlide) {
  new Glide('[data-type="carousel-half"]', {
    type: 'carousel',
    perView: 2,
    gap: 32,
    autoplay: 3000,
    breakpoints: {
      1399: {
        perView: 1,
        gap: 24
      },
      991: {
        perView: 1,
        gap: 16
      },
      575: {
        perView: 1,
        gap: 16
      }
    }
  }).mount()
}

