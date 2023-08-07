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
        <a href="{{ route('admin.products') }}">| Продукты</a>
      </li>
      <li class="page__breadcrumb page__breadcrumb--current">| {{ $data['product'] ? 'Редактирование' : 'Добавление' }}</li>
    </ul>

    <div class="page__link-wrapper">
      @if ($data['product'])
        <h1 class="page__title">Редактирование</h1>
      @else
        <h1 class="page__title">Добавление</h1>
      @endif
      <a class="page__link" data-action="submit">Сохранить</a>
    </div>

    <img
      width="250"
      height="250"
      @if ($data['product'] && $data['product']->photo) src="{{ asset('files/products/img/' . $data['product']->photo) }}" @endif
      style="object-fit: contain">
    <div>Размер: 500x500</div>

    <form
      class="form-dash"
      action="{{ $data['product'] ? route('admin.products.post', ['action' => 'update']) : route('admin.products.post', ['action' => 'store']) }}"
      method="post"
      enctype="multipart/form-data">
      @csrf
      @if ($data['product'])
        <input type="hidden" name="id" value="{{ $data['product']->id }}">
      @endif

      <label class="form-dash__element">
        <span class="form-dash__label">Фото</span>
        <input class="visually-hidden" name="photo" type="file" accept="image/*">
        <input
          class="form-dash__field"
          type="text"
          placeholder="{{ $data['product'] && $data['product']->photo ? $data['product']->photo : 'Выберите файл' }}"
          value="{{ $data['product']->photo ?? '' }}"
          readonly>
      </label>

      <label class="form-dash__element">
        <span class="form-dash__label">Инструкция</span>
        <input class="visually-hidden" name="instruction" type="file">
        <input
          class="form-dash__field"
          type="text"
          placeholder="{{ $data['product'] && $data['product']->instruction ? $data['product']->instruction : 'Выберите файл' }}"
          value="{{ $data['product']->instruction ?? '' }}"
          readonly>
      </label>

      <label class="form-dash__element">
        <span class="form-dash__label">Название*</span>
        <input
          class="form-dash__field"
          name="title"
          type="text"
          value="{{ $data['product']->title ?? '' }}"
          required
          data-pristine-required-message="Объязательное поле">
      </label>

      <label class="form-dash__element">
        <span class="form-dash__label">Ссылка</span>
        <input
          class="form-dash__field"
          name="url"
          type="text"
          value="{{ $data['product']->url ?? '' }}">
      </label>

      <label class="form-dash__element">
        <span class="form-dash__label">ATX классификация</span>
        <select class="form-dash__field" name="classification_id" style="pointer-events: all;">
          @foreach ($data['classifications'] as $classification)
            <option
              value="{{ $classification->id }}"
              {{ $data['product'] && $data['product']->classification_id == $classification->id ? 'selected' : '' }}>
              {{ $classification->title }}
            </option>
          @endforeach
          <option value="">Добавить категорию</option>
        </select>
      </label>

      <label class="form-dash__element">
        <span class="form-dash__label">По разделам</span>
        <select class="form-dash__field" name="nosology_id" style="pointer-events: all;">
          @foreach ($data['nosologies'] as $nosology)
            <option
              value="{{ $nosology->id }}"
              {{ $data['product'] && $data['product']->nosology_id == $nosology->id ? 'selected' : '' }}>
              {{ $nosology->title }}
            </option>
          @endforeach
          <option value="">Добавить категорию</option>
        </select>
      </label>

      <label class="form-dash__element">
        <span class="form-dash__label">Форма выпуска</span>
        <select class="form-dash__field" name="release_form_id" style="pointer-events: all;">
          @foreach ($data['release_forms'] as $releaseForm)
            <option
              value="{{ $releaseForm->id }}"
              {{ $data['product'] && $data['product']->release_form_id == $releaseForm->id ? 'selected' : '' }}>
              {{ $releaseForm->title }}
            </option>
          @endforeach
        </select>
      </label>

      <label class="form-dash__element">
        <span class="form-dash__label">Тип</span>
        <select class="form-dash__field" name="prescription" style="pointer-events: all;">
          <option
            value="OTC"
            {{ $data['product'] && $data['product']->prescription == 'OTC' ? 'selected' : '' }}>
            OTC
          </option>
          <option
            value="RX"
            {{ $data['product'] && $data['product']->prescription == 'RX' ? 'selected' : '' }}>
            RX
          </option>
          <option
            value="BAD"
            {{ $data['product'] && $data['product']->prescription == 'BAD' ? 'selected' : '' }}>
            BAD
          </option>
        </select>
      </label>

      <label class="form-dash__element" style="grid-column: span 2; grid-row: span 4">
        <span class="form-dash__label">Описание</span>
        <textarea
          class="form-dash__field"
          name="description"
          cols="30"
          rows="10">
          {{ $data['product']->description ?? '' }}
        </textarea>
      </label>

      <label class="form-dash__element" style="grid-column: span 2; grid-row: span 4">
        <span class="form-dash__label">Состав</span>
        <textarea
          class="form-dash__field"
          name="composition"
          cols="30"
          rows="10">
          {{ $data['product']->composition ?? '' }}
        </textarea>
      </label>

      <label class="form-dash__element" style="grid-column: span 2; grid-row: span 4">
        <span class="form-dash__label">Показания к применению</span>
        <textarea
          class="form-dash__field"
          name="indications"
          cols="30"
          rows="10">
          {{ $data['product']->indications ?? '' }}
        </textarea>
      </label>

      <label class="form-dash__element" style="grid-column: span 2; grid-row: span 4">
        <span class="form-dash__label">Способ применения</span>
        <textarea
          class="form-dash__field"
          name="mode"
          cols="30"
          rows="10">
          {{ $data['product']->mode ?? '' }}
        </textarea>
      </label>
    </form>
  </main>
@endsection

@section('script')
  <script src="{{ asset('js/dashboard/pages/products/show.js') }}" type="module"></script>
@endsection
