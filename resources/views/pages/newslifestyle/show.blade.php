@extends('layouts.master')

@section('title', 'Новости и образ жизни')

@section('meta-tags')
  @php
    $share_text = preg_replace('#<[^>]+>#', ' ', $data['newslifestyle']->description);
    $share_text = mb_strlen($share_text) < 170 ? $share_text : mb_substr($share_text, 0, 166) . '...';
  @endphp
  <meta name="description" content="{{ $share_text }}">
  <meta property="og:description" content="{{ $share_text }}">
  <meta property="og:title" content="{{ $data['newslifestyle']->title }}" />
  <meta property="og:image" content="{{ asset('files/newslifestyle/' . $data['newslifestyle']->img) }}">
  <meta property="og:image:alt" content="{{ $data['newslifestyle']->title }}">
  <meta name="twitter:title" content="{{ $data['newslifestyle']->title }}">
  <meta name="twitter:image" content="{{ asset('files/newslifestyle/' . $data['newslifestyle']->img) }}">
@endsection

@section('content')
  <main class="newslifestyle-show-page">
    <div class="newslifestyle-show">
      <img class="newslifestyle-show__img" src="{{ asset('files/newslifestyles/' . $data['newslifestyle']->img) }}" width="615" height="525">

      <div class="newslifestyle-show__inner">
        <h1 class="newslifestyle-show__title">{{ $data['newslifestyle']->title }}</h1>

        <time
          class="newslifestyle-show__datetime"
          datetime="{{ $data['newslifestyle']->created_at }}">
          {{ $data['newslifestyle']->created_at->format('Y.m.d') }}
        </time>
        <div class="newslifestyle-show__text content">{!! $data['newslifestyle']->description !!}</div>
      </div>
    </div>

    <div class="glide" data-type="carousel-half">
      <div class="glide__track" data-glide-el="track">
        <ul class="glide__slides">
          @foreach ($data['similars'] as $newslifestyle)
            <li class="glide__slide">
              <x-newslifestyle :newslifestyle="$newslifestyle" />
            </li>
          @endforeach
        </ul>
      </div>

      <div class="glide__arrows" data-glide-el="controls">
        <button class="glide__arrow glide__arrow--left" data-glide-dir="<"></button>
        <button class="glide__arrow glide__arrow--right" data-glide-dir=">"></button>
      </div>
    </div>
  </main>
@endsection

@section('scripts')
  <script src="{{ asset('js/newslifestyle.js') }}" type="module"></script>
@endsection
