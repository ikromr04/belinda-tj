import { debounce } from '../util.js';

const addFormShowEl = document.querySelector('.add-action');
const addFormCloseEl = document.querySelector('.form__close');
const addFormEl = document.querySelector('.product-add-form');
const photoPreviewEl = document.querySelector('.form__photo-preview');
const photoChooserEl = document.querySelector('input[name="photo"]');
const fileChooserEl = document.querySelector('input[name="instruction"]');
const filePreviewEl = document.querySelector('label[for="instruction"]');
const searchFieldEl = document.querySelector('input[type="search"]');
const productTitleEls = document.querySelectorAll('.data-list__title');

function showAddForm() {
  addFormEl.classList.remove('product-add-form--hidden');
  addFormCloseEl.addEventListener('click', hideAddForm);
};

function hideAddForm() {
  addFormEl.classList.add('product-add-form--hidden');
  addFormCloseEl.removeEventListener('click', hideAddForm);
};

addFormShowEl.addEventListener('click', showAddForm);

photoChooserEl.addEventListener('change', (evt) => {
  const file = evt.target.files[0];
  photoPreviewEl.src = URL.createObjectURL(file);
});

fileChooserEl.addEventListener('change', (evt) => {
  filePreviewEl.textContent = evt.target.value;
});

addFormEl.addEventListener('reset', () => {
  photoPreviewEl.src = photoPreviewEl.dataset.src;
  photoChooserEl.value = '';
  fileChooserEl.value = '';
  filePreviewEl.textContent = 'Загрузить инструкцию';
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

