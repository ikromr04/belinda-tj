@props(['newslifestyle'])

<figure class="newslifestyle-card">
  <div class="newslifestyle-card__inner">
    <h3 class="newslifestyle-card__title">{{ $newslifestyle->title }}</h3>
    <div class="newslifestyle-card__description">{!! strip_tags($newslifestyle->description) !!}</div>
  </div>

  <img class="newslifestyle-card__img" src="{{ asset('files/newslifestyles/' . $newslifestyle->img) }}" alt="Новость">

  <a class="newslifestyle-card__link" href="{{ route('newslifestyle.show', $newslifestyle->slug) }}">Подробнее</a>
</figure>
