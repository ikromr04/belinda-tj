@extends('layouts.master')

@section('title', 'Главная')

@section('content')
  <main class="main-page">
    @if ($data['banners']->count() != 0)
      <div class="banner glide" data-type="banner">
        <div class="banner__track glide__track" data-glide-el="track">
          <ul class="banner__slides glide__slides">
            @foreach ($data['banners'] as $banner)
              <li class="banner__slide glide__slide">
                <img
                  class="banner__img"
                  src="{{ asset('img/banners/' . $banner->img) }}"
                  alt="banner"
                  width="1280"
                  height="540">
              </li>
            @endforeach
          </ul>
        </div>

        <div class="glide__bullets banner__bullets" data-glide-el="controls[nav]">
          @foreach ($data['banners'] as $key => $banner)
            <button class="glide__bullet banner__bullet" data-glide-dir="={{ $key }}"></button>
          @endforeach
        </div>
      </div>
    @endif

    <div style="margin: 32px 0;">
      <div class="content" data-content="home-product">{!! $data['home-product'] !!}</div>
    </div>

    <ul class="home-products">
      <li class="home-products__item">
        <img
          class="home-products__img"
          src="{{ asset('img/lambrotin.webp') }}"
          width="320"
          height="320"
          alt="Ламбротин">
        <div class="content" data-content="home-product-1">{!! $data['home-product-1'] !!}</div>
      </li>
      <li class="home-products__item">
        <img
          class="home-products__img"
          src="{{ asset('img/cerebral.webp') }}"
          width="320"
          height="320"
          alt="Церебрал">
        <div class="content" data-content="home-product-3">{!! $data['home-product-3'] !!}</div>
      </li>
      <li class="home-products__item">
        <img
          class="home-products__img"
          src="{{ asset('img/lindavit.webp') }}"
          width="320"
          height="320"
          alt="Линдавит">
        <div class="content" data-content="home-product-2">{!! $data['home-product-2'] !!}</div>
      </li>
    </ul>

    <div class="home-grid">
      <div class="home-grid__item">
        <div class="home-page__product sample-wrapper sample-wrapper--link">
          <div class="content" data-content="home-news">{!! $data['home-news'] !!}</div>
          @if (!session('editMode'))
            <a class="sample-wrapper__link" href="{{ route('newslifestyle.index') }}"></a>
          @endif
        </div>
      </div>

      <div class="home-grid__item home-card" style="grid-column: span 2;">
        <div class="content" data-content="home-card">{!! $data['home-card'] !!}</div>
      </div>
    </div>
  </main>
@endsection

@section('scripts')
  <script src="{{ asset('js/home.js') }}"></script>
@endsection
