@extends('dashboard.layouts.master')

@section('content')
  <main class="page__content">
    <div class="modal modal--fail {{ session()->has('fail') ? '' : 'modal--hidden' }}">{{ session()->get('fail') }}</div>
    <div class="modal modal--success {{ session()->has('success') ? '' : 'modal--hidden' }}">{{ session()->get('success') }}</div>

    <ul class="page__breadcrumbs">
      <li class="page__breadcrumb">
        <a href="{{ route('home.index') }}">Главная</a>
      </li>
      <li class="page__breadcrumb page__breadcrumb--current">| Вакансии</li>
    </ul>

    <div class="page__link-wrapper" style="padding: 0 2px">
      <h1 class="page__title">Вакансии</h1>
      <a class="page__link" href="{{ route('admin.vacancies', ['action' => 'create']) }}">Добавить</a>
    </div>

    @if (count($data['vacancies']) != 0)
      <table class="page__table">
        <thead>
          <tr>
            <th>№</th>
            <th>Заголовок</th>
            <th>Описание</th>
            <th colspan="2">Действия</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($data['vacancies'] as $key => $vacancy)
            <tr>
              <td>{{ $key + 1 }}</td>
              <td>
                <div style="min-width: max-content;">{{ $vacancy->title }}</div>
              </td>
              <td>
                <div>{{ $vacancy->description }}</div>
              </td>
              <td>
                <a href="{{ route('admin.vacancies', ['action' => 'edit', 'vacancy' => $vacancy->id]) }}">Редактировать</a>
              </td>
              <td>
                <a data-action="delete" data-id="{{ $vacancy->id }}">Удалить</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <p>Нет данных</p>
    @endif

  </main>
@endsection

@section('script')
  <script src="{{ asset('js/dashboard/pages/vacancies/index.js') }}" type="module"></script>
@endsection
