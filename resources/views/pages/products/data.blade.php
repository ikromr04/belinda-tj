@if (count($products) > 0)
  <ul class="products-list">
    @foreach ($products as $product)
      <li class="products-list__item">
        <x-product :product="$product" />
      </li>
    @endforeach
  </ul>
  {{ $products->links() }}
@else
  <ul class="products-list">
    <li class="products-list__item">Продукт не найден</li>
  </ul>
@endif
