import { debounce } from '../util.js';

const addFormShowEl = document.querySelector('.add-action');
const addFormCloseEl = document.querySelector('.form__close');
const addFormEl = document.querySelector('.newslifestyle-add-form');
const photoPreviewEl = document.querySelector('.form__photo-preview');
const photoChooserEl = document.querySelector('input[name="img"]');
const searchFieldEl = document.querySelector('input[type="search"]');
const productTitleEls = document.querySelectorAll('.data-list__title');

function showAddForm() {
  addFormEl.classList.remove('newslifestyle-add-form--hidden');
  addFormCloseEl.addEventListener('click', hideAddForm);
};

function hideAddForm() {
  addFormEl.classList.add('newslifestyle-add-form--hidden');
  addFormCloseEl.removeEventListener('click', hideAddForm);
};

addFormShowEl.addEventListener('click', showAddForm);

photoChooserEl.addEventListener('change', (evt) => {
  const file = evt.target.files[0];
  photoPreviewEl.src = URL.createObjectURL(file);
});

addFormEl.addEventListener('reset', () => {
  photoPreviewEl.src = photoPreviewEl.dataset.src;
  photoChooserEl.value = '';
});

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

