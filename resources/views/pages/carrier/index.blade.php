@extends('layouts.master')

@section('title', 'Карьера')

@section('content')
  <main class="carrier-page">
    <section class="carrier-page__info">
      <div class="sample-wrapper sample-wrapper--dark">
        <div class="content" data-content="carrier-product">{!! $data['carrier-product'] !!}</div>
      </div>
    </section>

    <section class="vacancies">
      <h2 class="vacancies__title sample-title" data-text="carrier-vacancies-title">{{ $data['carrier-vacancies-title'] }}</h2>

      @if ($data['vacancies']->count() == 0)
        <p class="no-vacancy">Текущих вакансий нет, но вы можете отправить нам свое резюме: <a class="no-vacancy__link">hr@belinda.uk.com</a></p>
        <dl data-type="accordion">
          <dt></dt>
        </dl>
      @else
        <dl class="accordion" data-type="accordion">
          @foreach ($data['vacancies'] as $vacancy)
            <dt class="accordion__head accordion__head--hidden">
              <div class="sample-description-term">
                <p class="sample-description-term__title">{{ $vacancy->title }}</p>
                <div class="sample-description-term__subtitle content" style="flex-grow: 1">{!! $vacancy->description !!}</div>
                <button class="sample-description-term__button dropdown-icon">Посмотреть</button>
              </div>
            </dt>
            <dd class="accordion__body">
              <div class="sample-description-definition content">{!! $vacancy->description !!}</div>
              <a class="vacancies__link red-link" href="{{ route('carrier.apply', $vacancy->id) }}">Подать сейчас</a>
            </dd>
          @endforeach
        </dl>
      @endif
    </section>

    <div class="carrier-grid">
      <section class="sample-wrapper" style="font-size: 20px">
        <h2 style="font-size: 32px">Карьерный рост</h2>

        <p>Мы ценим каждого сотрудника и стремимся создать для них максимально удобные условия работы. Мы предоставляем сотрудникам компенсации и премии, а также различные социальные льготы. Все это помогает нам сохранять талантливых специалистов и стимулировать их к развитию.</p>
        <p>Мы верим, что возможности развития карьеры являются важным фактором удовлетворенности сотрудников и стремимся предоставить им такие возможности. Мы разработали специальные программы развития карьеры, которые позволяют сотрудникам углублять свои знания в своей сфере, а также получать новые навыки и опыт.</p>
        <p>Мы также разработали систему обучения и развития, которая помогает сотрудникам развивать свои карьерные навыки и знания, а также получать новые. Наши специалисты обучения и развития работают с сотрудниками, чтобы помочь им развить свои способности и достичь своих целей.</p>
      </section>

      <form class="form sample-wrapper sample-wrapper--dark" action="{{ route('apply') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="vacancy" value="Обратная связь">
        <fieldset class="form__group">
          <legend class="form__title sample-wrapper__title sample-wrapper__title--big">Свяжитесь с нами через онлайн форму</legend>
          <p class="form__item">
            <input class="form__input" id="name" type="text" name="name" placeholder="Имя" required data-pristine-required-message="Объязательное поле">
          </p>
          <p class="form__item">
            <input class="form__input" type="email" name="email" id="email" placeholder="E-mail" required data-pristine-required-message="Объязательное поле" data-pristine-email-message="E-mail не является допустимым">
          </p>
          <p class="form__item">
            <input class="form__input" type="tel" id="phone" name="еуд" placeholder="Телефон" required data-pristine-required-message="Объязательное поле">
          </p>
          <p class="form__item">
            <textarea class="form__textarea" name="message" id="message" placeholder="Введите ваше сообщение здесь..." required data-pristine-required-message="Объязательное поле"></textarea>
          </p>
        </fieldset>
        
        <div class="form__footer" style="display: grid; grid-template-columns: 1fr 1fr">
          <p class="form__aware">Нажимая кнопку отправить, вы соглашаетесь на обработку ваших персональных данных.</p>
          <button class="form__submit-btn red-link" style="margin-left: 32px" type="submit">Отправить</button>
        </div>
      </form>
    </div>
  </main>
@endsection

@section('scripts')
  <script src="{{ asset('js/carrier.js') }}" type="module"></script>
@endsection
