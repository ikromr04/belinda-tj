@extends('dashboard.layouts.master')

@section('content')
  <main class="page__content">
    <div class="modal modal--fail {{ session()->has('fail') ? '' : 'modal--hidden' }}">{{ session()->get('fail') }}</div>
    <div class="modal modal--success {{ session()->has('success') ? '' : 'modal--hidden' }}">{{ session()->get('success') }}</div>

    <ul class="page__breadcrumbs">
      <li class="page__breadcrumb">
        <a href="{{ route('home.index') }}">Главная</a>
      </li>
      <li class="page__breadcrumb page__breadcrumb--current">| Продукты</li>
    </ul>

    <div class="page__link-wrapper" style="padding: 0 2px">
      <h1 class="page__title">Продукты</h1>
      <a class="page__link" href="{{ route('admin.products', ['action' => 'create']) }}">Добавить</a>
    </div>

    @if (count($data['products']) != 0)
      <table class="page__table">
        <thead>
          <tr>
            <th>№</th>
            <th>Название</th>
            <th>Форма выпуска</th>
            <th>Описание</th>
            <th colspan="2">Действия</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($data['products'] as $key => $product)
            <tr>
              <td>{{ $key + 1 }}</td>
              <td>
                <div style="min-width: max-content;">{{ $product->title }}</div>
              </td>
              <td>
                <div style="min-width: max-content;">{{ $product->releaseForm->title ?? '' }}</div>
              </td>
              <td>
                <div>{{ $product->description }}</div>
              </td>
              <td>
                <a href="{{ route('admin.products', ['action' => 'edit', 'product' => $product->id]) }}">Редактировать</a>
              </td>
              <td>
                <a data-action="delete" data-id="{{ $product->id }}">Удалить</a>
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
  <script src="{{ asset('js/dashboard/pages/products/index.js') }}" type="module"></script>
@endsection
