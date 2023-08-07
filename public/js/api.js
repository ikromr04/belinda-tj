const headers = {
  'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
};

const getFilteredProductsTemplate = (filter, onSuccess) => {
  fetch(`/product/filter?page=${filter.page}`, {
    headers,
    method: 'post',
    body: JSON.stringify(filter),
  })
    .then((response) => response.json())
    .then((response) => {
      onSuccess(response.template);
    })
    .catch((err) => {
      console.error(err);;
    });
};

const getSearchResult = (keyword, onSuccess) =>
  fetch(`/search?keyword=${keyword}`)
    .then((response) => response.json())
    .then((result) => {
      onSuccess(result.template);
    })
    .catch((err) => {
      console.error(err);
    });

export {
  getFilteredProductsTemplate,
  getSearchResult,
};
