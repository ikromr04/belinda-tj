import { getSearchResult } from './api.js';
import { debounce } from './util.js';

const searchFormEl = document.querySelector('.search-form');
const searchInputEl = searchFormEl.querySelector('input[name="keyword"]');
const searchResultEl = document.querySelector('.search-result-holder');

const renderSearchResult = (result) => {
  searchResultEl.innerHTML = result;
};

searchInputEl.addEventListener('input', debounce((evt) => {
  const keyword = evt.target.value;
  if (keyword.length > 0) {
    getSearchResult(keyword, renderSearchResult);
  } else {
    searchResultEl.innerHTML = '';
  }
}));
