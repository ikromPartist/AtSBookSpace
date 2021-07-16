@extends('layouts.master')

@section('styles')
   <link rel="stylesheet" href="{{asset('css/home.css')}}">
   <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
@endsection

@section('content')
   <main class="home-page">
      <h1 class="visually-hidden">{{__('Главная Страница Портала «AtS Book Space»')}}</h1>
      <div class="banner" data-id="banner">
         <img class="banner__image" src="{{asset('images/banner.png')}}" alt="{{__('Библиотека')}}">
      </div>

      <div class="container">
         
         <section class="categories">
            <h2 class="visually-hidden">{{__('Категории')}}</h2>
            <ul class="categories__list">
               <li class="categories__item">
                  <h3 class="categories__title">{{__('Soft skills')}}</h3>
                  <a class="categories__link" href="{{route('books.index')}}?category=Soft skills">{{__('Посмотреть все')}}</a>
               </li>
               <li class="categories__item">
                  <h3 class="categories__title">{{__('Hard skills')}}</h3>
                  <a class="categories__link" href="{{route('books.index')}}?category=Hard skills">{{__('Посмотреть все')}}</a>
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
                  <a class="categories__link" href="{{route('books.index')}}?category=Staff менеджмент">{{__('Посмотреть все')}}</a>
               </li>
               <li class="categories__item">
                  <h3 class="categories__title">{{__('Продажи и переговоры')}}</h3>
                  <a class="categories__link" href="{{route('books.index')}}?category=Продажи и переговоры">{{__('Посмотреть все')}}</a>
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
                  <a class="categories__link" href="{{route('books.index')}}?category=Художественная литература">{{__('Посмотреть все')}}</a>
               </li>
            </ul>
         </section>

         <section class="popular-books">
            <div class="cat-title__container">
               <h2 class="cat-title">{{__('Популярные книги')}}</h2>
               <a href="{{route('books.index')}}" class="cat-title__link">{{__('Все книги')}}</a>
            </div>
            <div class="owl-carousel">
               @foreach ($books as $book)
                  <figure class="books-card">
                     <div class="books-card__image-wrapper">
                        <img class="books-card__image" src="{{asset('images/books/' . $book->img)}}" alt="{{__('Название книги')}}">
                        <div class="books-card__overlay">
                           <a class="books-card__links books-card__links--more" href="{{route('books.index')}}?id={{$book->id}}">{{__('Подробнее')}}</a>
                           <a class="books-card__links books-card__links--order" href="#">{{__('Забронировать')}}</a>
                        </div>
                     </div>
                     <h3 class="books-card__title">
                        {{$book->title}} 
                        <br><strong class="books-card__author">({{$book->author}})</strong>
                        <b class="books-card__pages">{{$book->pages}} {{__('стр.')}}</b>
                     </h3>
                     <div class="books-card__rating-wrapper">
                        <div>
                           <span class="material-icons-outlined books-card__rating-icons {{$book->rating >= 1 ? 'filled' : ''}}" data-id="rating-icon">star_border</span>
                           <span class="material-icons-outlined books-card__rating-icons {{$book->rating >= 2 ? 'filled' : ''}}" data-id="rating-icon">star_border</span>
                           <span class="material-icons-outlined books-card__rating-icons {{$book->rating >= 3 ? 'filled' : ''}}" data-id="rating-icon">star_border</span>
                           <span class="material-icons-outlined books-card__rating-icons {{$book->rating >= 4 ? 'filled' : ''}}" data-id="rating-icon">star_border</span>
                           <span class="material-icons-outlined books-card__rating-icons {{$book->rating >= 5 ? 'filled' : ''}}" data-id="rating-icon">star_border</span>
                        </div>
                        <output class="books-card__comments-quantity">
                           @if ($book->comments == 0)
                              {{__('Нет')}}
                           @else
                              {{$book->comments}}
                           @endif 
                           {{__('отзывов')}}
                        </output>
                     </div>
                  </figure>
               @endforeach
            </div>
         </section>

      </div>

   </main>
@endsection

@section('scripts')
   <script src="{{asset('js/home.js')}}"></script>
   <script src="{{asset('js/owl.carousel.min.js')}}"></script>
@endsection