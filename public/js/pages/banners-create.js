const formEl = document.querySelector('.form-dash');
const imgChooserEl = formEl.querySelector('input[name="img"]');
const dropzone = document.querySelector('.banner__slide');
const contentPreviewEl = document.querySelector('[data-type="banner"]');
const submitEl = document.querySelector('[data-action="submit"]');
const contentEl = document.querySelector('[data-label="content"]');

const simditor = new Simditor({
  textarea: formEl.querySelector('textarea[name="content"]'),
  toolbar: [
    'title',
    'bold',
    'italic',
    'underline',
    'strikethrough',
    'fontScale',
    'color',
    'ol',
    'ul',
    'blockquote',
    'table',
    'link',
    'hr',
    'indent',
    'outdent',
    'alignment',
  ]
});

imgChooserEl.addEventListener('change', (evt) => {
  const file = evt.target.files[0];

  dropzone.style.backgroundImage = `url(${URL.createObjectURL(file)})`;
  dropzone.classList.remove('banner__slide--dash');
  contentPreviewEl.innerHTML = '';
  contentPreviewEl.classList.remove('banner__content--dash');
  contentEl.classList.remove('visually-hidden');
  dropzone.addEventListener('click', (evt) => evt.preventDefault());
});

simditor.body[0].classList.add('form-dash__field', 'content');
simditor.body[0].addEventListener('input', (evt) => contentPreviewEl.innerHTML = evt.target.innerHTML);
simditor.el[0].addEventListener('keydown', (evt) => contentPreviewEl.innerHTML = evt.target.innerHTML);

formEl.addEventListener('submit', (evt) => evt.preventDefault());
submitEl.addEventListener('click', () => formEl.submit());

dropzone.addEventListener("dragover", (e) => {
  e.preventDefault();
  dropzone.classList.add("hover");
});

dropzone.addEventListener("dragleave", () => {
  dropzone.classList.remove("hover");
});

dropzone.addEventListener("drop", (e) => {
  e.preventDefault();

  const image = e.dataTransfer.files[0];
  const type = image.type;

  if (
    type == "image/png" ||
    type == "image/jpg" ||
    type == "image/jpeg"
  ) {
    return upload(e);
  } else {
    contentPreviewEl.innerHTML = 'Неверный формат файла!';
    return false;
  }
});

const upload = (e) => {
  imgChooserEl.files = e.dataTransfer.files;
  const file = imgChooserEl.files[0];

  dropzone.style.backgroundImage = `url(${URL.createObjectURL(file)})`;
  dropzone.classList.remove('banner__slide--dash');
  contentPreviewEl.innerHTML = '';
  contentPreviewEl.classList.remove('banner__content--dash');
  contentEl.classList.remove('visually-hidden');
  dropzone.addEventListener('click', (evt) => evt.preventDefault());
};
