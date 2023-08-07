<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="robots" content="none">
  <meta name="googlebot" content="noindex, nofollow">
  <meta name="yandex" content="none">
  <title>Вход | Spey - международная фармацевтическая компания</title>

</head>
<style>
  .login-page {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
  }

  .login-form {
    background-color: #fff;
    border-radius: 15px;
    box-shadow: 0px 6px 12px rgb(0 0 0 / 15%);
    padding-top: 30px;
    padding-right: 25px;
    padding-bottom: 30px;
    padding-left: 75px;
    position: relative;
    max-width: 700px;
    width: 100%;
    display: flex;
    flex-direction: column;
  }

  .login-fieldset {
    border: none;
    display: flex;
    flex-direction: column;
    gap: 20px;
  }

  .login-legend {
    font-weight: 800;
    text-transform: uppercase;
    font-size: 17.5px;
    position: absolute;
    top: -40px;
    left: 0px;
  }

  .login-label {
    border-radius: 15px;
    display: flex;
    height: 50px;
    border: 1px solid #707070;
    overflow: hidden;
    justify-content: center;
    align-items: center;
    padding-left: 25px;
  }

  .login-input {
    border: none;
    flex-grow: 1;
    font-size: 18px;
  }

  .login-input:focus {
    outline: none;
  }

  .login-eye-btn {
    display: flex;
    height: 100%;
    border: none;
    width: 48px;
    justify-content: center;
    align-items: center;
    background-color: transparent;
    color: #707070;
    cursor: pointer;
    padding: 10px;
  }

  .visible-icon {
    display: block;
  }

  .login-eye-btn.show .visible-icon {
    display: none;
  }

  .invisible-icon {
    display: none;
  }

  .login-eye-btn.show .invisible-icon {
    display: block;
  }

  .login-submit-btn {
    min-width: 200px;
    align-items: center;
    justify-content: center;
    margin-top: 30px;
    margin-left: auto;
    border-radius: 16px;
    height: 50px;
    transition: 0.3s;
  }

  .login-submit-btn:hover {
    box-shadow: 0px 6px 12px rgba(0, 0, 0, 15%);
  }

</style>

<body>
  <div class="modal modal--fail {{ session()->has('fail') ? '' : 'hidden' }}">{{ session()->get('fail') }}</div>
  <div class="modal modal--success {{ session()->has('success') ? '' : 'hidden' }}">{{ session()->get('success') }}</div>

  <main class="login-page">
    <form class="login-form" action="{{ route('auth.check') }}" method="post">
      @csrf
      <fieldset class="login-fieldset">
        <legend class="login-legend">Вход</legend>
        <label class="login-label">
          <input class="login-input" name="login" type="text" placeholder="Логин" value="{{ old('login') }}">
        </label>
        <label class="login-label">
          <input class="login-input" id="password" name="password" type="password" placeholder="******">
          <button class="login-eye-btn" type="button">
            <svg class="visible-icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="eye" class="svg-inline--fa fa-eye fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
              <path fill="currentColor" d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z"></path>
            </svg>
            <svg class="invisible-icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="eye-slash" class="svg-inline--fa fa-eye-slash fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
              <path fill="currentColor" d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z"></path>
            </svg>
          </button>
        </label>
      </fieldset>
      <button class="button login-submit-btn" type="submit">Войти</button>
    </form>
  </main>

  <script>
    const visibilityBtn = document.querySelector('.login-eye-btn'),
      passwordInput = documents.querySelector('#password');

    visibilityBtn.onclick = () => {
      if (visibilityBtn.classList.contains('show')) {
        visibilityBtn.classList.remove('show');
        passwordInput.setAttribute('type', 'password');
      } else {
        visibilityBtn.classList.add('show');
        passwordInput.setAttribute('type', 'text');
      }
    };
  </script>
</body>

</html>
