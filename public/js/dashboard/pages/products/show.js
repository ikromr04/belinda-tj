import { createElement } from '../../../util.js';

const formEl = document.querySelector('.form-dash');
const photoChooserEl = formEl.querySelector('input[name="photo"]');
const instructionChooserEl = formEl.querySelector('input[name="instruction"]');
const photoPreviewEl = document.querySelector('img');
const simditors = formEl.querySelectorAll('textarea');
const submitEl = document.querySelector('[data-action="submit"]');
const classificationEl = formEl.querySelector('select[name="classification_id"]');
const nosologyEl = formEl.querySelector('select[name="nosology_id"]');

simditors.forEach((simditor) => {
  const simdit = new Simditor({
    textarea: simditor,
    cleanPaste: true,
    toolbar: [
      'title',
      'bold',
      'italic',
      'underline',
      'strikethrough',
      'ol',
      'ul',
      'indent',
      'outdent',
      'alignment',
    ]
  });

  simdit.body[0].classList.add('form-dash__field', 'form-dash__field--text', 'content');
});

const pristine = window.Pristine(formEl, {
  classTo: 'form-dash__element',
  errorClass: 'form-dash__element--invalid',
  successClass: 'form-dash__element--valid',
  errorTextParent: 'form-dash__element',
  errorTextTag: 'span',
  errorTextClass: 'form-dash__error'
}, true);

photoChooserEl.addEventListener('change', (evt) => {
  const file = evt.target.files[0];

  photoPreviewEl.src = URL.createObjectURL(file);
  evt.target.nextElementSibling.value = file.name;
});

instructionChooserEl.addEventListener('change', (evt) => {
  const file = evt.target.files[0];

  evt.target.nextElementSibling.value = file.name;
});

classificationEl.addEventListener('change', (evt) => {
  if (evt.target.value === '') {
    const input = createElement('<input class="form-dash__field" name="classification" type="text" required>');
    evt.target.replaceWith(input);
    input.focus();
  }
});

nosologyEl.addEventListener('change', (evt) => {
  if (evt.target.value === '') {
    const input = createElement('<input class="form-dash__field" name="nosology" type="text" required>');
    evt.target.replaceWith(input);
    input.focus();
  }
});


formEl.addEventListener('submit', (evt) => evt.preventDefault());
submitEl.addEventListener('click', () => {
  const isValid = pristine.validate();

  if (isValid) {
    formEl.submit();
  }
});
