import { debounce } from '../util.js';

const addFormShowEl = document.querySelector('.add-action');
const addFormCloseEl = document.querySelector('.form__close');
const addFormEl = document.querySelector('.vacancy-add-form');
const searchFieldEl = document.querySelector('input[type="search"]');
const productTitleEls = document.querySelectorAll('.data-list__title');

function showAddForm() {
  addFormEl.classList.remove('vacancy-add-form--hidden');
  addFormCloseEl.addEventListener('click', hideAddForm);
};

function hideAddForm() {
  addFormEl.classList.add('vacancy-add-form--hidden');
  addFormCloseEl.removeEventListener('click', hideAddForm);
};

addFormShowEl.addEventListener('click', showAddForm);


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

