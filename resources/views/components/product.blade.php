@props(['product'])

<figure class="product-card">
  <figcaption class="product-card__title">{{ $product->title }}</figcaption>
  <div class="product-card__img-wrapper">
    <img class="product-card__img" src="{{ asset('files/products/img/' . $product->photo) }}" alt="{{ $product->title }}">
  </div>
  <p class="product-card__category">
    <span class="product-card__release-icon">{!! $product->releaseForm->svg !!}</span>
    {{ $product->nosology ? $product->nosology->title : '' }}
  </p>
  <p class="product-card__prescription">{{ $product->prescription }}</p>
  <a class="product-card__link" href="{{ route('products.show', $product->slug) }}">Подробнее</a>
</figure>
