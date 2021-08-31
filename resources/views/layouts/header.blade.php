<header class="header">
   <div class="header-top">
      <div class="container header-top__container">
         <a class="ats-link" href="https://ats.tj/" target="_blank">
            <img class="main-logo" src="{{asset('img/main-logo.png')}}" alt="AtS Book Space">
         </a>
         <a class="koinot-link" href="https://project2019.koinotinav.com/" target="_blank">
            <img class="koinot-logo" src="{{asset('img/koinot-logo.png')}}" alt="Коиноти Нав">
         </a>
         <div class="catalog">
            <button class="catalog__button" id="catalog-btn" type="button">
               Каталог
               <span class="material-icons catalog__dropdown-icon" id="catalog-icon">arrow_drop_down</span>
            </button>
            <ul class="catalog__list hidden" id="catalog-list">
               <li class="catalog__items">
                  <a class="catalog__links" href="{{route('books.index')}}">Все</a>
               </li>
               <li class="catalog__items">
                  <a class="catalog__links" href="{{route('books.index')}}?category=available">Доступные</a>
               </li>
            </ul>
         </div>
         <div class="search__wrapper">
            <form class="search hidden" id="search">
               @csrf
               <input class="search__input" type="search" name="keyword" placeholder="Поиск...">
               <button class="search__submit-btn" type="submit">
                  <span class="material-icons search__icon">search</span>
               </button>
            </form>
            <button class="search__button" id="show-hide-search-btn" type="button">
               <span class="material-icons search__icon" id="show-hide-icon">search</span>
            </button>
         </div>
         <a class="notification-link" href="{{route('notifications.index')}}">
            <span class="material-icons notification-link__icon">notifications</span>
            @if ($notes->count() != 0) 
               <span class="material-icons notification-link__icon notification-link__icon--active">notifications_active</span>
            @endif
         </a>
         <a class="viber-link" href="#">
            <img class="viber-link__icon" src="{{asset('img/viber.png')}}" alt="{{__('Вайбер')}}">
         </a>
         <dl class="taken-book">
            @if ($loggedUser->book)
               <dt class="taken-book__title" title="Взятая книга">
                  <a class="taken-book__link" href="{{route('books.single', $loggedUser->book->id)}}">
                     {{$loggedUser->book->title}}
                     <p class="taken-book__see-txt">Посмотреть</p>
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
                     <p class="taken-book__renew">Продлить</p>
                     @endif
                  </a>
               </dd>
            @else
               <p class="taken-book__message">Вы не читаете книг</p>
            @endif
         </dl>
      </div>{{-- container end --}}
   </div>{{-- header top end --}}

   <div class="header-bottom">
      <div class="container header-bottom__container">
         <blockquote class="quote">
            <span>Быть</span> 
            умным модно!!<br>
            Профессионалом своего дела-гордо!!! 
         </blockquote>
         <address class="company">
            <p class="company__phone">
               <span class="material-icons company__phone-icon">call</span>
               (+992) 951439975
            </p>
            <p class="company-name">AtS Book Space</p>
         </address>
         <div class="user-info">            
            <div class="user-wrapper">
               <span class="material-icons user-icon">person</span>
               <p class="user-name">{{$loggedUser->name}} {{$loggedUser->surname}}</p>
               <a class="logout-link" href="{{route('auth.logout')}}">
                  <span class="material-icons logout-link__icon">logout</span>
               </a>
            </div>
            <a class="profile-link" href="{{route('profile.index')}}">Управление профилем</a>
         </div>
      </div>{{-- container end --}} 
      <nav class="main-navigation header__main-navigation">
         <div class="container">
            <ul class="site-navigation">
               <li class="site-navigation__item {{$route == 'home.index' ? 'active' : ''}}">
                  <a class="site-navigation__link" @if($route != 'home.index')href="{{route('home.index')}}"@endif>Главная</a>
               </li>
               <li class="site-navigation__item {{$route == 'about.index' ? 'active' : ''}}">
                  <a class="site-navigation__link" @if($route != 'about.index')href="{{route('about.index')}}"@endif>О клубе</a>
               </li>
               <li class="site-navigation__item {{$route == 'rating.index' ? 'active' : ''}}">
                  <a class="site-navigation__link" @if($route != 'rating.index')href="{{route('rating.index')}}"@endif>Рейтинги</a>
               </li>
               <li class="site-navigation__item {{$route == 'presentation.index' ? 'active' : ''}}">
                  <a class="site-navigation__link" @if($route != 'presentation.index')href="{{route('presentation.index')}}"@endif>Презентация книг</a>
               </li>
               <li class="site-navigation__item {{$route == 'activities.index' ? 'active' : ''}}">
                  <a class="site-navigation__link" @if($route != 'activities.index')href="{{route('activities.index')}}"@endif>Мероприятия клуба</a>
               </li>
               <li class="site-navigation__item {{$route == 'rules.index' ? 'active' : ''}}">
                  <a class="site-navigation__link" @if($route != 'rules.index')href="{{route('rules.index')}}"@endif>Правила пользования библиотекой</a>
               </li>
               <li class="site-navigation__item {{$route == 'feedback.index' ? 'active' : ''}}">
                  <a class="site-navigation__link" data-link="feedback_link" href="#">Обратная связь</a>
               </li>   
            </ul> 
         </div>{{-- container end --}}
      </nav>
   </div>{{-- header bottom end --}}
   <section class="modal hidden" data-id="confirm-modal">
      <div class="modal__container">
         <p class="modal__text">Вы уверены что хотите продлить дедлайн?</p>
         <div class="modal__btn-wrapper">
            <button class="button" data-id="confirm-modal__confirm-btn" type="button">Продлить</button>
            <button class="button button--red" data-id="confirm-modal__cancel-btn" type="button">Отмена</button>
         </div>
         <button class="modal__close-btn" type="button">
            <span class="material-icons modal__close-icon" data-id="confirm-modal__close-btn">close</span>
         </button>
      </div>
   </section>
   <section class="modal modal--success hidden" data-id="success-modal">
      <div class="modal__container">
         <p class="modal__text">Ваш дедлайн успешно продлен ещё на 15 дней!</p>
         <div class="modal__btn-wrapper">
            <button class="button" data-id="success-modal__ok-btn" type="button">OK</button>
         </div>
         <button class="modal__close-btn" type="button">
            <span class="material-icons modal__close-icon" data-id="success-modal__close-btn">close</span>
         </button>
      </div>
   </section>
   <section class="modal modal--fail hidden" data-id="fail-modal">
      <div class="modal__container">
         <p class="modal__text">
            Операция невозможна!
            @if ($loggedUser->book && $loggedUser->book->deadline_renewed)
            Вы уже продлили дедлайн.
            @endif
         </p>
         <div class="modal__btn-wrapper">
            <button class="button" data-id="fail-modal__ok-btn" type="button">OK</button>
         </div>
         <button class="modal__close-btn" type="button">
            <span class="material-icons modal__close-icon" data-id="fail-modal__close-btn">close</span>
         </button>
      </div>
   </section>
</header>


