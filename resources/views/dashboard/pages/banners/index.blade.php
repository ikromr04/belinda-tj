@extends('dashboard.layouts.master')

@section('content')
  <main class="page__content">
    <div class="modal modal--fail {{ session()->has('fail') ? '' : 'modal--hidden' }}">{{ session()->get('fail') }}</div>
    <div class="modal modal--success {{ session()->has('success') ? '' : 'modal--hidden' }}">{{ session()->get('success') }}</div>

    <ul class="page__breadcrumbs">
      <li class="page__breadcrumb">
        <a href="{{ route('home.index') }}">Главная</a>
      </li>
      <li class="page__breadcrumb page__breadcrumb--current">| Баннеры</li>
    </ul>

    <div class="page__link-wrapper" style="padding: 0 2px">
      <h1 class="page__title">Баннеры</h1>
      <a class="page__link" href="{{ route('banners', ['action' => 'create']) }}">Добавить</a>
    </div>

    @if (count($data['banners']) != 0)
      <table class="page__table">
        {{-- <thead>
          <tr>
            <th>№</th>
            <th>Баннер</th>
            <th colspan="2">Действия</th>
          </tr>
        </thead> --}}

        <tbody class="container">
          @foreach ($data['banners'] as $key => $banner)
            <tr class="draggable">
              <td>{{ $key + 1 }}</td>
              <td style="width: 50%">
                <div>{{ $banner->img }}</div>
              </td>
              <td>
                <a href="{{ route('banners', ['action' => 'edit', 'banner' => $banner->id]) }}">Редактировать</a>
              </td>
              <td>
                <a data-action="delete" data-id="{{ $banner->id }}">Удалить</a>
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
  <script src="{{ asset('js/pages/banners.js') }}" type="module"></script>
@endsection
