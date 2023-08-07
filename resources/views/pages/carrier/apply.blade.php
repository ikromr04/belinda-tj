@extends('layouts.master')

@section('title', 'Карьера')

@section('content')
  {!! session()->has('success') ? '<p class="success-msg">' . session()->get('success') . '</p>' : '' !!}
  {!! session()->has('fail') ? '<p class="fail-msg">' . session()->get('fail') . '</p>' : '' !!}
  <main class="apply apply--hidden">
    <h2 class="apply__title sample-title">Подать заявку</h2>
    <form class="form sample-wrapper sample-wrapper--dark" action="{{ route('apply') }}" method="post" enctype="multipart/form-data">
      <input type="hidden" name="vacancy" value="{{ $vacancy->title }}">
      @csrf
      <fieldset class="form__group">
        <legend class="form__title sample-wrapper__title sample-wrapper__title--big">{{ $vacancy->title }}</legend>
        <p class="form__item">
          <label class="visually-hidden" for="name">Имя</label>
          <input class="form__input" type="text" name="name" id="name" name="name" placeholder="Имя" required data-pristine-required-message="Объязательное поле">
        </p>
        <p class="form__item">
          <label for="email" class="visually-hidden">Электронная почта</label>
          <input class="form__input" type="email" name="email" id="email" placeholder="E-mail" required data-pristine-required-message="Объязательное поле" data-pristine-email-message="E-mail не является допустимым">
        </p>
        <p class="form__item">
          <label for="phone" class="visually-hidden">Телефон</label>
          <input class="form__input" type="tel" id="phone" name="tel" placeholder="Телефон" required data-pristine-required-message="Объязательное поле">
        </p>
        <p class="form__item">
          <label for="message" class="visually-hidden">Почему мы должны выбрать вас</label>
          <textarea class="form__textarea" name="message" id="message" placeholder="Почему мы должны выбрать вас" required data-pristine-required-message="Объязательное поле"></textarea>
          {{-- <span class="form__textarea-limit"><i class="char-count">0</i>/140 букв</span> --}}
        </p>
      </fieldset>
      <div class="form__footer">
        <label for="cv" class="form__file-label">Закрепить резюме</label>
        <input type="file" id="cv" name="cv" class="visually-hidden">
        <button class="form__submit-btn red-link" type="submit">Отправить</button>
        <p class="form__aware">Нажимая кнопку отправить, вы соглашаетесь на
          обработку ваших персональных данных.</p>
      </div>
    </form>
  </main>
@endsection

@section('scripts')
  <script src="{{ asset('js/apply-form.js') }}" type="module"></script>
@endsection
