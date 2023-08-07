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
        <a href="{{ route('admin.vacancies') }}">| Вакансии</a>
      </li>
      <li class="page__breadcrumb page__breadcrumb--current">| {{ $data['vacancy'] ? 'Редактирование' : 'Добавление' }}</li>
    </ul>

    <div class="page__link-wrapper">
      @if ($data['vacancy'])
        <h1 class="page__title">Редактирование</h1>
      @else
        <h1 class="page__title">Добавление</h1>
      @endif
      <a class="page__link" data-action="submit">Сохранить</a>
    </div>

    <form
      class="form-dash"
      action="{{ $data['vacancy'] ? route('admin.vacancies.post', ['action' => 'update']) : route('admin.vacancies.post', ['action' => 'store']) }}"
      method="post">
      @csrf
      @if ($data['vacancy'])
        <input type="hidden" name="id" value="{{ $data['vacancy']->id }}">
      @endif

      <label class="form-dash__element" style="grid-column: span 3;">
        <span class="form-dash__label">Заголовок*</span>
        <input
          class="form-dash__field"
          name="title"
          type="text"
          value="{{ $data['vacancy']->title ?? '' }}"
          required
          data-pristine-required-message="Объязательное поле">
      </label>

      <label class="form-dash__element" style="grid-column: span 3; grid-row: span 4">
        <span class="form-dash__label">Описание</span>
        <textarea
          class="form-dash__field"
          name="description"
          cols="30"
          rows="10">
          {{ $data['vacancy']->description ?? '' }}
        </textarea>
      </label>
    </form>
  </main>
@endsection

@section('script')
  <script src="{{ asset('js/dashboard/pages/vacancies/show.js') }}" type="module"></script>
@endsection
