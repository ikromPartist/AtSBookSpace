<!DOCTYPE html>
<html lang="ru">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>{{__('Login')}}</title>
   {{-- material icons --}}
   <link href="https://fonts.googleapis.com/css?family=Material+Icons" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
   {{-- main styles --}}
   <link rel="stylesheet" href="{{asset('css/auth.css')}}">
</head>
<body>

   <main class="auth-page">
      <div class="container">
         <div class="auth-page__wrapper">

            <h1 class="visually-hidden">{{__('Аутентификация')}}</h1>
            
            <section class="auth">
               <img class="main-logo" src="{{asset('images/main-logo.png')}}" alt="AtS Book Space" width="60" height="60">
               <img class="koinot-logo auth__koinot-logo" src="{{asset('images/koinot-logo.png')}}" alt="Коиноти Нав" width="340px" height="60px">
               <h2 class="auth-title">{{__('Вход')}}</h2>
               <form class="login" action="{{route('auth.check')}}" method="POST">
                  
                  @if (Session::get('fail'))
                     <p>{{Session::get('fail')}}</p>
                  @endif

                  @csrf
                  <p class="login__items">
                     <label class="login__label" for="login-login">{{__('Логин')}}</label>
                     <input type="text" name="login" class="login__input" id="login-login" placeholder="Login" value="{{old('login')}}">
                     <span class="error-text login__error-text">@error('login'){{$message}}@enderror</span>
                  </p>
                  <p class="login__items">
                     <label class="login__label" for="login-password">{{__('Пароль')}}</label>
                     <input type="password" name="password" class="login__input" id="login-password" placeholder="{{__('Пароль')}}">
                     <button class="visibility-button" type="button">
                        <span class="material-icons-outlined visibility-button__icon">visibility</span>
                     </button>
                     <span class="error-text login__error-text">@error('password'){{$message}}@enderror</span>
                  </p>
                  <p class="login__items">
                     <a class="forgot-link" href="#">{{__('Забыли пароль?')}}</a>
                  </p>
                  <button class="login__submit-button" type="submit">{{__('Вход')}}</button>
               </form>

            </section>
            
            <section class="welcome">
               <h2 class="welcome__title">{{__('Добро пожаловать!')}}</h2>
               <p class="welcome__text">
                  {{__('Чтобы оставаться на связи с нами, войдите с вашей личной информацией')}}
               </p>
               <p class="welcome__copyright">
                  {{__('Группа Компаний "КОИНОТИ НАВ"')}}.
                  <br> {{__('Бизнес Тренинг Центр «AtS»')}}.
                  <br>2021 {{__('Все права защищены')}}.
               </p>
            </section>

         </div>
      </div>
   </main>

   <script src="{{asset('js/auth.js')}}"></script>

</body>
</html>