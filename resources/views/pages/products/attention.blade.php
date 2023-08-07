@extends('layouts.master')

@section('title', 'Внимание')

@section('content')
  <main class="attention-page">
    <div class="attention-card">
      <h1 class="attention-card__title">Внимание</h1>
      <p class="attention-card__text">Информация, представленная на этом сайте, не должна использоваться для самодиагностики и лечения и не может служить заменой очной консультации с доктор.</p>
      <div class="attention-card__inner">
        <a class="attention-card__link attention-card__link--upper" href="{{ route('home.index') }}">Я не буду рисковать</a>
        <a class="attention-card__link attention-card__link--red" @if ($slug) href="{{ route('products.show', $slug) }}?agreement=agree"
          @else
          href="{{ route('products.index') }}?agreement=agree" @endif>
          Я понял, продолжить
        </a>
      </div>
    </div>

    {{-- <ul class="attention-list">
      <li class="attention-list__item">
        <a class="attention-links__link" href="{{ route('about.index') }}">О нас</a>
      </li>
      <li class="attention-list__item">
        <a class="attention-links__link" href="{{ route('carrier.index') }}">Карьера</a>
      </li>
      <li class="attention-list__item">
        <a class="attention-links__link" href="{{ route('newslifestyle.index') }}">Новости и образ жизни</a>
      </li>
      <li class="attention-list__item">
        <a class="attention-links__link" href="{{ route('contacts.index') }}">Контакты</a>
      </li>
    </ul> --}}
  </main>
@endsection
