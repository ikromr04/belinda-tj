<ul class="search-result-list">
  @if ($result['products']->count() == 0 && $result['newslifestyles']->count() == 0)
    <li class="search-result-item">Ничего не найдено</li>
  @else
    @foreach ($result['products'] as $product)
      <li class="search-result-item">
        <a class="search-result-link" href="{{ route('products.show', $product->slug) }}">
          <span class="search-result-page">Продукты</span> {{ $product->title }}
        </a>
      </li>
    @endforeach
    @foreach ($result['newslifestyles'] as $newslifestyle)
      <li class="search-result-item">
        <a class="search-result-link" href="{{ route('newslifestyle.show', $newslifestyle->slug) }}">
          <span class="search-result-page">Новости и образ жизни</span> {{ $newslifestyle->title }}
        </a>
      </li>
    @endforeach
  @endif
</ul>
