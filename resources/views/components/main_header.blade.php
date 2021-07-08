<header class="main-header">

   <div class="main-header-top">
      <div class="container main-header-top__container">
         <a class="ats-link" href="https://ats.tj/">
            <img class="main-logo" src="{{asset('images/main-logo.png')}}" alt="AtS Book Space">
         </a>
         <a class="koinot-link" href="#">
            <img class="koinot-logo" src="{{asset('images/koinot-logo.png')}}" alt="Коиноти Нав">
         </a>
         <div class="catalog">
            <button type="button" class="catalog__button">
               {{__('Каталог')}}
               <span class="material-icons-outlined catalog__dropdown-icon">arrow_drop_down</span>
            </button>
            <ul class="catalog__list visually-hidden">
               <li class="catalog__items">
                  <a class="catalog__links" href="#">{{__('Softskills')}}</a>
               </li>
               <li class="catalog__items">
                  <a class="catalog__links" href="#">{{__('Hardskills')}}</a>
               </li>
               <li class="catalog__items">
                  <a class="catalog__links" href="#">{{__('Маркетинг')}}</a>
               </li>
               <li class="catalog__items">
                  <a class="catalog__links" href="#">{{__('Менеджмент')}}</a>
               </li>
               <li class="catalog__items">
                  <a class="catalog__links" href="#">{{__('Финансы')}}</a>
               </li>
               <li class="catalog__items">
                  <a class="catalog__links" href="#">{{__('Staff менеджмент')}}</a>
               </li>
               <li class="catalog__items">
                  <a class="catalog__links" href="#">{{__('Продажи и переговоры')}}</a>
               </li>
               <li class="catalog__items">
                  <a class="catalog__links" href="#">{{__('Сервис')}}</a>
               </li>
               <li class="catalog__items">
                  <a class="catalog__links" href="#">{{__('ИТ')}}</a>
               </li>
               <li class="catalog__items">
                  <a class="catalog__links" href="#">{{__('Художественная литература')}}</a>
               </li>
            </ul>
         </div>
         <form class="main-search">
            @csrf
            <label class="main-search__label" for="main-search__input">
               <span class="material-icons-outlined main-search__icon">search</span>
               <span class="visually-hidden">{{__('Поиск')}}</span>
            </label>
            <input type="search" class="main-search__input" id="main-search__input" name="keyword" list="tables" placeholder="{{__('Поиск')}}:">
            <datalist id="tables">
               <option value="name"></option>
            </datalist>
            <button class="visually-hidden" type="submit" tabindex="-1">{{__('Поиск')}}</button>
         </form>
         <div class="main-header-top__user-info">
            <a class="notification-link" href="#">
               <span class="material-icons notification-link__icon">notifications</span>
               <span class="visually-hidden">{{__('Уведомления')}}</span>
            </a>
            <a class="viber-link" href="#">
               <img src="{{asset('images/viber.png')}}" alt="{{__('Вайбер')}}" class="viber-link__icon">
            </a>
         </div>
         <dl class="taken-book">
            <dt class="taken-book__title" title="{{__('Взятая книга')}}">
               <a class="taken-book__link" href="#">
                  {{__('Взятая книга')}}
               </a>
            </dt>
            <dd class="taken-book__deadline">
               <a class="taken-book__deadline-link" href="#">
                  <time title="{{__('Дедлайн')}}" datetime="2005-10-05">
                     2 <small>д.</small> 15 <small>ч.</small> 52 <small>мин.</small>
                  </time>
               </a>
            </dd>
         </dl>
      </div>
   </div>

   <div class="main-header-bottom">
      <div class="container main-header-bottom__container">
         <blockquote class="quote">
            <span>{{__('Быть')}}</span> {{__('умным модно!!')}} <br>
            {{__('Профессионалом своего дела-гордо!!!')}} 
         </blockquote>
         <address class="user-address">
            <p class="phone-numbers">
               <span class="material-icons phone-numbers__icon">call</span>
               (+992) 918-13-04-39
            </p>
            <p class="company-name">{{__('Название компании')}}</p>
         </address>
         <div class="user-info">            
            <div class="user-wrapper">
               <span class="material-icons user-icon">person</span>
               <p class="user-name">{{$user->name}} {{$user->surname}}</p>
               <a class="logout-link" href="{{route('auth.logout')}}">
                  <span class="material-icons logout-link__icon">logout</span>
                  <span class="visually-hidden">{{__('Выйти')}}</span>
               </a>
            </div>
            <a class="profile-link" href="#">{{__('Управление профилем')}}</a>
         </div>
      </div>   
      <nav class="main-navigation main-header__main-navigation">
         <div class="container">
            <ul class="site-navigation">
               <li class="site-navigation__items">
                  <a href="#" class="site-navigation__links">
                     {{__('О клубе')}}
                  </a>
               </li>
               <li class="site-navigation__items">
                  <a href="#" class="site-navigation__links">
                     {{__('Рейтинги')}}
                  </a>
               </li>
               <li class="site-navigation__items">
                  <a href="#" class="site-navigation__links">
                     {{__('Презентация книг')}}
                  </a>
               </li>
               <li class="site-navigation__items">
                  <a href="#" class="site-navigation__links">
                     {{__('Мероприятия клуба')}}
                  </a>
               </li>
               <li class="site-navigation__items">
                  <a href="#" class="site-navigation__links">
                     {{__('Правила пользования библиотекой')}}
                  </a>
               </li>
               <li class="site-navigation__items">
                  <a href="#" class="site-navigation__links">
                     {{__('Обратная связь')}}
                  </a>
               </li>   
            </ul>   
         </div>
      </nav>
   </div>

</header>