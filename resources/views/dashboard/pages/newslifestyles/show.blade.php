@extends('dashboard.layouts.master')

@section('content')
  <main class="page__content">
    <div class="modal modal--fail {{ session()->has('fail') ? '' : 'modal--hidden' }}">{{ session()->get('fail') }}</div>
    <div class="modal modal--success {{ session()->has('success') ? '' : 'modal--hidden' }}">{{ session()->get('success') }}</div>

    <ul class="page__breadcrumbs">
      <li class="page__breadcrumb">
        <a href="{{ route('home.index') }}">Главная</a>
      </li>
      <li class="page__breadcrumb">
        <a href="{{ route('admin.newslifestyles') }}">| Новости</a>
      </li>
      <li class="page__breadcrumb page__breadcrumb--current">| {{ $data['newslifestyle'] ? 'Редактирование' : 'Добавление' }}</li>
    </ul>

    <div class="page__link-wrapper">
      @if ($data['newslifestyle'])
        <h1 class="page__title">Редактирование</h1>
      @else
        <h1 class="page__title">Добавление</h1>
      @endif
      <a class="page__link" data-action="submit">Сохранить</a>
    </div>

    <img
      width="615"
      height="525"
      @if ($data['newslifestyle'] && $data['newslifestyle']->img) src="{{ asset('files/newslifestyles/' . $data['newslifestyle']->img) }}" @endif
      style="object-fit: contain">
    <div>Размер: 615x525</div>

    <form
      class="form-dash"
      action="{{ $data['newslifestyle'] ? route('admin.newslifestyles.post', ['action' => 'update']) : route('admin.newslifestyles.post', ['action' => 'store']) }}"
      method="post"
      enctype="multipart/form-data">
      @csrf
      @if ($data['newslifestyle'])
        <input type="hidden" name="id" value="{{ $data['newslifestyle']->id }}">
      @endif

      <label class="form-dash__element">
        <span class="form-dash__label">Фото</span>
        <input class="visually-hidden" name="img" type="file" accept="image/*">
        <input
          class="form-dash__field"
          type="text"
          placeholder="{{ $data['newslifestyle'] && $data['newslifestyle']->img ? $data['newslifestyle']->img : 'Выберите файл' }}"
          value="{{ $data['newslifestyle']->img ?? '' }}"
          readonly>
      </label>

      <label class="form-dash__element" style="grid-column: span 2;">
        <span class="form-dash__label">Заголовок*</span>
        <input
          class="form-dash__field"
          name="title"
          type="text"
          value="{{ $data['newslifestyle']->title ?? '' }}"
          required
          data-pristine-required-message="Объязательное поле">
      </label>

      <div class="form-dash__element" style="grid-column: span 3; grid-row: span 4">
        <span class="form-dash__label">Описание</span>
        <textarea
          class="form-dash__field"
          name="description"
          cols="30"
          rows="10">
          {{ $data['newslifestyle']->description ?? '' }}
        </textarea>
      </div>
    </form>
  </main>
@endsection

@section('script')
  <script src="{{ asset('js/dashboard/pages/newslifestyles/show.js') }}" type="module"></script>
@endsection
