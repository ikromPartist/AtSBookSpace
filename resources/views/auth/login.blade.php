<!DOCTYPE html>
<html lang="ru">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>AtS Book Space: {{__('Вход')}}</title>
      {{-- material icons --}}
      <link href="https://fonts.googleapis.com/css?family=Material+Icons" rel="stylesheet">
      {{-- main styles --}}
      <link rel="stylesheet" href="{{mix('css/styles.css')}}">
   </head>
   <body>
      <main class="login__page">
         <div class="login__wrapper">
            <section class="login">
               <div class="logos-wrapper">
                  <img class="main-logo" src="{{asset('img/main-logo.png')}}" alt="Логотип AtS Book Space">
                  <img class="koinot-logo" src="{{asset('img/koinot-logo.png')}}" alt="Логотип Коиноти Нав">
               </div>
               <form class="login__form" action="{{route('auth.check')}}" method="POST">
                  @csrf
                     <h2 class="login__title">Вход</h2>
                     @if (Session::get('fail'))
                        <p class="login__fail-msg">{{Session::get('fail')}}</p>
                     @endif
                     <p class="login__item">
                        <label class="login__label" for="login">Логин</label>
                        <input class="login__input" id="login" type="text" name="login" placeholder="Login" value="{{old('login')}}">
                        <span class="login__error-msg">
                           @error('login')
                              {{$message}}
                           @enderror
                        </span>
                     </p>
                     <p class="login__item">
                        <label class="login__label" for="login-password">Пароль</label>
                        <input class="login__input" type="password" name="password" id="login-password" placeholder="Пароль">
                        <button class="visibility-button" type="button">
                           <span class="material-icons visibility-button__icon">visibility</span>
                        </button>
                        <span class="login__error-msg">
                           @error('password')
                              {{$message}}
                           @enderror
                        </span>
                     </p>
                     <p class="login__item">
                        <a class="forgot-link" href="#">Забыли пароль?</a>
                     </p>
                     <button class="button login__submit-btn" type="submit">Вход</button>
               </form>
            </section>{{-- login end --}}
            <section class="welcome">
               <div class="welcome__wrapper">
                  <h2 class="welcome__title">Добро пожаловать!</h2>
                  <p class="welcome__text">
                     Чтобы оставаться на связи с нами,<br>
                     войдите с вашей личной<br> 
                     информацией
                  </p>
               </div>
               <p class="welcome__copyright">
                  Группа Компаний "КОИНОТИ НАВ".<br>
                  Бизнес Тренинг Центр «AtS».<br>
                  2021 Все права защищены.
               </p>
            </section>{{-- welcome end --}}
         </div>{{-- login wrapper end --}}
      </main>
      <script src="{{asset('js/auth.js')}}"></script>
   </body>
</html>