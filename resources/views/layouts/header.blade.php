<header class="header">
   
   <div class="header-top">

      <div class="container header-top__container">

         <a class="ats-link" href="https://ats.tj/" target="_blank">
            <img class="main-logo" src="{{asset('img/main-logo.png')}}" alt="AtS Book Space">
         </a>

         <a class="koinot-link">
            <img class="koinot-logo" src="{{asset('img/koinot-logo.png')}}" alt="Коиноти Нав">
         </a>

         <div class="catalog">
            <button type="button" class="catalog__button">
               {{__('Каталог')}}
               <span class="material-icons-outlined catalog__dropdown-icon">
                  arrow_drop_down
               </span>
            </button>
            <ul class="catalog__list hidden">
               <li class="catalog__items">
                  <a class="catalog__links" href="{{route('books.index')}}">
                     {{__('Все')}}
                  </a>
               </li>
               <li class="catalog__items">
                  <a class="catalog__links" href="{{route('books.index')}}?category=available">
                     {{__('Доступные')}}
                  </a>
               </li>
            </ul>
         </div>

         <form class="search hidden">
            
            @csrf

               <label class="visually-hidden" for="search__input">
                  {{__('Поиск')}}
               </label>
               <input class="search__input" id="search__input" type="search"  name="keyword" list="tables" placeholder="{{__('Поиск')}}:" tabindex="-1">
               
               <datalist id="tables">
                  <option value="name"></option>
               </datalist>
               
               <button class="search__button" type="button">
                  <span class="material-icons-outlined search__icon">
                     search
                  </span>
               </button>

         </form>

         <a class="notification-link" href="#">
            <span class="material-icons notification-link__icon">
               notifications
            </span>
         </a>

         <a class="viber-link" href="#">
            <img class="viber-link__icon" src="{{asset('img/viber.png')}}" alt="{{__('Вайбер')}}">
         </a>

         <dl class="taken-book">

            @if ($loggedUser->book)

               <dt class="taken-book__title" title="{{__('Взятая книга')}}">
                  <a class="taken-book__link" href="{{route('books.single', $loggedUser->book->id)}}">
                     {{$loggedUser->book->title}}
                     <p class="taken-book__see-txt">
                        {{__('Посмотреть')}}
                     </p>
                  </a>
               </dt>
               <dd class="taken-book__deadline">

                  <input data-id="book" type="hidden" value="{{$loggedUser->book->id}}">
                  <input data-id="year" type="hidden" value="{{\Carbon\Carbon::parse($loggedUser->book->return_date)->format('Y')}}">
                  <input data-id="month" type="hidden" value="{{\Carbon\Carbon::parse($loggedUser->book->return_date)->format('m')}}">
                  <input data-id="day" type="hidden" value="{{\Carbon\Carbon::parse($loggedUser->book->return_date)->format('d')}}">
                  
                  <a class="taken-book__deadline-link" data-id="times-left" @if(Carbon\Carbon::now() < $loggedUser->book->return_date)href="#"@endif>
                     <span data-id="days"></span><small>д</small>
                     <span data-id="hours"></span><b>:</b>
                     <span data-id="minutes"></span><b>:</b>
                     <span class="taken-book__seconds" data-id="seconds"></span>
                     
                     @if(Carbon\Carbon::now() < $loggedUser->book->return_date)
                     
                        <p class="taken-book__renew">{{__('Продлить')}}</p>
                     
                     @endif
                     
                  </a>

               </dd>

            @else

               <p class="taken-book__message">
                  {{__('Вы не читаете книг')}}
               </p>

            @endif

         </dl>

      </div>{{-- container end --}}

   </div>{{-- header top end --}}

   <div class="header-bottom">

      <div class="container header-bottom__container">

         <blockquote class="quote">
            <span>
               {{__('Быть')}}
            </span> 
            {{__('умным модно!!')}}<br>
            {{__('Профессионалом своего дела-гордо!!!')}} 
         </blockquote>

         <address class="company">
            <p class="company__phone">
               <span class="material-icons company__phone-icon">
                  call
               </span>
               (+992) 918130439
            </p>
            <p class="company-name">
               AtS Book Space 
            </p>
         </address>

         <div class="user-info">            
            <div class="user-wrapper">
               <span class="material-icons user-icon">
                  person
               </span>
               <p class="user-name">
                  {{$loggedUser->name}} 
                  {{$loggedUser->surname}}
               </p>
               <a class="logout-link" href="{{route('auth.logout')}}">
                  <span class="material-icons logout-link__icon">
                     logout
                  </span>
               </a>
            </div>
            <a class="profile-link" href="{{route('profile.index')}}">
               {{__('Управление профилем')}}
            </a>
         </div>

      </div>{{-- container end --}} 

      <nav class="main-navigation header__main-navigation">

         <div class="container">

            <ul class="site-navigation">
               <li class="site-navigation__item {{$route == 'home.index' ? 'active' : ''}}">
                  <a class="site-navigation__link" @if($route != 'home.index')href="{{route('home.index')}}"@endif>
                     {{__('Главная')}}
                  </a>
               </li>
               <li class="site-navigation__item {{$route == 'about.index' ? 'active' : ''}}">
                  <a class="site-navigation__link" @if($route != 'about.index')href="{{route('about.index')}}"@endif>
                     {{__('О клубе')}}
                  </a>
               </li>
               <li class="site-navigation__item {{$route == 'rating.index' ? 'active' : ''}}">
                  <a class="site-navigation__link" @if($route != 'rating.index')href="{{route('rating.index')}}"@endif>
                     {{__('Рейтинги')}}
                  </a>
               </li>
               <li class="site-navigation__item {{$route == 'presentation.index' ? 'active' : ''}}">
                  <a class="site-navigation__link" @if($route != 'presentation.index')href="{{route('presentation.index')}}"@endif>
                     {{__('Презентация книг')}}
                  </a>
               </li>
               <li class="site-navigation__item {{$route == 'activities.index' ? 'active' : ''}}">
                  <a class="site-navigation__link" @if($route != 'activities.index')href="{{route('activities.index')}}"@endif>
                     {{__('Мероприятия клуба')}}
                  </a>
               </li>
               <li class="site-navigation__item {{$route == 'rules.index' ? 'active' : ''}}">
                  <a class="site-navigation__link" @if($route != 'rules.index')href="{{route('rules.index')}}"@endif>
                     {{__('Правила пользования библиотекой')}}
                  </a>
               </li>
               <li class="site-navigation__item {{$route == 'feedback.index' ? 'active' : ''}}">
                  <a class="site-navigation__link" @if($route != 'feedback.index')href="{{route('feedback.index')}}"@endif>
                     {{__('Обратная связь')}}
                  </a>
               </li>   
            </ul> 

         </div>{{-- container end --}}

      </nav>

   </div>{{-- header bottom end --}}

</header>

<div class="modal hidden" data-id="confirm-modal">
   <div class="modal__msg-wrapper">
      <p class="modal__msg">
         {{__('Вы уверены что хотите продлить дедлайн')}}?
      </p>
   </div>
   <div class="modal__btn-wrapper">
      <button class="button" data-id="confirm-modal__confirm-btn" type="button">
         {{__('Продлить')}}
      </button>
      <button class="button button--red" data-id="confirm-modal__cancel-btn" type="button">
         {{__('Отмена')}}
      </button>
   </div>
   <button class="modal__close-btn" aria-label="{{__('Закрыть')}}">
      <span class="material-icons modal__close-icon" data-id="confirm-modal__close-btn">
         close
      </span>
   </button>
</div>

<div class="modal hidden" data-id="success-modal">
   <div class="modal__msg-wrapper">
      <p class="modal__msg">
         {{__('Ваш дедлайн успешно продлен ещё на 15 дней')}}!
      </p>
   </div>
   <div class="modal__btn-wrapper">
      <button class="button" data-id="success-modal__ok-btn" type="button">
         {{__('OK')}}
      </button>
   </div>
   <button class="modal__close-btn" type="button" aria-label="{{__('Закрыть')}}">
      <span class="material-icons modal__close-icon" data-id="success-modal__close-btn">
         close
      </span>
   </button>
</div>

<div class="modal hidden" data-id="fail-modal">
   <div class="modal__msg-wrapper">
      <p class="modal__msg modal__msg--red">

         {{'Операция невозможна'}}!

         @if ($loggedUser->book && $loggedUser->book->deadline_renewed)
         
            {{__('Вы уже продлили дедлайн')}}.
         
         @endif

      </p>
   </div>
   <div class="modal__btn-wrapper">
      <button class="button" data-id="fail-modal__ok-btn" type="button">
         {{__('OK')}}
      </button>
   </div>
   <button class="modal__close-btn" type="button" aria-label="{{__('Закрыть')}}">
      <span class="material-icons modal__close-icon" data-id="fail-modal__close-btn">
         close
      </span>
   </button>
</div>

