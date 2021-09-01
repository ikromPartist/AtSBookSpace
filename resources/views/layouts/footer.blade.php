<footer class="footer">
   <div class="footer__top">
      <div class="container footer__top-container">
         <div class="footer__logo-wrapper">
            <img class="main-logo footer__main-logo" src="{{asset('img/main-logo.png')}}" alt="AtS Book Space">
            <h2 class="footer__title">Ats Book Space</h2>
         </div>
         <address class="footer__company">
            <p class="footer__company-address">г. Душанбе, ул. А. Каххоров, д. 19/8</p>
            <p class="footer__company-phone">(+992) 951-143-99-75</p>
         </address>
         <ul class="footer-navigation">
            <li class="footer-navigation__item">
               <a class="footer-navigation__link" @if($route != 'about.index')href="{{route('about.index')}}"@endif>О клубе</a>
            </li>
            <li class="footer-navigation__item">
               <a class="footer-navigation__link" @if($route != 'rating.index')href="{{route('rating.index')}}"@endif>Рейтинги</a>
            </li>
            <li class="footer-navigation__item">
               <a class="footer-navigation__link" @if($route != 'presentation.index')href="{{route('presentation.index')}}"@endif>Презентация книг</a>
            </li>
            <li class="footer-navigation__item">
               <a class="footer-navigation__link" @if($route != 'activities.index')href="{{route('activities.index')}}"@endif>Мероприятия клуба</a>
            </li>
            <li class="footer-navigation__item">
               <a class="footer-navigation__link" @if($route != 'rules.index')href="{{route('rules.index')}}"@endif>Правила пользования библиотекой</a>
            </li>
            <li class="footer-navigation__item">
               <a class="footer-navigation__link" data-link="feedback_link" @if($route != 'feedback.index')href="{{route('feedback.index')}}"@endif>Обратная связь</a>
            </li>
         </ul>
         <ul class="category-navigation">
            <li class="category-navigation__item">
               <a class="category-navigation__link" href="{{route('books.index')}}?category=Soft%20skills">Softskills</a>
            </li>
            <li class="category-navigation__item">
               <a class="category-navigation__link" href="{{route('books.index')}}?category=Hard%20skills">Hardskills</a>
            </li>
            <li class="category-navigation__item">
               <a class="category-navigation__link" href="{{route('books.index')}}?category=Маркетинг">Маркетинг</a>
            </li>
            <li class="category-navigation__item">
               <a class="category-navigation__link" href="{{route('books.index')}}?category=Менеджмент">Менеджмент</a>
            </li>
            <li class="category-navigation__item">
               <a class="category-navigation__link" href="{{route('books.index')}}?category=Финансы">Финансы</a>
            </li>
            <li class="category-navigation__item">
               <a class="category-navigation__link" href="{{route('books.index')}}?category=Staff%20менеджмент">Staff менеджмент</a>
            </li>
            <li class="category-navigation__item">
               <a class="category-navigation__link" href="{{route('books.index')}}?category=Продажи%20и%20переговоры">Продажи и переговоры</a>
            </li>
            <li class="category-navigation__item">
               <a class="category-navigation__link" href="{{route('books.index')}}?category=Сервис">Сервис</a>
            </li>
            <li class="category-navigation__item">
               <a class="category-navigation__link" href="{{route('books.index')}}?category=ИТ">ИТ</a>
            </li>
            <li class="category-navigation__item">
               <a class="category-navigation__link" href="{{route('books.index')}}?category=Художественная%20литература">Художественная Литература</a>
            </li>
         </ul>
      </div>
   </div>
   <div class="footer__bottom">
      <div class="container footer__bottom-container">
         <p class="footer__rights">
            Группа Компаний "КОИНОТИ НАВ"
            <br>Бизнес Тренинг Центр «AtS»
         </p>
         <ul class="socials">
            <li class="socials__item">
               <a class="socials__link">
                  <img class="socials__icon" src="{{asset('img/viber-icon.png')}}" alt="Вайбер">
               </a>
            </li>
            <li class="socials__item">
               <a class="socials__link">
                  <img class="socials__icon" src="{{asset('img/fb-icon.png')}}" alt="Фейсбук">
               </a>
            </li>
            <li class="socials__item">
               <a class="socials__link">
                  <img class="socials__icon" src="{{asset('img/insta-icon.png')}}" alt="Инстаграм">
               </a>
            </li>
         </ul>
         <small class="footer__copyright">2021 Все права защищены.</small>
      </div>
   </div>
   <button class="scroll-top-btn" id="scroll-top-btn" type="button">
      <img src="{{asset('img/scroll-to-top.png')}}" alt="Вверх">
   </button>
</footer>