<header class="main-header">

   <div class="main-header-top">
      <div class="container main-header-top__container">
         <div class="logos-wrapper">
            <img class="main-logo" src="{{asset('images/main-logo.png')}}" alt="AtS Book Space">
            <img class="koinot-logo" src="{{asset('images/koinot-logo.png')}}" alt="Коиноти Нав">
         </div>
         <form class="main-search">
            @csrf
            <label class="main-search__label" for="main-search__input">
               <span class="visually-hidden">{{__('Поиск')}}</span>
            </label>
            <input type="search" class="main-search__input" id="main-search__input" name="keyword" list="tables">
            <datalist id="tables">
               <option value="name"></option>
            </datalist>
            <button class="visually-hidden" type="submit">{{__('Поиск')}}</button>
         </form>
         <dt class="taken-book__title" title="{{__('Взятая книга')}}">{{__('Взятая книга')}}</dt>
         <dd>
            <time class="taken-book__deadline" title="{{__('Дедлайн')}}" datetime="2005-10-05">
               02 <small>д.</small> 15 <small>ч.</small> 52 <small>мин.</small>
            </time>
         </dd>
      </div>
   </div>

   <div class="main-header-bottom">
      <div class="container main-header-bottom__container">
         <blockquote class="quote">
            <span>Быть</span> умным модно!! <br>
            Профессионалом своего дела-гордо!!! 
         </blockquote>
         <address class="user-address">
            (+992) 918-13-04-39
            <p class="company-name">{{__('Название компании')}}</p>
         </address>
         <div class="user-info">
            <a href="#">
               <span class="visually-hidden">{{__('Уведомления')}}</span>
            </a>
            <a href="#">
               <span class="visually-hidden">{{__('Вайбер')}}</span>
            </a>
            <div class="user-wrapper">
               <p class="user-name">{{$user->name}} {{$user->surname}}</p>
               <a href="{{route('auth.logout')}}">
                  <span class="visually-hidden">{{__('Выйти')}}</span>
               </a>
            </div>
            <a href="#">{{__('Управление профилем')}}</a>
         </div>
      </div>   
   </div>

</header>