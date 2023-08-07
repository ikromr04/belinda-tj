import { createElement } from './util.js';

const Template = {
  EDIT_BUTTON: '<button class="action action--edit" type="button">редактировать</button>',
  SAVE_BUTTON: '<button class="action action--save" type="button">сохранить</button>',
  CANCEL_BUTTON: '<button class="action action--cancel" type="button">отмена</button>',
};

class TextManager {
  #editButtonEl = null;
  #isEditted = false;
  #element = null;
  #elementCopy = null;
  #editorEl = null;

  start = () => document.addEventListener('mouseover', this.#documentMouseOverHandler);

  init = () => {
    const textEl = this.#editButtonEl.parentElement;
    textEl.scrollIntoView({ block: 'center', behavior: 'smooth' });
    textEl.removeAttribute('style');
    this.#editButtonEl.remove();
    this.#editButtonEl = null;
    document.addEventListener('mouseover', this.#documentMouseOverHandler);

    if (this.#element) {
      this.destroy();
    }

    this.#element = textEl;
    this.#elementCopy = this.#element.cloneNode(true);
    this.#elementCopy.removeAttribute('data-text')
    this.#editorEl = document.createElement('div');
    this.#editorEl.setAttribute('style', 'position: relative;')
    this.#editorEl.append(this.#elementCopy);
    this.#element.replaceWith(this.#editorEl);
    this.#elementCopy.setAttribute('style', 'outline: 1px solid #959595');

    const cancelButtonEl = createElement(Template.CANCEL_BUTTON);
    const saveButtonEl = createElement(Template.SAVE_BUTTON);
    saveButtonEl.setAttribute('disabled', 'disabled');
    this.#elementCopy.insertAdjacentElement('beforebegin', cancelButtonEl);
    this.#editorEl.append(saveButtonEl);
    this.#elementCopy.setAttribute('contenteditable', true);
    this.#elementCopy.addEventListener('input', () => {
      if (this.#elementCopy.textContent.length === 0 || this.#elementCopy.textContent === this.#element.textContent) {
        saveButtonEl.setAttribute('disabled', 'disabled');
        this.#elementCopy.setAttribute('style', 'outline: 1px solid #959595;')
        this.#isEditted = false;
      } else {
        saveButtonEl.removeAttribute('disabled');
        this.#elementCopy.setAttribute('style', 'outline: 1px solid #00D72F;')
        this.#isEditted = true;
      }
    });

    cancelButtonEl.addEventListener('click', () => this.destroy());
    saveButtonEl.addEventListener('click', () => {
      if (this.#elementCopy.textContent.length === 0) {
        this.shake();
        return;
      }
      saveButtonEl.textContent = 'Сохранение...';
      fetch('/admin/update-text', {
        headers: {
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        method: 'post',
        body: JSON.stringify({
          slug: this.#element.dataset.text,
          text: this.#elementCopy.textContent,
        }),
      })
        .then((response) => response.json())
        .then((response) => {
          this.#element.textContent = response.text;
          this.destroy();
        });
    });
  };

  destroy = () => {
    this.#editorEl.replaceWith(this.#element);
    this.#editorEl = null;
    this.#element = null;
    this.#elementCopy = null;
    this.#isEditted = false;
  };

  shake = () => {
    this.#elementCopy.scrollIntoView({ block: 'center' });
    this.#editorEl.classList.add('shake');
    setTimeout(() => {
      this.#editorEl.classList.remove('shake');
    }, 600);
  };


  #documentMouseOverHandler = (evt) => {
    const textEl = evt.target.closest('[data-text]');
    if (textEl) {
      textEl.setAttribute('style', 'position: relative; outline: 1px solid red;');
      this.#editButtonEl = createElement(Template.EDIT_BUTTON);
      textEl.append(this.#editButtonEl);

      document.removeEventListener('mouseover', this.#documentMouseOverHandler);
      textEl.addEventListener('mouseleave', this.#textElMouseLeaveHandler);
      this.#editButtonEl.addEventListener('click', this.#editButtonElClickHandler);
    }
  }

  #textElMouseLeaveHandler = (evt) => {
    evt.target.removeAttribute('style');
    this.#editButtonEl.remove();
    this.#editButtonEl = null;

    document.addEventListener('mouseover', this.#documentMouseOverHandler);
    evt.target.removeEventListener('mouseleave', this.#textElMouseLeaveHandler);
  };

  #editButtonElClickHandler = () => {
    if (this.#isEditted) {
      this.#editButtonEl.parentElement.removeAttribute('style');
      this.#editButtonEl.remove();
      this.#editButtonEl = null;
      document.addEventListener('mouseover', this.#documentMouseOverHandler);

      this.shake();
    } else {
      this.init();
    }
  };
}

new TextManager().start();
