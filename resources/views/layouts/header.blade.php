<header class="header">
   
   <div class="header-top">
      <div class="container header-top__container">

         <a class="ats-link" href="https://ats.tj/" target="_blank">
            <img class="main-logo" src="{{asset('images/main-logo.png')}}" alt="AtS Book Space">
         </a>

         <a class="koinot-link">
            <img class="koinot-logo" src="{{asset('images/koinot-logo.png')}}" alt="Коиноти Нав">
         </a>

         <div class="catalog">
            <button type="button" class="catalog__button">
               {{__('Каталог')}}
               <span class="material-icons-outlined catalog__dropdown-icon">arrow_drop_down</span>
            </button>
            <ul class="catalog__list hidden">
               <li class="catalog__items">
                  <a class="catalog__links" href="{{route('books.index')}}">{{__('Все')}}</a>
               </li>
               <li class="catalog__items">
                  <a class="catalog__links" href="{{route('books.index')}}?category=available">{{__('Доступные')}}</a>
               </li>
            </ul>
         </div>

         <form class="search hidden">
            @csrf
            <label class="visually-hidden" for="search__input">{{__('Поиск')}}</label>
            <input type="search" class="search__input" id="search__input" name="keyword" list="tables" placeholder="{{__('Поиск')}}:" tabindex="-1">
            
            <datalist id="tables">
               <option value="name"></option>
            </datalist>
            
            <button type="button" class="search__button">
               <span class="visually-hidden">{{__('Поиск')}}</span>
            <span class="material-icons-outlined search__icon">search</span></button>
         </form>

         <a class="notification-link" href="#">
            <span class="material-icons notification-link__icon">notifications</span>
            <span class="visually-hidden">{{__('Уведомления')}}</span>
         </a>

         <a class="viber-link" href="#">
            <img src="{{asset('images/viber.png')}}" alt="{{__('Вайбер')}}" class="viber-link__icon">
         </a>

         <dl class="taken-book">
            @if ($loggedUser->book)
            <dt class="taken-book__title" title="{{__('Взятая книга')}}">
               <a class="taken-book__link" href="{{route('books.index')}}?id={{$loggedUser->book->id}}">
                  {{$loggedUser->book->title}}
               </a>
            </dt>
            <dd class="taken-book__deadline">
               <input data-id="year" type="text" value="{{ \Carbon\Carbon::parse($loggedUser->book->return_date)->format('Y')}}" class="visually-hidden">
               <input data-id="month" type="text" value="{{ \Carbon\Carbon::parse($loggedUser->book->return_date)->format('m')}}" class="visually-hidden">
               <input data-id="day" type="text" value="{{ \Carbon\Carbon::parse($loggedUser->book->return_date)->format('d')}}" class="visually-hidden">
               <a class="taken-book__deadline-link" data-id="times-left" href="#">
                  <span data-id="days"></span><small>д</small>
                  <span data-id="hours"></span><b>:</b>
                  <span data-id="minutes"></span><b>:</b>
                  <span class="taken-book__seconds" data-id="seconds"></span>
               </a>
            </dd>
            @else
            <p class="taken-book__message">
               {{__('Вы не читаете книг')}}
            </p>
            @endif
         </dl>

      </div>
   </div>

   <div class="header-bottom">

      <div class="container header-bottom__container">

         <blockquote class="quote">
            <span>{{__('Быть')}}</span> {{__('умным модно!!')}} <br>
            {{__('Профессионалом своего дела-гордо!!!')}} 
         </blockquote>

         <address class="company">
            <p class="company__phone">
               <span class="material-icons company__phone-icon">call</span>
               (+992) 918-13-04-39
            </p>
            <p class="company-name">{{$loggedUser->company}}</p>
         </address>

         <div class="user-info">            
            <div class="user-wrapper">
               <span class="material-icons user-icon">person</span>
               <p class="user-name">{{$loggedUser->name}} {{$loggedUser->surname}}</p>
               <a class="logout-link" href="{{route('auth.logout')}}">
                  <span class="material-icons logout-link__icon">logout</span>
                  <span class="visually-hidden">{{__('Выйти')}}</span>
               </a>
            </div>
            <a class="profile-link" href="#">{{__('Управление профилем')}}</a>
         </div>

      </div>   

      <nav class="main-navigation header__main-navigation">
         <div class="container">
            <ul class="site-navigation">
               <li class="site-navigation__item">
                  <a class="site-navigation__link" @if($route != 'home_index') href="{{route('home_index')}}"@endif>
                     {{__('Главная')}}
                  </a>
               </li>
               <li class="site-navigation__item">
                  <a class="site-navigation__link" href="#">
                     {{__('О клубе')}}
                  </a>
               </li>
               <li class="site-navigation__item">
                  <a class="site-navigation__link" href="#">
                     {{__('Рейтинги')}}
                  </a>
               </li>
               <li class="site-navigation__item">
                  <a class="site-navigation__link" href="#">
                     {{__('Презентация книг')}}
                  </a>
               </li>
               <li class="site-navigation__item">
                  <a class="site-navigation__link" href="#">
                     {{__('Мероприятия клуба')}}
                  </a>
               </li>
               <li class="site-navigation__item">
                  <a class="site-navigation__link" href="#">
                     {{__('Правила пользования библиотекой')}}
                  </a>
               </li>
               <li class="site-navigation__item">
                  <a class="site-navigation__link" href="#">
                     {{__('Обратная связь')}}
                  </a>
               </li>   
            </ul>  
         </div>
      </nav>

   </div>

</header>