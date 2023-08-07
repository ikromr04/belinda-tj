@extends('layouts.master')

@section('title', 'Новости')

@section('content')
  <main class="newslifestyle-page">
    <a class="newslifestyle__link">
      <img class="newslifestyle__img" src="{{ asset('img/news-vitrin.png') }}" alt="Новости компании">
    </a>

    <h2
      class="newslifestyle__title sample-title"
      id="fragment"
      data-text="newslifestyle-title">
      {{ $data['newslifestyle-title'] }}
    </h2>

    <ul class="newslifestyle-list">
      @foreach ($data['newslifestyles'] as $newslifestyle)
        <li class="newslifestyle-list__item">
          <x-newslifestyle :newslifestyle="$newslifestyle" />
        </li>
      @endforeach
    </ul>

    {{ $data['newslifestyles']->fragment('fragment')->links() }}
  </main>
@endsection
