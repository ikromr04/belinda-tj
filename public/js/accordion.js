const accordion = document.querySelector('[data-type="accordion"]');
const buttons = accordion.querySelectorAll('dt');

const buttonClickHandler = (evt) => {
  buttons.forEach(element => {
    if (element.contains(evt.target)) {
      element.classList.toggle('accordion__head--hidden');
      return;
    }
    element.classList.add('accordion__head--hidden');
  });
};

const accordionClickHandler = (evt) => {
  if (!accordion.contains(evt.target)) {
    buttons.forEach((button) =>
      button.classList.add('accordion__head--hidden')
    );
  }
};

buttons.forEach((button) =>
  button.addEventListener('click', buttonClickHandler));

document.body.addEventListener('click', accordionClickHandler);

export { buttonClickHandler, accordionClickHandler };
