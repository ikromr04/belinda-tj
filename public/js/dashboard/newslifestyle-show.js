const addFormEl = document.querySelector('.newslifestyle-add-form');
const photoPreviewEl = document.querySelector('.form__photo-preview');
const photoChooserEl = document.querySelector('input[name="img"]');

photoChooserEl.addEventListener('change', (evt) => {
  const file = evt.target.files[0];
  photoPreviewEl.src = URL.createObjectURL(file);
});
