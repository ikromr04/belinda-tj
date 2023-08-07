@extends('layouts.master')

@section('title', 'Продукты')

@section('content')
  <main class="products-page">
    <section class="products-page__info">
      <div class="sample-wrapper sample-wrapper--dark">
        <div class="content" data-content="products-belinda">{!! $data['products-belinda'] !!}</div>
      </div>
    </section>

    <div class="products-page__filter">
      <form class="products-page__filter-form products-filter" action="{{ route('products.filter') }}" method="post" onsubmit="return false;">
        @csrf
        <p class="products-filter__item">
          <select name="nosology">
            <option value="">По разделам</option>
            @foreach ($data['nosologies'] as $nosology)
              <option value="{{ $nosology->id }}">{{ $nosology->title }}</option>
            @endforeach
          </select>
        </p>

        <p class="products-filter__item">
          <select name="classification">
            <option value="">ATX классификация</option>
            @foreach ($data['classifications'] as $classification)
              <option value="{{ $classification->id }}">{{ $classification->title }}</option>
            @endforeach
          </select>
        </p>

        <p class="products-filter__item">
          <select name="prescription">
            <option value="">Тип</option>
            <option>OTC</option>
            <option>RX</option>
            <option>BAD</option>
          </select>
        </p>
      </form>

      <form class="products-page__search-form products-search" onsubmit="return false;">
        @csrf
        <p class="products-search__item">
          <label class="products-search__label" for="product-keyword">
            <span class="visually-hidden">Поиск продукта</span>
            <input
              class="products-search__input"
              id="product-keyword"
              type="search"
              name="product-keyword"
              placeholder="Поиск продукта"
              autocomplete="off">
          </label>
        </p>
      </form>
    </div>

    <section class="products">
      <h2 class="products__title sample-title" data-text="products-title">{{ $data['products-title'] }}</h2>

      <div class="products-inner">
        <ul class="products-list">
          @foreach ($data['products'] as $product)
            <li class="products-list__item">
              <x-product :product="$product" />
            </li>
          @endforeach
        </ul>
        {{ $data['products']->links() }}
      </div>
    </section>
  </main>
@endsection

@section('scripts')
  <script src="{{ asset('js/products.js') }}" type="module"></script>
@endsection
