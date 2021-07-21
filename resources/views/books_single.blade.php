@extends('layouts.master')

@section('styles')
   <link rel="stylesheet" href="{{asset('css/books.css')}}">
@endsection

@section('content')
   <main class="books-single-page">
      <div class="container">
   
         <ul class="breadcrumbs">
            <li class="breadcrumbs__item">
               <a class="breadcrumbs__link breadcrumbs__link--home" href="{{route('home_index')}}" aria-label="{{__('Главная')}}">
                  <span class="material-icons-outlined breadcrumbs__icon--home">home</span>
               </a>
            </li>
            <li class="breadcrumbs__item">
               <span class="material-icons-outlined breadcrumbs__icon">arrow_forward_ios</span>
               <a class="breadcrumbs__link" href="{{route('books_index')}}">{{__('Книги')}}</a>
            </li>
            @if ($book->category != 'all')
            <li class="breadcrumbs__item">
               <span class="material-icons-outlined breadcrumbs__icon">arrow_forward_ios</span>
               <a class="breadcrumbs__link" href="{{route('books_index')}}?category={{$book->category}}">{{$book->category}}</a>
            </li>
            @endif
            <li class="breadcrumbs__item">
               <span class="material-icons-outlined breadcrumbs__icon">arrow_forward_ios</span>
               <a class="breadcrumbs__link" tabindex="0">{{$book->title}}</a>
            </li>
         </ul>

         <h1 class="page-title">{{$book->title}}</h1>

         <div class="books-info-wrapper">
            
            <section class="book-preview" data-id="book-preview">
               <h2 class="visually-hidden">{{__('Изображения книги')}}</h2>
               <ul class="book-photos">
                  <li class="book-photos__item active">
                     <img class="book-photos__image active" data-name="book-photos-img" data-id="main-img" src="{{asset('img/books/' . $book->img)}}" alt="Главное фото">
                     <img class="book-photos__image big" data-name="book-photos" data-id="main" src="{{asset('img/books/' . $book->img)}}" alt="Главное фото">
                  </li>
                  <li class="book-photos__item">
                     <img class="book-photos__image book-photos__image--front" data-name="book-photos-img" data-id="front-img" src="{{asset('img/books/' . $book->img_front)}}" alt="Фото фронтальной части">
                     <img class="book-photos__image book-photos__image--front" data-name="book-photos" data-id="front" src="{{asset('img/books/' . $book->img_front)}}" alt="Фото фронтальной части">
                  </li>
                  <li class="book-photos__item">
                     <img class="book-photos__image book-photos__image--back" data-name="book-photos-img" data-id="back-img" src="{{asset('img/books/' . $book->img_back)}}" alt="Фото задней части">
                     <img class="book-photos__image book-photos__image--back" data-name="book-photos" data-id="back" src="{{asset('img/books/' . $book->img_back)}}" alt="Фото задней части">
                  </li>
                  <li class="book-photos__item">
                     <img class="book-photos__image book-photos__image--side" data-name="book-photos-img" data-id="side-img" src="{{asset('img/books/' . $book->img_side)}}" alt="Фото боковой части">
                     <img class="book-photos__image book-photos__image--side" data-name="book-photos" data-id="side" src="{{asset('img/books/' . $book->img_side)}}" alt="Фото боковой части">
                  </li>
               </ul>
            </section>
            
            <section class="book-info">
               <h2 class="visually-hidden">{{__("Описание книги")}}</h2>
               <div class="book-info__status-wrapper">
                  @if ($book->available)
                  <p class="book-info__status book-info__status--available">{{__('Доступна')}}</p>
                  @else
                  <p class="book-info__status book-info__status--unavailable">
                     {{__('Занято примерно до')}}: <time datetime="{{$book->available_date}}">{{ \Carbon\Carbon::parse($book->available_date)->format('d/m')}}</time>
                  </p>
                  @endif
                  <p class="book-info__article">{{__('Артикул')}}: {{$book->code}}</p>
               </div>
               <p class="book-info__description">{{$book->description}}</p>
               <ul class="book-info__list">
                  <li class="book-info__item">
                     <div class="book-info__dt">{{__('Автор')}}</div>
                     <div class="book-info__dd">
                        <span class="material-icons-outlined book-info__arrow-icon">arrow_forward_ios</span>
                        {{$book->author}}
                     </div>
                  </li>
                  <li class="book-info__item">
                     <div class="book-info__dt">{{__('Страницы')}}</div>
                     <div class="book-info__dd">
                        <span class="material-icons-outlined book-info__arrow-icon">arrow_forward_ios</span>
                        {{$book->pages}}
                     </div>
                  </li>
               </ul>
               <div class="book-info__rating-wrapper">
                  <div class="book-info__stars-wrapper">
                     <span class="material-icons-outlined book-info__rating-icons {{$book->rating >= 1 ? 'filled' : ''}}" data-id="rating-icon">star_border</span>
                     <span class="material-icons-outlined book-info__rating-icons {{$book->rating >= 2 ? 'filled' : ''}}" data-id="rating-icon">star_border</span>
                     <span class="material-icons-outlined book-info__rating-icons {{$book->rating >= 3 ? 'filled' : ''}}" data-id="rating-icon">star_border</span>
                     <span class="material-icons-outlined book-info__rating-icons {{$book->rating >= 4 ? 'filled' : ''}}" data-id="rating-icon">star_border</span>
                     <span class="material-icons-outlined book-info__rating-icons {{$book->rating >= 5 ? 'filled' : ''}}" data-id="rating-icon">star_border</span>
                  </div>
                  <a class="book-info__rating-link" href="#">{{__('Оценить')}}</a>
               </div>
               <div class="likes-container">
                  <button class="likes-button" type="button" data-id="like-button" aria-label="{{__('Нравится')}}">
                     {{-- <span class="material-icons likes-icon">thumb_up</span>    --}}
                     <span class="material-icons-outlined likes-icon">thumb_up</span>   
                     <output>132</output>
                  </button>
                  <button class="likes-button" type="button" data-id="dislike-button" aria-label="{{__('Не нравится')}}">
                     {{-- <span class="material-icons likes-icon">thumb_down</span>                      --}}
                     <span class="material-icons-outlined likes-icon">thumb_down</span>                     
                     <output>12</output>
                  </button>
               </div>
               <a class="button book-info__book-link" href="#">{{__('Забронировать')}}</a>
            </section>
            
         </div>{{-- book-info wrapper end --}}
         
         <section class="comment">
            <h2 class="comment__title"><output>43</output> {{__('Коментарий')}}</h2>
            <form class="comment-form">
               @csrf
               <div class="comment-form__top-wrapper">
                  <img class="comment__user-avatar" src="#" alt="#">
                  <textarea class="comment__text" data-id="comment-text" spellcheck="false" aria-label="{{__('Оставить комментарий')}}" placeholder="{{__('Оставить комментарий')}}..."></textarea>
               </div>
               <div class="comment__buttons-wrapper" data-id="buttons-wrapper">
                  <button class="button--red" type="reset" data-id="cancel-comment">{{__('Отмена')}}</button>
                  <button class="button" type="submit">{{__('Комментировать')}}</button>
               </div>
            </form>
            <ul class="comments">
               <li class="comments__item">
                  <a class="comments__link" href="#">
                     <img class="comments__avatar" src="#" alt="#">
                  </a>
                  <div class="comments__wrapper">
                     <p class="comments__title">Username Usersurname <time datetime="2021-05-25">25 мая 22:45</time></p>
                     <p class="comments__text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur quos sequi mollitia voluptatibus nesciunt cumque, minima quas quam sunt consequuntur, obcaecati dolore numquam.
                     </p>
                  </div>
               </li>
               <li class="comments__item">
                  <a class="comments__avatar" href="#">
                     <img src="#" alt="#">
                  </a>
                  <div class="comments__wrapper">
                     <p class="comments__title">Pfser Surnamurname <time datetime="2021-05-25">25 мая 22:45</time></p>
                     <p class="comments__text">
                        Lorem ipsum dol mo sunt conseqore numquam.
                     </p>
                  </div>
               </li>
               <li class="comments__item">
                  <a class="comments__avatar" href="#">
                     <img src="#" alt="#">
                  </a>
                  <div class="comments__wrapper">
                     <p class="comments__title">Gdffername Usnme <time datetime="2021-05-25">25 мая 22:45</time></p>
                     <p class="comments__text">
                        Lorem ipsum dolor sit ametuos sequi mollitia voluptatibus nesciunt cumque, minima quas quam sunt consequuntur, obcaecati dolore numquam.
                        Lorem ipsum dolor sit ametuos sequi mollitia voluptatibus nesciunt cumque, minima quas quam sunt consequuntur, obcaecati dolore numquam.
                     </p>
                  </div>
               </li>
            </ul>
         </section>
         
      </div>{{-- container end --}}
   </main>
@endsection

@section('scripts')
   <script src="{{asset('js/books.js')}}"></script>
@endsection