@extends('layouts.master')

@section('content')
   <main class="home__page">
      <div class="owl-carousel owl-news">
         <figure class="news__item">
            <img class="news__img" src="{{asset('img/news/news1.jpg')}}" alt="{{'Новости'}}">
            <figcaption class="news__description">
               Lorem ipsum dolor sit, amet consectetur adipisicing elit. Assumenda dicta voluptatem animi.
               Lorem ipsum dolor sit, amet consectetur adipisicing elit. Assumenda dicta voluptatem animi.
            </figcaption>
         </figure>
         <figure class="news__item">
            <img class="news__img" src="{{asset('img/news/news2.jpg')}}" alt="{{'Новости'}}">
            <figcaption class="news__description">
               Lorem ipsum dolor sit, amet consectetur adipisicing elit. Assumenda dicta voluptatem animi.
            </figcaption>
         </figure>
         <figure class="news__item">
            <img class="news__img" src="{{asset('img/news/news3.jpg')}}" alt="{{'Новости'}}">
            <figcaption class="news__description">
               Lorem ipsum dolor sit, amet consectetur adipisicing elit. Assumenda dicta voluptatem animi.
            </figcaption>
         </figure>
      </div>
      <div class="banner" data-id="banner">
         <img class="banner__image" src="{{asset('img/banner.png')}}" alt="{{__('Библиотека')}}">
      </div>
      <div class="container">
         <section class="categories">
            <ul class="categories__list">
               <li class="categories__item">
                  <h3 class="categories__title">{{__('Soft skills')}}</h3>
                  <a class="categories__link" href="{{route('books.index')}}?category=Soft%20skills">{{__('Посмотреть все')}}</a>
               </li>
               <li class="categories__item">
                  <h3 class="categories__title">{{__('Hard skills')}}</h3>
                  <a class="categories__link" href="{{route('books.index')}}?category=Hard%20skills">{{__('Посмотреть все')}}</a>
               </li>
               <li class="categories__item">
                  <h3 class="categories__title">{{__('Маркетинг')}}</h3>
                  <a class="categories__link" href="{{route('books.index')}}?category=Маркетинг">{{__('Посмотреть все')}}</a>
               </li>
               <li class="categories__item">
                  <h3 class="categories__title">{{__('Менеджмент')}}</h3>
                  <a class="categories__link" href="{{route('books.index')}}?category=Менеджмент">{{__('Посмотреть все')}}</a>
               </li>
               <li class="categories__item">
                  <h3 class="categories__title">{{__('Финансы')}}</h3>
                  <a class="categories__link" href="{{route('books.index')}}?category=Финансы">{{__('Посмотреть все')}}</a>
               </li>
               <li class="categories__item">
                  <h3 class="categories__title">{{__('Staff менеджмент')}}</h3>
                  <a class="categories__link" href="{{route('books.index')}}?category=Staff%20менеджмент">{{__('Посмотреть все')}}</a>
               </li>
               <li class="categories__item">
                  <h3 class="categories__title">{{__('Продажи и переговоры')}}</h3>
                  <a class="categories__link" href="{{route('books.index')}}?category=Продажи%20и%20переговоры">{{__('Посмотреть все')}}</a>
               </li>
               <li class="categories__item">
                  <h3 class="categories__title">{{__('Сервис')}}</h3>
                  <a class="categories__link" href="{{route('books.index')}}?category=Сервис">{{__('Посмотреть все')}}</a>
               </li>
               <li class="categories__item">
                  <h3 class="categories__title">{{__('ИТ')}}</h3>
                  <a class="categories__link" href="{{route('books.index')}}?category=ИТ">{{__('Посмотреть все')}}</a>
               </li>
               <li class="categories__item">
                  <h3 class="categories__title">{{__('Художественная литература')}}</h3>
                  <a class="categories__link" href="{{route('books.index')}}?category=Художественная%20литература">{{__('Посмотреть все')}}</a>
               </li>
            </ul>
         </section>{{-- categories end --}}

         <section class="popular-books">
            <div class="cat-title__container">
               <h2 class="cat-title">{{__('Популярные книги')}}</h2>
               <a class="link cat-title__link" href="{{route('books.index')}}">{{__('Все книги')}}</a>
            </div>
            <div class="owl-carousel owl-books">
               @foreach ($popularBooks as $book)
               <figure class="books-card">
                  <div class="books-card__image-wrapper">
                     <img class="books-card__image" src="{{asset('img/books/' . $book->img)}}" alt="{{$book->name}}">
                     <div class="books-card__overlay">
                        <a class="books-card__links books-card__links--more" href="{{route('books.single', $book->id)}}">{{__('Подробнее')}}</a>  
                     </div>
                  </div>
                  <h3 class="books-card__title">
                     {{$book->title}}<br>
                     <strong class="books-card__author">({{$book->author}})</strong>
                     <b class="books-card__pages">{{$book->pages}} {{__('стр.')}}</b>
                  </h3>
               </figure>
               @endforeach
            </div>
         </section>{{-- popular books end --}}

         <section class="new-books">
            <div class="cat-title__container">
               <h2 class="cat-title">{{__('Новинки книг')}}</h2>
               <a class="link cat-title__link" href="{{route('books.index')}}">{{__('Все книги')}}</a>
            </div>
            <div class="owl-carousel owl-books">
               @foreach ($newBooks as $book)
               <figure class="books-card">
                  <div class="books-card__image-wrapper">
                     <img class="books-card__image" src="{{asset('img/books/' . $book->img)}}" alt="{{$book->name}}">
                     <div class="books-card__overlay">
                        <a class="books-card__links books-card__links--more" href="{{route('books.single', $book->id)}}">{{__('Подробнее')}}</a>
                     </div>
                     <img class="books-card__new-flag" src="{{asset('img/books/new.png')}}" alt="{{__('Новый продукт')}}">
                  </div>
                  <h3 class="books-card__title">
                     {{$book->title}}<br>
                     <strong class="books-card__author">({{$book->author}})</strong>
                     <b class="books-card__pages">{{$book->pages}} {{__('стр.')}}</b>
                  </h3>
                  <div class="books-card__rating-wrapper">
                     <div>
                        <span class="material-icons-outlined books-card__rating-icons">{{$book->rating >= 1 ? 'star' : 'star_outline'}}</span>
                        <span class="material-icons-outlined books-card__rating-icons">{{$book->rating >= 2 ? 'star' : 'star_outline'}}</span>
                        <span class="material-icons-outlined books-card__rating-icons">{{$book->rating >= 3 ? 'star' : 'star_outline'}}</span>
                        <span class="material-icons-outlined books-card__rating-icons">{{$book->rating >= 4 ? 'star' : 'star_outline'}}</span>
                        <span class="material-icons-outlined books-card__rating-icons">{{$book->rating >= 5 ? 'star' : 'star_outline'}}</span>
                     </div>
                     <output class="books-card__comments-quantity">
                        @if ($book->comments_count == 0)
                           {{__('Нет')}}
                        @else
                           {{$book->comments_count}}
                        @endif 
                        {{__('отзывов')}}
                     </output>
                  </div>{{-- rating wrapper end --}}
                  <div class="books-card__status-wrapper">
                     @if (!$book->user && $book->queues_count == 0)
                        <p class="books-card__status books-card__status--available">{{__('Доступна')}}</p>
                     @else
                        <p class="books-card__status books-card__status--unavailable">
                           {{__('Занято примерно до')}}: 
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
         </section>{{-- new books end --}}

         <article class="about">
            <section class="about__intro">
               <h2 class="about__title">AtS Book Space</h2>
               <p class="about__text">
                  <strong>AtS Book Space</strong> является структурным подразделением Группы Компаний ‹‹КОИНОТИ НАВ›› и сформирован на базе корпоративного учебного центра, который эффективно функционировал с 2016 г.
               </p>
               <p class="about__text">
                  Наши цели и планы построены на нашей амбициозности, проактивности, креативности, настойчивости и смелости бросить вызов и реализовать:
               </p>
               <ul class="about__strategy">
                  <li class="about__strategy-item">
                     <span class="material-icons-outlined about__strategy-icon">arrow_right_alt</span>
                     Сформировать культуру обучения в Компаниях.
                  </li>
                  <li class="about__strategy-item">
                     <span class="material-icons-outlined about__strategy-icon">arrow_right_alt</span>
                     Сформировать ответственность сотрудника за собственное обучение.
                  </li>
                  <li class="about__strategy-item">
                     <span class="material-icons-outlined about__strategy-icon">arrow_right_alt</span>
                     Помочь осознать важность и ценность обучения.
                  </li>
                  <li class="about__strategy-item">
                     <span class="material-icons-outlined about__strategy-icon">arrow_right_alt</span>
                     Простимулировать саморазвитие и самосовершенствование.
                  </li>
               </ul>
               <div>
                  <a class="link" href="{{route('about.index')}}">{{__('Подробнее о клубе')}}</a>
               </div>
            </section>{{-- introduction end --}}
            <section class="about__contacts">
               <div>
                  <h2 class="about__title">{{__('Контакты')}}</h2>
                  <p class="about__text">
                     {{__('Вы можете забрать Книгу сами, заехав в наш офис')}}:
                  </p>
               </div>
               <button class="about__map-btn" data-id="show-map" type="button">
                  <span class="visually-hidden">{{__('Открыть карту')}}</span>
                  <img class="about__map-img" src="{{asset('img/map.png')}}" alt="{{__('г. Душанбе, ул. А. Каххоров, д. 19/8')}}">
               </button>
               <div>
                  <a class="link" href="#">{{__('Заблудились? Напишите нам!')}}</a>
               </div>
            </section>{{-- contacts end --}}
         </article>

         <section class="map-popup hidden" data-id="modal-map">
            <h2 class="visually-hidden">{{__('Адрес компании')}}:</h2>
            <button class="close-btn" type="button" data-id="close-map" aria-label="{{__('Закрыть')}}">
               <span class="material-icons-outlined close-icon">close</span>
            </button>
            <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Acb8f065da5e4b10ffb7d4569410a4591062b8c635c418fbaf4789e131f23da25&amp;width=1280&amp;height=720&amp;lang=ru_RU&amp;scroll=true"></script>
         </section>{{-- map end --}}
      </div>{{-- container end --}}
   </main>
@endsection