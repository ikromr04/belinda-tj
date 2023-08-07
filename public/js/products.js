import { getFilteredProductsTemplate } from './api.js';
import { debounce } from './util.js'

const searchInput = document.querySelector('input[name="product-keyword"]');
const productsWrapper = document.querySelector('.products-inner');
const selects = document.querySelectorAll('select');

const filter = {
  classification: '',
  nosology: '',
  prescription: '',
  page: 1,
  keyword: '',
};

const productsWrapperClickHandler = (evt) => {
  if (evt.target.className === 'page-link') {
    evt.preventDefault();

    filter.page = evt.target.href.split('page=')[1];

    getFilteredProductsTemplate(filter, (template) => {
      productsWrapper.innerHTML = template;
    });
  }
};

productsWrapper.addEventListener('click', productsWrapperClickHandler);

const filterProducts = () => {
  const form = new FormData(document.querySelector('.products-filter'));

  filter.classification = form.get('classification');
  filter.nosology = form.get('nosology');
  filter.prescription = form.get('prescription');
  filter.page = 1;
  filter.keyword = '';
  searchInput.value = '';

  getFilteredProductsTemplate(filter, (template) => {
    productsWrapper.innerHTML = template;
  });
};

selects.forEach(select => {
  select.addEventListener('change', filterProducts);
});

window.selectChangeHandler = () => {
  filterProducts();
};


const searchInputHandler = (evt) => {
  filter.page = 1;
  filter.keyword = evt.target.value;

  getFilteredProductsTemplate(filter, (template) => {
    productsWrapper.innerHTML = template;
  });
};

searchInput.addEventListener('input', debounce(searchInputHandler));
