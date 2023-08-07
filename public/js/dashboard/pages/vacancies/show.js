const formEl = document.querySelector('.form-dash');
const simditors = formEl.querySelectorAll('textarea');
const submitEl = document.querySelector('[data-action="submit"]');

simditors.forEach((simditor) => {
  const simdit = new Simditor({
    textarea: simditor,
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

formEl.addEventListener('submit', (evt) => evt.preventDefault());
submitEl.addEventListener('click', () => {
  const isValid = pristine.validate();

  if (isValid) {
    formEl.submit();
  }
});
