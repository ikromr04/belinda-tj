// const applyForm = document.querySelector('#apply-form');
const aeForm = document.querySelector('#ae-form');

// const pristine = window.Pristine(applyForm, {
//   classTo: 'form__item',
//   errorClass: 'form__item--invalid',
//   successClass: 'form__item--valid',
//   errorTextParent: 'form__item',
//   errorTextTag: 'div',
//   errorTextClass: 'form__error'
// }, true);

// applyForm.addEventListener('submit', (evt) => {
//   evt.preventDefault();
//   const isValid = pristine.validate();
//   if (isValid) {
//     console.log('valid');
//   }
// });

const pristineAe = window.Pristine(aeForm, {
  classTo: 'form__item',
  errorClass: 'form__item--invalid',
  successClass: 'form__item--valid',
  errorTextParent: 'form__item',
  errorTextTag: 'div',
  errorTextClass: 'form__error'
}, true);

aeForm.addEventListener('submit', (evt) => {
  evt.preventDefault();
  const isValid = pristineAe.validate();
  if (isValid) {
    aeForm.submit();
  }
});
