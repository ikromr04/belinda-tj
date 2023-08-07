import './global-search.js';

const header = document.querySelector('.header');
const menu = document.querySelector('.menu');
const menuBtn = header.querySelector('.menu-button');
const hamburgerEl = document.querySelector('.hamburger');

menuBtn.addEventListener('click', () => {
  header.classList.toggle('menu--shown');
});

document.body.addEventListener('click', (evt) => {
  !menu.contains(evt.target) ? header.classList.remove('menu--shown') : '';
});

const searchInput = header.querySelector('input[type="search"]');

searchInput.setAttribute('size', searchInput.getAttribute('placeholder').length);

searchInput.addEventListener('input', () => {
  searchInput.value.length > 0
    ? searchInput.setAttribute('size', searchInput.value.length)
    : searchInput.setAttribute('size', searchInput.getAttribute('placeholder').length);
});

searchInput.addEventListener('focusout', () => {
  searchInput.setAttribute('size', searchInput.getAttribute('placeholder').length);
  // searchInput.value = '';
  // document.querySelector('.search-result-holder').innerHTML = '';
});

hamburgerEl.addEventListener('click', () => {
  header.classList.toggle('mobile-menu');
});

const glide = document.querySelector('[data-type="carousel"]');
if (glide) {
  new Glide('[data-type="carousel"]', {
    type: 'carousel',
    perView: 4,
    gap: 32,
    autoplay: 3000,
    breakpoints: {
      1399: {
        perView: 3,
        gap: 24
      },
      991: {
        perView: 2,
        gap: 16
      },
      575: {
        perView: 1,
        gap: 16
      }
    }
  }).mount()
}
