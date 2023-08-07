const photoPreviewEl = document.querySelector('.form__photo-preview');
const photoChooserEl = document.querySelector('input[name="photo"]');
const fileChooserEl = document.querySelector('input[name="instruction"]');
const filePreviewEl = document.querySelector('label[for="instruction"]');

photoChooserEl.addEventListener('change', (evt) => {
  const file = evt.target.files[0];
  photoPreviewEl.src = URL.createObjectURL(file);
});

fileChooserEl.addEventListener('change', (evt) => {
  filePreviewEl.textContent = evt.target.value;
});
