import { debounce } from '../util.js';

const searchFieldEl = document.querySelector('input[type="search"]');
const productTitleEls = document.querySelectorAll('.data-list__title');

searchFieldEl.addEventListener('input', debounce((evt) => {
  const keyword = evt.target.value;

  productTitleEls.forEach(el => {
    const item = el.parentElement;
    if (!el.textContent.toLowerCase().includes(keyword)) {
      item.classList.add('data-list__item--hidden');
    } else {
      if (item.classList.contains('data-list__item--hidden')) {
        item.classList.remove('data-list__item--hidden');
      }
    }
  });
}));

