document.addEventListener('click', (evt) => {
  if (evt.target.dataset.action === 'delete') {
    evt.target.closest('tr')
      .innerHTML = `
      <td colspan="3">Вы уверены что хотите удалить?</td>
      <td><a data-action="cancel">Отмена</a></td>
      <td><a href="/admin-vacancies/delete/${evt.target.dataset.id}">Удалить</a></td>
    `;
  }
  if (evt.target.dataset.action === 'cancel') {
    location.reload();
  }
});
