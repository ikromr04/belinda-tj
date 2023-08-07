  <header class="header">
    <nav class="main-navigation">
      <a href="{{ route('home.index') }}">
        <img class="main-logo" src="{{ asset('img/main-logo.svg') }}" alt="Логотип компании Belinda">
      </a>

      <dl class="menu">
        <dt style="height: 100%">
          <button class="menu-button" type="button">
            <span class="menu-icon"><i></i><i></i><i></i></span>
            Меню
          </button>
        </dt>

        <dd>
          <a
            class="main-navigation-link {{ $route === 'about.index' ? 'current' : '' }}"
            href="{{ route('about.index') }}">
            О нас
          </a>
        </dd>

        <dd>
          <a
            class="main-navigation-link {{ $route === 'products.index' || $route === 'products.show' ? 'current' : '' }}"
            href="{{ route('products.index') }}">
            Продукты
          </a>
        </dd>

        <dd>
          <a
            class="main-navigation-link {{ $route === 'carrier.index' ? 'current' : '' }}"
            href="{{ route('carrier.index') }}">
            Карьера
          </a>
        </dd>

        <dd>
          <a
            class="main-navigation-link {{ $route === 'newslifestyle.index' || $route === 'newslifestyle.show' || $route === 'newslifestyle.news' || $route === 'newslifestyle.lifestyle' ? 'current' : '' }}"
            href="{{ route('newslifestyle.index') }}">
            Новости
          </a>
        </dd>

        <dd>
          <a
            class="main-navigation-link {{ $route === 'contacts.index' ? 'current' : '' }}"
            href="{{ route('contacts.index') }}">
            Контакты
          </a>
        </dd>
      </dl>

      @if ($route != 'products.attention')
        <button class="hamburger" type="button">
          <svg xmlns="http://www.w3.org/2000/svg" width="22" height="18" fill="#DE3B21">
            <rect width="100%" height="16%" rx="2" />
            <rect width="100%" height="16%" y="40%" rx="2" />
            <rect width="100%" height="16%" y="80%" rx="2" />
          </svg>
        </button>
      @endif

      <a href="{{ route('products.index') }}">Продукты</a>
    </nav>

    <ul class="mob-nav">
      <li class="mob-nav__item">
        <a
          class="mob-nav__link {{ $route === 'about.index' ? 'current' : '' }}"
          href="{{ route('about.index') }}">
          О нас
        </a>
      </li>

      <li class="mob-nav__item">
        <a
          class="mob-nav__link {{ $route === 'products.index' || $route === 'products.show' ? 'current' : '' }}"
          href="{{ route('products.index') }}">
          Продукты
        </a>
      </li>

      <li class="mob-nav__item">
        <a
          class="mob-nav__link {{ $route === 'carrier.index' ? 'current' : '' }}"
          href="{{ route('carrier.index') }}">
          Карьера
        </a>
      </li>

      <li class="mob-nav__item">
        <a
          class="mob-nav__link {{ $route === 'newslifestyle.index' || $route === 'newslifestyle.show' || $route === 'newslifestyle.news' || $route === 'newslifestyle.lifestyle' ? 'current' : '' }}"
          href="{{ route('newslifestyle.index') }}">
          Новости
        </a>
      </li>

      <li class="mob-nav__item">
        <a
          class="mob-nav__link {{ $route === 'contacts.index' ? 'current' : '' }}"
          href="{{ route('contacts.index') }}">
          Контакты
        </a>
      </li>
    </ul>

    <div class="search-container">
      <form class="search-form" action="#" method="get" onsubmit="return false;">
        @csrf
        <label class="search-label">
          <input
            class="search-input"
            type="search"
            name="keyword"
            placeholder="Введите ключевые слова для поиска"
            autocomplete="off">
        </label>
      </form>

      <div class="search-result-holder"></div>
    </div>
  </header>
