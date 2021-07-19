<footer class="footer">

   <div class="footer__top">
      <div class="container footer__top-container">
         <div class="footer__logo-wrapper">
            <img class="main-logo footer__main-logo" src="{{asset('images/main-logo.png')}}" alt="AtS Book Space">
            <h2 class="footer__title">Ats Book Space</>
         </div>
         <address class="footer__company">
            <p class="footer__company-address">
               {{__('г. Душанбе, ул. А. Каххоров, д. 19/8')}}
            </p>
            <p class="footer__company-phone">
               (+992) 918-13-04-39
            </p>
         </address>

         <ul class="footer-navigation">
            <li class="footer-navigation__item">
               <a class="footer-navigation__link" href="{{route('about_index')}}">
                  {{__('О клубе')}}
               </a>
            </li>
            <li class="footer-navigation__item">
               <a class="footer-navigation__link" href="{{route('rating_index')}}">
                  {{__('Рейтинги')}}
               </a>
            </li>
            <li class="footer-navigation__item">
               <a class="footer-navigation__link" href="{{route('presentation_index')}}">
                  {{__('Презентация книг')}}
               </a>
            </li>
            <li class="footer-navigation__item">
               <a class="footer-navigation__link" href="{{route('activities_index')}}">
                  {{__('Мероприятия клуба')}}
               </a>
            </li>
            <li class="footer-navigation__item">
               <a class="footer-navigation__link" href="{{route('rules_index')}}">
                  {{__('Правила пользования библиотекой')}}
               </a>
            </li>
            <li class="footer-navigation__item">
               <a class="footer-navigation__link" href="{{route('feedback_index')}}">
                  {{__('Обратная связь')}}
               </a>
            </li>
         </ul>

         <ul class="category-navigation">
            <li class="category-navigation__item">
               <a class="category-navigation__link" href="{{route('books_index')}}?category=Soft%20skills">
                  {{__('Softskills')}}
               </a>
            </li>
            <li class="category-navigation__item">
               <a class="category-navigation__link" href="{{route('books_index')}}?category=Hard%20skills">
                  {{__('Hardskills')}}
               </a>
            </li>
            <li class="category-navigation__item">
               <a class="category-navigation__link" href="{{route('books_index')}}?category=Маркетинг">
                  {{__('Маркетинг ')}}
               </a>
            </li>
            <li class="category-navigation__item">
               <a class="category-navigation__link" href="{{route('books_index')}}?category=Менеджмент">
                  {{__('Менеджмент ')}}
               </a>
            </li>
            <li class="category-navigation__item">
               <a class="category-navigation__link" href="{{route('books_index')}}?category=Финансы">
                  {{__('Финансы ')}}
               </a>
            </li>
            <li class="category-navigation__item">
               <a class="category-navigation__link" href="{{route('books_index')}}?category=Staff%20менеджмент">
                  {{__('Staff менеджмент ')}}
               </a>
            </li>
            <li class="category-navigation__item">
               <a class="category-navigation__link" href="{{route('books_index')}}?category=Продажи%20и%20переговоры">
                  {{__('Продажи и переговоры')}}
               </a>
            </li>
            <li class="category-navigation__item">
               <a class="category-navigation__link" href="{{route('books_index')}}?category=Сервис">
                  {{__('Сервис ')}}
               </a>
            </li>
            <li class="category-navigation__item">
               <a class="category-navigation__link" href="{{route('books_index')}}?category=ИТ">
                  {{__('ИТ')}}
               </a>
            </li>
            <li class="category-navigation__item">
               <a class="category-navigation__link" href="{{route('books_index')}}?category=Художественная%20литература">
                  {{__('Художественная Литература')}}
               </a>
            </li>
         </ul>

      </div>
   </div>

   <div class="footer__bottom">
      <div class="container footer__bottom-container">
         
         <p class="footer__rights">
            {{__('Группа Компаний "КОИНОТИ НАВ"')}}
            <br>{{__('Бизнес Тренинг Центр «AtS»')}}
         </p>
         <ul class="socials">
            <li class="socials__item" title="{{__('Вайбер')}}">
               <a class="socials__link">
                  <img class="socials__icon" src="{{asset('images/viber-icon.png')}}" alt="{{__('Вайбер')}}">
               </a>
            </li>
            <li class="socials__item" title="{{__('Фейсбук')}}">
               <a class="socials__link">
                  <img class="socials__icon" src="{{asset('images/fb-icon.png')}}" alt="{{__('Фейсбук')}}">
               </a>
            </li>
            <li class="socials__item" title="{{__('Инстаграм')}}">
               <a class="socials__link">
                  <img class="socials__icon" src="{{asset('images/insta-icon.png')}}" alt="{{__('Инстаграм')}}">
               </a>
            </li>
         </ul>
         <small class="footer__copyright">2021 {{__('Все права защищены')}}.</small>
         
      </div>
   </div>

</footer>