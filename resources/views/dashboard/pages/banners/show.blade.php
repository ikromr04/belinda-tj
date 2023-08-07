@extends('dashboard.layouts.master')

@section('content')
  <main class="page__content">
    <div class="modal modal--fail {{ session()->has('fail') ? '' : 'modal--hidden' }}">
      {{ session()->get('fail') }}
    </div>
    <div class="modal modal--success {{ session()->has('success') ? '' : 'modal--hidden' }}">
      {{ session()->get('success') }}
    </div>

    <ul class="page__breadcrumbs">
      <li class="page__breadcrumb">
        <a href="{{ route('home.index') }}">Главная</a>
      </li>
      <li class="page__breadcrumb">
        <a href="{{ route('banners') }}?locale=ru">| Баннеры</a>
      </li>
      <li class="page__breadcrumb page__breadcrumb--current">
        | {{ $data['banner'] ? 'Редактирование' : 'Добавление' }}
      </li>
    </ul>

    <div class="page__link-wrapper">
      @if ($data['banner'])
        <h1 class="page__title">Редактирование</h1>
      @else
        <h1 class="page__title">Добавление</h1>
      @endif
      <a class="page__link" data-action="submit">Сохранить</a>
    </div>

    <img
      @if ($data['banner']) src="{{ asset('img/banners/' . $data['banner']->img) }}" @endif
      width="1260" height="428" style="object-fit: cover; border-radius: 16px">

    <form
      class="form-dash"
      action="{{ $data['banner'] ? route('banners.post', ['action' => 'update']) : route('banners.post', ['action' => 'store']) }}"
      method="post"
      enctype="multipart/form-data">
      @csrf
      @if ($data['banner'])
        <input type="hidden" name="id" value="{{ $data['banner']->id }}">
      @endif

      <label class="form-dash__element">
        <span class="form-dash__label">Баннер</span>
        <input class="visually-hidden" name="img" type="file" placeholder="placeholder" accept="image/*">
        <input class="form-dash__field" type="text" placeholder="Выберите файл" readonly value="{{ $data['banner']->img ?? '' }}">
      </label>

      <div>
        <div style="color: red">
          <div>Формат: .png, .jpeg, .jpg,</div>
          <div>Размер: 1260 x 428</div>
        </div>
      </div>

      <label class="form-dash__element">
        <span class="form-dash__label">Ссылка (текст)</span>
        <input
          class="form-dash__field"
          name="link"
          type="text"
          placeholder="Купить"
          value="{{ $data['banner']->link ?? '' }}">
      </label>

      <label class="form-dash__element">
        <span class="form-dash__label">Ссылка (адрес)</span>
        <input
          class="form-dash__field"
          name="url"
          type="url"
          placeholder="http://belinda-tj"
          value="{{ $data['banner']->url ?? '' }}">
      </label>
    </form>
  </main>
@endsection

@section('script')
  <script src="{{ asset('js/pages/banners-show.js') }}"></script>
@endsection
