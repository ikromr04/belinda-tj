const applyForm = document.querySelector('.form');

const pristine = window.Pristine(applyForm, {
  classTo: 'form__item',
  errorClass: 'form__item--invalid',
  successClass: 'form__item--valid',
  errorTextParent: 'form__item',
  errorTextTag: 'div',
  errorTextClass: 'form__error'
}, true);

applyForm.addEventListener('submit', (evt) => {
  evt.preventDefault();

  const isValid = pristine.validate();
  
  if (isValid) {
    evt.target.querySelector('button[type="submit"]')
      .textContent = 'Отправляю...'

    evt.target.submit();
  }
});
