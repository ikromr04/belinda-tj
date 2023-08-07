const formEl = document.querySelector('.form-dash');
const imgChooserEl = formEl.querySelector('input[name="img"]');
const imgPreviewEl = document.querySelector('img');
const submitEl = document.querySelector('[data-action="submit"]');

imgChooserEl.addEventListener('change', (evt) => {
  const file = evt.target.files[0];

  imgPreviewEl.src = URL.createObjectURL(file);
  imgChooserEl.nextElementSibling.value = file.name;
});

formEl.addEventListener('submit', (evt) => evt.preventDefault());
submitEl.addEventListener('click', () => formEl.submit());
