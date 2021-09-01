@extends('layouts.master')

@section('content')
   <main class="home-page">
      <section class="news-banner">
         <div class="owl-carousel owl-news">
            <figure class="news__item">
               <img class="news__img" src="{{asset('img/news/news1.jpg')}}" alt="Новости">
            </figure>
            <figure class="news__item">
               <img class="news__img" src="{{asset('img/news/news2.jpg')}}" alt="Новости">
            </figure>
            <figure class="news__item">
               <img class="news__img" src="{{asset('img/news/news3.jpg')}}" alt="Новости">
            </figure>
         </div>
      </section>
      <section class="categories">
         <div class="container">
            <ul class="categories__list">
               <li class="categories__item">
                  <h3 class="categories__title">Soft skills</h3>
                  <a class="categories__link" href="{{route('books.index')}}?category=Soft%20skills">Посмотреть все</a>
               </li>
               <li class="categories__item">
                  <h3 class="categories__title">Hard skills</h3>
                  <a class="categories__link" href="{{route('books.index')}}?category=Hard%20skills">Посмотреть все</a>
               </li>
               <li class="categories__item">
                  <h3 class="categories__title">Маркетинг</h3>
                  <a class="categories__link" href="{{route('books.index')}}?category=Маркетинг">Посмотреть все</a>
               </li>
               <li class="categories__item">
                  <h3 class="categories__title">Менеджмент</h3>
                  <a class="categories__link" href="{{route('books.index')}}?category=Менеджмент">Посмотреть все</a>
               </li>
               <li class="categories__item">
                  <h3 class="categories__title">Финансы</h3>
                  <a class="categories__link" href="{{route('books.index')}}?category=Финансы">Посмотреть все</a>
               </li>
               <li class="categories__item">
                  <h3 class="categories__title">Staff менеджмент</h3>
                  <a class="categories__link" href="{{route('books.index')}}?category=Staff%20менеджмент">Посмотреть все</a>
               </li>
               <li class="categories__item">
                  <h3 class="categories__title">Продажи и переговоры</h3>
                  <a class="categories__link" href="{{route('books.index')}}?category=Продажи%20и%20переговоры">Посмотреть все</a>
               </li>
               <li class="categories__item">
                  <h3 class="categories__title">Сервис</h3>
                  <a class="categories__link" href="{{route('books.index')}}?category=Сервис">Посмотреть все</a>
               </li>
               <li class="categories__item">
                  <h3 class="categories__title">ИТ</h3>
                  <a class="categories__link" href="{{route('books.index')}}?category=ИТ">Посмотреть все</a>
               </li>
               <li class="categories__item">
                  <h3 class="categories__title">Художественная литература</h3>
                  <a class="categories__link" href="{{route('books.index')}}?category=Художественная%20литература">Посмотреть все</a>
               </li>
            </ul>
         </div>
      </section>{{-- categories end --}}

      <section class="popular-books">
         <div class="container">
            <div class="title__wrapper">
               <h2 class="title">Популярные книги</h2>
               <a class="link" href="{{route('books.index')}}">Все книги</a>
            </div>
            <div class="owl-carousel owl-books">
               @foreach ($popularBooks as $book)
               <figure class="books-card">
                  <img class="books-card__image" src="{{asset('img/books/' . $book->img)}}" alt="{{$book->name}}">
                  <div class="books-card__overlay">
                     <a class="books-card__links books-card__links--more" href="{{route('books.single', $book->id)}}">Подробнее</a>  
                  </div>
                  <h3 class="books-card__title">
                     {{$book->title}}<br>
                     <strong class="books-card__author">({{$book->author}})</strong>
                     <b class="books-card__pages">{{$book->pages}} стр.</b>
                  </h3>
               </figure>
               @endforeach
            </div>
         </div>
      </section>{{-- popular books end --}}

      <section class="new-books">
         <div class="container">
            <div class="title__wrapper">
               <h2 class="title">Новинки книг</h2>
               <a class="link" href="{{route('books.index')}}">Все книги</a>
            </div>
            <div class="owl-carousel owl-books">
               @foreach ($newBooks as $book)
               <figure class="books-card">
                  <img class="books-card__image" src="{{asset('img/books/' . $book->img)}}" alt="{{$book->name}}">
                  <div class="books-card__overlay">
                     <a class="books-card__links books-card__links--more" href="{{route('books.single', $book->id)}}">Подробнее</a>
                  </div>
                  <img class="books-card__new-flag" src="{{asset('img/books/new.png')}}" alt="Новый продукт">
                  <h3 class="books-card__title">
                     {{$book->title}}<br>
                     <strong class="books-card__author">({{$book->author}})</strong>
                     <b class="books-card__pages">{{$book->pages}} стр.</b>
                  </h3>
                  <div class="books-card__rating-wrapper">
                     <div>
                        <span class="material-icons books-card__rating-icons">{{$book->rating >= 1 ? 'star' : 'star_outline'}}</span>
                        <span class="material-icons books-card__rating-icons">{{$book->rating >= 2 ? 'star' : 'star_outline'}}</span>
                        <span class="material-icons books-card__rating-icons">{{$book->rating >= 3 ? 'star' : 'star_outline'}}</span>
                        <span class="material-icons books-card__rating-icons">{{$book->rating >= 4 ? 'star' : 'star_outline'}}</span>
                        <span class="material-icons books-card__rating-icons">{{$book->rating >= 5 ? 'star' : 'star_outline'}}</span>
                     </div>
                     <output class="books-card__comments-quantity">
                        @if ($book->comments_count == 0)
                           Нет
                        @else
                           {{$book->comments_count}}
                        @endif 
                           отзывов
                     </output>
                  </div>{{-- rating wrapper end --}}
                  <div class="books-card__status-wrapper">
                     @if (!$book->user && $book->queues_count == 0)
                     <p class="books-card__status books-card__status--available">Доступна</p>
                     @else
                     <p class="books-card__status books-card__status--unavailable">
                        Занято примерно до: 
                        @php
                           $date = null;
                           if ($book->return_date) {
                              $returnDate = \Carbon\Carbon::parse($book->return_date);
                              $date = $returnDate->addDays((30 * $book->queues_count));
                           } else {
                              $date = \Carbon\Carbon::now()->addDays((30 * $book->queues_count));
                           }
                           @endphp
                        <time datetime="{{$date}}">{{ $date->format('d/m')}}</time>
                     </p>
                        @endif
                  </div>{{-- status wrapper end --}}
               </figure>{{-- book cards end --}}
               @endforeach
            </div>{{-- owl carousel end --}}
         </div>
      </section>{{-- new books end --}}

      <article class="about-ats">
         <div class="container about-ats__container">
            <section class="about__intro">
               <h2 class="heading about-ats__title">AtS Book Space</h2>
               <p class="about-ats__text">
                  <strong>AtS Book Space</strong> является структурным подразделением Группы Компаний ‹‹КОИНОТИ НАВ›› и сформирован на базе корпоративного учебного центра, который эффективно функционировал с 2016 г.
               </p>
               <p class="about-ats__text">
                  Наши цели и планы построены на нашей амбициозности, проактивности, креативности, настойчивости и смелости бросить вызов и реализовать:
               </p>
               <ul class="about-ats__strategy">
                  <li class="about-ats__strategy-item">
                     <span class="material-icons about-ats__strategy-icon">arrow_right_alt</span>
                     Сформировать культуру обучения в Компаниях.
                  </li>
                  <li class="about-ats__strategy-item">
                     <span class="material-icons about-ats__strategy-icon">arrow_right_alt</span>
                     Сформировать ответственность сотрудника за собственное обучение.
                  </li>
                  <li class="about-ats__strategy-item">
                     <span class="material-icons about-ats__strategy-icon">arrow_right_alt</span>
                     Помочь осознать важность и ценность обучения.
                  </li>
                  <li class="about-ats__strategy-item">
                     <span class="material-icons about-ats__strategy-icon">arrow_right_alt</span>
                     Простимулировать саморазвитие и самосовершенствование.
                  </li>
               </ul>
               <a class="link about-ats__link" href="{{route('about.index')}}">Подробнее о клубе</a>
            </section>{{-- introduction end --}}
            <section class="about-ats__contacts">
               <h2 class="heading about-ats__title">Контакты</h2>
               <p class="about-ats__text">
                  Вы можете забрать Книгу сами, заехав в наш офис:
               </p>
               <button class="about-ats__map-btn" data-id="show-map" type="button">
                  <img class="about-ats__map-img" src="{{asset('img/map.png')}}" alt="г. Душанбе, ул. А. Каххоров, д. 19/8">
               </button>
               <a class="link about-ats__link" href="{{route('feedback.index')}}">Заблудились? Напишите нам!</a>
            </section>{{-- contacts end --}}
         </div>
      </article>

      <section class="modal-map hidden" data-id="modal-map">
         <button class="modal-map__close-btn" type="button" data-id="close-map"">
            <span class="material-icons modal-map__close-icon">close</span>
         </button>
         <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Acb8f065da5e4b10ffb7d4569410a4591062b8c635c418fbaf4789e131f23da25&amp;width=1280&amp;height=720&amp;lang=ru_RU&amp;scroll=true"></script>
      </section>{{-- map end --}}
   </main>
@endsection